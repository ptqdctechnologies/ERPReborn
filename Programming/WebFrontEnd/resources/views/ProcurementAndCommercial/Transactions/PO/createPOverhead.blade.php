@extends('Partials.app')
    @section('main')
        @include('Partials.navbar')
        @include('Partials.sidebar')

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="tab-content p-3" id="nav-tabContent">

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <label class="card-title">Add New Purchase Order (PO) Overhead</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td><label>Project Code</label></td>
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
                                                        <td><label>Supplier Code</label></td>
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
                                            <br><br>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td><label>Deliver To</label></td>
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
                                                        <td><label>Delivery Date Estimate</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                                    <input style="border-radius:0;" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
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
                                                                <textarea name="" id="" cols="30" rows="2"></textarea>
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Select a file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                            </div>                      
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-header">                          
                                                    </div>
                                                    <div class="card-body table-responsive p-0" style="height: 200px;">
                                                        <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>File Name</th>
                                                                    <th>Action</th>                                
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>                                
                                                                    <td>1</td>
                                                                    <td>This is file name</td>
                                                                    <td>                                  
                                                                        <a class="btn btn-danger btn-sm" href="#">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                    </td>
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

                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="card-header">
                                            <label class="card-title">PR Detail</label>
                                        </div>
                                        <div class="card-body table-responsive p-0" style="height: 300px;">
                                            <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>No Trans</th>
                                                        <th>Date</th>
                                                        <th>Project Id</th>
                                                        <th>Site Id</th>
                                                        <th>Work Id</th>
                                                        <th>Work Name</th>
                                                        <th>Product Id</th>
                                                        <th>Product Name</th>
                                                        <th>Valuta</th>
                                                        <th>Qty</th>
                                                        <th>Available</th>
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
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <label class="card-title">Detail Purchase Order (PO)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td><label>PR Number</label></td>
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
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Site Code</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Work Id</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Product Id</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
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
                                                                <input type="checkbox" id="checkboxPrimary2">
                                                                <label for="checkboxPrimary2">Edit</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Qty Request</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Unit Price</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Total Price</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Item Remark</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
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
                                                        <td><label>No</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Project Name</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                                    <input style="border-radius:0;" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Site Name</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Net Act</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Product Name</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <textarea name="" id="" cols="50" rows="2"></textarea> 
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Qty Request For Supplier</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Unit Price For Supplier</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Total Price For Supplier</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <br><br><br><br><br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="card-header">
                                            <label class="card-title">Price History</label>
                                        </div>
                                        <div class="card-body table-responsive p-0" style="height: 300px;">
                                            <table id="example1" class="table table-head-fixed text-nowrap table-striped">
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

                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="card-header">
                                            <label class="card-title">PO Shopping Cart</label>
                                        </div>
                                        <div class="card-body table-responsive p-0" style="height: 300px;">
                                            <table id="example1" class="table table-head-fixed text-nowrap table-striped">
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
            </section>
        </div>
    @include('Partials.footer')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function(){ 
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $("body").on("click",".btn-danger",function(){ 
                $(this).parents(".control-group").remove();
            });
        });
    </script>
    @endsection