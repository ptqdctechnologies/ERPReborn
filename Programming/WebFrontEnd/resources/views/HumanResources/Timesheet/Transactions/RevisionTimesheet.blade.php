@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getWorkFlow')
@include('getFunction.getTimesheet')
@include('HumanResources.Timesheet.Functions.PopUp.PopUpTimesheetRevision')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- TITLE -->
        <div class="row mb-1" style="background-color:#4B586A;">
            <div class="col-sm-6" style="height:30px;">
                <label style="font-size:15px;position:relative;top:7px;color:white;">
                    Revision Purchase Order
                </label>
            </div>
        </div>

        @include('HumanResources.Timesheet.Functions.Menu.MenuTimesheet')
    </div>

    <div class="card card-primary">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Revision Timesheet</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Revision Timesheet
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body p-0">
                                <div class="ml-3 mt-3">
                                    <button class="btn btn-success btn-sm" id="addEventButton" data-toggle="modal" data-target="#eventModal">
                                        <i class="fa fa-plus"></i> Add Activity
                                    </button>
                                </div>
                                <div id="calendar"></div>
                                <div class="py-3 pr-3 d-flex justify-content-end">
                                    {{-- <form method="post" action="{{ route('SelectWorkFlow') }}" id="FormSubmitRevisionTimesheet"> --}}
                                    {{-- @csrf --}}
                                    <input type="hidden" name="timesheetDetail" id="timesheetDetail">
                                    <input type="hidden" name="DocumentTypeID" id="DocumentTypeID">
                                    <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID" value="46000000000033">
                                        <button type="submit" class="btn btn-success btn-sm" id="submitRevisionTimesheet">
                                            <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit"> Submit
                                        </button>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@include('Partials.footer')
@include('HumanResources.Timesheet.Functions.Footer.footerRevisionTimesheet')
@endsection