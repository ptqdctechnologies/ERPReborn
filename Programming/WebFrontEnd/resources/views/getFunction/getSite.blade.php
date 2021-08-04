<div id="mySiteCode" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Site Code</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <table>
                            <tr>
                                <td><label>Sub Code</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="sub_code" onkeyup="siteProjectArfCode()">
                                    </div>
                                </td>
                                <td><label>Sub Name</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="sub_name" onkeyup="siteProjectArfName()">
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
                                <table class="table table-head-fixed text-nowrap" id="siteArf">
                                    <thead>
                                        <tr>
                                            <th>No</th>
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
                                                    <p data-dismiss="modal" class="klikSiteArf" data-id="Site Code {{ $i }}" data-name="Site Name {{ $i }}">Site Code {{$i}}</p>
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
    |                            End Function Sub Project Code                         |
    |----------------------------------------------------------------------------------|-->

<script>
    function siteProjectArfCode() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("sub_code");
        filter = input.value.toUpperCase();
        table = document.getElementById("siteArf");
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

    function siteProjectArfName() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("sub_name");
        filter = input.value.toUpperCase();
        table = document.getElementById("siteArf");
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
</script>


<script>
    y = 0;
    $(function() {
        $(".klikSiteArf").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            $("#brfhide3").show();
            $(".pageArfBoq").show();
            $(".pageDetailTransaction").show();
            $("#showContentBOQ").show();
            $("#arfTableDisableEnable").show();
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
                }
                datas.push(data);
            }

            var json_object = JSON.stringify(datas);
            // console.log(json_object);

            $.ajax({
                type: "POST",
                url: '{{route("BRF.store")}}',
                data: json_object,
                contentType: "application/json",
                processData: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    y++;
                    $.each(data, function(key, val) {

                        var t = $('#tableBudgetBrf').DataTable();
                        t.row.add([
                            '<a class="btn btn-outline-success btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;" href="javascript:cek()"><i class="fa fa-plus" aria-hidden="true"></i></a>',
                            '<span id="lastProductId_' + y + '">' + val.putProductId + '</span>',
                            '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                            '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                            '<span id="lastProductName_' + y + '">' + val.putProductName + '</span>',
                            '<span id="lastPrice_' + y + '">' + val.putPrice + '</span>',
                            '<span id="totalArfDetails_' + y + '">' + val.totalArfDetails + '</span>',
                            '<span id="lastCurrency_' + y + '">' + val.putCurrency + '</span>',
                            '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                            '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                            '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>'
                        ]).draw();

                        var t = $('#tableArfDetail').DataTable();
                        t.row.add([
                            '<a class="btn btn-outline-success btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;" href="javascript:addToDetailSettlement()"><i class="fa fa-plus" aria-hidden="true"></i></a>',
                            '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-blue" style="width: 90%;"></div></div><small><center>90 %</center></small>',
                            '<span id="lastProductId">' + val.putProductId + '</span>',
                            '<span id="lastProductName">' + val.putProductName + '</span>',
                            '<span id="lastUom">' + val.putUom + '</span>',
                            '<span id="lastPrice">' + val.putPrice + '</span>',
                            '<span id="lastQty">' + val.putQtys + '</span>',
                            '<span id="totalArfDetails">' + val.totalArfDetails + '</span>',
                            '<span id="lastCurrency">' + val.putCurrency + '</span>',
                            '<span id="lastRemark">' + val.putRemark + '</span>',
                            '<span id="lastRemark">' + val.putRemark + '</span>',
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


<script>
    function cek() {
        $("#brfhide1").show();
        $("#brfhide5").show();
        $("#budgetNameArf").val("ARF-0001");
    }
</script>

<script type="text/javascript">
    function addToDetailSettlement() {

        $("#addAsfListCart").prop("disabled", false);
        $(".detailASF").show();
        $("#arf_number").val($('#arfNumberAsf').val());
        $("#arf_date").val("23-02-2021");
        $("#cfs_code").val("x");
        

        // var balance = $('#total').val() - $('#totalArfDetails').html();
        // var balance = totalBalance.toFixed(0).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        $("#total_arf").val("2000000");
        $("#total_arf2").val("IDR");
        $("#total_asf").val("1000000");
        $("#total_asf2").val("IDR");

        $("#balance").val("1000000");
        $("#balance2").val("IDR");
        $("#qty_expense2").val("Ls");
        $("#price_expense2").val("IDR");
        $("#total_expense2").val("IDR");
        $("#qty_amount2").val("Ls");
        $("#price_amount2").val("IDR");
        $("#total_amount2").val("IDR");

    };
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