<script>
    const dataTable = document.getElementById('data_table');

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

    function GetReferenceNumberDetail(dataDetail) {
        $(".loadingReferenceNumberDetail").hide();

        let totalRefNumberDetail = 0;
        let tbody = $('#tableReferenceNumberDetail tbody');
        tbody.empty();

        let tbodyList = $('#tableDeliverOrderDetailList tbody');
        tbodyList.empty();

        $.each(dataDetail, function(key, val2) {
            totalRefNumberDetail += parseFloat(val2.qtyReq);

            let row = `
                <tr>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.documentNumber || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.productName}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input class="form-control number-without-negative" id="qty_req${key}" data-index=${key} data-quantity=${val2.qtyReq || 0} autocomplete="off" value=${val2.qtyReq || 0} style="border-radius:0px;" />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input class="form-control number-without-negative" id="balance${key}" autocomplete="off" style="border-radius:0px;" value="0" disabled />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 150px;">
                        <textarea id="note${key}" class="form-control">${val2.remarks || ''}</textarea>
                    </td>
                </tr>
            `;

            tbody.append(row);

            $(`#qty_req${key}`).on('keyup', function() {
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

            let rowList = `
                <tr>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.documentNumber || ''}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.productName || ''}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.quantityUnitName || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.qtyReq || ''}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">0</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.remarks || ''}</td>
                </tr>
            `;

            tbodyList.append(rowList);
        });

        document.getElementById('TotalReferenceNumber').textContent = currencyTotal(totalRefNumberDetail);
        document.getElementById('GrandTotal').textContent = currencyTotal(totalRefNumberDetail);

        $("#tableReferenceNumberDetail tbody").show();
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
                const result = data.find(({ Name }) => Name === "Delivery Order Revision Form");

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

    $("#FormRevisionDeliveryOrder").on("submit", function(e) {
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
            if (result.value) {
                var action = $(this).attr("action");
                var method = $(this).attr("method");
                var form_data = new FormData($(this)[0]);

                ShowLoading();

                $.ajax({
                    url: action,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: method,
                    success: function(response) {
                        console.log('response', response);
                    },
                    error: function(response) {
                        console.log('response error', response);
                        
                        HideLoading();
                        $("#submitRevisionDO").prop("disabled", false);
                        CancelNotif("You don't have access", '/DeliveryOrder?var=1');
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                HideLoading();
                CancelNotif("Data Cancel Inputed", '/DeliveryOrder?var=1');
            }
        });
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).on('load', function() {
        const data = JSON.parse(dataTable.value);

        GetReferenceNumberDetail(data);
        getDocumentType();
    });
</script>