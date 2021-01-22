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
        <form method="post" enctype="multipart/form-data" action="#" name="formArf1">
          <div class="tab-content p-3" id="nav-tabContent">
            @include('ProcurementAndCommercial.Functions.setHeaderArf')
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true"><span style="font-weight:bold;padding:40px;color:black;">ARF</span></a>&nbsp&nbsp&nbsp
                <a class="nav-item nav-link boqDetailClass" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false"><span style="font-weight:bold;padding:40px;color:black;">BOQ Detail</span></a>
              </div><br>
            </nav>

            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        Detail Transaction & Attachment
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <table>
                              <tr>
                                <td><label>Name Of Beneficiary</label></td>
                                <td>
                                  <input name="beneficiary" id="beneficiary" style="border-radius:0;" type="text" class="form-control">
                                </td>
                              </tr>
                              <tr>
                                <td><label>Bank Name</label></td>
                                <td>
                                  <input name="bank_name" id="bank_name" style="border-radius:0;" type="text" class="form-control">
                                </td>
                              </tr>
                              <tr>
                                <td><label>Account Name</label></td>
                                <td>
                                  <input name="account_name" id="account_name" style="border-radius:0;" type="text" class="form-control">
                                </td>
                              </tr>
                              <tr>
                                <td><label>Account Number</label></td>
                                <td>
                                  <input name="account_number" id="account_number" style="border-radius:0;" type="text" class="form-control">
                                </td>
                              </tr>
                              <tr>
                                <td><Label>Internal Notes</Label></td>
                                <td>
                                  <textarea name="internal_notes" id="internal_notes" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="card-body table-responsive p-0" style="height: 145px;width:100%;">
                            <table class="table table-head-fixed text-nowrap">
                              <div class="form-group input_fields_wrap">
                                <div class="input-group control-group" style="width:100%;">
                                  <input type="file" class="form-control filenames_1" id="filenames_1" style="height:26px;" name="filenames">
                                  <div class="input-group-btn">
                                    <!-- <button class="btn btn-outline-success btn-sm fileInputMultiArf" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button> -->
                                    <a class="btn btn-outline btn-success btn-sm add_field_button" style="color: white;">Add</a>
                                  </div>
                                </div>
                              </div>
                            </table>
                          </div>
                          <button type="reset" class="btn btn-outline btn-danger btn-sm float-right" title="Cancel">
                            <i class="fa fa-times" aria-hidden="true" title="Cancel Add Detail Transaction">Cancel</i>
                          </button>

                          <a class="btn btn-outline btn-success btn-sm float-right" href="javascript:validateForm()" style="margin-right:5px;">
                            <i class="fas fa-plus" aria-hidden="true" title="Add to Detail Transaction">Add</i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </form>

        <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
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
                @include('ProcurementAndCommercial.Functions.sectBOQ3')
              </div>
            </div>
          </div>
        </div>

        <form method="post" enctype="multipart/form-data" name="formArf2">
          <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
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
                              <td><label>Requester Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="requester_name" id="requestNameArf" style="border-radius:0;" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myRequesterNameArf" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                            </tr>
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
                                      <a href="#"><i id="putProductId2" data-toggle="modal" data-target="#myProductArf" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input name="product_name" id="putProductName" style="border-radius:0;" type="text" class="form-control" readonly="">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Qty</label></td>
                              <td>
                                <input name="qtyx" id="qtyCek" style="border-radius:0;" type="text" class="form-control ChangeQty" value="0" autocomplete="off">
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
                              <td><label>Total</label></td>
                              <td>
                                <input name="price" id="totalArfDetails" style="border-radius:0;" type="text" class="form-control" readonly="">
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
                        <br><br><br>
                        <button type="reset" class="btn btn-outline btn-danger btn-sm float-right detailTransaction">
                          <i class="fa fa-times" aria-hidden="true" title="Cancel to Add ARF List Cart">Cancel</i>
                        </button>
                        <button type="reset" class="btn btn-outline btn-success btn-sm float-right" id="buttonArfList" style="margin-right: 5px;">
                          <i class="fa fa-plus" aria-hidden="true" title="Add to ARF List">Add</i>
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
                  <tbody id="tableArfListCart"></tbody>
                </table>
              </div>
            </div>
            <a href="{{ url('arflist/cancel/') }}" class="btn btn-outline btn-danger btn-sm float-right remove-arf-list">
              <i class="fa fa-times" aria-hidden="true" title="Cancel ARF List Cart">Cancel</i>
            </a>
            <a class="btn btn-outline btn-success btn-sm float-right" id="saveArfList" style="margin-right:5px;">
              <i class="fas fa-save" aria-hidden="true" style="color:white;" title="Submit to ARF">Submit</i>
            </a>

          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>
@include('Partials.footer')
@include('ProcurementAndCommercial.Functions.footerFunctionArf')
@endsection