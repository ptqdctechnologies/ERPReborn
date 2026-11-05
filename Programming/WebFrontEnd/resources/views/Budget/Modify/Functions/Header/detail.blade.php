<!-- BODY -->
<div class="card-body table-responsive p-0" style="height: 230px;">
    <table class="table table-head-fixed text-nowrap table-sm" id="budget_details_table">
        <thead>
            <tr>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Action
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Work
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Product
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Qty Budget
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Qty Avail
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Price
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Currency
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Balance Budget
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Total Budget
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Qty (+/-)
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Price
                </th>
                <th
                    style="padding-top: 10px; padding-bottom: 10px; border-right:1px solid #e9ecef; text-align: center;">
                    Total
                </th>
            </tr>
        </thead>
        <tbody id="budget_details_tbody_table"></tbody>
        <tfoot>
            <tr id="budget_details_loading_table" style="display: none;">
                <td colspan="12" class="p-0" style="border: 0px; height: 150px;">
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
                <td colspan="12" class="p-0" style="border: 0px;">
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
        <div class="col">
            <div class="row" id="budget_details_message" style="margin-bottom: 1rem; display: none;">
                <div class="text-red" id="budget_details_message_text"></div>
            </div>
            <button type="button" id="new_item_toggle" class="row btn btn-default btn-sm d-none"
                onclick="newItemHandler()" style="margin-bottom: 1rem;">
                Add New Item
            </button>
            <div id="new_item_form" class="row d-none">
                <div class="col-lg-8" style="display: grid; gap: 1rem;">
                    <!-- PRODUCT -->
                    <span>
                        @include('Components.product')
                    </span>

                    <span>
                        <!-- CONTENT -->
                        <div class="row">
                            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                Qty (+/-)
                            </label>
                            <div class="col-5 d-flex">
                                <div style="flex: 100%;">
                                    <div class="input-group">
                                        <input type="text" id="new_qty" autocomplete="off"
                                            class="form-control number-only" style="border-radius:0;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </span>

                    <span>
                        <!-- CONTENT -->
                        <div class="row">
                            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                Price
                            </label>
                            <div class="col-5 d-flex">
                                <div style="flex: 100%;">
                                    <div class="input-group">
                                        <input type="text" id="new_price" autocomplete="off"
                                            class="form-control number-only" style="border-radius:0;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </span>

                    <span>
                        <!-- CONTENT -->
                        <div class="row">
                            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                Total
                            </label>
                            <div class="col-5 d-flex">
                                <div style="flex: 100%;">
                                    <div class="input-group">
                                        <input type="text" id="new_total" autocomplete="off"
                                            class="form-control number-only" style="border-radius:0;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </span>

                    <span>
                        <!-- CONTENT -->
                        <div class="row">
                            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                            <div class="col-5 text-right">
                                <button type="button" class="btn btn-default btn-sm">
                                    Add
                                </button>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        </div>
        <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
            <div>
                Grand Total Qty : <span id="budget_qty_total">0.00</span>
            </div>
            <div style="margin: .5rem 0;">
                Grand Total Price : <span id="budget_price_total">0.00</span>
            </div>
            <div>
                Grand Total : <span id="budget_total">0.00</span>
            </div>
        </div>
    </div>
</div>