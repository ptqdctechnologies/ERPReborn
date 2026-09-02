<script>
  let labelPayment = '';
  let currenctBudgetSelection = 0;
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

  function changeLabelPayment(val) {
    labelPayment = val;

    // if (val == 'bank_account_vendor') {
    //   getBanksAccount(bankNameVendorID.value);
    // } else if (val == 'bank_account_corp_card') {
    //   getBanksAccount(bankNameCorpCardID.value);
    // }
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

          $("#project_name").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });
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

  $('#bankListTable').on('click', 'tbody tr', function () {
    const sysId = $(this).find('input[data-trigger="sys_id_bank_list"]').val();
    const acronym = $(this).find('td:nth-child(2)').text();
    const name = $(this).find('td:nth-child(3)').text();

    if (labelPayment == "bank_name_vendor") {
      $("#bank_id_vendor").val(sysId);
      $("#bank_name_vendor").val(`${acronym} - ${name}`);
      $("#bank_name_vendor").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });
    } else if (labelPayment == "bank_name_corp_card") {
      $("#bank_id_corp_card").val(sysId);
      $("#bank_name_corp_card").val(`${acronym} - ${name}`);
      $("#bank_name_corp_card").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });
    }

    $('#bankListModal').modal('toggle');
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

    // $("#myWorker").prop("disabled", true);
    // $("#requester_popup").prop("disabled", true);
    $("#mySitesTrigger").prop("disabled", true);
    // $("#dateEnd").prop("disabled", true);
    // $("#dateEnd").css("background-color", "white");
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