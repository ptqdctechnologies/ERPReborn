<script>
  // var currentModalSource = '';
  const initialValue = 0;
  const totalBusinessTrip = [];
  
  var currenctBudgetSelection = 0;
  var date = new Date();
  var today = new Date(date.setMonth(date.getMonth() - 3));

  document.getElementById('dateCommance').setAttribute('min', today.toISOString().split('T')[0]);
  document.getElementById('dateEnd').setAttribute('min', today.toISOString().split('T')[0]);

  // FUNGSI UNTUK BUTTON CANCEL FORM
  function CancelBusinessTrip() {
    ShowLoading();
    window.location.href = '/BusinessTripRequest?var=1';
  }

  // FUNGSI UNTUK MENANGANI CHECKBOX PADA BUDGET DETAILS TABLE
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
          document.getElementById('budgetDetailsData').value = '';
        }

        getSelectedRowData();
      });
    });
  }

  // FUNGSI UNTUK MENGUBAH STRING ANGKA DENGAN FORMAT KE NUMBER
  function parseFormattedNumber(strNumber) {
    return parseFloat(strNumber.replace(/,/g, ''));
  }

  // FUNGSI UNTUK MENDAPATKAN DATA BARIS YANG DICENTANG DAN MENYIMPAN KE INPUT
  function getSelectedRowData() {
    const selectedCheckbox              = document.querySelector('#budgetTable tbody input[type="checkbox"]:checked');
    const budgetDetailsInput            = document.getElementById('budgetDetailsData');
    const totalBusinessTripInput        = document.getElementById('total_business_trip');
    const totalPaymentBusinessTripInput = document.getElementById('total_payment');

    if (selectedCheckbox) {
      const row = selectedCheckbox.closest('tr');
      const datas = {
        productId: row.cells[1].textContent.trim(),
        productName: row.cells[2].textContent.trim(),
        totalBudget: row.cells[3].textContent.trim(),
        qtyBudget: row.cells[4].textContent.trim(),
        qtyAvail: row.cells[5].textContent.trim(),
        price: row.cells[6].textContent.trim(),
        currency: row.cells[7].textContent.trim(),
        balanceBudget: row.cells[8].textContent.trim(),
        sysId: row.querySelector('input[data-budget-id="sys_ID"]').value
      };
      
      // $("#var_combinedBudget_RefID").val(datas.sysId);
      $("#total_business_trip_request").val(datas.totalBudget);
      $("#total_balanced").val(datas.balanceBudget);
      
      budgetDetailsInput.value = JSON.stringify(datas);
      currenctBudgetSelection = parseFormattedNumber(datas.balanceBudget);

      const balanceBudget = parseFormattedNumber(datas.balanceBudget);
      const totalBusinessTrip = parseFormattedNumber(totalBusinessTripInput.value || '0');
      const totalPaymentBusinessTrip = parseFormattedNumber(totalPaymentBusinessTripInput.value || '0');

      if (totalBusinessTrip > balanceBudget) {
        Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
      }

      if (totalPaymentBusinessTrip > balanceBudget) {
        Swal.fire("Error", `Total Payment must not exceed the selected Balanced Budget`, "error");
      }
    } else {
      budgetDetailsInput.value = '';
      currenctBudgetSelection = 0;

      // $("#var_combinedBudget_RefID").val("");
      $("#total_business_trip_request").val("");
      $("#total_balanced").val("");
    }
  }

  function parseCurrency(value) {
    const clean = value.replace(/,/g, '').trim();
    return isNaN(parseFloat(clean)) ? 0 : parseFloat(clean);
  }

  function formatCurrency(value) {
    return value.toLocaleString('en-US', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
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
      Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
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

            const html = `
              <div class="col-3">
                <div class="row">
                  <label for="${inputId}" class="${labelClass}">${type.name}</label>
                  <div class="p-0">
                    <div class="input-group">
                      <input type="hidden" name="components[${type.value}][id]" value="${type.value}">
                      <input name="components[${type.value}][value]" id="${inputId}" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
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
      showCancelButton: false,
      focusConfirm: false,
      confirmButtonText: '<span style="color:black;"> OK </span>',
      confirmButtonColor: '#4B586A',
      confirmButtonColor: '#e9ecef',
      reverseButtons: true
    }).then((result) => {
      ShowLoading();
      BusinessTripRequestStore({...formatData, comment: result.value});
    });
  }

  function BusinessTripRequestStore(formatData) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'POST',
      data: formatData,
      url: '{{ route("BusinessTripRequest.store") }}',
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
            html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + res.documentNumber + '</span>',
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

  $("#myWorker").prop("disabled", true);
  $("#requester_popup").prop("disabled", true);
  $("#mySiteCodeSecondTrigger").prop("disabled", true);
  $("#dateEnd").prop("disabled", true);
  $("#dateEnd").css("background-color", "white");
  $(".loading").hide();

  // DIRECT TO VENDOR
  $("#bank_list_popup_vendor").prop("disabled", true);
  $("#bank_accounts_popup_vendor").prop("disabled", true);

  // BY CORP CARD
  $("#bank_list_popup_corp_card").prop("disabled", true);
  $("#bank_accounts_popup_corp_card").prop("disabled", true);

  // TO OTHER
  $("#beneficiary_second_popup").prop("disabled", true);
  $("#bank_list_popup_second").prop("disabled", true);
  $("#bank_accounts_third_popup").prop("disabled", true);

  // BUDGET CODE
  $('#tableGetProjectSecond').on('click', 'tbody tr', function() {
    var sysId = $(this).find('input[data-trigger="sys_id_project_second"]').val();
    getSiteSecond(sysId);

    $("#var_combinedBudget_RefID").val(sysId);

    $("#site_code_second").val("");
    $("#site_id_second").val("");
    $("#site_name_second").val("");

    $("#mySiteCodeSecondTrigger").prop("disabled", false);
  });

  // SUB BUDGET CODE
  $('#tableGetSiteSecond').on('click', 'tbody tr', function() {
    var sysId = $(this).find('input[data-trigger="sys_id_site_second"]').val();

    $("#budgetDetailsData").val("");
    $("#myWorker").prop("disabled", false);
    $("#requester_popup").prop("disabled", false);
    $("#beneficiary_second_popup").prop("disabled", false);
    $("#bank_name_popup").prop("disabled", false);
    $("#bank_account_popup").prop("disabled", false);
    $("#bank_list_popup_vendor").prop("disabled", false);
    $("#bank_list_popup_corp_card").prop("disabled", false);
    $('table#budgetTable tbody').empty();
    $(".loading").show();

    $('#mySiteCodeSecond').modal('hide');

    const searchBudgetBtn = document.getElementById('budget_detail_search');

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'GET',
      url: '{!! route("getBudget") !!}?site_code=' + sysId,
      success: function(data) {
        $(".loading").hide();
        searchBudgetBtn.style.display = 'block';

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
          var html = 
            '<tr>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                '<input hidden data-budget-id="sys_ID" value="' + val2.sys_ID + '">' +
                '<input type="checkbox" aria-label="Checkbox for following text input">' +
              '</td>' +
              productColumn +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                numberFormatPHPCustom(val2.quantity * val2.priceBaseCurrencyValue, 2) +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                numberFormatPHPCustom(val2.quantity, 2) +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                numberFormatPHPCustom(val2.quantityRemaining, 2) +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                numberFormatPHPCustom(val2.priceBaseCurrencyValue, 2) +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                val2.priceBaseCurrencyISOCode +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                numberFormatPHPCustom(val2.priceBaseCurrencyValue, 2) +
              '</td>' +
            '</tr>';

          $('table#budgetTable tbody').append(html);
        });

        handleCheckboxSelection();
      }
    });
  });

  // SEARCH BUDGET DETAILS
  $('#budget_detail_search').on('input', function() {
    const searchValue = $(this).val().toLowerCase();
    
    const rows = $('#budgetTable tbody tr');

    rows.each(function() {
      const row = $(this);
      const productId = row.find('td:eq(1)').text().trim().toLowerCase();
      const productName = row.find('td:eq(2)').text().trim().toLowerCase();
      
      if (productId.includes(searchValue) || productName.includes(searchValue)) {
        row.show();
      } else {
        row.hide();
      }
    });
  });

  // SEARCH BUDGET DETAILS
  $('#budget_detail_search').on('change', function() {
    if ($(this).val() === '') {
      $('#budgetTable tbody tr').show();
    }
  });

  // DATE COMMANCE
  $('#dateCommance').change(function() {
    $("#dateEnd").prop("disabled", false);
    var dateCommance = new Date($("#dateCommance").val());
    document.getElementById('dateEnd').setAttribute('min', dateCommance.toISOString().split('T')[0]);
  });

  // ========== VENDOR ==========
  // GET BANK ACCOUNT VENDOR KETIKA MODAL BANK NAME VENDOR KE CLOSE
  $('#myGetBankList').on('hidden.bs.modal', function () {
    const bankVendorID = document.getElementById('bank_list_code');
    const bankAccountsID = document.getElementById('bank_accounts_id');

    // CEK APAKAH BANK NAME VENDOR SUDAH TERISI
    if (bankVendorID.value && !bankAccountsID.value) {
      $("#bank_accounts_popup_vendor").prop("disabled", false);
      $("#bank_accounts").removeAttr("readonly");
      $("#bank_accounts_detail").removeAttr("readonly");

      getBankAccountData(bankVendorID.value);
    }
  });

  // KETIKA MODAL BANK NAME VENDOR DIPILIH, MAKA MENGHAPUS VALUE BANK ACCOUNT VENDOR
  $('#tableGetBankList').on('click', 'tbody tr', function() {
    $("#bank_accounts").val("");
    $("#bank_accounts_id").val("");
    $("#bank_accounts_detail").val("");
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

  $('#bank_accounts').on('input', function() {
    var bankAccount                 = document.getElementById('bank_accounts');
    var bankAccountDuplicate        = document.getElementById('bank_accounts_duplicate');
    var bankAccountDuplicateId      = document.getElementById('bank_accounts_duplicate_id');
    var bankAccountDetail           = document.getElementById('bank_accounts_detail');
    var bankAccountDuplicateDetail  = document.getElementById('bank_accounts_duplicate_detail');

    if (bankAccount.value !== bankAccountDuplicate.value || bankAccountDetail.value !== bankAccountDuplicateDetail.value) {
      $("#bank_accounts_id").val("");
    } else {
      $("#bank_accounts_id").val(bankAccountDuplicateId.value);
    }
  });

  $('#bank_accounts_detail').on('input', function() {
    var bankAccountDetail           = document.getElementById('bank_accounts_detail');
    var bankAccountDuplicateDetail  = document.getElementById('bank_accounts_duplicate_detail');
    var bankAccountDuplicateId      = document.getElementById('bank_accounts_duplicate_id');
    var bankAccount                 = document.getElementById('bank_accounts');
    var bankAccountDuplicate        = document.getElementById('bank_accounts_duplicate');

    if (bankAccountDetail.value !== bankAccountDuplicateDetail.value || bankAccount.value !== bankAccountDuplicate.value) {
      $("#bank_accounts_id").val("");
    } else {
      $("#bank_accounts_id").val(bankAccountDuplicateId.value);
    }
  });
  // ========== VENDOR ==========

  // ========== CORP CARD ==========
  // GET BANK ACCOUNT CORP CARD KETIKA MODAL BANK NAME CORP CARD KE CLOSE
  $('#myGetBankListSecond').on('hidden.bs.modal', function () {
    const bankCorpCardID = document.getElementById('bank_list_second_code');
    const bankAccountsCorpCardID = document.getElementById('bank_accounts_id_second');

    // CEK APAKAH BANK NAME CORP CARD SUDAH TERISI
    if (bankCorpCardID.value && !bankAccountsCorpCardID.value) {
      $("#bank_accounts_popup_corp_card").prop("disabled", false);
      $("#bank_accounts_second").removeAttr("readonly");
      $("#bank_accounts_detail_second").removeAttr("readonly");

      getBankAccountData(bankCorpCardID.value, "second_modal");
    }
  });

  // KETIKA MODAL BANK NAME CORP CARD DIPILIH, MAKA MENGHAPUS VALUE BANK ACCOUNT CORP CARD
  $('#tableGetBankListSecond').on('click', 'tbody tr', function() {
    $("#bank_accounts_second").val("");
    $("#bank_accounts_id_second").val("");
    $("#bank_accounts_detail_second").val("");
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

  $('#bank_accounts_second').on('input', function() {
    var bankAccountSecond                 = document.getElementById('bank_accounts_second');
    var bankAccountSecondDuplicate        = document.getElementById('bank_accounts_duplicate_second');
    var bankAccountSecondDuplicateId      = document.getElementById('bank_accounts_duplicate_id_second');
    var bankAccountDetailSecond           = document.getElementById('bank_accounts_detail_second');
    var bankAccountDuplicateDetailSecond  = document.getElementById('bank_accounts_detail_duplicate_second');

    if (bankAccountSecond.value !== bankAccountSecondDuplicate.value || bankAccountDetailSecond.value !== bankAccountDuplicateDetailSecond.value) {
      $("#bank_accounts_id_second").val("");
    } else {
      $("#bank_accounts_id_second").val(bankAccountSecondDuplicateId.value);
    }
  });

  $('#bank_accounts_detail_second').on('input', function() {
    var bankAccountDetailSecond           = document.getElementById('bank_accounts_detail_second');
    var bankAccountDuplicateDetailSecond  = document.getElementById('bank_accounts_detail_duplicate_second');
    var bankAccountDuplicateIdSecond      = document.getElementById('bank_accounts_duplicate_id_second');
    var bankAccountSecond                 = document.getElementById('bank_accounts_second');
    var bankAccountSecondDuplicate        = document.getElementById('bank_accounts_duplicate_second');

    if (bankAccountDetailSecond.value !== bankAccountDuplicateDetailSecond.value || bankAccountSecond.value !== bankAccountSecondDuplicate.value) {
      $("#bank_accounts_id_second").val("");
    } else {
      $("#bank_accounts_id_second").val(bankAccountDuplicateIdSecond.value);
    }
  });
  // ========== CORP CARD ==========

  // ========== TO OTHER ==========
  $('#myBeneficiarySecond').on('hidden.bs.modal', function () {
    const beneficiaryRefID = document.getElementById('beneficiary_second_id');
    const beneficiaryPersonRefID = document.getElementById('beneficiary_second_person_ref_id');

    if (beneficiaryRefID.value && beneficiaryPersonRefID.value) {
      $("#bank_list_popup_second").prop("disabled", false);
      // $("#bank_accounts_third_popup").prop("disabled", false);
    }
  });

  $('#tableGetBeneficiarySecond').on('click', 'tbody tr', function() {
    const bankCorpCardID = document.getElementById('beneficiary_second_person_ref_id');
    
    if (bankCorpCardID.value) {
      // $("#bank_list_third_name").val("");
      // $("#bank_list_third_code").val("");
      // $("#bank_list_third_detail").val("");

      // $("#bank_accounts_third").val("");
      // $("#bank_accounts_third_id").val("");
      // $("#bank_accounts_third_detail").val("");
    }

    adjustInputSize(document.getElementById("beneficiary_second_person_position"), "string");
  });

  $('#myGetBankListThird').on('hidden.bs.modal', function () {
    const bankListThirdCode = document.getElementById('bank_list_third_code');

    if (bankListThirdCode.value) {
      getBankAccountData(bankListThirdCode.value,'third_modal');

      $("#bank_accounts_third").val("");
      $("#bank_accounts_third_id").val("");
      $("#bank_accounts_third_detail").val("");

      $("#bank_accounts_third").removeAttr("readonly");
      $("#bank_accounts_third_detail").removeAttr("readonly");

      $("#bank_accounts_third_popup").prop("disabled", false);
    }
  });

  $('#tableGetBankAccountThird').on('click', 'tbody tr', function() {
    var sysID       = $(this).find('input[type="hidden"]').val();
    var bankAccount = $(this).find('td:nth-child(3)').text();
    var accountName = $(this).find('td:nth-child(4)').text();

    $("#bank_accounts_duplicate_third_id").val(sysID);
    $("#bank_accounts_duplicate_third").val(bankAccount);
    $("#bank_accounts_duplicate_third_detail").val(accountName);
  });

  $('#bank_accounts_third').on('input', function() {
    var bankAccountThird                  = document.getElementById('bank_accounts_third');
    var bankAccountThirdDuplicate         = document.getElementById('bank_accounts_duplicate_third');
    var bankAccountThirdDuplicateId       = document.getElementById('bank_accounts_duplicate_third_id');
    var bankAccountDetailThird            = document.getElementById('bank_accounts_third_detail');
    var bankAccountDuplicateDetailThird   = document.getElementById('bank_accounts_duplicate_third_detail');

    if (bankAccountThird.value !== bankAccountThirdDuplicate.value || bankAccountDetailThird.value !== bankAccountDuplicateDetailThird.value) {
      $("#bank_accounts_third_id").val("");
    } else {
      $("#bank_accounts_third_id").val(bankAccountThirdDuplicateId.value);
    }
  });

  $('#bank_accounts_third_detail').on('input', function() {
    var bankAccountDetailThird           = document.getElementById('bank_accounts_third_detail');
    var bankAccountDuplicateDetailThird  = document.getElementById('bank_accounts_duplicate_third_detail');
    var bankAccountDuplicateIdThird      = document.getElementById('bank_accounts_duplicate_third_id');
    var bankAccountThird                 = document.getElementById('bank_accounts_third');
    var bankAccountThirdDuplicate        = document.getElementById('bank_accounts_duplicate_third');

    if (bankAccountDetailThird.value !== bankAccountDuplicateDetailThird.value || bankAccountThird.value !== bankAccountThirdDuplicate.value) {
      $("#bank_accounts_third_id").val("");
    } else {
      $("#bank_accounts_third_id").val(bankAccountDuplicateIdThird.value);
    }
  });

  // $('#myGetBankSecond').on('hidden.bs.modal', function () {
  //   const bank_RefID = document.getElementById('bank_name_second_id');
  //   const person_RefID = document.getElementById('beneficiary_second_person_ref_id');

  //   if (bank_RefID.value && person_RefID.value) {
  //     getBankAccountData(bank_RefID.value, "third_modal", person_RefID.value);
  //   }
  // });

  // $('#tableGetBankSecond').on('click', 'tbody tr', function() {
  //   $("#bank_accounts_third_popup").prop("disabled", false);
  // });
  // ========== TO OTHER ==========

  // SUBMIT FORM
  $("#FormSubmitBusinessTrip").on("submit", function(e) {
    e.preventDefault();

    const swalWithBootstrapButtons = Swal.mixin({
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: true,
    });

    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "Please confirm to save this data.",
      type: 'question',
      showCancelButton: true,
      confirmButtonText: 'Yes, submit it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        var action = $(this).attr("action");
        var method = $(this).attr("method");
        var form_data = new FormData($(this)[0]); 
        var form = $(this);

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

            console.log('response', response);

            if (response.message == "WorkflowError") {
              $("#submitArf").prop("disabled", false);

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
            // $("#submitArf").prop("disabled", false);
            CancelNotif("You don't have access", '/BusinessTripRequest?var=1');
            console.log('error response', response);
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        HideLoading();
        CancelNotif("Data Cancel Inputed", '/BusinessTripRequest?var=1');
      }
    });
  });

  $(document).on('input', '.number-without-negative', function() {
    allowNumbersWithoutNegative(this);
  });

  $(window).one('load', function(e) {
    getDocumentType("Person Business Trip Form");
    getBusinessTripCostComponentEntityNew();
  });
</script>