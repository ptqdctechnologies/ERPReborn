@extends('Partials.app')
    @section('main')
        @include('Partials.navbar')
        @include('Partials.sidebar')

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="tab-content p-3" id="nav-tabContent">                            
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header">
                                                <label class="card-title">Register New Customer PO</label>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-6">
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
                                                    <br><br>                    
                                                </div>
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
                                                        <td><label>Costumer</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                                                                    </span>
                                                                </div>
                                                                <input id="projectname" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>PO Customer</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Value IDR</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Value USD</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
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
                                                    <tr>
                                                        <td><label>Confirmation From</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <select class="form-control select2bs4" style="width: 100%; border-radius:0;">
                                                                    <option selected="selected">Email</option>
                                                                    <option>Fax</option>
                                                                    <option>Hardcopy</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Project Manager</label></td>
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
                                                        <td><label>Message</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <textarea name="" id="" cols="55" rows="3"></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Term Of Payment(TOP)</label></td>
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