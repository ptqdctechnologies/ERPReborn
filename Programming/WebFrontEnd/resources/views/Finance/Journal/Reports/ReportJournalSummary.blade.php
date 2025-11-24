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
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Payment Journal Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12 ShowDocument">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row p-1" style="row-gap: 1rem;">
                                        @include("Finance.Journal.Functions.Header.HeaderReportJournalSummary")
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed text-nowrap TableReportDOSummary" id="DefaultFeatures">
                                        <thead>
                                            <tr>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">No</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Transaction Number</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Transaction Value</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Currency</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Payment Value</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>ADV/QDC/2025/000001</td>
                                                <td>10,000,000.00</td>
                                                <td>IDR</td>
                                                <td>10,000,000.00</td>
                                                <td>0.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td>PR/QDC/2025/000002</td>
                                                <td>12,619,600.00</td>
                                                <td>IDR</td>
                                                <td>12,619,600.00</td>
                                                <td>0.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td>ADV/QDC/2025/000003</td>
                                                <td>7,500,000.00</td>
                                                <td>IDR</td>
                                                <td>5,000,000.00</td>
                                                <td>2,500,000.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td>ADV/QDC/2025/000004</td>
                                                <td>4,200,000.00</td>
                                                <td>IDR</td>
                                                <td>4,200,000.00</td>
                                                <td>0.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td>AP/QDC/2025/000005</td>
                                                <td>9,850,000.00</td>
                                                <td>IDR</td>
                                                <td>7,000,000.00</td>
                                                <td>2,850,000.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">6</td>
                                                <td>AP/QDC/2025/000006</td>
                                                <td>15,000,000.00</td>
                                                <td>IDR</td>
                                                <td>15,000,000.00</td>
                                                <td>0.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">7</td>
                                                <td>AP/QDC/2025/000007</td>
                                                <td>6,775,000.00</td>
                                                <td>IDR</td>
                                                <td>6,000,000.00</td>
                                                <td>775,000.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">8</td>
                                                <td>ADV/QDC/2025/000008</td>
                                                <td>3,250,000.00</td>
                                                <td>IDR</td>
                                                <td>3,250,000.00</td>
                                                <td>0.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">9</td>
                                                <td>PR/QDC/2025/000009</td>
                                                <td>18,900,000.00</td>
                                                <td>IDR</td>
                                                <td>10,000,000.00</td>
                                                <td>8,900,000.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">10</td>
                                                <td>PR/QDC/2025/000010</td>
                                                <td>5,100,000.00</td>
                                                <td>IDR</td>
                                                <td>4,000,000.00</td>
                                                <td>1,100,000.00</td>
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
    </section>
</div>

@include('Partials.footer')
@endsection