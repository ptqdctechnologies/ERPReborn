<script type="text/javascript">
    $(document).ready(function() {
        $(".AdvanceListCart").hide();
        $(".Remark").hide();
        $("#detailTransAvail").hide();
        $("#sitecode2").prop("disabled", true);
        $("#request_name2").prop("disabled", true);
        $("#beneficiary_name2").prop("disabled", true);
        $("#showContentBOQ3").hide();
        $(".tableShowHideBOQ3").hide();
        $(".file-attachment").hide();
        $(".advance-detail").hide();
        
        $("#product_id2").prop("disabled", true);
        $("#bank_name2").prop("disabled", true);
        $("#bank_account2").prop("disabled", true);
        $("#submitArf").prop("disabled", true);
        
    });
</script>

<script>
    function klikProject(code, name) {
        $("#projectcode").val(code);
        $("#projectname").val(name);
        $("#sitecode2").prop("disabled", false);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getSite") !!}?projectcode=' + $('#projectcode').val(),
            success: function(data) {

                var no = 1;

                var t = $('#tableGetSite').DataTable();
                t.clear();
                $.each(data, function(key, val) {
                    t.row.add([
                        '<tbody><tr><td>' + no++ + '</td>',
                        '<td><span data-dismiss="modal" onclick="klikSite(\'' + val.sys_ID + '\', \'' + val.sys_Text + '\');">' + val.sys_ID + '</span></td>',
                        '<td style="border:1px solid #e9ecef;">' + val.sys_Text + '</td></tr></tbody>'
                    ]).draw();
                });
            }
        });
    }
    
</script>

