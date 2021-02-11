<div id="mySearchArf" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose ARF</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <table>
                            <tr>
                                <td><label>No Trans</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="no_trans" onkeyup="searchNoTrans()">
                                        <br><br>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td><label>Project Code</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="project_code_asf" onkeyup="searchAsfProjectCode()">
                                        <br><br><br>
                                    </div>
                                </td>
                                <td><label>Site Code</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="site_code_asf" onkeyup="searchAsfSiteCode()">
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
                                <table class="table table-head-fixed text-nowrap" id="searchAsfTable">
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
                                        @for($i = 1; $i < 20; $i++) <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id="trano {{ $i }}" data-name="Project Name {{ $i }}">Trano {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id="trano {{ $i }}" data-projectId="projeck_id {{ $i }}">Project ID {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id="trano {{ $i }}" data-projectName="project_name {{ $i }}">Project Name {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id="trano {{ $i }}" data-siteCode="site_code {{ $i }}">Site Code {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <p data-siteName="site_name {{ $i }}">Site Name {{$i}}</p>
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
        table = document.getElementById("searchAsfTable");
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
        table = document.getElementById("searchAsfTable");
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
        table = document.getElementById("searchAsfTable");
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
            var code = $this.data("id");
            var name = $this.data("name");
            $("#managerUid").val(code);
            $("#managerName").val(name);
            $("#searchArfNumberRevision").val(code);
        });
    });
</script>
<!-- 
<script>
    var x = 1,y = 0;

    $(".klikSearchArfTrano").on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var trano = $this.data("trano");
        var projectId = $this.data("projectId");
        alert(projectId);
        var ProjectName = $this.data("ProjectName");
        var siteCode = $this.data("siteCode");
        var siteName = $this.data("siteName");

        var datas = [];

        for (var i = 1; i <= x; i++) {
            var data = {
                trano: $this.data("trano"),
                projectId: $this.data("projectId"),
                ProjectName: $this.data("ProjectName"),
                siteCode: $this.data("siteCode"),
                siteName: $this.data("siteName"),
            }
            datas.push(data);
        }

        var json_object = JSON.stringify(datas);
        console.log(json_object);

        $.ajax({
            type: "POST",
            url: '{{route('ARF.store')}}',
            data: json_object,
            contentType: "application/json",
            processData: true,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(data) {
                Swal.fire("Success !", "Data Berhasil Ditambahkan", "success");
                console.log(data);
                y++;
                $.each(data, function(key, val) {
                    $('#tableArfListCart').append('<tr id="control-group"><td><center><button class="btn btn-outline-danger btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;"><i class="fa fa-trash"></i></button></center></td><td><span id="lastWorkId_' + y + '">' + val.putWorkId + '</span></td><td><span id="lastWorkName_' + y + '">' + val.putWorkName + '</span></td><td><span id="lastProductId_' + y + '">' + val.putProductId + '</span></td><td><span id="lastProductName_' + y + '">' + val.putProductName + '</span></td><td><input name="qty" style="border-radius:0;width:50px;border:1px solid white;" type="text" class="form-control ChangeQtys" autocomplete="off" id="lastQty_' + y + '" value=' + val.putQty + '></td><td><span id="lastUom_' + y + '">' + val.putUom + '</span></td><td><span id="lastPrice_' + y + '">' + val.putPrice + '</span></td><td><span id="totalArfDetails_' + y + '">' + val.totalArfDetails + '</span></td><td><span id="lastCurrency_' + y + '">' + val.putCurrency + '</span></td><td><span id="lastRemark_' + y + '">' + val.putRemark + '</span></td></tr>');

                    $('.ChangeQtys').keyup(function() {

                        var qtyReq = $(this).val();
                        if (qtyReq == 0 || qtyReq == '') {
                            qtyReq = 0;
                        }
                        var putQty = val.putQtys;
                        var putPrice = val.putPrice;
                        var total = parseFloat(putQty * putPrice);
                        var total2 = parseFloat(qtyReq * putPrice);

                        if (qtyReq == '') {
                            $("#buttonArfList").prop("disabled", true);
                            $("#saveArfList").prop("disabled", true);
                        } else if (total2 > total) {
                            Swal.fire("Error !", "Your Request Is Over Budget", "error");
                            $('#totalArfDetails_' + y + '').html(0);
                            $("#saveArfList").prop("disabled", true);
                        } else {
                            var totalReq = parseFloat(total2).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                            $('#totalArfDetails_' + y + '').html(totalReq);
                            $("#saveArfList").prop("disabled", false);
                        }

                    });

                });
            },
            error: function(data) {
                Swal.fire("Error !", "Data Gagal Ditambahkan", "error");
            }
        });

    });


    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    $('.add_field_button').click(function() {
        cek = 0;
        addColomn();
    });

    function addColomn() { //on add input button click
        if (cek == 0) {
            cek++;
            x++; //text box increment
            $(wrapper).append(

                '<div class="col-md-12">' +
                '<div class="form-group">' +
                '<div class="input-group control-group" style="width:105%;position:relative;right:8px;">' +
                '<input type="file" class="form-control filenames" id="filenames_' + x + '" style="height:26px;">' +
                '<div class="input-group-btn">' +
                '<button class="btn btn-outline-secondary btn-sm remove_field" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>'

            ); //add input box                
        }
    }

    $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $(this).parent().parent().parent('div').remove();
        x--;
    })
</script> -->