<div class="wrapper-budget card-body table-responsive p-0 tableShowHidePRDetail"  style="height: 230px;" id="tableShowHidePRDetail">
    <table class="table table-head-fixed text-nowrap table-striped TablePRDetail">
        <thead>
            <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">PR Number</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Id</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty PR</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty Available</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">UOM</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Unit Price</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Total</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Currency</th>
                @if($statusRevisi == 1)
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Total Payment</th>
                @endif
                
                <th class="sticky-col fifth-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Qty Req</th>
                <th class="sticky-col forth-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Price Req</th>
                <th class="sticky-col third-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Total Req</th>
                <th class="sticky-col second-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Remark</th>
                <th class="sticky-col first-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Balance</th>
        
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <table>
                    <tr>
                        <td><label>PPN</label></td>
                        <td style="border:1px solid #e9ecef;">
                            <select name="ppn" id="ppn" style="border-radius:0;" type="text" class="form-control">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <table>
                    <tr>
                        <td><label>PPN(%)</label></td>
                        <td style="border:1px solid #e9ecef;">
                            <select name="ppn_persen" id="ppn_persen" style="border-radius:0;" type="text" class="form-control">
                                <option value="">Select</option>
                                <option value="1">1%</option>
                                <option value="11">11%</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card-body tableShowHidePRDetail" >
    <table style="float:right;">
        <tr>
            <th style="position: relative;right:20px;"> Total Request: <span id="TotalBudgetSelected">0.00</span></th>
        </tr>
        <tr>
            <th style="position: relative;right:20px;"> PPN: <span id="TotalPpn">0.00</span></th>
        </tr>
        <tr>
            <th style="position: relative;right:20px;"> Total Request + PPN: <span id="TotalBudgetSelectedPpn">0.00</span></th>
        </tr>
        <tr>
            <td>
                <br>
                <a class="btn btn-default btn-sm float-right" onclick="addFromDetailtoCartJs()" id="addFromDetailtoCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Purchase List"> Add
                </a>
                <a class="btn btn-default btn-sm float-right" onclick="ResetBudget()" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Add to Advance List"> Reset
                </a>
            </td>
        </tr>
    </table>
</div>