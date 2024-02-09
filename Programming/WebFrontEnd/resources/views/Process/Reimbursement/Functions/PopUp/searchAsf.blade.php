<div id="mySearchAsf" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose ASF</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableSearchAsfRevision">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>ARF Number</th>
                                            <th>Project Code</th>
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
                                                    <p data-dismiss="modal" class="klikSearchAsf" data-id="ARF-00{{ $i }}" data-name="Project Name {{ $i }}">ARF-00{{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchAsf" data-id="trano {{ $i }}" data-arfNumber="Arf Number {{ $i }}">ARF Number {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchAsf" data-id="trano {{ $i }}" data-projectId="projeck_id {{ $i }}">Project ID {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchAsf" data-id="trano {{ $i }}" data-projectName="project_name {{ $i }}">Project Name {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchAsf" data-id="trano {{ $i }}" data-siteCode="site_code {{ $i }}">Site Code {{$i}}</p>
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
    function searchAsfNumberRevision() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("asf_number_revision");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableSearchAsfRevision`");
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
    function searchArfNumberRevision() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("arf_number_revision");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableSearchAsfRevision`");
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

    function searchAsfProjectCodeRevision() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("project_code_asf_revision");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableSearchAsfRevision`");
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

    function searchAsfSiteCodeRevision() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("site_code_asf_revision");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableSearchAsfRevision`");
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
        $(".klikSearchAsf").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            var code = $this.data("id");
            var name = $this.data("name");
            $("#searchAsfNumberRevision").val(code);
        });
    });
</script>