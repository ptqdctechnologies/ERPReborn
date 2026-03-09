@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Report Reimbursement to Debit Note
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
                                        @include('Process.Reimbursement.Functions.Header.HeaderReportRemToDN')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12" id="table_container" style="display: none;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Process.Reimbursement.Functions.Footer.FooterReportRemToDN')
@include('Partials.footer')
@endsection