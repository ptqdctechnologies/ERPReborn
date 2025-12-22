<!-- BODY -->
<div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
    <table class="table table-head-fixed text-nowrap table-sm" id="journal_details_table">
        <thead>
            <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Action</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Ref Number</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">DB/CR</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Budget</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Value</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Unpaid</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Payment</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Balance</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">From/To</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">COA Code</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;padding-right: 4px;">Attachment</th>
            </tr>
        </thead>
        <tbody id="journal_details_table_body"></tbody>
    </table>
</div>

<!-- FOOTER -->
<div class="card-body">
    <div class="row">
        <div class="col">
            <div class="text-red" id="journal_details_table_message" style="display: none;">
                Please input at least one item.
            </div>
        </div>
        <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
            Total : <span id="journal_details_table_total">0.00</span>
        </div>
    </div>
</div>

<!-- PREVIEW MODAL OPSIONAL -->
<div class="modal fade" id="previewModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-3 text-center">
            <img id="previewImage" src="" alt="Preview">
        </div>
    </div>
</div>