<div class="wrapper-budget card-body table-responsive p-0 tableShowHideSupp" style="height: 230px;">
    <table class="table text-nowrap table-head-fixed table-striped TableMaterialResource" id="TableMaterialResource">
        <thead>
            <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Transaction Number</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Id</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty Budget</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty Available</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Uom</th>

                <th class="sticky-col second-col-dor-qty" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Qty Req</th>
                <th class="sticky-col first-col-dor-note" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Note</th>

            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<div class="card-body tableShowHideSupp" >
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