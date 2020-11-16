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
                                                <label class="card-title">Add New Site</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
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
                                                        <td><label>Site Code</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Site Name</label></td>
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
                                                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Status Overhead</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                                                    <label for="customCheckbox1" class="custom-control-label"></label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                </div>
                                                <a class="btn btn-danger btn-sm float-right" href="#">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                    Reset
                                                </a>
                                                <a class="btn btn-primary btn-sm float-right" href="#">
                                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                                    Create
                                                </a>                                            
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