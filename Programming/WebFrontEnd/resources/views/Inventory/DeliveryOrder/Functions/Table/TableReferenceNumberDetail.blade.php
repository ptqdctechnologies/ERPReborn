<!-- BODY -->
<div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
    <table class="table table-head-fixed text-nowrap table-sm" id="tableReferenceNumberDetail">
        <thead>
            <!-- PURCHASE ORDER -->
            <tr class="thead-purchase-order" style="display: none;">
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Reference Number</th>
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
                <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Product Code</th>
                <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">Product Name</th>
                <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;">UOM</th>
                <th colspan="4" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Budget</th>
                <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Stok</th>
                <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle; background: #4B586A; color: white;">Qty Req</th>
                <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle; background: #4B586A; color: white;">Balance</th>
                <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle; background: #4B586A; color: white;">Note</th>
            </tr>
            <tr class="thead-internal-use" style="display: none;">
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Available</th>
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
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Req</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Balance</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Note</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr class="loadingReferenceNumberDetail">
                <td colspan="9" class="p-0" style="border: 0px; height: 150px;">
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
            <tr class="errorMessageContainerReferenceNumberDetail">
                <td colspan="9" class="p-0" style="border: 0px;">
                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                    <div id="errorMessageReferenceNumberDetail" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<!-- FOOTER -->
<div class="card-body tableShowHideBudget">
    <table style="float:right;">
        <tr>
            <th style="position: relative;right:20px;"> Total : <span id="TotalReferenceNumber">0.00</span></th>
        </tr>
        <tr>
            <td>
                <br>
                <a class="btn btn-default btn-sm float-right" id="reference-number-details-add" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                </a>
                {{-- <a class="btn btn-default btn-sm float-right" id="reference-number-details-reset" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Add to Advance List"> Reset
                </a> --}}
            </td>
        </tr>
    </table>
</div>