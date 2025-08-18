<footer class="main-footer">
  <strong>Copyright &copy; 2020 - </strong> PT Qdc Technologies
</footer>

<script>
  function checkingWorkflow(combinedBudget_RefID, documentTypeID) {
    // console.log('combinedBudget_RefID, documentTypeID', combinedBudget_RefID, documentTypeID);

    return new Promise((resolve, reject) => {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type: 'GET',
        url: '{!! route("CheckingWorkflow") !!}?combinedBudget_RefID=' + combinedBudget_RefID + '&documentTypeID=' + documentTypeID,
        success: function(data) {
          if (data > 0) {
            resolve(true);
          } else {
            $("#project_code_second").val("");
            $("#project_id_second").val("");
            $("#project_name_second").val("");

            Swal.fire("Error", "You're not allowed to submit a transaction for this budget", "error");
            resolve(false);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          $("#project_code_second").val("");
          $("#project_id_second").val("");
          $("#project_name_second").val("");

          Swal.fire("Error", "Data Error", "error");
          resolve(false);
        }
      });
    });
  }

  function decimalFormat(value) {
    return value.toLocaleString('en-US', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });
  }
</script>

<script>
  function getDocumentType(name) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'GET',
      url: '{!! route("getDocumentType") !!}?name=' + name,
      success: function(data) {
        if (Array.isArray(data) && data.length > 0) {
          if (name == "Advance Settlement Form") {
            $("#DocumentTypeID").val(77000000000097);
          } else {
            $("#DocumentTypeID").val(data[0].sys_ID);
          }
        } else {
          console.log('error get document type');
        }
      },
      error: function (textStatus, errorThrown) {
        console.log('error', textStatus, errorThrown);
      }
    });
  }
</script>

<!-- FUNCTION FOR FILE UPLOAD -->
<script>
  if (document.getElementById("dataInput_Log_FileUpload_Pointer_RefID_Action") != null) {
    window.onload = function() {
      document.getElementById("dataInput_Log_FileUpload_Pointer_RefID_Action").dispatchEvent(new Event("change"));
    }
  }
</script>

<!-- TIME FUNCTION -->
<script>
  setInterval(customClock, 500);

  function customClock() {
    var time = new Date();
    var date = time.getDate();
    var year = time.getFullYear();
    var hrs = time.getHours() < 10 ? `0${time.getHours()}` : time.getHours();
    var min = time.getMinutes() < 10 ? `0${time.getMinutes()}` : time.getMinutes();
    var sec = time.getSeconds() < 10 ? `0${time.getSeconds()}` : time.getSeconds();
    var ampm = (time.getHours() >= 12) ? "PM" : "AM";

    var dow = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    document.getElementById('clock').innerHTML = dow[time.getDay()] + ", " + month[time.getMonth()] + " " + date + ", " + year + "  " + hrs + ":" + min + ":" + sec;
    // document.getElementById('clock').innerHTML = dow[time.getDay()] + ", " + date + " " + month[time.getMonth()] + " " + year + "  " + hrs + ":" + min + ":" + sec + " " + ampm;
  }
</script>