<script>

    // $(document).ready(function() {
    function klikSite(code, name) {
        $("#sitecode").val(code);
        $("#sitename").val(name);
        $("#sitecode2").prop("disabled", true);

        $("#projectcode2").prop("disabled", true);
        $("#addToDoDetail").prop("disabled", false);
        $(".tableShowHideBOQ3").show();
        $("#request_name2").prop("disabled", false);
        $("#beneficiary_name2").prop("disabled", false);
        $("#bank_name2").prop("disabled", false);


        $(".file-attachment").show();
        $(".advance-detail").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBudget") !!}?sitecode=' + $('#sitecode').val(),
            // url: '{!! route("getBudget") !!}?sitecode=' + 143000000000305,
            success: function(data) {
                var no = 1; applied = 0; status = ""; statusDisplay = [];statusDisplay2 = []; statusForm = [];
                $.each(data, function(key, val2) {
                    if(val2.quantityAbsorption == "0.00" && val2.quantity == "0.00"){
                        var applied = 0;
                    }
                    else{
                        var applied = Math.round(parseFloat(val2.quantityAbsorption) / parseFloat(val2.quantity) * 100);
                    }
                    if(applied >= 100){
                        var status = "disabled";
                    }
                    if(val2.productName == "Unspecified Product"){
                        statusDisplay[key] = "";
                        statusDisplay2[key] = "none";
                        statusForm[key] = "disabled";
                    }
                    else{
                        statusDisplay[key] = "none";
                        statusDisplay2[key] = "";
                        statusForm[key] = "";
                    }
                    
                    var html = '<tr>' +
                        '<input name="getWorkId[]" value="'+ val2.combinedBudgetSubSectionLevel1_RefID +'" type="hidden">' +
                        '<input name="getWorkName[]" value="'+ val2.combinedBudgetSubSectionLevel1Name +'" type="hidden">' +
                        '<input name="getProductId[]" value="'+ val2.product_RefID +'" type="hidden">' +
                        '<input name="getProductName[]" value="'+ val2.productName +'" type="hidden">' +
                        '<input name="getQty[]" id="budget_qty'+ key +'" value="'+ val2.quantityRemain +'" type="hidden">' +
                        '<input name="getPrice[]" id="budget_price'+ key +'" value="'+ val2.unitPriceBaseCurrencyValue +'" type="hidden">' +
                        '<input name="getUom[]" value="'+ val2.quantityUnitName +'" type="hidden">' +
                        '<input name="getCurrency[]" value="'+ val2.priceBaseCurrencyISOCode +'" type="hidden">' +
                        '<input name="combinedBudgetSectionDetail_RefID[]" value="'+ val2.sys_ID +'" type="hidden">' +
                        '<input name="combinedBudget_RefID" value="'+ val2.combinedBudget_RefID +'" type="hidden">' +

                        '<td style="border:1px solid #e9ecef;">' +
                        '&nbsp;&nbsp;&nbsp;<div class="progress '+ status +' progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                        '</td>' +

                        '<td style="border:1px solid #e9ecef;display:'+ statusDisplay[key] +'";">' + 
                            '<div class="input-group">' +
                                '<input id="putProductId'+ key +'" style="border-radius:0;width:130px;background-color:white;" name="putProductId" class="form-control" readonly>' +
                                '<div class="input-group-append">' +
                                '<span style="border-radius:0;" class="input-group-text form-control" data-id="10">' +
                                    '<a id="product_id2" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction('+ key +')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                                '</span>' +
                                '</div>' +
                            '</div>' +
                        '</td>' +

                        '<td style="border:1px solid #e9ecef;display:'+ statusDisplay2[key] +'">' + '<span>' + val2.product_RefID + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="putProductName'+ key +'">' + val2.productName + '</span>' + '</td>' +
                        '<input id="putUom'+ key +'" type="hidden">' +

                        '<input id="TotalBudget'+ key +'" type="hidden">' +

                        '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.quantityRemain.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.unitPriceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +

                        '<td class="sticky-col forth-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req'+ key +'" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +
                        '<td class="sticky-col third-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="price_req'+ key +'" style="border-radius:0;" name="price_req[]" class="form-control price_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +
                        '<td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_req'+ key +'" style="border-radius:0;background-color:white;" name="total_req[]" class="form-control total_req" autocomplete="off" disabled>' + '</td>' +
                        '<td class="sticky-col first-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_balance'+ key +'" style="border-radius:0;width:90px;background-color:white;" name="total_balance[]" class="form-control total_balance" autocomplete="off" disabled value="' + currencyTotal(val2.quantityRemain * val2.unitPriceBaseCurrencyValue) + '">' + '</td>' +

                        '</tr>';
                    $('table.tableBudgetDetail tbody').append(html);
                    

                    if(val2.productName == "Unspecified Product"){

                        //VALIDASI QTY
                        $('#qty_req'+key).keyup(function() {
                            $(this).val(currency($(this).val()));
                            var qty_val = $(this).val().replace(/,/g, '');
                            var budget_qty_val = $("#budget_qty"+key).val();
                            var price_req = $("#price_req"+key).val().replace(/,/g, '');
                            var total_balance = $("#total_balance"+key).val().replace(/,/g, '');
                            var total = qty_val * price_req;

                            if (qty_val == "") {
                                $('#total_req'+key).val("");
                                $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                            }
                            else if (parseFloat(total) > parseFloat(total_balance)) {

                                swal({
                                    onOpen: function () {
                                        swal.disableConfirmButton();
                                        Swal.fire("Error !", "Total request is over budget than Balance!", "error");
                                    }
                                });

                                $('#qty_req'+key).val("");
                                $('#total_req'+key).val("");
                                $('#qty_req'+key).css("border", "1px solid red");
                                $('#qty_req'+key).focus();
                                }
                            else {
                                $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                                $('#total_req'+key).val(currencyTotal(total));
                            }

                            //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                            TotalBudgetSelected();
                        });

                        //VALIDASI PRICE
                        $('#price_req'+key).keyup(function() {
                            $(this).val(currency($(this).val()));
                            var price_val = $(this).val().replace(/,/g, '');
                            var budget_price_val = $("#budget_price"+key).val().replace(/,/g, '');
                            var qty_req = $("#qty_req"+key).val();
                            var total_balance = $("#total_balance"+key).val().replace(/,/g, '');
                            var total = price_val * qty_req;
                            
                            if (price_val == "") {
                                $('#total_req'+key).val("");
                                $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                            }
                            else if (parseFloat(price_val) > parseFloat(budget_price_val)) {

                                swal({
                                    onOpen: function () {
                                        swal.disableConfirmButton();
                                        Swal.fire("Error !", "Price is over budget !", "error");
                                    }
                                });

                                $('#price_req'+key).val("");
                                $('#total_req'+key).val("");
                                $('#price_req'+key).css("border", "1px solid red");
                                $('#price_req'+key).focus();
                            }
                            else if (parseFloat(total) > parseFloat(total_balance)) {

                                swal({
                                    onOpen: function () {
                                        swal.disableConfirmButton();
                                        Swal.fire("Error !", "Total request is over budget than Balance!", "error");
                                    }
                                });

                                $('#price_req'+key).val("");
                                $('#total_req'+key).val("");
                                $('#price_req'+key).css("border", "1px solid red");
                                $('#price_req'+key).focus();
                            }
                            else {
                                $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                                $('#total_req'+key).val(currencyTotal(total));

                            }

                            //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                            TotalBudgetSelected();
                        });

                    }

                    else{

                        //VALIDASI QTY
                        $('#qty_req'+key).keyup(function() {
                            $(this).val(currency($(this).val()));
                            var qty_val = $(this).val().replace(/,/g, '');
                            var budget_qty_val = $("#budget_qty"+key).val();
                            var price_req = $("#price_req"+key).val().replace(/,/g, '');
                            var total = qty_val * price_req;

                            if (qty_val == "") {
                                $('#total_req'+key).val("");
                                $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                            }
                            else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {

                                swal({
                                    onOpen: function () {
                                        swal.disableConfirmButton();
                                        Swal.fire("Error !", "Qty is over budget !", "error");
                                    }
                                });

                                $('#qty_req'+key).val("");
                                $('#total_req'+key).val("");
                                $('#qty_req'+key).css("border", "1px solid red");
                                $('#qty_req'+key).focus();
                            }
                            else {

                                $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                                $('#total_req'+key).val(currencyTotal(total));
                            }

                            //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                            TotalBudgetSelected();
                        });

                        //VALIDASI PRICE
                        $('#price_req'+key).keyup(function() {
                            $(this).val(currency($(this).val()));
                            var price_val = $(this).val().replace(/,/g, '');
                            var budget_price_val = $("#budget_price"+key).val().replace(/,/g, '');
                            var qty_req = $("#qty_req"+key).val();
                            var total = price_val * qty_req;
                            
                            if (price_val == "") {
                                $('#total_req'+key).val("");
                                $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                            }
                            else if (parseFloat(price_val) > parseFloat(budget_price_val)) {

                                swal({
                                    onOpen: function () {
                                        swal.disableConfirmButton();
                                        Swal.fire("Error !", "Price is over budget !", "error");
                                    }
                                });

                                $('#price_req'+key).val("");
                                $('#total_req'+key).val("");
                                $('#price_req'+key).css("border", "1px solid red");
                                $('#price_req'+key).focus();
                            }
                            else {

                                $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                                $('#total_req'+key).val(currencyTotal(total));
                            }

                            //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                            TotalBudgetSelected();

                        });
                    }

                });
            }
        });
    }
    // });
