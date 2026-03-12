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
                        Product
                    </label>
                </div>
            </div>

            @include('Master.Product.Functions.Menu.MenuProduct')
            @if($var == 0)
                <div class="card">
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row py-3" style="gap: 1rem;">
                                            <div class="col-2 d-flex" style="gap: 1rem;">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Product Name</label>
                                                <input id="project_name_second" style="border-radius:0; background-color: white;" name="project_code_detail" class="form-control">
                                            </div>
                                            <div class="col-2 d-flex" style="gap: 1rem;">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Product Type</label>
                                                <input id="project_name_second" style="border-radius:0; background-color: white;" name="project_code_detail" class="form-control">
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
                                <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                                </button>

                                <a onclick="cancelForm('{{ route('Product.index', ['var' => 1]) }}')" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-head-fixed w-100" id="table_product">
                                                <thead>
                                                    <tr>
                                                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">No</th>
                                                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Code</th>
                                                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Name</th>
                                                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UOM</th>
                                                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="5">
                                                            <div id="loading-table" style="display:none;text-align:center;padding:20px;">
                                                                <div class="spinner-border text-primary"></div>
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
            @endif
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Master.Product.Functions.Footer.FooterProduct')
@endsection