<!-- FUNCTION FOR CURRENCY FORMAT -->
<script>
  // Currency
  function currency(num) {
    var str = num.toString().replace("$", ""),
      parts = false,
      output = [],
      i = 1,
      formatted = null;
    if (str.indexOf(".") > 0) {
      parts = str.split(".");
      str = parts[0];
    }
    str = str.split("").reverse();
    for (var j = 0, len = str.length; j < len; j++) {
      if (str[j] != ",") {
        output.push(str[j]);
        if (i % 3 == 0 && j < (len - 1)) {
          output.push(",");
        }
        i++;
      }
    }
    formatted = output.reverse().join("");
    return (formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
  };

  // Currency Total
  function currencyTotal(num) {
    var str = num.toString().replace("$", ""),
      parts = false,
      output = [],
      i = 1,
      formatted = null;

    if (str.indexOf(".") > 0) {
      parts = str.split(".");
      str = parts[0];
    }
    str = str.split("").reverse();
    for (var j = 0, len = str.length; j < len; j++) {
      if (str[j] != ",") {
        output.push(str[j]);
        if (i % 3 == 0 && j < (len - 1)) {
          output.push(",");
        }
        i++;
      }
    }

    formatted = output.reverse().join("");
    if (formatted == "") {
      formatted = 0;
    }

    return (formatted + ((parts) ? "." + parts[1].substr(0, 2) : ".00"));
  };
</script>

<!-- FUNCTION FOR MOUSEOVER / CHANGE BACKGROUND COLOUR TR IN DATATABLE -->
<script>
  var css = 'table tbody tr:hover{ background-color: #f2f2f2 }'; //young grey
  var style = document.createElement('style');

  if (style.styleSheet) {
    style.styleSheet.cssText = css;
  } else {
    style.appendChild(document.createTextNode(css));
  }

  document.getElementsByTagName('head')[0].appendChild(style);
</script>

<!-- TOTAL BUDGET, BALANCE QTY, BALANCE QTY MISSCELNOUS, AND BALANCE VALUE SELECTED -->
<script>
  // TotalBudgetSelected
  function TotalBudgetSelected() {
    var TotalBudgetSelected = 0;
    var total_req_all = $("input[name='total_req[]']").map(function() {
      return $(this).val();
    }).get();

    $.each(total_req_all, function(index, data) {
      if (total_req_all[index] != "" && total_req_all[index] > "0.00" && total_req_all[index] != "NaN.00") {
        TotalBudgetSelected += parseFloat(total_req_all[index].replace(/,/g, ''));
      }
    });
    $('#TotalBudgetSelected').html(currencyTotal(TotalBudgetSelected));
  }

  // TotalBalanceQtySelected
  function TotalBalanceQtySelected(key) {
    var qty_req = $('#qty_req' + key).val().replace(/,/g, '');
    var total_balance_qty2 = $('#total_balance_qty2' + key).html().replace(/,/g, '');
    $('#total_balance_qty' + key).val(currencyTotal(total_balance_qty2 - qty_req));
  }

  // TotalBalanceQtyMisscelnousSelected
  function TotalBalanceQtyMisscelnousSelected(key) {
    var qty_req = $('#qty_req' + key).val().replace(/,/g, '');
    var total_balance_qty2 = $('#total_balance_qty2' + key).html().replace(/,/g, '');

    $('#total_balance_qty' + key).val("-");

  }

  // TotalBalanceValueSelected
  function TotalBalanceValueSelected(key) {
    var total_req = $('#total_req' + key).val().replace(/,/g, '');
    var total_balance_value2 = $('#total_balance_value2' + key).html().replace(/,/g, '');

    $('#total_balance_value' + key).val(currencyTotal(total_balance_value2 - total_req));
  }

  // TotalBudgetSettlementSelected
  function TotalBudgetSettlementSelected() {
    var TotalBudgetSelected = 0;
    var TotalBudgetSelected2 = 0;
    var total_expense = $("input[name='total_expense[]']").map(function() {
      return $(this).val();
    }).get();
    var total_amount = $("input[name='total_amount[]']").map(function() {
      return $(this).val();
    }).get();

    $.each(total_expense, function(index, data) {
      if (total_expense[index] != "" && total_expense[index] > "0.00" && total_expense[index] != "NaN.00") {
        TotalBudgetSelected += parseFloat(total_expense[index].replace(/,/g, ''));
      }
    });
    $.each(total_amount, function(index, data) {
      if (total_amount[index] != "" && total_amount[index] > "0.00" && total_amount[index] != "NaN.00") {
        TotalBudgetSelected2 += parseFloat(total_amount[index].replace(/,/g, ''));
      }
    });

    $('#TotalBudgetSelected').html(currencyTotal(TotalBudgetSelected + TotalBudgetSelected2));
  }

  // TotalBalanceQtySettlementSelected
  function TotalBalanceQtySettlementSelected(key) {
    var qty_expense = $('#qty_expense' + key).val().replace(/,/g, '');
    var qty_amount = $('#qty_amount' + key).val().replace(/,/g, '');

    var total_balance_qty2 = $('#total_balance_qty2' + key).html().replace(/,/g, '');

    $('#total_balance_qty' + key).val(currencyTotal(total_balance_qty2 - qty_expense - qty_amount));

  }
</script>

<!-- VALIDATION FOR INPUT ONLY NUMBER -->
<script type="text/javascript">
  function isNumberKey(txt, evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;

    if (txt.value.length === 0 && charCode == 46) {
      return false;
    } else {
      if (charCode == 46) {
        //Check if the text already contains the . character
        if (txt.value.indexOf('.') === -1) {
          return true;
        } else {
          return false;
        }
      } else {
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
          return false;
        }
      }
    }

    return true;
  }
