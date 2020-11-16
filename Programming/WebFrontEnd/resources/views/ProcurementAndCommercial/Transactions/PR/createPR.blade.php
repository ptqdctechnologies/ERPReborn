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
                                            <label class="card-title">Add New Procurement Request (PR)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                        <div class="card-body">
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td><label>Job Tittle</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <select class="form-control" style="border-radius:0;">
                                                                <option selected="selected">Project</option>
                                                                <option>Overhead</option>
                                                                <option>Sales</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
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
                                                    <td>
                                                        <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Site Code</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                                            <div class="input-group-append">
                                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                                    <a href="#"><i data-toggle="modal" data-target="#mySPC" class="fas fa-gift"></i></a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input id="subprojectn" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
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
                                    <div class="card-header">
                                        <h3 class="card-title">BOQ3 Detail</h3>
                                    </div>
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Applied</th>
                                                    <th>Work ID</th>
                                                    <th>Work Name</th>
                                                    <th>Product ID</th>
                                                    <th>Description</th>
                                                    <th>QTY</th>
                                                    <th>Uom</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
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
                                            <label class="card-title">Detail Procurement Request</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <td><label>Work ID</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                        <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                        <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Product ID</label></td>
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
                                                    <td><label>QTY Request</label></td>
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
                                                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Remark</label></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <textarea name="" id="" cols="55" rows="3"></textarea>
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
                                        <h3 class="card-title">BOQ3 Detail</h3>
                                    </div>
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Work ID</th>
                                                    <th>Work Name</th>
                                                    <th>Product ID</th>
                                                    <th>Description</th>
                                                    <th>QTY</th>
                                                    <th>Uom</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                    <th>Currency</th>
                                                    <th>Remark</th>
                                                    <th>Net Act</th>
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