<script>
    
    let documentTypeID = document.getElementById("DocumentTypeID");

    function onChangeVAT(params) {
        if (params.value == "Yes") {
            $('#invoice_vat_percentage').css({"display": "flex"});
        } else {
            $('#invoice_details_total').text(`Total Invoice: 0.00`);
            $('#invoice_vat_percentage').css({"display": "none"});
        }
    }

    function calculateTotalInvoice() {
        let total = 0;
        
        document.querySelectorAll('input[id^="invoice_value"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, ''));
            if (!isNaN(value)) {
                total += value;
            }
        });

        document.getElementById('invoice_details_total').textContent = `Total Invoice: ${decimalFormat(parseFloat(total))}`;
    }

    function getInvoiceDetails(budgetID) {
        const data = [
            {
                id: 0,
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
                subBudgetCode: '256',
                subBudgetName: 'Batam Island Upgrade',
                customerCode: 'PLN11',
                customerName: 'PLN UIP Batam',
                customerOrder: 600000000.00,
                balance: 300000000.00,
                progressCompleted: 72
            }
        ];

        let invoiceDetailsTable = $('#invoice_details_table tbody');

        $.each(data, function(key, val) {
            let row = `
                <tr>
                    <td style="text-align: left;">${val.subBudgetCode} - ${val.subBudgetName}</td>
                    <td style="text-align: center;">${decimalFormat(parseFloat(val.customerOrder))}</td>
                    <td style="text-align: center;">${val.progressCompleted}</td>
                    <td style="text-align: center;">${decimalFormat(parseFloat(val.balance))}</td>
                    <td style="text-align: center; width: 125px;">
                        <input class="form-control number-without-negative" id="invoice_value${key}" autocomplete="off" style="border-radius:0px;" />
                    </td>
                    <td style="text-align: center; width: 100px; padding-right: 5px !important;">
                        <input class="form-control number-without-negative" id="invoice_progress${key}" autocomplete="off" style="border-radius:0px;" />
                    </td>
                </tr>
            `;

            invoiceDetailsTable.append(row);

            $(`#invoice_value${key}`).on('input', function () {
                var invoice_value = $(this).val().replace(/,/g, '');

                if (invoice_value > val.customerOrder) {
                    $(this).val(0);

                    ErrorNotif("Invoice Value is over !");
                } 

                calculateTotalInvoice();
            });

            $(`#invoice_progress${key}`).on('input', function () {
                let val = this.value.replace(/[^\d]/g, '').slice(0, 3);
                if (parseInt(val) > 100) val = '';
                this.value = val;
            });
        });
    }

    $('#tableGetProjectSecond').on('click', 'tbody tr', async function() {
        let sysId       = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        let projectCode = $(this).find('td:nth-child(2)').text();
        let projectName = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val("");
        $("#budget_number").val("");
        $("#budget_message").hide();
        $("#budget_loading").css({"display":"block"});
        $("#budget_trigger").css({"display":"none"});
        $("#var_combinedBudget_RefID").val("");

        try {
            var checkWorkFlow = await checkingWorkflow(sysId, documentTypeID.value);

            if (!checkWorkFlow) {
                $("#var_combinedBudget_RefID").val(sysId);
                $("#budget_id").val(sysId);
                $("#budget_trigger").prop("disabled", true);
                $("#budget_trigger").css({"cursor":"not-allowed"});
                $("#budget_number").css({"background-color":"#e9ecef"});
                $("#budget_number").val(`${projectCode} - ${projectName}`);

                getInvoiceDetails(sysId);
            }

            $("#budget_loading").css({"display":"none"});
            $("#budget_trigger").css({"display":"block"});
        } catch (error) {
            console.error('Error checking workflow:', error);

            Swal.fire("Error", "Error Checking Workflow", "error");
        }
    });
</script>