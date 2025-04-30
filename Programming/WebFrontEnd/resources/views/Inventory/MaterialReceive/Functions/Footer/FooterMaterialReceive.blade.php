<script>
    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="qty_req"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, ''));
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

        document.getElementById('TotalDeliveryOrder').textContent = currencyTotal(total);
    }

    function GetDeliveryOrderDetail(delivery_order_id, delivery_order_number) {
        $("#tableMaterialReceiveDetail tbody").hide();
        $(".loadingMaterialReceiveDetail").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDeliveryOrderDetail") !!}?delivery_order_id=' + delivery_order_id,
            success: function(data) {
                console.log('data', data);
                
                $(".loadingMaterialReceiveDetail").hide();

                let tbody = $('#tableMaterialReceiveDetail tbody');
                tbody.empty();

                if (Array.isArray(data) && data.length > 0) {
                    let modifyColumn = `
                        <td rowspan="${data.length}" style="text-align: center; padding: 10px !important;">
                            ${delivery_order_number}
                        </td>
                    `;

                    $.each(data, function(key, val2) {
                        let row = `
                            <tr>
                                <input id="trano${key}" value="${delivery_order_number}" type="hidden" />
                                <input id="delivery_order_detail_id${key}" value="${val2.deliveryOrderDetail_ID}" type="hidden" />
                                <input id="product_code${key}" value="-" type="hidden" />
                                <input id="product_name${key}" value="-" type="hidden" />
                                <input id="qty_do${key}" value="${val2.qtyReq}" type="hidden" />
                                <input id="qty_available${key}" value="-" type="hidden" />
                                <input id="uom${key}" value="-" type="hidden" />

                                ${key === 0 ? modifyColumn : ''}
                                <td style="text-align: center;">-</td>
                                <td style="text-align: center;">-</td>
                                <td style="text-align: center;">${val2.qtyReq}</td>
                                <td style="text-align: center;">-</td>
                                <td style="text-align: center;">-</td>
                                <td style="text-align: center; width: 100px;">
                                    <input class="form-control number-without-negative" id="qty_req${key}" data-default="" autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="text-align: center; width: 150px; padding: 0.5rem !important;">
                                    <textarea id="note${key}" class="form-control" data-default=""></textarea>
                                </td>
                            </tr>
                        `;

                        tbody.append(row);

                        $(`#qty_req${key}`).on('keyup', function() {
                            calculateTotal();
                        });
                    });

                    $("#tableMaterialReceiveDetail tbody").show();
                } else {
                    $(".errorMessageContainerMaterialReceiveDetail").show();
                    $("#errorMessageMaterialReceiveDetail").text(`Data not found.`);

                    $("#tableMaterialReceiveDetail_length").hide();
                    $("#tableMaterialReceiveDetail_filter").hide();
                    $("#tableMaterialReceiveDetail_info").hide();
                    $("#tableMaterialReceiveDetail_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableMaterialReceiveDetail tbody').empty();
                $(".loadingMaterialReceiveDetail").hide();
                $(".errorMessageContainerMaterialReceiveDetail").show();
                $("#errorMessageMaterialReceiveDetail").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    function getDocumentType() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDocumentType") !!}',
            success: function(data) {
                const result = data.find(({ Name }) => Name === "Warehouse Inbound Order Form");

                if (Object.keys(result).length > 0) {
                    $("#DocumentTypeID").val(result.Sys_ID);
                } else {
                    console.log('error get document type');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('error', textStatus, errorThrown);
            }
        });
    }

    function SelectWorkFlow(formatData) {
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
            ShowLoading();
            MaterialReceiveStore({...formatData, comment: result.value});
        });
    }

    function MaterialReceiveStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("MaterialReceive.store") }}',
            success: function(res) {
                HideLoading();

                console.log('res', res);

                if (res.status == 200) {
                    const swalWithBootstrapButtonsss = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtonsss.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + res.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        window.location.href = '/MaterialReceive?var=1';
                    });
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error', jqXHR, textStatus, errorThrown);
            }
        });
    }

    $('#delivery-order-details-add').on('click', function() {
        let dataStore = [];
        var totalDeliveryOrder = document.getElementById('TotalDeliveryOrder').textContent;

        $("#tableMaterialReceiveDetail tbody tr").each(function(index) {
            var trano       = $(this).find(`input[id="trano${index}"]`).val();
            var doDetailID  = $(this).find(`input[id="delivery_order_detail_id${index}"]`).val();
            var productCode = $(this).find(`input[id="product_code${index}"]`).val();
            var productName = $(this).find(`input[id="product_name${index}"]`).val();
            var uom         = $(this).find(`input[id="uom${index}"]`).val();
            var qtyReq      = $(this).find(`input[id="qty_req${index}"]`).val();
            var note        = $(this).find(`textarea[id="note${index}"]`).val();

            if (!qtyReq || !note) {
                return;
            }

            var rowToUpdate = null;

            $("#tableMaterialReceiveList tbody tr").each(function() {
                var existingTrano       = $(this).find("td:eq(0)").text();
                var existingProductCode = $(this).find("td:eq(1)").text();
                var existingProductName = $(this).find("td:eq(2)").text();
                var existingUOM         = $(this).find("td:eq(3)").text();

                if (existingTrano === trano) {
                    if (existingProductCode === productCode && existingProductName === productName && existingUOM === uom) {
                        rowToUpdate = $(this);
                    }
                }
            });

            if (rowToUpdate) {
                rowToUpdate.find("td:eq(4)").text(qtyReq);
                rowToUpdate.find("td:eq(5)").text(note);

                dataStore[index] = {
                    deliveryOrderDetail_RefID: doDetailID,
                    quantity: qtyReq,
                    remarks: note,
                };
            } else {
                var newRow = `<tr>
                    <td style="text-align: center; padding: 0.8rem 0px;">${trano}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productCode}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productName}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${uom}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${qtyReq}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${note}</td>
                </tr>`;

                dataStore.push({
                    deliveryOrderDetail_RefID: doDetailID,
                    quantity: qtyReq,
                    remarks: note,
                });

                $("#tableMaterialReceiveList").find("tbody").append(newRow);
            }
        });
        
        dataStore = dataStore.filter(item => item !== undefined);

        $("#materialReceiveDetail").val(JSON.stringify(dataStore));
        document.getElementById('GrandTotal').textContent = totalDeliveryOrder;
    });

    $('#delivery-order-details-reset').on('click', function() {
        $('input[id^="qty_req"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('textarea[id^="note"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('#tableMaterialReceiveList tbody').empty();
        $("#materialReceiveDetail").val("");

        document.getElementById('GrandTotal').textContent = "0.00";
        document.getElementById('TotalDeliveryOrder').textContent = "0.00";
    });

    $('#tableGetDeliveryOrder').on('click', 'tbody tr', function() {
        var sysId       = $(this).find('input[data-trigger="sys_id_delivery_order"]').val();
        var projectCode = $(this).find('td:nth-child(2)').text();

        GetDeliveryOrderDetail(sysId, projectCode);
    });

    $('#address_delivery_order_from').on('input', function() {
        if ($(this).val().trim() === address_delivery_order_from_duplicate) {
            $("#id_delivery_order_from").val(id_delivery_order_from_duplicate);
        } else {
            $("#id_delivery_order_from").val('');
        }
    });

    $('#address_delivery_order_to').on('input', function() {
        if ($(this).val().trim() === address_delivery_order_to_duplicate) {
            $("#id_delivery_order_to").val(id_delivery_order_to_duplicate);
        } else {
            $("#id_delivery_order_to").val('');
        }
    });

    $("#FormSubmitMaterialReceive").on("submit", function(e) {
        e.preventDefault();

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
            ShowLoading();

            if (result.value) {
                var action = $(this).attr("action");
                var method = $(this).attr("method");
                var form_data = new FormData($(this)[0]);

                $.ajax({
                    url: action,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: method,
                    success: function(response) {
                        HideLoading();

                        console.log('response', response);

                        // if (response.status == 200) {
                        //     const swalWithBootstrapButtonsss = Swal.mixin({
                        //         confirmButtonClass: 'btn btn-success btn-sm',
                        //         cancelButtonClass: 'btn btn-danger btn-sm',
                        //         buttonsStyling: true,
                        //     });

                        //     swalWithBootstrapButtonsss.fire({
                        //         title: 'Successful !',
                        //         type: 'success',
                        //         html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + response.documentNumber + '</span>',
                        //         showCloseButton: false,
                        //         showCancelButton: false,
                        //         focusConfirm: false,
                        //         confirmButtonText: '<span style="color:black;"> OK </span>',
                        //         confirmButtonColor: '#4B586A',
                        //         confirmButtonColor: '#e9ecef',
                        //         reverseButtons: true
                        //     }).then((result) => {
                        //         window.location.href = '/MaterialReceive?var=1';
                        //     });
                        // } else {
                        //     ErrorNotif("Data Cancel Inputed");
                        // }
                        
                        if (response.message == "WorkflowError") {
                            HideLoading();
                            $("#submitMaterialReceive").prop("disabled", false);

                            CancelNotif("You don't have access", '/MaterialReceive?var=1');
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
                            const formatData = {
                                workFlowPath_RefID: response.workFlowPath_RefID, 
                                nextApprover: response.nextApprover_RefID, 
                                approverEntity: response.approverEntity_RefID, 
                                documentTypeID: response.documentTypeID,
                                storeData: response.storeData
                            };

                            HideLoading();

                            SelectWorkFlow(formatData);
                        }
                    },
                    error: function(response) {
                        console.log('response error', response.responseText);
                        
                        HideLoading();
                        $("#submitMaterialReceive").prop("disabled", false);
                        CancelNotif("You don't have access", '/MaterialReceive?var=1');
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                HideLoading();
                CancelNotif("Data Cancel Inputed", '/MaterialReceive?var=1');
            }
        });
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        getDocumentType();

        $(".loadingMaterialReceiveDetail").hide();
        $(".errorMessageContainerMaterialReceiveDetail").hide();
    });
</script>