@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getCities')
    @include('getFunction.getSuppliers')
    @include('getFunction.getBankLists')
    @include('getFunction.getCountries')
    @include('getFunction.getProvincies')
    @include('Master.Supplier.Functions.PopUp.PopUpSupplierRevision')
    @include('Master.Supplier.Functions.PopUp.PopUpSupplierCategory')
    @include('Master.Supplier.Functions.PopUp.PopUpSupplierSpecialization')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Create Supplier
                        </label>
                    </div>
                </div>

                @include('Master.Supplier.Functions.Menu.MenuSupplier')

                <form id="supplierForm">
                    <div class="card">
                        <!-- MASTER SUPPLIER -->
                        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Master Supplier
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Budget Information">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Master.Supplier.Functions.Header.HeaderMasterSupplier')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TYPE -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Type
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Budget Information">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Master.Supplier.Functions.Header.HeaderTypeSupplier')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FILE ATTACHMENT -->
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
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
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
                                                            <input type="text" id="dataInput_Log_FileUpload"
                                                                name="dataInput_Log_FileUpload_1" style="display:none">
                                                            <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken,
        'dataInput_Log_FileUpload',
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

                        <!-- BUTTON -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-default btn-sm float-right" data-toggle="modal"
                                        data-target="#staticBackdrop"
                                        style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt=""
                                            title="Submit to Account Payable"> Submit
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm float-right"
                                        onclick="cancelForm('{{ route('Supplier.index') }}')"
                                        style="background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt=""
                                            title="Cancel to Account Payable"> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="margin: 0px;font-weight:bold;">
                        Confirmation
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="font-size: 1.0rem; line-height: normal;">
                    Are you sure all the information you entered is correct? </br />
                    Please review your data carefully before proceeding.
                </div>
                <div class="modal-footer">
                    <button id="cancel-confirmation" type="button" class="btn btn-default"
                        data-dismiss="modal">Cancel</button>
                    <button id="submit-confirmation" type="button" class="btn btn-primary"
                        data-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>

    @include('Partials.footer')
    @include('Master.Supplier.Functions.Footer.FooterCreateSupplier')
@endsection