</script>

<!-- FUNCTION SELECT 2 IN COMBO BOX-->
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>

<!-- FUNCTION SHOW HIDE LOADING NOTIFICATION-->
<script>
  function ShowLoading() {
    $("#loading").show();
    $(".loader").show();
  }

  function HideLoading() {
    $("#loading").hide();
    $(".loader").hide();
  }
</script>

<!-- FUNCTION NOTIFICATION  -->
<script>
  // FUNCTION TOASTR 
  function ToastrFunction() {
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-middle-center",
      "preventDuplicates": false,
      "onclick": null,
      // "showDuration": "1000",
      // "hideDuration": "1000",
      // "timeOut": "5000",
      // "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  }

  // FUNCTION ERROR NOTIFICATION 
  function ErrorNotif(message) {
    ToastrFunction();
    toastr.error(message, {
      timeOut: 2000
    });
  }

  function CancelNotif(message, url) {
    ToastrFunction();

    toastr.error('<br /><span style="background-color:white;" id="confirmationButtonYes"> <span style="padding:10px;color:#DC3545;border-radius:5px;"> Back </span> </span>', message, {
      allowHtml: true,
      timeOut: 5000,
      onShown: function(toast) {
        $("#confirmationButtonYes").click(function() {
          window.location.href = url;
        });
      }
    });

  }
</script>

<!-- FUNCTION VALIDATION MANDATORY -->
<script>
  // MANDATORY LIST 
  function MandatoryListFunction(MandatoryListVar) {
    var count = 0;
    for (var i = 0; i < Object.keys(MandatoryListVar).length; i++) {
      if (MandatoryListVar[Object.keys(MandatoryListVar)[i]] == "") {
        MandatoryFormFunctionTrue("#" + Object.keys(MandatoryListVar)[i], "#" + Object.keys(MandatoryListVar)[i] + "_detail");
        count++;
      }
    }
    return count;
  }

  // VALIDATION IF FORM EMPTY
  function MandatoryFormFunctionTrue(FormIdentity, FormIdentityDetail) {
    $(FormIdentity).focus();
    $(FormIdentity).css("border", "1px solid red");

    $(FormIdentityDetail).focus();
    $(FormIdentityDetail).css("border", "1px solid red");

    $(FormIdentity + "_icon").show();

  }

  // VALIDATION IF FORM INPUTED / SELECTED
  function MandatoryFormFunctionFalse(FormIdentity, FormIdentityDetail) {
    $(FormIdentity).css("border", "1px solid #ced4da");
    $(FormIdentityDetail).css("border", "1px solid #ced4da");
    $(FormIdentity + "_icon").hide();
  }

  // VALIDATION FOR REMARK FORM, CHANGE BORDER AND HIDE ERROR ICON WHEN INPUTED
  $('#remark').keyup(function() {
    $("#remark").css("border", "1px solid #ced4da");
    $("#remark_icon").hide();
  });
</script>

<!-- FUNCTION LOGOUT IN MULTI PAGE -->

<!-- <script>
  setInterval(SessionCheckingLogout, 5000);

  function SessionCheckingLogout() {

    $.ajax({
      type: 'GET',
      url: '{!! route("SessionCheckingLogout") !!}',
      success: function(data) {

        if (data.varAPIWebToken !== true) {
          window.location.reload();
        }

      }
    });
  }
</script> -->

<!-- FUNCTION LOGOUT AFTER 15 MENIT IN MULTI PAGE -->

<!-- <script>
  window.addEventListener('mousedown', SessionCheckingEvent);
  window.addEventListener('mousemove', SessionCheckingEvent);
  window.addEventListener('touchstart', SessionCheckingEvent);
  window.addEventListener('scroll', SessionCheckingEvent);
  window.addEventListener('keydown', SessionCheckingEvent);

  var time = new Date();
  var second = time.getSeconds();
  var current_second = second;

  var angka = 0;

  setInterval(SessionCheckingEvent, 1000);

  function SessionCheckingEvent(evt) {
    var time = new Date();
    var sec = time.getSeconds();

    if (sec == current_second) {
      angka++;
    }

    if (!evt) {
      if (angka === 15) {
        window.location.href = '/logout?message= Session_Expired';
      }
    } else {
      current_second = sec;
      angka = 0;
    }
  }
</script> -->


<script>
  // console.log(type);
  $('#mode').on('change', function() {

    var value = $(this).val();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'GET',
      url: '{!! route("ColorMode") !!}?value=' + value,
      success: function(data) {
        location.reload();
      }
    });
  });