</script>

<script>
    function TotalBudgetSelected(){

        var TotalBudgetSelected = 0;
        var total_req = $("input[name='total_req[]']").map(function(){return $(this).val();}).get();

        $.each(total_req, function(index, data) {
            if(total_req[index] != "" && total_req[index] > "0.00" && total_req[index] != "NaN.00"){
                TotalBudgetSelected += parseFloat(total_req[index].replace(/,/g, ''));
            }
        });

        $('#TotalBudgetSelected').html(currencyTotal(TotalBudgetSelected));
        
    }
</script>

<script>
    function addFromDetailtoCartJs() {

        $('#TableAdvance').find('tbody').empty();

        $(".AdvanceListCart").show();
        $(".Remark").show();
        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getWorkId = $("input[name='getWorkId[]']").map(function(){return $(this).val();}).get();
        var getWorkName = $("input[name='getWorkName[]']").map(function(){return $(this).val();}).get();
        var getProductId = $("input[name='getProductId[]']").map(function(){return $(this).val();}).get();
        var getProductName = $("input[name='getProductName[]']").map(function(){return $(this).val();}).get();
        var getUom = $("input[name='getUom[]']").map(function(){return $(this).val();}).get();
        var getCurrency = $("input[name='getCurrency[]']").map(function(){return $(this).val();}).get();
        var qty_req = $("input[name='qty_req[]']").map(function(){return $(this).val();}).get();
        var price_req = $("input[name='price_req[]']").map(function(){return $(this).val();}).get();
        var combinedBudgetSectionDetail_RefID = $("input[name='combinedBudgetSectionDetail_RefID[]']").map(function(){return $(this).val();}).get();
        var combinedBudget_RefID = $("input[name='combinedBudget_RefID']").val();
        var TotalBudgetSelected = 0;
        var TotalQty = 0;

        var total_req = $("input[name='total_req[]']").map(function(){return $(this).val();}).get();
        $.each(total_req, function(index, data) {
            if(total_req[index] != "" && total_req[index] > "0.00" && total_req[index] != "NaN.00"){

                var putProductId = getProductId[index];
                var putProductName = getProductName[index];
                var putUom = getUom[index];

                if(getProductName[index] == "Unspecified Product"){
                    var putProductId = $("#putProductId"+index).val();
                    var putProductName = $("#putProductName"+index).html();
                    var putUom = $("#putUom"+index).val();
                }
                TotalBudgetSelected += +total_req[index].replace(/,/g, '');
                TotalQty+= +qty_req[index].replace(/,/g, '');
                var html = '<tr>' +

                    '<input type="hidden" name="var_product_id[]" value="' + putProductId + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity[]" class="qty_req2'+ index +'" data-id="'+ index +'" value="' + currencyTotal(qty_req[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_price[]" class="price_req2'+ index +'" value="' + currencyTotal(price_req[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_total[]" class="total_req2'+ index +'" value="' + total_req[index] + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + getCurrency[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combinedBudgetSectionDetail_RefID[]" value="' + combinedBudgetSectionDetail_RefID[index] + '">' +
                    '<input type="hidden" name="var_combinedBudget_RefID" value="' + combinedBudget_RefID + '">' +
                    
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkId[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkName[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putUom + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="price_req2'+ index +'">' + currencyTotal(price_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="qty_req2'+ index +'">' + currencyTotal(qty_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="total_req2'+ index +'">' + currencyTotal(total_req[index]) + '</span>' + '</td>' +
                    '</tr>';
                $('table.TableAdvance tbody').append(html);  

                $("#GrandTotal").html(currencyTotal(TotalBudgetSelected));
                $("#TotalQty").html(currencyTotal(TotalQty));

                $("#submitArf").prop("disabled", false);
                $(".ActionButton").prop("disabled", false);
                $(".ActionButtonAll").prop("disabled", false);
            }
        });
        
    }
</script>

<script type="text/javascript">
    function ResetBudget() {
      $("input[name='qty_req[]']").val("");
      $("input[name='price_req[]']").val("");
      $("input[name='total_req[]']").val("");
    }
    
</script>

<script type="text/javascript">
    function CancelAdvance() {
        $("#loading").show();
        $(".loader").show();
        window.location.href = '/AdvanceRequest?var=1';
    }
</script>

<script>
    $(function() {
        $("#formSubmitArf").on("submit", function(e) { //id of form 
            e.preventDefault();
            var valRequestName = $("#request_name").val();
            var valBeneficiaryName = $("#beneficiary_name").val();
            var valBankName = $("#bank_name").val();
            var valBankAccount = $("#bank_account").val();
            var valRemark = $("#putRemark").val();
            $("#request_name").css("border", "1px solid #ced4da");
            $("#putRemark").css("border", "1px solid #ced4da");

            if (valRequestName === "") {
                $("#request_name").focus();
                $("#request_name").attr('required', true);
                $("#request_name").css("border", "1px solid red");
            } else if (valBeneficiaryName === "") {
                $("#beneficiary_name").focus();
                $("#beneficiary_name").attr('required', true);
                $("#beneficiary_name").css("border", "1px solid red");
            } else if (valBankName === "") {
                $("#bank_name").focus();
                $("#bank_name").attr('required', true);
                $("#bank_name").css("border", "1px solid red");
            } else if (valBankAccount === "") {
                $("#bank_account").focus();
                $("#bank_account").attr('required', true);
                $("#bank_account").css("border", "1px solid red");
            } else if (valRemark === "") {
                $("#putRemark").focus();
                $("#putRemark").attr('required', true);
                $("#putRemark").css("border", "1px solid red");
            } else {

                $("#submitArf").prop("disabled", true);

                varFileUpload_UniqueID = "Upload";
                window['JSFunc_GetActionPanel_CommitFromOutside_' + varFileUpload_UniqueID]();
                                
                var action = $(this).attr("action"); //get submit action from form
                var method = $(this).attr("method"); // get submit method
                var form_data = new FormData($(this)[0]); // convert form into formdata 
                var form = $(this);

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
                    confirmButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/save.png") }}" width="13" alt=""><span style="color:black;">Yes, save it </span>',
                    cancelButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/cancel.png") }}" width="13" alt=""><span style="color:black;"> No, cancel </span>',
                    confirmButtonColor: '#e9ecef',
                    cancelButtonColor: '#e9ecef',
                    reverseButtons: true
                }).then((result) => {    

                    if (result.value) {

                        $.ajax({
                            url: action,
                            dataType: 'json', // what to expect back from the server
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: method,
                            success: function(response) {
                                console.log(response.message);
                                if(response.message === "SelectWorkFlow"){
                                    
                                    $("#loading").hide();
                                    $(".loader").hide();

                                    $('#getWorkFlow').modal('toggle');
                                    
                                    var t = $('#tableGetWorkFlow').DataTable();
                                    t.clear();
                                    $.each(response.data, function(key, val) {
                                        t.row.add([
                                            '<td><span data-dismiss="modal" onclick="SelectWorkFlow(\'' + val.sys_ID + '\', \'' + response.businessDocument_RefID + '\', \'' + response.documentNumber + '\', \'' + response.approverEntity_RefID + '\');"><img src="{{ asset("AdminLTE-master/dist/img/add.png") }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></span></td>',
                                            '<td style="border:1px solid #e9ecef;">' + val.fullApproverPath + '</td></tr></tbody>'
                                        ]).draw();
                                    });
                                    
                                }
                                else if(response.message === "WorkFlowError"){
                                    
                                    $("#loading").hide();
                                    $(".loader").hide();

                                    swalWithBootstrapButtons.fire({

                                    title: 'Cancelled',
                                    text: "You do not have access to this menu!",
                                    type: 'error',
                                    confirmButtonColor: '#e9ecef',
                                    confirmButtonText: '<span style="color:black;"> Ok </span>',

                                    }).then((result) => {
                                    if (result.value) {
                                        $("#loading").show();
                                        $(".loader").show();

                                        window.location.href = '/AdvanceRequest?var=1';
                                    }
                                    })
                                    
                                }
                                else{
                                    
                                    $("#loading").hide();
                                    $(".loader").hide();

                                    swalWithBootstrapButtons.fire({

                                        title: 'Successful !',
                                        type: 'success',
                                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + response.documentNumber + '</span>',
                                        showCloseButton: false,
                                        showCancelButton: false,
                                        focusConfirm: false,
                                        confirmButtonText: '<span style="color:black;"> Ok </span>',
                                        confirmButtonColor: '#4B586A',
                                        confirmButtonColor: '#e9ecef',
                                        reverseButtons: true
                                    }).then((result) => {
                                        if (result.value) {
                                            $("#loading").show();
                                            $(".loader").show();

                                            window.location.href = '/AdvanceRequest?var=1';
                                        }
                                    })
                                }
                                
                            },

                            error: function(response) { // handle the error

                                $("#submitArf").prop("disabled", false);

                                Swal.fire("Cancelled", "Data Cancel Inputed", "error");
                            },

                        })


                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        
                        swalWithBootstrapButtons.fire({

                            title: 'Cancelled',
                            text: "Process Canceled",
                            type: 'error',
                            confirmButtonColor: '#e9ecef',
                            confirmButtonText: '<span style="color:black;"> Ok </span>',

                        }).then((result) => {
                            if (result.value) {
                                $("#loading").show();
                                $(".loader").show();

                                window.location.href = '/AdvanceRequest?var=1';
                            }
                        })
                    }
                })
            }
        });

    });
</script>

<script>

    function SelectWorkFlow(workFlowPath_RefID, businessDocument_RefID, documentNumber, approverEntity_RefID) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("StoreWorkFlow") !!}?workFlowPath_RefID=' + workFlowPath_RefID + '&businessDocument_RefID=' + businessDocument_RefID + '&documentNumber=' + documentNumber + '&approverEntity_RefID=' + approverEntity_RefID,
            success: function(data) {

                $("#loading").hide();
                $(".loader").hide();

                const swalWithBootstrapButtons = Swal.mixin({
                    confirmButtonClass: 'btn btn-success btn-sm',
                    cancelButtonClass: 'btn btn-danger btn-sm',
                    buttonsStyling: true,
                })
                
                swalWithBootstrapButtons.fire({

                    title: 'Successful !',
                    type: 'success',
                    html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + data.documentNumber + '</span>',
                    showCloseButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                    confirmButtonText: '<span style="color:black;"> Ok </span>',
                    confirmButtonColor: '#4B586A',
                    confirmButtonColor: '#e9ecef',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $("#loading").show();
                        $(".loader").show();

                        window.location.href = '/AdvanceRequest?var=1';
                    }
                })
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Cancelled", "Data Cancel Inputed", "error");
            }
        });

    }
</script>