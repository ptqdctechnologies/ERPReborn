@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getProjects')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Create Budget Progress
                        </label>
                    </div>
                </div>

                @include('Budget.BudgetProgress.Functions.Menu.Index')

                <div class="card">
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Budget Information
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                aria-label="Collapse Section Budget Information">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row py-3" style="gap: 1rem;">
                                            <!-- BUDGET CODE -->
                                            <div class="col-md-12 col-lg-3">
                                                <div class="row">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget
                                                        Code</label>
                                                    <div class="col-6 d-flex">
                                                        <div>
                                                            <span class="input-group-text form-control" data-toggle="modal"
                                                                data-target="#myProjects"
                                                                style="border-radius:0;cursor:pointer;">
                                                                <i id="iconBudget" class="fas fa-gift"></i>

                                                                <div id="loadingBudget"
                                                                    class="spinner-border spinner-border-sm" role="status"
                                                                    style="display: none;">
                                                                    <span class="sr-only">Loading...</span>
                                                                </div>
                                                            </span>
                                                        </div>
                                                        <div style="flex: 100%;">
                                                            <div class="input-group">
                                                                <input type="text" id="budget_name" class="form-control"
                                                                    style="border-radius:0; background-color: white;"
                                                                    readonly />
                                                                <input type="hidden" class="form-control" id="budget_id"
                                                                    name="budget_id" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Budget Details
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                aria-label="Collapse Section Advance Request Details">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body py-0 px-1">
                                        <div class="row justify-content-between" style="margin: 1rem 0rem;">
                                            <div class="col d-flex align-items-center" style="gap: .5rem;">
                                                <!-- <p style="min-width: fit-content; margin: 0;">Product Status: </p>
                                                                                            <select class="form-control" id="legal_entity" name="legal_entity_value"
                                                                                                style="border-radius:4px; max-width: 15%;" type="text">
                                                                                                <option value="" disabled selected>Select a Status</option>
                                                                                            </select> -->
                                            </div>
                                            <div class="col d-flex align-items-center justify-content-end"
                                                style="gap: .5rem;">
                                                <p style="min-width: fit-content; margin: 0;">Sub Budget: </p>
                                                <input type="text" id="warehouse_name" class="form-control"
                                                    placeholder="Search..." autocomplete="off"
                                                    style="border-radius: 4px; max-width: 17%;" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wrapper-budget card-body table-responsive p-0" style="height: 400px;">
                                        <table class="table table-head-fixed text-nowrap table-sm" id="tableBudgetProgress">
                                            <thead>
                                                <tr>
                                                    <th
                                                        style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                                                        Sub Budget Code</th>
                                                    <th
                                                        style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                                                        Sub Budget Name</th>
                                                    <th
                                                        style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; width: 15%;">
                                                        Last Progress</th>
                                                    <th
                                                        style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; width: 8%;padding-right: 4px;">
                                                        Current Progress</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <tfoot>
                                                <tr id="loadingTableBudgetProgress" style="display: none;">
                                                    <td colspan="4" class="p-0" style="border: 0px; height: 150px;">
                                                        <div
                                                            class="d-flex flex-column justify-content-center align-items-center py-3">
                                                            <div class="spinner-border" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                            <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                                                Loading...
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-default btn-sm float-right"
                                    style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt=""
                                        title="Submit to Stock Opname"> Submit
                                </button>
                                <button type="button" class="btn btn-default btn-sm float-right"
                                    onclick="cancelForm('{{ route('BudgetProgress.index') }}')"
                                    style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt=""
                                        title="Cancel to Stock Opname"> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('Partials.footer')
    @include('Budget.BudgetProgress.Functions.Footer.FooterCreate')
@endsection