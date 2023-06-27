<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailArfList").hide();
        $("#detailTransAvail").hide();
        $("#popUpCustomerInput").prop("disabled", true);
    });
</script>
<!--  END SHOW HIDE AVAILABEL -->

<script>
  $(document).ready(function() {
    $('#statusCoEstimate').click(function() {

        $("#popUpCustomerInput").prop("disabled", false);        
        $("#register_co2").prop("disabled", true);
        $("#register_co").val("");
        $("#customer_input").val("");
        
        $("#customer").val("");
        $("#customer2").val("");
        $("#po_customer").val("");
        $("#value_idr").val("");
        $("#value_usd").val("");
        $("#description").val("");
        $("#confirmation_form").val("");
        
        $("#register_co").prop("disabled", true);
        $("#customer").prop("disabled", true);
        $("#customer2").prop("disabled", true);
        $("#po_customer").prop("disabled", true);
        $("#value_idr").prop("disabled", true);
        $("#value_usd").prop("disabled", true);
        $("#description").prop("disabled", true);
        $("#confirmation_form").prop("disabled", true);
    });

    $('#statusCoOriginal').click(function() {

        $("#popUpCustomerInput").prop("disabled", true);
        $("#register_co2").prop("disabled", false);
        $("#customer_input").val("");
        $("#customer_input2").val("");

        $("#register_co").prop("disabled", false);
        $("#customer").prop("disabled", false);
        $("#customer2").prop("disabled", false);
        $("#po_customer").prop("disabled", false);
        $("#value_idr").prop("disabled", false);
        $("#value_usd").prop("disabled", false);
        $("#description").prop("disabled", false);
        $("#confirmation_form").prop("disabled", false);
    });
  });
</script>

<script>

    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    $('.add_field_button').click(function() {
        cek = 0;
        addColomn();
    });

    function addColomn() { //on add input button click
        if (cek == 0) {
            cek++;
            x++; //text box increment
            for($x=1; $x<5; $x++){
                
            }
            $(wrapper).append(

                '<div class="col-md-12">' +
                '<div class="form-group">' +
                '<div class="input-group control-group" style="width:105%;position:relative;right:8px;">' +
                '<input type="file" class="form-control filenames" id="filenames_' + x + '" style="height:26px;">' +
                '<div class="input-group-btn">' +
                '<button class="btn btn-outline-secondary btn-sm remove_field" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>'

            ); //add input box                
        }
    }

    $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $(this).parent().parent().parent('div').remove();
        x--;
    })
</script>



