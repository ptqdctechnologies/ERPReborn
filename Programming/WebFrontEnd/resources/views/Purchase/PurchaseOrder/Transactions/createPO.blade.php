@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSupplier')
@include('getFunction.getCurrency')
@include('getFunction.getDeliverTo')
@include('Purchase.ProcurementRequest.Functions.PopUp.searchPR')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="card-title">Add New Purchase Order (PO)</label>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                    </button>
                                </div>
                            </div>
                            @include('Purchase.PurchaseOrder.Functions.Header.headerPO')
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card-card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><span style="font-weight:bold;padding:40px;color:black;">PR Detail</span></a>&nbsp&nbsp&nbsp
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false"><span style="font-weight:bold;padding:40px;color:black;">History</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <label class="card-title">
                                                        Budget
                                                    </label>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                @include('getFunction.BOQ3')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <label class="card-title">
                                                        History
                                                    </label>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body table-responsive p-0" style="height: 250px;">
                                                    <table class="table table-head-fixed text-nowrap table-striped" id="arfTableDisableEnable">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Date</th>
                                                                <th>Project Id</th>
                                                                <th>Project Name</th>
                                                                <th>Site Code</th>
                                                                <th>Site Name</th>
                                                                <th>PIC</th>
                                                                <th>Price</th>
                                                                <th>Currency</th>
                                                                <th>Supplier Code</th>
                                                                <th>Supplier Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a class="btn btn-warning btn-sm" href="#">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <a class="btn btn-danger btn-sm" href="#">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                                <td>yes</td>
                                                                <td>yes</td>
                                                                <td>yes</td>
                                                                <td>yes</td>
                                                                <td>yes</td>
                                                                <td>yes</td>
                                                                <td>yes</td>
                                                                <td>yes</td>
                                                                <td>yes</td>
                                                                <td>yes</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="card-title">Detail Purchase Order & Balance</label>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" id="tableDetailPurchaseOrder">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td><label>PR Number</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="pr_number" id="putprnumber" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Project Code</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="project_code" id="putprojectcode" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Site Code</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="site_code" id="putsitecode" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Work Id</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="work_id" id="putworkid" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Product Id</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="product_id" id="putprojectid" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>PPN</label></td>
                                                    <td>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="checkbox" id="checkboxPrimary1" checked>
                                                            <label for="checkboxPrimary1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="checkbox" id="checkboxPrimary2">
                                                            <label for="checkboxPrimary2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>PPN Value</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <select class="form-control select2bs4" style="width: 100%; border-radius:0;">
                                                                <option selected="selected">Alabama</option>
                                                                <option>Alaska</option>
                                                                <option>California</option>
                                                                <option>Delaware</option>
                                                                <option>Tennessee</option>
                                                                <option>Texas</option>
                                                                <option>Washington</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label></label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            <input type="checkbox" id="checkboxPrimary2" class="form-control">
                                                            <label for="checkboxPrimary3">
                                                                Edit
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Qty Request</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="qty_request" id="putqtyrequest" style="border-radius:0;" type="text" class="form-control">
                                                            <input name="qty_request" id="putqtyrequest" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <table>
                                                <!-- <tr>
                                                    <td><label>No</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="no" id="putno" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr> -->
                                                <tr>
                                                    <td><label>Unit Price</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="unit_price" id="putunitprice" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Total Price</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="total_price" id="puttotalprice" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Item Remark</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="item_remark" id="putitemremark" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Project Name</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                                <input style="border-radius:0;" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Site Name</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="site_name" id="putsitename" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Net Act</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="net_act" id="putnetact" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Product Name</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <textarea name="" id="" cols="50" rows="3" class="form-control"></textarea>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td><label>Qty Request For Supplier</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="qty_request_forsupplier" id="putqtyrequestforsupplier" style="border-radius:0;" type="text" class="form-control">
                                                            <input name="qty_request_forsupplier" id="putqtyrequestforsupplier" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Unit Price For Supplier</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="unit_price_forsupplier" id="putunitpriceforsupplier" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Total Price For Supplier</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="total_price_forsupplier" id="puttotalpriceforsupplier" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr> -->
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title" style="border:5px solid #DCDCDC;width:100%;">
                                                    <p style="position:relative;text-align:center;top:7px;">Balance</p>
                                                </div>
                                                <div class="card-body table-responsive p-0 available" style="height: 100px;">
                                                    <table>
                                                        <tbody>
                                                            <br>
                                                            <tr>
                                                                <td><label>Total Requested</label></td>
                                                                <td>:</td>
                                                                <td style="font-weight:bold;">
                                                                    <input name="price" id="totalRequester" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                                                </td>
                                                                <td>IDR</td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Total Qty Requested</label></td>
                                                                <td>:</td>
                                                                <td style="font-weight:bold;">
                                                                    <input name="price" id="totalRequester" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Balance</label></td>
                                                                <td>:</td>
                                                                <td style="font-weight:bold;color:red;">
                                                                    <input name="price" id="totalBalance" style="border-radius:0;background-color:white;border:1px solid white;color:red;" type="text" class="form-control" readonly="">
                                                                </td>
                                                                <td>IDR</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br>
                                        <button type="reset" class="btn btn-outline-danger btn-sm float-right detailTransaction" title="Cancel">
                                            <i class="fa fa-times" aria-hidden="true">Cancel</i>
                                        </button>
                                        <button type="reset" class="btn btn-outline-success btn-sm float-right" id="buttonPRList" title="Cancel">
                                            <i class="fa fa-plus" aria-hidden="true">Add to PR List(Cart)</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="card-title">
                                    PO Shopping Cart
                                </label>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0" id="detailArfList">
                                <table id="table1" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>PR-Number</th>
                                            <th>Project Id</th>
                                            <th>Site Code</th>
                                            <th>Work Id</th>
                                            <th>Work Name</th>
                                            <th>Product Id</th>
                                            <th>Product Name</th>
                                            <th>Qty</th>
                                            <th>Uom</th>
                                            <th>Price</th>
                                            <th>PPN</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableArfListCart"></tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ url('arflist/cancel/') }}" class="btn btn-outline btn-danger btn-sm float-right remove-arf-list">
                            <i class="fa fa-times" aria-hidden="true" title="Cancel Advance List Cart">Cancel</i>
                        </a>
                        <button type="reset" class="btn btn-outline btn-success btn-sm float-right" id="saveArfList" style="margin-right: 5px;">
                            <i class="fas fa-save" aria-hidden="true" title="Submit to Advance">Submit</i>
                        </button>
                    </div>
                </div>
                <!-- <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">PO Shopping Cart</label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0" style="height: 250px;" id="tablePoShoppingCart">
                                    <table class="table table-head-fixed text-nowrap table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>PR-Number</th>
                                                <th>Project Id</th>
                                                <th>Site Code</th>
                                                <th>Work Id</th>
                                                <th>Work Name</th>
                                                <th>Product Id</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>Uom</th>
                                                <th>Price</th>
                                                <th>PPN</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableArfListCart">
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="{{ url('arflist/cancel/') }}" class="btn btn-outline-danger btn-sm float-right remove-arf-list" title="Cancel">
                                <i class="fa fa-times" aria-hidden="true">Cancel PO List(Cart)</i>
                            </a>
                            <a class="btn btn-outline-success btn-sm float-right" id="saveArfList" style="margin-right:5px;" title="Add to ARF List(Cart)">
                                <i class="fas fa-save" aria-hidden="true" style="color:green;">Save PO List(Cart)</i>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
</div>
@include('Partials.footer')
@include('Purchase.PurchaseOrder.Functions.Footer.footerPO')
@endsection