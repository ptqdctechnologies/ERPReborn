<div id="mySearchBOQ2" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">BOQ2 List</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="poTable">
                                    <thead>
                                        <tr>
                                            <th>Trano</th>
                                            <th>Project Code</th>
                                            <th>Project Name</th>
                                            <th>Site Code</th>
                                            <th>Site Name</th>
                                            <th>Date</th>
                                            <th>Value IDR</th>
                                            <th>Value USD</th>
                                            <th>PO Customer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @for($i = 1; $i < 4; $i++) <tr>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal">{{ $no++ }}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" data-id="0898998 {{ $i }}">Project Code {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" data-id="0898998 {{ $i }}">Project Name {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" data-id="0898998 {{ $i }}">Site Code {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" data-id="0898998 {{ $i }}">Site Name {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" data-id="0898998 {{ $i }}">Date {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" data-id="0898998 {{ $i }}">Value IDR {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" data-id="0898998 {{ $i }}">Value USD {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" data-id="Q00018{{ $i }}">PO Customer{{$i}}</p>
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
    function searchTranoNoPo() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("trano_no_po");
        filter = input.value.toUpperCase();
        table = document.getElementById("poTable");
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

    function searchProjectCodePo() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("project_code_po");
        filter = input.value.toUpperCase();
        table = document.getElementById("poTable");
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

    function searchSiteCodePo() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("site_code_po");
        filter = input.value.toUpperCase();
        table = document.getElementById("poTable");
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
        $(".klikSectBOQ2").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            var code = $this.data("id");
            var name = $this.data("name");
            $("#register_co").val(code);

            //Batas
        });
    });
</script>