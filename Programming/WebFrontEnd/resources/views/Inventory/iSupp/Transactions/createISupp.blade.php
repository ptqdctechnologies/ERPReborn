@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('Inventory.iSupp.Functions.PopUp.searchPoNumber')
@include('Inventory.iSupp.Functions.PopUp.searchDoNumber')
@include('getFunction.getWarehouse')

<div class="content-wrapper" style="position:relative;bottom:12px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">i-Supp</label>
                </div>
            </div>
            @include('Inventory.iSupp.Functions.Menu.MenuiSupp')
            @if($var == 0)
            <div class="card" style="position:relative;bottom:10px;">
                <div class="tab-content p-3" id="nav-tabContent">
                    @include('Inventory.iSupp.Functions.Header.headeriSupp')
                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="product-desc-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            PO Detail
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @include('Inventory.iSupp.Functions.Table.tablePoDetail')
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Detail i-Supp
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body" id="detailTransAvail">
                                    <div class="row">
                                        <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Product Id</th>
                                                    <th>Product Name</th>
                                                    <th>Qty</th>
                                                    <th>Remark</th>
                                                    <th>Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <td>
                                                    <input name="productiSuppDetail" id="productiSuppDetail" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                </td>
                                                <td>
                                                    <input name="productiSuppDetail2" id="productiSuppDetail2" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                </td>
                                                <td>
                                                    <input name="qtyiSuppChange" id="qtyiSuppChange" style="border-radius:0;" type="text" class="form-control ChangeQty">
                                                    <input name="qtyiSupp" id="qtyiSupp" style="border-radius:0;" type="hidden" class="form-control">
                                                </td>
                                                <td>
                                                    <input name="remarkiSuppDetail" id="remarkiSuppDetail" style="border-radius:0;width:40px;" type="text" class="form-control" readonly="">
                                                </td>
                                                <td>
                                                    <input name="balanceQtyiSupp" id="balanceQtyiSupp" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                </td>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a class="btn btn-outline btn-danger btn-sm float-right cancelDetailArf">
                                        <i class="fa fa-times" aria-hidden="true" title="Cancel to Add iSupp List Cart" style="color: white;">Cancel</i>
                                    </a>
                                    <a class="btn btn-outline btn-success btn-sm float-right" id="addFromDetailiSupptoCart" style="margin-right: 5px;">
                                        <i class="fa fa-plus" aria-hidden="true" title="Add to iSupp List" style="color: white;">Add</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        i-Supp Cart
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body" id="iSuppCart">
                                    <div class="row">
                                        <table class="table table-head-fixed text-nowrap tableiSuppCart">
                                            <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Project</th>
                                                    <th>Site</th>
                                                    <th>Work Id</th>
                                                    <th>Product Id</th>
                                                    <th>Product Name</th>
                                                    <th>Qty</th>
                                                    <th>UOM</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url('arflist/cancel/') }}" class="btn btn-outline btn-danger btn-sm float-right remove-arf-list">
                                <i class="fa fa-times" aria-hidden="true" title="Cancel DOR List Cart">Cancel</i>
                            </a>
                            <a class="btn btn-success btn-sm float-right" href="javascript:buttonSubmitDor()" style="color:white;">
                                <i class="fa fa-save" aria-hidden="true"></i>
                                Save i-Supp
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>
@include('Partials.footer')
@include('Inventory.iSupp.Functions.Footer.footeriSupp')
@endsection