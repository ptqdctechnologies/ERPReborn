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
                            Privilege Menu
                        </label>
                    </div>
                </div>

                <form id="privilege_menu_form">
                    @csrf
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
                                                                    class="input-group-text form-control"
                                                                    data-toggle="modal" data-target="#myDepartment"
                                                                    style="border-radius:0;cursor:pointer;">
                                                                    <i id="iconBudget" class="fas fa-gift"></i>
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <input type="hidden" id="department_id" class="form-control"
                                                                    name="department_id" />
                                                                <input type="text" id="department_name" class="form-control"
                                                                    readonly
                                                                    style="border-radius:0;background-color:#fff;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="departmentMessage"
                                                        style="margin-top: .3rem;display: none;">
                                                        <label
                                                            class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                                                        <div class="col text-red" id="departmentMessageText"></div>
                                                    </div>
                                                </div>

                                                <!-- ROLE -->
                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                    <div class="row">
                                                        <label
                                                            class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Role</label>
                                                        <div class="col-5 d-flex">
                                                            <div>
                                                                <span id="myRoleTrigger"
                                                                    class="input-group-text form-control"
                                                                    data-toggle="modal" data-target="#myRole"
                                                                    style="border-radius:0;cursor:not-allowed;">
                                                                    <i id="iconBudget" class="fas fa-gift"></i>
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <input type="hidden" id="role_id" class="form-control"
                                                                    name="role_id" />
                                                                <input type="text" id="role_name" class="form-control"
                                                                    readonly
                                                                    style="border-radius:0;background-color:#fff;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="roleMessage"
                                                        style="margin-top: .3rem;display: none;">
                                                        <label
                                                            class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                                                        <div class="col text-red" id="roleMessageText"></div>
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
                                                            <select class="form-control" id="modul" name="modul"
                                                                style="border-radius:0;" type="text" disabled>
                                                                <option disabled selected>Select a Modul</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="modulMessage"
                                                        style="margin-top: .3rem;display: none;">
                                                        <label
                                                            class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                                                        <div class="col text-red" id="modulMessageText"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Menu
                                                            Type</label>
                                                        <div class="col-5">
                                                            <select class="form-control" id="menu_type" name="menu_type"
                                                                style="border-radius:0;" type="text" disabled>
                                                                <option disabled selected value="">Select a Menu Type
                                                                </option>
                                                                <option value="Transaction"> Transaction </option>
                                                                <option value="Report"> Report </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="menuTypeMessage"
                                                        style="margin-top: .3rem;display: none;">
                                                        <label
                                                            class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                                                        <div class="col text-red" id="menuTypeMessageText"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row pb-3" style="gap: 1rem;">
                                                <table id="privilege_menu_table" class="table table-head-fixed w-100">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;color:white;vertical-align:middle;">
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="input-group align-items-center"
                                                                        style="gap: 8px;">
                                                                        <span class="input-group-text">
                                                                            <input type="checkbox" id="select_all">
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
                                                    <tbody></tbody>
                                                    <tfoot>
                                                        <tr id="privilege_menu_loading_table" style="display: none;">
                                                            <td class="p-0" style="border: 0px; height: 150px;">
                                                                <div
                                                                    class="d-flex flex-column justify-content-center align-items-center py-3">
                                                                    <div class="spinner-border" role="status">
                                                                        <span class="sr-only">Loading...</span>
                                                                    </div>
                                                                    <div class="mt-3"
                                                                        style="font-size: 0.75rem; font-weight: 700;">
                                                                        Loading...
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                            <div class="row" id="listMenuMessage" style="margin-top: .3rem;display: none;">
                                                <div class="col text-red" id="listMenuMessageText"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-default btn-sm float-right"
                                        style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt=""
                                            title="Submit to Privilege Menu"> Submit
                                    </button>

                                    <button type="button"
                                        onclick="cancelForm('{{ route('PrivilegeMenu.index', ['var' => 1]) }}')"
                                        class="btn btn-default btn-sm float-right"
                                        style="background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt=""
                                            title="Cancel Privilege Menu List Cart"> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    @include('Partials.footer')
    @include('Register.PrivilegeMenu.Functions.Footer.FooterPrivilegeMenu')
@endsection