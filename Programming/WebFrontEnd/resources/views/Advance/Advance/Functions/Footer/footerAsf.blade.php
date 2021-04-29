<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".detailASF").hide();
        $("#amountCompanyCart").hide();
        $("#addAsfListCart").prop("disabled", true);
        $("#saveAsfList").prop("disabled", true);
    }); 
</script>

<script>
    $(function() {
        $("#product-desc-tab").on('click', function(e) {     
            $("#amountCompanyCart").show();
        });
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

    $('#addAsfListCart').click(function() {
        
        var cfs_code = document.forms["formAsf1"]["cfs_code"].value;
        var qty_expense = document.forms["formAsf1"]["qty_expense"].value;
        var price_expense = document.forms["formAsf1"]["price_expense"].value;
        var qty_amount = document.forms["formAsf1"]["qty_amount"].value;
        var price_amount = document.forms["formAsf1"]["price_amount"].value;
        if (cfs_code == "") {

            document.formAsf1.cfs_code.focus() ;
            document.formAsf1.cfs_code.style.border = "1px solid red";
            document.getElementById("iconCfsCode").style.border = "1px solid red";
            document.getElementById("iconCfsCode").style.borderRadius = "100pt";
            document.getElementById("iconCfsCode").style.paddingRight = "3px";
            document.getElementById("iconCfsCode").style.paddingLeft = "8px";
            document.getElementById("iconCfsCode").style.paddingTop = "3px";
            document.getElementById("iconCfsCode").style.paddingBottom = "3px";
            document.getElementById("iconCfsCode").style.width = "21px";
            document.getElementById("iconCfsCode").innerHTML = "&#33";

        }
        else if (qty_expense == "") {

            document.formAsf1.qty_expense.focus() ;
            document.formAsf1.qty_expense2.focus() ;
            document.formAsf1.qty_expense.style.border = "1px solid red";
            document.formAsf1.qty_expense2.style.border = "1px solid red";
            document.getElementById("iconQtyExpense").style.border = "1px solid red";
            document.getElementById("iconQtyExpense").style.borderRadius = "100pt";
            document.getElementById("iconQtyExpense").style.paddingRight = "7px";
            document.getElementById("iconQtyExpense").style.paddingLeft = "8px";
            document.getElementById("iconQtyExpense").style.paddingTop = "3px";
            document.getElementById("iconQtyExpense").style.paddingBottom = "3px";
            document.getElementById("iconQtyExpense").innerHTML = "&#33";
            return false;

        }
        else if (price_expense == "") {
            
            document.formAsf1.price_expense.focus() ;
            document.formAsf1.price_expense2.focus() ;
            document.formAsf1.price_expense.style.border = "1px solid red";
            document.formAsf1.price_expense2.style.border = "1px solid red";
            document.getElementById("iconPriceExpense").style.border = "1px solid red";
            document.getElementById("iconPriceExpense").style.borderRadius = "100pt";
            document.getElementById("iconPriceExpense").style.paddingRight = "7px";
            document.getElementById("iconPriceExpense").style.paddingLeft = "8px";
            document.getElementById("iconPriceExpense").style.paddingTop = "3px";
            document.getElementById("iconPriceExpense").style.paddingBottom = "3px";
            document.getElementById("iconPriceExpense").innerHTML = "&#33";
            return false;

        }
        else if (qty_amount == "") {

            document.formAsf1.qty_amount.focus() ;
            document.formAsf1.qty_amount2.focus() ;
            document.formAsf1.qty_amount.style.border = "1px solid red";
            document.formAsf1.qty_amount2.style.border = "1px solid red";
            document.getElementById("iconQtyAmount").style.border = "1px solid red";
            document.getElementById("iconQtyAmount").style.borderRadius = "100pt";
            document.getElementById("iconQtyAmount").style.paddingRight = "7px";
            document.getElementById("iconQtyAmount").style.paddingLeft = "8px";
            document.getElementById("iconQtyAmount").style.paddingTop = "3px";
            document.getElementById("iconQtyAmount").style.paddingBottom = "3px";
            document.getElementById("iconQtyAmount").innerHTML = "&#33";
            return false;
        }
        else if (price_amount == "") {
            alert('d');
            document.formAsf1.price_amount.focus() ;
            document.formAsf1.price_amount2.focus() ;
            document.formAsf1.price_amount.style.border = "1px solid red";
            document.formAsf1.price_amount2.style.border = "1px solid red";
            document.getElementById("iconPriceAmount").style.border = "1px solid red";
            document.getElementById("iconPriceAmount").style.borderRadius = "100pt";
            document.getElementById("iconPriceAmount").style.paddingRight = "7px";
            document.getElementById("iconPriceAmount").style.paddingLeft = "8px";
            document.getElementById("iconPriceAmount").style.paddingTop = "3px";
            document.getElementById("iconPriceAmount").style.paddingBottom = "3px";
            document.getElementById("iconPriceAmount").innerHTML = "&#33";
            return false;

        }
        else{

            var datas = [];

            for (var i = 1; i <= x; i++) {
                var data = {
                    origin_budget: "x",
                    projectcode: "x",
                    projectname: "x",
                    subprojectc: "x",
                    subprojectn: "x",
                    beneficiary: "x",
                    bank_name: "x",
                    account_name: "x",
                    account_number: "x",
                    internal_notes: "x",
                    requestNameArf: "x",
                    putWorkId: "x",
                    putWorkName: "x",
                    putProductId: "x",
                    putProductName: "x",
                    putQty: "x",
                    putQtys: "x",
                    putUom: "x",
                    putPrice: "x",
                    putCurrency: "x",
                    totalArfDetails: "x",
                    putRemark: "x",
                    filenames: "x",
                }
                datas.push(data);
            }

            var json_object = JSON.stringify(datas);
            // console.log(json_object);

            $.ajax({
                type: "POST",
                url: '{{route('ARF.store')}}',
                data: json_object,
                contentType: "application/json",
                processData: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    
                    Swal.fire("Success !", "Data add to cart", "success");
                    y++;
                    $.each(data, function(key, val) {
                        $('#tableAmountDueto').append('<tr id="control-group"><td><span id="lastWorkId_' + y + '">' + val.putProductId + '</span></td><td><center><button class="btn btn-outline-danger btn-rounded btn-sm my-0 remove-val-list addAsf" style="border-radius: 100px;"><i class="fa fa-trash"></i></button></center></td><td><span id="lastProductId_' + y + '">' + val.putProductId + '</span></td><td><span id="lastProductName_' + y + '">' + val.putProductName + '</span></td><td><span id="lastRemark_' + y + '">' + val.putRemark + '</span></td><td><span id="lastUom_' + y + '">' + val.putUom + '</span></td><td><span id="lastPrice_' + y + '">' + val.putPrice + '</span></td><td><span id="totalArfDetails_' + y + '">' + val.totalArfDetails + '</span></td><td><span id="lastCurrency_' + y + '">' + val.putCurrency + '</span></td><td><span id="lastRemark_' + y + '">' + val.putRemark + '</span></td><td><span id="lastRemark_' + y + '">' + val.putRemark + '</span></td></tr>');
                        $('#tableExpenseClaim').append('<tr id="control-group"><td><span id="lastWorkId_' + y + '">' + val.putProductId + '</span></td><td><center><button class="btn btn-outline-danger btn-rounded btn-sm my-0 remove-val-list addAsf" style="border-radius: 100px;"><i class="fa fa-trash"></i></button></center></td><td><span id="lastProductId_' + y + '">' + val.putProductId + '</span></td><td><span id="lastProductName_' + y + '">' + val.putProductName + '</span></td><td><span id="lastRemark_' + y + '">' + val.putRemark + '</span></td><td><span id="lastUom_' + y + '">' + val.putUom + '</span></td><td><span id="lastPrice_' + y + '">' + val.putPrice + '</span></td><td><span id="totalArfDetails_' + y + '">' + val.totalArfDetails + '</span></td><td><span id="lastCurrency_' + y + '">' + val.putCurrency + '</span></td><td><span id="lastRemark_' + y + '">' + val.putRemark + '</span></td><td><span id="lastRemark_' + y + '">' + val.putRemark + '</span></td></tr>');

                    });
                },
                error: function(data) {
                    Swal.fire("Error !", "Data Canceled Added", "error");
                }
            });

            $("#amountCompanyCart").show();
            $("#saveAsfList").prop("disabled", false);
        }
    });
</script>

<script>
    // var y = 1; //initlal text box count

    $('#saveAsfList').click(function() {

        const swalWithBootstrapButtons = Swal.mixin({
        confirmButtonClass: 'btn btn-success btn-sm',
        cancelButtonClass: 'btn btn-danger btn-sm',
        buttonsStyling: true,
        })

        swalWithBootstrapButtons.fire({

        title: 'Are you sure?',
        text: "Save this data?",
        type: 'question',
        
        showCancelButton: true,
        confirmButtonText: 'Yes, save it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.value) {
            swalWithBootstrapButtons.fire(
            'Succesful!',
            'Data has been updated !',
            'success'
            )

            //Batas

            var datax = [];
            for (var i = 1; i <= y; i++) {
                var data = {
                    lastWorkId: $('#lastWorkId_' + i).html(),
                    lastWorkName: $('#lastWorkName_' + i).html(),
                    lastProductId: $('#lastProductId_' + i).html(),
                    lastProductName: $('#lastProductName_' + i).html(),
                    lastQty: $('#lastQty_' + i).val(),
                    lastUom: $('#lastUom_' + i).html(),
                    lastPrice: $('#lastPrice_' + i).html(),
                    totalArfDetails: $('#totalArfDetails_' + i).html(),
                    lastCurrency: $('#lastCurrency_' + i).html(),
                    lastRemark: $('#lastRemark_' + i).html(),

                }
                datax.push(data);
            }

            var json_object = JSON.stringify(datax);
            console.log(json_object);

            $.ajax({
                type: "POST",
                url: '{{route('ARF.tests')}}',
                data: json_object,
                contentType: "application/json",
                processData: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    Swal.fire("Error !", "Data Canceled Added", "error");
                }
            });

            //EndBatas

        } else if (
            result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'Process Canceled !',
                'error'
                )
            }
        })
    });
</script>