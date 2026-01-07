@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProjects')
@include('getFunction.getSites')
@include('getFunction.getBanksAccount')
@include('getFunction.getBusinessDocumentType')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Report Cash & Bank
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
                                        @include("Finance.Journal.Functions.Header.HeaderReportJournalSummary")
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

                                    <table class="table table-head-fixed text-nowrap table-responsive" id="table_summary">
                                        <thead>
                                            <tr>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px; padding-left: .70rem;">
                                                    <div style="cursor: pointer; display: flex;justify-content: center;align-items: center;gap: 12.7px;">
                                                        <div>No</div>
                                                        <i class="fas fa-solid fa-sort"></i>
                                                    </div>
                                                </th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                    <div style="cursor: pointer; display: flex;justify-content: center;align-items: center;gap: 12.7px;">
                                                        <div>Transaction Number</div>
                                                        <i class="fas fa-solid fa-sort"></i>
                                                    </div>
                                                </th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                    <div style="cursor: pointer; display: flex;justify-content: center;align-items: center;gap: 12.7px;">
                                                        <div>Date</div>
                                                        <i class="fas fa-solid fa-sort"></i>
                                                    </div>
                                                </th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                    <div style="cursor: pointer; display: flex;justify-content: center;align-items: center;gap: 12.7px;">
                                                        <div>DB/CR</div>
                                                        <i class="fas fa-solid fa-sort"></i>
                                                    </div>
                                                </th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                    <div style="cursor: pointer; display: flex;justify-content: center;align-items: center;gap: 12.7px;">
                                                        <div>Budget</div>
                                                        <i class="fas fa-solid fa-sort"></i>
                                                    </div>
                                                </th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                    <div style="cursor: pointer; display: flex;justify-content: center;align-items: center;gap: 12.7px;">
                                                        <div>Transaction Value</div>
                                                        <i class="fas fa-solid fa-sort"></i>
                                                    </div>
                                                </th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                    <div style="cursor: pointer; display: flex;justify-content: center;align-items: center;gap: 12.7px;">
                                                        <div>Payment Value</div>
                                                        <i class="fas fa-solid fa-sort"></i>
                                                    </div>
                                                </th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                    <div style="cursor: pointer; display: flex;justify-content: center;align-items: center;gap: 12.7px;">
                                                        <div>Balance</div>
                                                        <i class="fas fa-solid fa-sort"></i>
                                                    </div>
                                                </th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                    <div style="cursor: pointer; display: flex;justify-content: center;align-items: center;gap: 12.7px;">
                                                        <div>From/To</div>
                                                        <i class="fas fa-solid fa-sort"></i>
                                                    </div>
                                                </th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                    <div style="cursor: pointer; display: flex;justify-content: center;align-items: center;gap: 12.7px;">
                                                        <div>COA Code</div>
                                                        <i class="fas fa-solid fa-sort"></i>
                                                    </div>
                                                </th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white; padding-right: .70rem;">
                                                    <div style="cursor: pointer; display: flex;justify-content: center;align-items: center;gap: 12.7px;">
                                                        <div>Attachment</div>
                                                        <i class="fas fa-solid fa-sort"></i>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>

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

@include('Finance.Journal.Functions.Footer.FooterReportJournalSummary')
@include('Partials.footer')
@endsection