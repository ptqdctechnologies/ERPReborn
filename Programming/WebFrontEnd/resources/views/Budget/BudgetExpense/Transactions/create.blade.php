@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <form method="post" enctype="multipart/form-data" action="{{ route('BudgetExpense.store') }}">
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
                                                            <td><label>Budget</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="budget_RefID" name="budget_RefID" class="form-control" value="{{ $budget_RefID }}" readonly>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><label>Budget Expense Group</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <select id="budgetExpenseGroup_RefID" name="budgetExpenseGroup_RefID" class="form-control">
                                                                    <option selected="" disabled>-- Select Budget Group -- </option>
                                                                    @foreach($data as $datas)
                                                                        <option value="{{ $datas['sys_ID'] }}">{{ $datas['name'] }}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Budget Expense Owner</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <select id="budgetExpenseOwner_RefID" name="budgetExpenseOwner_RefID" class="form-control">
                                                                    <option selected="" disabled>-- Select Budget Owner -- </option>
                                                                    @foreach($data2 as $datas2)
                                                                        <option value="{{ $datas2['sys_ID'] }}">{{ $datas2['sys_Text'] }}</option>
                                                                    @endforeach
                                                                    </select>
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