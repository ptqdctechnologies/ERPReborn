<script type="text/javascript">
    const initialValue = 0;
    const totalBusinessTrip = [];
    const transportInputs = [
        'taxi',
        'airplane',
        'train',
        'bus',
        'ship',
        'tol_road',
        'park',
        'access_bagage',
        'fuel',
        'hotel',
        'mess',
        'guest_house',
    ];
    const businessTripInputs = [
        'allowance',
        'entertainment',
        'other',
    ];
    
    // FUNGSI TOTAL TRANSPORT
    function calculateTotalTransport() {
        const taxi = parseFloat(document.getElementById('taxi').value.replace(/,/g, '')) || 0;
        const airplane = parseFloat(document.getElementById('airplane').value.replace(/,/g, '')) || 0;
        const train = parseFloat(document.getElementById('train').value.replace(/,/g, '')) || 0;
        const bus = parseFloat(document.getElementById('bus').value.replace(/,/g, '')) || 0;
        const ship = parseFloat(document.getElementById('ship').value.replace(/,/g, '')) || 0;
        const tolRoad = parseFloat(document.getElementById('tol_road').value.replace(/,/g, '')) || 0;
        const park = parseFloat(document.getElementById('park').value.replace(/,/g, '')) || 0;
        const accessBagage = parseFloat(document.getElementById('access_bagage').value.replace(/,/g, '')) || 0;
        const fuel = parseFloat(document.getElementById('fuel').value.replace(/,/g, '')) || 0;
        const hotel = parseFloat(document.getElementById('hotel').value.replace(/,/g, '')) || 0;
        const mess = parseFloat(document.getElementById('mess').value.replace(/,/g, '')) || 0;
        const guest_house = parseFloat(document.getElementById('guest_house').value.replace(/,/g, '')) || 0;

        let newFormatBudget = 0;
        let budgetDetailsDataJSON = null;
        try {
            budgetDetailsDataJSON = document.getElementById('budgetDetailsData').value;
            if (budgetDetailsDataJSON) {
                const parsedData = JSON.parse(budgetDetailsDataJSON);
                newFormatBudget = parseFloat(parsedData.balanceBudget.replace(/,/g, '')) || 0;
            } else {
                // console.warn('Budget details data is empty');
            }
        } catch (error) {
            console.error('Error parsing budget details JSON:', error);
            return;
        }

        const total = taxi + airplane + train + bus + ship + tolRoad + park + accessBagage + fuel + hotel + mess + guest_house;
        totalBusinessTrip[0] = total;

        const sumTotalBusinessTrip = totalBusinessTrip.reduce((accumulator, currentValue) => accumulator + currentValue, initialValue);

        document.getElementById('total_transport').value = numberFormatPHPCustom(total, 2);
        document.getElementById('total_business_trip').value = numberFormatPHPCustom(sumTotalBusinessTrip, 2);

        if (budgetDetailsDataJSON && sumTotalBusinessTrip > newFormatBudget) {
            Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
        }
    }
    
    transportInputs.forEach(id => {
        const inputElement = document.getElementById(id);
        if (inputElement) {
            inputElement.addEventListener('input', calculateTotalTransport);
        }
    });

    // FUNGSI TOTAL BUSINESS TRIP (TOTAL TRANSPORT + TOTAL ACCOMMODATION + ALLOWANCE + ENTERTAINMENT + OTHER)
    function calculateTotalBusinessTrip() {
        const allowance = parseFloat(document.getElementById('allowance').value.replace(/,/g, '')) || 0;
        const entertainment = parseFloat(document.getElementById('entertainment').value.replace(/,/g, '')) || 0;
        const other = parseFloat(document.getElementById('other').value.replace(/,/g, '')) || 0;

        let newFormatBudget = 0;
        let budgetDetailsDataJSON = null;
        try {
            budgetDetailsDataJSON = document.getElementById('budgetDetailsData').value;
            if (budgetDetailsDataJSON) {
                const parsedData = JSON.parse(budgetDetailsDataJSON);
                newFormatBudget = parseFloat(parsedData.balanceBudget.replace(/,/g, '')) || 0;
            } else {
                // console.warn('Budget details data is empty');
            }
        } catch (error) {
            console.error('Error parsing budget details JSON:', error);
            return;
        }

        const total = allowance + entertainment + other;
        totalBusinessTrip[2] = total;

        const sumTotalBusinessTrip = totalBusinessTrip.reduce((accumulator, currentValue) => accumulator + currentValue,initialValue);

        document.getElementById('total_business_trip').value = numberFormatPHPCustom(sumTotalBusinessTrip, 2);

        if (budgetDetailsDataJSON && sumTotalBusinessTrip > newFormatBudget) {
            Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
        }
    }

    businessTripInputs.forEach(id => {
        const inputElement = document.getElementById(id);
        
        if (inputElement) {
            inputElement.addEventListener('input', calculateTotalBusinessTrip);
        }
    });
