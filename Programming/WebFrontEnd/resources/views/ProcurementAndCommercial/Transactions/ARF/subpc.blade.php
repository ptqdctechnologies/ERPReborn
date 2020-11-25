<!--|----------------------------------------------------------------------------------|
    |                              Function Sub Project Code                           |
    |----------------------------------------------------------------------------------|-->
    <div id="mySPC" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Choose Sub Project Code</h4>
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
                                <div class="card-body table-responsive p-0" style="height: 450px;">
                                    <table class="table table-head-fixed text-nowrap" id="siteArf">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Project Code</th>
                                                <th>Project Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no=1; @endphp
                                            @for($i = 0; $i < 20; $i++)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><span class="tag tag-success tombolSubProject"><p id="kata2" data-dismiss="modal"> Pending</p></span></td>
                                                <td><p id="kata3">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</p></td>
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
    td = tr[i].getElementsByTagName("td")[0];
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
</script>