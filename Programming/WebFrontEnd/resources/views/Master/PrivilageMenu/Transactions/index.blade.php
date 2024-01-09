@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getDepartement')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Privilage Menu</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Employee
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Departement</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="hidden" id="departement_id" style="border-radius:0;background-color:white;" name="departement" class="form-control">
                                                                <input id="departement" style="border-radius:0;background-color:white;" name="departement" class="form-control" readonly>
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#" id="departement_popup" data-toggle="modal" data-target="#myDepartement" class="myDepartement"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Search Username</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input id="project_code" style="border-radius:0;background-color:white;" name="project_code" class="form-control" readonly>
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#" id="project_code_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                    </span>
                                                                </div>
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

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Privilages
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
                                                        <td style="padding-top: 7px;"><label>Modul &nbsp;&nbsp;&nbsp;</label></td>
                                                        <td>
                                                            <div class="input-group" style="padding-bottom: 3px;">
                                                                <select id="DocumentType" class="form-control DocumentType select2" name="DocumentType">
                                                                    <option selected="selected" value=""> Select Modul</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">
                                                                            <input type="checkbox" checked>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td style="padding-top: 7px;"><label>&nbsp;&nbsp;&nbsp;Select All</label></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">
                                                                            <input type="checkbox">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td style="padding-top: 7px;"><label>&nbsp;&nbsp;&nbsp;Unselect All</label></td>
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
@include('Master.PrivilageMenu.Functions.Footer.FooterPrivilageMenu')
@endsection