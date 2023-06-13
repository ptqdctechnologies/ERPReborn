@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getUser')

<style>
    .container {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 10px;
    }

    .box {
        border: 3px solid #666;
        background-color: #ddd;
        border-radius: .5em;
        padding: 10px;
        cursor: move;
    }
</style>

<div class="content-wrapper">
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
                <form method="post" enctype="multipart/form-data" action="{{ route('Workflow.WorkflowRouteStore') }}" id="formSubmitArf">
                    @csrf
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Workflow Process
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
                                                        <!-- <tr>
                                                            <div class="container">
                                                                <div draggable="true" class="box">
                                                                    <input type="text" name="A[]" value="A">
                                                                </div>
                                                                <div draggable="true" class="box">
                                                                    <input type="text" name="B[]" value="B">
                                                                </div>
                                                                <div draggable="true" class="box">
                                                                    <input type="text" name="C[]" value="C">
                                                                </div>
                                                                <br><br><br>
                                                            </div>
                                                        </tr> -->
                                                        <tr>
                                                            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp; START</label></td>
                                                            <td>
                                                                <div class="input-group add_start">
                                                                    <input id="start1" style="border-radius:0;background-color:white;" name="start[]" class="form-control" readonly>
                                                                    <div>
                                                                        <span style="border-radius:0;background-color:white;" class="input-group-text form-control">
                                                                            <a href="#" id="" data-toggle="modal" data-target="#myUser" onclick="myUserStart(1)"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                        </span>
                                                                    </div>
                                                                    <br><br>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <span style="border-radius:0;background-color:white;" class="input-group-text form-control">
                                                                        <a class="add_start_button"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt=""></a>
                                                                    </span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span style="margin-left:20px;"><img src="{{ asset('AdminLTE-master/dist/img/botttom-arrow.png') }}" width="15" alt=""></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>&nbsp;&nbsp;&nbsp; INTERMEDIATE</label></td>
                                                            <td>
                                                                <div class="input-group add_intermediate">
                                                                    <input id="intermediate1" style="border-radius:0;background-color:white;" name="intermediate[]" class="form-control" readonly>
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;background-color:white;" class="input-group-text form-control">
                                                                            <a href="#" id="" data-toggle="modal" data-target="#myUser" onclick="myUserIntermediate(1)"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                        </span>
                                                                    </div>
                                                                    <br><br>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <span style="border-radius:0;background-color:white;" class="input-group-text form-control">
                                                                        <a class="add_intermediate_button"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt=""></a>
                                                                    </span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span style="margin-left:20px;"><img src="{{ asset('AdminLTE-master/dist/img/botttom-arrow.png') }}" width="15" alt=""></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp; END</label></td>
                                                            <td>
                                                                <div class="input-group add_end">
                                                                    <input id="end1" style="border-radius:0;background-color:white;" name="end[]" class="form-control" readonly>
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;background-color:white;" class="input-group-text form-control">
                                                                            <a href="#" id="" data-toggle="modal" data-target="#myUser" onclick="myUserEnd(1)"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                        </span>
                                                                    </div>
                                                                    <br><br>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <span style="border-radius:0;background-color:white;" class="input-group-text form-control">
                                                                        <a class="add_end_button"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt=""></a>
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
                                                            <td style="padding-top: 5px;"><label> <i class="fa fa-file nav-icon-sm" style="color:#4B586A;"></i> START</label></td>
                                                        </tr>
                                                        @foreach ($start as $key => $value)
                                                        <tr>
                                                            <td>
                                                                <div class="input-group add_start">
                                                                    <input id="start1" style="border-radius:0;background-color:white;" name="start[]" class="form-control" readonly value="{{ $value }}">
                                                                    <br><br>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                        @foreach ($intermediate as $key => $value)
                                                        <td style="padding-top: 5px;"><label><i class="fa fa-file nav-icon-sm" style="color:#4B586A;"></i> INTERMEDIATE {{ $key+1 }}</label></td>
                                                        <tr>
                                                            <td>
                                                                <div class="input-group add_start">
                                                                    <input id="start1" style="border-radius:0;background-color:white;" name="start[]" class="form-control" readonly value="{{ $value }}">
                                                                    <br><br>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @foreach ($end as $key => $value)
                                                        <td style="padding-top: 5px;"><label><i class="fa fa-file nav-icon-sm" style="color:#4B586A;"></i> END {{ $key+1 }}</label></td>
                                                        <tr>
                                                            <td>
                                                                <div class="input-group add_start">
                                                                    <input id="start1" style="border-radius:0;background-color:white;" name="start[]" class="form-control" readonly value="{{ $value }}">
                                                                    <br><br>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        @endforeach
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