</script>

<script>
  // Example Output: 1 Januari 2024
  function formatDate(dateString) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const date = new Date(dateString);
    return date.toLocaleDateString('id-ID', options);
  }
</script>

<script>
  $(function () {
    $("#DefaultFeatures").DataTable({
      "responsive": true,
      "autoWidth": false,
      dom: '<"top"f>rt<"bottom"ip><"clear">',
      scrollX: true,
      lengthChange: true,
      pageLength: 10,
      dom: '<"top"l>rt<"bottom"ip><"clear">',
      searching: true,
      dom: 'lfrtip'
    });
  });
  
  $(function () {
    $(".DefaultFeatures").DataTable({
      "responsive": true,
      "autoWidth": false,
      
    });
  });
</script>

<script>
  function allowNumbersWithoutCharacter(inputElement) {
    inputElement.addEventListener('input', function(e) {
      let value = this.value.replace(/[^0-9]/g, '');
      
      this.value = value;
  });
  }

  document.querySelectorAll('.number-without-characters').forEach(function(input) {
    allowNumbersWithoutCharacter(input);
  });

  function allowNumbersOnly(inputElement) {
    inputElement.addEventListener('input', function(e) {
      let value = this.value
        .replace(/(?!^-)[^0-9.]/g, '')
        .replace(/^-{2,}/g, '-')
        .replace(/^(-?\d*\.?\d{0,2}).*$/, '$1');

      if (value.includes('.')) {
        let [integerPart, decimalPart] = value.split('.');
        integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        this.value = `${integerPart}.${decimalPart}`;
      } else {
        this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      }
    });
  }

  document.querySelectorAll('.number-only').forEach(function(input) {
    allowNumbersOnly(input);
  });

  function allowNumbersWithoutNegative(inputElement) {
    inputElement.addEventListener('input', function () {
      let value = this.value;

      value = value.replace(/[^0-9.]/g, '');

      const firstDotIndex = value.indexOf('.');
      if (firstDotIndex !== -1) {
        value = value.slice(0, firstDotIndex + 1) + value.slice(firstDotIndex + 1).replace(/\./g, '');
      }

      const parts = value.split('.');

      parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');

      if (parts[1]) {
        parts[1] = parts[1].substring(0, 2);
      }

      this.value = parts.join('.');
    });
  }

  // function allowNumbersWithoutNegative(inputElement) {
  //   inputElement.addEventListener('input', function(e) {
  //     let value = this.value.replace(/[^0-9.]/g, '');
  //     const parts = value.split('.');

  //     if (parts.length > 2) {
  //       value = parts[0] + '.' + parts[1];
  //     }

  //     if (parts[1]) {
  //       parts[1] = parts[1].substring(0, 2);
  //     }

  //     parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
  //     this.value = parts.join('.');
  //   });
  // }

  document.querySelectorAll('.number-without-negative').forEach(function(input) {
    allowNumbersWithoutNegative(input);
  });
