<script>
  let currenctBudgetSelection             = 0;
  let date                                = new Date();
  let today                               = new Date(date.setMonth(date.getMonth() - 3));
  const siteCode                          = document.getElementById('site_id_second');
  const dataTripBudgetDetails             = {!! json_encode($dataTripBudgetDetails ?? []) !!};
  const combinedBudgetSectionDetailRefID  = document.getElementById('combinedBudgetSectionDetail_RefID');

  document.getElementById('dateCommance').setAttribute('min', today.toISOString().split('T')[0]);
  document.getElementById('dateEnd').setAttribute('min', today.toISOString().split('T')[0]);

  document.getElementById("direct_to_vendor").addEventListener("input", calculateTotalPayment);
  document.getElementById("by_corp_card").addEventListener("input", calculateTotalPayment);
  document.getElementById("to_other").addEventListener("input", calculateTotalPayment);

  function calculateTotalPayment() {
    const totalBrf        = parseFormattedNumber(document.getElementById("total_business_trip").value);
    const directToVendor  = parseFormattedNumber(document.getElementById("direct_to_vendor").value);
    const corpCard        = parseFormattedNumber(document.getElementById("by_corp_card").value);
    const toOther         = parseFormattedNumber(document.getElementById("to_other").value);

    const total = directToVendor + corpCard + toOther;

    if (totalBrf > 0 && total > totalBrf) {
      // document.getElementById("direct_to_vendor").value = '';
      // document.getElementById("by_corp_card").value = '';
      // document.getElementById("to_other").value = '';
      document.getElementById("total_payment").value = 0.00;
      ErrorNotif("Total Payment is over!");
    } else {
      document.getElementById("total_payment").value = total.toLocaleString('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      });
    }
  }

  function CancelBusinessTrip() {
    ShowLoading();
    window.location.href = '/BusinessTripRequest?var=1';
  }

  function parseFormattedNumber(value) {
    if (!value) return 0;
    return parseFloat(value.replace(/,/g, ''));
  }

  function parseCurrency(value) {
    const clean = value.replace(/,/g, '').trim();
    return isNaN(parseFloat(clean)) ? 0 : parseFloat(clean);
  }

  function getBudgetDetails(site_code, combinedBudgetSectionDetail_RefID) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'GET',
      url: '{!! route("getBudget") !!}?site_code=' + site_code,
      success: function(data) {
        $.each(data, function(key, val2) {
          let productColumn = `
            <td style="text-align: center;">${val2.product_RefID}</td>
            <td style="text-align: center;">${val2.productName}</td>
          `;

          if (!val2.product_RefID) {
            productColumn = `
              <td style="padding: 8px;">
                <div class="input-group">
                  <input id="product_id${key}" style="border-radius:0;width:130px;background-color:white;" name="product_id" class="form-control" readonly />
                  <div class="input-group-append">
                    <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" data-id="10">
                      <a id="product_id2${key}" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(${key})">
                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                      </a>
                    </span>
                  </div>
                </div>
              </td>
              <td id="product_name${key}" style="text-align: center;text-wrap: auto;" name="product_name">${val2.productName}</td>
            `;
          }

          if (val2.sys_ID == combinedBudgetSectionDetail_RefID) {
            $('#budgetDetailsData').val(JSON.stringify(val2));
          }

          var html = 
            '<tr>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                '<input hidden data-budget-id="sys_ID" value="' + val2.sys_ID + '">' +
                ((val2.sys_ID == combinedBudgetSectionDetail_RefID) ? '<input type="checkbox" aria-label="Checkbox for following text input" checked disabled>' : '') +
              '</td>' +
              productColumn +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                numberFormatPHPCustom(val2.quantity * val2.priceBaseCurrencyValue, 2) +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                val2.priceBaseCurrencyISOCode +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                numberFormatPHPCustom(val2.priceBaseCurrencyValue, 2) +
              '</td>' +
            '</tr>';

          $(".loading").hide();
          $('#budgetTable tbody').append(html);
        });
      }
    });
  }

  function calculateTotalBRF() {
    const ids = ['taxi', 'airplane', 'train', 'bus', 'ship', 'tol/road', 'park', 'excess baggage', 'fuel', 'hotel', 'mess', 'guest house', 'accommodation', 'entertainment', 'other'];
    let total = 0;

    ids.forEach(id => {
      const input = document.getElementById(id);
      if (input && input.value) {
        total += parseCurrency(input.value);
      }
    });

    const totalField = document.getElementById('total_business_trip');
    if (currenctBudgetSelection != 0 && currenctBudgetSelection >= total) {
      totalField.value = currencyTotal(total);
    } else if (currenctBudgetSelection != 0 && currenctBudgetSelection < total) {
      totalField.value = currencyTotal("0.00");
      ErrorNotif("Total Business Trip must not exceed the selected Balanced Budget!");
    }
  }

  function initializeBRFCalculation() {
    const ids = ['taxi', 'airplane', 'train', 'bus', 'ship', 'tol/road', 'park', 'excess baggage', 'fuel', 'hotel', 'mess', 'guest house', 'accommodation', 'entertainment', 'other'];

    ids.forEach(id => {
      const input = document.getElementById(id);
      
      if (input) {
        input.addEventListener('input', calculateTotalBRF);
      }
    });
  }

  function getBusinessTripCostComponentEntityNew() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'GET',
      url: '{!! route("getBusinessTripCostComponentEntityNew") !!}',
      success: function(data) {
        const containerMap = [
          { range: [0, 12], containerId: 'travel-fares-container', hidden: false },
          { range: [12, 13], containerId: 'allowance-container', hidden: true },
          { range: [13, 14], containerId: 'entertainment-container', hidden: true },
          { range: [14, 15], containerId: 'other-container', hidden: true }
        ];

        containerMap.forEach(({ range, containerId, hidden }) => {
          data.slice(...range).forEach(type => {
            const inputId = type.name.toLowerCase();
            const labelClass = hidden ? 'p-0 col-5 d-none' : 'p-0 col-5';

            const findData = dataTripBudgetDetails.find(item => item.businessTripCostComponentEntity_RefID == type.value);

            let inputComponent = `
              <input type="hidden" name="components[${type.value}][sys_ID]">
              <input type="hidden" name="components[${type.value}][amountCurrency_RefID]">
              <input type="hidden" name="components[${type.value}][amountCurrencyExchangeRate]">
              <input type="hidden" name="components[${type.value}][remarks]">
              <input name="components[${type.value}][value]" id="${inputId}" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
            `;

            if (findData) {
              let originValue = findData.amountCurrencyValue.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
              });

              currenctBudgetSelection += parseFloat(originValue.replace(/,/g, ''));
              inputComponent = `
                <input type="hidden" name="components[${type.value}][sys_ID]" value="${findData.sys_ID}">
                <input type="hidden" name="components[${type.value}][amountCurrency_RefID]" value="${findData.amountCurrency_RefID}">
                <input type="hidden" name="components[${type.value}][amountCurrencyExchangeRate]" value="${findData.amountCurrencyExchangeRate}">
                <input type="hidden" name="components[${type.value}][remarks]" value="${findData.remarks}">
                <input name="components[${type.value}][value]" id="${inputId}" value="${originValue}" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
              `;
            }

            const html = `
              <div class="col-3">
                <div class="row">
                  <label for="${inputId}" class="${labelClass}">${type.name}</label>
                  <div class="p-0">
                    <div class="input-group">
                      <input type="hidden" name="components[${type.value}][id]" value="${type.value}">
                      ${inputComponent}
                    </div>
                  </div>
                </div>
              </div>
            `;

            document.getElementById(containerId).insertAdjacentHTML('beforeend', html);
          });
        });

        $(".loading-container").hide();

        initializeBRFCalculation();
      },
      error: function (textStatus, errorThrown) {
        console.log('error', textStatus, errorThrown);
      }
    });
  }

  function SelectWorkFlow(formatData) {
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
        BusinessTripRequestRevision({...formatData, comment: result.value});
      }
    });
  }

  function BusinessTripRequestRevision(formatData) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'POST',
      data: formatData,
      url: '{{ route("BusinessTripRequest.UpdatesBusinessTripRequest") }}',
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
            ShowLoading();
            window.location.href = '/BusinessTripRequest?var=1';
          });
        } else {
          ErrorNotif("Data Cancel Inputed");
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log('error', jqXHR, textStatus, errorThrown);
      }
    });
  }

  function SubmitForm() {
    $('#businessTripRevisionFormModal').modal('hide');
    
    var action = $('#FormRevisionBusinessTrip').attr("action");
    var method = $('#FormRevisionBusinessTrip').attr("method");
    var form_data = new FormData($('#FormRevisionBusinessTrip')[0]); 
    var form = $('#FormRevisionBusinessTrip');

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
          $("#revisionBRF").prop("disabled", false);

          CancelNotif("You don't have access", '/BusinessTripRequest?var=1');
        } else if (response.message == "MoreThanOne") {
          $('#getWorkFlow').modal('toggle');

          var t = $('#tableGetWorkFlow').DataTable();
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

          SelectWorkFlow(formatData);
        }
      },
      error: function(response) {
        HideLoading();
        CancelNotif("You don't have access", '/BusinessTripRequest?var=1');
        console.log('error response', response);
      }
    });
  }

  // ========== VENDOR ==========
  // GET BANK ACCOUNT VENDOR KETIKA MODAL BANK NAME VENDOR KE CLOSE
  // $('#myGetBankList').on('hidden.bs.modal', function () {
  //   console.log('sono');
    
  //   const bankVendorID = document.getElementById('bank_list_code');
  //   const bankAccountsID = document.getElementById('bank_accounts_id');

  //   // CEK APAKAH BANK NAME VENDOR SUDAH TERISI
  //   if (bankVendorID.value && !bankAccountsID.value) {
  //     $("#bank_accounts_popup_vendor").prop("disabled", false);
  //     $("#bank_accounts").removeAttr("readonly");
  //     $("#bank_accounts_detail").removeAttr("readonly");

  //     getBankAccountData(bankVendorID.value);
  //   }
  // });

  // KETIKA MODAL BANK NAME VENDOR DIPILIH, MAKA MENGHAPUS VALUE BANK ACCOUNT VENDOR
  $('#tableGetBankList').on('click', 'tbody tr', function() {
    const bankVendorID = document.getElementById('bank_list_code');
    const bankAccountsID = document.getElementById('bank_accounts_id');

    $("#bank_accounts_popup_vendor").prop("disabled", false);
    $("#bank_accounts").val("");
    $("#bank_accounts_id").val("");
    $("#bank_accounts_detail").val("");
    getBankAccountData(bankVendorID.value);

    // CEK APAKAH BANK NAME VENDOR SUDAH TERISI
    // if (bankVendorID.value && !bankAccountsID.value) {
      // $("#bank_accounts").removeAttr("readonly");
      // $("#bank_accounts_detail").removeAttr("readonly");
    // } else {
    // }
  });

  // MENAMBAHKAN READ-ONLY PADA KOMPONEN BANK ACCOUNT VENDOR
  $('#tableGetBankAccount').on('click', 'tbody tr', function() {
    var sysID       = $(this).find('input[type="hidden"]').val();
    var bankAccount = $(this).find('td:nth-child(3)').text();
    var accountName = $(this).find('td:nth-child(4)').text();

    $("#bank_accounts_duplicate_id").val(sysID);
    $("#bank_accounts_duplicate").val(bankAccount);
    $("#bank_accounts_duplicate_detail").val(accountName);
  });

  // $('#bank_accounts').on('input', function() {
  //   var bankAccount                 = document.getElementById('bank_accounts');
  //   var bankAccountDuplicate        = document.getElementById('bank_accounts_duplicate');
  //   var bankAccountDuplicateId      = document.getElementById('bank_accounts_duplicate_id');
  //   var bankAccountDetail           = document.getElementById('bank_accounts_detail');
  //   var bankAccountDuplicateDetail  = document.getElementById('bank_accounts_duplicate_detail');

  //   if (bankAccount.value !== bankAccountDuplicate.value || bankAccountDetail.value !== bankAccountDuplicateDetail.value) {
  //     $("#bank_accounts_id").val("");
  //   } else {
  //     $("#bank_accounts_id").val(bankAccountDuplicateId.value);
  //   }
  // });

  // $('#bank_accounts_detail').on('input', function() {
  //   var bankAccountDetail           = document.getElementById('bank_accounts_detail');
  //   var bankAccountDuplicateDetail  = document.getElementById('bank_accounts_duplicate_detail');
  //   var bankAccountDuplicateId      = document.getElementById('bank_accounts_duplicate_id');
  //   var bankAccount                 = document.getElementById('bank_accounts');
  //   var bankAccountDuplicate        = document.getElementById('bank_accounts_duplicate');

  //   if (bankAccountDetail.value !== bankAccountDuplicateDetail.value || bankAccount.value !== bankAccountDuplicate.value) {
  //     $("#bank_accounts_id").val("");
  //   } else {
  //     $("#bank_accounts_id").val(bankAccountDuplicateId.value);
  //   }
  // });
  // ========== VENDOR ==========

  // ========== CORP CARD ==========
  // GET BANK ACCOUNT CORP CARD KETIKA MODAL BANK NAME CORP CARD KE CLOSE
  // $('#myGetBankListSecond').on('hidden.bs.modal', function () {
  //   const bankCorpCardID = document.getElementById('bank_list_second_code');
  //   const bankAccountsCorpCardID = document.getElementById('bank_accounts_id_second');

  //   // CEK APAKAH BANK NAME CORP CARD SUDAH TERISI
  //   if (bankCorpCardID.value && !bankAccountsCorpCardID.value) {
  //     $("#bank_accounts_popup_corp_card").prop("disabled", false);
  //     $("#bank_accounts_second").removeAttr("readonly");
  //     $("#bank_accounts_detail_second").removeAttr("readonly");

  //     getBankAccountData(bankCorpCardID.value, "second_modal");
  //   }
  // });

  // KETIKA MODAL BANK NAME CORP CARD DIPILIH, MAKA MENGHAPUS VALUE BANK ACCOUNT CORP CARD
  $('#tableGetBankListSecond').on('click', 'tbody tr', function() {
    const bankCorpCardID = document.getElementById('bank_list_second_code');
    const bankAccountsCorpCardID = document.getElementById('bank_accounts_id_second');

    $("#bank_accounts_popup_corp_card").prop("disabled", false);
    $("#bank_accounts_second").val("");
    $("#bank_accounts_id_second").val("");
    $("#bank_accounts_detail_second").val("");

    getBankAccountData(bankCorpCardID.value, "second_modal");
  });

  // MENAMBAHKAN READ-ONLY PADA KOMPONEN BANK ACCOUNT CORP CARD
  $('#tableGetBankAccountSecond').on('click', 'tbody tr', function() {
    var sysID       = $(this).find('input[type="hidden"]').val();
    var bankAccount = $(this).find('td:nth-child(3)').text();
    var accountName = $(this).find('td:nth-child(4)').text();

    $("#bank_accounts_duplicate_id_second").val(sysID);
    $("#bank_accounts_duplicate_second").val(bankAccount);
    $("#bank_accounts_detail_duplicate_second").val(accountName);
  });

  // $('#bank_accounts_second').on('input', function() {
  //   var bankAccountSecond                 = document.getElementById('bank_accounts_second');
  //   var bankAccountSecondDuplicate        = document.getElementById('bank_accounts_duplicate_second');
  //   var bankAccountSecondDuplicateId      = document.getElementById('bank_accounts_duplicate_id_second');
  //   var bankAccountDetailSecond           = document.getElementById('bank_accounts_detail_second');
  //   var bankAccountDuplicateDetailSecond  = document.getElementById('bank_accounts_detail_duplicate_second');

  //   if (bankAccountSecond.value !== bankAccountSecondDuplicate.value || bankAccountDetailSecond.value !== bankAccountDuplicateDetailSecond.value) {
  //     $("#bank_accounts_id_second").val("");
  //   } else {
  //     $("#bank_accounts_id_second").val(bankAccountSecondDuplicateId.value);
  //   }
  // });

  // $('#bank_accounts_detail_second').on('input', function() {
  //   var bankAccountDetailSecond           = document.getElementById('bank_accounts_detail_second');
  //   var bankAccountDuplicateDetailSecond  = document.getElementById('bank_accounts_detail_duplicate_second');
  //   var bankAccountDuplicateIdSecond      = document.getElementById('bank_accounts_duplicate_id_second');
  //   var bankAccountSecond                 = document.getElementById('bank_accounts_second');
  //   var bankAccountSecondDuplicate        = document.getElementById('bank_accounts_duplicate_second');

  //   if (bankAccountDetailSecond.value !== bankAccountDuplicateDetailSecond.value || bankAccountSecond.value !== bankAccountSecondDuplicate.value) {
  //     $("#bank_accounts_id_second").val("");
  //   } else {
  //     $("#bank_accounts_id_second").val(bankAccountDuplicateIdSecond.value);
  //   }
  // });
  // ========== CORP CARD ==========

  // ========== TO OTHER ==========
  // $('#myBeneficiarySecond').on('hidden.bs.modal', function () {
  //   const beneficiaryRefID = document.getElementById('beneficiary_second_id');
  //   const beneficiaryPersonRefID = document.getElementById('beneficiary_second_person_ref_id');

  //   if (beneficiaryRefID.value && beneficiaryPersonRefID.value) {
  //     $("#bank_list_popup_second").prop("disabled", false);
  //     // $("#bank_accounts_third_popup").prop("disabled", false);
  //   }
  // });

  $('#tableGetBeneficiarySecond').on('click', 'tbody tr', function() {
    $("#bank_list_popup_second").prop("disabled", false);

    // const bankCorpCardID = document.getElementById('beneficiary_second_person_ref_id');
    
    // if (bankCorpCardID.value) {
    //   // $("#bank_list_third_name").val("");
    //   // $("#bank_list_third_code").val("");
    //   // $("#bank_list_third_detail").val("");

    //   // $("#bank_accounts_third").val("");
    //   // $("#bank_accounts_third_id").val("");
    //   // $("#bank_accounts_third_detail").val("");
    // }

    // adjustInputSize(document.getElementById("beneficiary_second_person_position"), "string");
  });

  // $('#myGetBankListThird').on('hidden.bs.modal', function () {
  //   const bankListThirdCode = document.getElementById('bank_list_third_code');

  //   if (bankListThirdCode.value) {
  //     getBankAccountData(bankListThirdCode.value,'third_modal');

  //     $("#bank_accounts_third").val("");
  //     $("#bank_accounts_third_id").val("");
  //     $("#bank_accounts_third_detail").val("");

  //     $("#bank_accounts_third").removeAttr("readonly");
  //     $("#bank_accounts_third_detail").removeAttr("readonly");

  //     $("#bank_accounts_third_popup").prop("disabled", false);
  //   }
  // });

  $('#tableGetBankAccountThird').on('click', 'tbody tr', function() {
    var sysID       = $(this).find('input[type="hidden"]').val();
    var bankAccount = $(this).find('td:nth-child(3)').text();
    var accountName = $(this).find('td:nth-child(4)').text();
    var bankListThirdCode = document.getElementById('bank_list_third_code');

    $("#bank_accounts_duplicate_third_id").val(sysID);
    $("#bank_accounts_duplicate_third").val(bankAccount);
    $("#bank_accounts_duplicate_third_detail").val(accountName);
  });

  // $('#bank_accounts_third').on('input', function() {
  //   var bankAccountThird                  = document.getElementById('bank_accounts_third');
  //   var bankAccountThirdDuplicate         = document.getElementById('bank_accounts_duplicate_third');
  //   var bankAccountThirdDuplicateId       = document.getElementById('bank_accounts_duplicate_third_id');
  //   var bankAccountDetailThird            = document.getElementById('bank_accounts_third_detail');
  //   var bankAccountDuplicateDetailThird   = document.getElementById('bank_accounts_duplicate_third_detail');

  //   if (bankAccountThird.value !== bankAccountThirdDuplicate.value || bankAccountDetailThird.value !== bankAccountDuplicateDetailThird.value) {
  //     $("#bank_accounts_third_id").val("");
  //   } else {
  //     $("#bank_accounts_third_id").val(bankAccountThirdDuplicateId.value);
  //   }
  // });

  // $('#bank_accounts_third_detail').on('input', function() {
  //   var bankAccountDetailThird           = document.getElementById('bank_accounts_third_detail');
  //   var bankAccountDuplicateDetailThird  = document.getElementById('bank_accounts_duplicate_third_detail');
  //   var bankAccountDuplicateIdThird      = document.getElementById('bank_accounts_duplicate_third_id');
  //   var bankAccountThird                 = document.getElementById('bank_accounts_third');
  //   var bankAccountThirdDuplicate        = document.getElementById('bank_accounts_duplicate_third');

  //   if (bankAccountDetailThird.value !== bankAccountDuplicateDetailThird.value || bankAccountThird.value !== bankAccountThirdDuplicate.value) {
  //     $("#bank_accounts_third_id").val("");
  //   } else {
  //     $("#bank_accounts_third_id").val(bankAccountDuplicateIdThird.value);
  //   }
  // });

  // $('#myGetBankSecond').on('hidden.bs.modal', function () {
  //   const bank_RefID = document.getElementById('bank_name_second_id');
  //   const person_RefID = document.getElementById('beneficiary_second_person_ref_id');

  //   if (bank_RefID.value && person_RefID.value) {
  //     getBankAccountData(bank_RefID.value, "third_modal", person_RefID.value);
  //   }
  // });

  $('#tableGetBankListThird').on('click', 'tbody tr', function() {
    const bankListThirdCode = document.getElementById('bank_list_third_code');
    
    $("#bank_accounts_third_popup").prop("disabled", false);
    $("#bank_accounts_third").val("");
    $("#bank_accounts_third_id").val("");
    $("#bank_accounts_third_detail").val("");
    getBankAccountData(bankListThirdCode.value,'third_modal');
  });
  // ========== TO OTHER ==========

  $('#budget-details-add').on('click', function() {
    let total = {
      travelFares: 0,
      allowance: 0,
      entertainment: 0,
      other: 0,
      brf: 0
    };

    document.querySelectorAll("#travel-fares-container input.form-control.number-without-negative").forEach(input => {
      if (input.type !== "hidden" && input.offsetParent !== null) {
        let value = parseFloat(input.value.replace(/,/g, "")) || 0;
        total.travelFares += value;
        total.brf += value;
      }
    });

    document.querySelectorAll("#allowance-container input.form-control.number-without-negative").forEach(input => {
      if (input.type !== "hidden" && input.offsetParent !== null) {
        let value = parseFloat(input.value.replace(/,/g, "")) || 0;
        total.allowance += value;
        total.brf += value;
      }
    });

    document.querySelectorAll("#entertainment-container input.form-control.number-without-negative").forEach(input => {
      if (input.type !== "hidden" && input.offsetParent !== null) {
        let value = parseFloat(input.value.replace(/,/g, "")) || 0;
        total.entertainment += value;
        total.brf += value;
      }
    });

    document.querySelectorAll("#other-container input.form-control.number-without-negative").forEach(input => {
      if (input.type !== "hidden" && input.offsetParent !== null) {
        let value = parseFloat(input.value.replace(/,/g, "")) || 0;
        total.other += value;
        total.brf += value;
      }
    });

    document.getElementById("travelSummary").textContent = total.travelFares.toLocaleString('en-US', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });

    document.getElementById("allowanceSummary").textContent = total.allowance.toLocaleString('en-US', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });

    document.getElementById("entertainmentSummary").textContent = total.entertainment.toLocaleString('en-US', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });

    document.getElementById("otherSummary").textContent = total.other.toLocaleString('en-US', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });

    document.getElementById("totalSummary").textContent = total.brf.toLocaleString('en-US', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });
  });

  $(document).on('input', '.number-without-negative', function() {
    allowNumbersWithoutNegative(this);
  });

  $(window).one('load', function(e) {
    getBudgetDetails(siteCode.value, combinedBudgetSectionDetailRefID.value);
    getDocumentType("Person Business Trip Revision Form");
    getBusinessTripCostComponentEntityNew();
  });
</script>