@extends('Partials.app')
    @section('main')
        @include('Partials.navbar')
        @include('Partials.sidebar')

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <label class="card-title">Create Debit Note Payment Reimbursement</label>
                                    </div>
                                    <table>
                                        <tr>
                                            <td><label>Transaction Number</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>                  
                                        </tr>
                                        <tr>
                                            <td><label>Reimbursement Number</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                </div>
                                            </td>                  
                                        </tr>
                                    </table>
                                </div>                                
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="form-group">
                                        <table>
                                            <tr>
                                                <td><label>Transaction Date</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>User Input</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Project Code</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                        <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Site Code</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                        <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Work Id</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                        <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Costumer Code</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                        <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Description</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <textarea name="" id="" cols="55" rows="3"></textarea>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <br><br>
                                </div>
                                </div>
                                </div>
                                <div class="col-md-6"> 
                                <div class="card">
                                    <div class="card-body">                     
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header">                          
                                            </div>
                                            <div class="card-body table-responsive p-0" style="height: 200px;">
                                                <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Product Id</th>
                                                            <th>Description</th>
                                                            <th>Qty</th>
                                                            <th>Price</th>
                                                            <th>Valuta</th>
                                                            <th>Total</th>                                
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>                                
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
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

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td><label>User Payment</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Exchange Rate</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control" placeholder="IDR" disabled>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Payment Type</label></td>
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
                                                    <td><label>Payment Notes</label></td>
                                                    <td>
                                                        <textarea name="" id="" cols="55" rows="2"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Destination</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Destination Address</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <textarea name="" id="" cols="55" rows="2"></textarea>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td><label>Currency</label></td>
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
                                                <td><label>Bank Name</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                        <div class="input-group-append">
                                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                                <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>No Rek</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Coa Code</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                        <div class="input-group-append">
                                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                                <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Coa Name</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Payment Term</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>TOP</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td><label>Total Value</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control" placeholder="IDR" disabled>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Payment Value</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control" placeholder="IDR" disabled>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Payment Already Paid</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control" placeholder="IDR" disabled>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Balance</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control" placeholder="IDR" disabled>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td><label>Description</label></td>
                                                    <td>
                                                        <textarea name="" id="" cols="55" rows="3"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Type</label></td>
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
                                                    <td><label>Value</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            <button>Add</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                            <thead>
                                                <tr>
                                                <th>Description</th>
                                                <th>Type</th>
                                                <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
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

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td><label>Payment Already Paid</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked>
                                                                <label for="customCheckbox2" class="custom-control-label">Yes</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                                                <label for="customCheckbox1" class="custom-control-label">No</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Balance</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control" placeholder="IDR" disabled>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <br><br><br><br>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td><label>Description</label></td>
                                                    <td>
                                                        <textarea name="" id="" cols="55" rows="3"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Type</label></td>
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
                                                    <td><label>Value</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            <button>Add</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Description</th>
                                                    <th>Type</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>yes</td>
                                                    <td>yes</td>
                                                    <td>yes</td>
                                                    <td>yes</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <table>
                                        <tr>
                                            <td><label>Balance</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                    <input id="projectcode" style="border-radius:0;" type="text" class="form-control" placeholder="IDR" disabled>
                                                </div>
                                            </td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Ref Number</th>
                                                    <th>COA Code</th>
                                                    <th>COA Name</th>
                                                    <th>Debit</th>
                                                    <th>Credit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
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
                                <a class="btn btn-danger btn-sm float-right" href="#">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                    Cancel
                                </a>
                                <a class="btn btn-primary btn-sm float-right" href="#">
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    Submit
                                </a>
                            </div>
                        </div>
                
                    </div>
                </div>
            </section>
        </div>
    @include('Partials.footer')
            
    @endsection