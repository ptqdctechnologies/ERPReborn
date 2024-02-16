@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('Register.Warehouse.Functions.PopUp.PopUpWarehouseRevision')
@include('getFunction.getWarehouse')


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Warehouse</label>
                </div>
            </div>
            @include('Register.Warehouse.Functions.Menu.MenuWarehouse')
            <div class="card" style="position:relative;bottom:10px;">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        View Warehouse
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
                                                <div class="card-body table-responsive p-0" style="max-height:370px;">
                                                    <table class="table table-sm table-head-fixed text-nowrap TableWarehouse" id="TableWarehouse">
                                                        <thead>
                                                            <tr>
                                                                <th style="padding:10px 0px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Code</th>
                                                                <th style="padding:10px 0px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Name</th>
                                                                <th style="padding:10px 0px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Address</th>
                                                                <th style="padding:10px 0px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Description</th>
                                                                <th style="padding:10px 0px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Is Active</th>
                                                                <th style="padding:10px 0px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Is Temporary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($dataWarehouse as $dataWarehouses)
                                                            <tr>
                                                                <td>{{ $dataWarehouses['Code'] }}</td>
                                                                <td style="max-width:100px;overflow:auto;" title="{{ $dataWarehouses['Name'] }}">{{ $dataWarehouses['Name'] }}</td>
                                                                <td style="max-width:150px;overflow:auto;" title="{{ $dataWarehouses['Address'] }}">{{ $dataWarehouses['Address'] }}</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
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
@include('Register.Warehouse.Functions.Footer.FooterWarehouse')
@endsection