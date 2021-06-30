@extends('Partials.app')
    @section('main')
        @include('Partials.navbar')
        @include('Partials.sidebar')
        @include('getFunction.getProject')
        @include('getFunction.getSite')
        @include('getFunction.getRequester')
        @include('getFunction.getProduk')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <form method="post" enctype="multipart/form-data" class="arfForm">
                            <div class="tab-content p-3" id="nav-tabContent">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <label class="card-title">
                                                    Add New Procurement Request
                                                </label>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            @include('Purchase.ProcurementRequest.Functions.Header.headerPR')
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <label class="card-title">
                                                    Budget
                                                </label>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            @include('getFunction.BOQ3')
                                        </div>
                                    </div>
                                </div>
                                <form method="post" enctype="multipart/form-data" name="formArf2">
                                    @csrf
                                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="product-desc-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <label class="card-title">
                                                            Detail Transaction Request & Balance
                                                        </label>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" id="detailTransAvail">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <table>
                                                                        <tr>
                                                                            <td><label>Product Id</label></td>
                                                                            <td>
                                                                                <div class="input-group">
                                                                                    <input id="putProductId" style="border-radius:0;width:60px;" name="product_id" class="form-control" readonly required>
                                                                                    <div class="input-group-append">
                                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                                            <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <input name="product_name" id="putProductName" style="border-radius:0;width:95px;" type="text" class="form-control" readonly="">
                                                                            </td>
                                                                            <td>
                                                                                <div id="iconProductId" style="color: red;margin-left:5px;"></div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label>Qty</label></td>
                                                                            <td>
                                                                                <input name="qtyx" id="qtyCek" style="border-radius:0;width:90px;" type="text" class="form-control ChangeQty" value="0" autocomplete="off">
                                                                                <span id="putQtybyId"></span>
                                                                                <input name="qty" id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="qty_detail" id="putUom" style="border-radius:0;width:50px;" type="text" class="form-control" readonly="">
                                                                            </td>
                                                                            <td>
                                                                                <div id="iconQty" style="color: red;margin-left:5px;"></div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label>Unit Price</label></td>
                                                                            <td>
                                                                                <input name="price" id="priceCek" style="border-radius:0;width:90px;" type="text" class="form-control ChangePrice" value="0">
                                                                                <input name="price2" id="putPrice" style="border-radius:0;" type="hidden" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="price_detail" id="putCurrency" style="border-radius:0;width:50px;" type="text" class="form-control" readonly="">
                                                                            </td>
                                                                            <td>
                                                                                <div id="iconUnitPrice" style="color: red;margin-left:5px;"></div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label>Total</label></td>
                                                                            <td>
                                                                                <input name="price" id="totalArfDetails" style="border-radius:0;width:90px;" type="text" class="form-control" readonly="">
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <table>
                                                                        <tr>
                                                                            <td><Label>Remark</Label></td>
                                                                            <td>
                                                                                <textarea name="remark" id="putRemark" rows="5" cols="51" class="form-control" required=""></textarea>
                                                                            </td>
                                                                            <td>
                                                                                <div id="iconRemark" style="color: red;margin-left:5px;"></div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="card-title" style="border:5px solid #DCDCDC;width:100%;">
                                                                            <p style="position:relative;text-align:center;top:7px;">Balance</p>
                                                                        </div>
                                                                        <div class="card-body table-responsive p-0 available" style="height:100px;">
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td><label>Total Requested </label></td>
                                                                                        <td>:</td>
                                                                                        <td style="font-weight:bold;">
                                                                                            <input name="price" id="totalRequester" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                                                                        </td>
                                                                                        <td>IDR</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td title="Total BOQ Detail"><label>Total Qty Requested</label></td>
                                                                                        <td>:</td>
                                                                                        <td style="font-weight:bold;">
                                                                                        <input name="price" id="totalBOQ" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <br>
                                                                                    <tr>
                                                                                        <td><label>Balance</label></td>
                                                                                        <td>:</td>
                                                                                        <td style="font-weight:bold;color:red;">
                                                                                            <input name="price" id="totalBalance" style="border-radius:0;background-color:white;border:1px solid white;color:red;" type="text" class="form-control" readonly="">
                                                                                        </td>
                                                                                        <td>IDR</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="reset" class="btn btn-outline btn-danger btn-sm float-right detailTransaction">
                                                                    <i class="fa fa-times" aria-hidden="true" title="Cancel to Add Advance List Cart">Cancel</i>
                                                                </button>
                                                                <button type="reset" class="btn btn-outline btn-success btn-sm float-right" id="buttonArfList" style="margin-right: 5px;">
                                                                    <i class="fa fa-plus" aria-hidden="true" title="Add to Advance List" style="color: white;">Add</i>
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
                                                    Advance List (Cart)
                                                </label>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body table-responsive p-0" id="detailArfList">
                                                <table id="table1" class="table table-head-fixed text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Delete</th>
                                                            <th>Product Id</th>
                                                            <th>Product Name</th>
                                                            <th>Qty</th>
                                                            <th>Uom</th>
                                                            <th>Price</th>
                                                            <th>Total</th>
                                                            <th>Currency</th>
                                                            <th>Remark</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tableArfListCart"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <a href="{{ url('arflist/cancel/') }}" class="btn btn-outline btn-danger btn-sm float-right remove-arf-list">
                                            <i class="fa fa-times" aria-hidden="true" title="Cancel Advance List Cart">Cancel</i>
                                        </a>
                                        <button type="reset" class="btn btn-outline btn-success btn-sm float-right" id="saveArfList" style="margin-right: 5px;">
                                            <i class="fas fa-save" aria-hidden="true" title="Submit to Advance">Submit</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        @include('Partials.footer')
        @include('Purchase.ProcurementRequest.Functions.Footer.footerPR')
    @endsection