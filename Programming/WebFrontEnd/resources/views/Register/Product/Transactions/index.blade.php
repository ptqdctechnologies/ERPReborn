@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getDepartement')
@include('getFunction.getRole')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Product</label>
                </div>
            </div>
            @include('Register.Product.Functions.Menu.MenuProduct')
            <div class="card" style="position:relative;bottom:10px;">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        View Product
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body table-responsive p-0" style="max-height:410px;">
                                                    <table class="table table-sm table-head-fixed text-nowrap TableProduct" id="TableProduct">
                                                        <thead>
                                                            <tr>
                                                                <th style="padding:10px 0px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                                <th style="padding:10px 0px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">ID</th>
                                                                <th style="padding:10px 0px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $no = 1; @endphp
                                                            @foreach($dataProduct['data']['data'] as $dataProducts)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $dataProducts['sys_ID'] }}</td>
                                                                <td>{{ $dataProducts['name'] }}</td>
                                                            </tr>
                                                            @endforeach
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
                </div>
            </div>
        </div>
    </section>
</div>
@include('Partials.footer')
@include('Register.Product.Functions.Footer.FooterProduct')
@endsection