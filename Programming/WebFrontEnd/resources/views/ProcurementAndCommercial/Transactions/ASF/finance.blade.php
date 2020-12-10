<div id="myFinanceAsf" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><label for=""> Choose User</label></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button> 
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <table>
                        <tr>
                            <td><label>User Login</label></td>
                            <td>
                            <div class="input-group">
                                <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="finance_asf_uid" onkeyup="financeAsfUid()">
                            </div>
                            </td>
                            <td><label>User Name</label></td>
                            <td>
                            <div class="input-group">
                                <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="finance_asf_name" onkeyup="financeAsfName()">
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
                                <table class="table table-head-fixed text-nowrap" id="financeAsf">
                                    <tr>
                                        <th>Id</th>
                                        <th>Uid</th>
                                        <th>User  Name</th>
                                    </tr>
                                
                                    @for($i = 0; $i < 20; $i++)
                                    <tr>
                                        <td>1</td>
                                        <td><span class="tag tag-success tombolAsfFinance"><p id="kata17" data-dismiss="modal"> Approved</p></span></td>
                                        <td><p id="kata18">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</p></td>
                                    </tr>
                                    @endfor
                                    @for($i = 0; $i < 20; $i++)
                                    <tr>
                                        <td>2</td>
                                        <td><span class="tag tag-success tombolAsfFinance"><p id="kata17" data-dismiss="modal"> aku</p></span></td>
                                        <td><p id="kata18">done</p></td>
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
    function financeAsfUid() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("finance_asf_uid");
    filter = input.value.toUpperCase();
    table = document.getElementById("financeAsf");
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
    function financeAsfName() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("finance_asf_name");
    filter = input.value.toUpperCase();
    table = document.getElementById("financeAsf");
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