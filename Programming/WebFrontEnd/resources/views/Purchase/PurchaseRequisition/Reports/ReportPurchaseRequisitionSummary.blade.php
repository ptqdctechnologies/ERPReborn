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
                            Report Purchase Request Summary
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
                                            @include('Purchase.PurchaseRequisition.Functions.Header.HeaderReportPRSummary')
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12" id="table_container" style="display: none;">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-head-fixed w-100" id="table_summary">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                                            No</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;width: 100px">
                                                            PR Number</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">
                                                            Date</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">
                                                            Budget</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">
                                                            Date Of Delivery</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">
                                                            Delivery To</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">
                                                            Total IDR</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">
                                                            Total Other Currency</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">
                                                            Total Equivalent IDR</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">
                                                            Remark</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="6"
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
            </div>
        </section>
    </div>

    @include('Purchase.PurchaseRequisition.Functions.Footer.FooterReportPurchaseRequisitionSummary')
    @include('Partials.footer')
@endsection