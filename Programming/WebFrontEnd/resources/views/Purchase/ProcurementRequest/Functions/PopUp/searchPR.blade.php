<div id="mySearchPO" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose PR</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableSearchArf">
                                    <!-- <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>PR Number</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
                                        </tr>
                                    </thead> -->
                                    <tbody>
                                        @php $no=1; @endphp
                                        @for($i = 1; $i < 5; $i++) <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <span class="tag tag-success">
                                                     <p data-dismiss="modal" class="klikSearchPR" data-id1="PR-000{{ $i }}" data-id2="PR00{{ $i }}" data-id3="Besi {{ $i }}" data-id4="S000{{ $i }}" data-id5="Test {{ $i }}">PR-220000{{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchPR" data-id1="PR-000{{ $i }}" data-id2="PR00{{ $i }}" data-id3="Besi {{ $i }}" data-id4="S000{{ $i }}" data-id5="Test {{ $i }}">Q0001{{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchPR" data-id1="PR-000{{ $i }}" data-id2="PR00{{ $i }}" data-id3="Besi {{ $i }}" data-id4="S000{{ $i }}" data-id5="Test {{ $i }}">SUTT 150 Kv Maluku</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchPR" data-id1="PR-000{{ $i }}" data-id2="PR00{{ $i }}" data-id3="Besi {{ $i }}" data-id4="S000{{ $i }}" data-id5="Test {{ $i }}">100{{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchPR" data-id1="PR-000{{ $i }}" data-id2="PR00{{ $i }}" data-id3="Besi {{ $i }}" data-id4="S000{{ $i }}" data-id5="Test {{ $i }}">Overhead</p>
                                                </span>
                                            </td>
                                            </tr>
                                            @endfor
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
    function searchNoTrans() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("no_trans");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableSearchArf");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchAsfProjectCode() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("project_code_asf");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableSearchArf");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchAsfSiteCode() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("site_code_asf");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableSearchArf");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

<script>
    $(function() {
        $(".klikSearchPO").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            $("#advance_number").val($this.data("id1"));
            $("#hideProjectId").val($this.data("id2"));
            $("#hideProjectName").val($this.data("id3"));
            $("#hideSiteCode").val($this.data("id4"));
            $("#hideSiteName").val($this.data("id5"));

            //Batas
            $("#advance_number").prop("disabled", true);
            $("#projectCode").val("Project Code 1");
            $("#supplierCode").val("Supplier Code 1");
            // $("#supplierCode").val("Supplier Code 1");
            $("#suppliername").val("Supplier Name 1");
            $("#requester").val("requester 1");
            $("#currency").val("IDR");
            $("#currencyCode").val("IDR");
            $("#invoice").val("PT QDC Technologies");
            $("#oob").val("Project");

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
                            '<td>'+
                            '<center><a class="btn btn-outline-success btn-rounded btn-sm my-0 addToDetailSettlement" style="border-radius: 100px;"><i class="fa fa-plus"></i></a></center>'+
                                // '<input type="hidden" name="var_trano[]" value="'+trano+'">'+
                                // '<input type="hidden" name="var_product_id[]" value="'+product_id+'">'+
                                // '<input type="hidden" name="var_product_name[]" value="'+putProductName+'">'+
                                // '<input type="hidden" name="var_product_id[]" value="'+product_id+'">'+
                                // '<input type="hidden" name="var_product_name[]" value="'+putProductName+'">'+
                                // '<input type="hidden" name="var_uom[]" value="'+uom+'">'+
                                // '<input type="hidden" name="var_price_amount[]" value="'+price_amount+'">'+
                                // '<input type="hidden" name="var_qty_amount[]" value="'+qty_amount+'">'+
                                // '<input type="hidden" name="var_total_amount[]" value="'+total_amount+'">'+
                                // '<input type="hidden" name="var_description[]" id="var_description[]" value="'+description+'">'+
                                // '<input type="hidden" name="var_description[]" id="var_description[]" value="'+description+'">'+
                            '</td>'+
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
            $(".detailPO").show();
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