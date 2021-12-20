@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <form method="post" enctype="multipart/form-data" action="{{ route('BudgetExpenseLineCeiling.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Add Budget
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td><label>Budget Expense Line ID</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="budgetExpenseLine_RefID" name="budgetExpenseLine_RefID" class="form-control" value="{{ $budgetExpenseLine_RefID }}" readonly>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Rate</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="rate" name="rate" class="form-control">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Value</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="value" name="value" class="form-control">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Start Date</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" type="date" id="start" name="start" class="form-control">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>End Date</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" type="date" id="end" name="end" class="form-control">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <button type="reset" class="btn btn-outline btn-danger btn-sm float-right" id="addTranoType" style="margin-right: 5px;">
                                                    <i class="fas fa-plus" aria-hidden="true">Reset</i>
                                                </button>
                                                <button type="submit" class="btn btn-outline btn-success btn-sm float-right" style="margin-right: 5px;">
                                                    <i class="fas fa-plus" aria-hidden="true">Submit</i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@include('Partials.footer')
@endsection