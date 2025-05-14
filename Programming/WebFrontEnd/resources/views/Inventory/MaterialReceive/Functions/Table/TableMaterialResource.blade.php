<!-- BODY -->
<div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
    <table class="table table-head-fixed text-nowrap table-sm" id="tableMaterialReceiveDetail">
        <thead>
            <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Transaction Number</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty DO</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Available</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty Req</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;padding-right: 0;">Note</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr class="loadingMaterialReceiveDetail">
                <td colspan="8" class="p-0" style="border: 0px; height: 150px;">
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
            <tr class="errorMessageContainerMaterialReceiveDetail">
                <td colspan="8" class="p-0" style="border: 0px;">
                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                        <div id="errorMessageMaterialReceiveDetail" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<!-- FOOTER -->
<div class="card-body tableShowHideDetail">
    <table style="float:right;">
        <tr>
            <th style="position: relative;right:20px;"> Total : <span id="TotalDeliveryOrder">0.00</span></th>
        </tr>
        <tr>
            <td>
                <br>
                <a class="btn btn-default btn-sm float-right" id="material-receive-details-add" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Material Receive List"> Add
                </a>
            </td>
        </tr>
    </table>
</div>