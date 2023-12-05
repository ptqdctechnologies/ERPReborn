@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">DOR Detail Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        @if($var == 1)
                            <div class="col-12 ShowDocument">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 10px;"><label>DOR Number&nbsp;</label></th>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="budget_id" style="border-radius:0;" class="form-control" name="budget_id" type="hidden">
                                                                    <input id="budget" style="border-radius:0;background-color:white;" class="form-control myProject" name="budget" readonly data-toggle="modal" data-target="#myProject">
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#" id="budget_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <button class="btn btn-default btn-sm" type="submit">
                                                                    <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="" title="Show"> Show
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <select name="" id="" class="form-control">
                                                                    <option value="PDF">PDF</option>
                                                                    <option value="Excel">Excel</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                &nbsp;&nbsp;<span><img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt=""></span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 ShowTableReportAdvanceSummary">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>DOR Number&nbsp;</label></th>
                                                            <td>
                                                                PR02-23000210
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                                                            <td>
                                                                Q000195 - Civil Work Batch 2 Pembangunan Pabrik Smelter Feronikel Kolaka
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Sub Budget&nbsp;</label></th>
                                                            <td>
                                                                1000 - Overhead
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Date&nbsp;</label></th>
                                                            <td>
                                                                11/15/2023
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Delivery From&nbsp;</label></th>
                                                            <td>
                                                                QDC
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Delivery To&nbsp;</label></th>
                                                            <td>
                                                                Gudang Tigaraksa
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>PIC&nbsp;</label></th>
                                                            <td>
                                                                PM
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PR Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Product Id</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Unit Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Remark</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>PR-230000001</td>
                                                    <td>1001806-Miscellaneous Material</td>
                                                    <td>1</td>
                                                    <td>66.000</td>
                                                    <td>66.000</td>
                                                    <td>Qwerty</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>PR-230000002</td>
                                                    <td>1001806-Miscellaneous Material</td>
                                                    <td>1</td>
                                                    <td>77.000</td>
                                                    <td>77.000</td>
                                                    <td>Qwerty</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('Partials.footer')
@endsection