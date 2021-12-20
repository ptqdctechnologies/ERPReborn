@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<!-- include('Budget.BudgetExpense.Transactions.popupBudget')
include('Budget.BudgetExpense.Functions.PopUp.searchBudget') -->

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">Budget Expense</label>
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
                                                <table id="example1" class="table table-bordered table-striped">

                                                    <a href="{{ route('BudgetExpense.create')}}?budget_RefID={{ $budget_RefID }}" class="btn btn-outline-primary btn-rounded btn-sm my-0 style=" border-radius: 100px;"><i class="fa fa-plus"></i></a>

                                                    <thead>
                                                        <tr>
                                                            <th>Sys ID</th>
                                                            <th>Sys Branch Ref ID</th>
                                                            <th>Name</th>
                                                            <th>Owner</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    @if($num == '1')
                                                    <tbody>
                                                        @foreach($data as $datas)
                                                        <tr>
                                                            <td>{{$datas['sys_ID']}}</td>
                                                            <td>{{$datas['sys_Branch_RefID']}}</td>
                                                            <td>{{$datas['name']}}</td>
                                                            <td>{{$datas['owner']}}</td>
                                                            <td>
                                                                <center>
                                                                    <form action="{{ route('BudgetExpense.destroy', $datas['sys_ID']) }}?budget_RefID={{ $budget_RefID }}" method="post">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <a href="{{ route('BudgetExpense.edit', $datas['sys_ID']) }}" class="btn btn-outline-primary btn-rounded btn-sm my-0 style=" border-radius: 100px;"><i class="fa fa-edit"></i></a>
                                                                        <button class="btn btn-outline-danger btn-rounded btn-sm my-0 style=" border-radius: 100px;" type="submit"><i class="fa fa-trash"></i></button>
                                                                    </form>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    @endif
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
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
@include('Partials.footer')
@endsection