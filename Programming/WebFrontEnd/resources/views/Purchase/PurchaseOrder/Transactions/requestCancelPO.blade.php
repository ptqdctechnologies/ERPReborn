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
                                                <label class="card-title">Form Request Cancel Purchase Order (PO)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <table>
                                                            <tr>
                                                                <td><label>User Request</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>PO Number</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                                        <div class="input-group-append">
                                                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                                                <a href="#"><i data-toggle="modal" data-target="#mySearchCancelPO" class="fas fa-gift"></i></a>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Reason</label></td>
                                                                <td> 
                                                                    <div class="input-group">
                                                                        <textarea name="" id="" cols="30" rows="4"></textarea>
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