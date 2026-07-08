@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getSupplierCategory')
    @include('Master.CategorySupplier.Functions.PopUp.PopUpCategorySupplierRevision')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Revision Specialization Supplier
                        </label>
                    </div>
                </div>

                @include('Master.CategorySupplier.Functions.Menu.index')

                <form id="categorySupplierForm">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <!-- MASTER CATEGORY SUPPLIER -->
                        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Master Category
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
                                                                <input class="form-control" id="category_code"
                                                                    name="category_code" value="<?= $categoryCode; ?>"
                                                                    style="border-radius:0;" autocomplete="off">
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
                                                                <input class="form-control" id="category_name"
                                                                    name="category_name" value="<?= $categoryName; ?>"
                                                                    style="border-radius:0;" autocomplete="off">
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
                                                                <input class="form-check-input" type="radio" name="status"
                                                                    id="active" checked />
                                                                <label class="form-check-label" for="active">Active</label>
                                                            </div>
                                                            <div class="form-check d-flex align-items-center">
                                                                <input class="form-check-input" type="radio" name="status"
                                                                    id="inactive" />
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
                                        onclick="cancelForm('{{ route('CategorySupplier.index') }}')"
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
    @include('Master.CategorySupplier.Functions.Footer.revision')
@endsection