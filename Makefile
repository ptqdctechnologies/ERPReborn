# ─── ERPReborn — Task Runner ──────────────────────────────────────────────────
# Usage:
#   make <target>
#   BASE_URL=http://host:port API_USER=user API_PASSWORD=pass make <target>

# ─── k6 configuration ─────────────────────────────────────────────────────────
BASE_URL         ?= http://localhost:10080
API_USER         ?= redi
API_PASSWORD     ?= redi1234
TZ_OFFSET        ?= +07:00
BRANCH_REF_ID    ?= AUTO
USER_ROLE_REF_ID ?= AUTO
SOAK_DURATION    ?= 2h
SOAK_VUS         ?= 15

K6      := k6
ENVVARS := BASE_URL=$(BASE_URL) \
           API_USER=$(API_USER) \
           API_PASSWORD=$(API_PASSWORD) \
           TZ_OFFSET=$(TZ_OFFSET) \
           BRANCH_REF_ID=$(BRANCH_REF_ID) \
           USER_ROLE_REF_ID=$(USER_ROLE_REF_ID)

REPORTS := k6-tests/reports

# ─── Visualization (k6 built-in web dashboard, k6 ≥ 0.49) ────────────────────
# Toggle with VIZ=1 (default off so headless CI runs are unchanged).
#   VIZ=1           → live dashboard at http://localhost:5665
#   VIZ_EXPORT=path → save a standalone HTML report (overridable per scenario)
#   VIZ_OPEN=1      → open the exported report after the run (macOS `open`)
VIZ        ?= 0
VIZ_HOST   ?= 0.0.0.0
VIZ_PORT   ?= 5665
VIZ_PERIOD ?= 1s
LOG_SQL    ?= 1

ifeq ($(VIZ),1)
  K6_VIZ_ENV := K6_WEB_DASHBOARD=true \
                K6_WEB_DASHBOARD_HOST=$(VIZ_HOST) \
                K6_WEB_DASHBOARD_PORT=$(VIZ_PORT) \
                K6_WEB_DASHBOARD_PERIOD=$(VIZ_PERIOD)
else
  K6_VIZ_ENV :=
endif

# Helper: run a scenario with optional dashboard + HTML export.
# Usage:  $(call k6_run,<scenario>,<jsonname>,<htmlname>,<extra_env>)
define k6_run
	cd k6-tests && $(K6_VIZ_ENV) \
		$(if $(filter 1,$(VIZ)),K6_WEB_DASHBOARD_EXPORT=reports/$(3)) \
		$(ENVVARS) $(4) $(K6) run \
			--out json=reports/$(2) \
			-e LOG_SQL=$(LOG_SQL) \
			scenarios/$(1)
	$(if $(filter 1,$(VIZ_OPEN)),@command -v open >/dev/null 2>&1 && open $(REPORTS)/$(3) || true)
endef

# ─── Docker configuration ──────────────────────────────────────────────────────
COMPOSE_FILE := docker-compose.yml
FRANKEN_ENV  ?= Programming/WebBackEnd/.env
FRANKEN_SVC  := php-apache-backend
DC           := docker compose -f $(COMPOSE_FILE) --env-file $(FRANKEN_ENV)

.PHONY: help check install \
        01 02 03 04 05 06 07 08 \
        baseline full soak \
        docker-up docker-up-build docker-down docker-restart \
        docker-build docker-logs docker-ps docker-shell \
        samba-up samba-down samba-logs samba-seed-users samba-reset \
        curl-login profile-tail debug-tail sql-tail \
        viewer \
        clean

