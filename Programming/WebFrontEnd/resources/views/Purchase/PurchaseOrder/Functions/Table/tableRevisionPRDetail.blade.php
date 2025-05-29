<div class="wrapper-budget card-body table-responsive p-0"  style="height: 230px;">
    <table class="table table-head-fixed text-nowrap table-striped" id="tablePurchaseOrderDetail">
        <thead>
            <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">PR Number</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Code</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty PR</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty Available</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">UOM</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Unit Price</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Total</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Currency</th>
                <th class="sticky-col fifth-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Qty Req</th>
                <th class="sticky-col forth-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Price Req</th>
                <th class="sticky-col third-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Total Req</th>
                <th class="sticky-col second-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Balance</th>
                <th class="sticky-col first-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Remark</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr class="loadingPurchaseOrderTable">
                <td colspan="15" class="p-0" style="height: 12.3rem;">
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
            <tr class="errorPurchaseOrderTable">
                <td colspan="15" class="p-0" style="height: 12.3rem;">
                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                        <div id="errorPurchaseOrderMessageTable" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;">Error</div>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <table>
                    <tr>
                        <td><label>PPN</label></td>
                        <td style="border:1px solid #e9ecef;">
                            <select name="ppn" id="ppn" style="border-radius:0;" type="text" class="form-control">
                                <option value="No">No</option>
                                <option <?= $header['isVATSelected']; ?> value="Yes">Yes</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6" id="containerValuePPN">
            <div class="form-group">
                <table>
                    <tr>
                        <td><label>PPN(%)</label></td>
                        <td id="containerLoadingPPN">
                            <div class="d-flex flex-column justify-content-center py-3">
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </td>
                        
                        <td id="containerSelectPPN" style="border:1px solid #e9ecef;">
                            <input hidden id="vatOptionValue" style="width: 20%;" value="<?= $header['vatValue']; ?>" />
                            <select name="vatValue" id="vatOption" style="border-radius:0;" class="form-control" onChange="calculateTotal();">
                                <option disabled selected>Select a PPN</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card-body tableShowHidePRDetail" >
    <table style="float:right;">
        <tr>
            <th style="position: relative;right:20px;"> Total Request: <span id="TotalBudgetSelected">0.00</span></th>
        </tr>
        <tr>
            <th style="position: relative;right:20px;"> PPN: <span id="TotalPpn">0.00</span></th>
        </tr>
        <tr>
            <th style="position: relative;right:20px;"> Total Request + PPN: <span id="TotalBudgetSelectedPpn">0.00</span></th>
        </tr>
        <tr>
            <td>
                <br>
                <a id="purchase-details-add" class="btn btn-default btn-sm float-right" id="addFromDetailtoCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Purchase List"> Add
                </a>
                {{-- <a id="purchase-details-reset" class="btn btn-default btn-sm float-right" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Add to Advance List"> Reset
                </a> --}}
            </td>
        </tr>
    </table>
</div>