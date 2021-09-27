<div id="mySiteCode" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Sub Budget Code</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetSite">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
                                        </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--|----------------------------------------------------------------------------------|
    |                            End Function Sub Project Code                         |
    |----------------------------------------------------------------------------------|-->

<!-- <script>
    y = 0;
    $(function() {
        $(".klikSite").on('click', function(e) {
            alert('d');
            e.preventDefault(); // in chase you change to a link or button
            $("#brfhide3").show();
            $(".pageArfBoq").show();
            $(".pageDetailTransaction").show();
            $("#showContentBOQ3").show();
            $("#showContentBOQ2").show();
            $("#tableShowHideBOQ2").show();
            $("#tableShowHideBOQ3").show();
            var $this = $(this);
            var code = $this.data("id");
            var name = $this.data("name");
            $("#sitecode").val(code);
            $("#sitecode2").val(name);
            $("#sitename").val(name);

            $("#request_name2").prop("disabled", false);

            //DATA MIX

            $("#arfNumberAsf").prop("disabled", true);
            $("#requester").val("requester 1");
            $("#managerAsfUid").val("Manager 1");
            $("#managerAsfName").val("Manager Detail 1");
            $("#currency").val("IDR");
            $("#currencyCode").val("IDR");
            $("#financeArfUtableBudgetBrfid").val("finance 1");
            $("#financeArfName").val("Finance Detail 1");
            $("#remark").val("Remark 1");
            $("#total").val("100000");
            $("#totalDetail").val("Rp");


            //End batas

            // var datas = [];

            // for (var i = 1; i <= x; i++) {
            //     var data = {
            //         origin_budget: "x",
            //         projectcode: "x",
            //         projectname: "x",
            //         sitecode: "x",
            //         sitecode2: "x",
            //         beneficiary: "x",
            //         bank_name: "x",
            //         account_name: "x",
            //         account_number: "x",
            //         internal_notes: "x",
            //         request_name: "x",
            //         putWorkId: "x",
            //         putWorkName: "x",
            //         putProductId: "x",
            //         putProductName: "x",
            //         putQty: "x",
            //         putQtys: "x",
            //         putUom: "x",
            //         putPrice: "x",
            //         putCurrency: "x",
            //         totalArfDetails: "x",
            //         putRemark: "x",
            //     }
            //     datas.push(data);
            // }

            // var json_object = JSON.stringify(datas);
            // // console.log(json_object);

            // $.ajax({
            //     type: "POST",
            //     url: '{{route("BRF.store")}}',
            //     data: json_object,
            //     contentType: "application/json",
            //     processData: true,
            //     headers: {
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //     },
            //     success: function(data) {
            //         y++;
            //         $.each(data, function(key, val) {

            //             // var t = $('#tableBudgetBrf').DataTable();
            //             // t.row.add([
            //             //     '<a class="btn btn-outline-success btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;" href="javascript:cek()"><i class="fa fa-plus" aria-hidden="true"></i></a>',
            //             //     '<span id="lastProductId_' + y + '">' + val.putProductId + '</span>',
            //             //     '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
            //             //     '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
            //             //     '<span id="lastProductName_' + y + '">' + val.putProductName + '</span>',
            //             //     '<span id="lastPrice_' + y + '">' + val.putPrice + '</span>',
            //             //     '<span id="totalArfDetails_' + y + '">' + val.totalArfDetails + '</span>',
            //             //     '<span id="lastCurrency_' + y + '">' + val.putCurrency + '</span>',
            //             //     '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
            //             //     '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
            //             //     '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>'
            //             // ]).draw();

            //             // var t = $('#tableArfDetail').DataTable();
            //             // t.row.add([
            //             //     '<a class="btn btn-outline-success btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;" href="javascript:addToDetailSettlement()"><i class="fa fa-plus" aria-hidden="true"></i></a>',
            //             //     '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-blue" style="width: 90%;"></div></div><small><center>90 %</center></small>',
            //             //     '<span id="lastProductId">' + val.putProductId + '</span>',
            //             //     '<span id="lastProductName">' + val.putProductName + '</span>',
            //             //     '<span id="lastUom">' + val.putUom + '</span>',
            //             //     '<span id="lastPrice">' + val.putPrice + '</span>',
            //             //     '<span id="lastQty">' + val.putQtys + '</span>',
            //             //     '<span id="totalArfDetails">' + val.totalArfDetails + '</span>',
            //             //     '<span id="lastCurrency">' + val.putCurrency + '</span>',
            //             //     '<span id="lastRemark">' + val.putRemark + '</span>',
            //             //     '<span id="lastRemark">' + val.putRemark + '</span>',
            //             // ]).draw();

            //         });
            //     },
            //     error: function(data) {
            //         Swal.fire("Error !", "Data Gagal Ditambahkan", "error");
            //     }
            // });

        });
    });
</script> -->


<!-- <script>
    function cek() {
        $("#brfhide1").show();
        $("#brfhide5").show();
        $("#budgetNameArf").val("ARF-0001");
    }
</script> -->







<!-- <script type="text/javascript">

        $.ajax({
            type: "GET",
            url: '{{ route("getSite") }}',
            data: json_object,
            contentType: "application/json",
            processData: true,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(data) {

                $.each(data, function(key, val) {
                    var no = 1 ;
                    var t = $('#tableGetSite').DataTable();
                    t.row.add([
                        '<span id="">' + no++ + '</span>',
                        '<span id="">' + val.sys_ID + '</span>',
                        '<span id="">' + val.sys_Text + '</span>'
                    ]).draw();

                
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Cancelled", "Data Eror");
            }
        });
    </script> -->