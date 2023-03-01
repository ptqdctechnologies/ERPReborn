@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getUser')

<div class="content-wrapper" style="position:relative;bottom:12px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Workflow</label>
                </div>
            </div>
            @include('Admin.Workflow.Functions.Menu.MenuWorkflow')
            @if($var == 0)
            <div class="card" style="position:relative;bottom:10px;">
                <form method="post" enctype="multipart/form-data" action="{{ route('AdvanceRequest.store') }}" id="formSubmitArf">
                    @csrf
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Workflow Route
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp; Start</label></td>
                                                            <td>
                                                                <div class="input-group add_start">
                                                                    <input id="user_code1" style="border-radius:0;background-color:white;" name="user_code[]" class="form-control" readonly>
                                                                    <div>
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#" id="start2" data-toggle="modal" data-target="#myUser" onclick="myUser(1)"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                        </span>
                                                                    </div>
                                                                    <br><br>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a class="add_start_button"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt=""></a>
                                                                    </span>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp; Intermediate</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="intermediate" style="border-radius:0;background-color:white;" name="intermediate" class="form-control" readonly>
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#" id="intermediate2" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#" id="start2" data-toggle="modal" data-target="#myUser" class="myUser"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt=""></a>
                                                                    </span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp; Finish</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="finish" style="border-radius:0;background-color:white;" name="finish" class="form-control" readonly>
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#" id="finish2" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#" id="start2" data-toggle="modal" data-target="#myUser" class="myUser"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt=""></a>
                                                                    </span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-default btn-sm float-right" type="submit" id="submitArf" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                            <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </section>
</div>
@include('Partials.footer')
@include('Admin.Workflow.Functions.Footer.FooterWorkflowRoute')
@endsection