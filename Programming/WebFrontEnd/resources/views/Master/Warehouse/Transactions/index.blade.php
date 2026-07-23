@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getWarehouses')
    @include('Master.Warehouse.Functions.PopUp.PopUpWarehouseRevision')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Warehouse
                        </label>
                    </div>
                </div>

                @include('Master.Warehouse.Functions.Menu.index')

                <div class="card">
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        @include('Master.Warehouse.Functions.Header.headerIndex')
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-head-fixed w-100" id="table_warehouse">
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
                                                            Type</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                                            Address</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                                            Stock</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                                            Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                                <tfoot>
                                                    <tr id="loading-table">
                                                        <td colspan="7" class="p-0" style="height: 22rem;">
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
            </div>
        </section>
    </div>

    @include('Partials.footer')
    @include('Master.Warehouse.Functions.Footer.index')
@endsection