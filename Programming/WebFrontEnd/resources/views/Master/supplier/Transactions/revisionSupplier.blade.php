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
        <form method="post" enctype="multipart/form-data" action="#" name="formArf1">
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="row">
              @csrf
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Add New Advanced
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Advance.Advance.Functions.Header.headerArfRevision')
                </div>
              </div>
            </div>
            <nav class="w-100 pageArfBoq">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true"><span style="font-weight:bold;padding:40px;color:black;">Advance</span></a>&nbsp&nbsp&nbsp
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false"><span style="font-weight:bold;padding:40px;color:black;">Budget</span></a>
              </div><br>
            </nav>

            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
              <div class="row pageDetailTransaction">
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
                        <div class="col-md-4">
                          <div class="form-group">
                            <table>
                              <tr>
                                <td><label>Requester Name</label></td>
                                <td>
                                  <div class="input-group">
                                    <input name="requester_name" id="requestNameArf" style="border-radius:0;" type="text" class="form-control" readonly value="{{ $requester }}">
                                    <div class="input-group-append">
                                      <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#"><i id="requester_name2" data-toggle="modal" data-target="#myRequesterNameArf" class="fas fa-gift" style="color:grey;"></i></a>
                                      </span>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div id="iconRequester" style="color: red;margin-left:5px;"></div>
                                </td>
                              </tr>
                              <tr>
                                <td><label>Name Of Beneficiary</label></td>
                                <td>
                                  <input name="beneficiary" id="beneficiary" style="border-radius:0;" type="text" class="form-control" value="{{ $beneficary }}">
                                </td>
                                <td>
                                  <div id="iconBeneficiary" style="color: red;margin-left:5px;"></div>
                                </td>
                              </tr>
                              <tr>
                                <td><Label>Internal Notes</Label></td>
                                <td>
                                  <textarea name="internal_notes" id="internal_notes" style="border-radius:0;" cols="30" rows="3" class="form-control">{{ $internal }}</textarea>
                                </td>
                                <td>
                                  <div id="iconInternal" style="color: red;margin-left:5px;"></div>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <table>
                              <tr>
                                <td><label>Bank Name</label></td>
                                <td>
                                  <input name="bank_name" id="bank_name" style="border-radius:0;" type="text" class="form-control" value="{{ $bank }}">
                                </td>
                                <td>
                                  <div id="iconBankName" style="color: red;margin-left:5px;"></div>
                                </td>
                              </tr>  
                              <tr>
                                <td><label>Account Name</label></td>
                                <td>
                                  <input name="account_name" id="account_name" style="border-radius:0;" type="text" class="form-control" value="{{ $accountName }}">
                                </td>
                                <td>
                                  <div id="iconAccountName" style="color: red;margin-left:5px;"></div>
                                </td>
                              </tr>
                              <tr>
                                <td><label>Account Number</label></td>
                                <td>
                                  <input name="account_number" id="account_number" style="border-radius:0;" type="text" class="form-control" value="{{ $accountNumber }}">
                                </td>
                                <td>
                                  <div id="iconAccountNumber" style="color: red;margin-left:5px;"></div>
                                </td>
                              </tr>                          
                            </table>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card-body table-responsive p-0" style="height: 110px;width:100%;">
                            <table class="table table-head-fixed text-nowrap">
                              <div class="form-group input_fields_wrap">
                                <div class="input-group control-group" style="width:100%;">
                                  <input type="file" class="form-control filenames_1" id="filenames_1" style="height:26px;" name="filenames">
                                  <div class="input-group-btn">
                                    <a class="btn btn-outline btn-success btn-sm add_field_button">
                                      <i class="fas fa-plus" aria-hidden="true" title="Add File" style="color:white;">Add</i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </table>
                          </div>
                          <button type="reset" class="btn btn-outline btn-danger btn-sm float-right" title="Cancel">
                            <i class="fa fa-times" aria-hidden="true" title="Cancel Add Detail Transaction">Cancel</i>
                          </button>
                          <a class="btn btn-outline btn-success btn-sm float-right" href="javascript:formDetailTransAttch()" style="margin-right:5px;">
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
                    Budget Details
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
                                  <input id="putProductId" style="border-radius:0;width:60px;" name="product_id" class="form-control" readonly value="{{ $productId }}">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input name="product_name" id="putProductName" style="border-radius:0;width:95px;" type="text" class="form-control" readonly="" value="{{ $productIdDetail }}">
                              </td>
                              <td>
                                <div id="iconProductId" style="color: red;margin-left:5px;"></div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Qty</label></td>
                              <td>
                                <input name="qtyx" id="qtyCek" style="border-radius:0;width:90px;" type="text" class="form-control ChangeQty" value="0" autocomplete="off" value="{{ $qty }}">
                                <span id="putQtybyId"></span>
                                <input name="qty" id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                              </td>
                              <td>
                                <input name="qty_detail" id="putUom" style="border-radius:0;width:50px;" type="text" class="form-control" readonly="" value="{{ $qtyDetail }}">
                              </td>
                              <td>
                                <div id="iconQty" style="color: red;margin-left:5px;"></div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Unit Price</label></td>
                              <td>
                                <input name="price" id="priceCek" style="border-radius:0;width:90px;" type="number" class="form-control ChangePrice" value="0" value="{{ $unitPrice }}" autocomplete="off">
                                <input name="price2" id="putPrice" style="border-radius:0;" type="hidden" class="form-control">
                              </td>
                              <td>
                                <input name="price_detail" id="putCurrency" style="border-radius:0;width:50px;" type="text" class="form-control" readonly="" value="{{ $unitPriceDetail }}">
                              </td>
                              <td>
                                <div id="iconUnitPrice" style="color: red;margin-left:5px;"></div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Total</label></td>
                              <td>
                                <input name="price" id="totalArfDetails" style="border-radius:0;width:90px;" type="text" class="form-control" readonly="" value="{{ $total }}">
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
                                <textarea name="remark" id="putRemark" rows="5" cols="51" class="form-control">{{ $remark }}</textarea>
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
                <table id="tableArf" class="table table-head-fixed text-nowrap">
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
    </div>
</div>
</section>
</div>
@include('Partials.footer')
@include('Advance.Advance.Functions.Footer.footerArf')
@endsection