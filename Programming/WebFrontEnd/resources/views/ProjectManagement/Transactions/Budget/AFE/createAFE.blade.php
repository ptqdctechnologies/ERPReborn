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
                                                <label class="card-title">Add New AFE(Approval For Expenditure)</label>
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
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Site Code</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                                                                    </span>
                                                                </div>
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Currency Code</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                                                                    </span>
                                                                </div>
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>IDR Rate</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Reason For AFE</label></td>
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
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-header"> 
                                                        <label class="card-title">BOQ3 Detail</label>                         
                                                    </div>
                                                    <div class="card-body table-responsive p-0" style="height: 200px;">
                                                        <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Work Id</th>
                                                                    <th>Product Id</th>
                                                                    <th>Product Name</th>
                                                                    <th>Qty</th>
                                                                    <th>Uom</th>
                                                                    <th>Price</th>
                                                                    <th>Currency</th>                                
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
                                                                </tr>                         
                                                            </tbody>
                                                        </table>
                                                    </div>                                                        
                                                </div>
                                            </div>
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

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <label class="card-title">AFE (Approval For Expenditure) Detail</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td><label>Work Id</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                                                                    </span>
                                                                </div>
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Product Id</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                                                                    </span>
                                                                </div>
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>CFS Code</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                                                                    </span>
                                                                </div>
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Qty</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Price</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Total</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Notes</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
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
                                                    <div class="card-header">
                                                        <label class="card-title">Saving AFE Cart</label>                          
                                                    </div>
                                                    <div class="card-body table-responsive p-0" style="height: 200px;">
                                                        <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>Work Id</th>
                                                                    <th>Product Id</th>
                                                                    <th>Product Name</th>
                                                                    <th>Qty</th>
                                                                    <th>Uom</th>
                                                                    <th>Price</th>
                                                                    <th>Currency</th>                                
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
                                                                </tr>                         
                                                            </tbody>
                                                        </table>
                                                    </div>                        
                                                </div>
                                            </div>
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

                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="card">
                                        <div class="card-body">
                                        <div class="card-header">
                                            <label class="card-title">Additional AFE Cart</label>
                                        </div>
                                        <div class="card-body table-responsive p-0" style="height: 300px;">
                                            <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Work Id</th>
                                                        <th>Product Id</th>
                                                        <th>Product Name</th>
                                                        <th>Qty</th>
                                                        <th>Uom</th>
                                                        <th>Price</th>
                                                        <th>Currency</th>
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