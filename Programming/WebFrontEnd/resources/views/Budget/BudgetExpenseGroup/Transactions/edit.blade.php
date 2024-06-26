@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    @foreach($data as $datax)
                    <form method="post" enctype="multipart/form-data" action="{{ route('BudgetExpenseGroup.update', $datax['sys_ID']) }}" name="formHeaderMret">
                        <div class="row">
                            @method('PUT')
                            @csrf
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Edit Budget Expense Group
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
                                                        <td><label>Name</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="name" name="name" class="form-control" value="{{ $datax['name'] }}">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <!-- <tr>
                                                            <td><label>Start Date</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" type="date" id="start" name="start" class="form-control" value="{{ $datax['validStartDateTimeTZ'] }}">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>End Date</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" type="date" id="end" name="end" class="form-control" value="{{ $datax['validFinishDateTimeTZ'] }}">
                                                                </div>
                                                            </td>
                                                        </tr> -->
                                                        <tr>
                                                            <td><label>Code</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <select id="code" name="code" class="form-control">
                                                                        <option value="OPEX">OPEX</option>
                                                                        <option value="CAPEX">CAPEX</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <button type="reset" class="btn btn-outline btn-danger btn-sm float-right" id="addTranoType" style="margin-right: 5px;">
                                                    <i class="fas fa-plus" aria-hidden="true">Reset</i>
                                                </button>
                                                <button type="submit" class="btn btn-outline btn-success btn-sm float-right" id="addTranoType" style="margin-right: 5px;">
                                                    <i class="fas fa-plus" aria-hidden="true">Submit</i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
@include('Partials.footer')
@endsection