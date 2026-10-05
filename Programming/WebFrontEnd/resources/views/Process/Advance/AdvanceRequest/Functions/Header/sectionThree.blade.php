<!-- BODY -->
<div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
    <table class="table table-head-fixed text-nowrap table-sm" id="budget_details_table">
        <thead>
            <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Work
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Product
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Qty Budget
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Qty Avail
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    UOM
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Price
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Total Budget
                </th>
                <th
                    style="display: <?= isset($advance_id) ? 'table-cell' : 'none'; ?>;padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    ASF Value
                </th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Currency
                </th>
                <th class="sticky-col forth-col-arf"
                    style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">
                    Qty Req
                </th>
                <th class="sticky-col third-col-arf"
                    style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">
                    Price Req
                </th>
                <th class="sticky-col second-col-arf"
                    style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">
                    Total Req
                </th>
                <th class="sticky-col first-col-arf"
                    style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;padding-right:.3rem;">
                    Balance Qty
                </th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr id="budget_details_loading_table" style="display: none;">
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
            <tr id="budget_details_message_container_table" style="display: none;">
                <td colspan="11" class="p-0" style="border: 0px;">
                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                        <div id="budget_details_message_table" class="mt-3 text-red"
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
        <div class="col" id="budget_details_message" style="display: none;">
            <div class="text-red" id="budget_details_message_text"></div>
        </div>
        <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
            Total : <span id="budget_total">0.00</span>
        </div>
    </div>
</div>