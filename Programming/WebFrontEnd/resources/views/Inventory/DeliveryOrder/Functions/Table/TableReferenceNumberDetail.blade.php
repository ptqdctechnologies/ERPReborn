<!-- BODY -->
<div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
    <table class="table table-head-fixed text-nowrap table-sm" id="table_reference_type_detail">
        <thead>
            <!-- PURCHASE ORDER -->
            <tr class="thead-purchase-order" style="display: none;">
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">PO Number</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Sub Budget</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty PO</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;background: #4B586A; color: white;">Qty Req</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;background: #4B586A; color: white;">Balance</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;background: #4B586A; color: white;">Note</th>
            </tr>

            <!-- INTERNAL USE -->
            <tr class="thead-internal-use" style="display: none;">
                <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Sub Budget Code</th>
                <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Product Code</th>
                <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Product Name</th>
                <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">UOM</th>
                <th colspan="4" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Budget</th>
                <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Stok</th>
                <th rowspan="2" class="sticky-col third-col-arf" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle; background: #4B586A; color: white;">Qty Req</th>
                <th rowspan="2" class="sticky-col second-col-arf" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle; background: #4B586A; color: white;">Balance</th>
                <th rowspan="2" class="sticky-col first-col-arf" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle; background: #4B586A; color: white;">Note</th>
            </tr>
            <tr class="thead-internal-use" style="display: none;">
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; padding-right: 0re !important;">Total</th>
            </tr>

            <!-- STOCK MOVEMENT -->
            <tr class="thead-stock-movement" style="display: none;">
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Stok</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;background: #4B586A; color: white;">Qty Req</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;background: #4B586A; color: white;">Balance</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;background: #4B586A; color: white;">Note</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr id="loading-purchase-order" style="display: none;">
                <td colspan="10" class="p-0" style="border: 0px; height: 150px;">
                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                            Loading...
                        </div>
                    </div>
                </td>
            </tr>

            <tr id="message-container-purchase-order" style="display: none;">
                <td colspan="10" class="p-0" style="border: 0px;">
                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                        <div id="message-purchase-order" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                    </div>
                </td>
            </tr>

            <tr id="loading-internal-use" style="display: none;">
                <td colspan="14" class="p-0" style="border: 0px; height: 150px;">
                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                            Loading...
                        </div>
                    </div>
                </td>
            </tr>

            <tr id="message-container-internal-use" style="display: none;">
                <td colspan="14" class="p-0" style="border: 0px;">
                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                        <div id="message-internal-use" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                    </div>
                </td>
            </tr>

            <tr id="loading-stock-movement" style="display: none;">
                <td colspan="11" class="p-0" style="border: 0px; height: 150px;">
                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                            Loading...
                        </div>
                    </div>
                </td>
            </tr>

            <tr id="message-container-stock-movement" style="display: none;">
                <td colspan="11" class="p-0" style="border: 0px;">
                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                        <div id="message-stock-movement" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<!-- FOOTER -->
<div class="card-body tableShowHideBudget">
    <div class="row">
        <div class="col">
            <div class="text-red" id="delivery_order_details_message" style="display: none;">
                Please input at least one item.
            </div>
        </div>
        <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
            Total : <span id="total_reference_number">0.00</span>
        </div>
    </div>
</div>