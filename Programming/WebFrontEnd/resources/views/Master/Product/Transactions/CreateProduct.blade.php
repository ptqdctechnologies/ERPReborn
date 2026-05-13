@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('Master.Product.Functions.PopUp.PopUpProductCategory')
    @include('Master.Product.Functions.PopUp.PopUpProductSubCategory')
    @include('Master.Product.Functions.PopUp.PopUpProductUom')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Create Product
                        </label>
                    </div>
                </div>

                @include('Master.Product.Functions.Menu.MenuProduct')

                <div class="card">
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Master Product
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                aria-label="Collapse Section Budget Information">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @include('Master.Product.Functions.Header.HeaderMasterProduct')
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
                                        title="Submit to Advance"> Submit
                                </button>

                                <a onclick="cancelForm('{{ route('Product.index') }}')"
                                    class="btn btn-default btn-sm float-right"
                                    style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt=""
                                        title="Cancel Advance List Cart"> Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('Partials.footer')
    @include('Master.Product.Functions.Footer.FooterProduct')
@endsection