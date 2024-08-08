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
                        @if($statusHeader == "Yes")
                        @include('Purchase.PurchaseRequisition.Functions.Header.HeaderReportProcReqDetail')
                        @endif
                        @if($statusDetail == 1 && $dataHeader != [])
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
                                                        <td>{{ $dataGeneral['budget']['combinedBudgetCodeList'][0] }} - {{ $dataGeneral['budget']['combinedBudgetNameList'][0] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 5px;"><label>Sub Budget Code</label></td>
                                                        <td>:</td>
                                                        <td>{{ $dataGeneral['budget']['combinedBudgetSectionCodeList'][0] }} - {{ $dataGeneral['budget']['combinedBudgetSectionNameList'][0] }}</td>
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
                                                        <td>{{ $dataHeader['number'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 5px;"><label>Date</label></td>
                                                        <td>:</td>
                                                        <td>{{ $dataHeader['date'] }}</td>
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
                                        @php $no = 1; $total = 0; @endphp
                                        @foreach($dataDetail as $dataDetails)
                                        @php $total += $dataDetails['entities']['priceBaseCurrencyValue'] @endphp
                                        <tbody>
                                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $no++ }}</td>
                                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataDetails['entities']['product_RefID'] }}</td>
                                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataDetails['entities']['productName'] }}</td>
                                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataDetails['entities']['quantity'] }}</td>
                                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataDetails['entities']['productUnitPriceCurrencyValue'] }}</td>
                                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($dataDetails['entities']['priceBaseCurrencyValue'],2) }}</td>
                                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($dataDetails['entities']['priceBaseCurrencyValue'],2) }}</td>
                                        </tbody>
                                        @endforeach
                                        <tfoot>
                                        <tr>
                                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="5">GRAND TOTAL PURCHASE REQUISITION</th>
                                            <td style="border:1px solid #4B586A;color:#4B586A;"><span id="GrandTotal">{{ number_format($total,2) }}</span></td>
                                            <td style="border:1px solid #4B586A;"></td>
                                        </tr>
                                        </tfoot>

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
@include('Purchase.PurchaseRequisition.Functions.Footer.FooterReportPurchaseRequisitionDetail')
@endsection