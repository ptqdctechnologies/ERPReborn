@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getRequester')
@include('getFunction.getProduk')
@include('getFunction.getProduk')
@include('Sales.CO.Functions.PopUp.searchRegisterCo')
@include('Sales.CO.Functions.PopUp.searchCustomer')
@include('getFunction.BOQ2')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
            <form method="post" enctype="multipart/form-data" action="#" name="formCo2">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        File Attachment
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-body table-responsive p-0" style="height: 120px;width:100%;">
                                                <table class="table table-head-fixed text-nowrap">
                                                    <div class="form-group input_fields_wrap">
                                                        <div class="input-group control-group" style="width:100%;">
                                                            <input type="file" class="form-control filenames_1" id="filenames_1" style="height:26px;" name="filenames">
                                                            <div class="input-group-btn">
                                                                <a class="btn btn-outline btn-success btn-sm add_field_button">
                                                                    <i class="fas fa-plus" aria-hidden="true" title="Add File" style="color:white;">Add</i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row detailASF">
                        <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <label class="card-title">
                                Create Customer Order
                            </label>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                </button>
                            </div>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <table>
                                        <tr>
                                        <td><label>Status Customer Order</label></td>
                                        
                                        <div class="form-group clearfix">
                                            <td>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="statusCoOriginal" name="status_co" value="Original" checked>
                                                <label for="statusCoOriginal">Original
                                                </label>
                                            </div>
                                            </td>
                                            <td>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="statusCoEstimate" name="status_co" value="Estimate">
                                                <label for="statusCoEstimate">Estimate
                                                </label>
                                            </div>
                                            </td>
                                        </div>
                                        </tr>
                                        <tr>
                                            <td><label>Register Customer Order</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input readonly id="register_co" style="border-radius:0;" name="register_co" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#" ><i data-toggle="modal" data-target="#mySearchRegisterCo" class="fas fa-gift" style="color:grey;" id="register_co2"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td>
                                                    <br>
                                                    <label>
                                                        <strong>Register Customer Order Information</strong><br>
                                                    </label>
                                                </td>
                                            </tr>
                                        </table>
                                        <table>
                                        <tr>
                                            <td><label>Customer</label></td>
                                            <td>
                                            <div class="input-group" style="position:relative;left:34px;width:111px;">
                                                <input name="customer" id="customer" style="border-radius:0;" type="text" class="form-control">
                                            </div>
                                            </td>
                                            <td>
                                            <div class="input-group">
                                                <input name="customer2" id="customer2" style="border-radius:0;width:120px;position:relative;right:87px;" type="text" class="form-control">
                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>PO Customer</label></td>
                                            <td>
                                            <div class="input-group" style="position:relative;left:34px;">
                                                <input name="po_customer" id="po_customer" style="border-radius:0;" type="text" class="form-control">
                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Value IDR</label></td>
                                            <td>
                                            <div class="input-group" style="position:relative;left:34px;">
                                                <input name="value_idr" id="value_idr" style="border-radius:0;" type="text" class="form-control">
                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>value USD</label></td>
                                            <td>
                                            <div class="input-group" style="position:relative;left:34px;">
                                                <input name="value_usd" id="value_usd" style="border-radius:0;" type="text" class="form-control">
                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Description</label></td>
                                            <td>
                                            <div class="input-group" style="position:relative;left:34px;">
                                                <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Confirmation Form</label></td>
                                            <td>
                                            <div class="input-group" style="position:relative;left:34px;">
                                                <input name="confirmation_form" id="confirmation_form" style="border-radius:0;" type="text" class="form-control">
                                            </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <br>
                                                        <label>
                                                            <strong>Customer Order Input</strong><br>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table>
                                            <tr>
                                                <td><label>Customer</label></td>

                                                <td>
                                                    <div class="input-group">
                                                        <input required="" id="customer_input" style="border-radius:0;" name="customer_input" type="text" class="form-control" readonly>
                                                        <div class="input-group-append">
                                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                                <a href="#"><i data-toggle="modal" data-target="#mySearchCustomer" class="fas fa-gift" style="color:grey;" id="popUpCustomerInput"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input readonly name="customer_input2" id="customer_input2" style="border-radius:0;" type="text" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Project Code</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input required="" id="projectcode" style="border-radius:0;" name="projectcode" type="text" class="form-control" readonly>
                                                        <div class="input-group-append">
                                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                                <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Site Code</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input required="" id="sitecode" style="border-radius:0;" name="sitecode" type="text" class="form-control" readonly>
                                                        <div class="input-group-append">
                                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                                <a href="#"><i data-toggle="modal" data-target="#mySiteCode" class="fas fa-gift" style="color:grey;"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Type</label></td>
                                                <td>
                                                <div class="input-group">
                                                    <input name="type" id="type" style="border-radius:0;" type="text" class="form-control">
                                                </div>
                                                </td>
                                                <td>
                                                <a href="#"><i data-toggle="modal" data-target="#mySearchBOQ2" class="btn btn-default btn-sm" style="color:grey;">View BOQ2</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Rate IDR</label></td>
                                                <td>
                                                <div class="input-group">
                                                    <input name="rate_idr2" id="rate_idr2" style="border-radius:0;" type="text" class="form-control">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                            <td><label>Value IDR</label></td>
                                            <td>
                                            <div class="input-group">
                                                <input name="value_idr2" id="value_idr2" style="border-radius:0;" type="text" class="form-control">
                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>value USD</label></td>
                                            <td>
                                            <div class="input-group">
                                                <input name="value_usd2" id="value_usd2" style="border-radius:0;" type="text" class="form-control">
                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Description</label></td>
                                            <td>
                                            <div class="input-group">
                                                <textarea name="description2" id="description2" cols="30" rows="3" class="form-control"></textarea>
                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Term of Payment (Days)</label></td>
                                            <td>
                                            <div class="input-group">
                                                <input name="top" id="top" style="border-radius:0;" type="text" class="form-control">
                                            </div>
                                            </td>
                                        </tr>
                                        </table>
                                    </div>
                                        <button type="reset" class="btn btn-outline btn-danger btn-sm float-right">
                                            <i class="fas fa-save" aria-hidden="true" title="Reset">Reset</i>
                                        </button>
                                        <button type="reset" class="btn btn-outline btn-success btn-sm float-right" id="buttonAddCo">
                                            <i class="fas fa-plus" aria-hidden="true" title="Submit CO">Add to CO Pool</i>
                                        </button>
                                    </div>
                            </div>
                            </div>                                            
                        </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Customer Order Cart
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                <table id="table1" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>CO Regis Number</th>
                                            <th>Project Code</th>
                                            <th>Site Code</th>
                                            <th>Customer Code</th>
                                            <th>PO Customer</th>
                                            <th>Type</th>
                                            <th>Value IDR</th>
                                            <th>Value USD</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableCoCart"></tbody>
                                </table>
                            </div> 
                            </div>
                            <button type="reset" class="btn btn-outline btn-success btn-sm float-right" id="saveArfList">
                                <i class="fas fa-save" aria-hidden="true" title="Add to CO Pool">Submit CO</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('Partials.footer')
@include('Sales.CO.Functions.Footer.footerCo')
@endsection