# ─── Default target ───────────────────────────────────────────────────────────
help:
	@echo ""
	@echo "  ERPReborn Task Runner"
	@echo ""
	@echo "  k6 — Individual scenarios:"
	@echo "    make 01        Auth endpoint latency           (~2.5 min, 20 VUs)"
	@echo "    make 02        Gateway privilege endpoints      (~3 min,   30 VUs)"
	@echo "    make 03        Full session flow                (~2 min,   20 VUs)"
	@echo "    make 04        Sustained load test              (~26 min,  50 VUs)"
	@echo "    make 05        Stress & spike test              (~15 min, 100 VUs)"
	@echo "    make 06        Soak / endurance test            (2h default, 15 VUs)"
	@echo "    make 07        Form group read APIs             (~4 min,   10 VUs)"
	@echo "    make 08        LDAP bind latency (isolated)     (~2.5 min, 20 VUs)"
	@echo ""
	@echo "  k6 — Compound targets:"
	@echo "    make baseline  Run 01 + 02 + 03 + 07 (day-1 baseline)"
	@echo "    make full      Run 01 through 07 in sequence"
	@echo "    make soak      Run 06 with custom duration/VUs"
	@echo ""
	@echo "  Docker (php-backend-franken):"
	@echo "    make docker-up          Start service (detached)"
	@echo "    make docker-up-build    Rebuild image then start"
	@echo "    make docker-down        Stop and remove container"
	@echo "    make docker-restart     Restart running container"
	@echo "    make docker-build       Build image only (no start)"
	@echo "    make docker-logs        Tail container logs"
	@echo "    make docker-ps          Show container status"
	@echo "    make docker-shell       Open bash shell inside container"
	@echo ""
	@echo "  Samba (auth-samba):"
	@echo "    make samba-up           Start auth-samba container"
	@echo "    make samba-down         Stop and remove auth-samba"
	@echo "    make samba-logs         Tail Samba logs (watch for 'STARTED SERVICE(S)')"
	@echo "    make samba-seed-users   Create default test users inside Samba"
	@echo "    make samba-reset        Wipe named volumes and re-provision the domain"
	@echo ""
	@echo "  Visualization (k6 built-in web dashboard, k6 ≥ 0.49):"
	@echo "    VIZ=1 make 01             Live dashboard at http://localhost:$(VIZ_PORT) during run +"
	@echo "                              standalone HTML report written to $(REPORTS)/01_auth_latency.html"
	@echo "    VIZ=1 VIZ_OPEN=1 make 02  Live dashboard + auto-open HTML after the run (macOS)"
	@echo "    VIZ=1 make baseline       Enables dashboard for every scenario in the chain"
	@echo ""
	@echo "  Smoke test:"
	@echo "    make curl-login         Fire a single authentication.general.setLogin request"
	@echo ""
	@echo "  Profiling:"
	@echo "    make profile-tail       Tail [setLogin.profile] lines from Apache backend log"
	@echo "    make debug-tail         Tail Helper_DateTime / TerminateHandler / SQL.query / ERROR lines"
	@echo "    make sql-tail           Tail SQL.query lines only (requires LOG_SQL=true in .env)"
	@echo ""
	@echo "  Documentation:"
	@echo "    make viewer             Serve analysis docs and open viewer in browser (port 8099)"
	@echo "    VIEWER_PORT=9090 make viewer   Use a custom port"
	@echo ""
	@echo "  Utilities:"
	@echo "    make install   Check k6 is installed"
	@echo "    make clean     Remove all report JSON files"
	@echo ""
	@echo "  Examples:"
	@echo "    BASE_URL=http://localhost:50080 API_USER=me API_PASSWORD=secret make baseline"
	@echo "    SOAK_DURATION=30m SOAK_VUS=5 make soak"
	@echo "    FRANKEN_ENV=Programming/WebBackEnd_LaravelOctane_FrankenPHP/.env.ORI make docker-up"
	@echo ""

# ─── Preflight ────────────────────────────────────────────────────────────────
check:
	@command -v $(K6) >/dev/null 2>&1 || \
		{ echo "k6 not found. Install: brew install k6  or  https://k6.io/docs/get-started/installation/"; exit 1; }

install: check
	@echo "k6 is available: $$($(K6) version)"

$(REPORTS):
	@mkdir -p $(REPORTS)

# ─── k6 Individual scenarios ──────────────────────────────────────────────────
# Each target cds into k6-tests/ so that handleSummary()'s `reports/<file>.json`
# relative paths resolve correctly.

01: check $(REPORTS)
	$(call k6_run,01_auth_latency.js,01_auth_latency.json,01_auth_latency.html,)

02: check $(REPORTS)
	$(call k6_run,02_gateway_privilege.js,02_gateway_privilege.json,02_gateway_privilege.html,)

03: check $(REPORTS)
	$(call k6_run,03_full_session_flow.js,03_full_session_flow.json,03_full_session_flow.html,)

04: check $(REPORTS)
	$(call k6_run,04_load_test.js,04_load_test.json,04_load_test.html,)

05: check $(REPORTS)
	$(call k6_run,05_stress_spike_test.js,05_stress_spike.json,05_stress_spike.html,)

06: check $(REPORTS)
	$(call k6_run,06_soak_test.js,06_soak.json,06_soak.html,SOAK_DURATION=$(SOAK_DURATION) SOAK_VUS=$(SOAK_VUS))

07: check $(REPORTS)
	$(call k6_run,07_form_apis_read.js,07_form_apis_read.json,07_form_apis_read.html,)

08: check $(REPORTS)
	$(call k6_run,08_ldap_latency.js,08_ldap_latency.json,08_ldap_latency.html,)

# ─── k6 Compound targets ──────────────────────────────────────────────────────
baseline: 01 02 03 07
	@echo ""
	@echo "  Baseline complete. Reports written to $(REPORTS)/"

full: 01 02 03 07 04 05
	@echo ""
	@echo "  Full suite complete (excluding soak). Run 'make soak' separately."

soak: 06

# ─── Docker (php-backend-franken) ────────────────────────────────────────────
docker-up:
	$(DC) up -d $(FRANKEN_SVC)

