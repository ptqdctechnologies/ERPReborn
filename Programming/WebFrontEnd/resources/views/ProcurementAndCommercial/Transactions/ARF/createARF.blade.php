@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('ProcurementAndCommercial.Transactions.ARF.project')
@include('ProcurementAndCommercial.Transactions.ARF.subpc')
@include('ProcurementAndCommercial.Transactions.ARF.requester')
@include('ProcurementAndCommercial.Transactions.ARF.currency')
@include('ProcurementAndCommercial.Transactions.ARF.manager')
@include('ProcurementAndCommercial.Transactions.ARF.financeStaff')
@include('ProcurementAndCommercial.Transactions.ARF.produk')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="card">

        <form method="post" action="" enctype="multipart/form-data" id="arfForm">
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="row">
              @csrf
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Add New Advanced Request Form (ARF)
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>Project Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" required="" style="border-radius:0;" name="project_code" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>

                              <td>
                                <input id="projectname" required="" style="border-radius:0;" readonly="" class="form-control" name="projek_name">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Site Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" name="site_code" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#mySPC" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input id="subprojectn" style="border-radius:0;" readonly="" class="form-control" name="site_name">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Currency</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="currencyCode" style="border-radius:0;" name="currency_code" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myCurrency" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input id="currencyName" style="border-radius:0;" readonly="" class="form-control" name="currency_name">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Manager</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="managerArfUid" style="border-radius:0;" name="manager_code" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myManagerArf" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input id="managerArfName" style="border-radius:0;" readonly="" class="form-control" name="manager_name">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Finance Staff</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="financeArfUid" style="border-radius:0;" name="finance_code" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myfinanceArf" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input id="financeArfName" style="border-radius:0;" readonly="" class="form-control" name="finance_name">
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true" style="margin:5px;font-weight:bold;">ARF</a>&nbsp&nbsp&nbsp
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false" style="margin:5px;font-weight:bold;">BOQ Detail</a>
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
                                  <input name="beneficiary" id="" style="border-radius:0;" type="text" class="form-control">
                                </td>
                              </tr>
                              <tr>
                                <td><label>Bank Name</label></td>
                                <td>
                                  <input name="bank_name" id="" style="border-radius:0;" type="text" class="form-control">
                                </td>
                              </tr>
                              <tr>
                                <td><label>Account Name</label></td>
                                <td>
                                  <input name="account_name" id="" style="border-radius:0;" type="text" class="form-control">
                                </td>
                              </tr>
                              <tr>
                                <td><label>Account Number</label></td>
                                <td>
                                  <input name="account_number" id="" style="border-radius:0;" type="text" class="form-control">
                                </td>
                              </tr>
                              <tr>
                                <td><label>Origin Of Budget</label></td>
                                <td>
                                  <div class="input-group">
                                    <select class="form-control select2bs4" style="width: 100%;" name="origin_budget">
                                      <option selected="selected">Project</option>
                                      <option>Overhead</option>
                                      <option>Sales</option>
                                    </select>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td><Label>Internal Notes</Label></td>
                                <td>
                                  <textarea name="internal_notes" id="" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="input-group control-group increment">
                              <input type="file" name="filename[]" class="form-control">
                              <div class="input-group-btn">
                                <button class="btn btn-outline-primary btn-sm fileInputMultiArf" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                              </div>
                            </div>
                            <div class="clone hide">
                              <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="filename[]" class="form-control">
                                <div class="input-group-btn">
                                  <button class="btn btn-outline-secondary btn-sm remove-attachment" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <br><br><br><br><br>

                          <button type="reset" class="btn btn-outline-danger btn-sm float-right" title="Cancel">
                            <i class="fa fa-times" aria-hidden="true">Cancel</i>
                          </button>
                          <button type="submit" class="btn btn-outline-success btn-sm float-right" title="Submit" style="margin-right:5px;">
                            <i class="fas fa-plus" aria-hidden="true">Submit</i>
                          </button>
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
                    BOQ3 Detail
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body table-responsive p-0" style="height: 250px;">
                  <table class="table table-head-fixed text-nowrap table-striped" id="arfTableDisableEnable">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Applied</th>
                        <th>Work Id</th>
                        <th>Work Name</th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Uom</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Currency</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php 
                        $y1= number_format(((2000000/10000000) * 100),2);
                        $y2= number_format(((300000000/600000000) * 100),2); 
                        $y3= number_format(((400000000/600000000) * 100),2);
                        $y4= number_format(((50000000/100000000) * 100),2);
                        $i=1;
                      @endphp

                      <td>
                        <button type="reset" class="btn btn-outline-success btn-sm float-right klikDetail1" title="Submit">
                          <i class="fas fa-plus" aria-hidden="true"></i>
                        </button>
                      </td>
                      <td>
                      @if($y1 > 0 && $y1 <= 50)
                        <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                          <div class="progress-bar bg-green" style="width: {{$y1}}%;"></div>
                        </div>
                      @elseif($y1 > 50 && $y1 <= 90)
                        <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                          <div class="progress-bar bg-yellow" style="width: {{$y1}}%;"></div>
                        </div>
                      @elseif($y1 > 90 && $y1 <= 100)
                        <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                          <div class="progress-bar bg-pink" style="width: {{$y1}}%;"></div>
                        </div>
                      @else
                        <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                          <div class="progress-bar bg-grey" style="width: {{$y1}}%;"></div>
                        </div>
                      @endif
                        <small>
                          <center>{{ $y1 }} %</center>
                        </small>
                      </td>
                      <td><span class="tag tag-success" id="getWorkId1">6001</span></td>
                      <td><span class="tag tag-success" id="getWorkName1">Project Overhead Actual</span></td>
                      <td><span class="tag tag-success" id="getProductId1">810002-0000</span></td>
                      <td><span class="tag tag-success" id="getProductName1">Stationary dan Printing</span></td>
                      <td><span class="tag tag-success" id="getQty1">10</span></td>
                      <td><span class="tag tag-success" id="getUom1">Ls</span></td>
                      <td><span class="tag tag-success" id="getPrice1">1000000</span></td>
                      <td><span class="tag tag-success" id="totalArf1">10000000</span></td>
                      <td><span class="tag tag-success" id="getCurrency1">IDR</span></td>
                      <td><span class="tag tag-success" id="getRequester1" style="display:none;">2000000</span></td>
                      </tr>
                      <tr>
                        <td>
                          <button type="reset" class="btn btn-outline-success btn-sm float-right klikDetail2" title="Submit">
                            <i class="fas fa-plus" aria-hidden="true"></i>
                          </button>
                        </td>
                        <td>

                        @if($y2 > 0 && $y2 <= 50)
                        <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                          <div class="progress-bar bg-green" style="width: {{$y2}}%;"></div>
                        </div>
                        @elseif($y2 > 50 && $y2 <= 90)
                          <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-yellow" style="width: {{$y2}}%;"></div>
                          </div>
                        @elseif($y2 > 90 && $y2 <= 100)
                          <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-pink" style="width: {{$y2}}%;"></div>
                          </div>
                        @else
                          <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-grey" style="width: {{$y2}}%;"></div>
                          </div>
                        @endif
                          <small>
                            <center>{{ $y2 }} %</center>
                          </small>
                        </td>
                        <td><span class="tag tag-success" id="getWorkId2">6002</span></td>
                        <td><span class="tag tag-success" id="getWorkName2">Project Overhead Actual</span></td>
                        <td><span class="tag tag-success" id="getProductId2">820001-0000</span></td>
                        <td><span class="tag tag-success" id="getProductName2">Salaries</span></td>
                        <td><span class="tag tag-success" id="getQty2">2</span></td>
                        <td><span class="tag tag-success" id="getUom2">Ls</span></td>
                        <td><span class="tag tag-success" id="getPrice2">300000000</span></td>
                        <td><span class="tag tag-success" id="totalArf2">600000000</span></td>
                        <td><span class="tag tag-success" id="getCurrency2">IDR</span></td>
                        <td><span class="tag tag-success" id="getRequester2" style="display:none;">300000000</span></td>
                      </tr>
                      <tr>
                        <td>
                          <button type="reset" class="btn btn-outline-success btn-sm float-right klikDetail3" title="Submit">
                            <i class="fas fa-plus" aria-hidden="true"></i>
                          </button>
                        </td>
                        <td>

                        @if($y3 > 0 && $y3 <= 50)
                        <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                          <div class="progress-bar bg-green" style="width: {{$y3}}%;"></div>
                        </div>
                        @elseif($y3 > 50 && $y3 <= 90)
                          <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-yellow" style="width: {{$y3}}%;"></div>
                          </div>
                        @elseif($y3 > 90 && $y3 <= 100)
                          <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-pink" style="width: {{$y3}}%;"></div>
                          </div>
                        @else
                          <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-grey" style="width: {{$y3}}%;"></div>
                          </div>
                        @endif
                          <small>
                            <center>{{ $y3 }} %</center>
                          </small>
                        </td>
                        <td><span class="tag tag-success" id="getWorkId3">6003</span></td>
                        <td><span class="tag tag-success" id="getWorkName3">Project Overhead Actual</span></td>
                        <td><span class="tag tag-success" id="getProductId3">820002-0000</span></td>
                        <td><span class="tag tag-success" id="getProductName3">Site Office Rent/Warehouse</span></td>
                        <td><span class="tag tag-success" id="getQty3">3</span></td>
                        <td><span class="tag tag-success" id="getUom3">Ls</span></td>
                        <td><span class="tag tag-success" id="getPrice3">20000000</span></td>
                        <td><span class="tag tag-success" id="totalArf3">600000000</span></td>
                        <td><span class="tag tag-success" id="getCurrency3">IDR</span></td>
                        <td><span class="tag tag-success" id="getRequester3" style="display:none;">400000000</span></td>
                      </tr>
                      <tr>
                        <td>
                          <button type="reset" class="btn btn-outline-success btn-sm float-right klikDetail4" title="Submit">
                            <i class="fas fa-plus" aria-hidden="true"></i>
                          </button>
                        </td>
                        <td>
                        @if($y4 > 0 && $y4 <= 50)
                        <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                          <div class="progress-bar bg-green" style="width: {{$y4}}%;"></div>
                        </div>
                        @elseif($y4 > 50 && $y4 <= 90)
                          <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-yellow" style="width: {{$y4}}%;"></div>
                          </div>
                        @elseif($y4 > 90 && $y4 <= 100)
                          <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-pink" style="width: {{$y4}}%;"></div>
                          </div>
                        @else
                          <div class="progress progress-xs" style="height: 14px;border-radius:8px;">
                            <div class="progress-bar bg-grey" style="width: {{$y4}}%;"></div>
                          </div>
                        @endif
                          <small>
                            <center>{{ $y4 }} %</center>
                          </small>
                        </td>
                        <td><span class="tag tag-success" id="getWorkId4">6004</span></td>
                        <td><span class="tag tag-success" id="getWorkName4">Project Overhead Actual</span></td>
                        <td><span class="tag tag-success" id="getProductId4">820009-0000</span></td>
                        <td><span class="tag tag-success" id="getProductName4">Entertainment</span></td>
                        <td><span class="tag tag-success" id="getQty4">4</span></td>
                        <td><span class="tag tag-success" id="getUom4">Ls</span></td>
                        <td><span class="tag tag-success" id="getPrice4">25000000</span></td>
                        <td><span class="tag tag-success" id="totalArf4">100000000</span></td>
                        <td><span class="tag tag-success" id="getCurrency4">IDR</span></td>
                        <td><span class="tag tag-success" id="getRequester4" style="display:none;">50000000</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

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


                <div class="card-body">
                  <form method="post" action="" enctype="multipart/form-data">
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
                              <td><label>Qty</label></td>
                              <td>
                                <input name="qty" id="qtyCek" style="border-radius:0;" type="text" class="form-control ChangeQty" value="0">
                                <input name="qty" id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                              </td>
                              <td>
                                <input name="qty_detail" id="putUom" style="border-radius:0;" type="text" class="form-control" readonly="">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Unit Price</label></td>
                              <td>
                                <input name="price" id="putPrice" style="border-radius:0;" type="text" class="form-control" readonly="">
                              </td>
                              <td>
                                <input name="price_detail" id="putCurrency" style="border-radius:0;" type="text" class="form-control" readonly="">
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
                            <tr>
                              <td><label>NetAct</label></td>
                              <td>
                                <input name="nec_at" id="putNetAct" style="border-radius:0;" type="text" class="form-control" required="">
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
                        <button type="reset" class="btn btn-outline-danger btn-sm float-right detailTransaction" title="Cancel">
                          <i class="fa fa-times" aria-hidden="true">Cancel</i>
                        </button>

                        <a href="#" class="btn btn-outline-success btn-sm float-right" id="buttonArfList" style="margin-right:5px;" title="Add to ARF List(Cart)">
                          <i class="fas fa-check" aria-hidden="true"><span> Add to ARF List(Cart) </span></i>
                        </a>
                      </div>
                  </form>
                </div>
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

              <div class="card-body table-responsive p-0">
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
                      <th>Net Act</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <!-- <center><span class="table-remove"><button type="button" class="btn btn-outline-danger btn-rounded btn-sm my-0 klikcek"><i class="fa fa-trash"></i></button></span></center> -->
                      </td>
                      <td contenteditable="false" id="arfListWorkId"></td>
                      <td contenteditable="false" id="arfListWorkName"></td>
                      <td contenteditable="false" id="arfListProductId"></td>
                      <td contenteditable="false" id="arfListProductName"></td>
                      <td contenteditable="true"><input name="qty" id="arfListQty" style="border-radius:0;width:50px;border:1px solid white;" type="text" class="form-control ChangeQtys"></td>
                      <td contenteditable="false" id="arfListUom"></td>
                      <td contenteditable="false" id="arfListPrice"></td>
                      <td contenteditable="false" id="arfListTotal"></td>
                      <td contenteditable="false" id="arfListCurrency"></td>
                      <td contenteditable="false" id="arfListRemark"></td>
                      <td contenteditable="false" id="arfListNetAct"></td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
            <button type="reset" class="btn btn-outline-danger btn-sm float-right" title="Cancel">
              <i class="fa fa-times" aria-hidden="true">Cancel ARF List(Cart)</i>
            </button>
            <button type="submit" class="btn btn-outline-success btn-sm float-right" style="margin-right:5px;" title="Add to ARF List(Cart)">
              <i class="fas fa-save" aria-hidden="true">Save ARF List(Cart)</i>
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
<script type="text/javascript">
  $(document).ready(function() {
    $(".btn-success").click(function() {
      var html = $(".clone").html();
      $(".increment").after(html);
    });
    $("body").on("click", ".btn-danger", function() {
      $(this).parents(".control-group").remove();
    });
  });
