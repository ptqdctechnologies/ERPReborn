<script>
  function calculateTotal() {
    let total = 0;
    
    document.querySelectorAll('input[id^="qty_return"]').forEach(function(input) {
      let value = parseFloat(input.value.replace(/,/g, ''));
      if (!isNaN(value)) {
        total += value;
      }
    });

    document.getElementById('material_receive_details_total').textContent = decimalFormat(total);
  }

  function getMaterialReceiveDetail(materialReceive_RefID) {
    $("#material_receive_details_table tbody").empty();
    $(".material_receive_details_loading").show();

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

          console.log('result', result);

          $("#var_combinedBudget_RefID").val(result[0].combinedBudget_RefID);

          $.each(result, function(key, val) {
            let row = `
              <tr>
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

            $('#material_receive_details_table tbody').append(row);

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
          $(".material_receive_details_error_message_container").show();
          $("#material_receive_details_error_message").text(`Data not found.`);

          $("#material_receive_details_table_length").hide();
          $("#material_receive_details_table_filter").hide();
          $("#material_receive_details_table_info").hide();
          $("#material_receive_details_table_paginate").hide();
        }

        $(".material_receive_details_loading").hide();
      },
      error: function (textStatus, errorThrown) {
        console.log('getMaterialReceiveDetail', textStatus.status, errorThrown);
        
        $('#material_receive_details_table tbody').empty();
        $(".material_receive_details_loading").hide();
        $(".material_receive_details_error_message_container").show();
        $("#material_receive_details_error_message").text(`Failed to fetch material receive detail`);
      }
    });
  }

  $('#tableGetModalMaterialReceive').on('click', 'tbody tr', function() {
    var sysId           = $(this).find('input[data-trigger="sys_id_modal_material_receive"]').val();
    var trano           = $(this).find('td:nth-child(2)').text();
    var budgetCode      = $(this).find('td:nth-child(3)').text();
    var budgetName      = $(this).find('td:nth-child(4)').text();
    var subBudgetCode   = $(this).find('td:nth-child(5)').text();
    var subBudgetName   = $(this).find('td:nth-child(6)').text();

    $("#material_receive_number").val(trano);
    $("#material_receive_id").val(sysId);
    getMaterialReceiveDetail(sysId);

    $('#myGetModalMaterialReceive').modal('hide');
  });

  $('#tableGetTransporter tbody').on('click', 'tr', function () {
    var sysId               = $(this).find('input[data-trigger="sys_id_transporter"]').val();
    var fax                 = $(this).find('input[data-trigger="fax_transporter"]').val();
    var phone               = $(this).find('input[data-trigger="phone_transporter"]').val();
    var email               = $(this).find('input[data-trigger="email_transporter"]').val();
    var phoneOffice         = $(this).find('input[data-trigger="office_phone_transporter"]').val();
    var address             = $(this).find('input[data-trigger="address_transporter"]').val();
    var transporterNames    = $(this).find('td:nth-child(2)').text();

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
</script>