@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getAdvance')
    @include('getFunction.getProductss')
    @include('Process.Advance.AdvanceRequest.Functions.PopUp.revision')
    @include('Process.Advance.AdvanceRequest.Functions.PopUp.summary')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Create Advance Request
                        </label>
                    </div>
                </div>

                @include('Process.Advance.AdvanceRequest.Functions.Menu.index')

                <form id="advanceRequestForm">
                    @csrf

                    <input type="hidden" id="workflow_path_id" name="workflow_path_id" />
                    <input type="hidden" id="workflow_comment" name="workflow_comment" />

                    <div class="card">
                        <!-- BUDGET INFORMATION -->
                        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Information
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Budget Information">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Process.Advance.AdvanceRequest.Functions.Header.sectionOne')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ADVANCE REQUEST HEADER -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Header
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Advance Request Headers">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Process.Advance.AdvanceRequest.Functions.Header.sectionTwo')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ADVANCE ATTACHMENT -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Attachment
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Advance Request Attachments">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        <div class="card-body">
                                            <div class="row py-3">
                                                <div class="col-lg-5">
                                                    <div class="row">
                                                        <div class="col p-0">
                                                            <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $token,
        'advance_attachment',
        null,
        'dataInput_Return'
    ) .
        ''; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ADVANCE REQUEST DETAIL -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Detail
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Advance Request Details">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Process.Advance.AdvanceRequest.Functions.Header.sectionThree')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- REMARK -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Remark
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Advance Request Remark">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Process.Advance.AdvanceRequest.Functions.Header.sectionFour')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col">
                                    <button type="button" id="advance_submit_button"
                                        class="btn btn-default btn-sm float-right" data-toggle="modal"
                                        data-target="#advance_summary_modal" onclick="showAdvanceSummary()"
                                        style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="submit"
                                            title="Submit to Advance Request" />
                                        Submit
                                    </button>
                                    <button type="button" id="advance_cancel_button"
                                        class="btn btn-default btn-sm float-right"
                                        onclick="cancelForm('{{ route('AdvanceRequest.index') }}')"
                                        style="background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13"
                                            alt="cancel" title="Cancel to Advance Request"> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    @include('Process.Advance.AdvanceRequest.Functions.Footer.index')
    @include('Process.Advance.AdvanceRequest.Functions.Footer.create')
    @include('Partials.footer')
@endsection