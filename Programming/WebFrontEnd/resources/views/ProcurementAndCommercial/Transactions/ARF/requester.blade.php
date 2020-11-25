<!--|----------------------------------------------------------------------------------|
    |                               Function My Requester                              |
    |----------------------------------------------------------------------------------|-->
    <div id="myRequesterNameArf" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <table>
                                <tr>
                                <td><label>Name</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="req_name_arf" onkeyup="myFunction()">
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
                                    <table class="table table-head-fixed text-nowrap" id="reqArf">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no=1; @endphp
                                            @for($i = 0; $i < 20; $i++)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><span class="tag tag-success tombolRequestArf"><p id="kata4" data-dismiss="modal"> Pending {{$i}}</p></span></td>
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
    |                             End Funtion My Requester                             |
    |----------------------------------------------------------------------------------|-->

    <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("req_name_arf");
  filter = input.value.toUpperCase();
  table = document.getElementById("reqArf");
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