@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getCreditNote')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">DO Detail Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12 ShowDocument">
                            @if($statusHeader == "Yes")
                                @include("Process.CreditNote.Functions.Header.HeaderReportCreditNoteDetail")
                            @endif
                        </div>
                        @if($statusDetail == 1 && $dataDO)

                        <div class="col-12 ShowTableReportAdvanceSummary">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>DO Number&nbsp;</label></th>
                                                        <th>:</th>
                                                        <td>{{ $dataDO [0]['documentNumber'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                                                        <th>:</th>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>Sub Budget&nbsp;</label></th>
                                                        <th>:</th>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>Date&nbsp;</label></th>
                                                        <th>:</th>
                                                        <td>{{date('Y-m-d', strtotime($dataDO[0]['documentDateTimeTZ']))}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>Transporter&nbsp;</label></th>
                                                        <th>:</th>
                                                        <td>
                                                            {{ $dataDO [0]['transporterName'] }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>Delivery From&nbsp;</label></th>
                                                        <th>:</th>
                                                        <td>
                                                           
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>Delivery To&nbsp;</label></th>
                                                        <th>:</th>
                                                        <td>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>PIC&nbsp;</label></th>
                                                        <th>:</th>
                                                        <td>
                                                            {{ $dataDO [0]['requesterWorkerName'] }}
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
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed text-nowrap" id="DefaultFeatures">
                                        <thead>
                                            <tr>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">DOR Number</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Product</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UOM</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Remark</th>
                                            </tr>
                                        </thead>
                                        @php $no = 1; $total = 0; @endphp
                                        @foreach($dataDO as $dataDetails)
                                        <tbody>
                                        <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;">{{ $no++ }}</td>
                                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataDetails['productCode'] }}</td>
                                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataDetails['productName'] }}</td>
                                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataDetails['qtyReq'] }}</td>
                                        <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                                        <td style="border:1px solid #4B586A;color:#4B586A;">{{$dataDetails['remarks']}}</td>
                                        </tbody>
                                        @endforeach
                                        <tfoot>
                                            <tr>
                                                <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: right;background-color:#4B586A;color:white;">Total</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;"></th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;"></th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;"></th>
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
@include('Process.CreditNote.Functions.Footer.FooterReportCreditNoteDetail')
@endsection