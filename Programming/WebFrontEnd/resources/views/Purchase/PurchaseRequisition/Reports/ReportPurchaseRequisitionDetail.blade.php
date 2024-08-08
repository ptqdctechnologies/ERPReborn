@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('Purchase.PurchaseRequisition.Functions.Table.TablePurchaseRevision')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Purchase Requisition Detail Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        @include('Purchase.PurchaseRequisition.Functions.Header.HeaderReportProcReqDetail')
                        <div class="col-12 ShowTableReportPRDetailSummary" style="font-weight: bold;">
                            <div class="card">
                                <div class="card-header">
                                    <center>
                                        <h3><span style="text-transform:uppercase;font-weight:bold;">Purchase Requisition</span></h3>
                                    </center>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td style="padding-top: 5px;"><label>Budget</label></td>
                                                        <td>:</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 5px;"><label>Sub Budget Code</label></td>
                                                        <td>:</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td style="padding-top: 5px;"><label>MSR Number</label></td>
                                                        <td>:</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 5px;"><label>Date</label></td>
                                                        <td>:</td>
                                                    </tr>   
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary">
                                        <thead>
                                            <tr>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Product Id</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Material Name</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Unit Price</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                            </tr>
                                        </thead>
                                        
                                        <tfoot>
                                        <tr>
                                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="5">GRAND TOTAL PURCHASE REQUISITION</th>
                                            <td style="border:1px solid #4B586A;"></td>
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
@include('Purchase.PurchaseRequisition.Functions.Footer.FooterReportPurchaseRequisitionDetail')
@endsection