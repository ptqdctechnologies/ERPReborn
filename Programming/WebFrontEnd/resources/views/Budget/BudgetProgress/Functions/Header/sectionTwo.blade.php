<div class="card-body py-0 px-1">
    <div class="row justify-content-between" style="margin: 1rem 0rem;">
        <div class="col d-flex align-items-center" style="gap: .5rem;">
            <!-- <p style="min-width: fit-content; margin: 0;">Product Status: </p>
            <select class="form-control" id="legal_entity" name="legal_entity_value"
                style="border-radius:4px; max-width: 15%;" type="text">
                <option value="" disabled selected>Select a Status</option>
            </select> -->
        </div>
        <div class="col d-flex align-items-center justify-content-end" style="gap: .5rem;">
            <p style="min-width: fit-content; margin: 0;">Sub Budget: </p>
            <input type="text" id="warehouse_name" class="form-control" placeholder="Search..." autocomplete="off"
                style="border-radius: 4px; max-width: 17%;" />
        </div>
    </div>
</div>

<div class="wrapper-budget card-body table-responsive p-0" style="height: 400px;">
    <table class="table table-head-fixed text-nowrap table-sm" id="tableBudgetProgress">
        <thead>
            <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Sub Budget Code</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                    Sub Budget Name</th>
                <th
                    style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; width: 15%;">
                    Last Progress</th>
                <th
                    style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; width: 8%;padding-right: 4px;">
                    Current Progress</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr id="loadingTableBudgetProgress" style="display: none;">
                <td colspan="4" class="p-0" style="border: 0px; height: 150px;">
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