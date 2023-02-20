<script type="text/javascript">
    $(document).ready(function() {
        $(".headerDor1").hide();
        $(".headerDor2").hide();
        $(".headerDor3").hide();
        $(".headerDor4").hide();
        $("#detailPR").hide();
        $("#detailDo").hide();
        $(".detailDoList").hide();
        // $("#tableShowHideDo").hide();
        $("#headerPrNumber2").prop("disabled", true);
        $("#transporter").css("background-color", "white");
        $("#searchDor").prop("disabled", true);
        $("#dor_number2").prop("disabled", true);
    });
</script>



<script>
    function klikProject(code, name) {
        $("#projectcode").val(code);
        $("#projectname").val(name);
        $("#dor_number2").prop("disabled", false);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("DeliveryOrder.DeliveryOrderByBudgetID") !!}?projectcode=' + $('#projectcode').val(),
            success: function(data) {

                var no = 1;
                t = $('#tableSearchDorInDo').DataTable();
                $.each(data.DataAdvanceRequest, function(key, val) {
                    t.row.add([
                        '<tbody><tr><td>' + no++ + '</td>',
                        '<td><span data-dismiss="modal" onclick="klikDorNumberInDo(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.documentNumber + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikDorNumberInDo(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudget_RefID + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikDorNumberInDo(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudgetName + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikDorNumberInDo(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudgetSection_RefID + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikDorNumberInDo(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudgetSectionName + '</span></td>',
                    ]).draw();

                });
            }
        });
    }
</script>

<script>
    function klikDorNumberInDo(id, docNum, reqId, reqName) {
        var var_recordID = id;
        var trano = docNum;
        $("#dor_number").val(trano);
        $("#tableShowHideDo").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "GET",
            url: '{!! route("DeliveryOrder.DeliveryOrderByDorID") !!}?var_recordID=' + var_recordID,
            success: function(data) {

                var no = 1; applied = 0; TotalBudgetSelected = 0;status = ""; statusDisplay = [];statusDisplay2 = []; statusForm = [];
                $.each(data.DataAdvanceList, function(key, value) {

                    // if(value.quantityAbsorption == "0.00" && value.quantity == "0.00"){
                    if(value.quantity == "0.00"){
                        var applied = 0;
                    }
                    else{
                        // var applied = Math.round(parseFloat(value.quantityAbsorption) / parseFloat(value.quantity) * 100);
                        var applied = Math.round(parseFloat(value.quantity) * 100);
                    }
                    if(applied >= 100){
                        var status = "disabled";
                    }
                    if(value.productName == "Unspecified Product"){
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
                        '<input name="getWorkId[]" value="'+ value.combinedBudget_SubSectionLevel1_RefID +'" type="hidden">' +
                        '<input name="getWorkName[]" value="'+ value.combinedBudget_SubSectionLevel1Name +'" type="hidden">' +
                        '<input name="getProductId[]" value="'+ value.product_RefID +'" type="hidden">' +
                        '<input name="getProductName[]" value="'+ value.productName +'" type="hidden">' +
                        '<input name="getQty[]" id="budget_qty'+ key +'" value="'+ value.quantity +'" type="hidden">' +
                        '<input name="getPrice[]" id="budget_price'+ key +'" value="'+ value.productUnitPriceCurrencyValue +'" type="hidden">' +
                        '<input name="getUom[]" value="'+ value.quantityUnitName +'" type="hidden">' +
                        '<input name="getCurrency[]" value="'+ value.priceBaseCurrencyISOCode +'" type="hidden">' +
                        '<input name="getTotal[]" value="'+ value.priceBaseCurrencyValue +'" type="hidden">' +
                        '<input name="combinedBudget" value="'+ value.sys_ID +'" type="hidden">' +

                        '<td style="border:1px solid #e9ecef;">' +
                        '&nbsp;&nbsp;&nbsp;<div class="progress '+ status +' progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                        '</td>' +
                        
                        '<td style="border:1px solid #e9ecef;">' + '<span>' + trano + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +

                        '<td class="sticky-col second-col-dor-qty" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req'+ key +'" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +
                        '<td class="sticky-col first-col-dor-note" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="note_req'+ key +'" style="border-radius:0;" name="note_req[]" class="form-control note_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +

                        '</tr>';

                    $('table.TableDorDetail tbody').append(html);

                    //VALIDASI QTY
                    $('#qty_req'+key).keyup(function() {
                        $(this).val(currency($(this).val()));
                        var qty_val = $(this).val().replace(/,/g, '');
                        var budget_qty_val = $("#budget_qty"+key).val();

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
                            $('#qty_req'+key).css("border", "1px solid red");
                            $('#qty_req'+key).focus();
                        }
                        else {
                            $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                        }
                    });

                });
            },
        });

    }
