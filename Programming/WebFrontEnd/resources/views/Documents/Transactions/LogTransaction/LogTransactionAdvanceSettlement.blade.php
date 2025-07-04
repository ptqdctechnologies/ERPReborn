@extends('Partials.app')
@section('main')

<!-- Log Transaction css -->
<link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/log-transaction.min.css') }}">

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <div class="text-center" style="width: 100%;">
                                    <h3 style="text-transform: uppercase; font-weight: bold;">
                                        Revision History for {{ $documentName }} : {{ $documentNumber }}
                                    </h3>
                                </div>
                                <div class="d-flex" style="flex-direction: column; justify-content: center;">
                                <form id="showDocumentForm" method="POST" action="{{ route('CheckDocument.ShowDocument') }}" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="businessDocument_RefID" value="<?= $dataHeader[0]['content']['sys_PID']; ?>" />
                                    <input type="hidden" name="businessDocumentType_Name" value="<?= $documentName; ?>" />
                                    <input type="hidden" name="businessDocumentNumber" value="<?= $documentNumber; ?>" />
                                    <button type="submit" class="btn btn-default btn-sm" style="border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="">
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div id="container">
                                <div class="table-responsive table-height">
                                    <table class="table table-bordered table-striped table-hover table-sticky table-sm">
                                        <thead>
                                            <tr>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" rowspan="3"> Product Code</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" rowspan="3"> Product Name</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" rowspan="3"> UOM</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" colspan="6"> Settlement</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" rowspan="3"> Balance</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="6"> Rev 1 - Icha Mailinda Syamsoedin (Submitted) - ( 2025-06-25 )</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" rowspan="3"> Balance</th>
                                            </tr>
                                            <tr>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" colspan="3"> Expense Claim</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" colspan="3">Amount to the Company</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="3"> Expense Claim</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="3">Amount to the Company</th>
                                            </tr>
                                            <tr>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center"> Qty</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center"> Price</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center"> Total</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center"> Qty</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center"> Price</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center"> Total</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center"> Qty</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center"> Price</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center"> Total</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center"> Qty</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center"> Price</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center"> Total</th>
                                            </tr>
                                        </thead>
                                            
                                        <tbody>
                                            <tr>
                                                <td style="padding: 8px;">2000185</td>
                                                <td style="padding: 8px;">Install KWH Box</td>
                                                <td style="padding: 8px;">ea</td>
                                                <td style="padding: 8px;">0.30</td>
                                                <td style="padding: 8px;">4,184.67</td>
                                                <td style="padding: 8px;">1,255.40</td>

                                                <td style="padding: 8px;">0.55</td>
                                                <td style="padding: 8px;">3,482.95</td>
                                                <td style="padding: 8px;">1,915.62</td>
                                                <td style="padding: 8px;">9,999.99</td>

                                                <td style="padding: 8px;">0.30</td>
                                                <td style="padding: 8px;">4,184.67</td>
                                                <td style="padding: 8px;">1,255.40</td>

                                                <td style="padding: 8px;">0.55</td>
                                                <td style="padding: 8px;">3,482.95</td>
                                                <td style="padding: 8px;">1,915.62</td>
                                                <td style="padding: 8px;">9,999.99</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="card">
                            <div id="container">
                                <div class="table-responsive table-height">
                                    <table class="table table-bordered table-striped table-hover table-sticky table-sm">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;"> Requester</th>
                                                <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;"> Beneficiary</th>
                                                <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;"> Note</th>
                                                <th colspan="3" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Rev 1</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;top: 23px;"> Requester</th>
                                                <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;top: 23px;"> Beneficiary</th>
                                                <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;top: 23px;"> Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding: 8px;">Jajang</td>
                                                <td style="padding: 8px;">Dadan</td>
                                                <td style="padding: 8px;">Update</td>
                                                <td style="padding: 8px;">Tono</td>
                                                <td style="padding: 8px;">Tina</td>
                                                <td style="padding: 8px;">Update</td>
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
    </div>
</section>
@endsection