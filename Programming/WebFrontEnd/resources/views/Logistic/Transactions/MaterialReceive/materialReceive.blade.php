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
                            @include('ProcurementAndCommercial.Functions.sectPoDetail')
                        </div>
                    </div>
                </div>

                <form action="" name="formAsf1">
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
                                <div class="card-body" id="detailPPM">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <td><label>Porject Code</label></td>
                                                        <td>
                                                            <input required="" id="putWorkId" style="border-radius:0;" type="text" class="form-control" value="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Site Code</label></td>
                                                        <td>
                                                            <input required="" id="putProductId" style="border-radius:0;" type="text" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Work ID</label></td>
                                                        <td>
                                                            <input required="" id="putProductId" style="border-radius:0;" type="text" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Product ID</label></td>
                                                        <td>
                                                            <input name="qty" id="putQty" style="border-radius:0;" type="text" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>QTY</label></td>
                                                        <td>
                                                            <input name="price" id="putPrice" style="border-radius:0;" type="text" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Remark</label></td>
                                                        <td>
                                                            <textarea name="internal_notes" id="internal_notes" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
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
                                                                <input name="total_arf" id="total_arf" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>QTY in Material Receive</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input name="total_asf" id="total_asf" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>Balance in ppmListQty</label></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input name="balance" id="balance" style="border-radius:0;" type="text" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <br><br><br><br><br><br>
                                            <a href="{{ url('ppmList/cancel/') }}" class="btn btn-danger btn-sm float-right remove-arf-list" title="Cancel">
                                                <i class="fa fa-times" aria-hidden="true">Cancel Add</i>
                                            </a>
                                            <button type="submit" class="btn btn-success btn-sm float-right" style="margin-right:5px;" title="Add to ARF List(Cart)">
                                                <i class="fas fa-plus" aria-hidden="true">Add to Material Receive</i>
                                            </button>
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
                                <div class="card-body table-responsive p-0" id="detailPPMList">
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
                                                <td contenteditable="false" id="ppmListTotal"></td>
                                                <td contenteditable="false" id="ppmListTotal"></td>
                                            </tr>
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