</script>

<script type="text/javascript">
    $("#buttonDetailBsf").prop("disabled", true);
    $("#SubmitBsfList").prop("disabled", true);
    $("#ManagerNameId").prop("disabled", true);
    $("#CurrencyId").prop("disabled", true);
    $("#FinanceId").prop("disabled", true);
</script>

<script>
    function TableSearchBrfInBsf(data) {
        $('.TableSearchBrfInBsf').find('tbody').empty();
        var no = 1;
        t = $('#TableSearchBrfInBsf').DataTable();
        t.clear().draw();

        var keys = 0;

        $.each(data, function(key, val) {
            keys += 1;
            t.row.add([
                '<tbody><tr><input id="bussinesTripRefID' + keys + '" value="' + val.sys_ID + '" type="hidden"><input id="requester_id' + keys + '" value="' + val.requesterWorkerJobsPosition_RefID + '" type="hidden"><td>' + no++ + '</td>',
                '<td>' + val.documentNumber + '</td>',
                '<td>' + val.combinedBudgetCode + '</td>',
                '<td>' + val.combinedBudgetSectionCode + '</td>',
                '<td>' + val.requesterWorkerName + '</td></tr></tbody>'
            ]).draw();
        });
    }
</script>

<script>
    $('#bussines_trip_number2').one('click', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;

        $.ajax({
            type: 'GET',
            url: '{!! route("BusinessTripRequest.BusinessTripRequestListData") !!}',
            success: function(data) {
                TableSearchBrfInBsf(data);
            }
        });
    });
</script>

<script>
    $(function() {
        $("#FormSubmitSearchBussinesTrip").on("submit", function(e) { //id of form 
            e.preventDefault();

            var action = $(this).attr("action"); //get submit action from form
            var method = $(this).attr("method"); // get submit method
            var form_data = new FormData($(this)[0]); // convert form into formdata 
            var form = $(this);

            $.ajax({
                url: action,
                dataType: 'json', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: method,
                success: function(data) {
                    TableSearchBrfInBsf(data);
                }
            })
        });
    });
</script>

