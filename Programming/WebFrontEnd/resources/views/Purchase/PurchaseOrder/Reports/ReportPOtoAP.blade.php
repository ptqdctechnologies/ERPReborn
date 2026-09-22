@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getProjects')
    @include('getFunction.getSites')
    @include('getFunction.getSuppliers')
    @include('getFunction.getPurchaseOrder')
    @include('getFunction.getAccountPayable')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Report Purchase Order to Account Payable
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
                                            @include('Purchase.PurchaseOrder.Functions.Header.HeaderReportPOtoAP')
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- style="display: none;" -->
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
                                                    <option value="ALL">All</option>
                                                </select>
                                                entries
                                            </label>
                                            <!-- <label>
                                                                                                                            Search:
                                                                                                                            <input type="text" id="searchInput" autocomplete="off"
                                                                                                                                placeholder="Search..."
                                                                                                                                style="border: 1px solid #aaa; border-radius: 3px; padding: 5px; margin-left: 3px; background: transparent;" />
                                                                                                                        </label> -->
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-head-fixed text-nowrap" id="table_summary">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            No</th>
                                                        <th colspan="10"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Purchase Order</th>
                                                        <th colspan="9"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Account Payable</th>
                                                        <!-- <th colspan="2"
                                                                                                                                style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                                                                                                Balance</th> -->
                                                    </tr>
                                                    <tr>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Number</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Budget</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Date</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Supplier</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Currency</th>
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
                                                            PO to AP Balance</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            PO Status</th>

                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Number</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Date</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            Currency</th>
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
                                                            Payment</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            AP to Payment Balance</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                            AP Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
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

    @include('Purchase.PurchaseOrder.Functions.Footer.footerReportPOtoAP')
    @include('Partials.footer')
@endsection