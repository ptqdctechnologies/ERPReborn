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
                    <label style="font-size:15px;position:relative;top:7px;color:white;">PO to AP Report</label>
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
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
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
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Sub&nbsp;Budget&nbsp;</label></th>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="sub_budget_id" style="border-radius:0;" class="form-control" name="sub_budget_id" type="hidden">
                                                                    <input id="sub_budget" style="border-radius:0;background-color:white;" class="form-control myProject" name="sub_budget" readonly data-toggle="modal" data-target="#myProject">
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#" id="sub_budget_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>PO&nbsp;No</label></th>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="sub_budget_id" style="border-radius:0;" class="form-control" name="sub_budget_id" type="hidden">
                                                                    <input id="sub_budget" style="border-radius:0;background-color:white;" class="form-control myProject" name="sub_budget" readonly data-toggle="modal" data-target="#myProject">
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#" id="sub_budget_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Supplier&nbsp;</label></th>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="work_id" style="border-radius:0;" class="form-control" name="work_id" type="hidden">
                                                                    <input id="work" style="border-radius:0;background-color:white;" class="form-control myProject" name="work_id" readonly data-toggle="modal" data-target="#myProject">
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#" id="work_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
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
                                        <table>
                                            <tr>
                                                <th style="padding-top: 7px;"><label>Budget : &nbsp;</label></th>
                                                <td>
                                                    Q000172 - PLN UIP JBT2 150 kV Transmisi Cibatu Baru THK	
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PO No</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Value</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Inv No</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Value</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance PO-Inv</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Payment Inv</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Payment VAT</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Payment WHT</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance Inv Payment</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance VAT</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Proforma/Origin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>PO01-23000503</td>
                                                    <td>2,180,180</td>
                                                    <td>RPI01-23000733</td>
                                                    <td>2,180,180</td>
                                                    <td>0</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
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