</script>

<!-- <script>
    function klikSearchDorInDo(id, docNum, reqId, reqName) {
        var var_recordID = id;
        var trano = docNum;
        $("#tableShowHideDo").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "GET",
            url: '{!! route("DeliveryOrder.DeliveryOrderByBudgetID") !!}?var_recordID=' + var_recordID,
            success: function(data) {
                $.each(data, function(key, value) {
                    var html =
                        '<tr>' +
                        '<td style="border:1px solid #e9ecef;width:5%;">' +
                        '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs AddToDetail AddToDetail2" data-dismiss="modal" data-id0="' + trano + '" data-id1="' + value.combinedBudget_SubSectionLevel1_RefID + '" data-id2="' + value.combinedBudget_SubSectionLevel1Name + '" data-id3="' + value.product_RefID + '" data-id4="' + value.productName + '" data-id5="' + value.quantity + '" data-id6="' + value.quantityUnitName + '" data-id7="' + value.priceCurrencyISOCode + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="18" alt="" title="Add"></button> ' +
                        '</td>' +
                        '<td style="border:1px solid #e9ecef;">' +
                        '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>' +
                        '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                        '</tr>';

                    $('table.TableDorDetail tbody').append(html);
                });

                $("body").on("click", ".AddToDetail", function() {
                    $("#detailDo").show();

                    var $this = $(this);
                    $("#dor_number_detail").val($this.data("id0"));
                    $("#putWorkId").val($this.data("id1"));
                    $("#putWorkName").val($this.data("id2"));
                    $("#putProductId").val($this.data("id3"));
                    $("#putProductName").val($this.data("id4"));
                    $("#delivery_type").val($this.data("id5"));
                    $("#qtyCek").val($this.data("id5").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $("#putQty").val($this.data("id5"));
                    $("#putUom").val($this.data("id6"));
                    $("#putCurrency").val($this.data("id7"));

                    $(".AddToDetail2").prop("disabled", true);
                    $(".ActionButton").prop("disabled", true);

                });
            },
        });
    }
</script> -->


<script>
    function klikTransporter(code, name, address, phone, fax, contact_person, handphone) {
        $("#transporter").val(name);
        $("#address").val(address);
        $("#phone").val(phone);
        $("#fax").val(fax);
        $("#contact_person").val(contact_person);
        $("#handphone").val(handphone);
    }
</script>


