@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getProjects')
    @include('getFunction.getSuppliers')
    @include('getFunction.getLoans')
    @include('getFunction.getLoanSettlements')

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-bold" id="paymentModalLabel" style="width: stretch; text-align: center;">
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div id="modalBody"></div> -->
                    <div class="table-responsive">
                        <table class="table table-head-fixed w-100" id="paymentTable">
                            <thead>
                                <tr>
                                    <th
                                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                        No</th>
                                    <th
                                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                        Payment Number</th>
                                    <th
                                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                        Payment Date</th>
                                    <th
                                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                        Payment Value</th>
                                    <th
                                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                        Currency</th>
                                    <th
                                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                        Attachment</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Report Loan to Loan Settlement
                        </label>
                    </div>
                </div>

                <div class="card">
                    <input type="hidden" id="documentTypeRefID" value="<?= $documentTypeRefID; ?>">
                    <input type="hidden" id="organizationalDepartmentName"
                        value="<?= $sessionOrganizationalDepartmentName; ?>">
                    <input type="hidden" id="organizationalJobPositionName"
                        value="<?= $sessionOrganizationalJobPositionName; ?>">

                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-1" style="row-gap: 1rem;">
                                            @include('Process.Loan.Functions.Header.HeaderReportLoantoLoanSettlement')
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
                                                <select id="limitSelect"
                                                    style="border: 1px solid #aaa; border-radius: 3px; padding: 4px; background: transparent;">
                                                    <option value="10" selected>10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                                entries
                                            </label>
                                            <label>
                                                Search:
                                                <input type="text" id="searchInput" autocomplete="off"
                                                    placeholder="Search..."
                                                    style="border: 1px solid #aaa; border-radius: 3px; padding: 5px; margin-left: 3px; background: transparent;" />
                                            </label>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-head-fixed" id="table_summary">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="3"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;vertical-align: middle;">
                                                            No</th>
                                                        <th colspan="17"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Loan</th>
                                                        <th colspan="17"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Loan Settlement</th>
                                                        <!-- <th colspan="3"
                                                                                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                                                                                            Balance</th> -->
                                                    </tr>
                                                    <tr>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Number</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Date</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Debitor</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Creditor</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Rate (%)</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Term</th>
                                                        <th colspan="5"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Principal Loan</th>
                                                        <th colspan="3"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total Loan</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Payment</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Loan Status</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Remark</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Number</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Date</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Debitor</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Creditor</th>
                                                        <th colspan="4"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Settlement Value</th>
                                                        <th colspan="3"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Penalty Value</th>
                                                        <th colspan="3"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Interest Value</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Payment</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Loan Settlement Status</th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">
                                                            Remark</th>
                                                        <!-- <th rowspan="2"
                                                                                                                                style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                                                                                                Principal Loan to Payment</th>
                                                                                                                            <th rowspan="2"
                                                                                                                                style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                                                                                                Principal Loan to Settlement</th>
                                                                                                                            <th rowspan="2"
                                                                                                                                style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                                                                                                Settlement to Payment</th> -->
                                                    </tr>
                                                    <tr>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total IDR</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total Other Currency</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total Equivalent IDR</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Principal Loan to Payment</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Principal Loan to Settlement</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total IDR</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total Other Currency</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total Equivalent IDR</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total IDR</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total Other Currency</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total Equivalent IDR</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Settlement to Payment</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total IDR</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total Other Currency</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total Equivalent IDR</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total IDR</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total Other Currency</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Total Equivalent IDR</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="7"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                            GRAND TOTAL</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th colspan="6"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                        <th colspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-between"
                                            style="padding-top: .755em; padding-bottom: .755em;">
                                            <div>
                                                Showing <span id="start_limit">1</span> to <span id="end_limit">10</span> of
                                                <span id="total_data">68</span> entries
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

    @include('Process.Loan.Functions.Footer.FooterReportLoantoLoanSettlement')
    @include('Partials.footer')
@endsection