@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getDepartment')
    @include('getFunction.getRole')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Privilage Menu
                        </label>
                    </div>
                </div>

                <!-- CONTENT -->
                <div class="card">
                    <!-- ROLE -->
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Role
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                aria-label="Collapse Section Role">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    <div class="card-body">
                                        <div class="row py-3" style="gap: 1rem;">
                                            <!-- DEPARTMENT -->
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <div class="row">
                                                    <label
                                                        class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Department</label>
                                                    <div class="col-5 d-flex">
                                                        <div>
                                                            <span id="myDepartmentTrigger"
                                                                class="input-group-text form-control" data-toggle="modal"
                                                                data-target="#myDepartment"
                                                                style="border-radius:0;cursor:pointer;">
                                                                <i id="iconBudget" class="fas fa-gift"></i>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <input type="hidden" id="department_id" class="form-control"
                                                                name="department_id" />
                                                            <input type="text" id="department_name" class="form-control"
                                                                style="border-radius:0;" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ROLE -->
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <div class="row">
                                                    <label
                                                        class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Role</label>
                                                    <div class="col-5 d-flex">
                                                        <div>
                                                            <span id="myProjectsTrigger"
                                                                class="input-group-text form-control" data-toggle="modal"
                                                                data-target="#myProjects"
                                                                style="border-radius:0;cursor:pointer;">
                                                                <i id="iconBudget" class="fas fa-gift"></i>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <input type="hidden" id="role_id" class="form-control"
                                                                name="role_id" />
                                                            <input type="text" id="role_name" class="form-control"
                                                                style="border-radius:0;" />
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

                    <!-- PRIVILAGES -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Privilages
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                aria-label="Collapse Section Privilages">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    <div class="card-body">
                                        <div class="row py-3" style="gap: 1rem;">
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <div class="row">
                                                    <label
                                                        class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Modul</label>
                                                    <div class="col-5">
                                                        <select class="form-control" name="termOfPaymentValue"
                                                            id="termOfPaymentOption" style="border-radius:0;" type="text"
                                                            disabled>
                                                            <option disabled selected>Select a Modul</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <div class="row">
                                                    <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Menu
                                                        Type</label>
                                                    <div class="col-5">
                                                        <select class="form-control" name="termOfPaymentValue"
                                                            id="termOfPaymentOption" style="border-radius:0;" type="text"
                                                            disabled>
                                                            <option disabled selected>Select a Menu Type</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row pb-3" style="gap: 1rem;">
                                            <table class="table table-head-fixed w-100">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;color:white;vertical-align:middle;">
                                                            <div class="d-flex justify-content-between">
                                                                <div class="input-group align-items-center"
                                                                    style="gap: 8px;">
                                                                    <span class="input-group-text">
                                                                        <input type="checkbox" id="SelectAll">
                                                                    </span>
                                                                    <label class="form-check-label">Select All</label>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <span style="font-size: 14px;">MENU</span>
                                                                </div>
                                                                <div class="input-group">
                                                                </div>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="padding-left: 0.29rem;">
                                                            <div class="input-group">&nbsp;&nbsp;<span
                                                                    class="input-group-text"><input type="checkbox"
                                                                        name="Sub_Menu" id="Sub_Menu1" class="Sub_Menu"
                                                                        value="256000000000001"></span><span
                                                                    style="position: relative;top:7px;left:8px;">Login</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left: 0.29rem;">
                                                            <div class="input-group">&nbsp;&nbsp;<span
                                                                    class="input-group-text"><input type="checkbox"
                                                                        name="Sub_Menu" id="Sub_Menu1" class="Sub_Menu"
                                                                        value="256000000000001"></span><span
                                                                    style="position: relative;top:7px;left:8px;">Login</span>
                                                            </div>
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
            </div>
        </section>
    </div>

    @include('Partials.footer')
    @include('Register.PrivilageMenu.Functions.Footer.FooterPrivilageMenu')
@endsection