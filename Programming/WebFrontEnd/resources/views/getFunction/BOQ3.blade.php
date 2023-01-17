<div class="wrapper-budget card-body table-responsive p-0 tableShowHideBOQ3" style="height: 230px;" id="tableShowHideBOQ3"">
    <table class=" table table-head-fixed text-nowrap table-sm tableBudgetDetail">
        <thead>
            <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">&nbsp;&nbsp;&nbsp; Used &nbsp;&nbsp;&nbsp;</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Id</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty Budget</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Price</th>
                @if($statusPr == 1)
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Balance</th>
                @endif
                @if($statusAdvanceRevisi == 1)
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Total Payment</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Balance</th>
                @endif
                @if($statusPrRevisi == 1)
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Total PR</th>
                @endif
                <th class="sticky-col third-col" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Qty Req</th>
                <th class="sticky-col second-col" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Price Req</th>
                <th class="sticky-col first-col" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Total Req</th>
                @if($statusPr == 1)
                <th class="sticky-col forth-col" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Remark</th>
                @endif
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="card-body tableShowHideBOQ3" >
    <table style="float:right;">
        @if($statusRevisi == 1)
            <tr>
                <th style="position: relative;right:20px;"> Total : <span id="TotalBudgetSelected"></span></th>
            </tr>
        @endif
        @if($statusPrRevisi == 1)
            <tr>
                <th style="position: relative;right:45px;"> Total : <span id="TotalBudgetSelected"></span></th>
            </tr>
        @endif
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