<script>
    const vat = document.getElementById("vatOption");
    const documentTypeID = document.getElementById("DocumentTypeID");
    const invoiceDetailsTable = $('#invoice_details_table tbody');
    const dummyData = [
        {
            id: 0,
            combinedBudgetSectionDetail_RefID: 169000000000001,
            subBudgetCode: '235',
            subBudgetName: 'Ampang Kuranji - Padang',
            customerCode: 'PLN1',
            customerName: 'PLN UIP Jawa',
            customerOrder: 1000000000.00,
            balance: 1000000000.00,
            progressCompleted: 85
        },
        {
            id: 1,
            combinedBudgetSectionDetail_RefID: 169000000000002,
            subBudgetCode: '240',
            subBudgetName: 'Cendana Andalas',
            customerCode: 'PLN2',
            customerName: 'PLN UIP Medan',
            customerOrder: 500000.00,
            balance: 500000.00,
            progressCompleted: 30
        },
        {
            id: 2,
            combinedBudgetSectionDetail_RefID: 169000000000003,
            subBudgetCode: '248',
            subBudgetName: 'Sudirman Raya',
            customerCode: 'PLN3',
            customerName: 'PLN UIP Jakarta',
            customerOrder: 250000000.00,
            balance: 100000000.00,
            progressCompleted: 60
        },
        {
            id: 3,
            combinedBudgetSectionDetail_RefID: 169000000000004,
            subBudgetCode: '221',
            subBudgetName: 'Gatot Subroto Line',
            customerCode: 'PLN4',
            customerName: 'PLN UIP Bandung',
            customerOrder: 800000000.00,
            balance: 400000000.00,
            progressCompleted: 50
        },
        {
            id: 4,
            combinedBudgetSectionDetail_RefID: 169000000000005,
            subBudgetCode: '254',
            subBudgetName: 'Merdeka Selatan Grid',
            customerCode: 'PLN5',
            customerName: 'PLN UIP Surabaya',
            customerOrder: 1200000000.00,
            balance: 900000000.00,
            progressCompleted: 25
        },
        {
            id: 5,
            combinedBudgetSectionDetail_RefID: 169000000000006,
            subBudgetCode: '249',
            subBudgetName: 'Panjang Timur Project',
            customerCode: 'PLN6',
            customerName: 'PLN UIP Lampung',
            customerOrder: 450000000.00,
            balance: 100000000.00,
            progressCompleted: 78
        },
        {
            id: 6,
            combinedBudgetSectionDetail_RefID: 169000000000007,
            subBudgetCode: '219',
            subBudgetName: 'Barito Hulu Development',
            customerCode: 'PLN7',
            customerName: 'PLN UIP Kalimantan',
            customerOrder: 950000000.00,
            balance: 500000000.00,
            progressCompleted: 47
        },
        {
            id: 7,
            combinedBudgetSectionDetail_RefID: 169000000000008,
            subBudgetCode: '235',
            subBudgetName: 'Rinjani Expansion',
            customerCode: 'PLN8',
            customerName: 'PLN UIP NTB',
            customerOrder: 300000000.00,
            balance: 200000000.00,
            progressCompleted: 66
        },
        {
            id: 8,
            combinedBudgetSectionDetail_RefID: 169000000000009,
            subBudgetCode: '217',
            subBudgetName: 'Papua Tengah Electrification',
            customerCode: 'PLN9',
            customerName: 'PLN UIP Papua',
            customerOrder: 700000000.00,
            balance: 700000000.00,
            progressCompleted: 10
        },
        {
            id: 9,
            combinedBudgetSectionDetail_RefID: 169000000000010,
            subBudgetCode: '222',
            subBudgetName: 'Nusantara Grid Phase 1',
            customerCode: 'PLN10',
            customerName: 'PLN UIP Nusantara',
            customerOrder: 1500000000.00,
            balance: 1000000000.00,
            progressCompleted: 35
        },
        {
            id: 10,
            combinedBudgetSectionDetail_RefID: 169000000000011,
            subBudgetCode: '256',
            subBudgetName: 'Batam Island Upgrade',
            customerCode: 'PLN11',
            customerName: 'PLN UIP Batam',
            customerOrder: 600000000.00,
            balance: 300000000.00,
            progressCompleted: 72
        }
    ];

    function onChangeVAT(params) {
        if (params.value == "Yes") {
            $('#invoice_vat_percentage').css({ "display": "flex" });
        } else {
            $('#invoice_details_total').text(`Total Invoice: 0.00`);
            $('#invoice_vat_percentage').css({ "display": "none" });
        }
    }

    function calculateTotalInvoice() {
        let total = 0;

        document.querySelectorAll('input[id^="invoice_value"]').forEach(function (input) {
            let value = parseFloat(input.value.replace(/,/g, ''));
            if (!isNaN(value)) {
                total += value;
            }
        });

        document.getElementById('invoice_details_total').textContent = `Total Invoice: ${decimalFormat(parseFloat(total))}`;
    }

    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('input[id^="invoice_value"]').forEach(function (input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

        if (vat.options[vat.selectedIndex].text !== "Select a VAT" && total > 0) {
            let result = (vat.options[vat.selectedIndex].text / 100) * total;

            document.getElementById('invoice_details_vat').textContent = currencyTotal(result);
            document.getElementById('invoice_details_grand_total').textContent = `Grand Total: ${currencyTotal(result + total)}`;
        } else {
            document.getElementById('invoice_details_vat').textContent = currencyTotal(total);
            document.getElementById('invoice_details_grand_total').textContent = `Grand Total: ${currencyTotal(total)}`;
        }
    }

    function getInvoiceDetails(budgetID) {
        $.each(dummyData, function (key, val) {
            let row = `
                <tr>
                    <input
                        name="invoiceDetails[${key}][entities][combinedBudgetSectionDetail_RefID]"
                        value="${val.combinedBudgetSectionDetail_RefID}"
                        type="hidden"
                    />

                    <td style="text-align: left;">${val.subBudgetCode} - ${val.subBudgetName}</td>
                    <td style="text-align: center;">${decimalFormat(parseFloat(val.customerOrder))}</td>
                    <td style="text-align: center;">${val.progressCompleted}</td>
                    <td style="text-align: center;">${decimalFormat(parseFloat(val.balance))}</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center; width: 12%; padding-right: 5px !important;">
                        <input class="form-control number-without-negative" id="invoice_progress${key}" name="invoiceDetails[${key}][entities][progress]" autocomplete="off" style="border-radius:0px;" />
                    </td>
                    <td style="text-align: center; padding-right: 5px !important;">
                        <input class="form-control number-without-negative" id="invoice_value${key}" name="invoiceDetails[${key}][entities][value]" autocomplete="off" style="border-radius:0px; width: 125px;" />
                    </td>
                </tr>
            `;

            invoiceDetailsTable.append(row);

            $(`#invoice_value${key}`).on('input', function () {
                var invoice_value = $(this).val().replace(/,/g, '');

                if (invoice_value > val.customerOrder) {
                    $(this).val(0);

                    console.log('here');

                    ErrorHandler.notifToast(
                        'error',
                        'Invoice Value is over !',
                        'Error!'
                    );
                }

                calculateTotalInvoice();
            });

            $(`#invoice_progress${key}`).on('input', function () {
                let val = this.value.replace(/[^\d]/g, '').slice(0, 3);

                if (parseInt(val) > 100) {
                    val = '';

                    ErrorHandler.notifToast(
                        'error',
                        'Maximum value is 100 !',
                        'Error!'
                    );
                }

                this.value = val;
            });
        });
    }

    function getWorkflow(combinedBudgetRefID, combinedBudgetCode, combinedBudgetName) {
        $.ajax({
            type: 'POST',
            data: {
                businessDocumentType_RefID: documentTypeID.value,
                combinedBudget_RefID: combinedBudgetRefID
            },
            url: '{!! route("Workflow.UserAllowedToSubmit") !!}',
            success: function (response) {
                if (response.status === 200 && !response.data[0].signAccess) {
                    getInvoiceDetails(combinedBudgetRefID);

                    $("#budget_id").val(combinedBudgetRefID);
                    $("#budget_name").val(`${combinedBudgetCode} - ${combinedBudgetName}`);
                    $("#budget_name").css({ "border": "1px solid #ced4da", "background-color": "#e9ecef" });
                } else {
                    Swal.fire("Error", "You don't have a access", "error");
                }

                $("#budget_icon").show();
                $("#budget_loading").hide();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('jqXHR, textStatus, errorThrown', jqXHR, textStatus, errorThrown);
                Swal.fire("Error", "Data Error", "error");
            }
        });
    }

    function getVAT() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getVAT") !!}',
            success: function (data) {
                if (data && Array.isArray(data)) {
                    $('#vatOption').empty();
                    $('#vatOption').append('<option disabled selected value="Select a VAT">Select a VAT</option>');

                    data.forEach(function (project) {
                        $('#vatOption').append('<option value="' + project.tariffFixRate + '">' + project.tariffFixRate + '</option>');
                    });
                } else {
                    console.log('Data vat not found.');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getVAT error: ', textStatus, errorThrown);
            }
        });
    }

    $('#tableProjects').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val("");
        $("#budget_name").val("");
        $("#budget_name").css({ "border": "1px solid #ced4da", "background-color": "#FFF" });

        $("#budget_icon").hide();
        $("#budget_loading").show();

        getWorkflow(sysId, code, name);

        $('#myProjects').modal('toggle');
    });

    $('#tableGetInvoice').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_modal_invoice"]').val();
        const trano = $(this).find('td:nth-child(2)').text();

        $("#modal_invoice_id").val(sysId);
        $("#modal_invoice_document_number").val(trano);

        $("#myInvoice").modal('toggle');
    });

    $('#invoiceForm').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{!! route("Invoice.store") !!}',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                Utils.showLoading();
            }
        })
            .done(function (response) {
                console.log('response', response);

                if (response.status === 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        Utils.cancelForm("{{ route('Invoice.index') }}");
                    });
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);

                if (jqXHR.status === 422) {
                    let errors = jqXHR.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        console.log(key + ': ' + value[0]);
                    });
                }
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                Utils.hideLoading();
            });
        ;
    });

    $(document).ready(function () {
        getVAT();
    });
</script>