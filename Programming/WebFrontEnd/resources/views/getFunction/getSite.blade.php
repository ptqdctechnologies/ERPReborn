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

            var $this = $(this);
            var code = $this.data("id");
            var name = $this.data("name");
            $("#sitecode").val(code);
            $("#sitename").val(name);

            //Batas

            $("#arfNumberAsf").prop("disabled", true);

            $("#requester").val("requester 1");
            $("#managerAsfUid").val("Manager 1");
            $("#managerAsfName").val("Manager Detail 1");
            $("#currency").val("IDR");
            $("#financeArfUid").val("finance 1");
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
                    subprojectc: "x",
                    subprojectn: "x",
                    beneficiary: "x",
                    bank_name: "x",
                    account_name: "x",
                    account_number: "x",
                    internal_notes: "x",
                    requestNameArf: "x",
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
                url: '{{route('BRF.store')}}',
                data: json_object,
                contentType: "application/json",
                processData: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    y++;
                    $.each(data, function(key, val) {
                        $('#tableBudgetBrf').append('<tr id="control-group"><td><center><a class="btn btn-outline-success btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;" href="javascript:cek()"><i class="fa fa-plus" aria-hidden="true"></i></a></center></td><td><span id="lastWorkId_' + y + '">' + val.putWorkId + '</span></td><td><span id="lastWorkName_' + y + '">' + val.putWorkName + '</span></td><td><span id="lastProductId_' + y + '">' + val.putProductId + '</span></td><td><span id="lastProductName_' + y + '">' + val.putProductName + '</span></td><td><span id="lastRemark_' + y + '">' + val.putRemark + '</span></td><td><span id="lastUom_' + y + '">' + val.putUom + '</span></td><td><span id="lastPrice_' + y + '">' + val.putPrice + '</span></td><td><span id="totalArfDetails_' + y + '">' + val.totalArfDetails + '</span></td></tr>');
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