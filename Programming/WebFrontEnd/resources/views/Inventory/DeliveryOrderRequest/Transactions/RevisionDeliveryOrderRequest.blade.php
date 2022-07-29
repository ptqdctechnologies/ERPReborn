@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getRequester')
@include('getFunction.getProduk')
@include('getFunction.getPr')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form method="post" enctype="multipart/form-data" action="#" name="formHeaderDor">
                    <div class="tab-content p-3" id="nav-tabContent">
                        @include('Inventory.DeliveryOrderRequest.Functions.Header.headerDor')
                </form>
                <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="product-desc-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        PR Detail
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>
                                @include('Inventory.DeliveryOrderRequest.Functions.Table.tablePrDetail')
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
                                            Detail DOR
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
                                                            <td><label>PR Number</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input name="prNumberDorDetail" id="prNumberDorDetail" style="border-radius:0;" type="text" class="form-control">

                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Project</label></td>
                                                            <td>
                                                                <input name="projectDorDetail" id="projectDorDetail" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input name="projectDorDetail2" id="projectDorDetail2" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Site</label></td>
                                                            <td>
                                                                <input name="siteDorDetail" id="siteDorDetail" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input name="siteDorDetail2" id="siteDorDetail2" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Work Id</label></td>
                                                            <td>
                                                                <input name="workIdDorDetail" id="workIdDorDetail" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input name="workIdDorDetail2" id="workIdDorDetail2" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Product Id</label></td>
                                                            <td>
                                                                <input name="productIdDorDetail" id="productIdDorDetail" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input name="productIdDorDetail2" id="productIdDorDetail2" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td><label>PR Price</label></td>
                                                            <td>
                                                                <input name="priceDorDetail" id="priceDorDetail" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><Label>Average Price</Label></td>
                                                            <td>
                                                                <input name="averageDorDetail" id="averageDorDetail" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><Label>Qty Request</Label></td>
                                                            <td>
                                                                <input name="qtyDorDetail" id="qtyDorDetail" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input name="qtyDorDetail2" id="qtyDorDetail2" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><Label>Discount</Label></td>
                                                            <td>
                                                                <input name="discountDorDetail" id="discountDorDetail" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input name="discountDorDetail2" id="discountDorDetail2" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><Label>After Discount</Label></td>
                                                            <td>
                                                                <input name="afterDiscountDorDetail" id="afterDiscountDorDetail" style="border-radius:0;" type="text" class="form-control">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-title" style="border:5px solid #DCDCDC;width:100%;">
                                                            <p style="position:relative;text-align:center;top:7px;">Available Total</p>
                                                        </div>
                                                        <div class="card-body table-responsive p-0 available" style="height: 108px;">
                                                            <table>
                                                                <tbody>
                                                                    <br>
                                                                    <tr>
                                                                        <td title="Total BOQ Detail"><label>PR Qty</label></td>
                                                                        <td>:</td>
                                                                        <td style="font-weight:bold;">
                                                                            <input name="price" id="prQty" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control">
                                                                        </td>
                                                                        <td>Ls</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label>In DOR Qty</label></td>
                                                                        <td>:</td>
                                                                        <td style="font-weight:bold;">
                                                                            <input name="price" id="inDorQty" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control">
                                                                        </td>
                                                                        <td>Ls</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label>Balance Qty</label></td>
                                                                        <td>:</td>
                                                                        <td style="font-weight:bold;color:red;">
                                                                            <input name="price" id="balanceQty" style="border-radius:0;background-color:white;border:1px solid white;color:red;" type="text" class="form-control">
                                                                        </td>
                                                                        <td>Ls</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label>New Balance Qty</label></td>
                                                                        <td>:</td>
                                                                        <td style="font-weight:bold;color:red;">
                                                                            <input name="price" id="newBalanceQty" style="border-radius:0;background-color:white;border:1px solid white;color:red;" type="text" class="form-control">
                                                                        </td>
                                                                        <td>Ls</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="reset" class="btn btn-outline btn-danger btn-sm float-right">
                                                    <i class="fa fa-times" aria-hidden="true" title="Cancel to Add DOR List Cart">Cancel</i>
                                                </button>
                                                <a class="btn btn-success btn-sm float-right" href="javascript:validateFormDetailDor()"><i class="fas fa-plus" aria-hidden="true">Add to List Cart</i></a>
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
                                    DOR Cart
                                </label>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0" id="detailDorList">
                                <table id="tableDorCart" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Trano</th>
                                            <th>Project</th>
                                            <th>Site</th>
                                            <th>Product Id</th>
                                            <th>Product Name</th>
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
@include('Inventory.DeliveryOrderRequest.Functions.Footer.footerDor')
@endsection