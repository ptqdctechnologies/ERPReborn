<script type="text/javascript">
  var currentModalSource = '';
  const initialValue = 0;
  const totalBusinessTrip = [];
  const transportInputs = [
    'taxi',
    'airplane',
    'train',
    'bus',
    'ship',
    'tol_road',
    'park',
    'access_bagage',
    'fuel'
  ];
  const accomodationInputs = [
    'hotel',
    'mess',
    'guest_house',
    'other_accomodation',
  ];
  const businessTripInputs = [
    'allowance',
    'entertainment',
    'other',
  ];
  const paymentsInputs = [
    'direct_to_vendor',
    'by_corp_card',
    'to_other',
  ];

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
          getSelectedRowData();
        } else {
          checkboxes.forEach(otherCheckbox => {
            otherCheckbox.disabled = false;
          });
          document.getElementById('budgetDetailsData').value = '';
        }
      });
    });
  }

  // FUNGSI UNTUK MENGUBAH STRING ANGKA DENGAN FORMAT KE NUMBER
  function parseFormattedNumber(strNumber) {
    return parseFloat(strNumber.replace(/,/g, ''));
  }

  // FUNGSI UNTUK MENDAPATKAN DATA BARIS YANG DICENTANG DAN MENYIMPAN KE INPUT
  function getSelectedRowData() {
    const selectedCheckbox = document.querySelector('#budgetTable tbody input[type="checkbox"]:checked');
    const budgetDetailsInput = document.getElementById('budgetDetailsData');
    const totalBusinessTripInput = document.getElementById('total_business_trip');
    
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
      };
      
      budgetDetailsInput.value = JSON.stringify(datas);

      const balanceBudget = parseFormattedNumber(datas.balanceBudget);
      const totalBusinessTrip = parseFormattedNumber(totalBusinessTripInput.value || '0');

      if (totalBusinessTrip > balanceBudget) {
        Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
      }
    } else {
      budgetDetailsInput.value = '';
    }
  }

  // FUNGSI TOTAL TRANSPORT
  function calculateTotalTransport() {
    const taxi = parseFloat(document.getElementById('taxi').value.replace(/,/g, '')) || 0;
    const airplane = parseFloat(document.getElementById('airplane').value.replace(/,/g, '')) || 0;
    const train = parseFloat(document.getElementById('train').value.replace(/,/g, '')) || 0;
    const bus = parseFloat(document.getElementById('bus').value.replace(/,/g, '')) || 0;
    const ship = parseFloat(document.getElementById('ship').value.replace(/,/g, '')) || 0;
    const tolRoad = parseFloat(document.getElementById('tol_road').value.replace(/,/g, '')) || 0;
    const park = parseFloat(document.getElementById('park').value.replace(/,/g, '')) || 0;
    const accessBagage = parseFloat(document.getElementById('access_bagage').value.replace(/,/g, '')) || 0;
    const fuel = parseFloat(document.getElementById('fuel').value.replace(/,/g, '')) || 0;

    let newFormatBudget = 0;
    let budgetDetailsDataJSON = null;
    try {
      budgetDetailsDataJSON = document.getElementById('budgetDetailsData').value;
      if (budgetDetailsDataJSON) {
        const parsedData = JSON.parse(budgetDetailsDataJSON);
        newFormatBudget = parseFloat(parsedData.balanceBudget.replace(/,/g, '')) || 0;
      } else {
        // console.warn('Budget details data is empty');
      }
    } catch (error) {
      console.error('Error parsing budget details JSON:', error);
      return;
    }

    const total = taxi + airplane + train + bus + ship + tolRoad + park + accessBagage + fuel;
    totalBusinessTrip[0] = total;

    const sumTotalBusinessTrip = totalBusinessTrip.reduce((accumulator, currentValue) => accumulator + currentValue, initialValue);

    document.getElementById('total_transport').value = numberFormatPHPCustom(total, 2);
    document.getElementById('total_business_trip').value = numberFormatPHPCustom(sumTotalBusinessTrip, 2);

    if (budgetDetailsDataJSON && sumTotalBusinessTrip > newFormatBudget) {
      Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
    }
  }

  transportInputs.forEach(id => {
    const inputElement = document.getElementById(id);
    if (inputElement) {
      inputElement.addEventListener('input', calculateTotalTransport);
    }
  });

  // FUNGSI TOTAL ACCOMMODATION
  function calculateTotalAccomodation() {
    const hotel = parseFloat(document.getElementById('hotel').value.replace(/,/g, '')) || 0;
    const mess = parseFloat(document.getElementById('mess').value.replace(/,/g, '')) || 0;
    const guest_house = parseFloat(document.getElementById('guest_house').value.replace(/,/g, '')) || 0;
    const other_accomodation = parseFloat(document.getElementById('other_accomodation').value.replace(/,/g, '')) || 0;

    let newFormatBudget = 0;
    let budgetDetailsDataJSON = null;
    try {
      budgetDetailsDataJSON = document.getElementById('budgetDetailsData').value;
      if (budgetDetailsDataJSON) {
        const parsedData = JSON.parse(budgetDetailsDataJSON);
        newFormatBudget = parseFloat(parsedData.balanceBudget.replace(/,/g, '')) || 0;
      } else {
        // console.warn('Budget details data is empty');
      }
    } catch (error) {
      console.error('Error parsing budget details JSON:', error);
      return;
    }

    const total = hotel + mess + guest_house + other_accomodation;
    totalBusinessTrip[1] = total;

    const sumTotalBusinessTrip = totalBusinessTrip.reduce((accumulator, currentValue) => accumulator + currentValue,initialValue);
    
    document.getElementById('total_accomodation').value = numberFormatPHPCustom(total, 2);
    document.getElementById('total_business_trip').value = numberFormatPHPCustom(sumTotalBusinessTrip, 2);

    if (budgetDetailsDataJSON && sumTotalBusinessTrip > newFormatBudget) {
      Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
    }
  }

  accomodationInputs.forEach(id => {
    const inputElement = document.getElementById(id);
    if (inputElement) {
      inputElement.addEventListener('input', calculateTotalAccomodation);
    }
  });

  // FUNGSI TOTAL BUSINESS TRIP (TOTAL TRANSPORT + TOTAL ACCOMMODATION + ALLOWANCE + ENTERTAINMENT + OTHER)
  function calculateTotalBusinessTrip() {
    const allowance = parseFloat(document.getElementById('allowance').value.replace(/,/g, '')) || 0;
    const entertainment = parseFloat(document.getElementById('entertainment').value.replace(/,/g, '')) || 0;
    const other = parseFloat(document.getElementById('other').value.replace(/,/g, '')) || 0;

    let newFormatBudget = 0;
    let budgetDetailsDataJSON = null;
    try {
      budgetDetailsDataJSON = document.getElementById('budgetDetailsData').value;
      if (budgetDetailsDataJSON) {
        const parsedData = JSON.parse(budgetDetailsDataJSON);
        newFormatBudget = parseFloat(parsedData.balanceBudget.replace(/,/g, '')) || 0;
      } else {
        // console.warn('Budget details data is empty');
      }
    } catch (error) {
      console.error('Error parsing budget details JSON:', error);
      return;
    }

    const total = allowance + entertainment + other;
    totalBusinessTrip[2] = total;

    const sumTotalBusinessTrip = totalBusinessTrip.reduce((accumulator, currentValue) => accumulator + currentValue,initialValue);

    document.getElementById('total_business_trip').value = numberFormatPHPCustom(sumTotalBusinessTrip, 2);

    if (budgetDetailsDataJSON && sumTotalBusinessTrip > newFormatBudget) {
      Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
    }
  }

  businessTripInputs.forEach(id => {
    const inputElement = document.getElementById(id);
    
    if (inputElement) {
      inputElement.addEventListener('input', calculateTotalBusinessTrip);
    }
  });

  // FUNGSI TOTAL PAYMENT (DIRECT TO VENDOR + BY CORP CARD + TO OTHER)
  function calculateTotalPayments() {
    const directToVendor = parseFloat(document.getElementById('direct_to_vendor').value.replace(/,/g, '')) || 0;
    const byCorpCard = parseFloat(document.getElementById('by_corp_card').value.replace(/,/g, '')) || 0;
    const toOther = parseFloat(document.getElementById('to_other').value.replace(/,/g, '')) || 0;

    let newFormatBudget = 0;
    let budgetDetailsDataJSON = null;
    try {
      budgetDetailsDataJSON = document.getElementById('budgetDetailsData').value;
      if (budgetDetailsDataJSON) {
        const parsedData = JSON.parse(budgetDetailsDataJSON);
        newFormatBudget = parseFloat(parsedData.balanceBudget.replace(/,/g, '')) || 0;
      } else {
        // console.warn('Budget details data is empty');
      }
    } catch (error) {
      console.error('Error parsing budget details JSON:', error);
      return;
    }

    const total = directToVendor + byCorpCard + toOther;

    document.getElementById('total_payment').value = numberFormatPHPCustom(total, 2);

    if (budgetDetailsDataJSON && total > newFormatBudget) {
      Swal.fire("Error", `Total Payments must not exceed the selected Balanced Budget`, "error");
    }
  }

  paymentsInputs.forEach(id => {
    const inputElement = document.getElementById(id);
    
    if (inputElement) {
      inputElement.addEventListener('input', calculateTotalPayments);
    }
  });

  $("#myWorker").prop("disabled", true);
  $("#requester_popup").prop("disabled", true);
  $("#beneficiary_popup").prop("disabled", true);
  $("#bank_name_popup").prop("disabled", true);
  $("#bank_account_popup").prop("disabled", true);
  $("#bank_accounts_popup_vendor").prop("disabled", true);
  $("#bank_accounts_popup_corp_card").prop("disabled", true);
  $("#sitecode2").prop("disabled", true);
  $("#dateEnd").prop("disabled", true);
  $("#dateEnd").css("background-color", "white");
  $(".loading").hide();

  // BUDGET CODE
  $('#tableGetProject tbody').on('click', 'tr', function() {
    $("#sitecode").val("");
    $("#sitename").val("");
    $("#sitecode2").prop("disabled", false);

    $("#myProject").modal('toggle');

    var row = $(this).closest("tr");
    var id = row.find("td:nth-child(1)").text();
    var sys_id = $('#sys_id_budget' + id).val();
    var code = row.find("td:nth-child(2)").text();
    var name = row.find("td:nth-child(3)").text();

    $("#projectcode").val(code);
    $("#projectname").val(name);
    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var keys = 0;
    $.ajax({
      type: 'GET',
      url: '{!! route("getSite") !!}?project_code=' + sys_id,
      success: function(data) {
        var no = 1;
        var t = $('#tableGetSite').DataTable();
        t.clear();
        $.each(data, function(key, val) {
          keys += 1;
          t.row.add([
            '<tbody><tr><input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
            '<td>' + val.Code + '</td>',
            '<td>' + val.Name + '</td></tr></tbody>'
          ]).draw();
        });
      }
    });
  });

  // SUB BUDGET CODE
  $('#tableGetSite tbody').on('click', 'tr', function() {
    $("#budgetDetailsData").val("");
    $("#myWorker").prop("disabled", false);
    $("#requester_popup").prop("disabled", false);
    $("#beneficiary_popup").prop("disabled", false);
    $("#bank_name_popup").prop("disabled", false);
    $("#bank_account_popup").prop("disabled", false);
    $('table#budgetTable tbody').empty();
    $(".loading").show();
    
    $("#mySiteCode").modal('toggle');
    
    const searchBudgetBtn = document.getElementById('budget_detail_search');
    
    var row = $(this).closest("tr");
    var id = row.find("td:nth-child(1)").text();
    var sys_ID = $('#sys_id_site' + id).val();
    var code = row.find("td:nth-child(2)").text();
    var name = row.find("td:nth-child(3)").text();
    
    $("#sitecode").val(code);
    $("#sitename").val(name);

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'GET',
      url: '{!! route("getBudget") !!}?site_code=' + sys_ID,
      success: function(data) {
        const datas = [
          {
            product_RefID: 88000000003486,
            productName: "Tiket Pesawat Pulang Pergi",
            quantity: 2,
            priceBaseCurrencyValue: 3000000,
            quantityRemaining: 1,
            priceBaseCurrencyISOCode: "IDR",
            currentBudget: 6000000,
          },
          {
            product_RefID: 88000000003487,
            productName: "Hotel Penginapan 3 Malam",
            quantity: 1,
            priceBaseCurrencyValue: 2500000,
            quantityRemaining: 0,
            priceBaseCurrencyISOCode: "IDR",
            currentBudget: 2500000,
          },
          {
            product_RefID: 88000000003488,
            productName: "Transportasi Lokal",
            quantity: 3,
            priceBaseCurrencyValue: 150000,
            quantityRemaining: 1,
            priceBaseCurrencyISOCode: "IDR",
            currentBudget: 450000,
          },
          {
            product_RefID: 88000000003489,
            productName: "Makan Siang Selama Perjalanan",
            quantity: 5,
            priceBaseCurrencyValue: 50000,
            quantityRemaining: 2,
            priceBaseCurrencyISOCode: "IDR",
            currentBudget: 250000,
          },
          {
            product_RefID: 88000000003490,
            productName: "Meeting Room Rental",
            quantity: 1,
            priceBaseCurrencyValue: 1000000,
            quantityRemaining: 0,
            priceBaseCurrencyISOCode: "IDR",
            currentBudget: 1000000,
          },
          {
            product_RefID: 88000000003491,
            productName: "Sim Card dengan Paket Data",
            quantity: 1,
            priceBaseCurrencyValue: 200000,
            quantityRemaining: 0,
            priceBaseCurrencyISOCode: "IDR",
            currentBudget: 200000,
          },
          {
            product_RefID: 88000000003492,
            productName: "Tiket Kereta Antar Kota",
            quantity: 2,
            priceBaseCurrencyValue: 500000,
            quantityRemaining: 1,
            priceBaseCurrencyISOCode: "IDR",
            currentBudget: 1000000,
          },
          {
            product_RefID: 88000000003493,
            productName: "Pengeluaran Lain-Lain",
            quantity: 1,
            priceBaseCurrencyValue: 300000,
            quantityRemaining: 0,
            priceBaseCurrencyISOCode: "IDR",
            currentBudget: 300000,
          },
          {
            product_RefID: 88000000003494,
            productName: "Biaya Overweight Bagasi",
            quantity: 1,
            priceBaseCurrencyValue: 100000,
            quantityRemaining: 0,
            priceBaseCurrencyISOCode: "IDR",
            currentBudget: 100000,
          },
          {
            product_RefID: 88000000003495,
            productName: "Souvenir untuk Klien",
            quantity: 4,
            priceBaseCurrencyValue: 250000,
            quantityRemaining: 2,
            priceBaseCurrencyISOCode: "IDR",
            currentBudget: 1000000,
          }
        ];

        $(".loading").hide();
        searchBudgetBtn.style.display = 'block';

        $.each(datas, function(key, val2) {
          var html = 
            '<tr>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                '<input type="checkbox" aria-label="Checkbox for following text input">' +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                val2.product_RefID +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                val2.productName +
              '</td>' +
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
                numberFormatPHPCustom(val2.currentBudget, 2) +
                // numberFormatPHPCustom(50000, 2) +
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

  // TRIGGER UNTUK BANK NAME APAKAH DIRECT TO VENDOR ATAU TO OTHER
  $('.myGetBankList').on('click', function() {
    currentModalSource = $(this).attr('id');
  });

  // PILIH BANK PADA MODAL BANK NAME
  $('#tableGetBankList').on('click', 'tbody tr', function() {
    var sysId = $(this).find('input[type="hidden"]').val();
    var bankAcronym = $(this).find('td:nth-child(2)').text();
    var bankFullName = $(this).find('td:nth-child(3)').text();

    switch(currentModalSource) {
      case 'bank_name_popup_vendor':
        $('#bank_name_vendor').val(bankAcronym);
        $('#bank_code_vendor').val(sysId);
        $('#bank_name_detail_vendor').val(bankFullName);

        $("#bank_accounts_popup_vendor").prop("disabled", false);

        getBankAccountData(sysId);
        adjustInputSize(document.getElementById("bank_name_vendor"), "string");
        break;
      
      case 'bank_name_popup_corp_card':
        $('#bank_name_corp_card').val(bankAcronym);
        $('#bank_code_corp_card').val(sysId);
        $('#bank_name_detail_corp_card').val(bankFullName);

        $("#bank_accounts_popup_corp_card").prop("disabled", false);

        getBankAccountData(sysId, 'second_modal');
        adjustInputSize(document.getElementById("bank_name_corp_card"), "string");
        break;
    }

    $('#myGetBankList').modal('hide');
  });

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
        
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        swalWithBootstrapButtons.fire({
          title: 'Cancelled',
          text: "The action has been canceled.",
          type: 'error',
        });
      }
    });
  });
</script>