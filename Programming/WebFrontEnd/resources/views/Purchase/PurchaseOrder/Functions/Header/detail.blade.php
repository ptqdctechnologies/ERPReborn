<div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
    <table class="table table-head-fixed text-nowrap table-sm" id="purchase_order_details_table">
        <thead>
            <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    PR Number
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Work
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Sub Budget
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Product
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Qty PR
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Qty Avail
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    UoM
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Unit Price
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Total
                </th>
                <th id="ap_value_field"
                    style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; display: none;">
                    AP Value
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Currency
                </th>
                <th id="eighth-col-po-cont" class="sticky-col eighth-col-po"
                    style="padding-top: 10px; padding-bottom: 10px; text-align: center; background-color: #4B586A; color: #FFF; display: none;">
                </th>
                <th id="seventh-col-po-cont" class="sticky-col seventh-col-po"
                    style="padding-top: 10px; padding-bottom: 10px; text-align: center; background-color: #4B586A; color: #FFF; display: none;">
                </th>
                <th id="sixth-col-po-cont" class="sticky-col sixth-col-po"
                    style="padding-top: 10px; padding-bottom: 10px; text-align: center; background-color: #4B586A; color: #FFF; display: none;">
                </th>
                <th id="fifth-col-po-cont" class="sticky-col fifth-col-po"
                    style="padding-top: 10px; padding-bottom: 10px; text-align: center; background-color: #4B586A; color: #FFF; display: none;">
                </th>
                <th id="forth-col-po-cont" class="sticky-col forth-col-po"
                    style="padding-top: 10px; padding-bottom: 10px; text-align: center; background-color: #4B586A; color: #FFF;">
                    Qty Req
                </th>
                <th class="sticky-col third-col-po"
                    style="padding-top: 10px; padding-bottom: 10px; text-align: center; background-color: #4B586A; color: #FFF;">
                    Balance Qty
                </th>
                <th class="sticky-col second-col-po"
                    style="padding-top: 10px; padding-bottom: 10px; text-align: center; background-color: #4B586A; color: #FFF;">
                    Asset
                </th>
                <th class="sticky-col first-col-po"
                    style="padding-top: 10px; padding-bottom: 10px; text-align: center; background-color: #4B586A; color: #FFF; padding-right: inherit;">
                    Note
                </th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr id="purchase_order_details_loading_table" style="display: none;">
                <td colspan="18" class="p-0" style="border: 0px; height: 150px;">
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
            <tr id="purchase_order_details_message_container_table" style="display: none;">
                <td colspan="18" class="p-0" style="border: 0px;">
                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                        <div id="purchase_order_details_message_table" class="mt-3 text-red"
                            style="font-size: 1rem; font-weight: 700;"></div>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<!-- FOOTER -->
<div class="card-body">
    <div class="row">
        <div class="col">
            <div class="row" id="purchase_order_details_message" style="display: none;">
                <div class="text-red" id="purchase_order_details_message_text"></div>
            </div>
            <div class="row" style="margin-top: .5rem; margin-bottom: .5rem;">
                <div class="d-flex" style="gap: 1rem;">
                    <label style="margin: auto;">VAT</label>
                    <div>
                        <select name="ppn_value" id="ppn_option" style="border-radius:0;width:auto;" type="text"
                            class="form-control" onchange="vatHandler(this)">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="ppn_percentage_container" class="row" style="display: none;">
                <div class="d-flex" style="gap: 1rem;">
                    <label style="margin: auto;">VAT (%)</label>
                    <div>
                        <select name="ppn_percentage_value" id="ppn_percentage_option"
                            style="border-radius:0;width:auto;" type="text" class="form-control"
                            onchange="vatPercentageHandler(this)">
                            <option>Select a VAT</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col" style="display: flex; flex-direction: column; align-items: flex-end; gap: .5rem;">
            <div class="row" style="margin-right: 0; font-size: 0.77rem; color: #212529; font-weight: 600;">
                Total Request : <span id="purchase_order_total_request" class="ml-1">0.00</span>
            </div>
            <div class="row" style="margin-right: 0; font-size: 0.77rem; color: #212529; font-weight: 600;">
                VAT : <span id="purchase_order_total_vat" class="ml-1">0.00</span>
            </div>
            <div class="row" style="margin-right: 0; font-size: 0.77rem; color: #212529; font-weight: 600;">
                Total Request + VAT : <span id="purchase_order_total_request_vat" class="ml-1">0.00</span>
            </div>
        </div>
    </div>
</div>