</script>

<script>
  // OUTPUT 412393 = 412,393.00
  function numberFormatPHPCustom(number, decimals = 0, decPoint = '.', thousandsSep = ',') {
    const n = Math.abs(number).toFixed(decimals);
    const sign = number < 0 ? '-' : '';

    let [integerPart, decimalPart] = n.split('.');
    integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, thousandsSep);

    return sign + integerPart + (decimalPart ? decPoint + decimalPart : '');
  }

  // OUTPUT 412,393.00 = 412393
  function cleanNumber(number) {
    var numberWithoutComma = number.replace(/,/g, '');
    
    var result = numberWithoutComma.split('.')[0];
    
    return result;
  }
</script>

<!-- DIGUNAKAN PADA HALAMAN MODIFY BUDGET -->
<script>
  function isProductIdDuplicate(productId, currentRowIndex) {
    let isDuplicate = false;
    const tableRows = document.querySelectorAll('#budgetTable tbody tr');
    
    tableRows.forEach((row, index) => {
      if (index !== currentRowIndex) { // Skip checking against self
        const existingProductId = row.querySelector('[id^="product_id"]').value;
        const existingProductIdTd = row.querySelector('td:nth-child(2)')?.textContent;
        
        if (existingProductId === productId || existingProductIdTd === productId) {
          isDuplicate = true;
        }
      }
    });
    
    return isDuplicate;
  }
</script>

<!-- FUNGSI UNTUK MENENTUKAN WIDTH/LEBAR KOMPONEN INPUT -->
<script>
  function defineDefaultValue(length, type) {
    if (type == "string") {
      if (length <= 2) {
        return 0.8;
      } else if (length <= 4) {
        return 1;
      } else if (length <= 6) {
        return 1.2;
      } else if (length <= 8) {
        return 1.4;
      } else if (length <= 10) {
        return 1.6;
      } else if (length <= 13) {
        return 1.8;
      } else if (length <= 15) {
        return 2;
      } else if (length <= 17) {
        return 2.2;
      } else if (length <= 19) {
        return 2.4;
      } else if (length <= 21) {
        return 2.6;
      } else if (length <= 23) {
        return 2.8;
      } else if (length <= 25) {
        return 3;
      } else if (length <= 27) {
        return 3.2;
      } else if (length <= 29) {
        return 3.4;
      } else if (length <= 31) {
        return 3.6;
      } else if (length <= 33) {
        return 3.8;
      }
    } else {
      if (length <= 2) {
        return 0.7;
      } else if (length <= 4) {
        return 0.9;
      } else if (length <= 6) {
        return 1.1;
      } else if (length <= 8) {
        return 1.3;
      } else if (length <= 10) {
        return 1.5;
      } else if (length <= 13) {
        return 1.7;
      } else if (length <= 15) {
        return 1.9;
      } else if (length <= 17) {
        return 2.1;
      } else if (length <= 19) {
        return 2.3;
      }
    }

    // NOTE
    // Jika validasi length ditambah 2, maka return ditambah 0.2. Misal, jika length <= 21 maka return 2.5 dan jika length <= 23 maka return 2.7, dan seterusnya.
  }

  function adjustInputSize(componentInput, valueType, customValueLength) {
    var componentLenghtInput = componentInput.value.length;
    
    var defaultValue = defineDefaultValue(componentLenghtInput, valueType);
    defaultValue = defaultValue < 1 ? 1 : defaultValue;

    var fixDefaultValue = customValueLength ? customValueLength : defaultValue;

    componentInput.size = componentLenghtInput * fixDefaultValue;
  }
</script>

<!-- FUNGSI UNTUK MENGAKTIFKAN/ENABLE KOMPONEN BOOTSTRAP -->
<script>
  $(function () {
    // POPOVER
    $('[data-toggle="popover"]').popover()
  });
</script>