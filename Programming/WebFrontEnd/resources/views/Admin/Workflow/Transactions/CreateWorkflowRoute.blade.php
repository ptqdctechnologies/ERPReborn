@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Workflow Route
                        </label>
                    </div>
                </div>

                @include('Admin.Workflow.Functions.Menu.MenuWorkflow')

                @if($var == 0)
                    <!-- CONTENT -->
                    <div class="card">
                        <!-- WORKFLOW TYPE -->
                        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Workflow Type
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Workflow Type">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="row py-3" style="gap: 1rem;">
                                                <div class="col-md-12 col-lg-4">
                                                    <!-- BUDGET -->
                                                    <div class="row">
                                                        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Budget
                                                            Code</label>
                                                        <div class="col-4 d-flex p-0">
                                                            <div>
                                                                <span style="border-radius:0;"
                                                                    class="input-group-text form-control">
                                                                    <a href="javascript:;" id="myProjectTrigger"
                                                                        data-toggle="modal" data-target="#myProjects"
                                                                        style="display: block;">
                                                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}"
                                                                            width="13" alt="myProjectTrigger">
                                                                    </a>

                                                                    <div id="loadingBudget"
                                                                        class="spinner-border spinner-border-sm" role="status"
                                                                        style="display: none;">
                                                                        <span class="sr-only">Loading...</span>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div style="flex: 100%;">
                                                                <div class="input-group">
                                                                    <input id="project_name"
                                                                        style="border-radius:0; background-color: white;"
                                                                        class="form-control" readonly>
                                                                    <input id="project_code" style="border-radius:0;"
                                                                        class="form-control" hidden>
                                                                    <input id="project_id" style="border-radius:0;"
                                                                        class="form-control" hidden>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-lg-5">
                                                    <!-- BUDGET -->
                                                    <div class="row">
                                                        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Transaction
                                                            Type</label>
                                                        <div class="col-4 d-flex p-0">
                                                            <div>
                                                                <span style="border-radius:0;"
                                                                    class="input-group-text form-control">
                                                                    <a href="javascript:;" id="myProjectTrigger"
                                                                        data-toggle="modal" data-target="#myProjects"
                                                                        style="display: block;">
                                                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}"
                                                                            width="13" alt="myProjectTrigger">
                                                                    </a>

                                                                    <div id="loadingBudget"
                                                                        class="spinner-border spinner-border-sm" role="status"
                                                                        style="display: none;">
                                                                        <span class="sr-only">Loading...</span>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div style="flex: 100%;">
                                                                <div class="input-group">
                                                                    <input id="project_name"
                                                                        style="border-radius:0; background-color: white;"
                                                                        class="form-control" readonly>
                                                                    <input id="project_code" style="border-radius:0;"
                                                                        class="form-control" hidden>
                                                                    <input id="project_id" style="border-radius:0;"
                                                                        class="form-control" hidden>
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
                        </div>

                        <!-- WORKFLOW DETAIL -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Workflow Detail
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Workflow Detail">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="row py-3">
                                                <section class="content">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="timeline mb-0">
                                                                    <!-- START AREA -->
                                                                    <div class="d-flex align-items-center"
                                                                        style="margin-bottom: 15px; margin-right: 10px; position: relative; left: 5px; gap: 0.3rem;">
                                                                        <span class="bg-blue"
                                                                            style="border-radius: 4px; display: inline-block; font-weight: 600; padding: 5px;">START</span>
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da">
                                                                            <i class="fas fa-plus"></i>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex align-items-center" style="gap: 0.3rem;">
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da; margin-left: 60px;">
                                                                            <i class="fas fa-plus"></i>
                                                                        </div>
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da">
                                                                            <i class="fas fa-gift"></i>
                                                                        </div>
                                                                        <div style="width: fit-content;">
                                                                            <div class="input-group">
                                                                                <input class="form-control" readonly
                                                                                    style="border-radius:0; background-color: white; width: 181px;">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex align-items-center" style="gap: 0.3rem;">
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da; margin-left: 60px;">
                                                                            <i class="fas fa-minus"></i>
                                                                        </div>
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da">
                                                                            <i class="fas fa-gift"></i>
                                                                        </div>
                                                                        <div style="width: fit-content;">
                                                                            <div class="input-group">
                                                                                <input class="form-control" readonly
                                                                                    style="border-radius:0; background-color: white; width: 181px;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- START AREA -->

                                                                    <!-- NEXT 1 AREA -->
                                                                    <div class="d-flex align-items-center"
                                                                        style="margin-bottom: 15px; margin-right: 10px; position: relative; left: 5px; gap: 0.3rem;">
                                                                        <span class="bg-green"
                                                                            style="border-radius: 4px; display: inline-block; font-weight: 600; padding: 5px;">NEXT
                                                                            1</span>
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da">
                                                                            <i class="fas fa-chevron-down"></i>
                                                                        </div>
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da">
                                                                            <i class="fas fa-minus"></i>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex align-items-center" style="gap: 0.3rem;">
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da; margin-left: 60px;">
                                                                            <i class="fas fa-gift"></i>
                                                                        </div>
                                                                        <div style="width: fit-content;">
                                                                            <div class="input-group">
                                                                                <input class="form-control" readonly
                                                                                    style="border-radius:0; background-color: white; width: 181px;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- NEXT 1 AREA -->

                                                                    <!-- NEXT 2 AREA -->
                                                                    <div class="d-flex align-items-center"
                                                                        style="margin-bottom: 15px; margin-right: 10px; position: relative; left: 5px; gap: 0.3rem;">
                                                                        <span class="bg-green"
                                                                            style="border-radius: 4px; display: inline-block; font-weight: 600; padding: 5px;">NEXT
                                                                            2</span>
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da">
                                                                            <i class="fas fa-chevron-up"></i>
                                                                        </div>
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da">
                                                                            <i class="fas fa-chevron-down"></i>
                                                                        </div>
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da">
                                                                            <i class="fas fa-minus"></i>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex align-items-center" style="gap: 0.3rem;">
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da; margin-left: 60px;">
                                                                            <i class="fas fa-gift"></i>
                                                                        </div>
                                                                        <div style="width: fit-content;">
                                                                            <div class="input-group">
                                                                                <input class="form-control" readonly
                                                                                    style="border-radius:0; background-color: white; width: 181px;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- NEXT 2 AREA -->

                                                                    <!-- NEXT 3 AREA -->
                                                                    <div class="d-flex align-items-center"
                                                                        style="margin-bottom: 15px; margin-right: 10px; position: relative; left: 5px; gap: 0.3rem;">
                                                                        <span class="bg-green"
                                                                            style="border-radius: 4px; display: inline-block; font-weight: 600; padding: 5px;">NEXT
                                                                            3</span>
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da">
                                                                            <i class="fas fa-chevron-up"></i>
                                                                        </div>
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da">
                                                                            <i class="fas fa-minus"></i>
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex align-items-center" style="gap: 0.3rem;">
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da; margin-left: 60px;">
                                                                            <i class="fas fa-gift"></i>
                                                                        </div>
                                                                        <div style="width: fit-content;">
                                                                            <div class="input-group">
                                                                                <input class="form-control" readonly
                                                                                    style="border-radius:0; background-color: white; width: 181px;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- NEXT 3 AREA -->

                                                                    <!-- END AREA -->
                                                                    <div class="time-label" style="left: 15px;">
                                                                        <span class="bg-blue">END</span>
                                                                    </div>

                                                                    <div class="d-flex align-items-center" style="gap: 0.3rem;">
                                                                        <div
                                                                            style="background-color: #e9ecef; padding: 4px; border-radius: 2px; border: 1px solid #ced4da; margin-left: 60px;">
                                                                            <i class="fas fa-gift"></i>
                                                                        </div>
                                                                        <div style="width: fit-content;">
                                                                            <div class="input-group">
                                                                                <input class="form-control" readonly
                                                                                    style="border-radius:0; background-color: white; width: 181px;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END AREA -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
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
                                    <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()"
                                        style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt=""
                                            title="Submit to Account Payable"> Submit
                                    </button>

                                    <a onclick="cancelForm('{{ route('Loan.index', ['var' => 1]) }}')"
                                        class="btn btn-default btn-sm float-right"
                                        style="background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt=""
                                            title="Cancel Account Payable List Cart"> Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </div>

    @include('Partials.footer')
@endsection