<div class="col-md-12" style="padding-bottom: 10px;">
    <div class="col-md-2">
        <b>Amount:</b>
    </div>
    <div class="col-md-2">
        <input type="text" value="0" class="form-control ChangeAmount">
    </div>
</div>
<div class="col-md-12" style="padding-bottom: 10px;">
    <div class="col-md-2">
        <b>Total Amount:</b>
    </div>
    <div class="col-md-2">
        <input type="text" readonly="" id="totalamount1" value="20" class="form-control" />
    </div>
</div>

<div class="col-md-12" style="padding-bottom: 10px;">
    <div class="col-md-2">
        <b>Total Paid:</b>
    </div>
    <div class="col-md-2">
        <input type="text" value="0" readonly="" class="form-control tpaid" />
    </div>
</div>
<div class="col-md-12" style="padding-bottom: 10px;">
    <div class="col-md-2">
        <b>Balance:</b>
    </div>
    <div class="col-md-2">
        <input type="text" readonly="" value="20" class="form-control BalanceAmount" />
        <input type="hidden" id="returned_change" name="returned_change" value="0" />
    </div>
</div>

<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {
            var qtyReq = $(this).val();
            if (qtyReq == 0 || qtyReq == '') {
                qtyReq = 0;
            }
            var putQty = parseFloat($('#putQty').val());
            if(qtyReq > putQty){
                alert("over budget");
            }

            // var balance = parseFloat(balance1) - parseFloat(total_paid);
            // var balance = parseFloat(balance).toFixed(2);
            // $('.BalanceAmount').val(balance);

        });
    });
</script>