docker-up-build:
	$(DC) up -d --build $(FRANKEN_SVC)

docker-down:
	$(DC) stop $(FRANKEN_SVC)
	$(DC) rm -f $(FRANKEN_SVC)

docker-restart:
	$(DC) restart $(FRANKEN_SVC)

docker-build:
	$(DC) build $(FRANKEN_SVC)

docker-logs:
	$(DC) logs -f $(FRANKEN_SVC)

docker-ps:
	$(DC) ps $(FRANKEN_SVC)

docker-shell:
	$(DC) exec $(FRANKEN_SVC) bash

# ─── Samba (auth-samba) ──────────────────────────────────────────────────────
SAMBA_SVC := auth-samba
SAMBA_CT  := samba

samba-up:
	$(DC) up -d $(SAMBA_SVC)

samba-down:
	$(DC) stop $(SAMBA_SVC)
	$(DC) rm -f $(SAMBA_SVC)

samba-logs:
	$(DC) logs -f $(SAMBA_SVC)

samba-seed-users:
	@docker exec $(SAMBA_CT) samba-tool user add sysadmin      sysadmin1234       || true
	@docker exec $(SAMBA_CT) samba-tool user add aldi.mulyadi  aldi1234           || true
	@docker exec $(SAMBA_CT) samba-tool user add icha.mailinda icha1234           || true
	@docker exec $(SAMBA_CT) samba-tool user add teguh.pratama teguhpratama1234   || true
	@docker exec $(SAMBA_CT) samba-tool user add suyanto       suyanto1234        || true
	@docker exec $(SAMBA_CT) samba-tool user add redi          redi1234           || true
	@docker exec $(SAMBA_CT) smbcontrol all reload-config
	@echo "Seeded test users into Samba."

samba-reset:
	$(DC) stop $(SAMBA_SVC)
	$(DC) rm -f $(SAMBA_SVC)
	# Compose prefixes named volumes with the project name (dir basename by default),
	# so `volume-samba-data` becomes e.g. `erpreborn_volume-samba-data`. Match by suffix.
	@docker volume ls -q | grep -E 'volume-samba-(data|config)$$' | xargs -r docker volume rm
	$(DC) up -d $(SAMBA_SVC)
	@echo "Samba volumes wiped and container restarted. Wait ~30s for provisioning, then run 'make samba-seed-users'."

# ─── One-shot curl login ─────────────────────────────────────────────────────
# Useful for quick smoke tests and for tailing `make profile-tail` in another
# terminal to observe a single setLogin profile line. Uses the same env vars as
# the k6 scenarios (BASE_URL, API_USER, API_PASSWORD, BRANCH_REF_ID, …).
curl-login:
	@$(ENVVARS) ./k6-tests/scripts/curl-login.sh

# ─── Profiling (Apache backend setLogin) ─────────────────────────────────────
# Tails the Laravel log inside php-apache-backend and filters for profiler lines.
# Run in one terminal, then `make 01` in another.
profile-tail:
	docker exec -it php-apache-backend \
		sh -c 'tail -F /var/www/html/WebBackEnd/storage/logs/laravel.log | grep --line-buffered setLogin.profile'

# Broader tail: captures Helper_DateTime debug, TerminateHandler debug,
# setLogin.profile, SQL.query lines (LOG_SQL=true), and any local.ERROR lines.
debug-tail:
	docker exec -it php-apache-backend \
		sh -c 'tail -F /var/www/html/WebBackEnd/storage/logs/laravel.log | grep --line-buffered -E "Auth\\.RequestHandler|setLogin|Helper_DateTime|Helper_API|Helper_JSON|Helper_LDAP|TerminateHandler|SQL\\.query|local\\.ERROR|local\\.WARNING"'

# SQL-only tail: streams every executed stored-proc call with kind + duration.
# Requires LOG_SQL=true in Programming/WebBackEnd/.env (restart container after change).
# Run this in one terminal, then run any make scenario in another.
sql-tail:
	docker exec -it php-apache-backend \
		sh -c 'tail -F /var/www/html/WebBackEnd/storage/logs/laravel.log | grep --line-buffered "SQL\.query"'

# ─── Analysis viewer ─────────────────────────────────────────────────────────
# Serves the project root over HTTP and opens the viewer in the default browser.
# Requires Python 3. Uses port 8099 to avoid conflicts.
VIEWER_PORT ?= 8099
VIEWER_URL  := http://localhost:$(VIEWER_PORT)/Documentation/Claude/viewer.html

viewer:
	@echo "  Opening viewer at $(VIEWER_URL)"
	@open "$(VIEWER_URL)" 2>/dev/null || xdg-open "$(VIEWER_URL)" 2>/dev/null || true
	@python3 -m http.server $(VIEWER_PORT) --directory .

# ─── Utilities ────────────────────────────────────────────────────────────────
clean:
	rm -f $(REPORTS)/*.json
	@echo "Reports cleared."
