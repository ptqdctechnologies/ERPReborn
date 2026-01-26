<!-- Modal -->
<div class="modal fade" id="journalSettlementModal" tabindex="-1" aria-labelledby="journalSettlementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-bold" id="journalSettlementModalLabel">
                    Detail Transaction
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 1rem;">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <!-- BUDGET CODE -->
                            <div class="row" style="margin-bottom: 1rem;">
                                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                                    Budget Code
                                </div>
                                <div id="detail_budget_information" class="col">
                                    : -
                                </div>
                            </div>

                            <!-- SUB BUDGET CODE -->
                            <div class="row" style="margin-bottom: 1rem;">
                                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                                    Sub Budget Code
                                </div>
                                <div id="detail_sub_budget_information" class="col">
                                    : -
                                </div>
                            </div>
                            
                            <!-- FILE ATTACHMENT -->
                            <div class="row">
                                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                                    File Attachment
                                </div>
                                <div id="detail_attachment_information" class="col">
                                    : 
                                    <input type="text" id="dataInput_Log_FileUpload" name="dataInput_Log_FileUpload_1" style="display:none">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-4">
                        <div class="form-group">
                            <!-- BENEFICIARY -->
                            <div class="row" style="margin-bottom: 1rem;">
                                <div class="col-4 text-bold">
                                    Beneficiary
                                </div>
                                <div id="detail_beneficiary_information" class="col">
                                    : -
                                </div>
                            </div>

                            <!-- BANK -->
                            <div class="row">
                                <div class="col-4 text-bold">
                                    Bank
                                </div>
                                <div id="detail_bank_information" class="col">
                                    : -
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-responsive table-head-fixed text-nowrap mb-0" id="detail_transaction_table">
                            <thead>
                                <tr>
                                    <th rowspan="3" style="padding:.70rem;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;text-align:center;">NO</th>
                                    <th rowspan="3" style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">PRODUCT CODE</th>
                                    <th rowspan="3" style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">PRODUCT NAME</th>
                                    <th rowspan="3" style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">UOM</th>
                                    <th rowspan="3" style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">CURRENCY</th>
                                    <th colspan="3" rowspan="2" style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">REQUEST</th>
                                    <th colspan="6" style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">SETTLEMENT</th>
                                    <th rowspan="3" style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">BALANCE</th>
                                </tr>
                                <tr>
                                    <th colspan="3" style="padding:.70rem;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">
                                        EXPENSE CLAIM
                                    </th>
                                    <th colspan="3" style="padding:.70rem;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">
                                        AMOUNT TO THE COMPANY
                                    </th>
                                </tr>
                                <tr>
                                    <th style="padding:.70rem;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">QTY</th>
                                    <th style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">PRICE</th>
                                    <th style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">TOTAL</th>
                                    <th style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">QTY</th>
                                    <th style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">PRICE</th>
                                    <th style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">TOTAL</th>
                                    <th style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">QTY</th>
                                    <th style="border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">PRICE</th>
                                    <th style="padding:.70rem;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>