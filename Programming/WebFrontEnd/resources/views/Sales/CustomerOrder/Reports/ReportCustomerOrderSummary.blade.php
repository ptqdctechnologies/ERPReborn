@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProjects')
@include('getFunction.getSites')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Customer Order Summary Report
                    </label>
                </div>
            </div>

            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12 ShowDocument">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row p-1" style="row-gap: 1rem;">
                                        @include("Sales.CustomerOrder.Functions.Header.HeaderReportCustomerOrderSummary")
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
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Sub Budget</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Value</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>235 - Bukit Pakis Sby Infill</td>
                                                <td><?= number_format(98237120, 2); ?></td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td>240 - Cendana Andalas</td>
                                                <td><?= number_format(4712983, 2); ?></td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td>221 - Halat Medan</td>
                                                <td><?= number_format(749208120, 2); ?></td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td>254 - Jatiagung Sidoarjo Infill</td>
                                                <td><?= number_format(294803, 2); ?></td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td>250 - Jemur Wonosari Sby Infill</td>
                                                <td><?= number_format(3948058, 2); ?></td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">6</td>
                                                <td>249 - Jetis Kulon Sby Infill</td>
                                                <td><?= number_format(492840872, 2); ?></td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">7</td>
                                                <td>219 - Karya Wisata Medan</td>
                                                <td><?= number_format(294830, 2); ?></td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">8</td>
                                                <td>253 - Kureksari Sby Infill</td>
                                                <td><?= number_format(6498123, 2); ?></td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">9</td>
                                                <td>217 - Mariendal Medan</td>
                                                <td><?= number_format(4761238, 2); ?></td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">10</td>
                                                <td>222 - Pancasila</td>
                                                <td><?= number_format(9538201, 2); ?></td>
                                                <td>-</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format(1370334348, 2); ?></th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"></th>
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

@include('Sales.CustomerOrder.Functions.Footer.FooterReportCustomerOrderSummary')
@include('Partials.footer')
@endsection