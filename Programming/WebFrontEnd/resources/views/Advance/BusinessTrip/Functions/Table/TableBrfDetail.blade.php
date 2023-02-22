<div class="wrapper-budget card-body table-responsive p-0 tableShowHideBrfDetail"  style="height: 230px;" id="tableShowHideBrfDetail">
    <table class=" table table-head-fixed text-nowrap table-sm TableBrfDetail">
        <thead>
            <tr>
                <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Used</th>
                <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Trano</th>
                <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Product Id</th>
                <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Qty Available</th>
                <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Qty ARF</th>
                <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">UOM</th>
                <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Unit Price</th>
                <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Total Budget</th>
                <th rowspan="2" style="padding-bottom:17px;border:1px solid #e9ecef;text-align: center;">Currency</th>
                <th colspan="3" class="sticky-col third-col-asf-expense" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Expense Claim Cart</th>
                <th colspan="3" class="sticky-col second-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Amount Due to Company Cart</th>
                <th rowspan="2" class="sticky-col first-col-asf-balance" style="padding-bottom:17px;border-right:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance</th>
            </tr>
            <tr>
                <th class="sticky-col third-col-asf-expense-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Qty</th>
                <th class="sticky-col third-col-asf-expense-price" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Price</th>
                <th class="sticky-col third-col-asf-expense-total" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Total</th>

                <th class="sticky-col second-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Qty</th>
                <th class="sticky-col second-col-asf-amount-price" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Price</th>
                <th class="sticky-col second-col-asf-amount-total" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Total</th>
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
                    <a class="btn btn-default btn-sm float-right" onclick="addFromDetailtoCartJs()" id="addFromDetailtoCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                    </a>
                @else
                    <a class="btn btn-default btn-sm float-right" onclick="addFromDetailtoCartJs()" id="addFromDetailtoCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                    </a>
                    <a class="btn btn-default btn-sm float-right" onclick="ResetBudget()" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Add to Advance List"> Reset
                    </a>
                @endif
            </td>
        </tr>
    </table>
</div>