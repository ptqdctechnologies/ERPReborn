<!--|----------------------------------------------------------------------------------|
    |                             Function My Project Code                             |
    |----------------------------------------------------------------------------------|-->
    <div id="myCurrency" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Choose Currency</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <table>
                                <tr>
                                <td><label>Currency Code</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="code_currency" onkeyup="searchArfCurrencyCode()">
                                    </div>
                                </td>
                                <td><label>Currency Name</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="name_currency" onkeyup="searchArfCurrencyName()">
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
                                    <table class="table table-head-fixed text-nowrap" id="currencyArf">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Currency Code</th>
                                                <th>Currency Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no=1; @endphp
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><span class="tag tag-success tombolCurrency"><p id="kata8" data-dismiss="modal"> CNY</p></span></td>
                                                <td><p id="kata9">Chinese Yuan</p></td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><span class="tag tag-success tombolCurrency"><p id="kata8" data-dismiss="modal"> EUR</p></span></td>
                                                <td><p id="kata9">Euro</p></td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><span class="tag tag-success tombolCurrency"><p id="kata8" data-dismiss="modal"> IDR</p></span></td>
                                                <td><p id="kata9">Rupiah</p></td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><span class="tag tag-success tombolCurrency"><p id="kata8" data-dismiss="modal"> KRW</p></span></td>
                                                <td><p id="kata9">Won Korea</p></td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><span class="tag tag-success tombolCurrency"><p id="kata8" data-dismiss="modal"> USD</p></span></td>
                                                <td><p id="kata9">US Dollar</p></td>
                                            </tr>
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
function searchArfCurrencyCode() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("code_currency");
  filter = input.value.toUpperCase();
  table = document.getElementById("currencyArf");
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
function searchArfCurrencyName() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("name_currency");
  filter = input.value.toUpperCase();
  table = document.getElementById("currencyArf");
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