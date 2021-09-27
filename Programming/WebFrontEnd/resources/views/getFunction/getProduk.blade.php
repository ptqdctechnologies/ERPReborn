<!--|----------------------------------------------------------------------------------|
    |                             Function My Project Code                             |
    |----------------------------------------------------------------------------------|-->
    <div id="myProductArf" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Choose Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0" style="height: 400px;">
                                    <table class="table table-head-fixed text-nowrap" id="tableGetProduct">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no=1; @endphp
                                            @for($i = 1; $i < 20; $i++)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <span class="tag tag-success">
                                                        <p data-dismiss="modal" class="klikProduct" data-id="Product Code {{ $i }}" data-name="Product Name {{ $i }}">Product Code {{$i}}</p>
                                                    </span>
                                                </td>
                                                <td>
                                                    <p>Detail {{$i}}</p>
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
function searchArfCodeProduk() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("code_produk");
  filter = input.value.toUpperCase();
  table = document.getElementById("tableGetProduct");
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
function searchArfNameProduk() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("name_produk");
  filter = input.value.toUpperCase();
  table = document.getElementById("tableGetProduct");
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
        $(".klikProduct").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            var code = $this.data("id");
            var name = $this.data("name");
            $("#putProductId").val(code);
            $("#putProductName").val(name);
        });
    });
</script>

