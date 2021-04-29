<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailMaterialReceive").hide();
        $("#detailMaterialReceiveList").hide();
    });
</script>

<script>
    function validateFormMaterialReceiveList() {
        var project_code = document.forms["formDetailMaterialReceive"]["project_code"].value;
        var site_code = document.forms["formDetailMaterialReceive"]["site_code"].value;
        var work_id = document.forms["formDetailMaterialReceive"]["work_id"].value;
        var product_id = document.forms["formDetailMaterialReceive"]["product_id"].value;
        var qty = document.forms["formDetailMaterialReceive"]["qty"].value;
        var remark = document.forms["formDetailMaterialReceive"]["remark"].value;
        var qty_in_po = document.forms["formDetailMaterialReceive"]["qty_in_po"].value;
        var qty_in_mr = document.forms["formDetailMaterialReceive"]["qty_in_mr"].value;
        var balance_in_ppm_list = document.forms["formDetailMaterialReceive"]["balance_in_ppm_list"].value;
        
        if (project_code == "") {
            Swal.fire("Error !", "Project Code tidak boleh kosong !", "error");
        }
        else if (site_code == "") {
            Swal.fire("Error !", "Site Code tidak boleh kosong !", "error");
        }
        else if (work_id == "") {
            Swal.fire("Error !", "Work ID tidak boleh kosong !", "error");
        }
        else if (product_id == "" || product_id == "0") {
            Swal.fire("Error !", "Product ID boleh kosong !", "error");
        }
        else if (qty == "") {
            Swal.fire("Error !", "Qty tidak boleh kosong !", "error");
        }
        else if (remark == "") {
            Swal.fire("Error !", "Remark tidak boleh kosong !", "error");
        }
        else if (qty_in_po == "") {
            Swal.fire("Error !", "Qty in PO tidak boleh kosong !", "error");
        }
        else if (qty_in_mr == "") {
            Swal.fire("Error !", "Qty in Material Receive tidak boleh kosong !", "error");
        }
        else if (balance_in_ppm_list == "") {
            Swal.fire("Error !", "Balance tidak boleh kosong !", "error");
        }
    }
</script>