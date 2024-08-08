
@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getSupplier')
@include('getFunction.getWorker')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Purchase Requisition Summary</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12 ShowDocument">
                            <div class="card">
                                <form method="post" enctype="multipart/form-data" action="{{ route('PurchaseRequisition.ReportPurchaseRequisitionSummaryStore') }}" id="FormSubmitReportPurchaseRequisitionSummary">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <table>
                                            <tr>
                                            <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                                            <td>
                                                <div class="input-group">
                                                <input id="project_id" hidden name="project_id">
                                                <input id="project_code" style="border-radius:0;background-color:white;" data-toggle="modal" data-target="#myProject" class="form-control myProject" readonly name="project_code">
                                                <div class="input-group-append">
                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#" id="project_code_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
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
                                            <th style="padding-top: 7px;"><label>Sub&nbsp;Budget&nbsp;</label></th>
                                            <td>
                                                <div class="input-group">
                                                <input id="site_id" hidden name="site_id">
                                                <input id="site_code" style="border-radius:0;background-color:white;" data-toggle="modal" data-target="#mySiteCode" class="form-control mySiteCode" readonly name="site_code">
                                                <div class="input-group-append">
                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#" id="site_code_popup" data-toggle="modal" data-target="#mySiteCode" class="mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                    </span>
                                                </div>
                                                </div>
                                            </td>
                                            </tr>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <table>
                                            <tr>
                                            <th style="padding-top: 7px;"><label>Supplier&nbsp;</label></th>
                                            <td>
                                                <div class="input-group">
                                                <input id="requester_id" hidden name="requester_id">
                                                <input id="requester" style="border-radius:0;background-color:white;" data-toggle="modal" data-target="#mySupplier" class="form-control mySupplier" readonly name="requester">
                                                <div class="input-group-append">
                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#" id="requester_popup" data-toggle="modal" data-target="#myWorker" class="myWorker"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                    </span>
                                                </div>
                                                <!-- <input id="supplier_id" hidden name="supplier_id">
                                                <input id="supplier_code" style="border-radius:0;background-color:white;" data-toggle="modal" data-target="#mySupplier" class="form-control mySupplier" readonly name="supplier_code"> -->
                                                <!-- <div class="input-group-append">
                                                    <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#" id="supplier_popup" data-toggle="modal" data-target="#mySupplier" class="mySupplier"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                    </span>
                                                </div> -->
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
                                            </form>

                                            <form method="post" enctype="multipart/form-data" action="{{ route('PurchaseRequisition.PrintExportReportPurchaseRequisitionSummary') }}">
                                                @csrf
                                                <td>
                                                <select name="print_type" id="print_type" class="form-control">
                                                    <option value="PDF">PDF</option>
                                                    <option value="Excel">Excel</option>
                                                </select>
                                                </td>
                                                <td>

                                                <button class="btn btn-default btn-sm" type="submit">
                                                    <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" title="Print">
                                                </button>
                                                </td>

                                            </form>
                                            </tr>
                                        </table>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 ShowTableReportPurchaseRequisitionSummary">
                                <div class="card">
                                    <div class="card-header">
                                        <center>
                                            <h3><span style="text-transform:uppercase;font-weight:bold;">PURCHASE REQUISITION</span></h3>
                                        </center>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td style="padding-top: 5px;"><label>Budget Code</label></td>
                                                            <td>:</td>
                                                            <td><span id="budget_code"></span></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportPurchaseRequisitionSummary" id="TableReportPurchaseRequisitionSummary">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PR Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Supplier</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr style="font-weight:bolder;">
                                                    <td colspan="3">GRAND TOTAL</td>
                                                    <td><span id="TotalIdr"></span></td>
                                                    <td><span id="TotalOtherCyrrency"></span></td>
                                                    <td colspan="1"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
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
@include('Purchase.PurchaseRequisition.Functions.Footer.FooterReportPurchaseRequisitionSummary')
@endsection