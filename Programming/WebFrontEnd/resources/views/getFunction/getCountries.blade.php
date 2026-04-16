<div id="myCountries" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Countries</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableCountries">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const CACHE_KEY = "countries";
    const CACHE_TTL = 24 * 60 * 60 * 1000; // 24 hours

    function viewCountries(data) {
        $('#tableCountries').DataTable({
            destroy: true,
            data: data,
            deferRender: true,
            scrollCollapse: true,
            scroller: true,
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return '<input id="sys_id_country' + (meta.row + 1) + '" value="' + data.id + '" data-trigger="sys_id_country" type="hidden">' + (meta.row + 1)
                    }
                },
                {
                    data: 'iso2',
                    defaultContent: '-',
                    className: "align-middle"
                },
                {
                    data: 'name',
                    defaultContent: '-',
                    className: "align-middle"
                }
            ]
        });

        $('#tableCountries').css("width", "100%");
    }

    async function getCountries() {
        const cached = localStorage.getItem(CACHE_KEY);

        if (cached) {
            const { data, timestamp } = JSON.parse(cached);

            if (Date.now() - timestamp < CACHE_TTL) {
                console.log("From cache:", data);
                return viewCountries(data);
            }
        }

        const response = await fetch('https://api.countrystatecity.in/v1/countries', {
            headers: {
                'X-CSCAPI-KEY': '7786c9334c947f147cd22535ecdcf23c7f34a7d7aacb1be391407aa7222aeea9'
            }
        });

        const countries = await response.json();

        localStorage.setItem(CACHE_KEY, JSON.stringify({
            data: countries,
            timestamp: Date.now()
        }));

        console.log("From API:", countries);
        return viewCountries(countries);
    }
</script>