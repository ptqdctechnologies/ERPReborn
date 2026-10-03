<!-- CONTENT -->
<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Requester
    </label>
    <div class="col-5 d-flex">
        <div>
            <!-- data-toggle="modal" data-target="#requester_modal" -->
            <span id="requester_container" class="input-group-text form-control"
                style="border-radius:0;cursor:not-allowed;">
                <i id="requester_icon" class="fas fa-gift"></i>
            </span>
        </div>
        <div style="flex: 100%;">
            <div class="input-group">
                <input type="text" id="requester_preview" class="form-control"
                    style="border-radius:0; background-color: #fff;" readonly />
                <input type="hidden" class="form-control" id="requester_id" name="requester_id" />
                <input type="hidden" class="form-control" id="requester_name" name="requester_name" />
            </div>
        </div>
    </div>
</div>
<div class="row" id="requester_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="requester_message_text"></div>
</div>

<!-- MODAL -->
<div class="modal fade" id="requester_modal" tabindex="-1" aria-labelledby="requester_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requester_modal_label"
                    style="font-size: 15px; font-weight:bold; text-align: center;">
                    Choose Requester
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed w-100" id="requester_list_table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="requester_list_loading_table">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                                        Loading...
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
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
    function getRequester() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getRequester") !!}'
        })
            .done(function (response) {
                let data = (response.status == 200 && response.data[0]) ? response.data : [];

                $('#requester_list_table').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        {
                            data: 'personName',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        },
                        {
                            data: 'fullOrganizationalJobPositionName',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function () {
                $("#requester_list_loading_table").hide();
            });
    }

    $(document).ready(function () {
        $('#requester_modal').on('hide.bs.modal', function () {
            if (document.activeElement && this.contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });
    });
</script>