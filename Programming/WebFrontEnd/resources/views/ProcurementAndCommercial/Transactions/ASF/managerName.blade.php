<div id="myManagerAsf" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><label for=""> Choose Manager</label></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <table>
                            <tr>
                              <td><label>Uid</label></td>
                              <td>
                                <div class="input-group">
                                    <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="manager_asf_uid" onkeyup="managerAsfUid()">
                                </div>
                              </td>
                              <td><label>Name</label></td>
                              <td>
                                <div class="input-group">
                                    <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="manager_asf_name" onkeyup="managerAsfName()">
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
                                    <table class="table table-head-fixed text-nowrap" id="managerAsf">
                                            <tr>
                                                <th>No</th>
                                                <th>Manager Uid</th>
                                                <th>Manager Name</th>
                                            </tr>
                                        
                                            @php $no=1; @endphp
                                            @for($i = 0; $i < 20; $i++)
                                            <tr>
                                              <td>{{ $no++ }}</td>
                                                <td><span class="tag tag-success tombolAsfManager"><p id="kata6" data-dismiss="modal"> Approved</p></span></td>
                                                <td><p id="kata7">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</p></td>
                                            </tr>
                                            @endfor
                                            @php $no=1; @endphp
                                            @for($i = 0; $i < 20; $i++)
                                            <tr>
                                              <td>{{ $no++ }}</td>
                                                <td><span class="tag tag-success tombolAsfManager"><p id="kata6" data-dismiss="modal"> aku</p></span></td>
                                                <td><p id="kata7">done</p></td>
                                            </tr>
                                            @endfor
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





<script>
function managerAsfUid() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("manager_asf_uid");
  filter = input.value.toUpperCase();
  table = document.getElementById("managerAsf");
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
function managerAsfName() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("manager_asf_name");
  filter = input.value.toUpperCase();
  table = document.getElementById("managerAsf");
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