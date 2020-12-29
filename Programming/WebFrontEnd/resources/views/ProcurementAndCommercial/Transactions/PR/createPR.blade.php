@extends('Partials.app')
    @section('main')
        @include('Partials.navbar')
        @include('Partials.sidebar')
        @include('ProcurementAndCommercial.Functions.project')
        @include('ProcurementAndCommercial.Functions.subpc')
        @include('ProcurementAndCommercial.Functions.requester')
        @include('ProcurementAndCommercial.Functions.produk')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
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
                                        @include('ProcurementAndCommercial.Functions.sectHeader')
                                    </div>
                                </div>
                            </div>
                            @include('ProcurementAndCommercial.Functions.sectBOQ3')
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
                                            <form method="post" action="" enctype="multipart/form-data" class="arfForm2">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <table>
                                                                <tr>
                                                                    <td><label>Work Id</label></td>
                                                                    <td>
                                                                        <input required="" readonly="" id="putWorkId" style="border-radius:0;" type="text" class="form-control" value="">
                                                                    </td>
                                                                    <td>
                                                                        <input required="" readonly="" id="putWorkName" style="border-radius:0;" type="text" class="form-control">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Product Id</label></td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input required="" readonly="" id="putProductId" style="border-radius:0;" type="text" class="form-control">
                                                                            <div class="input-group-append">
                                                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                                                    <a href="#" readonly=""><i data-toggle="modal" data-target="#myProductArf" class="fas fa-gift" style="color:grey;"></i></a>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <input required="" readonly="" id="putProductName" style="border-radius:0;" type="text" class="form-control">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Qty Request</label></td>
                                                                    <td>
                                                                        <input name="qty" id="qtyCek" style="border-radius:0;" type="text" class="form-control ChangeQty" value="0">
                                                                        <input name="qty" id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input required="" readonly="" id="putUom" style="border-radius:0;width:40px;" type="text" class="form-control">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Unit Price</label></td>
                                                                    <td>
                                                                        <input name="price" id="putPrice" style="border-radius:0;" type="text" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input name="price_detail" id="putCurrency" style="border-radius:0;width:40px;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Total</label></td>
                                                                    <td>
                                                                        <input name="price" id="totalprDetails" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><Label>Remark</Label></td>
                                                                    <td>
                                                                        <textarea name="" id="putRemark" cols="23" rows="2" class="form-control"></textarea>
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
                                                        <button type="reset" class="btn btn-outline-danger btn-sm float-right detailTransaction" title="Cancel">
                                                            <i class="fa fa-times" aria-hidden="true">Cancel</i>
                                                        </button>
                                                        <button class="btn btn-outline-success btn-sm float-right" id="buttonPrList" style="margin-right:5px;" title="Add to ARF List(Cart)">
                                                            <span><a href="#"> Add to PR List(Cart) </a></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
                                            <div class="card-body table-responsive p-0" id="detailprList">
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
                                                    <tbody id="removeprList">
                                                        <tr>
                                                            <td>
                                                                <center><button type="button" class="btn btn-outline-danger btn-rounded btn-sm my-0 remove-arf-list" id="removeButton"><i class="fa fa-trash"></i></button></center>
                                                            </td>
                                                            <td contenteditable="false" id="prListWorkId"></td>
                                                            <td contenteditable="false" id="prListWorkName"></td>
                                                            <td contenteditable="false" id="prListProductId"></td>
                                                            <td contenteditable="false" id="prListProductName"></td>
                                                            <td contenteditable="true"><input name="qty" id="prListQty" style="border-radius:0;width:50px;border:1px solid white;" type="text" class="form-control ChangeQtys" autocomplete="off"></td>
                                                            <td contenteditable="false" id="prListUom"></td>
                                                            <td contenteditable="false" id="prListPrice"></td>
                                                            <td contenteditable="false" id="prListTotal"></td>
                                                            <td contenteditable="false" id="prListCurrency"></td>
                                                            <td contenteditable="false" id="prListRemark"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <a href="{{ url('prList/cancel/') }}" class="btn btn-outline-danger btn-sm float-right remove-arf-list" title="Cancel">
                                                    <i class="fa fa-times" aria-hidden="true">Cancel PR List(Cart)</i>
                                                </a>
                                                <button type="submit" class="btn btn-outline-success btn-sm float-right" style="margin-right:5px;" title="Add to ARF List(Cart)">
                                                    <i class="fas fa-save" aria-hidden="true">Save PR List(Cart)</i>
                                                </button>
                                            </div>
                                        </div>
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