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
                                <table class="table table-head-fixed text-nowrap" id="tableSearchArf">
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
                                        @php $no=1; @endphp
                                        @for($i = 1; $i < 5; $i++) <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="ARF-000{{ $i }}" data-id2="P000{{ $i }}" data-id3="Besi {{ $i }}" data-id4="S000{{ $i }}" data-id5="Test {{ $i }}">ARF-000{{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="ARF-000{{ $i }}" data-id2="P000{{ $i }}" data-id3="Besi {{ $i }}" data-id4="S000{{ $i }}" data-id5="Test {{ $i }}">P000{{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="ARF-000{{ $i }}" data-id2="P000{{ $i }}" data-id3="Besi {{ $i }}" data-id4="S000{{ $i }}" data-id5="Test {{ $i }}">Besi {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="ARF-000{{ $i }}" data-id2="P000{{ $i }}" data-id3="Besi {{ $i }}" data-id4="S000{{ $i }}" data-id5="Test {{ $i }}">S000{{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="ARF-000{{ $i }}" data-id2="P000{{ $i }}" data-id3="Besi {{ $i }}" data-id4="S000{{ $i }}" data-id5="Test {{ $i }}">Test {{$i}}</p>
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
        $(".klikSearchArf").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            $("#arfNumberAsf").val($this.data("id1"));
            $("#hideProjectId").val($this.data("id2"));
            $("#hideProjectName").val($this.data("id3"));
            $("#hideSiteCode").val($this.data("id4"));
            $("#hideSiteName").val($this.data("id5"));


            //Batas

            $("#arfNumberAsf").prop("disabled", true);
            $("#requester").val("requester 1");
            $("#managerAsfUid").val("Manager 1");
            $("#managerAsfName").val("Manager Detail 1");
            $("#currencyCode").val("IDR");
            $("#financeUid").val("finance 1");
            $("#financeName").val("Finance Detail 1");
            $("#remark").val("Remark 1");
            $("#total").val("90000000");
            $("#totalDetail").val("IDR");

            //End batas

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
                    putProductId: "820001-0000",
                    putProductName: "Salaries",
                    putQty: "4",
                    putQtys: "4",
                    putUom: "Ls",
                    putPrice: "20.000.000",
                    putCurrency: "IDR",
                    totalArfDetails: "80000000",
                    putRemark: "Test",
                    filenames: "x",
                    trano: $('#arfNumberAsf').val(),
                }
                datas.push(data);
            }

            var json_object = JSON.stringify(datas);
            // console.log(json_object);

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
                    y++;
                    $.each(data, function(key, val) {

                        var t = $('#tableArfDetail').DataTable();
                        t.row.add([
                            '<center><button class="btn btn-outline-success btn-rounded btn-sm my-0 remove-val-list remove-attachment addToDetailSettlement" style="border-radius: 100px;"><i class="fa fa-plus"></i></button></center>',
                            '<span id="lastProductId">' + val.putProductId + '</span>',
                            '<span id="lastProductName">' + val.putProductName + '</span>',
                            '<span id="lastUom">' + val.putUom + '</span>',
                            '<span id="lastPrice">' + val.putPrice + '</span>',
                            '<span id="lastQty">' + val.putQtys + '</span>',
                            '<span id="totalArfDetails">' + val.totalArfDetails + '</span>',
                            '<span id="lastCurrency">' + val.putCurrency + '</span>',
                            '<span id="lastRemark">' + val.putRemark + '</span>',
                            '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-blue" style="width: 90%;"></div></div><small><center>90 %</center></small>'
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
        $("body").on("click", ".addToDetailSettlement", function() {

            $("#addAsfListCart").prop("disabled", false);
            $(".detailASF").show();
            $("#arf_number").val($('#arfNumberAsf').val());
            $("#arf_date").val("23-02-2021");
            $("#projectcode").val($('#hideProjectId').val());
            $("#projectcode2").val($('#hideProjectName').val());
            $("#sitecode").val($('#hideSiteCode').val());
            $("#sitecode2").val($('#hideSiteName').val());
            $("#cfs_code").val("x");
            $("#total_arf").val($('#total').val());
            $("#total_arf2").val("IDR");
            $("#total_asf").val($('#totalArfDetails').html());
            $("#total_asf2").val("IDR");
            
            var balance = $('#total').val() - $('#totalArfDetails').html();
            // var balance = totalBalance.toFixed(0).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            
            $("#balance").val(balance);
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