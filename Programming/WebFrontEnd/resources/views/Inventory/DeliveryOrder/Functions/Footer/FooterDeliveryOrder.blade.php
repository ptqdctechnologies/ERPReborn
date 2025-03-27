<script>
    var indexReferenceNumberDetail  = 0;

    $(".loadingReferenceNumberDetail").hide();
    $(".errorMessageContainerReferenceNumberDetail").hide();

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="qty_req"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

        document.getElementById('TotalReferenceNumber').textContent = currencyTotal(total);
    }

    function CancelDeliveryOrder() {
        ShowLoading();
        window.location.href = '/DeliveryOrder?var=1';
    }

    function GetReferenceNumberDetail(reference_id, reference_number) {
        $("#tableReferenceNumberDetail tbody").hide();
        $(".loadingReferenceNumberDetail").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getPurchaseOrderDetail") !!}?purchase_order_id=' + reference_id,
            success: function(data) {
                $(".loadingReferenceNumberDetail").hide();

                let tbody = $('#tableReferenceNumberDetail tbody');

                if (Array.isArray(data) && data.length > 0) {
                    let modifyColumn = `<td rowspan="${data.length}" style="text-align: center; padding: 10px !important;">${reference_number}</td>`;

                    $.each(data, function(key, val2) {
                        let randomNumber = Math.floor(Math.random() * 11);
                        let row = `
                            <tr>
                                <input id="reference_number${indexReferenceNumberDetail}" value="${reference_number}" type="hidden" />
                                <input id="product_code${indexReferenceNumberDetail}" value="-" type="hidden" />
                                <input id="product_name${indexReferenceNumberDetail}" value="-" type="hidden" />
                                <input id="uom${indexReferenceNumberDetail}" value="-" type="hidden" />
                                <input id="qty_reference${indexReferenceNumberDetail}" value="${currencyTotal(val2.Quantity)}" type="hidden" />
                                <input id="qty_avail${indexReferenceNumberDetail}" value="${currencyTotal(randomNumber)}" type="hidden" />

                                ${key === 0 ? modifyColumn : ''}
                                <td style="text-align: center;">-</td>
                                <td style="text-align: center;">-</td>
                                <td style="text-align: center;">-</td>
                                <td style="text-align: center;">${currencyTotal(val2.Quantity)}</td>
                                <td style="text-align: center;">${currencyTotal(randomNumber)}</td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                    <input class="form-control number-without-negative" id="qty_req${indexReferenceNumberDetail}" data-index=${indexReferenceNumberDetail} data-quantity=${val2.Quantity} autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                    <input class="form-control number-without-negative" id="balance${indexReferenceNumberDetail}" autocomplete="off" style="border-radius:0px;" disabled />
                                </td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 150px;">
                                    <textarea id="note${indexReferenceNumberDetail}" class="form-control"></textarea>
                                </td>
                            </tr>
                        `;

                        tbody.append(row);

                        $(`#qty_req${indexReferenceNumberDetail}`).on('keyup', function() {
                            var qty_req = $(this).val().replace(/,/g, '');
                            var data_index = $(this).data('index');
                            var data_total_request = $(this).data('quantity');
                            var result = data_total_request - qty_req;

                            if (Math.sign(result) === -1) {
                                $(this).val("");
                                $(`#balance${data_index}`).val("");
                                ErrorNotif("Qty Request is over Qty Avail !");
                            } else {
                                $(`#balance${data_index}`).val(result.toFixed(2));
                                calculateTotal();
                            }
                        });

                        indexReferenceNumberDetail += 1;
                    });

                    $("#tableReferenceNumberDetail tbody").show();
                } else {
                    $(".errorMessageContainerReferenceNumberDetail").show();
                    $("#errorMessageReferenceNumberDetail").text(`Data not found.`);

                    $("#tableReferenceNumberDetail_length").hide();
                    $("#tableReferenceNumberDetail_filter").hide();
                    $("#tableReferenceNumberDetail_info").hide();
                    $("#tableReferenceNumberDetail_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableReferenceNumberDetail tbody').empty();
                $(".loadingReferenceNumberDetail").hide();
                $(".errorMessageContainerReferenceNumberDetail").show();
                $("#errorMessageReferenceNumberDetail").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $("#reference-number-details-add").on('click', function() {
        var totalReferenceNumber = document.getElementById('TotalReferenceNumber').textContent;

        $("#tableReferenceNumberDetail tbody tr").each(function(index) {
            var referenceNumber = $(this).find(`input[id="reference_number${index}"]`).val();
            var productCode     = $(this).find(`input[id="product_code${index}"]`).val();
            var productName     = $(this).find(`input[id="product_name${index}"]`).val();
            var uom             = $(this).find(`input[id="uom${index}"]`).val();
            var qtyAvail        = $(this).find(`input[id="qty_avail${index}"]`).val();
            var qtyReq          = $(this).find(`input[id="qty_req${index}"]`).val();
            var balance         = $(this).find(`input[id="balance${index}"]`).val();
            var note            = $(this).find(`textarea[id="note${index}"]`).val();

            if (!qtyReq || !note) {
                return;
            }

            var rowToUpdate = null;

            $("#tableReferenceNumberList tbody tr").each(function() {
                var existingRefNumber   = $(this).find("td:eq(0)").text();
                var existingProductCode = $(this).find("td:eq(1)").text();
                var existingProductName = $(this).find("td:eq(2)").text();
                var existingUOM         = $(this).find("td:eq(3)").text();
                var existingQtyAvail    = $(this).find("td:eq(4)").text();

                if (existingRefNumber === referenceNumber) {
                    if (existingProductCode === productCode && existingProductName === productName && existingUOM === uom &&  existingQtyAvail === qtyAvail) {
                        rowToUpdate = $(this);
                    }
                }
            });

            if (rowToUpdate) {
                rowToUpdate.find("td:eq(5)").text(qtyReq);
                rowToUpdate.find("td:eq(6)").text(balance);
                rowToUpdate.find("td:eq(7)").text(note);
            } else {
                var newRow = `<tr>
                    <td style="text-align: center; padding: 0.8rem 0px;">${referenceNumber}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productCode}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productName}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${uom}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${qtyAvail}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(qtyReq)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(balance)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${note}</td>
                </tr>`;

                $("#tableReferenceNumberList").find("tbody").append(newRow);
            }
        });

        document.getElementById('GrandTotal').textContent = totalReferenceNumber;
    });

    $('#reference-number-details-reset').on('click', function() {
        $('input[id^="qty_req"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="balance"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('textarea[id^="note"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('#tableReferenceNumberList tbody').empty();

        document.getElementById('GrandTotal').textContent = "0.00";
        document.getElementById('TotalReferenceNumber').textContent = "0.00";
    });

    $('#referenceNumberModal').on('click', 'tbody tr', function() {
        var sysId           = $(this).find('input[data-trigger="sys_id_reference_number"]').val();
        var referenceNumber = $(this).find('td:nth-child(2)').text();

        $("#reference_id").val(sysId);
        $("#reference_number").val(referenceNumber);
        GetReferenceNumberDetail(sysId, referenceNumber);

        $('#referenceNumberModal').modal('hide');
    });

    $('#tableGetTransporter tbody').on('click', 'tr', function () {
        var sysId           = $(this).find('input[data-trigger="sys_id_transporter"]').val();
        var transporterName = $(this).find('td:nth-child(2)').text();

        $("#transporter_id").val(sysId);
        $("#transporter_name").val(transporterName);
        $("#transporter_phone").val('-');
        $("#transporter_fax").val('-');
        $("#transporter_contact").val('-');
        $("#transporter_handphone").val('-');
        $("#transporter_address").val('-');
    });
</script>