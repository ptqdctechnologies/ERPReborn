<script>
  let dataStore = [];

  function calculateTotal() {
    let total = 0;
    
    document.querySelectorAll('input[id^="qty_return"]').forEach(function(input) {
      let value = parseFloat(input.value.replace(/,/g, ''));
      if (!isNaN(value)) {
        total += value;
      }
    });

    document.getElementById('material_return_details_total').textContent = decimalFormat(total);
    document.getElementById('material_return_list_total_modal').textContent = `Total: ${decimalFormat(total)}`;
  }

  function summaryData() {
    const sourceTable = document.getElementById('material_return_details_table').getElementsByTagName('tbody')[0];
    const targetTable = document.getElementById('material_return_list_table_modal').getElementsByTagName('tbody')[0];

    const rows = sourceTable.getElementsByTagName('tr');

    for (let row of rows) {
      const materialReceiveDetailRefID  = row.querySelector('input[id^="warehouseInboundOrderDetail_RefID"]');
      const materialReturnValueInput    = row.querySelector('input[id^="qty_return"]');
      const materialReturnNoteInput     = row.querySelector('textarea[id^="note"]');

      if (
        materialReturnValueInput && materialReturnValueInput.value.trim() !== ''
      ) {
        const subBudget   = row.children[1].innerText.trim();
        const productCode = row.children[2].innerText.trim();
        const productName = row.children[3].innerText.trim();
        const uom         = row.children[4].innerText.trim();

        const materialReturnValue = materialReturnValueInput.value.trim();
        const materialReturnNote  = materialReturnNoteInput.value.trim();

        let found = false;
        const existingRows  = targetTable.getElementsByTagName('tr');

        for (let targetRow of existingRows) {
          const targetMaterialReceiveDetailRefID = targetRow.children[0]?.value?.trim();

          if (targetMaterialReceiveDetailRefID == materialReceiveDetailRefID.value) {
            targetRow.children[5].innerText = materialReturnValue;
            found = true;

            const indexToUpdate = dataStore.findIndex(item => item.entities.warehouseInboundOrderDetail_RefID == materialReceiveDetailRefID.value);
            if (indexToUpdate !== -1) {
              dataStore[indexToUpdate] = {
                entities: {
                  warehouseInboundOrderDetail_RefID: parseInt(materialReceiveDetailRefID.value),
                  quantity: parseFloat(materialReturnValue.replace(/,/g, '')),
                  note: materialReturnNote
                }
              };
            }

            break;
          }
        }

        if (!found) {
          const newRow = document.createElement('tr');
          newRow.innerHTML = `
            <input type="hidden" id="target_warehouse_inbound_order_detail_id[]" value="${materialReceiveDetailRefID.value}">

            <td style="text-align: left;padding: 0.8rem 0.5rem;">${subBudget}</td>
            <td style="text-align: center;padding: 0.8rem 0.5rem;">${productCode}</td>
            <td style="text-align: left;padding: 0.8rem 0.5rem;">${productName}</td>
            <td style="text-align: left;padding: 0.8rem 0.5rem;">${uom}</td>
            <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(materialReturnValue)}</td>
          `;

          targetTable.appendChild(newRow);

          dataStore.push({
            entities: {
              warehouseInboundOrderDetail_RefID: parseInt(materialReceiveDetailRefID.value),
              quantity: parseFloat(materialReturnValue.replace(/,/g, '')),
              note: materialReturnNote
            }
          });
        }
      } else {
        const existingRows  = targetTable.getElementsByTagName('tr');

        for (let targetRow of existingRows) {
          const targetMaterialReceiveDetailRefID = targetRow.children[0]?.value?.trim();

          if (targetMaterialReceiveDetailRefID == materialReceiveDetailRefID.value) {
            targetRow.remove();
            break;
          }
        }

        dataStore = dataStore.filter(item => item.entities.warehouseInboundOrderDetail_RefID != materialReceiveDetailRefID.value);
      }
    }
    
    dataStore = dataStore.filter(item => item !== undefined);

    calculateTotal();
  }

  function validationForm() {
    summaryData();
    $('#material_return_submit_modal').modal('show');
  }

  function getMaterialReceiveDetail(materialReceive_RefID, materialReceiveNumber) {
    $("#material_return_details_table tbody").empty();
    $(".material_return_details_loading").show();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'POST',
      url: '{!! route("MaterialReceive.Detail") !!}?materialReceive_RefID=' + materialReceive_RefID,
      success: async function(data) {
        if (data.metadata.HTTPStatusCode == 200) {
          let result = data.data;

          $("#var_combinedBudget_RefID").val(result[0].combinedBudget_RefID);

          $("#material_receive_number").css({"background-color":"#e9ecef"});
          $("#material_receive_number").val(materialReceiveNumber);
          $("#material_receive_id").val(materialReceive_RefID);
          $("#material_receive_budget_id").val(`${result[0].combinedBudgetCode} - ${result[0].combinedBudgetName}`);

          $.each(result, function(key, val) {
            let row = `
              <tr>
                <input type="hidden" id="warehouseInboundOrderDetail_RefID[]" value="${val.sys_ID}">

                <td style="text-align: center;">${val.combinedBudgetSectionCode} - ${val.combinedBudgetSectionName}</td>
                <td style="text-align: center;">${val.productCode}</td>
                <td style="text-align: center;">${val.productName}</td>
                <td style="text-align: center;">${val.quantityUnitName}</td>
                <td style="text-align: center;">${val.note}</td>
                <td style="text-align: center;">${val.quantity}</td>
                <td style="text-align: center; width: 100px;">
                  <input class="form-control number-without-negative" id="qty_return${key}" autocomplete="off" style="border-radius:0px;" />
                </td>
                <td style="text-align: center; width: 100px;">
                  <textarea id="note${key}" class="form-control"></textarea>
                </td>
              </tr>
            `;

            $('#material_return_details_table tbody').append(row);

            $(`#qty_return${key}`).on('keyup', function() {
              let qty_return  = $(this).val().replace(/,/g, '');

              if (parseFloat(qty_return) > val.quantity) {
                $(this).val("");
                ErrorNotif("Qty Return is over!");
              } 

              calculateTotal();
            });
          });
        } else {
          $(".material_return_details_error_message_container").show();
          $("#material_return_details_error_message").text(`Data not found.`);

          $("#material_return_details_table_length").hide();
          $("#material_return_details_table_filter").hide();
          $("#material_return_details_table_info").hide();
          $("#material_return_details_table_paginate").hide();
        }

        $(".material_return_details_loading").hide();
      },
      error: function (textStatus, errorThrown) {
        console.log('getMaterialReceiveDetail', textStatus.status, errorThrown);
        
        $('#material_return_details_table tbody').empty();
        $(".material_return_details_loading").hide();
        $(".material_return_details_error_message_container").show();
        $("#material_return_details_error_message").text(`Failed to fetch material receive detail`);
      }
    });
  }

  function materialReturnStore(formatData) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'POST',
      data: formatData,
      url: '{{ route("Reimbursement.store") }}',
      success: function(res) {
        HideLoading();

        if (res.status === 200) {
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
            cancelForm("{{ route('MaterialReturn.index', ['var' => 1]) }}");
          });
        } else {
          ErrorNotif("Data Cancel Inputed");
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log('error', jqXHR, textStatus, errorThrown);

        HideLoading();

        ErrorNotif("Data Cancel Inputed");
      }
    });
  }

  function selectWorkFlow(formatData) {
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
        ShowLoading();
        materialReturnStore({...formatData, comment: result.value});
      }
    });
  }

  function submitForm() {
    $('#material_return_submit_modal').modal('hide');

    let action = $('#form_submit_material_return').attr("action");
    let method = $('#form_submit_material_return').attr("method");
    let form_data = new FormData($('#form_submit_material_return')[0]);
    form_data.append('material_return_detail', JSON.stringify(dataStore));

    ShowLoading();

    $.ajax({
      url: action,
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: method,
      // success: function(response) {
      success: function(res) {
        HideLoading();

        if (res.status === 200) {
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
            cancelForm("{{ route('MaterialReturn.index', ['var' => 1]) }}");
          });
        } else {
          ErrorNotif("Data Cancel Inputed");
        }

        // if (response.message == "WorkflowError") {
        //   CancelNotif("You don't have access", '/MaterialReturn?var=1');
        // } else if (response.message == "MoreThanOne") {
        //   $('#getWorkFlow').modal('toggle');

        //   let t = $('#tableGetWorkFlow').DataTable();
        //   t.clear();
        //   $.each(response.data, function(key, val) {
        //     t.row.add([
        //       '<td><span data-dismiss="modal" onclick="SelectWorkFlow(\'' + val.Sys_ID + '\', \'' + val.NextApprover_RefID + '\', \'' + response.approverEntity_RefID + '\', \'' + response.documentTypeID + '\');"><img src="{{ asset("AdminLTE-master/dist/img/add.png") }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></span></td>',
        //       '<td style="border:1px solid #e9ecef;">' + val.FullApproverPath + '</td></tr></tbody>'
        //     ]).draw();
        //   });
        // } else {
        //   const formatData = {
        //     workFlowPath_RefID: response.workFlowPath_RefID, 
        //     nextApprover: response.nextApprover_RefID, 
        //     approverEntity: response.approverEntity_RefID, 
        //     documentTypeID: response.documentTypeID,
        //     storeData: response.storeData
        //   };

        //   selectWorkFlow(formatData);
        // }
      },
      error: function(response) {
        console.log('response error', response);
        
        HideLoading();

        CancelNotif("You don't have access", '/MaterialReturn?var=1');
      }
    });
  }

  $('#tableGetModalMaterialReceive').on('click', 'tbody tr', function() {
    let sysId           = $(this).find('input[data-trigger="sys_id_modal_material_receive"]').val();
    let trano           = $(this).find('td:nth-child(2)').text();
    let budgetCode      = $(this).find('td:nth-child(3)').text();
    let budgetName      = $(this).find('td:nth-child(4)').text();
    let subBudgetCode   = $(this).find('td:nth-child(5)').text();
    let subBudgetName   = $(this).find('td:nth-child(6)').text();

    getMaterialReceiveDetail(sysId, trano);

    $('#myGetModalMaterialReceive').modal('hide');
  });

  $('#tableGetTransporter tbody').on('click', 'tr', function () {
    let sysId               = $(this).find('input[data-trigger="sys_id_transporter"]').val();
    let fax                 = $(this).find('input[data-trigger="fax_transporter"]').val();
    let phone               = $(this).find('input[data-trigger="phone_transporter"]').val();
    let email               = $(this).find('input[data-trigger="email_transporter"]').val();
    let phoneOffice         = $(this).find('input[data-trigger="office_phone_transporter"]').val();
    let address             = $(this).find('input[data-trigger="address_transporter"]').val();
    let transporterNames    = $(this).find('td:nth-child(2)').text();

    $("#transporter_id").val(sysId);
    $("#transporter_name").val(transporterNames);
    $("#transporter_phone").val(phone);
    $("#transporter_fax").val(fax);
    $("#transporter_contact").val(email);
    $("#transporter_handphone").val(phoneOffice);
    $("#transporter_address").val(address);

    $("#transporter_name").css("border", "1px solid #ced4da");
    $("#transporterMessage").hide();
  });

  $('#tableGetModalMaterialReturn tbody').on('click', 'tr', function () {
    let sysId = $(this).find('input[data-trigger="sys_id_modal_material_return"]').val();
    let trano = $(this).find('td:nth-child(2)').text();

    $("#material_return_id").val(sysId);
    $("#material_return_number").val(trano);

    $('#myGetModalMaterialReturn').modal('hide');
  });
</script>