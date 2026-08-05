<script>
    function resetForm() {
        $(`#work_code`).val("");
        $(`#work_name`).val("");
        getDataWorks();
    }

    function getDataWorks() {
        $('#table_work').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            searching: false,
            ordering: false,
            lengthMenu: [
                [10, 20, 50, 100, -1],
                [10, 20, 50, 100, "All"]
            ],
            pageLength: 20,
            ajax: {
                type: 'GET',
                url: '{!! route("Work.picklist") !!}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function (d) {
                    d.work_code = $('#work_code').val();
                    d.work_name = $('#work_name').val();

                    return d;
                },
                dataSrc: function (json) {
                    // simpan seluruh response
                    dataReport = json.data;

                    // wajib return data untuk DataTable
                    return json.data;
                },
                beforeSend: function () {
                    $('#loading-table').show();
                    $('#table_work tbody').empty();
                },
                complete: function () {
                    $('#loading-table').hide();
                },
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return '<input id="sys_id_works' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_works" type="hidden">' + (meta.row + meta.settings._iDisplayStart + 1)
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap",
                    render: function (data, type, row, meta) {
                        return data.additionalData.code
                    }
                },
                {
                    data: 'sys_Text',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                }
            ]
        });
    }

    function exportDataWorks() {

    }

    function validateShowButton() {

    }

    $('#tableWorks tbody').on('click', 'tr', function () {
        const workRefID = $(this).find('input[data-trigger="sys_id_work"]').val();
        const workCode = $(this).find('td:nth-child(2)').text();
        const workName = $(this).find('td:nth-child(3)').text();

        $(`#modal_work_id`).val(workRefID);
        $(`#modal_work_document_number`).val(`${workCode ?? ''} - ${workName ?? ''}`);
        $(`#modal_work_document_number`).css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

        $("#myWorks").modal('toggle');
        $("#workRevisionModal").modal('toggle');
    });

    $('#revision_work').on('click', function (e) {
        getModalWorks();
    });

    $('#modal_work_document_number_icon').on('click', function () {
        $("#myWorks").modal('toggle');
        $("#workRevisionModal").modal('toggle');
    });

    $(document).ready(function () {
        getDataWorks();
    });
</script>