<div class="card-body">
    <div class="row justify-content-between" style="margin: 1rem 0rem;">
        <div class="col"></div>
        <div class="col d-flex align-items-center justify-content-end" style="gap: .5rem;">
            <p style="min-width: fit-content; margin: 0;">Search Product: </p>
            <input type="text" id="search_product" class="form-control" placeholder="Search..." autocomplete="off"
                style="border-radius: 4px; max-width: 17%;" />
        </div>
    </div>

    <div class="row">
        <div class="wrapper-budget table-responsive" style="height: 350px;">
            <table class="table table-head-fixed text-nowrap table-sm" id="tableMaterialDisposal">
                <thead>
                    <tr>
                        <th
                            style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                            Code</th>
                        <th
                            style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                            Name</th>
                        <th
                            style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                            Unit</th>
                        <th
                            style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                            Warehouse</th>
                        <th
                            style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                            Qty</th>
                        <th
                            style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                            Category</th>
                        <th
                            style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                            Total</th>
                        <th
                            style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                            Status</th>
                        <th
                            style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                            Owner</th>
                        <th
                            style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                            Note</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr id="loadingTableMaterialDisposal" style="display: none;">
                        <td colspan="10" class="p-0" style="border: 0px; height: 150px;">
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
    </div>
</div>