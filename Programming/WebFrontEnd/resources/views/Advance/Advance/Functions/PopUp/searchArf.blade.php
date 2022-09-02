<div id="mySearchArf" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Advance Request</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableSearchArfinAsf">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php $no = 1 @endphp
                                        @foreach($dataAdvanceRequest as $dataAdvanceRequests)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$dataAdvanceRequests['sys_ID']}}" data-id2="{{$dataAdvanceRequests['documentNumber']}}" data-id3="{{$dataAdvanceRequests['combinedBudgetSection_RefID']}}">{{$dataAdvanceRequests['documentNumber']}}</p>
                                            </td>
                                            <td>
                                                <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$dataAdvanceRequests['sys_ID']}}" data-id2="{{$dataAdvanceRequests['documentNumber']}}" data-id3="{{$dataAdvanceRequests['combinedBudgetSection_RefID']}}">{{$dataAdvanceRequests['combinedBudget_RefID']}}</p>
                                            </td>
                                            <td>
                                                <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$dataAdvanceRequests['sys_ID']}}" data-id2="{{$dataAdvanceRequests['documentNumber']}}" data-id3="{{$dataAdvanceRequests['combinedBudgetSection_RefID']}}">{{$dataAdvanceRequests['combinedBudgetName']}}</p>
                                            </td>
                                            <td>
                                                <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$dataAdvanceRequests['sys_ID']}}" data-id2="{{$dataAdvanceRequests['documentNumber']}}" data-id3="{{$dataAdvanceRequests['combinedBudgetSection_RefID']}}">{{$dataAdvanceRequests['combinedBudgetSection_RefID']}}</p>
                                            </td>
                                            <td>
                                                <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$dataAdvanceRequests['sys_ID']}}" data-id2="{{$dataAdvanceRequests['documentNumber']}}" data-id3="{{$dataAdvanceRequests['combinedBudgetSection_RefID']}}">{{$dataAdvanceRequests['combinedBudgetSectionName']}}</p>
                                            </td>
                                        </tr>
                                        @endforeach
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
<!--|----------------------------------------------------------------------------------|
    |                            End Function My Project Code                          |
    |----------------------------------------------------------------------------------|-->

<script>
    $(function() {
        $(".klikSearchArf").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            $("#advance_number").val($this.data("id1"));
            $("#hideProjectId").val($this.data("id2"));
            $("#hideProjectName").val($this.data("id3"));
            $("#hideSiteCode").val($this.data("id4"));
            $("#hideSiteName").val($this.data("id5"));

            //Batas
            $("#advance_number").prop("disabled", true);
            $("#requester").val($this.data("id1"));
            $("#tableShowHideArfDetail").show();

            //End batas
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var advance_RefID = $this.data("id1");
            var advance_number = $this.data("id2");

            $.ajax({
                type: "POST",
                url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlementRequester") !!}?RequesterId=' + $("#requester").val(),
                success: function(data) {
                    if (data == "200") {
                        $.ajax({
                            type: "POST",
                            url: '{!! route("AdvanceRequest.AdvanceListCartRevision") !!}?advance_RefID=' + advance_RefID,
                            success: function(data) {

                                $.each(data, function(key, value) {
                                    $("#product_id2").prop("disabled", true);
                                    var html =
                                        '<tr>' +
                                        '<td style="border:1px solid #e9ecef;width:5%;">' +
                                        '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs AddToDetailSettlement" data-dismiss="modal" data-id1="' + advance_number + '" data-id2="' + value.quantity + '" data-id3="' + value.productUnitPriceCurrencyValue + '" data-id4="' + value.priceBaseCurrencyValue + '" data-id5="' + value.priceCurrencyISOCode + '" data-id6="' + value.quantityUnitName + '" data-id7="' + value.product_RefID + '" data-id8="' + value.productName + '" data-id9="' + value.remarks + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="18" alt="" title="Add"></button> ' +
                                        '<input type="hidden" name="var_product_id[]" value="' + value.product_RefID + '">' +
                                        '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + value.productName + '">' +
                                        '<input type="hidden" name="var_quantity[]" value="' + value.quantity + '">' +
                                        '<input type="hidden" name="var_uom[]" value="' + value.quantityUnitName + '">' +
                                        '<input type="hidden" name="var_price[]" value="' + value.productUnitPriceCurrencyValue + '">' +
                                        '<input type="hidden" name="var_currency[]" value="' + value.priceCurrencyISOCode + '">' +
                                        '<input type="hidden" name="var_combinedBudget[]" value="' + value.combinedBudgetSectionDetail_RefID + '">' +
                                        '<input type="hidden" name="var_recordIDDetail[]" value="' + value.sys_ID + '">' +
                                        '</td>' +
                                        '<td style="border:1px solid #e9ecef;">' +
                                        '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>' +
                                        '</td>' +
                                        '<td style="border:1px solid #e9ecef;">' + advance_number + '</td>' +
                                        '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                                        '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                                        '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                                        '<td style="border:1px solid #e9ecef;">' + 'N/A' + '</td>' +
                                        '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                                        '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                                        '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                                        '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                                        '<td style="border:1px solid #e9ecef;">' + value.remarks + '</td>' +
                                        '</tr>';

                                    $('table.tableArfDetail tbody').append(html);
                                });

                                $("body").on("click", ".AddToDetailSettlement", function() {
                                    $("#tableShowHideArfDetail").find("input,button,textarea,select").attr("disabled", true);
                                    $("#detailASF").show();

                                    var $this = $(this);
                                    $("#arf_number").val($this.data("id1"));
                                    $("#arf_date").val("23-02-2021");
                                    $("#qty_expense").val($this.data("id2").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                                    $("#put_qty_expense").val($this.data("id2"));
                                    $("#TotalQty").val($this.data("id2"));
                                    $("#qty_expense2").val($this.data("id6"));
                                    $("#price_expense").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                                    $("#put_price_expense").val($this.data("id3"));
                                    $("#price_expense2").val($this.data("id5"));
                                    $("#total_expense").val($this.data("id4").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                                    $("#total_expense2").val($this.data("id5"));
                                    $("#qty_amount").val("0.00");
                                    $("#qty_amount2").val($this.data("id6"));
                                    $("#price_amount").val("0.00");
                                    $("#price_amount2").val($this.data("id5"));
                                    $("#total_amount").val("0.00");
                                    $("#total_amount2").val($this.data("id5"));

                                    $("#total_arf").val($this.data("id4"));
                                    $("#total_arf2").val($this.data("id5"));
                                    $("#total_asf").val("500000");
                                    $("#total_asf2").val($this.data("id5"));
                                    $("#balance").val($this.data("id4").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                                    $("#balance2").val($this.data("id5"));


                                    $("#productIdHide").val($this.data("id7"));
                                    $("#nameMaterialHide").val($this.data("id8"));
                                    $("#descriptionHide").val($this.data("id9"));


                                });

                            },
                        });
                    } else {
                        Swal.fire("Cancelled", "Please use same requester !", "error");
                    }
                },
            });

        });
    });
</script>

<!-- <script>
    $('document').ready(function() {
        $('#price_expense').keyup(function() {
            var price_expense = $(this).val();
            var qty_expense = $('#qty_expense').val();
            var total_expense = price_expense * qty_expense;
            $("#total_expense").val(total_expense);
        });
    });
</script>

<script>
    $('document').ready(function() {
        $('#price_amount').keyup(function() {
            var price_amount = $(this).val();
            var qty_amount = $('#qty_amount').val();
            var total_amount = price_amount * qty_amount;
            $("#total_amount").val(total_amount);
        });
    });
</script> -->