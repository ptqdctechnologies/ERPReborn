<div id="mySearchBrf" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose No Trans</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <table>
                            <tr>
                                <td><label>BRF Number</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="brf_number" onkeyup="searchBrfNumber()">
                                        <br><br><br>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td><label>Project Code</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="project_code_brf" onkeyup="searchBrfProjectCode()">
                                        <br><br><br>
                                    </div>
                                </td>
                                <td><label>Site Code</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="site_code_brf" onkeyup="searchBrfSiteCode()">
                                        <br><br><br>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="searchBrfTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>BRF No</th>
                                            <th>BRFP No</th>
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>Site Code</th>
                                            <th>Site Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @for($i = 1; $i < 20; $i++) <tr>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal">{{ $no++ }}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchBrf" data-id="brf_no {{ $i }}">BRF No {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchBrf" data-id="brfp_no {{ $i }}">BRFP No {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchBrf" data-id="project_id {{ $i }}">Project ID {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchBrf" data-id="project_name {{ $i }}">Project Name {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchBrf" data-id="site_code {{ $i }}" data-name="site_name {{ $i }}">Site Code {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <p>Site Name {{$i}}</p>
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
    function searchBrfNumber() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("brf_number");
        filter = input.value.toUpperCase();
        table = document.getElementById("searchBrfTable");
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

    function searchBrfProjectCode() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("project_code_brf");
        filter = input.value.toUpperCase();
        table = document.getElementById("searchBrfTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
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

    function searchBrfSiteCode() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("site_code_brf");
        filter = input.value.toUpperCase();
        table = document.getElementById("searchBrfTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
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

            var datas = [];

            for (var i = 1; i <= x; i++) {
                var data = {
                    origin_budget: "x",
                    projectcode: "x",
                    projectname: "x",
                    sitecode: "x",
                    sitecode2: "x",
                    beneficiary: "x",
                    bank_name: "x",
                    account_name: "x",
                    account_number: "x",    
                    internal_notes: "x",
                    request_name: "x",
                    putWorkId: "x",
                    putWorkName: "x",
                    putProductId: "x",
                    putProductName: "x",
                    putQty: "x",
                    putQtys: "x",
                    putUom: "x",
                    putPrice: "x",
                    putCurrency: "x",
                    totalArfDetails: "x",
                    putRemark: "x",
                    filenames: "x",
                }
                datas.push(data);
            }

            var json_object = JSON.stringify(datas);
            console.log(json_object);

            $.ajax({
                type: "POST",
                url: '{{route("ARF.store")}}',
                data: json_object,
                contentType: "application/json",
                processData: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    // Swal.fire("Success !", "Data add to cart", "success");
                    y++;
                    $.each(data, function(key, val) {
                        
                        var t = $('#tableBrfListCart').DataTable();
                        t.row.add([
                            '<center><button class="btn btn-outline-success btn-rounded btn-sm my-0 remove-val-list addAsf" style="border-radius: 100px;"><i class="fa fa-plus"></i></button></center>',
                            '<span id="lastProductId_' + y + '">' + val.putProductId + '</span>',
                            '<span id="lastProductId_' + y + '">' + val.putProductId + '</span>',
                            '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                            '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                            '<span id="lastProductName_' + y + '">' + val.putProductName + '</span>',
                            '<span id="lastPrice_' + y + '">' + val.putPrice + '</span>',
                            '<span id="totalArfDetails_' + y + '">' + val.totalArfDetails + '</span>',
                            '<span id="lastCurrency_' + y + '">' + val.putCurrency + '</span>',
                            '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                            '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                            '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                            '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>'
                        ]).draw();
                    });
                },
                error: function(data) {
                    Swal.fire("Error !", "Data Gagal Ditambahkan", "error");
                }
            });

        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("body").on("click", ".addAsf", function() {

            $(".detailASF").show();

            $("#brf_number2").val("ARF-0001");
            $("#brf_date").val("23-02-2021");
            $("#projectcode").val("041111101");
            $("#projectcode2").val("PLN");
            $("#sitecode").val("001");
            $("#sitecode2").val("Bogor");
            $("#cfs_code").val("x");
            $("#total_arf").val("11,000,000");
            $("#total_arf2").val("IDR");
            $("#total_bsf").val("12,000,000");
            $("#total_bsf2").val("IDR");
            $("#balance").val("1,000,000");
            $("#balance2").val("IDR");
            $("#qty_expense").val("0,441");
            $("#qty_expense2").val("ls");
            $("#price_expense").val("26,000,000");
            $("#price_expense2").val("IDR");
            $("#total_expense").val("11,789,000");
            $("#total_expense2").val("IDR");
            $("#qty_amount").val("1,441");
            $("#qty_amount2").val("ls");
            $("#price_amount").val("22,000,000");
            $("#price_amount2").val("IDR");
            $("#total_amount").val("18,789,000");
            $("#total_amount2").val("IDR");

        });
    });
</script>