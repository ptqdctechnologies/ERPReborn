<script>
    let data = [];
    let dataAddManual = [];
    let indexSubBudget = null;
    let dataWorkflow = {
        workFlowPathRefID: null,
        approverEntityRefID: null,
        comment: null
    };
    const budgetID = document.getElementById("budget_id");
    const currencyID = document.getElementById("currency_id");
    const fileID = document.getElementById("dataInput_Log_FileUpload");
    const dataTable = {!! json_encode($details ?? []) !!};

    function pickSubBudget(index) {
        indexSubBudget = index;
    }

    function calculateTotal() {
        let total = 0;

        document.querySelectorAll('input[id^="value"]').forEach(function (input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma

            if (!isNaN(value)) {
                total += value;
            }
        });

        document.getElementById('manually_total').textContent = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function addRow() {
        const tbody = document.getElementById("table_tbody_add_manually");

        const newRow = {
            recordID: "",
            entities: {
                combinedBudgetSection_RefID: "",
                combinedBudgetSectionName: "",
                value: "",
                notes: ""
            }
        };

        dataAddManual.push(newRow);

        renderTable();
    }

    function removeRow(index) {
        dataAddManual.splice(index, 1);
        renderTable();
    }

    function updateField(index, field, value) {
        dataAddManual[index].entities[field] = value;

        console.log("Updated:", dataAddManual); // untuk debugging
    }

    function renderTable() {
        const tbody = document.getElementById("table_tbody_add_manually");
        tbody.innerHTML = "";

        dataAddManual.forEach((row, index) => {
            const tr = document.createElement("tr");
            if (index === dataAddManual.length - 1) {
                tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON PLUS -->
                            <div class="icon-plus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;
                                display:${index === dataAddManual.length - 1 ? 'flex' : 'none !important'};"
                                onclick="addRow()">
                                <i class="fas fa-plus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                `;
            } else {
                tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON MINUS -->
                            <div class="icon-minus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;display:${index === dataAddManual.length - 1 ? 'none !important' : 'flex'};"
                                onclick="removeRow(${index})">
                                <i class="fas fa-minus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" style="cursor:pointer;">
                                    <a href="javascript:;" data-toggle="modal" data-target="#mySites" onclick="pickSubBudget(${index})" style="color: #000;">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" id="combinedBudgetSection_RefID${index}" value="${row.entities.combinedBudgetSection_RefID}">
                            <input type="text" id="combinedBudgetSectionName${index}" class="form-control" readonly value="${row.entities.combinedBudgetSectionName}" onchange="updateField(${index}, 'combinedBudgetSectionName', this.value)" style="background-color: ${row.entities.combinedBudgetSectionName ? '#e9ecef' : 'white'};">
                        </div>
                    </td>
                    <td>
                        <input type="text" id="value${index}" class="form-control form-control number-without-negative" value="${row.entities.value ? Utils.formatCurrency(row.entities.value) : row.entities.value}" onkeyup="calculateTotal()" onchange="updateField(${index}, 'value', parseFloat(this.value.replace(/,/g, '')))">
                    </td>
                    <td>
                        <textarea id="notes${index}" class="form-control" onchange="updateField(${index}, 'notes', this.value)">${row.entities.notes}</textarea>
                    </td>
                `;
            }

            tbody.appendChild(tr);
        });

        calculateTotal();
    }

    function customerOrderDetail(dataDetail) {
        dataDetail.forEach(element => {
            dataAddManual.push({
                recordID: element.Sys_ID,
                entities: {
                    combinedBudgetSection_RefID: element.CombinedBudgetSection_RefID,
                    combinedBudgetSectionName: `${element.CombinedBudgetSectionCode} - ${element.CombinedBudgetSectionName}`,
                    value: element.Value,
                    notes: element.Notes,
                }
            });
        });

        addRow();
        getSites(dataDetail[0].CombinedBudget_RefID);
    }

    function revisionForm() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'PUT',
            url: '{!! route("CustomerOrder.update", $customerOrder_RefID) !!}',
            data: {
                // workFlowPath_RefID: dataWorkflow.workFlowPathRefID,
                // approverEntity: dataWorkflow.approverEntityRefID,
                comment: dataWorkflow.comment,
                storeData: {
                    combinedBudgetRefID: budgetID.value,
                    currencyRefID: currencyID.value,
                    logFileUploadPointerRefID: fileID.value,
                    customerOrderDetail: JSON.stringify(dataAddManual.filter(val => val.entities.combinedBudgetSection_RefID))
                }
            },
            success: function (res) {
                HideLoading();

                if (res.status == 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:#0046FF;font-weight:bold;">' + res.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        cancelForm("{{ route('CustomerOrder.index', ['var' => 1]) }}");
                    });
                } else {
                    ErrorNotif("Revision Customer Order Failed");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                HideLoading();
                ErrorNotif("Internal Server Error");
            }
        });
    }

    function commentWorkflow() {
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
            showCancelButton: true,
            focusConfirm: false,
            cancelButtonText: '<span style="color:black;"> Cancel </span>',
            confirmButtonText: '<span style="color:black;"> OK </span>',
            cancelButtonColor: '#DDDAD0',
            confirmButtonColor: '#DDDAD0',
            reverseButtons: true
        }).then((result) => {
            if ('value' in result) {
                dataWorkflow.comment = result.value;
                ShowLoading();
                revisionForm();
            }
        });
    }

    function validationForm() {
        let isValid = true;
        const isBudgetIDNotEmpty = budgetID.value.trim() !== '';
        const isCurrencyIDNotEmpty = currencyID.value.trim() !== '';

        if (
            isBudgetIDNotEmpty &&
            isCurrencyIDNotEmpty
        ) {
            if (isValid) {
                commentWorkflow();
            }
        } else {
            if (
                !isBudgetIDNotEmpty &&
                !isCurrencyIDNotEmpty
            ) {
                $("#project_name").css("border", "1px solid red");
                $("#currency_name").css("border", "1px solid red");

                $("#project_message").show();
                $("#currency_message").show();
                return;
            }
            if (!isBudgetIDNotEmpty) {
                $("#project_name").css("border", "1px solid red");
                $("#project_message").show();
                return;
            }
            if (!isCurrencyIDNotEmpty) {
                $("#currency_name").css("border", "1px solid red");
                $("#currency_message").show();
                return;
            }
        }
    }

    $('#tableSites').on('click', 'tbody tr', function () {
        if (indexSubBudget === null) return;

        const sysId = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode = $(this).find('td:nth-child(2)').text();
        const siteName = $(this).find('td:nth-child(3)').text();

        $(`#combinedBudgetSection_RefID${indexSubBudget}`).val(sysId);
        $(`#combinedBudgetSectionName${indexSubBudget}`).val(`${siteCode} - ${siteName}`);
        $(`#combinedBudgetSectionName${indexSubBudget}`).css('border', '1px solid #ced4da');

        updateField(indexSubBudget, 'combinedBudgetSection_RefID', sysId);
        updateField(indexSubBudget, 'combinedBudgetSectionName', `${siteCode} - ${siteName}`);

        $('#mySites').modal('toogle');
    });

    $(document).ready(function () {
        customerOrderDetail(dataTable);
    });
</script>