@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getSupplierSpecialization')
    @include('Master.SpecializationSupplier.Functions.PopUp.PopUpSpecializationSupplierRevision')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Revision Sub Category Supplier
                        </label>
                    </div>
                </div>

                @include('Master.SpecializationSupplier.Functions.Menu.index')

                <form id="specializationSupplierForm">
                    @csrf
                    @method('PUT')

                    <input type="hidden" class="form-control" id="categoryCode" name="categoryCode"
                        value="<?= $categoryCode; ?>" style="border-radius:0;" autocomplete="off">

                    <div class="card">
                        <!-- MASTER SPECIALIZATION SUPPLIER -->
                        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Master Sub Category
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Budget Information">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        <div class="card-body">
                                            <div class="row py-3" style="gap: 1rem;">
                                                <!-- LEFT -->
                                                <div class="col-md-12 col-lg-5">
                                                    <!-- CODE -->
                                                    <div class="row">
                                                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                            Code
                                                        </label>
                                                        <div class="col-5">
                                                            <div class="input-group">
                                                                <input class="form-control" id="sub_category_code"
                                                                    name="sub_category_code"
                                                                    value="<?= $specializationCode; ?>"
                                                                    style="border-radius:0;" autocomplete="off" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- NAME -->
                                                    <div class="row" style="margin-top: 1rem;">
                                                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                            Name
                                                        </label>
                                                        <div class="col-5">
                                                            <div class="input-group">
                                                                <input class="form-control" id="sub_category_name"
                                                                    name="sub_category_name"
                                                                    value="<?= $specializationName; ?>"
                                                                    style="border-radius:0;" autocomplete="off" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- RIGHT -->
                                                <div class="col-md-12 col-lg-5">
                                                    <!-- STATUS -->
                                                    <div class="row">
                                                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                            Status
                                                        </label>
                                                        <div class="col-5 d-flex" style="gap: 1rem;">
                                                            <div class="form-check d-flex align-items-center">
                                                                <input class="form-check-input" type="radio"
                                                                    name="sub_category_status" id="active" value="1"
                                                                    <?= $specializationStatus == '1' ? 'checked' : ''; ?> />
                                                                <label class="form-check-label" for="active">Active</label>
                                                            </div>
                                                            <div class="form-check d-flex align-items-center">
                                                                <input class="form-check-input" type="radio"
                                                                    name="sub_category_status" id="inactive" value="0"
                                                                    <?= $specializationStatus == '0' ? 'checked' : ''; ?> />
                                                                <label class="form-check-label"
                                                                    for="inactive">Inactive</label>
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

                        <!-- BUTTON -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col text-right">
                                    <button type="button" class="btn btn-sm"
                                        onclick="cancelForm('{{ route('SpecializationSupplier.index') }}')"
                                        style="background-color: #e9ecef; border:1px solid #ced4da; margin-right: 3px;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt=""
                                            title="Cancel" />
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-sm"
                                        style="background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt=""
                                            title="Submit" />
                                        Submit
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
    @include('Master.SpecializationSupplier.Functions.Footer.revision')
@endsection