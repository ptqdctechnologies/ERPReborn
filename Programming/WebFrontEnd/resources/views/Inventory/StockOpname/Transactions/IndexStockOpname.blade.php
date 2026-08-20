@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getWarehouses')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Stock Opname
                        </label>
                    </div>
                </div>

                @include('Inventory.StockOpname.Functions.Menu.MenuStockOpname')

                <!-- CONTENT -->
                <div class="card">
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-1" style="row-gap: 1rem;">
                                            <div class="col-sm-12 col-md-12 col-lg-2">
                                                <div class="d-flex p-0 align-items-center" style="gap: 1rem;">
                                                    <label class="m-0 text-bold" style="flex: 0.7;">Type</label>
                                                    <div style="flex: 1;">
                                                        <select type="text" class="form-control" name="stockOpnameValue"
                                                            id="stockOpnameType" onchange="selectType(this)"
                                                            style="border-radius:0;">
                                                            <option disabled selected value="Select a Type">Select a
                                                                Type
                                                            </option>
                                                            <option value="ALL">All</option>
                                                            <option value="WAREHOUSE">Warehouse</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="containerWarehouseName" class="p-0 align-items-center"
                                                    style="gap: 1rem; margin-top: 1rem; display: none;">
                                                    <label class="m-0 text-bold" style="flex: 0.7;">Warehouse Name</label>
                                                    <div class="d-flex" style="flex: 1;">
                                                        <div>
                                                            <span id="warehouseListModalTrigger" data-toggle="modal"
                                                                data-target="#warehouseListModal"
                                                                class="input-group-text form-control"
                                                                style="border-radius:0;cursor:pointer;">
                                                                <i class="fas fa-gift"></i>
                                                            </span>
                                                        </div>
                                                        <div style="flex: auto;">
                                                            <input type="text" id="warehouse_name" class="form-control"
                                                                style="border-radius:0;background-color:white;" readonly />
                                                            <input type="hidden" id="warehouse_id" name="warehouse_id"
                                                                class="form-control"
                                                                style="border-radius:0;background-color:white;" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <div class="d-flex p-0 align-items-center" style="gap: 1rem;">
                                                    <div>
                                                        <select name="print_type" id="print_type" class="form-control">
                                                            <option value="PDF">Export PDF</option>
                                                            <option value="EXCEL">Export Excel</option>
                                                        </select>
                                                    </div>
                                                    <button type="button" class="btn btn-default btn-sm">
                                                        <span>
                                                            <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}"
                                                                width="17" alt="" />
                                                        </span>
                                                    </button>
                                                </div>

                                                <div class="d-flex p-0 align-items-center"
                                                    style="gap: 1rem; margin-top: 1rem;">
                                                    <button type="submit" class="btn btn-default btn-sm"
                                                        style="margin-top: -5px;">
                                                        <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}"
                                                            width="12" alt="show" title="Show">
                                                        Show
                                                    </button>
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        style="margin-top: -5px;">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-head-fixed w-100" id="table_stock">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                                            No</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                                            Code</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                                            Name</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                                            Unit</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                                            Good</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                                            Reject</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                                            Total</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                                            Owner</th>
                                                    </tr>
                                                </thead>
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

    @include('Inventory.StockOpname.Functions.Footer.index')
    @include('Partials.footer')
@endsection