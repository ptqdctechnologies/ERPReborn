<div id="mySearchArf" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose ARF</label>
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
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>Site Code</th>
                                            <th>Site Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php $no = 1 @endphp
                                        @foreach($data5 as $datas)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$datas['documentNumber']}}" data-id2="{{$datas['documentNumber']}}" data-id3="{{$datas['documentNumber']}}" data-id4="{{$datas['documentNumber']}}" data-id5="{{$datas['documentNumber']}}">{{$datas['documentNumber']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$datas['documentNumber']}}" data-id2="{{$datas['documentNumber']}}" data-id3="{{$datas['documentNumber']}}" data-id4="{{$datas['documentNumber']}}" data-id5="{{$datas['documentNumber']}}">{{$datas['documentNumber']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$datas['documentNumber']}}" data-id2="{{$datas['documentNumber']}}" data-id3="{{$datas['documentNumber']}}" data-id4="{{$datas['documentNumber']}}" data-id5="{{$datas['documentNumber']}}">{{$datas['documentNumber']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$datas['documentNumber']}}" data-id2="{{$datas['documentNumber']}}" data-id3="{{$datas['documentNumber']}}" data-id4="{{$datas['documentNumber']}}" data-id5="{{$datas['documentNumber']}}">{{$datas['documentNumber']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$datas['documentNumber']}}" data-id2="{{$datas['documentNumber']}}" data-id3="{{$datas['documentNumber']}}" data-id4="{{$datas['documentNumber']}}" data-id5="{{$datas['documentNumber']}}">{{$datas['documentNumber']}}</p>
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
            $("#requester").val("requester 1");
            $("#managerAsfUid").val("Manager 1");
            $("#managerAsfName").val("Manager Detail 1");
            $("#currency").val("IDR");
            $("#currencyCode").val("IDR");
            $("#financeArfUtableBudgetBrfid").val("finance 1");
            $("#financeArfName").val("Finance Detail 1");
            $("#total").val("100000");
            $("#totalDetail").val("Rp");

            //End batas

            var trano = $("#advance_number").val();
            var product_id = "PRO-0001";
            var product_name = "Besi";
            var uom = "LS";
            var price = "1,000,000";
            var qty = "2";
            var total = "2,000,000";
            var currency = "Rp";
            var description = "Test 1";

            $("#productIdHide").val(product_id);
            $("#nameMaterialHide").val(product_name);
            $("#uomHide").val(uom);
            $("#descriptionHide").val(description);


            var html = '<tr>'+
                            '<td>'+'<center><a class="btn btn-outline-success btn-rounded btn-sm my-0 addToDetailSettlement" style="border-radius: 100px;"><i class="fa fa-plus"></i></a></center>'+'</td>'+
                            '<td>'+'N/A'+'</td>'+
                            '<td>'+trano+'</td>'+
                            '<td>'+product_id+'</td>'+
                            '<td>'+product_name+'</td>'+
                            '<td>'+uom+'</td>'+
                            '<td>'+price+'</td>'+
                            '<td>'+qty+'</td>'+
                            '<td>'+total+'</td>'+
                            '<td>'+currency+'</td>'+
                            '<td>'+description+'</td>'+
                        '</tr>';
            $('table.tableArfDetail tbody').append(html);
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("body").on("click", ".addToDetailSettlement", function() {
            $("#addAsfListCart").prop("disabled", false);
            $(".detailASF").show();
            $("#arf_number").val($('#advance_number').val());
            $("#arf_date").val("23-02-2021");
            $("#cfs_code").val("x");
            $("#total_arf").val("1000000");
            $("#total_arf2").val("IDR");
            $("#total_asf").val("500000");
            $("#total_asf2").val("IDR");
            
            $("#balance").val("500000");
            $("#balance2").val("IDR");
            $("#qty_expense2").val("Ls");
            $("#price_expense2").val("IDR");
            $("#total_expense2").val("IDR");
            $("#qty_amount2").val("Ls");
            $("#price_amount2").val("IDR");
            $("#total_amount2").val("IDR");

        });
    });
</script>

<script>
    $('document').ready(function() {
        $('#price_expense').keyup(function() {
            var price_expense = $(this).val();
            var qty_expense = $('#qty_expense').val();
            var total_expense = price_expense * qty_expense;
            // var total_expense = parseFloat(price_expense * qty_expense).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
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
            // var total_amount = parseFloat(price_amount * qty_amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            $("#total_amount").val(total_amount);
        });
    });
</script>