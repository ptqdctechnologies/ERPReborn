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
                                                    Revision Procurement Request (PR)
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
                                @include('getFunction.BOQ3')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <label class="card-title">
                                                    Detail Transaction & Available Total
                                                </label>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body" id="detailTransAvail">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <table>
                                                                <tr>
                                                                    <td><label>Work Id</label></td>
                                                                    <td>
                                                                        <input name="work_id" id="putWorkId" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                    <td>
                                                                        <input name="work_name" id="putWorkName" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Product Id</label></td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input name="product_id" id="putProductId" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                                            <div class="input-group-append">
                                                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                                                    <a href="#"><i data-toggle="modal" data-target="#myProductArf" class="fas fa-gift" style="color:grey;"></i></a>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <input name="product_name" id="putProductName" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Qty Request</label></td>
                                                                    <td>
                                                                        <input name="qty" id="qtyCek" style="border-radius:0;" type="text" class="form-control ChangeQty" value="0" autocomplete="off">
                                                                        <span id="putQtybyId"></span>
                                                                        <input name="qty" id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input name="qty_detail" id="putUom" style="border-radius:0;width:30px;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Unit Price</label></td>
                                                                    <td>
                                                                        <input name="price" id="putPrice" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                    <td>
                                                                        <input name="price_detail" id="putCurrency" style="border-radius:0;width:30px;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>PR Total</label></td>
                                                                    <td>
                                                                        <input name="price" id="totalArfDetails" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                    <td>
                                                                        <input name="price_detail" id="putCurrency" style="border-radius:0;width:30px;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>PO Total</label></td>
                                                                    <td>
                                                                        <input name="price" id="totalArfDetails" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                    <td>
                                                                        <input name="price_detail" id="putCurrency" style="border-radius:0;width:30px;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>DOR Total</label></td>
                                                                    <td>
                                                                        <input name="price" id="totalArfDetails" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                    <td>
                                                                        <input name="price_detail" id="putCurrency" style="border-radius:0;width:30px;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>DOR Qty</label></td>
                                                                    <td>
                                                                        <input name="price" id="totalArfDetails" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                    <td>
                                                                        <input name="price_detail" id="putCurrency" style="border-radius:0;width:30px;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>PO + DOR</label></td>
                                                                    <td>
                                                                        <input name="price" id="totalArfDetails" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                    <td>
                                                                        <input name="price_detail" id="putCurrency" style="border-radius:0;width:30px;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><Label>Remark</Label></td>
                                                                    <td>
                                                                        <textarea name="remark" id="putRemark" rows="3" class="form-control" required=""></textarea>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="card-title" style="border:5px solid #DCDCDC;width:100%;">
                                                                    <p style="position:relative;text-align:center;top:7px;">Available Total</p>
                                                                </div>
                                                                <div class="card-body table-responsive p-0 available" style="height: 100px;">
                                                                    <table>
                                                                        <tbody>
                                                                            <br>
                                                                            <tr>
                                                                                <td title="Total BOQ Detail"><label>Total BOQ</label></td>
                                                                                <td>:</td>
                                                                                <td style="font-weight:bold;">
                                                                                    <input name="price" id="totalBOQ" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                                                                </td>
                                                                                <td>IDR</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><label>Requester Total</label></td>
                                                                                <td>:</td>
                                                                                <td style="font-weight:bold;">
                                                                                    <input name="price" id="totalRequester" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                                                                </td>
                                                                                <td>IDR</td>
                                                                            </tr>
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
                                                        <br><br><br>
                                                        <button type="reset" class="btn btn-outline-danger btn-sm float-right detailTransaction" title="Cancel">
                                                            <i class="fa fa-times" aria-hidden="true">Cancel</i>
                                                        </button>
                                                        <button type="reset" class="btn btn-outline-success btn-sm float-right" id="buttonArfList" title="Cancel">
                                                            <i class="fa fa-plus" aria-hidden="true">Add to PR List(Cart)</i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <label class="card-title">
                                                    ARF List (Cart)
                                                </label>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body table-responsive p-0" id="detailArfList">
                                                <table class="table table-head-fixed text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Delete</th>
                                                            <th>Work Id</th>
                                                            <th>Work Name</th>
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
                                                    <tbody id="tableArfListCart">
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <a href="{{ url('arflist/cancel/') }}" class="btn btn-outline-danger btn-sm float-right remove-arf-list" title="Cancel">
                                            <i class="fa fa-times" aria-hidden="true">Cancel PR List(Cart)</i>
                                        </a>
                                        <a class="btn btn-outline-success btn-sm float-right" id="saveArfList" style="margin-right:5px;" title="Add to ARF List(Cart)">
                                            <i class="fas fa-save" aria-hidden="true" style="color:green;">Save PR List(Cart)</i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include('Partials.footer')
        @include('ProcurementAndCommercial.Functions.footerFunctionPR')
    @endsection