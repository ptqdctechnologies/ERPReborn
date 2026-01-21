<script>
    let currentIndexPickDepreciationCategory = 0;

    function pickDepreciationCategory(index) {
        currentIndexPickDepreciationCategory = index;
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
                let options = '<option value="">Select a Method</option>';

                $.each(data, function (index, item) {
                    options += `<option value="${item.id}">${item.name}</option>`;
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
                                                <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
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
                                        <select class="form-control depreciation-method" id="depreciationMethod${key}">
                                            <option value="">Select a Method</option>
                                        </select>
                                    </td>
                                    <td style="padding: 0.5rem !important;">
                                        <input id="depreciationYears${key}" class="form-control number-without-negative" style="border-radius:0px;" readonly />
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
        const sysId = $(this).find('input[data-trigger="sys_id_category"]').val();
        const code  = $(this).find('td:nth-child(2)').text();
        const name  = $(this).find('td:nth-child(3)').text();

        $(`#depreciationCategoryRefID${currentIndexPickDepreciationCategory}`).val(sysId);
        $(`#depreciationCategoryName${currentIndexPickDepreciationCategory}`).val(`${code} - ${name}`);
        $(`#depreciationCategoryName${currentIndexPickDepreciationCategory}`).css({"background-color": "#e9ecef"});

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