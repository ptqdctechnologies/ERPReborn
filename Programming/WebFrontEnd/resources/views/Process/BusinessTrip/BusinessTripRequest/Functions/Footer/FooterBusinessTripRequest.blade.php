<script>
  let labelPayment = '';
  let totalNextApprover = 0;
  let triggerButtonModal = null;
  let currenctBudgetSelection = 0;
  let dataWorkflow = {
    workFlowPathRefID: null,
    approverEntityRefID: null,
    comment: null
  };
  const initialValue = 0;
  const totalBusinessTrip = [];
  const date = new Date();
  const today = new Date(date.setMonth(date.getMonth() - 3));
  const searchBudgetBtn = document.getElementById('budget_detail_search');
  const documentTypeID = document.getElementById("DocumentTypeID");
  const dateCommanceComp = document.getElementById('dateCommance');
  const dateEndComp = document.getElementById('dateEnd');
  const directToVendorComp = document.getElementById('direct_to_vendor');
  const byCorpCardComp = document.getElementById('by_corp_card');
  const toOtherComp = document.getElementById('to_other');
  const beneficiaryPersonRefID = document.getElementById('person_id');
  const bankAcronymVendor = document.getElementById('bank_acronym_vendor');
  const bankAcronymCorpCard = document.getElementById('bank_acronym_corp_card');
  const bankAcronymOther = document.getElementById('bank_acronym_other');
  const validation = {
    sectionOne: {
      budgetID: getElement("project_name"),
      subBudgetID: getElement("site_name")
    },
    sectionTwo: {
      requesterID: getElement("requester_name"),
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
      bankListCode: getElement("bank_id_vendor"),
      bankAccountsID: getElement("bank_account_id_vendor"),
      byCorpCard: getElement("by_corp_card"),
      bankListSecondCode: getElement("bank_id_corp_card"),
      bankAccountsIDSecond: getElement("bank_account_id_corp_card"),
      toOther: getElement("to_other"),
      beneficiarySecondID: getElement("beneficiary_id"),
      bankListThirdCode: getElement("bank_id_other"),
      bankAccountsThirdID: getElement("bank_account_id_other")
    }
  };

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

  function getElement(id) {
    return document.getElementById(id);
  }

  function isNotEmpty(value) {
    return value && value.trim() !== '';
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

  function changeLabelPayment(val) {
    labelPayment = val;

    if (val == 'bank_account_vendor') {
      getBankAccountListCustom(bankAcronymVendor.value);
    } else if (val == 'bank_account_corp_card') {
      getBankAccountListCustom(bankAcronymCorpCard.value);
    } else if (val == 'bank_account_other') {
      getBankAccountListCustom(bankAcronymOther.value, "", beneficiaryPersonRefID.value);
    }
  }

  function parseCurrency(value) {
    const clean = value.replace(/,/g, '').trim();
    return isNaN(parseFloat(clean)) ? 0 : parseFloat(clean);
  }

  function parseFormattedNumber(value) {
    if (!value) return 0;
    return parseFloat(value.replace(/,/g, ''));
  }

  function calculateTotalPayment() {
    const totalBrf = parseFormattedNumber(document.getElementById("total_business_trip").value);
    const directToVendorInput = document.getElementById("direct_to_vendor");
    const corpCardInput = document.getElementById("by_corp_card");
    const toOtherInput = document.getElementById("to_other");

    let directToVendor = parseFormattedNumber(directToVendorInput.value);
    let corpCard = parseFormattedNumber(corpCardInput.value);
    let toOther = parseFormattedNumber(toOtherInput.value);

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

  function calculateTotalBRF() {
    const ids = ['taxi', 'airplane', 'train', 'bus', 'ship', 'tol/road', 'park', 'excess baggage', 'fuel', 'hotel', 'mess', 'guest house', 'accommodation', 'entertainment', 'other'];
    let total = 0;

    ids.forEach(id => {
      const input = document.getElementById(id);

      if (input && input.value) {
        const amount = parseCurrency(input.value);

        const simulatedTotal = total + amount;

        if (currenctBudgetSelection > 0 && currenctBudgetSelection < simulatedTotal && document.activeElement === input) {
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
    }
    if (currenctBudgetSelection != 0 && total != 0 && currenctBudgetSelection < total) {
      totalField.value = currencyTotal(total);
      Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
    }
    if (currenctBudgetSelection != 0 && total == 0 && currenctBudgetSelection > total) {
      totalField.value = currencyTotal("0.00");
      $("#total_business_trip").css("border", "1px solid red");
      $("#totalBRFMessage").show();
    }
    if (currenctBudgetSelection == 0 && total != 0 && currenctBudgetSelection < total) {
      totalField.value = currencyTotal(total);
      $("#total_business_trip").css("border", "1px solid #ced4da");
      $("#totalBRFMessage").hide();
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
    $.ajax({
      type: 'GET',
      url: '{!! route("getBusinessTripCostComponentEntityNew") !!}',
      success: function (data) {
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

  function getSelectedRowData() {
    const selectedCheckbox = document.querySelector('#budgetTable tbody input[type="checkbox"]:checked');
    const budgetDetailsInput = document.getElementById('budgetDetailsData');
    const totalBusinessTripInput = document.getElementById('total_business_trip');
    const totalPaymentBusinessTripInput = document.getElementById('total_payment');

    if (selectedCheckbox) {
      const row = selectedCheckbox.closest('tr');
      const datas = {
        totalBudget: row.cells[3].textContent.trim(),
        balanceBudget: row.cells[5].textContent.trim(),
        sysId: row.querySelector('input[data-budget-id="sys_ID"]').value,
        productId: row.querySelector('input[id="product_RefID"]').value,
        workId: row.querySelector('input[id="workStructure_RefID"]').value
      };

      // $("#var_combinedBudget_RefID").val(datas.sysId);
      $("#total_business_trip_request").val(datas.totalBudget);
      $("#total_balanced").val(datas.balanceBudget);
      $("#combinedBudgetSectionDetail_RefID").val(datas.sysId);
      $("#workStructure_RefID").val(datas.workId);
      $("#product_RefID").val(datas.productId);

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

  function handleCheckboxSelection() {
    const checkboxes = document.querySelectorAll('#budgetTable tbody input[type="checkbox"]');

    checkboxes.forEach((checkbox, index) => {
      checkbox.addEventListener('change', function () {
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

  function getBudgetDetails(site_id) {
    const tdStyle = 'padding: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important;';

    $.ajax({
      type: 'GET',
      url: '{!! route("getBudget") !!}?site_code=' + site_id,
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      success: function (data) {
        $("#loadingBudgetDetails").hide();
        searchBudgetBtn.style.display = 'block';

        $.each(data, function (key, value) {
          const productColumn = value.product_RefID
            ? `<td style="text-align: center;">-</td>
               <td style="text-align: left;">${value.product_RefID} - ${value.productName}</td>`
            : `<td style="text-align: center;">-</td>
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
               </td>`;

          const html = `
            <tr>
              <td style="${tdStyle}">
                <input hidden data-budget-id="sys_ID" value="${value.sys_ID}">
                <input hidden id="workStructure_RefID" value="302000000000002">
                <input hidden id="product_RefID" value="${value.product_RefID}">
                <input type="checkbox" aria-label="Checkbox for following text input">
              </td>
              ${productColumn}
              <td style="${tdStyle}">${numberFormatPHPCustom(value.quantity * value.priceBaseCurrencyValue, 2)}</td>
              <td style="${tdStyle}">${value.priceBaseCurrencyISOCode}</td>
              <td style="${tdStyle}">${numberFormatPHPCustom(value.priceBaseCurrencyValue, 2)}</td>
            </tr>`;

          $('table#budgetTable tbody').append(html);
        });

        handleCheckboxSelection();
      },
    });
  }

  function getWorkflow(combinedBudgetRefID, combinedBudgetCode, combinedBudgetName) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'GET',
      data: {
        businessDocumentType_RefID: documentTypeID.value,
        combinedBudget_RefID: combinedBudgetRefID
      },
      url: '{!! route("Workflow.UserAllowedToSubmit") !!}',
      success: function (response) {
        if (response.status === 200 && !response.data[0].signAccess) {
          getSites(combinedBudgetRefID);

          $("#project_id").val(combinedBudgetRefID);
          $("#project_name").val(`${combinedBudgetCode} - ${combinedBudgetName}`);
          $("#myProjectsTrigger").prop("disabled", true);
          $("#myProjectsTrigger").css("cursor", "not-allowed");
          $("#mySitesTrigger").prop("disabled", false);
          $("#mySitesTrigger").css("cursor", "pointer");

          ErrorHandler.hideErrorInputMessage("#project_name", "#budgetMessage");
          $("#project_name").css({ "background-color": "#e9ecef" });
        } else {
          Swal.fire("Error", "You are not included in this budget", "error");
        }

        $("#loadingBudget").hide();
        $("#iconBudget").show();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('jqXHR, textStatus, errorThrown', jqXHR, textStatus, errorThrown);
        Swal.fire("Error", "Data Error", "error");
      }
    });
  }

  function getBankAccountListCustom(bankName, accountNumber, entityRefID) {
    let table = $('#bankAccountListTable').DataTable({
      processing: true,
      serverSide: true,
      destroy: true,
      info: true,
      paging: true,
      searching: true,
      lengthChange: true,
      pageLength: 10,
      ajax: {
        url: '{!! route("Bank.Account.picklist") !!}',
        type: 'GET',
        data: function (d) {
          d.bank_name = bankName;
          d.account_number = accountNumber;
          d.entity_refID = entityRefID;

          return d;
        },
        beforeSend: function () {
          $('#bankAccountListTable tbody').empty();
          $("#bankAccountListLoadingTable").show();
        },
        complete: function () {
          $("#bankAccountListLoadingTable").hide();
        },
        error: function (xhr, error, thrown) {
          $("#bankAccountListLoadingTable").hide();
        }
      },
      columns: [
        {
          data: null,
          render: function (data, type, row, meta) {
            return '<input id="sys_id_bank_account' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_bank_account" type="hidden">' +
              (meta.row + meta.settings._iDisplayStart + 1)
          }
        },
        {
          data: null,
          defaultContent: '-',
          className: "align-middle text-wrap",
          render: function (data, type, row, meta) {
            return '<span style="line-height: normal;">' +
              data.additionalData.bankName +
              '</span>';
          }
        },
        {
          data: "sys_Text",
          defaultContent: '-',
          className: "align-middle text-wrap",
          render: function (data, type, row, meta) {
            return '<span style="line-height: normal;">' +
              data +
              '</span>';
          }
        }
      ],
      initComplete: function () {
        let api = this.api();

        let $filter = $('#bankAccountListTable_filter');
        let $searchLabel = $filter.find('label');
        let $searchInput = $filter.find('input');

        $searchLabel.css('margin-bottom', '0');
        $searchInput
          .attr('placeholder', 'Search...')
          .off('.DT')
          .on('keypress', function (e) {
            if (e.which === 13) {
              api.search(this.value).draw();
            }
          });

        if ($('#searchHintBank').length === 0) {
          $filter.append(
            '<small id="searchHintBank" class="form-text text-muted" style="margin-bottom: .5rem;">' +
            'Press <strong>Enter</strong> to start searching.' +
            '</small>'
          );
        }
      }
    });
  }

  function validationForm() {
    const testing = sumTravelFares();
    const accommodation = document.getElementById("accommodation");
    const entertainment = document.getElementById("entertainment");
    const other = document.getElementById("other");
    const totalBRF = document.getElementById("total_business_trip");

    if (isSectionValid()) {
      $("#travel_fares_modal_summary").text(decimalFormat(testing));
      $("#allowance_modal_summary").text(accommodation.value || 0.00);
      $("#entertainment_modal_summary").text(entertainment.value || 0.00);
      $("#other_modal_summary").text(other.value || 0.00);
      $("#total_brf_modal_summary").text(totalBRF.value || 0.00);

      $('#businessTripRequestFormModal').modal('show');
    } else {
      if (isSectionNotValid()) {
        $("#project_name").css("border", "1px solid red");
        $("#budgetMessage").show();

        $("#site_name").css("border", "1px solid red");
        $("#subBudgetMessage").show();

        $("#requester_name").css("border", "1px solid red");
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
        $("#project_name").css("border", "1px solid red");
        $("#budgetMessage").show();

        return;
      }
      if (!isNotEmpty(validation.sectionOne.subBudgetID.value)) {
        $("#site_name").css("border", "1px solid red");
        $("#subBudgetMessage").show();

        return;
      }
      if (!isNotEmpty(validation.sectionTwo.requesterID.value)) {
        $("#requester_name").css("border", "1px solid red");
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
            $("#bank_name_vendor").css("border", "1px solid red");
            // $("#bank_list_detail").css("border", "1px solid red");
            $("#bankNameVendorMessage").show();

            return;
          }

          if (!isNotEmpty(validation.sectionFour.bankAccountsID.value)) {
            $("#bank_account_name_vendor").css("border", "1px solid red");
            // $("#bank_accountss_detail").css("border", "1px solid red");
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
            $("#bank_name_corp_card").css("border", "1px solid red");
            // $("#bank_list_second_detail").css("border", "1px solid red");
            $("#bankNameCorpCardMessage").show();

            return;
          }

          if (!isNotEmpty(validation.sectionFour.bankAccountsIDSecond.value)) {
            $("#bank_account_name_corp_card").css("border", "1px solid red");
            // $("#bank_accounts_detail_second").css("border", "1px solid red");
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
            $("#beneficiary_name").css("border", "1px solid red");
            // $("#beneficiary_second_person_name").css("border", "1px solid red");
            $("#beneficiaryToOtherMessage").show();

            return;
          }

          if (!isNotEmpty(validation.sectionFour.bankListThirdCode.value)) {
            $("#bank_name_other").css("border", "1px solid red");
            // $("#bank_name_second_detail").css("border", "1px solid red");
            $("#bankNameToOtherMessage").show();

            return;
          }

          if (!isNotEmpty(validation.sectionFour.bankAccountsThirdID.value)) {
            $("#bank_account_name_other").css("border", "1px solid red");
            // $("#bank_accounts_detail").css("border", "1px solid red");
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

  function BusinessTripRequestStore() {
    const form_data = new FormData($('#businessTripRequestForm')[0]);

    form_data.append('workFlowPath_RefID', dataWorkflow.workFlowPathRefID);
    form_data.append('approverEntity', dataWorkflow.approverEntityRefID);
    form_data.append('comment', dataWorkflow.comment);

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'POST',
      data: form_data,
      url: '{!! route("BusinessTripRequest.store") !!}',
      processData: false,
      contentType: false,
      success: function (res) {
        HideLoading();

        if (res.status == 200) {
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
            cancelForm("{{ route('BusinessTripRequest.index', ['var' => 1]) }}");
          });
        } else {
          ErrorNotif("Create Business Trip Request Failed");
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        HideLoading();
        ErrorNotif("Internal Server Error");
      }
    });
  }

  function commentWorkflow() {
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
        dataWorkflow.comment = result.value;
        ShowLoading();
        BusinessTripRequestStore();
      }
    });
  }

  function SubmitForm(value) {
    triggerButtonModal = value;
    $('#businessTripRequestFormModal').modal('hide');

    $('#businessTripRequestFormModal').on('hidden.bs.modal', function () {
      if (triggerButtonModal === "SUBMIT") {
        if (totalNextApprover > 1) {
          $('#myWorkflows').modal('show');
        } else {
          commentWorkflow();
        }

        triggerButtonModal = null;
      }
    });
  }

  $('#tableProjects').on('click', 'tbody tr', async function () {
    const sysId = $(this).find('input[data-trigger="sys_id_project"]').val();
    const projectCode = $(this).find('td:nth-child(2)').text();
    const projectName = $(this).find('td:nth-child(3)').text();

    $("#project_id").val("");
    $("#project_name").val("");

    $("#loadingBudget").show();
    $("#iconBudget").hide();

    getWorkflow(sysId, projectCode, projectName);

    $('#myProjects').modal('toggle');
  });

  $('#tableSites').on('click', 'tbody tr', function () {
    const sysId = $(this).find('input[data-trigger="sys_id_site"]').val();
    const siteCode = $(this).find('td:nth-child(2)').text();
    const siteName = $(this).find('td:nth-child(3)').text();

    $("#myWorker").prop("disabled", false);
    $("#requester_popup").prop("disabled", false);
    $("#beneficiary_second_popup").prop("disabled", false);
    $("#bank_name_popup").prop("disabled", false);
    $("#bank_account_popup").prop("disabled", false);
    $("#bank_list_popup_vendor").prop("disabled", false);
    $("#bank_list_popup_corp_card").prop("disabled", false);

    $("#budgetDetailsData").val("");

    $('table#budgetTable tbody').empty();
    $("#loadingBudgetDetails").show();

    getBudgetDetails(sysId);

    $("#site_id").val(sysId);
    $("#site_name").val(`${siteCode} - ${siteName}`);

    $("#site_name").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });
    $("#subBudgetMessage").hide();

    $('#mySites').modal('toggle');
  });

  $('#tableRequesters').on('click', 'tbody tr', function () {
    const sysId = $(this).find('input[data-trigger="sys_id_requesters"]').val();
    const contactPhone = $(this).find('input[data-trigger="contact_phone_requesters"]').val().split(',').map(v => v.trim().replace(/;$/, ''));
    const name = $(this).find('td:nth-child(2)').text();
    const position = $(this).find('td:nth-child(3)').text();

    $("#requester_id").val(sysId);
    $("#requester_name").val(`${position} - ${name}`);
    $("#requester_name").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });
    $("#contactPhone").val(contactPhone || '-');
    $("#requesterMessage").hide();

    $('#myRequesters').modal('toggle');
  });

  $('#tableBeneficiaries').on('click', 'tbody tr', function () {
    const sysId = $(this).find('input[data-trigger="sys_id_beneficiaries"]').val();
    const personRefId = $(this).find('input[data-trigger="person_ref_id_beneficiaries"]').val();
    const personName = $(this).find('td:nth-child(2)').text();
    const personPosition = $(this).find('td:nth-child(3)').text();

    if (bankAcronymOther.value) {
      getBankAccountListCustom(bankAcronymOther.value, "", personRefId);
    }

    $("#person_id").val(personRefId);
    $("#beneficiary_id").val(sysId);
    $("#beneficiary_name").val(`${personPosition} - ${personName}`);
    $("#beneficiary_name").css({ "background-color": "#e9ecef" });

    $("#bankOtherListModalTrigger").prop("disabled", false);
    $("#bankOtherListModalTrigger").css({ "cursor": "pointer" });

    ErrorHandler.hideErrorInputMessage("#beneficiary_name", "#beneficiaryToOtherMessage");

    $('#myBeneficiaries').modal('toggle');
  });

  $('#bankListTable').on('click', 'tbody tr', function () {
    const sysId = $(this).find('input[data-trigger="sys_id_bank_list"]').val();
    const acronym = $(this).find('td:nth-child(2)').text();
    const name = $(this).find('td:nth-child(3)').text();

    if (labelPayment == "bank_name_vendor") {
      $("#bank_id_vendor").val(sysId);
      $("#bank_acronym_vendor").val(acronym);
      $("#bank_name_vendor").val(`${acronym} - ${name}`);
      $("#bank_name_vendor").css({ "background-color": "#e9ecef" });

      $("#bankAccountVendorListModalTrigger").prop("disabled", false);
      $("#bankAccountVendorListModalTrigger").css({ "cursor": "pointer" });

      ErrorHandler.hideErrorInputMessage("#bank_name_vendor", "#bankNameVendorMessage");

      getBankAccountListCustom(acronym);
    } else if (labelPayment == "bank_name_corp_card") {
      $("#bank_id_corp_card").val(sysId);
      $("#bank_acronym_corp_card").val(acronym);
      $("#bank_name_corp_card").val(`${acronym} - ${name}`);
      $("#bank_name_corp_card").css({ "background-color": "#e9ecef" });

      $("#bankAccountCorpCardListModalTrigger").prop("disabled", false);
      $("#bankAccountCorpCardListModalTrigger").css({ "cursor": "pointer" });

      ErrorHandler.hideErrorInputMessage("#bank_name_corp_card", "#bankNameCorpCardMessage");

      getBankAccountListCustom(acronym);
    } else if (labelPayment == "bank_name_other") {
      $("#bank_id_other").val(sysId);
      $("#bank_acronym_other").val(acronym);
      $("#bank_name_other").val(`${acronym} - ${name}`);
      $("#bank_name_other").css({ "background-color": "#e9ecef" });

      $("#bankAccountOtherListModalTrigger").prop("disabled", false);
      $("#bankAccountOtherListModalTrigger").css({ "cursor": "pointer" });

      ErrorHandler.hideErrorInputMessage("#bank_name_other", "#bankNameToOtherMessage");

      getBankAccountListCustom(acronym, "", beneficiaryPersonRefID.value);
    }

    $('#bankListModal').modal('toggle');
  });

  $('#bankAccountListTable').on('click', 'tbody tr', function () {
    const sysId = $(this).find('input[data-trigger="sys_id_bank_account"]').val();
    const bankName = $(this).find('td:nth-child(2)').text();
    const accountNumber = $(this).find('td:nth-child(3)').text();

    if (labelPayment == "bank_account_vendor") {
      $("#bank_account_id_vendor").val(sysId);
      $("#bank_account_name_vendor").val(accountNumber);
      $("#bank_account_name_vendor").css({ "background-color": "#e9ecef" });

      ErrorHandler.hideErrorInputMessage("#bank_account_name_vendor", "#bankAccountVendorMessage");
    } else if (labelPayment == "bank_account_corp_card") {
      $("#bank_account_id_corp_card").val(sysId);
      $("#bank_account_name_corp_card").val(accountNumber);
      $("#bank_account_name_corp_card").css({ "background-color": "#e9ecef" });

      ErrorHandler.hideErrorInputMessage("#bank_account_name_corp_card", "#bankAccountCorpCardMessage");
    } else if (labelPayment == "bank_account_other") {
      $("#bank_account_id_other").val(sysId);
      $("#bank_account_name_other").val(accountNumber);
      $("#bank_account_name_other").css({ "background-color": "#e9ecef" });

      ErrorHandler.hideErrorInputMessage("#bank_account_name_other", "#bankAccountToOtherMessage");
    }

    $('#bankAccountListModal').modal('toggle');
  });

  $('#dateCommance').change(function () {
    $("#dateEnd").prop("disabled", false);
    var dateCommance = new Date($("#dateCommance").val());
    document.getElementById('dateEnd').setAttribute('min', dateCommance.toISOString().split('T')[0]);

    $("#dateCommance").css("border", "1px solid #ced4da");
    $("#dateCommenceTravelMessage").hide();
  });

  $('#dateEnd').change(function () {
    $("#dateEnd").css("border", "1px solid #ced4da");
    $("#dateEndTravelMessage").hide();
  });

  $('#departingFrom').on('input', function (e) {
    if (e.target.value) {
      $("#departingFrom").css("border", "1px solid #ced4da");
      $("#departingFromMessage").hide();
    } else {
      $("#departingFrom").css("border", "1px solid red");
      $("#departingFromMessage").show();
    }
  });

  $('#destinationTo').on('input', function (e) {
    if (e.target.value) {
      $("#destinationTo").css("border", "1px solid #ced4da");
      $("#destinationToMessage").hide();
    } else {
      $("#destinationTo").css("border", "1px solid red");
      $("#destinationToMessage").show();
    }
  });

  $('#reasonTravel').on('input', function (e) {
    if (e.target.value) {
      $("#reasonTravel").css("border", "1px solid #ced4da");
      $("#reasonToTravelMessage").hide();
    } else {
      $("#reasonTravel").css("border", "1px solid red");
      $("#reasonToTravelMessage").show();
    }
  });

  $(document).ready(function () {
    getRequesters();
    getBeneficiaries();
    getBankList();

    if (dateCommanceComp) {
      dateCommanceComp.setAttribute('min', today.toISOString().split('T')[0]);
    }
    if (dateEndComp) {
      dateEndComp.setAttribute('min', today.toISOString().split('T')[0]);
    }
    if (directToVendorComp) {
      directToVendorComp.addEventListener("input", calculateTotalPayment);
    }
    if (byCorpCardComp) {
      byCorpCardComp.addEventListener("input", calculateTotalPayment);
    }
    if (toOtherComp) {
      toOtherComp.addEventListener("input", calculateTotalPayment);

      getBusinessTripCostComponentEntityNew();
    }

    $("#mySitesTrigger").prop("disabled", true);
    $("#bankAccountVendorListModalTrigger").prop("disabled", true);
    $("#bankAccountCorpCardListModalTrigger").prop("disabled", true);
    $("#bankAccountOtherListModalTrigger").prop("disabled", true);
    $("#bankOtherListModalTrigger").prop("disabled", true);
    $("#loadingBudgetDetails").hide();

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
  });
</script>