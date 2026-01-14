<!-- BODY -->
<div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
    <table class="table table-head-fixed text-nowrap table-sm" id="journal_settlement_table">
        <thead>
            <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Action</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Budget</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Sub Budget</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">COA</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">COA Status</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Value</th>
            </tr>
        </thead>
        <tbody id="journal_settlement_body_table"></tbody>
        <tfoot>
            <tr id="journal_settlement_loading_table" style="display: none;">
                <td colspan="6" class="p-0" style="border: 0px; height: 150px;">
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
<div class="card-body tableShowHideBudget">
    <div class="row">
        <div class="col">
            <div class="text-red" id="budgetDetailsMessage" style="display: none;">
                Please input at least one item.
            </div>
        </div>
        <div class="col" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
            <div class="text-right">
                Total: <span id="total_settlement_table">0.00</span>
            </div>
            <div class="text-right" style="margin-top: 5px;">
                Total Settlement: <span id="total_settlement">0.00</span>
            </div>
        </div>
    </div>
</div>