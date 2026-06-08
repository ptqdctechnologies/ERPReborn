@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getUom')
    @include('getFunction.getProductss')
    @include('getFunction.getProductCategories')
    @include('getFunction.getProductSubCategories')
    @include('Master.Product.Functions.PopUp.PopUpProductCategory')
    @include('Master.Product.Functions.PopUp.PopUpProductSubCategory')
    @include('Master.Product.Functions.PopUp.PopUpProductUom')
    @include('Master.Product.Functions.PopUp.PopUpProductRevision')

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

                <form id="productForm">
                    @csrf
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
                                    <button type="submit" class="btn btn-default btn-sm float-right"
                                        style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt=""
                                            title="Submit to Advance"> Submit
                                    </button>

                                    <button type="button" class="btn btn-default btn-sm float-right"
                                        onclick="cancelForm('{{ route('Product.index') }}')"
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

    @include('Partials.footer')
    @include('Master.Product.Functions.Footer.FooterCreateProduct')
@endsection