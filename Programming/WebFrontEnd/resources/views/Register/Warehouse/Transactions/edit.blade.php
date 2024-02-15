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
                <form method="post" enctype="multipart/form-data" action="{{ route('Warehouse.update', $dataWarehouse['Sys_ID']) }}" id="FormSubmitWarehouse">
                    @method('PUT')
                    @csrf
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Edit Warehouse
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Code</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="code" style="border-radius:0;" name="code" class="form-control" value="{{ $dataWarehouse['Code'] }}">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Name</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="name" style="border-radius:0;" name="name" class="form-control" value="{{ $dataWarehouse['Name'] }}">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Address </label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <textarea name="address" id="address" cols="30" rows="5" class="form-control">{{ $dataWarehouse['Address'] }}</textarea>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Description</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Active Status</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <select name="status" id="status" class="form-control">
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Is Temporary</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <select name="temporary" id="temporary" class="form-control">
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <a onclick="CancelWarehouse()" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                            <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                                        </a>

                                        <a onclick="ResetWarehouse()" class="btn btn-default btn-sm float-right" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                            <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Reset
                                        </a>

                                        <button class="btn btn-default btn-sm float-right" type="submit" id="submitArf" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                            <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@include('Register.Warehouse.Functions.Footer.FooterWarehouseRevision')
@endsection