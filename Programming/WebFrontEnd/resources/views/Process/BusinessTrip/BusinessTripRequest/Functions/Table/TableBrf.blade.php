<div class="wrapper-budget table-responsive card-body p-0" style="height: 12em;">
    <table id="budgetTable" class="table table-head-fixed text-wrap table-sm">
        <thead>
            <tr>
                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;"></th>
                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Product Code</th>
                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Product Name</th>
                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Total Budget</th>
                <!-- <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Qty Budget</th>
                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Qty Avail</th>
                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Price</th> -->
                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Currency</th>
                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Balanced Budget</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr class="loading">
                <td colspan="9">
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
<div id="budgetDetailsMessage" class="card-body tableShowHideBudget" style="display: none;">
    <div class="row">
        <div class="col">
            <div class="text-red">
                Please check one item.
            </div>
        </div>
    </div>
</div>