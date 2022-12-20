<div class="wrapper-budget card-body table-responsive p-0" style="height: 280px;" id="tableShowHideBOQ3"">
    <table class="table table-head-fixed text-nowrap table-striped table-sm tableBudgetDetail">
        <thead>
            <tr>
                &nbsp;&nbsp;&nbsp;<th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Applied</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Id</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty Budget</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Price</th>

                <th class="sticky-col third-col" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Qty Req</th>
                <th class="sticky-col second-col" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Price Req</th>
                <th class="sticky-col first-col" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Total Req</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6"></th>
                <th colspan="2" style="text-align:center;">Total</th>
                <th><span id="TotalBudgetSelected"></span></th>
            </tr>
            <tr>
                <td colspan="7"></td>
                <td colspan="2">
                    <a class="btn btn-default btn-sm float-right" onclick="addFromDetailtoCartJs()" id="addFromDetailtoCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                    </a>
                    <a class="btn btn-default btn-sm float-right" onclick="ResetBudget()" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Add to Advance List"> Reset
                    </a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