</script>
<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
  $(document).ready(function() {
    $(".available").hide();
  });
</script>
<!--  END SHOW HIDE AVAILABEL -->

<script type="text/javascript">
  $(document).ready(function() {
    $(".detailTransaction").click(function() {
      $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", false);
    });
  });
</script>

<script>
  $(document).ready(function() {

    $('.klikDetail1').click(function() {

      $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
      $("#buttonArfList").prop("disabled", true);
      $(".available").show();

      var get11 = $("#getWorkId1").html();
      var get21 = $("#getWorkName1").html();
      var get31 = $("#getProductId1").html();
      var get41 = $("#getQty1").html();
      var get51 = $("#getPrice1").html();
      var get61 = $("#getRemark1").html();
      var get71 = $("#getProductName1").html();
      var get81 = $("#getUom1").html();
      var get91 = $("#getCurrency1").html();
      var get101 = $("#getRequester1").html();
      var totalBOQ1 = get41 * get51;
      var totalBalance1 = totalBOQ1 - get101;
      $("#totalBalance").val(totalBalance1);
      $("#totalBOQ").val(totalBOQ1);
      $("#totalRequester").val(get101);
      $("#putWorkId").val(get11);
      $("#putWorkName").val(get21);
      $("#putProductId").val(get31);
      $("#putQty").val(get41);
      $("#putPrice").val(get51);
      $("#putRemark").val(get61);
      $("#putProductName").val(get71);
      $("#putUom").val(get81);
      $("#putCurrency").val(get91);

    });
    $('.klikDetail2').click(function() {

      $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
      $("#buttonArfList").prop("disabled", true);
      $(".available").show();

      var get12 = $("#getWorkId2").html();
      var get22 = $("#getWorkName2").html();
      var get32 = $("#getProductId2").html();
      var get42 = $("#getQty2").html();
      var get52 = $("#getPrice2").html();
      var get62 = $("#getRemark2").html();
      var get72 = $("#getProductName2").html();
      var get82 = $("#getUom2").html();
      var get92 = $("#getCurrency2").html();
      var get102 = $("#getRequester2").html();
      var totalBOQ2 = get42 * get52;
      var totalBalance2 = totalBOQ2 - get102;
      $("#totalBalance").val(totalBalance2);
      $("#totalBOQ").val(totalBOQ2);
      $("#totalRequester").val(get102);
      $("#putWorkId").val(get12);
      $("#putWorkName").val(get22);
      $("#putProductId").val(get32);
      $("#putQty").val(get42);
      $("#putPrice").val(get52);
      $("#putRemark").val(get62);
      $("#putProductName").val(get72);
      $("#putUom").val(get82);
      $("#putCurrency").val(get92);
    });
    $('.klikDetail3').click(function() {

      $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
      $("#buttonArfList").prop("disabled", true);
      $(".available").show();

      var get13 = $("#getWorkId3").html();
      var get23 = $("#getWorkName3").html();
      var get33 = $("#getProductId3").html();
      var get43 = $("#getQty3").html();
      var get53 = $("#getPrice3").html();
      var get63 = $("#getRemark3").html();
      var get73 = $("#getProductName3").html();
      var get83 = $("#getUom3").html();
      var get93 = $("#getCurrency3").html();
      var get103 = $("#getRequester3").html();
      var totalBOQ3 = get43 * get53;
      var totalBalance3 = totalBOQ3 - get103;
      $("#totalBalance").val(totalBalance3);
      $("#totalBOQ").val(totalBOQ3);
      $("#totalRequester").val(get103);
      $("#putWorkId").val(get13);
      $("#putWorkName").val(get23);
      $("#putProductId").val(get33);
      $("#putQty").val(get43);
      $("#putPrice").val(get53);
      $("#putRemark").val(get63);
      $("#putProductName").val(get73);
      $("#putUom").val(get83);
      $("#putCurrency").val(get93);
    });
    $('.klikDetail4').click(function() {

      $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
      $("#buttonArfList").prop("disabled", true);
      $(".available").show();

      var get14 = $("#getWorkId4").html();
      var get24 = $("#getWorkName4").html();
      var get34 = $("#getProductId4").html();
      var get44 = $("#getQty4").html();
      var get54 = $("#getPrice4").html();
      var get64 = $("#getRemark4").html();
      var get74 = $("#getProductName4").html();
      var get84 = $("#getUom4").html();
      var get94 = $("#getCurrency4").html();
      var get104 = $("#getRequester4").html();
      var totalBOQ4 = get44 * get54;
      var totalBalance4 = totalBOQ4 - get104;
      $("#totalBalance").val(totalBalance4);
      $("#totalBOQ").val(totalBOQ4);
      $("#totalRequester").val(get104);
      $("#putWorkId").val(get14);
      $("#putWorkName").val(get24);
      $("#putProductId").val(get34);
      $("#putQty").val(get44);
      $("#putPrice").val(get54);
      $("#putRemark").val(get64);
      $("#putProductName").val(get74);
      $("#putUom").val(get84);
      $("#putCurrency").val(get94);
    });
  });
