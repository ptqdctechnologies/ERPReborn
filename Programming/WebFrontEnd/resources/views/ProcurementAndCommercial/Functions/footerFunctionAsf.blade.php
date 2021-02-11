<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".detailASF").hide();
        $("#detailArfList").hide();
        // $("#amountCompanyCart").hide();
        // $("#expenseClaimCart").hide();
    });
</script>
<!--  END SHOW HIDE AVAILABEL -->
<script>
    var x = 1, y = 0; xx = 0;//initlal text box count
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    $('.add_field_button').click(function () {
            cek = 0;
            addColomn();
    });
    function addColomn(){ //on add input button click
        if(cek == 0){
            cek++;
            x++; //text box increment
            $(wrapper).append(

                '<div class="col-md-12">'
                +   '<div class="form-group">'
                +       '<div class="input-group control-group" style="width:105%;position:relative;right:8px;">'
                +           '<input type="file" class="form-control filenames" id="filenames_' + x + '" style="height:26px;">'
                +           '<div class="input-group-btn">'
                +               '<button class="btn btn-outline-secondary btn-sm remove_field" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>'
                +           '</div>'
                +       '</div>'
                +    '</div>'
                +'</div>'

            ); //add input box                
        }                        
    }

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().parent('div').remove(); x--;
    })
</script>

<script>
    function validateFormDetailAsf() {
        var arf_number = document.forms["formAsf1"]["arf_number"].value;
        var arf_date = document.forms["formAsf1"]["arf_date"].value;
        var project_code = document.forms["formAsf1"]["project_code"].value;
        var cfs_code = document.forms["formAsf1"]["cfs_code"].value;
        var total_arf = document.forms["formAsf1"]["total_arf"].value;
        var total_asf = document.forms["formAsf1"]["total_asf"].value;
        var balance = document.forms["formAsf1"]["balance"].value;
        var qty_expense = document.forms["formAsf1"]["qty_expense"].value;
        var price_expense = document.forms["formAsf1"]["price_expense"].value;
        var total_expense = document.forms["formAsf1"]["total_expense"].value;
        var qty_amount = document.forms["formAsf1"]["qty_amount"].value;
        var price_amount = document.forms["formAsf1"]["price_amount"].value;
        var total_amount = document.forms["formAsf1"]["total_amount"].value;
        if (arf_number == "") {
            Swal.fire("Error !", "ARF Number tidak boleh kosong !", "error");
        }
        else if (arf_date == "") {
            Swal.fire("Error !", "ARF Date tidak boleh kosong !", "error");
        }
        else if (project_code == "") {
            Swal.fire("Error !", "Project Code tidak boleh kosong !", "error");
        }
        else if (cfs_code == "") {
            Swal.fire("Error !", "CFS Code code tidak boleh kosong !", "error");
        }
        else if (total_arf == "") {
            Swal.fire("Error !", "Total ARF code tidak boleh kosong !", "error");
        }
        else if (total_asf == "") {
            Swal.fire("Error !", "Total ASF code tidak boleh kosong !", "error");
        }
        else if (balance == "") {
            Swal.fire("Error !", "Balance code tidak boleh kosong !", "error");
        }
        else if (qty_expense == "") {
            Swal.fire("Error !", "QTY Expense tidak boleh kosong !", "error");
        }
        else if (price_expense == "") {
            Swal.fire("Error !", "Price Expense tidak boleh kosong !", "error");
        }
        else if (total_expense == "") {
            Swal.fire("Error !", "Total Expense tidak boleh kosong !", "error");
        }
        else if (qty_amount == "") {
            Swal.fire("Error !", "QTY Amount tidak boleh kosong !", "error");
        }
        else if (price_amount == "") {
            Swal.fire("Error !", "Price Amount tidak boleh kosong !", "error");
        }
        else if (total_amount == "") {
            Swal.fire("Error !", "Total Amount tidak boleh kosong !", "error");
        }
    }
</script>