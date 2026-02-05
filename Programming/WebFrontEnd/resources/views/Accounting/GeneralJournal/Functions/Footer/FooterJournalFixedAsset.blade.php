<script>
    let currentIndexPickDepreciationCategory = 0;
    let valueTriggerDepreciationMethod = 'CATEGORY';

    function pickDepreciationCategory(index) {
        currentIndexPickDepreciationCategory = index;
    }

    function getDepreciationRateYears(categoryID, depreciationMethodID, indexDepreciationRateYears) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: 'GET',
            url: '{!! route("getDepreciationRateYears") !!}?assetCategoryRef_ID=' + categoryID + '&depreciationMethodRef_ID=' + depreciationMethodID,
            success: function(data) {
                if (data && Array.isArray(data) && data[0]) {
                    $(`#depreciationYears${indexDepreciationRateYears}`).each(function () {
                        $(this).html(`
                            <option value="" disabled ${!data[0]?.period? 'selected': ''}>Select a Years</option>
                            <option value="4" ${data[0]?.period == '4' ? 'selected': ''}>4</option>
                            <option value="8" ${data[0]?.period == '8' ? 'selected': ''}>8</option>
                            <option value="16" ${data[0]?.period == '16' ? 'selected': ''}>16</option>
                            <option value="20" ${data[0]?.period == '20' ? 'selected': ''}>20</option>
                        `);
                    });
                    $(`#depreciationYears${indexDepreciationRateYears}`).prop("disabled", false);

                    // depreciationRateYearsIDValue = data[0]?.sys_ID;
                    // depreciationRateValue = data[0]?.rate;
                    // depreciationYearsValue = data[0]?.period;

                    // $('#depreciation_rate_years_id').val(data[0]?.sys_ID);
                    // $(`#depreciationRate${indexDepreciationRateYears}`).removeAttr("readonly");

                    $(`#depreciationRate${indexDepreciationRateYears}`).val(data[0]?.rate);

                    // $(`#depreciationYears${indexDepreciationRateYears}`).removeAttr("readonly");
                    // $(`#depreciationYears${indexDepreciationRateYears}`).val(data[0]?.period); 

                    // $("#containerDepreciationRate").show();
                    // $("#containerLoadingDepreciationRate").hide();
                } else {
                    $(`#depreciationYears${indexDepreciationRateYears}`).each(function () {
                        $(this).html(`
                            <option value="" disabled selected>Select a Years</option>
                        `);
                    });
                    $(`#depreciationYears${indexDepreciationRateYears}`).prop("disabled", true);

                    // console.log('Data depreciation rate years not found.');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getDepreciationRateYears error: ', textStatus, errorThrown);
            }
        });
    }

    function getDepreciationMethod() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDepreciationMethod") !!}',
            success: function(data) {
                let options = '<option value="" disabled selected>Select a Method</option>';

                $.each(data, function (index, item) {
                    options += `<option value="${item.sys_ID}">${item.name}</option>`;
                });

                $('.depreciation-method').each(function () {
                    $(this).html(options);
                });
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getDepreciationMethod error: ', textStatus, errorThrown);
            }
        });
    }

    function onChangeDepreciationMethod(index) {
        const selectMethod      = document.getElementById(`depreciationMethod${index}`);
        const selectCategory    = document.getElementById(`depreciationCategoryRefID${index}`);

        getDepreciationRateYears(selectCategory.value, selectMethod.value, index);
    }

    function onChangeDepreciationYears(index) {
        const selectMethod = document.getElementById(`depreciationMethod${index}`);
        const selectYears  = document.getElementById(`depreciationYears${index}`);
        const selectRate   = document.getElementById(`depreciationRate${index}`);

        if (selectMethod.value == '298000000000001') {
            if (selectYears.value == '4') {
                selectRate.value = '25';
            } else if (selectYears.value == '8') {
                selectRate.value = '12.5';
            } else if (selectYears.value == '16') {
                selectRate.value = '6.25';
            } else if (selectYears.value == '20') {
                selectRate.value = '5';
            }
        } else {
            if (selectYears.value == '4') {
                selectRate.value = '50';
            } else if (selectYears.value == '8') {
                selectRate.value = '25';
            } else if (selectYears.value == '16') {
                selectRate.value = '12.5';
            } else if (selectYears.value == '20') {
                selectRate.value = '10';
            }
        }
    }

    function onTriggerDepreciationMethod(params) {
        valueTriggerDepreciationMethod = params;
    }

    function getDetailJournalFixedAsset(accountPayableID) {
        $('#journal_fixed_asset_body_table').empty();
        $("#journal_fixed_asset_loading_table").show();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("AccountPayable.Detail") !!}?account_payable_id=' + accountPayableID,
            success: function(data) {
                $("#journal_fixed_asset_loading_table").hide();

                if (data.status === 200 && Array.isArray(data.data) && data.data.length > 0) {
                    $.each(data.data, function(key, val) {
                        if (val.asset == 1) {
                            let row = `
                                <tr>
                                    <td style="text-align: center;">
                                        ${val.combinedBudgetName || '-'}
                                    </td>
                                    <td style="text-align: center;">
                                        ${val.combinedBudgetSection_RefID || '-'}
                                    </td>
                                    <td style="text-align: center;">
                                        ${val.productCode || ''} - ${val.productName || ''}
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" onclick="onTriggerDepreciationMethod('CATEGORY')">
                                                    <a data-toggle="modal" data-target="#myGetCategory" onclick="pickDepreciationCategory(${key})">
                                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                                    </a>
                                                </span>
                                            </div>
                                            <input id="depreciationCategoryRefID${key}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                                            <input id="depreciationCategoryName${key}" style="border-radius:0;width:130px;background-color:white;" class="form-control" readonly />
                                        </div>
                                    </td>
                                    <td style="padding: 0.5rem !important;">
                                        <select class="form-control depreciation-method" id="depreciationMethod${key}" onChange="valueTriggerDepreciationMethod == 'CATEGORY' ? onChangeDepreciationMethod(${key}) : onChangeDepreciationYears(${key})">
                                            <option value="">Select a Method</option>
                                        </select>
                                    </td>
                                    <td style="padding: 0.5rem !important;">
                                        <select class="form-control" id="depreciationYears${key}" onChange="onChangeDepreciationYears(${key})" onclick="onTriggerDepreciationMethod('YEARS')" disabled>
                                            <option value="">Select a Years</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center;">
                                        <input id="depreciationRate${key}" class="form-control number-without-negative" style="border-radius:0px;" readonly />
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                                    <a data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCOA(${key})">
                                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                                    </a>
                                                </span>
                                            </div>
                                            <input id="coaID${key}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                                            <input id="coaName${key}" style="border-radius:0;width:130px;background-color:white;" class="form-control" readonly />
                                        </div>
                                    </td>
                                    <td style="text-align: center;">
                                        <select class="form-control" id="coaStatus${key}">
                                            <option value="" disabled selected>Select a ...</option>
                                            <option value="214000000000001">Debit</option>
                                            <option value="214000000000001">Credit</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center;padding-right: .3rem;">
                                        <input id="value${key}" class="form-control number-without-negative" data-index='' autocomplete="off" style="border-radius:0px;" />
                                    </td>
                                </tr>
                            `;

                            // <input id="depreciationYears${key}" class="form-control number-without-negative" style="border-radius:0px;" readonly />

                            $('#journal_fixed_asset_table tbody').append(row);
                        }
                    });

                    getDepreciationMethod();
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ', status, error);
            }
        });
    }

    $('#tableGetCategory').on('click', 'tbody tr', async function() {
        const sysId         = $(this).find('input[data-trigger="sys_id_category"]').val();
        const code          = $(this).find('td:nth-child(2)').text();
        const name          = $(this).find('td:nth-child(3)').text();
        const selectMethod  = document.getElementById(`depreciationMethod${currentIndexPickDepreciationCategory}`);

        $(`#depreciationCategoryRefID${currentIndexPickDepreciationCategory}`).val(sysId);
        $(`#depreciationCategoryName${currentIndexPickDepreciationCategory}`).val(`${code} - ${name}`);
        $(`#depreciationCategoryName${currentIndexPickDepreciationCategory}`).css({"background-color": "#e9ecef"});

        getDepreciationRateYears(sysId, selectMethod.value, currentIndexPickDepreciationCategory);

        $('#myGetCategory').modal('hide');
    });

    $('#tableAccountPayables').on('click', 'tbody tr', function() {
        const sysId         = $(this).find('input[data-trigger="sys_id_modal_account_payable"]').val();
        const trano         = $(this).find('td:nth-child(2)').text();
        const budgetCode    = $(this).find('td:nth-child(3)').text();
        const budgetName    = $(this).find('td:nth-child(4)').text();

        $("#transaction_id_fixed_asset").val(sysId);
        $("#transaction_number_fixed_asset").val(trano);
        $(`#transaction_number_fixed_asset`).css({"background-color": "#e9ecef", "border": "1px solid #ced4da"});

        getDetailJournalFixedAsset(sysId);
        onClickGeneralJournalButton();

        $('#myAccountPayables').modal('hide');
    });
</script>