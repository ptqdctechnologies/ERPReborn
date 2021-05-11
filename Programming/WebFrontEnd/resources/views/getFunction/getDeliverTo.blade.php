<div id="myDelieverTo" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Address</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <table>
                        <tr>
                            <td><label>Select Address</label></td>
                            <td>
                                <div class="input-group">
                                    <select class="form-control select2bs4" style="width: 200%; border-radius:0;">
                                        <option selected="selected">Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Detail</label></td>
                            <td>
                                <div class="input-group">
                                    <textarea class="form-control" cols="5" rows="5" style="width: 300px;"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <button type="reset" class="btn btn-outline-danger btn-sm float-right" title="Cancel">
                        <i class="fa fa-times" aria-hidden="true">Cancel</i>
                    </button>
                    <button type="submit" class="btn btn-outline-success btn-sm float-right" title="Submit" style="margin-right:5px;" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">
                        <i class="fas fa-plus" aria-hidden="true">Submit</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function searchBrfTrano() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("trano_number");
        filter = input.value.toUpperCase();
        table = document.getElementById("ppnTable");
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

    function searchPPNProjectCode() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("project_code_ppn");
        filter = input.value.toUpperCase();
        table = document.getElementById("ppnTable");
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

    function searchPPNSiteCode() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("site_code_ppn");
        filter = input.value.toUpperCase();
        table = document.getElementById("ppnTable");
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
</script>

<script>
    $(function() {
        $(".klikSearchDeliverTo").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            var code = $this.data("id");
            var name = $this.data("name");
            $("#managerUid").val(code);
            $("#managerName").val(name);
        });
    });
</script>