<div id="myWorker" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Worker</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 425px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetWorker">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th style="display:none;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
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
    $(function() {
        $('.myWorker').on('click', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '{!! route("getWorker") !!}',
                success: function(data) {
                    var no = 1;
                    var t = $('#tableGetWorker').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        t.row.add([
                            '<tbody><tr><td>' + no++ + '</td>',
                            '<td>' + val.personName + '</td>',
                            '<td>' + val.organizationalJobPositionName + '</td>',
                            '<span style="display:none;"><td>' + val.sys_ID + '</td></span>',
                            '<span style="display:none;"><td>' + val.contactNumber + '</td></span></tr></tbody>',
                        ]).draw();
                    });
                }
            });

            // var dataShow = [];
            // $.ajax({
            //     type: 'GET',
            //     url: '{!! route("getWorker") !!}',
            //     success: function(data) {
            //         var no = 1;

            //         for ( var i=0 ; i< Object.keys(data).length ; i++ ) {
            //             dataShow.push([
            //                 i+1,
            //                 '<span data-dismiss="modal" onclick="klikWorker(\'' + data[i]['sys_ID'] + '\', \'' + data[i]['personName'] + '\', \'' + data[i]['organizationalJobPositionName'] + '\');">' + data[i]['personName'] + '</span>',  
            //                 '<span data-dismiss="modal" onclick="klikWorker(\'' + data[i]['sys_ID'] + '\', \'' + data[i]['personName'] + '\', \'' + data[i]['organizationalJobPositionName'] + '\');">' + data[i]['organizationalJobPositionName'] + '</span>',  
            //             ]);
            //         }

            //         $("#tableGetWorker").dataTable().fnDestroy()

            //         $('#tableGetWorker').DataTable( {
            //             data:           dataShow,
            //             deferRender:    true,
            //             // scrollY:        200,
            //             scrollCollapse: true,
            //             scroller:       true
            //         } );
            //     }
            // });

        });
    });
</script>

<script>

    $('#tableGetWorker tbody').on('click', 'tr', function () {

        $("#myWorker").modal('toggle');

        var row = $(this).closest("tr");    
        var sys_id = row.find("td:nth-child(4)").text();
        var name = row.find("td:nth-child(2)").text();
        var contactNumber = row.find("td:nth-child(5)").text();

        $("#request_name_id").val(sys_id);
        $("#request_name").val(name);
        $("#request_position").val(position);
        $("#contactPhone").val(contactNumber);

    });
    
</script>