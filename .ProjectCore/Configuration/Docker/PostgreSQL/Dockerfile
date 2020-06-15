FROM library/postgres
ENV DEBIAN_FRONTEND=noninteractive

ENV POSTGRES_USER postgres
ENV POSTGRES_PASSWORD 748159263
ENV POSTGRES_DB postgres

RUN apt-get update \
    && apt-get install -y \
       libpq-dev \
       postgresql-server-dev-all \
       libmariadb-dev-compat \
       libmariadb-dev \
       gcc \
       wget \
       unzip \
       vim \
       lsb-release

RUN wget http://repo.mysql.com/mysql-apt-config_0.8.13-1_all.deb \
    && dpkg -i mysql-apt-config_0.8.13-1_all.deb \
    && apt-get update \
    && apt-get install -y mariadb-server \
    && service mysql restart

RUN wget https://github.com/EnterpriseDB/mysql_fdw/archive/master.zip \
    && unzip master.zip \
    && rm -rf /master.zip

RUN cd /mysql_fdw-master \
    && export PATH=/usr/lib/postgresql/12/bin/:/usr/bin/mysql:$PATH make USE_PGXS=1 \
    && PATH=/usr/lib/postgresql/12/bin/:/usr/bin/mysql:$PATH make USE_PGXS=1 install \
    && cd / \
    && rm -rf /mysql_fdw-master
