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
                                            Add New Material Receive
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            @csrf
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td><label>Material Source</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <select class="form-control select2bs4" style="width: 100%;" name="origin_budget" id="origin_budget">
                                                                        <option selected="selected">Project</option>
                                                                        <option>Overhead</option>
                                                                        <option>Sales</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

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
                                    PO Detail
                                </label>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                    </button>
                                </div>
                            </div>
                            @include('Logistic.Functions.sectPoDetail')
                        </div>
                    </div>
                </div>

                <form action="" name="formDetailMaterialReceive">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Detail Material Receive
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" id="detailMaterialReceive">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td><label>Porject Code</label></td>
                                                        <td>
                                                            <input required="" id="project_code" style="border-radius:0;" type="text" class="form-control" value="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Site Code</label></td>
                                                        <td>
                                                            <input required="" id="site_code" style="border-radius:0;" type="text" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Work ID</label></td>
                                                        <td>
                                                            <input required="" id="work_id" style="border-radius:0;" type="text" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Product ID</label></td>
                                                        <td>
                                                            <input name="product" id="product_id" style="border-radius:0;" type="text" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Qty</label></td>
                                                        <td>
                                                            <input name="qty" id="qty" style="border-radius:0;" type="text" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Remark</label></td>
                                                        <td>
                                                            <textarea name="internal_notes" id="remark" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <div>
                                                            <label>
                                                                <strong>Balance</strong><br>
                                                            </label>
                                                        </div>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Qty in PO</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input name="total_arf" id="qty_in_po" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>QTY in Material Receive</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input name="total_asf" id="qty_in_mr" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Balance in PPM ListQty</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input name="balance" id="balance_in_ppm_list" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <br><br><br><br><br><br>
                                            <button type="rest" class="btn btn-danger btn-sm float-right" style="margin-left:5px;" title="Cancel Add">
                                                <i class="fas fa-times" aria-hidden="true">Cancel Add</i>
                                            </button>
                                            <a class="btn btn-success btn-sm float-right" href="javascript:validateFormMaterialReceiveList()"><i class="fas fa-plus" aria-hidden="true">Add to Material Receive</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Material Receive List (Cart)
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0" id="detailMaterialReceiveList">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Project</th>
                                                <th>Site</th>
                                                <th>Work ID</th>
                                                <th>Product Id</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>Uom</th>
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
@include('Logistic.Functions.footerLogisiticMaterialReceive')
@endsection