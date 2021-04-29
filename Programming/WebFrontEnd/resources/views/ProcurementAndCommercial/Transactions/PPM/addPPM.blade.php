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
                <form method="post" enctype="multipart/form-data" action="#">
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

                                    <a href="#" class="btn btn-danger btn-sm float-right" style="margin-left: 10px;">Cancel</a>
                                    <button type="reset" class="btn btn-danger btn-sm float-right" title="Reset">
                                        <i class="fa fa-times" aria-hidden="true">Reset</i>
                                    </button>
                                    <a href="#" class="btn btn-success btn-sm float-right" style="margin-left: 10px;margin-right:10px;"><i class="fa fa-plus" aria-hidden="true">Submit</i></a>
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
                                    BOQ Details
                                </label>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                    </button>
                                </div>
                            </div>
                            @include('ProcurementAndCommercial.Functions.sectBOQPPM')
                        </div>
                    </div>
                </div>

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
                            <div class="card-body" id="detailPPM">
                                <form method="post" action="" enctype="multipart/form-data" name="formDetailPPM">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td><label>Work Id</label></td>
                                                        <td>
                                                            <input required="" id="work_id" style="border-radius:0;" type="text" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Product Id</label></td>
                                                        <td>
                                                            <input required="" id="product_id" style="border-radius:0;" type="text" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Product Name</label></td>
                                                        <td>
                                                            <input required="" id="product_name" style="border-radius:0;" type="text" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Qty</label></td>
                                                        <td>
                                                            <input name="qty" id="qty" style="border-radius:0;" type="text" class="form-control" value="0">
                                                        </td>
                                                        <td>
                                                            <input required="" readonly="" id="putUom" style="border-radius:0;width:40px;" type="text" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Unit Price</label></td>
                                                        <td>
                                                            <input name="price" id="unit_price" style="border-radius:0;" type="text" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input name="price_detail" id="putCurrency" style="border-radius:0;width:40px;" type="text" class="form-control" readonly="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Total</label></td>
                                                        <td>
                                                            <input name="price" id="total" style="border-radius:0;" type="text" class="form-control" readonly="">
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
                                                                <br>
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
                                            <button type="reset" class="btn btn-outline btn-danger btn-sm float-right detailTransaction">
                                                <i class="fa fa-times" aria-hidden="true" title="Cancel to Add ARF List Cart">Cancel</i>
                                            </button>
                                            <a class="btn btn-success btn-sm float-right" href="javascript:validateFormDetailPPM()"><i class="fas fa-plus" aria-hidden="true">Add to PPM List Cart</i></a>
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
                                <div class="card-body table-responsive p-0" id="detailPPMList">
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
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="{{ url('ppmList/cancel/') }}" class="btn btn-danger btn-sm float-right remove-arf-list" title="Cancel">
                                <i class="fa fa-times" aria-hidden="true">Cancel PR List(Cart)</i>
                            </a>
                            <button type="submit" class="btn btn-success btn-sm float-right" style="margin-right:5px;" title="Add to ARF List(Cart)">
                                <i class="fas fa-save" aria-hidden="true">Save PR List(Cart)</i>
                            </button>
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