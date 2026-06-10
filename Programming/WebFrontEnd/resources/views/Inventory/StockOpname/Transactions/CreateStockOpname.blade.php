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

                <div class="card">
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Stock Opname Information
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                aria-label="Collapse Section Budget Information">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row py-3">
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <div class="row p-0 align-items-center">
                                                    <label
                                                        class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0 text-bold">Warehouse</label>
                                                    <div
                                                        class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                                                        <div>
                                                            <span id="myGetModalWarehousesTrigger" data-toggle="modal"
                                                                data-target="#myGetModalWarehouses"
                                                                class="input-group-text form-control"
                                                                style="border-radius:0;cursor:pointer;">
                                                                <i class="fas fa-gift"></i>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <input type="text" id="warehouse_name" class="form-control"
                                                                style="border-radius:0;background-color:white;" readonly />
                                                            <input type="hidden" id="warehouse_id" name="warehouse_id"
                                                                class="form-control"
                                                                style="border-radius:0;background-color:white;" />
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

                    <div class="tab-content px-3 pb-4" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="row m-0" style="gap: 1rem;">
                                    <!-- TOTAL ITEMS -->
                                    <div class="col"
                                        style="border: 1px solid #E6EDFF; padding: 10.5px 20px; border-radius: 12px;">
                                        <div class="row">
                                            <div class="col p-0">
                                                <p class="text-bold mb-0" style="font-size: 28px; line-height: 150%;">10
                                                </p>
                                                <p class="mb-0" style="font-size: 16px;">Total Items</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- COUNTED -->
                                    <div class="col"
                                        style="border: 1px solid #E6EDFF; padding: 10.5px 20px; border-radius: 12px;">
                                        <div class="row">
                                            <div class="col p-0">
                                                <p class="text-bold mb-0"
                                                    style="font-size: 28px; color: green; line-height: 150%;">10
                                                </p>
                                                <p class="mb-0" style="font-size: 16px;">Counted</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SHORTAGE -->
                                    <div class="col"
                                        style="border: 1px solid #E6EDFF; padding: 10.5px 20px; border-radius: 12px;">
                                        <div class="row">
                                            <div class="col p-0">
                                                <p class="text-bold mb-0"
                                                    style="font-size: 28px; color: red; line-height: 150%;">10
                                                </p>
                                                <p class="mb-0" style="font-size: 16px;">Shortage</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- REJECT UNITS -->
                                    <div class="col"
                                        style="border: 1px solid #E6EDFF; padding: 10.5px 20px; border-radius: 12px;">
                                        <div class="row">
                                            <div class="col p-0">
                                                <p class="text-bold mb-0"
                                                    style="font-size: 28px; color: brown; line-height: 150%;">10
                                                </p>
                                                <p class="mb-0" style="font-size: 16px;">Reject Units</p>
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
                                            Stock Opname Details
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                aria-label="Collapse Section Budget Information">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body py-0 px-1">
                                        <div class="row justify-content-between" style="margin: 1rem 0rem;">
                                            <div class="col d-flex align-items-center" style="gap: .5rem;">
                                                <p style="min-width: fit-content; margin: 0;">Product Status: </p>
                                                <select class="form-control" id="legal_entity" name="legal_entity_value"
                                                    style="border-radius:4px; max-width: 15%;" type="text">
                                                    <option value="" disabled selected>Select a Status</option>
                                                </select>
                                            </div>
                                            <div class="col d-flex align-items-center justify-content-end"
                                                style="gap: .5rem;">
                                                <p style="min-width: fit-content; margin: 0;">Search Product: </p>
                                                <input type="text" id="warehouse_name" class="form-control"
                                                    placeholder="Search..." autocomplete="off"
                                                    style="border-radius: 4px; max-width: 17%;" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="wrapper-budget table-responsive" style="height: 230px;">
                                                <table class="table table-head-fixed text-nowrap table-sm"
                                                    id="tableStockOpname">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                                                                Code</th>
                                                            <th
                                                                style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                                                                Name</th>
                                                            <th
                                                                style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                                                                Unit</th>
                                                            <th
                                                                style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                                                                System</th>
                                                            <th
                                                                style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; width: 115px;">
                                                                Good</th>
                                                            <th
                                                                style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; width: 115px;">
                                                                Reject</th>
                                                            <th
                                                                style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                                                                Total</th>
                                                            <th
                                                                style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                                                                Status</th>
                                                            <th
                                                                style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                                                                Owner</th>
                                                            <th
                                                                style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">
                                                                Note</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                    <tfoot>
                                                        <tr id="loadingTableStockOpname" style="display: none;">
                                                            <td colspan="11" class="p-0"
                                                                style="border: 0px; height: 150px;">
                                                                <div
                                                                    class="d-flex flex-column justify-content-center align-items-center py-3">
                                                                    <div class="spinner-border" role="status">
                                                                        <span class="sr-only">Loading...</span>
                                                                    </div>
                                                                    <div class="mt-3"
                                                                        style="font-size: 0.75rem; font-weight: 700;">
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
                                    onclick="cancelForm('{{ route('StockOpname.index') }}')"
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
    @include('Inventory.StockOpname.Functions.Footer.FooterStockOpname')
@endsection