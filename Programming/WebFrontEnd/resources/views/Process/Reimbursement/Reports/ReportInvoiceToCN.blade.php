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
                        Report Invoice to Credit Note
                    </label>
                </div>
            </div>

            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row p-1" style="row-gap: 1rem;">
                                        @include('Process.Reimbursement.Functions.Header.HeaderReportInvoiceToCN')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12" id="table_container" style="display: none;">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="d-flex justify-content-between">
                                        <label>
                                            Show
                                            <select id="limitSelect" style="border: 1px solid #aaa; border-radius: 3px; padding: 4px; background: transparent;">
                                                <option value="10" selected>10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                            entries
                                        </label>
                                        <label>
                                            Search:
                                            <input type="text" id="searchInput" autocomplete="off" placeholder="Search..." style="border: 1px solid #aaa; border-radius: 3px; padding: 5px; margin-left: 3px; background: transparent;" />
                                        </label>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-head-fixed text-nowrap" id="table_summary">
                                            <thead>
                                                <tr>
                                                    <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">No</th>
                                                    <th colspan="10" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Invoice</th>
                                                    <th colspan="8" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Credit Note</th>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Number</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Budget</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Date</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Customer</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Invoice IDR</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Invoice Other Currency</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Invoice Equivalent IDR</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Number</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Date</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">CN IDR</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">CN Other Currency</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">CN Equivalent IDR</th>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <!-- <tfoot>
                                                <tr style="font-weight:bold; background-color:#4B586A; color:white;">
                                                    <td colspan="5" style="text-align:center;">GRAND TOTAL</td>
                                                    
                                                    <td style="text-align:left;"><?php number_format(0, 2, '.', ','); ?></td>
                                                    <td style="text-align:left;"><?php number_format(0, 2, '.', ','); ?></td>
                                                    
                                                    <td style="text-align:left;"><?php number_format(0, 2, '.', ','); ?></td>
                                                    <td style="text-align:left;"><?php number_format(0, 2, '.', ','); ?></td>
                                                    
                                                    <td style="text-align:left;"><?php number_format(0, 2, '.', ','); ?></td>
                                                    <td style="text-align:left;"><?php number_format(0, 2, '.', ','); ?></td>
                                                    
                                                    <td colspan="2"></td>
                                                    
                                                    <td style="text-align:left;"><?php number_format(0, 2, '.', ','); ?></td>
                                                    <td style="text-align:left;"><?php number_format(0, 2, '.', ','); ?></td>
                                                    
                                                    <td style="text-align:left;"><?php number_format(0, 2, '.', ','); ?></td>
                                                    <td style="text-align:left;"><?php number_format(0, 2, '.', ','); ?></td>
                                                    
                                                    <td style="text-align:left;"><?php number_format(0, 2, '.', ','); ?></td>
                                                    <td style="text-align:left;"><?php number_format(0, 2, '.', ','); ?></td>
                                                </tr>
                                            </tfoot> -->
                                        </table>
                                    </div>

                                    <div class="d-flex justify-content-between" style="padding-top: .755em; padding-bottom: .755em;">
                                        <div>
                                            Showing <span id="start_limit">1</span> to <span id="end_limit">10</span> of <span id="total_data">68</span> entries
                                        </div>

                                        <div id="controls" style="cursor: pointer;">
                                            <a class="paginate_button previous" id="prevPage">Previous</a>
                                            <span id="pageNumbers"></span>
                                            <a class="paginate_button next" id="nextPage">Next</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Process.Reimbursement.Functions.Footer.FooterReportInvoiceToCN')
@include('Partials.footer')
@endsection