<script>
    var keys = 0;

    //RESET FORM
    // document.getElementById("FormStoreBusinessTripSettlement").reset();
    // $("#dataInput_Log_FileUpload_Pointer_RefID").val("");
    // $("#dataInput_Log_FileUpload_Pointer_RefID_Action").val("");
    // $('.TableBrfDetail').find('tbody').empty();
    // $('.TableExpenseClaim').find('tbody').empty();
    // $('.TableAmountDueto').find('tbody').empty();
    // $('#zhtSysObjDOMTable_Upload_ActionPanel').find('tbody').empty();
    // $('#TotalBudgetSelected').html(0);
    // $('#TotalQtyExpense').html(0);
    // $('#TotalQtyAmount').html(0);
    // $('#GrandTotalExpense').html(0);
    // $('#GrandTotalAmount').html(0);
    // $("#SubmitBsfList").prop("disabled", true);
    //END RESET FORM
    
    $('#TableSearchBrfInBsf tbody').on('click', 'tr', function() {
        $("#mySearchBrf").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var bussinesTripRefID = $('#bussinesTripRefID' + id).val();
        var bussines_trip_number = row.find("td:nth-child(2)").text();

        var requester_id = $('#requester_id' + id).val();
        var requester_name = row.find("td:nth-child(5)").text();

        $("#bussines_trip_number").val(bussines_trip_number);

        $(".tableShowHideBrfDetail").show();

        adjustInputSize(document.getElementById("bussines_trip_number"), "string", 0.9);
        widthResizer();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '{!! route("BusinessTripSettlement.StoreValidateBusinessTripSettlementRequester") !!}?requester_id=' + requester_id + '&requester_name=' + requester_name + '&bussinesTripRefID=' + bussinesTripRefID,
            success: function(data) {
                if (data.status == "200") {
                    $("#requester_id").val(data.requester_id);
                    $("#requester_name").val(data.requester_name);

                    adjustInputSize(document.getElementById("requester_name"), "string", 0.8);
                    widthResizer();

                    var no = 1;
                    applied = 0;
                    TotalBudgetSelected = 0;
                    status = "";
                    statusDisplay = [];
                    statusDisplay2 = [];
                    statusForm = [];
                    $.each(data.data, function(key, value) {
                        keys += 1;

                        // if(value.entities.quantityAbsorption == "0.00" && value.entities.quantity == "0.00"){
                        if (value.entities.quantity == "0.00") {
                            var applied = 0;
                        } else {
                            // var applied = Math.round(parseFloat(value.entities.quantityAbsorption) / parseFloat(value.entities.quantity) * 100);
                            var applied = Math.round(parseFloat(value.entities.quantity) * 100);
                        }
                        if (applied >= 100) {
                            var status = "disabled";
                        }
                        if (value.entities.productName == "Unspecified Product") {
                            statusDisplay[keys] = "";
                            statusDisplay2[keys] = "none";
                            statusForm[keys] = "disabled";
                        } else {
                            statusDisplay[keys] = "none";
                            statusDisplay2[keys] = "";
                            statusForm[keys] = "";
                        }
                        var html =
                            '<tr>' +

                            '<input name="getWorkId[]" value="' + value.entities.combinedBudgetSubSectionLevel1_RefID + '" type="hidden">' +
                            '<input name="getWorkName[]" value="' + value.entities.combinedBudgetSubSectionLevel1Name + '" type="hidden">' +
                            '<input name="getProductId[]" value="' + value.entities.product_RefID + '" type="hidden">' +
                            '<input name="getProductName[]" value="' + value.entities.productName + '" type="hidden">' +
                            '<input name="getQty[]" id="budget_qty' + keys + '" value="' + value.entities.quantity + '" type="hidden">' +
                            '<input name="getPrice[]" id="budget_price' + keys + '" value="' + value.entities.productUnitPriceBaseCurrencyValue + '" type="hidden">' +
                            '<input name="getUom[]" value="' + value.entities.quantityUnitName + '" type="hidden">' +
                            '<input name="getCurrency[]" value="' + value.entities.priceCurrencyISOCode + '" type="hidden">' +
                            '<input name="getAdvanceNumber[]" value="' + bussines_trip_number + '" type="hidden">' +
                            '<input name="getRemark[]" value="' + value.entities.remarks + '" type="hidden">' +
                            '<input name="combinedBudget" value="' + value.entities.sys_ID + '" type="hidden">' +

                            '<td style="border:1px solid #e9ecef;">' + bussines_trip_number + '</td>' +

                            '<td style="border:1px solid #e9ecef;display:' + statusDisplay[keys] + '";">' +
                            '<div class="input-group">' +
                            '<input id="putProductId' + keys + '" style="border-radius:0;width:130px;background-color:white;" name="putProductId" class="form-control" readonly>' +
                            '<div class="input-group-append">' +
                            '<span style="border-radius:0;" class="input-group-text form-control" data-id="10">' +
                            '<a id="product_id2" data-toggle="modal" data-target="#myProduct" onclick="KeyFunction(' + keys + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                            '</span>' +
                            '</div>' +
                            '</div>' +
                            '</td>' +

                            '<td style="border:1px solid #e9ecef;display:' + statusDisplay2[keys] + '">' + '<span>' + value.entities.product_RefID + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + value.entities.productName + '">' + '<span id="putProductName' + keys + '">' + value.entities.productName + '</span>' + '</td>' +


                            '<td style="border:1px solid #e9ecef;">' + '<span id="total_balance_qty2' + keys + '">' + currencyTotal(value.entities.quantity) + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.entities.quantity + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.entities.quantityUnitName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + currencyTotal(value.entities.productUnitPriceBaseCurrencyValue) + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + currencyTotal(value.entities.priceBaseCurrencyValue) + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.entities.priceCurrencyISOCode + '</td>' +

                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col third-col-asf-expense-qty">' + '<input onkeyup="qty_expense(' + keys + ', this)" id="qty_expense' + keys + '" style="border-radius:0;width:50px;" name="qty_expense[]" class="form-control qty_expense" onkeypress="return isNumberKey(this, event);" autocomplete="off" ' + statusForm[keys] + ' value="0">' + '</td>' +
                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col third-col-asf-expense-price">' + '<input onkeyup="price_expense(' + keys + ', this)" id="price_expense' + keys + '" style="border-radius:0;width:90px;" name="price_expense[]" class="form-control price_expense" onkeypress="return isNumberKey(this, event);" autocomplete="off" ' + statusForm[keys] + ' value="' + currency(value.entities.productUnitPriceBaseCurrencyValue) + '">' + '</td>' +
                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col third-col-asf-expense-total">' + '<input id="total_expense' + keys + '" style="border-radius:0;width:90px;background-color:white;" name="total_expense[]" class="form-control total_expense" autocomplete="off" disabled value="0">' + '</td>' +

                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col second-col-asf-amount-qty">' + '<input onkeyup="qty_amount(' + keys + ', this)" id="qty_amount' + keys + '" style="border-radius:0;width:50px;" name="qty_amount[]" class="form-control qty_amount" onkeypress="return isNumberKey(this, event);" autocomplete="off" ' + statusForm[keys] + ' value="0">' + '</td>' +
                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col second-col-asf-amount-price">' + '<input onkeyup="price_amount(' + keys + ', this)" id="price_amount' + keys + '" style="border-radius:0;width:90px;" name="price_amount[]" class="form-control price_amount" onkeypress="return isNumberKey(this, event);" autocomplete="off" ' + statusForm[keys] + ' value="' + currency(value.entities.productUnitPriceBaseCurrencyValue) + '">' + '</td>' +
                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col second-col-asf-amount-total">' + '<input id="total_amount' + keys + '" style="border-radius:0;width:90px;background-color:white;" name="total_amount[]" class="form-control total_amount" autocomplete="off" disabled value="0">' + '</td>' +

                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col first-col-asf-balance-total">' + '<input id="total_balance_qty' + keys + '" style="border-radius:0;width:90px;background-color:white;" name="total_balance_qty[]" class="form-control total_balance_qty" autocomplete="off" disabled value="' + currencyTotal(value.entities.priceBaseCurrencyValue) + '">' + '</td>' +

                            '</tr>';

                        $('table.TableBrfDetail tbody').append(html);
                    });
                } else if (data.status == "501") {
                    Swal.fire("Cancelled", "You have chosen this number !", "error");
                } else {
                    Swal.fire("Cancelled", "Please use same requester !", "error");
                }
            },
            error: function(response) {
                console.log('response', response.responseJSON.message);
            }
        });
    });

    //VALIDASI QTY EXPENSE

    function qty_expense(key, value) {
        var qty_val = (value.value).replace(/,/g, '');
        var budget_qty_val = $("#budget_qty" + key).val();
        var price_expense = $("#price_expense" + key).val().replace(/,/g, '');

        var qty_amount = $("#qty_amount" + key).val().replace(/,/g, '');
        var TotalQty = +qty_val + +qty_amount;

        if (qty_val == "") {
            $('#total_expense' + key).val("");
            $("input[name='qty_expense[]']").css("border", "1px solid #ced4da");
        } else if (parseFloat(TotalQty) > parseFloat(budget_qty_val)) {
            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Qty is over budget !", "error");
                }
            });

            $('#qty_expense' + key).val("");
            $('#total_expense' + key).val("");
            $('#qty_expense' + key).css("border", "1px solid red");
            $('#qty_expense' + key).focus();
        } else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {
            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Qty is over budget !", "error");
                }
            });

            $('#qty_expense' + key).val("");
            $('#total_expense' + key).val("");
            $('#qty_expense' + key).css("border", "1px solid red");
            $('#qty_expense' + key).focus();
        } else {
            var total = qty_val * price_expense;
            $("input[name='qty_expense[]']").css("border", "1px solid #ced4da");
            $('#total_expense' + key).val(currencyTotal(total));
        }

        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED SETTLEMENT
        TotalBudgetSettlementSelected();
        //MEMANGGIL FUNCTION TOTAL BALANCE VALUE SELECTED
        TotalBalanceQtySettlementSelected(key);
    }

    //VALIDASI QTY AMOUNT
    function qty_amount(key, value) {
        var qty_val = (value.value).replace(/,/g, '');
        var budget_qty_val = $("#budget_qty" + key).val();
        var price_amount = $("#price_amount" + key).val().replace(/,/g, '');

        var qty_expense = $("#qty_expense" + key).val().replace(/,/g, '');
        var TotalQty = +qty_val + +qty_expense;

        if (qty_val == "") {
            $('#total_amount' + key).val("");
            $("input[name='qty_amount[]']").css("border", "1px solid #ced4da");
        } else if (parseFloat(TotalQty) > parseFloat(budget_qty_val)) {
            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Qty is over budget !", "error");
                }
            });

            $('#qty_amount' + key).val("");
            $('#total_amount' + key).val("");
            $('#qty_amount' + key).css("border", "1px solid red");
            $('#qty_amount' + key).focus();
        } else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {
            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Qty is over budget !", "error");
                }
            });

            $('#qty_amount' + key).val("");
            $('#total_amount' + key).val("");
            $('#qty_amount' + key).css("border", "1px solid red");
            $('#qty_amount' + key).focus();
        } else {
            var total = qty_val * price_amount;
            $("input[name='qty_amount[]']").css("border", "1px solid #ced4da");
            $('#total_amount' + key).val(currencyTotal(total));
        }

        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED SETTLEMENT
        TotalBudgetSettlementSelected();
        //MEMANGGIL FUNCTION TOTAL BALANCE VALUE SELECTED
        TotalBalanceQtySettlementSelected(key);
    }

    //VALIDASI PRICE EXPENSE

    function price_expense(key, value) {
        var price_val = (value.value).replace(/,/g, '');
        var budget_price_val = $("#budget_price" + key).val().replace(/,/g, '');
        var qty_expense = $("#qty_expense" + key).val();

        if (price_val == "") {
            $('#total_expense' + key).val("");
            $("input[name='price_expense[]']").css("border", "1px solid #ced4da");
        } else if (parseFloat(price_val) > parseFloat(budget_price_val)) {
            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Price is over budget !", "error");
                }
            });

            $('#price_expense' + key).val("");
            $('#total_expense' + key).val("");
            $('#price_expense' + key).css("border", "1px solid red");
            $('#price_expense' + key).focus();
        } else {
            var total = price_val * qty_expense;
            $("input[name='price_expense[]']").css("border", "1px solid #ced4da");
            $('#total_expense' + key).val(currencyTotal(total));
        }

        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED SETTLEMENT
        TotalBudgetSettlementSelected();
        //MEMANGGIL FUNCTION TOTAL BALANCE VALUE SELECTED
        TotalBalanceQtySettlementSelected(key);
    }

    //VALIDASI PRICE AMOUNT
    function price_amount(key, value) {
        var price_val = (value.value).replace(/,/g, '');
        var budget_price_val = $("#budget_price" + key).val().replace(/,/g, '');
        var qty_amount = $("#qty_amount" + key).val();

        if (price_val == "") {
            $('#total_amount' + key).val("");
            $("input[name='price_amount[]']").css("border", "1px solid #ced4da");
        } else if (parseFloat(price_val) > parseFloat(budget_price_val)) {
            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Price is over budget !", "error");
                }
            });

            $('#price_amount' + key).val("");
            $('#total_amount' + key).val("");
            $('#price_amount' + key).css("border", "1px solid red");
            $('#price_amount' + key).focus();
        } else {
            var total = price_val * qty_amount;
            $("input[name='price_amount[]']").css("border", "1px solid #ced4da");
            $('#total_amount' + key).val(currencyTotal(total));
        }

        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED SETTLEMENT
        TotalBudgetSettlementSelected();
        //MEMANGGIL FUNCTION TOTAL BALANCE VALUE SELECTED
        TotalBalanceQtySettlementSelected(key);
    }
