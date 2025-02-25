<script>
    var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
    var dataAdvance = $.parseJSON('<?= json_encode($dataAdvanceList) ?>');
    var totalDataAdvance = 0;
    var var_product_id = [];
    var var_product_name = [];
    var var_quantity = [];
    var var_uom = [];
    var var_qty_id = [];
    var var_currency_id = [];
    var var_price = [];
    var var_total = [];
    var var_currency = [];
    var var_combinedBudgetSectionDetail_RefID = [];

    $("#var_date").val(date);

    function budgetDetailsTable() {
        dataAdvance.forEach((datas, key) => {
            totalDataAdvance += +(datas.PriceBaseCurrencyValue);

            var_product_id.push(datas.Product_RefID);
            var_product_name.push(datas.ProductName);
            var_quantity.push(datas.Quantity);
            var_uom.push(datas.QuantityUnitName);
            var_qty_id.push(datas.QuantityUnit_RefID);
            var_currency_id.push(datas.ProductUnitPriceCurrency_RefID);
            var_price.push(datas.ProductUnitPriceBaseCurrencyValue);
            var_total.push(datas.PriceBaseCurrencyValue);
            var_currency.push(datas.ProductUnitPriceCurrencyISOCode);
            var_combinedBudgetSectionDetail_RefID.push(datas.CombinedBudgetSectionDetail_RefID);

            var html =
                '<tr>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + datas.Product_RefID + '</td>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + datas.ProductName + '</td>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + datas.QuantityUnitName + '</td>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + datas.ProductUnitPriceCurrencyISOCode + '</td>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + datas.ProductUnitPriceBaseCurrencyValue + '</td>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + datas.Quantity + '</td>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + datas.PriceBaseCurrencyValue + '</td>' +
                '</tr>';

            $('#tableAdvanceList tbody').append(html);
            
            $("#TotalBudgetSelected").html(currencyTotal(totalDataAdvance));
            $("#GrandTotal").html(currencyTotal(totalDataAdvance));
        });

        document.getElementById('var_product_id').value                         = JSON.stringify(var_product_id);
        document.getElementById('var_product_name').value                       = JSON.stringify(var_product_name);
        document.getElementById('var_quantity').value                           = JSON.stringify(var_quantity);
        document.getElementById('var_uom').value                                = JSON.stringify(var_uom);
        document.getElementById('var_qty_id').value                             = JSON.stringify(var_qty_id);
        document.getElementById('var_currency_id').value                        = JSON.stringify(var_currency_id);
        document.getElementById('var_price').value                              = JSON.stringify(var_price);
        document.getElementById('var_total').value                              = JSON.stringify(var_total);
        document.getElementById('var_currency').value                           = JSON.stringify(var_currency);
        document.getElementById('var_combinedBudgetSectionDetail_RefID').value  = JSON.stringify(var_combinedBudgetSectionDetail_RefID);
    }

    function CancelAdvance() {
        ShowLoading();
        window.location.href = '/AdvanceRequest?var=1';
    }

    $(window).one('load', function(e) {
        budgetDetailsTable();
    });
</script>