</script>

<script>
  $('document').ready(function() {
    $('.ChangeQty').keyup(function() {

      var qtyReq = $(this).val();
      if (qtyReq == 0 || qtyReq == '') {
        qtyReq = 0;
      }
      var putQty = parseFloat($('#putQty').val());
      var putPrice = parseFloat($('#putPrice').val());

      if (qtyReq == '') {
        $("#buttonArfList").prop("disabled", true);
      } else if (qtyReq > putQty) {
        alert("Your Request Is Over Budget");
        $("#buttonArfList").prop("disabled", true);
      } else {
        var totalReq = parseFloat(qtyReq) * parseFloat(putPrice);
        var totalReq = parseFloat(totalReq).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        $('#totalArfDetails').val(totalReq);
        $("#buttonArfList").prop("disabled", false);
      }

    });
  });
</script>

<script>
  $('document').ready(function() {
    $('.ChangeQtys').keyup(function() {

      var qtyReq = $(this).val();
      if (qtyReq == 0 || qtyReq == '') {
        qtyReq = 0;
      }
      var putQty = parseFloat($('#putQty').val());
      var putPrice = parseFloat($('#putPrice').val());

      if (qtyReq == '') {
      } else if (qtyReq > putQty) {
        alert("Your Request Is Over Budget");
      } else {
        var totalReq = parseFloat(qtyReq) * parseFloat(putPrice);
        var totalReq = parseFloat(totalReq).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        $('#arfListTotal').html(totalReq);
      }

    });
  });
</script>

<script>
  $(document).ready(function() {

    $('#buttonArfList').click(function() {
      
      var list1 = $("#putWorkId").val();
      var list2 = $("#putWorkName").val();
      var list3 = $("#putProductId").val();
      var list4 = $("#putProductName").val();
      var list5 = $("#qtyCek").val();
      var list6 = $("#putUom").val();
      var list7 = $("#putPrice").val();
      var list8 = $("#totalArfDetails").val();
      var list9 = $("#putCurrency").val();
      var list10 = $("#putRemark").val();
      var list11 = $("#putNetAct").val();

      $("#arfListWorkId").html(list1);
      $("#arfListWorkName").html(list2);
      $("#arfListProductId").html(list3);
      $("#arfListProductName").html(list4);
      $("#arfListQty").val(list5);
      $("#arfListUom").html(list6);
      $("#arfListPrice").html(list7);
      $("#arfListTotal").html(list8);
      $("#arfListCurrency").html(list9);
      $("#arfListRemark").html(list10);
      $("#arfListNetAct").html(list11);
    });
  });
</script>

<script>
  $(document).ready(function() {

    $('.klikcek').click(function() {
      
      var list1 = $("#arfListQty").val();
      alert(list1);

    });
  });
</script>

@endsection