</script>

<script>
    function addFromDetailtoCartJs() {
        $("#SubmitBsfList").prop("disabled", false);

        $('#TableExpenseClaim').find('tbody').empty();
        $('#TableAmountDueto').find('tbody').empty();

        $("#expenseCompanyCart").show();
        $(".expenseCompanyCart").show();

        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getAdvanceNumber = $("input[name='getAdvanceNumber[]']").map(function() {
            return $(this).val();
        }).get();
        var getWorkId = $("input[name='getWorkId[]']").map(function() {
            return $(this).val();
        }).get();
        var getWorkName = $("input[name='getWorkName[]']").map(function() {
            return $(this).val();
        }).get();
        var getProductId = $("input[name='getProductId[]']").map(function() {
            return $(this).val();
        }).get();
        var getProductName = $("input[name='getProductName[]']").map(function() {
            return $(this).val();
        }).get();
        var getUom = $("input[name='getUom[]']").map(function() {
            return $(this).val();
        }).get();
        var getCurrency = $("input[name='getCurrency[]']").map(function() {
            return $(this).val();
        }).get();
        var getRemark = $("input[name='getRemark[]']").map(function() {
            return $(this).val();
        }).get();

        var qty_expense = $("input[name='qty_expense[]']").map(function() {
            return $(this).val();
        }).get();
        var price_expense = $("input[name='price_expense[]']").map(function() {
            return $(this).val();
        }).get();
        var total_expense = $("input[name='total_expense[]']").map(function() {
            return $(this).val();
        }).get();

        var qty_amount = $("input[name='qty_amount[]']").map(function() {
            return $(this).val();
        }).get();
        var price_amount = $("input[name='price_amount[]']").map(function() {
            return $(this).val();
        }).get();
        var total_amount = $("input[name='total_amount[]']").map(function() {
            return $(this).val();
        }).get();

        var combinedBudget = $("input[name='combinedBudget']").val();

        var TotalBudgetSelected = 0;
        var TotalQtyExpense = 0;
        var TotalQtyAmount = 0;
        var GrandTotalExpense = 0;
        var GrandTotalAmount = 0;

        $.each(total_expense, function(index, data) {
            if (total_expense[index] != "" && total_expense[index] > "0.00" && total_expense[index] != "NaN.00") {
                var putProductId = getProductId[index];
                var putProductName = getProductName[index];

                if (getProductName[index] == "Unspecified Product") {
                    var putProductId = $("#putProductId" + index).val();
                    var putProductName = $("#putProductName" + index).html();
                }

                TotalBudgetSelected += +total_expense[index].replace(/,/g, '');
                GrandTotalExpense += +total_expense[index].replace(/,/g, '');
                TotalQtyExpense += +qty_expense[index].replace(/,/g, '');

                var html = '<tr>' +
                    '<input type="hidden" name="var_product_id_expense[]" value="' + putProductId + '">' +
                    '<input type="hidden" name="var_product_name_expense[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity_expense[]" class="qty_expense2' + index + '" data-id="' + index + '" value="' + currencyTotal(qty_expense[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom_expense[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_price_expense[]" class="price_expense2' + index + '" value="' + currencyTotal(price_expense[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_total_expense[]" class="total_expense2' + index + '" value="' + total_expense[index] + '">' +
                    '<input type="hidden" name="var_currency_expense[]" value="' + getCurrency[index] + '">' +

                    '<input type="hidden" name="var_bussines_trip_number" value="' + getAdvanceNumber[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combined_budget" value="' + combinedBudget + '">' +
                    '<input type="hidden" name="var_remark" value="' + getRemark[index] + '">' +

                    '<td style="border:1px solid #e9ecef;">' + getAdvanceNumber[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + putProductName + '">' + putProductName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + getUom[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + currencyTotal(price_expense[index]) + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + currencyTotal(qty_expense[index]) + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + currencyTotal(total_expense[index]) + '</td>' +
                    '</tr>';

                $('table.TableExpenseClaim tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                $("#GrandTotalExpense").html(currencyTotal(GrandTotalExpense));
                $("#TotalQtyExpense").html(currencyTotal(TotalQtyExpense));

                $("#SaveAsfList").prop("disabled", false);
            }
        });

        $.each(total_amount, function(index, data) {
            if (total_amount[index] != "" && total_amount[index] > "0.00" && total_amount[index] != "NaN.00") {
                var putProductId = getProductId[index];
                var putProductName = getProductName[index];

                if (getProductName[index] == "Unspecified Product") {
                    var putProductId = $("#putProductId" + index).val();
                    var putProductName = $("#putProductName" + index).html();
                }

                TotalBudgetSelected += +total_amount[index].replace(/,/g, '');
                GrandTotalAmount += +total_amount[index].replace(/,/g, '');
                TotalQtyAmount += +qty_amount[index].replace(/,/g, '');

                var html = '<tr>' +
                    '<input type="hidden" name="var_product_id_amount[]" value="' + putProductId + '">' +
                    '<input type="hidden" name="var_product_name_amount[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity_amount[]" class="qty_amount2' + index + '" data-id="' + index + '" value="' + currencyTotal(qty_amount[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom_amount[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_price_amount[]" class="price_amount2' + index + '" value="' + currencyTotal(price_amount[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_total_amount[]" class="total_amount2' + index + '" value="' + total_amount[index] + '">' +
                    '<input type="hidden" name="var_currency_amount[]" value="' + getCurrency[index] + '">' +

                    '<input type="hidden" name="var_bussines_trip_number" value="' + getAdvanceNumber[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combined_budget" value="' + combinedBudget + '">' +
                    '<input type="hidden" name="var_remark" value="' + getRemark[index] + '">' +

                    '<td style="border:1px solid #e9ecef;">' + getAdvanceNumber[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + getUom[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + currencyTotal(price_amount[index]) + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + currencyTotal(qty_amount[index]) + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + currencyTotal(total_amount[index]) + '</td>' +
                    '</tr>';

                $('table.TableAmountDueto tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                $("#GrandTotalAmount").html(currencyTotal(GrandTotalAmount));
                $("#TotalQtyAmount").html(currencyTotal(TotalQtyAmount));

                $("#SaveAsfList").prop("disabled", false);
            }
        });
    }
</script>

<script>
    $(function() {
        $("#FormStoreBusinessTripSettlement").on("submit", function(e) { //id of form 
            e.preventDefault();

            // MANDATORY VALIDATION
            var MandatoryListVar = new Object();
            MandatoryListVar['remark'] = $("#remark").val();

            var MandatoryListCount = MandatoryListFunction(MandatoryListVar);
            // // END MANDATORY VALIDATION

            if (MandatoryListCount == 0) {
                $("#SubmitBsfList").prop("disabled", true);

                const swalWithBootstrapButtons = Swal.mixin({
                    confirmButtonClass: 'btn btn-success btn-sm',
                    cancelButtonClass: 'btn btn-danger btn-sm',
                    buttonsStyling: true,
                });

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
                        var action = $(this).attr("action"); //get submit action from form
                        var method = $(this).attr("method"); // get submit method
                        var form_data = new FormData($(this)[0]); // convert form into formdata 
                        var form = $(this);

                        ShowLoading();

                        $.ajax({
                            url: action,
                            dataType: 'json', // what to expect back from the server
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: method,
                            success: function(response) {
                                if (response.message == "WorkflowError") {
                                    HideLoading();
                                    $("#SubmitBsfList").prop("disabled", false);
                                    // CALL FUNCTION DO NOT HAVE ACCESS NOTIF
                                    CancelNotif("You don't have access", '/BusinessTripSettlement?var=1');
                                } else if (response.message == "MoreThanOne") {
                                    HideLoading();

                                    $('#getWorkFlow').modal('toggle');

                                    var t = $('#tableGetWorkFlow').DataTable();
                                    t.clear();
                                    $.each(response.data, function(key, val) {
                                        t.row.add([
                                            '<td><span data-dismiss="modal" onclick="SelectWorkFlow(\'' + val.Sys_ID + '\', \'' + val.NextApprover_RefID + '\', \'' + response.approverEntity_RefID + '\', \'' + response.documentTypeID + '\');"><img src="{{ asset("AdminLTE-master/dist/img/add.png") }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></span></td>',
                                            '<td style="border:1px solid #e9ecef;">' + val.FullApproverPath + '</td></tr></tbody>'
                                        ]).draw();
                                    });

                                } else {
                                    HideLoading();

                                    SelectWorkFlow(response.workFlowPath_RefID, response.nextApprover_RefID, response.approverEntity_RefID, response.documentTypeID);

                                }
                            },
                            error: function(response) {
                                HideLoading();
                                $("#SubmitBsfList").prop("disabled", false);
                                // CALL FUNCTION DO NOT HAVE ACCESS NOTIF
                                CancelNotif("You don't have access", '/BusinessTripSettlement?var=1');

                            },
                        });
                    } else {
                        HideLoading();
                        // FUNCTION ERROR NOTIFICATION 
                        CancelNotif("Data Cancel Inputed", '/BusinessTripSettlement?var=1');
                    }
                });
            }
        });
    });
</script>

<script>
    function SelectWorkFlow(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, documentTypeID) {

        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success btn-sm',
            cancelButtonClass: 'btn btn-danger btn-sm',
            buttonsStyling: true,
        });

        swalWithBootstrapButtons.fire({

            title: 'Comment',
            text: "Please write your comment here",
            type: 'question',
            input: 'textarea',
            showCloseButton: false,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: '<span style="color:black;"> OK </span>',
            confirmButtonColor: '#4B586A',
            confirmButtonColor: '#e9ecef',
            reverseButtons: true
        }).then((result) => {
            // if (result.value) {

                ShowLoading();
                var fileAttachment = null;
                var file = $("#dataInput_Log_FileUpload_Pointer_RefID_Action").val();
                if (file) {

                    setTimeout(function() {

                        varFileUpload_UniqueID = "Upload";
                        window['JSFunc_GetActionPanel_CommitFromOutside_' + varFileUpload_UniqueID]();
                        fileAttachment = $("#dataInput_Log_FileUpload_Pointer_RefID").val();
                        if (fileAttachment != null) {

                            BusinessTripSettlement(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, fileAttachment, documentTypeID, result.value);

                        }
                    }, 20);
                } else {

                    BusinessTripSettlement(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, fileAttachment, documentTypeID, result.value);

                }

            // }
        })

    }
</script>

<script type="text/javascript">
    function BusinessTripSettlement(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, fileAttachment, documentTypeID, comment) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data = {
            workFlowPath_RefID: workFlowPath_RefID,
            nextApprover_RefID: nextApprover_RefID,
            approverEntity_RefID: approverEntity_RefID,
            fileAttachment: fileAttachment,
            documentTypeID: documentTypeID,
            comment: comment

        };

        $.ajax({
            type: 'POST',
            data: data,
            url: '{!! route("AdvanceRequest.store") !!}',
            success: function(data) {

                HideLoading();
                if (data.status == 200) {

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
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        ShowLoading();
                        window.location.href = '/BusinessTripSettlement?var=1';
                    })
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }


            },
            error: function(jqXHR, textStatus, errorThrown) {
                // FUNCTION ERROR NOTIFICATION 
                ErrorNotif("Data Cancel Inputed");
            }
        });
    }
</script>

<script>
    $(function() {
        $(".idExpense").on('click', function(e) {
            $("#amountdueto").hide();
            $("#expense").show();
            $("#expenseCompanyCart").show();
            $(".expenseCompanyCart").show();
        });
    });

    $(function() {
        $(".idAmount").on('click', function(e) {
            $("#expense").hide();
            $("#amountCompanyCart").show();
            $(".amountCompanyCart").show();
            $("#amountdueto").show();
        });
    });
</script>

<script type="text/javascript">
    function CancelBusinessTripSettlement() {
        ShowLoading();
        
        location.reload();
    }
</script>

<script>
    function widthResizer(){
        var widths = $(window).width();
        var tripNumber = document.getElementById("bussines_trip_number");
        var requesterName = document.getElementById("requester_name");

        if (widths <= 895 && tripNumber.value.length > 0 && requesterName.value.length > 0) {
            adjustInputSize(tripNumber, "string", 100);
            adjustInputSize(requesterName, "string", 100);
        } 
        if (widths > 895 && tripNumber.value.length > 0 && requesterName.value.length > 0) {
            adjustInputSize(tripNumber, "string", 0.9);
            adjustInputSize(requesterName, "string", 0.8);
        }
    }

    window.addEventListener('resize', widthResizer);
</script>