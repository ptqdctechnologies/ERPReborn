<script>
    let currentIndexPickCOA = null;

    function pickCOA(index) {
        currentIndexPickCOA = index;
    }

    function checkOneLineBudgetContents(indexInput) {
        const rows = document.querySelectorAll("#debit_note_details_table tbody tr");
        let hasFullRow = false;

        rows.forEach((row, index) => {
            const value = document.getElementById(`debit_note_value${index}`)?.value.trim();
            const tax   = document.getElementById(`debit_note_tax${index}`)?.value.trim();
            const coa   = document.getElementById(`debit_note_coa_name${index}`)?.value.trim();

            if (value !== "" && tax !== "" && coa !== "") {
                hasFullRow = true;
            }
        });

        rows.forEach((row, index) => {
            const valueEl   = document.getElementById(`debit_note_value${index}`);
            const taxEl     = document.getElementById(`debit_note_tax${index}`);
            const coaEl     = document.getElementById(`debit_note_coa_name${index}`);

            if (hasFullRow) {
                $(valueEl).css("border", "1px solid #ced4da");
                $(taxEl).css("border", "1px solid #ced4da");
                $(coaEl).css("border", "1px solid #ced4da");
                $("#debit_note_details_message").hide();
            } else {
                if (indexInput > -1) {
                    if (indexInput == index) {
                        if (valueEl.value.trim() != "" || taxEl.value.trim() != "") {
                            $(valueEl).css("border", "1px solid red");
                            $(taxEl).css("border", "1px solid red");
                            $(coaEl).css("border", "1px solid red");
                            $("#debit_note_details_message").show();
                        } else {
                            $(valueEl).css("border", "1px solid #ced4da");
                            $(taxEl).css("border", "1px solid #ced4da");
                            $(coaEl).css("border", "1px solid #ced4da");
                            $("#debit_note_details_message").hide();
                        }
                    }

                    if (indexInput != index && (valueEl.value.trim() == "" && taxEl.value.trim() == "")) {
                        $(valueEl).css("border", "1px solid #ced4da");
                        $(taxEl).css("border", "1px solid #ced4da");
                        $(coaEl).css("border", "1px solid #ced4da");
                    } 
                } else {
                    $(valueEl).css("border", "1px solid red");
                    $(taxEl).css("border", "1px solid red");
                    $(coaEl).css("border", "1px solid red");
                    $("#debit_note_details_message").show();
                }
            }
        });

        return hasFullRow;
    }

    function submitForm() {
        $('#debit_note_submit_modal').modal('hide');

        let action = $('#debit_note_form').attr("action");
        let method = $('#debit_note_form').attr("method");
        let form_data = new FormData($('#debit_note_form')[0]);
        form_data.append('debit_note_details', JSON.stringify(dataStore));

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
                HideLoading();

                if (response.message == "WorkflowError") {
                    CancelNotif("You don't have access", "{{ route('DebitNote.index', ['var' => 1]) }}");
                } else if (response.message == "MoreThanOne") {
                    $('#getWorkFlow').modal('toggle');

                    let t = $('#tableGetWorkFlow').DataTable();
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

                    selectWorkFlow(formatData);
                }
            },
            error: function(response) {
                console.log('response error', response);
                
                HideLoading();
                CancelNotif("You don't have access", "{{ route('DebitNote.index', ['var' => 1]) }}");
            }
        });
    }

    $('#tableDebitNote').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_modal_dn"]').val();
        var trano = $(this).find('td:nth-child(2)').text();
        
        $("#debit_note_number").css("border", "1px solid #ced4da");

        $("#debit_note_id").val(sysId);
        $("#debit_note_number").val(trano);
        $('#myDebitNote').modal('hide');
    });

    $('#tableGetChartOfAccount').on('click', 'tbody tr', async function() {
        if (currentIndexPickCOA === null) return;
        
        var sysId = $(this).find('input[data-trigger="sys_id_modal_coa"]').val();
        var code  = $(this).find('td:nth-child(2)').text();
        var name  = $(this).find('td:nth-child(3)').text();
        
        checkOneLineBudgetContents(currentIndexPickCOA);
        
        $(`#debit_note_coa_id${currentIndexPickCOA}`).val(sysId);
        $(`#debit_note_coa_name${currentIndexPickCOA}`).val(`${code} - ${name}`);
        $(`#debit_note_coa_name${currentIndexPickCOA}`).css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});
        
        $('#myGetChartOfAccount').modal('hide');
    });
</script>