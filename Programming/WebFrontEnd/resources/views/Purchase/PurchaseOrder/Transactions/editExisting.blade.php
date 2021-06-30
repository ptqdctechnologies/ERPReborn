@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSupplier')
@include('getFunction.getCurrency')
@include('getFunction.getDeliverTo')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="card-title">Edit Purchase Order (PO)</label>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td><label>PO Number</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Revision</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Project Code</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Supplier Code</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="suppliercode" style="border-radius:0;" type="text" class="form-control">
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#"><i data-toggle="modal" data-target="#mySupplier" class="fas fa-gift" style="color:grey;"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Supplier Name</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Currency</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="currencyCode" style="border-radius:0;" type="text" class="form-control">
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#"><i data-toggle="modal" data-target="#myCurrency" class="fas fa-gift" style="color:grey;"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Exchange Rate</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Origin Of Budget</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>COD</label></td>
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
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td><label>Deliver To</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#"><i data-toggle="modal" data-target="#myDelieverTo" class="fas fa-gift" style="color:grey;"></i></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Delivery Date Estimate</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                                    <input style="border-radius:0;" type="text" class="input-group form-control datetimepicker-input" data-target="#reservationdate" />
                                                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Invoice To</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Payment Term</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>TOP</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control"><label>Days</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Remark</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Internal Note</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <textarea name="" id="" cols="30" rows="2" class="form-control"></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="card-body table-responsive p-0" style="height: 145px;width:100%;">
                                                <table class="table table-head-fixed text-nowrap">
                                                    <div class="form-group input_fields_wrap">
                                                        <div class="input-group control-group" style="width:100%;">
                                                            <input type="file" class="form-control filenames_1" id="filenames_1" style="height:26px;" name="filenames">
                                                            <div class="input-group-btn">
                                                                <!-- <button class="btn btn-outline-success btn-sm fileInputMultiArf" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button> -->
                                                                <a class="btn btn-outline btn-success btn-sm add_field_button" style="color: white;">Add</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </table>
                                            </div>
                                            <button type="reset" class="btn btn-outline-danger btn-sm float-right" title="Reset">
                                                <i class="fa fa-times" aria-hidden="true">Reset</i>
                                            </button>
                                            <a href="#" class="btn btn-outline-success btn-sm float-right"><i data-toggle="modal" data-target="#mySearchPr" class="fas fa-gift" aria-hidden="true">Search PR</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    @include('getFunction.BOQ3')
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <table class="table table-head-fixed text-nowrap table-striped">
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="card-title">Detail Purchase Order (PO)</label>
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
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td><label>No</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input name="no" id="putno" style="border-radius:0;" type="text" class="form-control">
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
                                                            <textarea name="" id="" cols="50" rows="5" class="form-control"></textarea>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
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
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-title" style="border:5px solid #DCDCDC;width:100%;">
                                            <p style="position:relative;text-align:center;top:7px;">Available Total</p>
                                        </div>
                                        <div class="card-body table-responsive p-0 available" style="height: 100px;">
                                            <table>
                                                <tbody>
                                                    <br>
                                                    <tr>
                                                        <td title="Total BOQ Detail"><label>Total BOQ</label></td>
                                                        <td>:</td>
                                                        <td style="font-weight:bold;">
                                                            <input name="price" id="totalBOQ" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                                        </td>
                                                        <td>IDR</td>
                                                    </tr>
                                                    <br>
                                                    <tr>
                                                        <td><label>Requester Total</label></td>
                                                        <td>:</td>
                                                        <td style="font-weight:bold;">
                                                            <input name="price" id="totalRequester" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                                        </td>
                                                        <td>IDR</td>
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
                                        <br><br><br><br><br><br><br><br><br>
                                        <button type="reset" class="btn btn-outline-danger btn-sm float-right" title="Reset">
                                            <i class="fa fa-times" aria-hidden="true">Cancel Add</i>
                                        </button>
                                        <a href="#" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-plus" aria-hidden="true">Add to PO List </i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
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
                                        <tbody>
                                            <!-- <tr>
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
                                                <td>yes</td>
                                                <td>yes</td>
                                            </tr> -->
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
                </div>
            </div>
        </div>
    </section>
</div>
@include('Partials.footer')
@include('ProcurementAndCommercial.Functions.footerFunctionPo')
@endsection