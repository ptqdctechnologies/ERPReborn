<script>
  const initialValue          = 0;
  const totalBusinessTrip     = [];
  const searchBudgetBtn       = document.getElementById('budget_detail_search');
  const bankNameVendorID      = document.getElementById('bank_list_code');
  const bankNameCorpCardID    = document.getElementById('bank_list_second_code');

  let labelPayment            = '';
  let documentTypeID          = document.getElementById("DocumentTypeID");
  let currenctBudgetSelection = 0;
  let date                    = new Date();
  let today                   = new Date(date.setMonth(date.getMonth() - 3));

  const validation = {
    sectionOne: {
      budgetID: getElement("project_id_second"),
      subBudgetID: getElement("site_id_second")
    },
    sectionTwo: {
      requesterID: getElement("requester_id"),
      dateCommance: getElement("dateCommance"),
      dateEnd: getElement("dateEnd"),
      departingFrom: getElement("departingFrom"),
      destinationTo: getElement("destinationTo"),
      reasonTravel: getElement("reasonTravel"),
    },
    sectionThree: {
      budgetDetailsData: getElement("budgetDetailsData")
    },
    sectionFour: {
      totalBusinessTrips: getElement("total_business_trip"),
      totalPayment: getElement("total_payment"),
      directToVendor: getElement("direct_to_vendor"),
      bankListCode: getElement("bank_list_code"),
      bankAccountsID: getElement("bank_accountss_id"),
      byCorpCard: getElement("by_corp_card"),
      bankListSecondCode: getElement("bank_list_second_code"),
      bankAccountsIDSecond: getElement("bank_accounts_id_second"),
      toOther: getElement("to_other"),
      beneficiarySecondID: getElement("beneficiary_second_id"),
      bankListThirdCode: getElement("bank_name_second_id"),
      bankAccountsThirdID: getElement("bank_accounts_id")
    }
  };

  function changeLabelPayment(val) {
    labelPayment = val;

    if (val == 'bank_account_vendor') {
      getBanksAccount(bankNameVendorID.value);
    } else if (val == 'bank_account_corp_card') {
      getBanksAccount(bankNameCorpCardID.value);
    }
  }

  function getElement(id) {
    return document.getElementById(id);
  }

  function isNotEmpty(value) {
    return value && value.trim() !== '';
  }

  function calculateTotalPayment() {
    const totalBrf            = parseFormattedNumber(document.getElementById("total_business_trip").value);
    const directToVendorInput = document.getElementById("direct_to_vendor");
    const corpCardInput       = document.getElementById("by_corp_card");
    const toOtherInput        = document.getElementById("to_other");

    let directToVendor = parseFormattedNumber(directToVendorInput.value);
    let corpCard       = parseFormattedNumber(corpCardInput.value);
    let toOther        = parseFormattedNumber(toOtherInput.value);

    let total = directToVendor + corpCard + toOther;

    if (totalBrf > 0 && total > totalBrf) {
      const activeInput = document.activeElement;

      if (activeInput && activeInput.tagName === "INPUT") {
        activeInput.value = "0.00";

        if (activeInput === directToVendorInput) {
          total -= directToVendor;
          directToVendor = 0;
        } else if (activeInput === corpCardInput) {
          total -= corpCard;
          corpCard = 0;
        } else if (activeInput === toOtherInput) {
          total -= toOther;
          toOther = 0;
        }
      }

      document.getElementById("total_payment").value = total.toLocaleString('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      });

      // // Highlight error
      // $("#total_payment").css("border", "1px solid red");
      // $("#totalPaymentMessage").show();

      Swal.fire("Error", `Total Payment is over`, "error");
    } else {
      document.getElementById("total_payment").value = total.toLocaleString('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      });

      $("#total_payment").css("border", "1px solid #ced4da");
      $("#totalPaymentMessage").hide();
    }
  }

  function handleCheckboxSelection() {
    const checkboxes = document.querySelectorAll('#budgetTable tbody input[type="checkbox"]');
    
    checkboxes.forEach((checkbox, index) => {
      checkbox.addEventListener('change', function() {
        if (this.checked) {
          $("#budgetDetailsMessage").hide();

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

  function parseFormattedNumber(value) {
    if (!value) return 0;
    return parseFloat(value.replace(/,/g, ''));
  }

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
        // qtyBudget: row.cells[4].textContent.trim(),
        // qtyAvail: row.cells[5].textContent.trim(),
        // price: row.cells[6].textContent.trim(),
        currency: row.cells[4].textContent.trim(),
        balanceBudget: row.cells[5].textContent.trim(),
        sysId: row.querySelector('input[data-budget-id="sys_ID"]').value
      };
      
      // $("#var_combinedBudget_RefID").val(datas.sysId);
      $("#total_business_trip_request").val(datas.totalBudget);
      $("#total_balanced").val(datas.balanceBudget);
      $("#combinedBudgetSectionDetail_RefID").val(datas.sysId);
      
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
      $("#combinedBudgetSectionDetail_RefID").val("");
    }
  }

  function sumTravelFares() {
    let total = 0;
    const container = document.getElementById('travel-fares-container');

    const inputs = container.querySelectorAll('input:not([type="hidden"])');

    inputs.forEach(input => {
      const value = parseCurrency(input.value);

      if (!isNaN(value)) {
        total += value;
      }
    });

    return total;
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
        const amount = parseCurrency(input.value);

        const simulatedTotal = total + amount;

        if (currenctBudgetSelection < simulatedTotal && document.activeElement === input) {
          input.value = "0";
          Swal.fire("Error", `Value can't be greater than Business Trip Request`, "error");
        } else if (input.value !== "0.00") {
          total += amount;
        }
      }
    });

    const totalField = document.getElementById('total_business_trip');

    if (currenctBudgetSelection != 0 && total != 0 && currenctBudgetSelection >= total) {
      totalField.value = currencyTotal(total);
      $("#total_business_trip").css("border", "1px solid #ced4da");
      $("#totalBRFMessage").hide();
    } else if (currenctBudgetSelection != 0 && total != 0 && currenctBudgetSelection < total) {
      totalField.value = currencyTotal(total);
      Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
    } else if (currenctBudgetSelection != 0 && total == 0 && currenctBudgetSelection > total) {
      totalField.value = currencyTotal("0.00");
      $("#total_business_trip").css("border", "1px solid red");
      $("#totalBRFMessage").show();
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
        BusinessTripRequestStore({...formatData, comment: result.value});
      }
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

  function isSectionValid() {
    let result = true;

    if (!isNotEmpty(validation.sectionFour.totalPayment.value) || validation.sectionFour.totalPayment.value == "0.00") {
      if (
        !isNotEmpty(validation.sectionFour.directToVendor.value) && 
        !isNotEmpty(validation.sectionFour.byCorpCard.value) && 
        !isNotEmpty(validation.sectionFour.toOther.value)) {
        result = false;
      }
    }

    if (isNotEmpty(validation.sectionFour.directToVendor.value)) {
      if (!isNotEmpty(validation.sectionFour.bankListCode.value)) {
        result = false;
      }
      if (!isNotEmpty(validation.sectionFour.bankAccountsID.value)) {
        result = false;
      }
    }

    if (
      (
        isNotEmpty(validation.sectionFour.bankListCode.value) || 
        isNotEmpty(validation.sectionFour.bankAccountsID.value)
      ) && !isNotEmpty(validation.sectionFour.directToVendor.value)) {
      result = false;
    }

    if (isNotEmpty(validation.sectionFour.byCorpCard.value)) {
      if (!isNotEmpty(validation.sectionFour.bankListSecondCode.value)) {
        result = false;
      }
      if (!isNotEmpty(validation.sectionFour.bankAccountsIDSecond.value)) {
        result = false;
      }
    }

    if (
      (
        isNotEmpty(validation.sectionFour.bankListSecondCode.value) || 
        isNotEmpty(validation.sectionFour.bankAccountsIDSecond.value)
      ) && !isNotEmpty(validation.sectionFour.byCorpCard.value)) {
      result = false;
    }

    if (isNotEmpty(validation.sectionFour.toOther.value)) {
      if (!isNotEmpty(validation.sectionFour.beneficiarySecondID.value)) {
        result = false;
      }
      if (!isNotEmpty(validation.sectionFour.bankListThirdCode.value)) {
        result = false;
      }
      if (!isNotEmpty(validation.sectionFour.bankAccountsThirdID.value)) {
        result = false;
      }
    }

    if (
      (
        isNotEmpty(validation.sectionFour.beneficiarySecondID.value) || 
        isNotEmpty(validation.sectionFour.bankListThirdCode.value) || 
        isNotEmpty(validation.sectionFour.bankAccountsThirdID.value)
      ) && !isNotEmpty(validation.sectionFour.toOther.value)) {
      result = false;
    }

    return isNotEmpty(validation.sectionOne.budgetID.value) && 
      isNotEmpty(validation.sectionOne.subBudgetID.value) &&
      isNotEmpty(validation.sectionTwo.requesterID.value) &&
      isNotEmpty(validation.sectionTwo.dateCommance.value) &&
      isNotEmpty(validation.sectionTwo.dateEnd.value) &&
      isNotEmpty(validation.sectionTwo.departingFrom.value) &&
      isNotEmpty(validation.sectionTwo.destinationTo.value) &&
      isNotEmpty(validation.sectionTwo.reasonTravel.value) &&
      isNotEmpty(validation.sectionThree.budgetDetailsData.value) &&
      isNotEmpty(validation.sectionFour.totalBusinessTrips.value) &&
      result
  }

  function isSectionNotValid() {
    return !isNotEmpty(validation.sectionOne.budgetID.value) && 
      !isNotEmpty(validation.sectionOne.subBudgetID.value) &&
      !isNotEmpty(validation.sectionTwo.requesterID.value) &&
      !isNotEmpty(validation.sectionTwo.dateCommance.value) &&
      !isNotEmpty(validation.sectionTwo.dateEnd.value) &&
      !isNotEmpty(validation.sectionTwo.departingFrom.value) &&
      !isNotEmpty(validation.sectionTwo.destinationTo.value) &&
      !isNotEmpty(validation.sectionTwo.reasonTravel.value) &&
      !isNotEmpty(validation.sectionThree.budgetDetailsData.value) &&
      !isNotEmpty(validation.sectionFour.totalBusinessTrips.value) &&
      !isNotEmpty(validation.sectionFour.totalPayment.value)
  }

  function validationForm() {
    const testing       = sumTravelFares();
    const accommodation = document.getElementById("accommodation");
    const entertainment = document.getElementById("entertainment");
    const other         = document.getElementById("other");
    const totalBRF      = document.getElementById("total_business_trip");

    if (isSectionValid()) {
      $("#travel_fares_modal_summary").text(decimalFormat(testing));
      $("#allowance_modal_summary").text(accommodation.value || 0.00);
      $("#entertainment_modal_summary").text(entertainment.value || 0.00);
      $("#other_modal_summary").text(other.value || 0.00);
      $("#total_brf_modal_summary").text(totalBRF.value || 0.00);

      $('#businessTripRequestFormModal').modal('show');
    } else {
      if (isSectionNotValid()) {
        $("#project_code_second").css("border", "1px solid red");
        $("#project_name_second").css("border", "1px solid red");
        $("#budgetMessage").show();

        $("#site_code_second").css("border", "1px solid red");
        $("#site_name_second").css("border", "1px solid red");
        $("#subBudgetMessage").show();

        $("#requester_detail").css("border", "1px solid red");
        $("#requester").css("border", "1px solid red");
        $("#requesterMessage").show();

        $("#dateCommance").css("border", "1px solid red");
        $("#dateCommenceTravelMessage").show();

        $("#dateEnd").css("border", "1px solid red");
        $("#dateEndTravelMessage").show();

        $("#departingFrom").css("border", "1px solid red");
        $("#departingFromMessage").show();

        $("#destinationTo").css("border", "1px solid red");
        $("#destinationToMessage").show();

        $("#reasonTravel").css("border", "1px solid red");
        $("#reasonToTravelMessage").show();

        $("#total_business_trip").css("border", "1px solid red");
        $("#totalBRFMessage").show();

        $("#total_payment").css("border", "1px solid red");
        $("#totalPaymentMessage").show();

        return;
      }
      if (!isNotEmpty(validation.sectionOne.budgetID.value)) {
        $("#project_code_second").css("border", "1px solid red");
        $("#project_name_second").css("border", "1px solid red");
        $("#budgetMessage").show();

        return;
      }
      if (!isNotEmpty(validation.sectionOne.subBudgetID.value)) {
        $("#site_code_second").css("border", "1px solid red");
        $("#site_name_second").css("border", "1px solid red");
        $("#subBudgetMessage").show();

        return;
      }
      if (!isNotEmpty(validation.sectionTwo.requesterID.value)) {
        $("#requester_detail").css("border", "1px solid red");
        $("#requester").css("border", "1px solid red");
        $("#requesterMessage").show();

        return;
      }
      if (!isNotEmpty(validation.sectionTwo.dateCommance.value)) {
        $("#dateCommance").css("border", "1px solid red");
        $("#dateCommenceTravelMessage").show();

        return;
      }
      if (!isNotEmpty(validation.sectionTwo.dateEnd.value)) {
        $("#dateEnd").css("border", "1px solid red");
        $("#dateEndTravelMessage").show();

        return;
      }
      if (!isNotEmpty(validation.sectionTwo.departingFrom.value)) {
        $("#departingFrom").css("border", "1px solid red");
        $("#departingFromMessage").show();

        return;
      }
      if (!isNotEmpty(validation.sectionTwo.destinationTo.value)) {
        $("#destinationTo").css("border", "1px solid red");
        $("#destinationToMessage").show();

        return;
      }
      if (!isNotEmpty(validation.sectionTwo.reasonTravel.value)) {
        $("#reasonTravel").css("border", "1px solid red");
        $("#reasonToTravelMessage").show();

        return;
      }
      if (!isNotEmpty(validation.sectionThree.budgetDetailsData.value)) {
        $("#budgetDetailsMessage").show();

        return;
      }
      if (!isNotEmpty(validation.sectionFour.totalBusinessTrips.value) || validation.sectionFour.totalBusinessTrips.value == "0.00") {
        $("#total_business_trip").css("border", "1px solid red");
        $("#totalBRFMessage").show();

        return;
      }
      if (!isNotEmpty(validation.sectionFour.totalPayment.value) || validation.sectionFour.totalPayment.value == "0.00") {
        $("#total_payment").css("border", "1px solid red");
        $("#totalPaymentMessage").show();

        return;
      } else {
        if (isNotEmpty(validation.sectionFour.directToVendor.value)) {
          if (!isNotEmpty(validation.sectionFour.bankListCode.value)) {
            $("#bank_list_name").css("border", "1px solid red");
            $("#bank_list_detail").css("border", "1px solid red");
            $("#bankNameVendorMessage").show();

            return;
          } 

          if (!isNotEmpty(validation.sectionFour.bankAccountsID.value)) {
            $("#bank_accountss").css("border", "1px solid red");
            $("#bank_accountss_detail").css("border", "1px solid red");
            $("#bankAccountVendorMessage").show();

            return;
          }
        }

        if (
          (
            isNotEmpty(validation.sectionFour.bankListCode.value) || 
            isNotEmpty(validation.sectionFour.bankAccountsID.value)
          ) && !isNotEmpty(validation.sectionFour.directToVendor.value)) {
          $("#direct_to_vendor").css("border", "1px solid red");
          $("#directToVendorMessage").show();

          return;
        }
        
        if (isNotEmpty(validation.sectionFour.byCorpCard.value)) {
          if (!isNotEmpty(validation.sectionFour.bankListSecondCode.value)) {
            $("#bank_list_second_name").css("border", "1px solid red");
            $("#bank_list_second_detail").css("border", "1px solid red");
            $("#bankNameCorpCardMessage").show();

            return;
          }

          if (!isNotEmpty(validation.sectionFour.bankAccountsIDSecond.value)) {
            $("#bank_accounts_second").css("border", "1px solid red");
            $("#bank_accounts_detail_second").css("border", "1px solid red");
            $("#bankAccountCorpCardMessage").show();

            return;
          }
        }

        if (
          (
            isNotEmpty(validation.sectionFour.bankListSecondCode.value) || 
            isNotEmpty(validation.sectionFour.bankAccountsIDSecond.value)
          ) && !isNotEmpty(validation.sectionFour.byCorpCard.value)) {
          $("#by_corp_card").css("border", "1px solid red");
          $("#byCorpCardMessage").show();

          return;
        }

        if (isNotEmpty(validation.sectionFour.toOther.value)) {
          if (!isNotEmpty(validation.sectionFour.beneficiarySecondID.value)) {
            $("#beneficiary_second_person_position").css("border", "1px solid red");
            $("#beneficiary_second_person_name").css("border", "1px solid red");
            $("#beneficiaryToOtherMessage").show();

            return;
          }

          if (!isNotEmpty(validation.sectionFour.bankListThirdCode.value)) {
            $("#bank_name_second_name").css("border", "1px solid red");
            $("#bank_name_second_detail").css("border", "1px solid red");
            $("#bankNameToOtherMessage").show();

            return;
          }

          if (!isNotEmpty(validation.sectionFour.bankAccountsThirdID.value)) {
            $("#bank_accounts").css("border", "1px solid red");
            $("#bank_accounts_detail").css("border", "1px solid red");
            $("#bankAccountToOtherMessage").show();

            return;
          }
        }

        if (
          (
            isNotEmpty(validation.sectionFour.beneficiarySecondID.value) || 
            isNotEmpty(validation.sectionFour.bankListThirdCode.value) || 
            isNotEmpty(validation.sectionFour.bankAccountsThirdID.value)
          ) && !isNotEmpty(validation.sectionFour.toOther.value)) {
          $("#to_other").css("border", "1px solid red");
          $("#toOtherMessage").show();

          return;
        }
      }
    }
  }

  function getBudgetDetails(site_id) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'GET',
      url: '{!! route("getBudget") !!}?site_code=' + site_id,
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
                val2.priceBaseCurrencyISOCode +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                numberFormatPHPCustom(val2.priceBaseCurrencyValue, 2) +
              '</td>' +
            '</tr>';

          $('table#budgetTable tbody').append(html);
        });

        handleCheckboxSelection();
      },
    });
  }

  function SubmitForm() {
    $('#businessTripRequestFormModal').modal('hide');
    const action = $('#FormSubmitBusinessTrip').attr("action");
    const method = $('#FormSubmitBusinessTrip').attr("method");
    const form_data = new FormData($('#FormSubmitBusinessTrip')[0]);

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
        CancelNotif("You don't have access", '/BusinessTripRequest?var=1');
        console.log('error response', response);
      }
    });
  }

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

  $('#budget_detail_search').on('change', function() {
    if ($(this).val() === '') {
      $('#budgetTable tbody tr').show();
    }
  });

  $('#tableProjects').on('click', 'tbody tr', async function() {
    let sysId       = $(this).find('input[data-trigger="sys_id_project"]').val();
    let projectCode = $(this).find('td:nth-child(2)').text();
    let projectName = $(this).find('td:nth-child(3)').text();

    $("#project_id_second").val("");
    $("#project_code_second").val("");
    $("#project_name_second").val("");

    $("#loadingBudget").show();
    $("#myProjectSecondTrigger").hide();

    $('#myProjects').modal('hide');

    try {
      let checkWorkFlow = await checkingWorkflow(sysId, documentTypeID.value);

      if (checkWorkFlow) {
        $("#var_combinedBudget_RefID").val(sysId);
        $("#project_id_second").val(sysId);
        $("#project_code_second").val(projectCode);
        $("#project_name_second").val(`${projectCode} - ${projectName}`);
        $("#myProjectSecondTrigger").prop("disabled", true);
        $("#myProjectSecondTrigger").css("cursor", "not-allowed");

        getSites(sysId);
        $("#mySiteCodeSecondTrigger").prop("disabled", false);

        $("#project_code_second").css("border", "1px solid #ced4da");
        $("#project_name_second").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});
        $("#budgetMessage").hide();
      }

      $("#loadingBudget").hide();
      $("#myProjectSecondTrigger").show();
    } catch (error) {
      console.error('Error checking workflow:', error);
      $("#loadingBudget").hide();
      $("#myProjectSecondTrigger").show();

      Swal.fire("Error", "Error Checking Workflow", "error");
    }
  });

  $('#tableSites').on('click', 'tbody tr', function() {
    let sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
    let siteCode    = $(this).find('td:nth-child(2)').text();
    let siteName    = $(this).find('td:nth-child(3)').text();
    
    $("#myWorker").prop("disabled", false);
    $("#requester_popup").prop("disabled", false);
    $("#beneficiary_second_popup").prop("disabled", false);
    $("#bank_name_popup").prop("disabled", false);
    $("#bank_account_popup").prop("disabled", false);
    $("#bank_list_popup_vendor").prop("disabled", false);
    $("#bank_list_popup_corp_card").prop("disabled", false);

    $("#budgetDetailsData").val("");

    $('table#budgetTable tbody').empty();
    $(".loading").show();

    getBudgetDetails(sysId);

    $("#site_id_second").val(sysId);
    $("#site_code_second").val(siteCode);
    $("#site_name_second").val(`${siteCode} - ${siteName}`);

    $("#site_code_second").css("border", "1px solid #ced4da");
    $("#site_name_second").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});
    $("#subBudgetMessage").hide();

    $('#mySites').modal('hide');
  });

  $('#tableRequesters').on('click', 'tbody tr', function() {
    const sysId         = $(this).find('input[data-trigger="sys_id_requesters"]').val();
    const contactPhone  = $(this).find('input[data-trigger="contact_phone_requesters"]').val().split(',').map(v => v.trim().replace(/;$/, ''));
    const name          = $(this).find('td:nth-child(2)').text();
    const position      = $(this).find('td:nth-child(3)').text();
    
    $("#requester_id").val(sysId);
    $("#requester").val(`${position} - ${name}`);
    $("#requester").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});
    $("#requester_detail").val(position);
    $("#requester_detail").css("border", "1px solid #ced4da");
    $("#contactPhone").val(contactPhone[3] || '-');
    $("#requesterMessage").hide();

    $('#myRequesters').modal('hide');
  });

  $('#dateCommance').change(function() {
    $("#dateEnd").prop("disabled", false);
    var dateCommance = new Date($("#dateCommance").val());
    document.getElementById('dateEnd').setAttribute('min', dateCommance.toISOString().split('T')[0]);

    $("#dateCommance").css("border", "1px solid #ced4da");
    $("#dateCommenceTravelMessage").hide();
  });

  $('#dateEnd').change(function() {
    $("#dateEnd").css("border", "1px solid #ced4da");
    $("#dateEndTravelMessage").hide();
  });

  $('#departingFrom').on('input', function(e) {
    if (e.target.value) {
      $("#departingFrom").css("border", "1px solid #ced4da");
      $("#departingFromMessage").hide();
    } else {
      $("#departingFrom").css("border", "1px solid red");
      $("#departingFromMessage").show();
    }
  });

  $('#destinationTo').on('input', function(e) {
    if (e.target.value) {
      $("#destinationTo").css("border", "1px solid #ced4da");
      $("#destinationToMessage").hide();
    } else {
      $("#destinationTo").css("border", "1px solid red");
      $("#destinationToMessage").show();
    }
  });

  $('#reasonTravel').on('input', function(e) {
    if (e.target.value) {
      $("#reasonTravel").css("border", "1px solid #ced4da");
      $("#reasonToTravelMessage").hide();
    } else {
      $("#reasonTravel").css("border", "1px solid red");
      $("#reasonToTravelMessage").show();
    }
  });

  $('#tableBeneficiaries').on('click', 'tbody tr', function() {
    let sysId           = $(this).find('input[data-trigger="sys_id_beneficiaries"]').val();
    let personRefId     = $(this).find('input[data-trigger="person_ref_id_beneficiaries"]').val();
    let personName      = $(this).find('td:nth-child(2)').text();
    let personPosition  = $(this).find('td:nth-child(3)').text();

    $("#beneficiary_second_id").val(sysId);
    $("#beneficiary_second_person_ref_id").val(personRefId);
    $("#beneficiary_second_person_name").val(`${personPosition} - ${personName}`);
    $("#beneficiary_second_person_position").val(personPosition);

    $("#bank_list_popup_second").prop("disabled", false);

    $("#beneficiary_second_person_position").css("border", "1px solid #ced4da");
    $("#beneficiary_second_person_name").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});
    $("#beneficiaryToOtherMessage").hide();

    getBanks(personRefId, "BusinessTripRequest");

    $('#myBeneficiaries').modal('hide');
  });

  $('#tableGetBankList').on('click', 'tbody tr', function() {
    let sysId         = $(this).find('input[type="hidden"]').val();
    let bankAcronym   = $(this).find('td:nth-child(2)').text();
    let bankFullName  = $(this).find('td:nth-child(3)').text();

    if (labelPayment == "bank_name_vendor") {
      $("#bank_list_code").val(sysId);
      $("#bank_list_name").val(bankAcronym);
      $("#bank_list_detail").val(`${bankAcronym} - ${bankFullName}`);
      $("#bank_list_detail").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});

      $("#bank_accountss").val("");
      $("#bank_accounts_duplicate").val("");
      $("#bank_accountss_id").val("");
      $("#bank_accounts_duplicate_id").val("");
      $("#bank_accountss_detail").val("");
      $("#bank_accounts_duplicate_detail").val("");

      $("#bank_accounts_popup_vendor").prop("disabled", false);

      getBanksAccount(sysId);

      $("#bankNameVendorMessage").hide();
    } else if (labelPayment == "bank_name_corp_card") {
      $("#bank_list_second_code").val(sysId);
      $("#bank_list_second_name").val(bankAcronym);
      $("#bank_list_second_detail").val(`${bankAcronym} - ${bankFullName}`);
      $("#bank_list_second_detail").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});

      $("#bank_accounts_second").val("");
      $("#bank_accounts_duplicate_second").val("");
      $("#bank_accounts_id_second").val("");
      $("#bank_accounts_duplicate_id_second").val("");
      $("#bank_accounts_detail_second").val("");
      $("#bank_accounts_detail_duplicate_second").val("");

      $("#bank_accounts_popup_corp_card").prop("disabled", false);

      getBanksAccount(sysId);

      $("#bankNameCorpCardMessage").hide();
    }

    $('#myGetBankList').modal('hide');
  });

  $('#tableBanksAccount').on('click', 'tbody tr', function() {
    const sysID       = $(this).find('input[type="hidden"]').val();
    const bankName    = $(this).find('td:nth-child(2)').text();
    const bankAccount = $(this).find('td:nth-child(3)').text();
    const accountName = $(this).find('td:nth-child(4)').text();

    if (labelPayment == "bank_account_vendor") {
      $("#bank_accountss").val(`${bankAccount} - ${accountName}`);
      $("#bank_accounts_duplicate").val(`${bankAccount} - ${accountName}`);
      $("#bank_accountss_id").val(sysID);
      $("#bank_accounts_duplicate_id").val(sysID);
      $("#bank_accountss_detail").val(bankAccount);
      $("#bank_accounts_duplicate_detail").val(bankAccount);

      $("#bankAccountVendorMessage").hide();

      $("#bank_accountss").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});
    } else if (labelPayment == "bank_account_corp_card") {
      $("#bank_accounts_second").val(bankAccount);
      $("#bank_accounts_duplicate_second").val(bankAccount);
      $("#bank_accounts_id_second").val(sysID);
      $("#bank_accounts_duplicate_id_second").val(sysID);
      $("#bank_accounts_detail_second").val(`${bankAccount} - ${accountName}`);
      $("#bank_accounts_detail_duplicate_second").val(`${bankAccount} - ${accountName}`);

      $("#bankAccountCorpCardMessage").hide();

      $("#bank_accounts_detail_second").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});
    }

    $('#myBanksAccount').modal('hide');
  });

  $('#direct_to_vendor').on('input', function(e) {
    if (e.target.value) {
      $("#direct_to_vendor").css("border", "1px solid #ced4da");
      $("#directToVendorMessage").hide();
    }
  });

  $('#by_corp_card').on('input', function(e) {
    if (e.target.value) {
      $("#by_corp_card").css("border", "1px solid #ced4da");
      $("#byCorpCardMessage").hide();
    }
  });

  $('#to_other').on('input', function(e) {
    if (e.target.value) {
      $("#to_other").css("border", "1px solid #ced4da");
      $("#toOtherMessage").hide();
    }
  });

  $(window).one('load', function(e) {
    document.getElementById('dateCommance').setAttribute('min', today.toISOString().split('T')[0]);
    document.getElementById('dateEnd').setAttribute('min', today.toISOString().split('T')[0]);

    document.getElementById("direct_to_vendor").addEventListener("input", calculateTotalPayment);
    document.getElementById("by_corp_card").addEventListener("input", calculateTotalPayment);
    document.getElementById("to_other").addEventListener("input", calculateTotalPayment);

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

    getDocumentType("Person Business Trip Form");
    getBusinessTripCostComponentEntityNew();
  });
</script>