<script>
    function addFromDetailtoCartJs() {

        $('#TableDoCart').find('tbody').empty();

        $(".detailDoList").show();

        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getWorkId = $("input[name='getWorkId[]']").map(function(){return $(this).val();}).get();
        var getWorkName = $("input[name='getWorkName[]']").map(function(){return $(this).val();}).get();
        var getProductId = $("input[name='getProductId[]']").map(function(){return $(this).val();}).get();
        var getProductName = $("input[name='getProductName[]']").map(function(){return $(this).val();}).get();
        var getUom = $("input[name='getUom[]']").map(function(){return $(this).val();}).get();
        var getCurrency = $("input[name='getCurrency[]']").map(function(){return $(this).val();}).get();
        var qty_req = $("input[name='qty_req[]']").map(function(){return $(this).val();}).get();
        var price_req = $("input[name='price_req[]']").map(function(){return $(this).val();}).get();

        var combinedBudget = $("input[name='combinedBudget']").val();

        var TotalBudgetSelected = 0;
        var TotalQty = 0;

        var total_req = $("input[name='total_req[]']").map(function(){return $(this).val();}).get();
        $.each(total_req, function(index, data) {
            if(total_req[index] != "" && total_req[index] > "0.00" && total_req[index] != "NaN.00"){

                var putProductId = getProductId[index];
                var putProductName = getProductName[index];

                if(getProductName[index] == "Unspecified Product"){
                    var putProductId = $("#putProductId"+index).val();
                    var putProductName = $("#putProductName"+index).html();
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
                    '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +
                    
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkId[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkName[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getUom[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="price_req2'+ index +'">' + currencyTotal(price_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="qty_req2'+ index +'">' + currencyTotal(qty_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="total_req2'+ index +'">' + currencyTotal(total_req[index]) + '</span>' + '</td>' +
                    '</tr>';
                $('table.TableDoCart tbody').append(html);  

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
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
    function CancelDetailDo() {
        
        var trano = $("#dor_number_detail").val();
        var putWorkId = $("#putWorkId").val();
        var putWorkName = $("#putWorkName").val();
        var putProductId = $("#putProductId").val();
        var putProductName = $("#putProductName").val();
        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
        var putUom = $("#putUom").val();
        var putCurrency = $("#putCurrency").val();
        var note = $("#note").val();
        var delivery_type = $("#delivery_type").val();
        var statusEditDo = $("#statusEditDo").val();
        if (statusEditDo == "Yes") {

            qtyCek = $('#ValidateQuantity').val();
            note = $('#ValidateNote').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: "POST",
                url: '{!! route("DeliveryOrder.StoreValidateDeliveryOrder") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                success: function(data) {

                    if (data == "200") {

                        let html = '<tr>' +
                        '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="RemoveDeliveryOrder(\'' + putWorkId + '\', \'' + putProductId + '\', \'' + qtyCek + '\', this);" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                            '&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditDeliveryOrder(this)" data-dismiss="modal" data-id0="' + trano + '" data-id1="' + putWorkId + '" data-id2="' + putWorkName + '" data-id3="' + putProductId + '" data-id4="' + putProductName + '" data-id5="' + delivery_type + '" data-id6="' + qtyCek + '" data-id7="' + putUom + '" data-id8="' + note + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '<input type="hidden" name="var_putProductId[]" value="' + putProductId + '">' +
                            '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + parseFloat(qtyCek.replace(/,/g, '')) + '">' +
                            '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                            '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putWorkId + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putWorkName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + qtyCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putCurrency + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + note + '</td>' +
                            '</tr>';
                        $('table.TableDorCart tbody').append(html);

                        var TotalDeliveryOrder = parseFloat($("#TotalDeliveryOrder").html().replace(/,/g, ''));
                        $("#TotalDeliveryOrder").html(parseFloat(+TotalDeliveryOrder + +qtyCek).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                    }else {
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });
            $("#statusEditDo").val("No");
        }

        $(".AddToDetail2").prop("disabled", false);
        $(".ActionButton").prop("disabled", false);

        $("#putProductId").css("border", "1px solid #ced4da");
        $("#dor_number_detail").val("");
        $("#putWorkId").val("");
        $("#putWorkName").val("");
        $("#putProductId").val("");
        $("#putProductName").val("");
        $("#delivery_type").val("");
        $("#qtyCek").val("");
        $("#putUom").val("");
        $("#note").val("");
    }
</script>


<script>

    function RemoveDeliveryOrder(workId, ProductId, totalQty, tr) {
        var i = tr.parentNode.parentNode.rowIndex;
        document.getElementById("TableDorCart").deleteRow(i);
        
        $.ajax({
            type: "POST",
            url: '{!! route("DeliveryOrder.StoreValidateDeliveryOrder2") !!}?putProductId=' + ProductId + '&putWorkId=' + workId,
        });

        var totalQty = parseFloat(totalQty.replace(/,/g, ''));
        var TotalDeliveryOrder = parseFloat($("#TotalDeliveryOrder").html().replace(/,/g, ''));
        $("#TotalDeliveryOrder").html(parseFloat(TotalDeliveryOrder - totalQty).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }

</script>

<script>
    function EditDeliveryOrder(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TableDorCart").deleteRow(i);

        var $this = $(t);
        $.ajax({
            type: "POST",
            url: '{!! route("DeliveryOrder.StoreValidateDeliveryOrder2") !!}?putProductId=' + $this.data("id3") + '&putWorkId=' + $this.data("id1"),
        });

        $("#dor_number_detail").val($this.data("id0"));
        $("#putWorkId").val($this.data("id1"));
        $("#putWorkName").val($this.data("id2"));
        $("#putProductId").val($this.data("id3"));
        $("#putProductName").val($this.data("id4"));
        $("#delivery_type").val($this.data("id5"));
        $("#qtyCek").val($this.data("id6"));
        $("#ValidateQuantity").val($this.data("id6"));
        $("#putUom").val($this.data("id7"));
        $("#note").val($this.data("id8"));
        $("#ValidateNote").val($this.data("id8"));
        $("#statusEditDo").val("Yes");

        var qtyCek = parseFloat($("#qtyCek").val().replace(/,/g, ''));
        var TotalDeliveryOrder = parseFloat($("#TotalDeliveryOrder").html().replace(/,/g, ''));
        $("#TotalDeliveryOrder").html(parseFloat(TotalDeliveryOrder - qtyCek).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        $(".AddToDetail2").prop("disabled", true);
        $(".ActionButton").prop("disabled", true);
    }
</script>


<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {

            var qtyReq = $(this).val();
            var putQty = $('#putQty').val();

            if (parseFloat(qtyReq) == '') {
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Quantity Request is Over", "error");
                $("#qtyCek").val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else {
                $("#qtyCek").css("border", "1px solid #ced4da");
            }

        });
    });
</script>

<script type="text/javascript">
    function CancelDo() {
        $("#loading").show();
        $(".loader").show();
        window.location.href = '/DeliveryOrder?var=1';
    }
</script>



<script>
    $(function() {
        $("#FormSubmitDo").on("submit", function(e) { //id of form 
            e.preventDefault();

            // var valRequestName = $("#request_name").val();
            // var valRemark = $("#putRemark").val();
            // $("#request_name").css("border", "1px solid #ced4da");
            // $("#putRemark").css("border", "1px solid #ced4da");

            // if (valRequestName === "") {
            //     $("#request_name").focus();
            //     $("#request_name").attr('required', true);
            //     $("#request_name").css("border", "1px solid red");
            // } else if (valRemark === "") {
            //     $("#putRemark").focus();
            //     $("#putRemark").attr('required', true);
            //     $("#putRemark").css("border", "1px solid red");
            // } else {
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

                        $("#loading").show();
                        $(".loader").show();

                        $.ajax({
                            url: action,
                            dataType: 'json', // what to expect back from the server
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: method,
                            success: function(response) {

                                $("#loading").hide();
                                $(".loader").hide();

                                swalWithBootstrapButtons.fire({

                                    title: 'Successful !',
                                    type: 'success',
                                    html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + response.advnumber + '</span>',
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

                                        window.location.href = '/DeliveryOrder?var=1';
                                    }
                                })
                            },

                            error: function(response) { // handle the error
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

                                window.location.href = '/DeliveryOrder?var=1';
                            }
                        })
                    }
                })
            // }
        });

    });
</script>