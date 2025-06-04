<!-- BODY -->
<div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
    <table class="table table-head-fixed text-nowrap table-sm" id="tableDeliverOrderDetailList">
        <thead>
            <tr class="thead-purchase-order" style="display: none;">
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Reference Number</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Req</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Balance</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Note</th>
            </tr>
            <tr class="thead-internal-use" style="display: none;">
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Req</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Balance</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Note</th>
            </tr>
            <tr class="thead-stock-movement" style="display: none;">
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Req</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Balance</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Note</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<!-- FOOTER -->
<div class="card-body tableShowHideBudget">
    <table style="float:right;">
        <tr>
            <th style="position: relative;right:20px;"> Total : <span id="GrandTotal">0.00</span></th>
        </tr>
        <tr>
            <td>
                <br>
                <a class="btn btn-default btn-sm float-right" id="reference-number-details-reset" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Add to Advance List"> Reset
                </a>
            </td>
        </tr>
    </table>
</div>