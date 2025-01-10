<div class="wrapper-budget card-body table-responsive p-0 tableShowHideBrfDetail"  style="height: 230px;" id="tableShowHideBrfDetail">
    <table class=" table table-head-fixed text-nowrap table-sm TableBrfDetail" id="TableBrfDetail">
        <thead>
            <tr>
                <th rowspan="2" style="padding-bottom:17px;border-right:1px solid #e9ecef;text-align: center;">Transaction Number</th>
                <th rowspan="2" style="padding-bottom:17px;border-right:1px solid #e9ecef;text-align: center;">Product Id</th>
                <th rowspan="2" style="padding-bottom:17px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                <th rowspan="2" style="padding-bottom:17px;border-right:1px solid #e9ecef;text-align: center;">Qty Available</th>
                <th rowspan="2" style="padding-bottom:17px;border-right:1px solid #e9ecef;text-align: center;">Qty BRF</th>
                <th rowspan="2" style="padding-bottom:17px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                <th rowspan="2" style="padding-bottom:17px;border-right:1px solid #e9ecef;text-align: center;">Unit Price</th>
                <th rowspan="2" style="padding-bottom:17px;border-right:1px solid #e9ecef;text-align: center;">Total Budget</th>
                <th rowspan="2" style="padding-bottom:17px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                <th colspan="5" class="sticky-col third-col-asf-expense" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Expense Claim</th>
                <th colspan="5" class="sticky-col second-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Amount Due to Company</th>
                <th rowspan="2" class="sticky-col first-col-asf-balance" style="padding-bottom:17px;border-right:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;padding-right: 0rem;">Balance</th>
            </tr>
            <tr>
                <th class="sticky-col third-col-asf-expense-transport" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef; cursor: default;" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="auto" data-content="Transport">Trp.</th>
                <th class="sticky-col third-col-asf-expense-accommodation" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef; cursor: default;" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="auto" data-content="Accommodation">Acm.</th>
                <th class="sticky-col third-col-asf-expense-allowance" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef; cursor: default;" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="auto" data-content="Allowance">Alw.</th>
                <th class="sticky-col third-col-asf-expense-entertainment" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef; cursor: default;" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="auto" data-content="Entertainment">Ent.</th>
                <th class="sticky-col third-col-asf-expense-other" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef; cursor: default;" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="auto" data-content="Other">Oth.</th>

                <th class="sticky-col second-col-asf-amount-transport" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef; cursor: default;" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="auto" data-content="Transport">Trp.</th>
                <th class="sticky-col second-col-asf-amount-accommodation" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef; cursor: default;" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="auto" data-content="Accommodation">Acm.</th>
                <th class="sticky-col second-col-asf-amount-allowance" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef; cursor: default;" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="auto" data-content="Allowance">Alw.</th>
                <th class="sticky-col second-col-asf-amount-entertainment" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef; cursor: default;" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="auto" data-content="Entertainment">Ent.</th>
                <th class="sticky-col second-col-asf-amount-other" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef; cursor: default; padding-right: 0rem;" data-container="body" data-trigger="hover" data-toggle="popover" data-placement="auto" data-content="Other">Oth.</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>

<div class="card-body tableShowHideBrfDetail" >
    <table style="float:right;">
        <tr>
            <th style="position: relative;right:20px;"> Total : <span id="TotalBudgetSelected"></span></th>
        </tr>
        <tr>
            <td>
                <br>
                @if($statusRevisi == 1)
                    <!-- <a class="btn btn-default btn-sm float-right" onclick="addFromDetailtoCartJs()" id="addFromDetailtoCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                    </a> -->
                @else
                    <!-- <a class="btn btn-default btn-sm float-right" onclick="addFromDetailtoCartJs()" id="addFromDetailtoCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                    </a> -->
                    <a class="btn btn-default btn-sm float-right" onclick="ResetBudget()" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Add to Advance List"> Reset
                    </a>
                @endif
            </td>
        </tr>
    </table>
</div>