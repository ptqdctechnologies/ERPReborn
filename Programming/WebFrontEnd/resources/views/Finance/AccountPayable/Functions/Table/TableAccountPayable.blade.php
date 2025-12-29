<!-- BODY -->
<div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
    <table class="table table-head-fixed text-nowrap table-sm" id="invoice_details_table">
        <thead>
            <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty PO</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price PO</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total PO</th>
                <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 125px;">Qty AP</th>
                <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 125px;">Total AP</th>
                <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 125px;">WHT (%)</th>
                <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 70px;">Asset</th>
                <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 100px;padding-right: 0 !important;">COA</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr id="invoice_loading_table" style="display: none;">
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
        </tfoot>
    </table>
</div>

<!-- FOOTER -->
<div class="card-body">
    <div class="row">
        <div class="col">
            <div class="row text-red" id="invoice_details_message" style="display: none; margin-bottom: 1rem;">
                Please input at least one item.
            </div>
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">Deduction</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group">
                            <input id="budget_details_deduction" name="budget_details_deduction" class="form-control number-without-negative" value="<?= isset($header) ? number_format($header['deduction'], 2, '.', ',') : ''; ?>" autocomplete="off" style="border-radius:0;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="budget_details_deduction_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Deduction cannot be empty.
                    </div>
                </div>
            </div>
        </div>
        <div class="col" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
            <div id="invoice_details_total" class="col text-right" style="margin-bottom: 0.6rem;">
                Total Tax Based: 0.00
            </div>
            <div id="invoice_details_total_vat" class="col text-right" style="margin-bottom: 0.6rem;">
                Total VAT: 0.00
            </div>
            <div id="invoice_details_total_wht" class="col text-right" style="margin-bottom: 0.6rem;">
                Total WHT: 0.00
            </div>
            <div id="invoice_details_total_deduction" class="col text-right" style="margin-bottom: 0.6rem;">
                Total Deduction: 0.00
            </div>
        </div>
    </div>
    
    <hr class="m-0" />
    
    <div class="row">
        <div class="col"></div>
        <div class="col" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
            <div id="invoice_details_grand_total" class="col text-right" style="margin-top: 0.6rem;">
                Grand Total: 0.00
            </div>
        </div>
    </div>
</div>