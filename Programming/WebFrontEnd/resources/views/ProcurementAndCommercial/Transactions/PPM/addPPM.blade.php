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
                                                Add New Progress Piece Meal
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @include('ProcurementAndCommercial.Functions.setHeaderPPM')
                                    </div>
                                </div>
                            </div>
                            @include('ProcurementAndCommercial.Functions.sectBOQ3')
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="card-title">
                                                Detail Progress Piece Meal
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
                                                                        <input required="" id="putWorkId" style="border-radius:0;" type="text" class="form-control" value="">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Product Id</label></td>
                                                                    <td>
                                                                        <input required="" id="putProductId" style="border-radius:0;" type="text" class="form-control">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Product Name</label></td>
                                                                    <td>
                                                                        <input required="" id="putProductId" style="border-radius:0;" type="text" class="form-control">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Qty</label></td>
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
                                                                    <td>
                                                                        <input name="price_detail" id="putCurrency" style="border-radius:0;width:40px;" type="text" class="form-control" readonly="">
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
                                                        <button class="btn btn-outline-success btn-sm float-right" id="buttonppmList" style="margin-right:5px;" title="Add to ARF List(Cart)">
                                                            <span><a href="#"> Add to PPM List(Cart) </a></span>
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
                                                    Progress Piece Meal List (Cart)
                                                </label>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body table-responsive p-0" id="detailppmList">
                                                <table class="table table-head-fixed text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Delete</th>
                                                            <th>Product Id</th>
                                                            <th>Description</th>
                                                            <th>Qty</th>
                                                            <th>Uom</th>
                                                            <th>Price</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="removeppmList">
                                                        <tr>
                                                            <td>
                                                                <center><button type="button" class="btn btn-outline-danger btn-rounded btn-sm my-0 remove-arf-list" id="removeButton"><i class="fa fa-trash"></i></button></center>
                                                            </td>
                                                            <td contenteditable="false" id="ppmListProductId"></td>
                                                            <td contenteditable="false" id="ppmListProductName"></td>
                                                            <td contenteditable="true"><input name="qty" id="ppmListQty" style="border-radius:0;width:50px;border:1px solid white;" type="text" class="form-control ChangeQtys" autocomplete="off"></td>
                                                            <td contenteditable="false" id="ppmListUom"></td>
                                                            <td contenteditable="false" id="ppmListPrice"></td>
                                                            <td contenteditable="false" id="ppmListTotal"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <a href="{{ url('ppmList/cancel/') }}" class="btn btn-outline-danger btn-sm float-right remove-arf-list" title="Cancel">
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
        @include('ProcurementAndCommercial.Functions.footerFunctionPPM')
    @endsection