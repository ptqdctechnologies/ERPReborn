@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getRequester')
@include('getFunction.getProduk')
@include('getFunction.getDelivery')
@include('getFunction.getReceive')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form method="post" enctype="multipart/form-data" action="#" name="formHeaderMret">
                    <div class="tab-content p-3" id="nav-tabContent">
                        @include('Inventory.MaterialReturn.Functions.Header.headerMaterialReturn')
                </form>
                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="product-desc-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Delivery Order Detail
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>
                                @include('Inventory.MaterialReturn.Functions.Table.returnDetailDor')
                            </div>
                        </div>
                    </div>
                </div>

                <form method="post" enctype="multipart/form-data" name="formDetailDor">
                    <div class="tab-pane fade show active" id="detailTransAvail" role="tabpanel" aria-labelledby="product-desc-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Detail Material Return
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" id="detailDor">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td><label>Work Id</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input name="work_id" id="work_id" style="border-radius:0;" type="text" class="form-control">

                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Product Id</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input name="product_id" id="product_id" style="border-radius:0;" type="text" class="form-control">

                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Product Name</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input name="product_name" id="product_name" style="border-radius:0;" type="text" class="form-control">

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td><label>Remark</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input name="remark" id="remark" style="border-radius:0;" type="text" class="form-control">

                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Nect Act</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input name="nect_act" id="nect_act" style="border-radius:0;" type="text" class="form-control">

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td><label>Qty</label></td>
                                                            <td>
                                                                <input name="qty" id="qty" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input name="qty2" id="qty2" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Unit Price</label></td>
                                                            <td>
                                                                <input name="unit_price" id="unit_price" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input name="unit_price2" id="unit_price2" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <button type="reset" class="btn btn-outline btn-danger btn-sm float-right remove-arf-list">
                                                    <i class="fa fa-times" aria-hidden="true" title="Cancel DOR List Cart">Cancel</i>
                                                </button>
                                                <button type="reset"class="btn btn-success btn-sm float-right" id="addMret" style="color:white;">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                    Add to Material Return List Cart
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="card-title">
                                    Material Return List Cart
                                </label>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0" id="detailDorList">
                                <table id="tableMretCart" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Work Id</th>
                                            <th>Work Name</th>
                                            <th>Product Id</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>Uom</th>
                                            <th>Price</th>
                                            <th>Currency</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <a href="{{ url('arflist/cancel/') }}" class="btn btn-outline btn-danger btn-sm float-right remove-arf-list">
                            <i class="fa fa-times" aria-hidden="true" title="Cancel DOR List Cart">Cancel</i>
                        </a>
                        <a class="btn btn-success btn-sm float-right" href="javascript:buttonSubmitDor()" style="color:white;">
                            <i class="fa fa-save" aria-hidden="true"></i>
                            Submit DOR
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('Partials.footer')
@include('Inventory.MaterialReturn.Functions.Footer.footerMaterialReturn')
@endsection