<div id="mySearchPO" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
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
                                <td><label>PO Number</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="po_number" onkeyup="searchPOnumber()">
                                        <br><br>
                                    </div>
                                </td>
                                <td><label>PR Number</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="pr_number" onkeyup="searchPRnumber()">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Project Code</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="project_code" onkeyup="searchProjectCode()">
                                        <br><br>
                                    </div>
                                </td>
                                <td><label>Site Code</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="site_code" onkeyup="searchSitecode()">
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
                                <table class="table table-head-fixed text-nowrap" id="searchPOTable">
                                    <thead>
                                        <tr>
                                            <th>Trano</th>
                                            <th>PR Number</th>
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>Site Code</th>
                                            <th>Site Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @for($i = 1; $i < 20; $i++) 
                                            <tr>
                                                <td>
                                                    <span class="tag tag-success">
                                                        <p data-dismiss="modal" class="klikSearchPO" data-id="trano {{ $i }}">Trano {{$i}}</p>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="tag tag-success">
                                                        <p data-dismiss="modal" class="klikSearchPO" data-id="trano {{ $i }}">PR Number {{$i}}</p>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="tag tag-success">
                                                        <p data-dismiss="modal" class="klikSearchPO" data-id="projeck_id {{ $i }}">Project ID {{$i}}</p>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="tag tag-success">
                                                        <p data-dismiss="modal" class="klikSearchPO" data-id="project_name {{ $i }}">Project Name {{$i}}</p>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="tag tag-success">
                                                        <p data-dismiss="modal" class="klikSearchPO" data-id="site_code {{ $i }}" data-name="site_name {{ $i }}">Site Code {{$i}}</p>
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
    function searchPOnumber() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("po_number");
        filter = input.value.toUpperCase();
        table = document.getElementById("searchPOTable");
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

    function searchPRnumber() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("pr_number");
        filter = input.value.toUpperCase();
        table = document.getElementById("searchPOTable");
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

    function searchProjectCode() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("project_code");
        filter = input.value.toUpperCase();
        table = document.getElementById("searchPOTable");
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
    function searchSiteCode() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("site_code");
        filter = input.value.toUpperCase();
        table = document.getElementById("searchPOTable");
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
            var PO_Number = $this.data("po_number");
            var PR_Number = $this.data("pr_number");
            var Project_code = $this.data("project_code");
            var Site_code = $this.data("site_code");
            $("#PO_Number").val(PO_Number);
            $("#PR_number").val(PR_number);
            $("#Project_Code").val(Project_Code);
        });
    });
</script>