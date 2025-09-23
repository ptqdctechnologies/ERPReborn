<script>
  $('#tableGetModalMaterialReceive').on('click', 'tbody tr', function() {
    var sysId           = $(this).find('input[data-trigger="sys_id_modal_material_receive"]').val();
    var trano           = $(this).find('td:nth-child(2)').text();
    var budgetCode      = $(this).find('td:nth-child(3)').text();
    var budgetName      = $(this).find('td:nth-child(4)').text();
    var subBudgetCode   = $(this).find('td:nth-child(5)').text();
    var subBudgetName   = $(this).find('td:nth-child(6)').text();

    $("#material_receive_number").val(trano);
    $("#material_receive_id").val(sysId);

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