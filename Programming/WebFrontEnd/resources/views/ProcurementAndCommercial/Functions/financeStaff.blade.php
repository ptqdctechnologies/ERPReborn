<div id="myfinanceArf" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><label for=""> Choose Finance</label></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <table>
              <tr>
                <td><label>Finance Uid</label></td>
                <td>
                  <div class="input-group">
                    <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="uid_finance_arf" onkeyup="financeArfUid()">
                  </div>
                </td>
                <td><label>Finance Name</label></td>
                <td>
                  <div class="input-group">
                    <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="name_arf_finance" onkeyup="financeArfName()">
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
                <table class="table table-head-fixed text-nowrap" id="financeArf">
                  <tr>
                    <th>No</th>
                    <th>Finance Uid</th>
                    <th>Finance Name</th>
                  </tr>
                  @php $no=1; @endphp
                  @for($i = 1; $i < 20; $i++)
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>
                          <span class="tag tag-success">
                              <p data-dismiss="modal" class="klikFinanceArf" data-id="Finance Staff Uid {{ $i }}" data-name="name {{ $i }}">Finance Staff Uid {{$i}}</p>
                          </span>
                      </td>
                      <td>
                          <p>Finance Staff Name {{$i}}</p>
                      </td>
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
  function financeArfUid() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("uid_finance_arf");
    filter = input.value.toUpperCase();
    table = document.getElementById("financeArf");
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

  function financeArfName() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("name_arf_finance");
    filter = input.value.toUpperCase();
    table = document.getElementById("financeArf");
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
  $(function() {
    $(".klikFinanceArf").on('click', function(e) {
      e.preventDefault(); // in chase you change to a link or button
      var $this = $(this);
      var uid = $this.data("id");
      var name = $this.data("name");
      $("#financeArfUid").val(uid);
      $("#financeArfName").val(name);
    });
  });
</script>