<script>
    var x = 1,
        y = 0;

    $('#buttonAddCo').click(function() {
        // var status_co = document.forms["formCo2"]["status_co"].value;
        // var register_co = document.forms["formCo2"]["register_co"].value;
        // var customer = document.forms["formCo2"]["customer"].value;
        // var po_customer = document.forms["formCo2"]["po_customer"].value;
        // var value_idr = document.forms["formCo2"]["value_idr"].value;
        // var value_usd = document.forms["formCo2"]["value_usd"].value;
        // var description = document.forms["formCo2"]["description"].value;
        // var confirmation_form = document.forms["formCo2"]["confirmation_form"].value;
        // var customer_input = document.forms["formCo2"]["customer_input"].value;
        // var projectcode = document.forms["formCo2"]["projectcode"].value;
        // var sitecode = document.forms["formCo2"]["sitecode"].value;
        // var type = document.forms["formCo2"]["type"].value;
        // var rate_idr2 = document.forms["formCo2"]["rate_idr2"].value;
        // var value_idr2 = document.forms["formCo2"]["value_idr2"].value;
        // var value_usd2 = document.forms["formCo2"]["value_usd2"].value;
        // var description2 = document.forms["formCo2"]["description2"].value;
        // var top = document.forms["formCo2"]["top"].value;
        
        // if(status_co == "Original"){
        //     if (register_co == "") {
        //         document.formCo2.register_co.focus() ;
        //         document.formCo2.register_co.style.border = "1px solid red";
        //         document.getElementById("iconProductId").style.border = "1px solid red";
        //         document.getElementById("iconProductId").style.borderRadius = "100pt";
        //         document.getElementById("iconProductId").style.paddingRight = "7px";
        //         document.getElementById("iconProductId").style.paddingLeft = "8px";
        //         document.getElementById("iconProductId").style.paddingTop = "3px";
        //         document.getElementById("iconProductId").style.paddingBottom = "3px";
        //         document.getElementById("iconProductId").innerHTML = "&#33";
        //         return false;
        //     }
        //     else if (customer == 0) {
        //         document.formCo2.customer.focus() ;
        //         document.formCo2.customer.style.border = "1px solid red";
        //         document.getElementById("iconQty").style.border = "1px solid red";
        //         document.getElementById("iconQty").style.borderRadius = "100pt";
        //         document.getElementById("iconQty").style.paddingRight = "7px";
        //         document.getElementById("iconQty").style.paddingLeft = "8px";
        //         document.getElementById("iconQty").style.paddingTop = "3px";
        //         document.getElementById("iconQty").style.paddingBottom = "3px";
        //         document.getElementById("iconQty").innerHTML = "&#33";
        //         return false;
        //     }
        //     else if (po_customer == "") {
        //         document.formCo2.po_customer.focus() ;
        //         document.formCo2.po_customer.style.border = "1px solid red";
        //         document.getElementById("iconUnitPrice").style.border = "1px solid red";
        //         document.getElementById("iconUnitPrice").style.borderRadius = "100pt";
        //         document.getElementById("iconUnitPrice").style.paddingRight = "7px";
        //         document.getElementById("iconUnitPrice").style.paddingLeft = "8px";
        //         document.getElementById("iconUnitPrice").style.paddingTop = "3px";
        //         document.getElementById("iconUnitPrice").style.paddingBottom = "3px";
        //         document.getElementById("iconUnitPrice").innerHTML = "&#33";
        //         return false;
        //     }
        //     else if (value_idr == "") {
        //         document.formCo2.value_idr.focus() ;
        //         document.formCo2.value_idr.style.border = "1px solid red";
        //         document.getElementById("iconRemark").style.border = "1px solid red";
        //         document.getElementById("iconRemark").style.borderRadius = "100pt";
        //         document.getElementById("iconRemark").style.paddingRight = "7px";
        //         document.getElementById("iconRemark").style.paddingLeft = "8px";
        //         document.getElementById("iconRemark").style.paddingTop = "3px";
        //         document.getElementById("iconRemark").style.paddingBottom = "3px";
        //         document.getElementById("iconRemark").innerHTML = "&#33";
        //         return false;
        //     }
        //     else if (value_usd == "") {
        //         document.formCo2.value_usd.focus() ;
        //         document.formCo2.value_usd.style.border = "1px solid red";
        //         document.getElementById("iconRemark").style.border = "1px solid red";
        //         document.getElementById("iconRemark").style.borderRadius = "100pt";
        //         document.getElementById("iconRemark").style.paddingRight = "7px";
        //         document.getElementById("iconRemark").style.paddingLeft = "8px";
        //         document.getElementById("iconRemark").style.paddingTop = "3px";
        //         document.getElementById("iconRemark").style.paddingBottom = "3px";
        //         document.getElementById("iconRemark").innerHTML = "&#33";
        //         return false;
        //     }
        //     else if (description == "") {
        //         document.formCo2.description.focus() ;
        //         document.formCo2.description.style.border = "1px solid red";
        //         document.getElementById("iconRemark").style.border = "1px solid red";
        //         document.getElementById("iconRemark").style.borderRadius = "100pt";
        //         document.getElementById("iconRemark").style.paddingRight = "7px";
        //         document.getElementById("iconRemark").style.paddingLeft = "8px";
        //         document.getElementById("iconRemark").style.paddingTop = "3px";
        //         document.getElementById("iconRemark").style.paddingBottom = "3px";
        //         document.getElementById("iconRemark").innerHTML = "&#33";
        //         return false;
        //     }
        //     else if (confirmation_form == "") {
        //         document.formCo2.confirmation_form.focus() ;
        //         document.formCo2.confirmation_form.style.border = "1px solid red";
        //         document.getElementById("iconRemark").style.border = "1px solid red";
        //         document.getElementById("iconRemark").style.borderRadius = "100pt";
        //         document.getElementById("iconRemark").style.paddingRight = "7px";
        //         document.getElementById("iconRemark").style.paddingLeft = "8px";
        //         document.getElementById("iconRemark").style.paddingTop = "3px";
        //         document.getElementById("iconRemark").style.paddingBottom = "3px";
        //         document.getElementById("iconRemark").innerHTML = "&#33";
        //         return false;
        //     }
        // }
        // else if(status_co == "Estimate"){


        // }
        // else{

            $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", false);
            $("#detailArfList").show();
            var datas = [];

            for (var i = 1; i <= x; i++) {
                var data = {
                    origin_budget: "x",
                    projectcode: "x",
                    projectname: "x",
                    sitecode: "x",
                    sitecode2: "x",
                    beneficiary: "x",
                    bank_name: "x",
                    account_name: "x",
                    account_number: "x",
                    internal_notes: "x",
                    request_name: "x",
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
                    trano: "x",
                }
                datas.push(data);
            }

            var json_object = JSON.stringify(datas);
            // console.log(json_object);

            $.ajax({
                type: "POST",
                url: '{{route("AdvanceRequest.store")}}',
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

                        var t = $('#tableCoCart').DataTable();
                        t.row.add([
                            '<center><button class="btn btn-outline-success btn-rounded btn-sm my-0 remove-val-list remove-attachment addAsf" style="border-radius: 100px;"><i class="fa fa-plus"></i></button></center>',
                            '<span id="lastProductId_' + y + '">' + val.putProductId + '</span>',
                            '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                            '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                            '<span id="lastProductName_' + y + '">' + val.putProductName + '</span>',
                            '<span id="lastPrice_' + y + '">' + val.putPrice + '</span>',
                            '<span id="totalArfDetails_' + y + '">' + val.totalArfDetails + '</span>',
                            '<span id="lastCurrency_' + y + '">' + val.putCurrency + '</span>',
                            '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                            '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                            '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>'
                        ]).draw();
                    });
                },
                error: function(data) {
                    Swal.fire("Error !", "Data Canceled Added", "error");
                }
            });

            $("#iconProductId").hide();
            $("#iconQty").hide();
            $("#iconUnitPrice").hide();
            $("#iconRemark").hide();
            document.formCo2.putProductId.style.border = "1px solid #ced4da";
            document.formCo2.qtyx.style.border = "1px solid #ced4da";
            document.formCo2.putPrice.style.border = "1px solid #ced4da";
            document.formCo2.putRemark.style.border = "1px solid #ced4da";
            
        // }

    });
</script>