<script>
    let currentIndexPickRefBudget   = null;
    let sallaryAllocationDetails    = [];
    let checkedBalancedBudget       = 0;
    let grandTotal                  = 0;
    let tbodyBudgetTable            = $('#budgetTable tbody');

    function pickRefBudget(index) {
        currentIndexPickRefBudget = index;
    }

    function calculateTotal() {
        let totalNetSallary = 0;
        let totalTax = 0;
        let totalProvision = 0;
        
        document.querySelectorAll('input[id^="net_sallary"]').forEach(function(input) {
            let value = Utils.parseFloatSafe(Utils.removeCommas(input.value)); 
            if (!isNaN(value)) {
                totalNetSallary += value;
            }
        });

        document.querySelectorAll('input[id^="tax"]').forEach(function(input) {
            let value = Utils.parseFloatSafe(Utils.removeCommas(input.value)); 
            if (!isNaN(value)) {
                totalTax += value;
            }
        });

        document.querySelectorAll('input[id^="provision"]').forEach(function(input) {
            let value = Utils.parseFloatSafe(Utils.removeCommas(input.value)); 
            if (!isNaN(value)) {
                totalProvision += value;
            }
        });

        grandTotal = totalNetSallary + totalTax + totalProvision;

        document.getElementById('totalNetSallary').textContent = Utils.formatCurrency(totalNetSallary);
        document.getElementById('totalTax').textContent = Utils.formatCurrency(totalTax);
        document.getElementById('totalProvision').textContent = Utils.formatCurrency(totalProvision);
        document.getElementById('grandTotal').textContent = Utils.formatCurrency(grandTotal);

        if (Utils.removeCommas(checkedBalancedBudget) < grandTotal) {
            ErrorHandler.notifToast(
                'error',
                'Grand Total must not exceed the selected Balanced Budget',
                'Error',
            );
        }
    }

    function detailSallaryAllocation() {
        sallaryAllocationDetails = [];
        addRow();
    }

    function removeRow(index) {
        sallaryAllocationDetails.splice(index, 1);

        renderTable();
        calculateTotal();
    }

    function updateField(index, field, value) {
        sallaryAllocationDetails[index][field] = value;

        renderTable();
    }

    function addRow() {
        const newRow = {
            budget_id: "",
            budget_name: "",
            start_date: "",
            end_date: "",
            net_sallary: "",
            tax: "",
            provision: "",
        };

        sallaryAllocationDetails.push(newRow);

        renderTable();
    }

    function renderTable() {
        const tbody = document.getElementById("sallaryBodyTable");
        if (tbody) {
            tbody.innerHTML = "";
        }

        sallaryAllocationDetails.forEach((row, index) => {
            const tr = document.createElement("tr");
            if (index === sallaryAllocationDetails.length - 1) {
                tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON PLUS -->
                            <div class="icon-plus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;
                                display:${index === sallaryAllocationDetails.length - 1 ? 'flex' : 'none !important'};"
                                onclick="addRow()">
                                <i class="fas fa-plus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
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
                                style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;display:flex;"
                                onclick="removeRow(${index})">
                                <i class="fas fa-minus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" onclick="pickRefBudget(${index})">
                                    <a data-toggle="modal" data-target="#myProjects">
                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                    </a>
                                </span>
                            </div>
                            <input type="text" id="budget_name${index}" class="form-control" readonly value="${row.budget_name}" style="border-radius:0;width:130px;background-color:${row.budget_name ? '#e9ecef' : 'white'};" />
                            <input type="hidden" id="budget_id${index}" class="form-control" value="${row.budget_id}" />
                        </div>
                    </td>
                    <td>
                        <div class="input-group" id="period_container${index}">
                            <div class="input-group-prepend" style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
                                <span class="input-group-text" id="period_container_icon${index}" style="border-radius: 0;">
                                    <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
                                </span>
                            </div>
                            <input readonly type="text" class="form-control" style="height: 21.8px;border-radius:0;background-color:${row.start_date && row.end_date ? '#e9ecef' : 'white'};" id="period${index}" value="${row.start_date && row.end_date ? row.start_date + ' - ' + row.end_date : ''}" />
                        </div>
                    </td>
                    <td>
                        <input id="net_sallary${index}" onkeyup="calculateTotal()" onchange="updateField(${index}, 'net_sallary', Utils.removeCommas(this.value))" value="${Utils.formatCurrency(row.net_sallary)}" class="form-control number-without-negative" style="border-radius:0;" />
                    </td>
                    <td>
                        <input id="tax${index}" onkeyup="calculateTotal()" onchange="updateField(${index}, 'tax', Utils.removeCommas(this.value))" value="${Utils.formatCurrency(row.tax)}" class="form-control number-without-negative" style="border-radius:0;" />
                    </td>
                    <td>
                        <input id="provision${index}" onkeyup="calculateTotal()" onchange="updateField(${index}, 'provision', Utils.removeCommas(this.value))" value="${Utils.formatCurrency(row.provision)}" class="form-control number-without-negative" style="border-radius:0;" />
                    </td>
                `;
            }

            if (tbody) {
                tbody.appendChild(tr);
            }

            $(`#period${index}`).daterangepicker({
                autoUpdateInput: false,
                maxDate: moment(),
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $(`#period${index}`).on('apply.daterangepicker', function(ev, picker) {
                $(`#period${index}`).css('background-color', '#e9ecef');
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));

                updateField(index, 'start_date', picker.startDate.format('MM/DD/YYYY'));
                updateField(index, 'end_date', picker.endDate.format('MM/DD/YYYY'));
            });

            $(`#period${index}`).on('cancel.daterangepicker', function(ev, picker) {
                $(`#period${index}`).css('background-color', '#fff');
                $(this).val('');

                updateField(index, 'start_date', '');
                updateField(index, 'end_date', '');
            });

            $(`#period_container_icon${index}`).on('click', function () {
                $(`#period${index}`).trigger('click');
            });
        });
    }

    function handleCheckboxSelection() {
        const checkboxes = document.querySelectorAll('#budgetTable tbody input[type="checkbox"]');

        checkboxes.forEach((checkbox, index) => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    checkboxes.forEach((otherCheckbox, otherIndex) => {
                        if (otherIndex !== index) {
                            otherCheckbox.disabled = true;
                            otherCheckbox.checked = false;
                        }
                    });
                } else {
                    checkboxes.forEach(otherCheckbox => {
                        otherCheckbox.disabled = false;
                    });
                }
                
                getSelectedRowData();
            });
        });
    }

    function getSelectedRowData() {
        const selectedCheckbox = document.querySelector('#budgetTable tbody input[type="checkbox"]:checked');

        if (selectedCheckbox) {
            const row = selectedCheckbox.closest('tr');

            checkedBalancedBudget = row.cells[5].textContent.trim();

            if (Utils.removeCommas(checkedBalancedBudget) < grandTotal) {
                ErrorHandler.notifToast(
                    'error',
                    'Grand Total must not exceed the selected Balanced Budget',
                    'Error',
                );
            }
        } else {
            checkedBalancedBudget = 0;
        }
    }

    function getBudgetDetails(site_code) {
        tbodyBudgetTable.empty();

        $.ajax({
            type: 'GET',
            url: '{!! route("getBudget") !!}?site_code=' + site_code,
            success: function(data) {
                $.each(data, function(key, value) {
                    let row = `
                        <tr>
                            <td style="text-align: center;">
                                <input type="checkbox" aria-label="Checkbox for following text input">
                            </td>
                            <td style="text-align: center;">-</td>
                            <td style="text-align: left;">${value.productCode ? value.productCode + ' -' : ''} ${value.productName}</td>
                            <td style="text-align: center;">${value.unitPriceBaseCurrencyISOCode}</td>
                            <td style="text-align: center;">${Utils.formatCurrency(value.quantity * value.priceBaseCurrencyValue)}</td>
                            <td style="text-align: center;">${Utils.formatCurrency(value.quantityRemaining * value.priceBaseCurrencyValue)}</td>
                        </tr>
                    `;

                    tbodyBudgetTable.append(row);
                });

                handleCheckboxSelection();
            },
            error: function (textStatus, errorThrown) {

            }
        });
    }

    $('#tableProjects').on('click', 'tbody tr', function() {
        const sysId = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code  = $(this).find('td:nth-child(2)').text();
        const name  = $(this).find('td:nth-child(3)').text();

        if (currentIndexPickRefBudget !== null) {
            $(`#budget_id${currentIndexPickRefBudget}`).val(sysId);
            $(`#budget_name${currentIndexPickRefBudget}`).val(`${code} - ${name}`);
            $(`#budget_name${currentIndexPickRefBudget}`).css({"border": "1px solid #ced4da", "background-color": "#e9ecef"});

            updateField(currentIndexPickRefBudget, 'budget_id', sysId);
            updateField(currentIndexPickRefBudget, 'budget_name', `${code} - ${name}`);
        } else {
            $("#budget_id").val(sysId);
            $("#budget_name").val(`${code} - ${name}`);
            $("#budget_name").css({"border": "1px solid #ced4da", "background-color": "#e9ecef"});
            $("#budgetMessage").hide();

            getSites(sysId);
        }

        currentIndexPickRefBudget = null;

        $("#myProjects").modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        const sysId = $(this).find('input[data-trigger="sys_id_site"]').val();
        const code  = $(this).find('td:nth-child(2)').text();
        const name  = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_name").val(`${code} - ${name}`);

        $("#sub_budget_name").css({"border": "1px solid #ced4da", "background-color": "#e9ecef"});
        $("#subBudgetMessage").hide();

        getBudgetDetails(sysId);

        $("#mySites").modal('toggle');
    });

    $(window).one('load', function() {
        detailSallaryAllocation();
    });
</script>