<div id="mySearchBrf" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose No Trans</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="TableSearchBrfInBsf">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>BRF No</th>
                                            <th>BRFP No</th>
                                            <th>Project Code</th>
                                            <th>Project Name</th>
                                            <th>Site Code</th>
                                            <th>Site Name</th>
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


<!-- <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('.mySearchBrf').on('click', function(e) {
            e.preventDefault();
            
            $.ajax({
                type: 'GET',
                url: '{!! route("BusinessTripSettlement.BusinessTripSettlementListData") !!}',
                success: function(data) {
                    var no = 1; t = $('#TableSearchBrfInBsf').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        t.row.add([
                            '<tbody><tr><td>' + no++ + '</td>',
                            '<td><span data-dismiss="modal" onclick="KlikSearchBusinessTripRequest(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\');">' + val.documentNumber + '</span></td>',
                            '<td><span data-dismiss="modal" onclick="KlikSearchBusinessTripRequest(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\');">' + val.documentNumber + '</span></td>',
                            '<td><span data-dismiss="modal" onclick="KlikSearchBusinessTripRequest(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\');">' + val.combinedBudget_RefID + '</span></td>',
                            '<td><span data-dismiss="modal" onclick="KlikSearchBusinessTripRequest(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\');">' + val.combinedBudgetName + '</span></td>',
                            '<td><span data-dismiss="modal" onclick="KlikSearchBusinessTripRequest(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\');">' + val.combinedBudgetSection_RefID + '</span></td>',
                            '<td><span data-dismiss="modal" onclick="KlikSearchBusinessTripRequest(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\');">' + val.combinedBudgetSectionName + '</td></tr></tbody>'
                        ]).draw();

                    });
                }
            });
        });

    });
</script> -->

<!-- <script>
    $(function() {
        $(".klikSearchBrf").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            var code = $this.data("id");
            $("#arfNumberAsf").val(code);
            $("#brf_number").val(code);
            $(".tableArfDetail").show();
            $("#buttonDetailBsf").prop("disabled", false);

            //Batas

            $("#arfNumberAsf").prop("disabled", true);
            $("#requester").val("requester 1");
            $("#managerUid").val("Manager 1");
            $("#managerName").val("Manager Detail 1");
            $("#currencyCode").val("IDR");
            $("#financeUid").val("finance 1");
            $("#financeName").val("Finance Detail 1");
            $("#remark").val("Remark 1");
            $("#total").val("100000");
            $("#totalDetail").val("Rp");

            $("#tranoHide").val("BRF-001");
            $("#productIdHide").val("PRO-001");
            $("#productNameHide").val("Besi");
            $("#uomHide").val("LS");

            var trano = $("#tranoHide").val();
            var work_id = "TRANO-001";
            var work_name = "Trano Name 1";
            var product_id = $("#productIdHide").val();
            var productName = $("#productNameHide").val();
            var uom = $("#uomHide").val();
            var price = "1,000,000";
            var qty = "2";
            var total = "2,000,000";
            var currency = "Rp";
            var remark = "Test 1";


            var html = '<tr>'+
                            '<td>'+
                            '<center><a class="btn btn-outline-success btn-rounded btn-sm my-0 addAsf" style="border-radius: 100px;"><i class="fa fa-plus"></i></a></center>'+
                            '</td>'+
                            '<td>'+trano+'</td>'+
                            '<td>'+work_id+'</td>'+
                            '<td>'+work_name+'</td>'+
                            '<td>'+product_id+'</td>'+
                            '<td>'+productName+'</td>'+
                            '<td>'+uom+'</td>'+
                            '<td>'+price+'</td>'+
                            '<td>'+qty+'</td>'+
                            '<td>'+total+'</td>'+
                            '<td>'+currency+'</td>'+
                            '<td>'+remark+'</td>'+
                            '<td>'+product_id+'</td>'+
                        '</tr>';
                
            $('table.tableBrfListCart tbody').append(html);

        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("body").on("click", ".addAsf", function() {

            $(".detailASF").show();

            $("#brf_number2").val($("#tranoHide").val());
            $("#brf_date").val("23-02-2021");
            $("#projectcode").val("041111101");
            $("#projectcode2").val("PLN");
            $("#sitecode").val("001");
            $("#sitecode2").val("Bogor");
            $("#cfs_code").val("x");
            $("#total_arf").val("11000000");
            $("#total_arf2").val("IDR");
            $("#total_bsf").val("12000000");
            $("#total_bsf2").val("IDR");
            $("#balance").val("1000000");
            $("#balance2").val("IDR");
            $("#qty_expense").val("1");
            $("#qty_expense2").val("ls");
            $("#price_expense").val("500000");
            $("#price_expense2").val("IDR");
            $("#total_expense").val("500000");
            $("#total_expense2").val("IDR");
            $("#qty_amount").val("1");
            $("#qty_amount2").val("ls");
            $("#price_amount").val("500000");
            $("#price_amount2").val("IDR");
            $("#total_amount").val("500000");
            $("#total_amount2").val("IDR");

        });
    });
</script> -->