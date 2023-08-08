<footer class="main-footer">
  <strong>Copyright &copy; 2020 - </strong> PT Qdc Technologies
</footer>

<!-- FUNCTION FOR FILE UPLOAD -->
<script>
  window.onload = function() {
    document.getElementById("dataInput_Log_FileUpload_Pointer_RefID_Action").dispatchEvent(new Event("change"));
  }
</script>

<!-- TIME FUNCTION -->
<!-- <script>
  setInterval(customClock, 500);

  function customClock() {
    var time = new Date();
    var date = time.getDate();
    var year = time.getFullYear();
    var hrs = time.getHours();
    var min = time.getMinutes();
    var sec = time.getSeconds();
    var ampm = (time.getHours() >= 12) ? "PM" : "AM";

    var dow = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
    var month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    document.getElementById('clock').innerHTML = dow[time.getDay()] + ", " + date + " " + month[time.getMonth()] + " " + year + "  " + hrs + ":" + min + ":" + sec + " " + ampm;
  }
</script> -->

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

<!-- FUNCTION SELECT 2 -->

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

<!-- FUNCTION SHOW HIDE -->

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
<!-- 
<script>
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