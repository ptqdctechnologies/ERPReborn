@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getDepartement')
@include('getFunction.getRole')

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
                                        Role
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
                                                                <input type="hidden" id="departement_id" style="border-radius:0;background-color:white;" name="departement_id" class="form-control">
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
                                                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Role</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="hidden" id="user_role_id" style="border-radius:0;background-color:white;" name="user_role_id" class="form-control">
                                                                <input id="user_role" style="border-radius:0;background-color:white;" name="user_role" class="form-control" readonly>
                                                                <div class="input-group-append">
                                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                                        <a href="#" id="user_role_popup" data-toggle="modal" data-target="#myRole" class="myRole"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
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
                                                                <select id="Modul" class="form-control Modul" name="Modul" style="width: 200px;">
                                                                    <option selected="selected"> Select Modul </option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td style="padding-top: 7px;"><label>Menu Type &nbsp;&nbsp;&nbsp;</label></td>
                                                        <td>
                                                            <div class="input-group" style="padding-bottom: 3px;">
                                                                {{-- <select id="Type" class="form-control Type select2" name="Type" style="width: 200px;">
                                                                    <option selected="selected"> Select Type </option>
                                                                    <option value="Transaction"> Transaction </option>
                                                                    <option value="Report"> Report </option>
                                                                </select> --}}

                                                                <select class="form-control" name="Type" id="Type" style="width: 200px;">
                                                                    <option selected="selected"> Select Type </option>
                                                                    <option value="Transaction"> Transaction </option>
                                                                    <option value="Report"> Report </option>
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
                                                                            <input type="checkbox" id="SelectAll">
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
                                                                            <input type="checkbox" id="UnSelectAll">
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
                                    <br>    

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body table-responsive p-0" style="max-height:370px;">
                                                    <table class="table table-sm table-head-fixed text-nowrap TableSubMenu" id="TableSubMenu">
                                                        <thead>
                                                            <tr>
                                                                <th style="padding:10px 0px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Menu</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <a href="{{ route('PrivilageMenu.index') }}" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Back"> Back
                                            </a>

                                            <button class="btn btn-default btn-sm float-right" id="SavePrivilageMenu" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Save"> Save
                                            </button>
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
@include('Register.PrivilageMenu.Functions.Footer.FooterPrivilageMenu')
@endsection