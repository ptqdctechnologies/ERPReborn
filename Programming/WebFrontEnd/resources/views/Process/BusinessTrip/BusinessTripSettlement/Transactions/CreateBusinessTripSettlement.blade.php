@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('Process.BusinessTrip.BusinessTripSettlement.Functions.PopUp.SearchBrf')
@include('Process.BusinessTrip.BusinessTripSettlement.Functions.PopUp.PopUpBusinessTripSettlementRevision')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Business Trip Settlement</label>
        </div>
      </div>
      @include('Process.BusinessTrip.BusinessTripSettlement.Functions.Menu.MenuBusinessTripSettlement')
      @if($var == 0)
      <div class="card" style="position:relative;bottom:10px;">
        <form method="post" enctype="multipart/form-data" action="{{ route('SelectWorkFlow') }}" id="FormStoreBusinessTripSettlement">
          @csrf
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Add New Settlement
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Process.BusinessTrip.BusinessTripSettlement.Functions.Header.HeaderBusinessTripSettlement')
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      File Attachment
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body file-attachment">
                      <div class="row">
                        <div class="col-md-12">
                          <!-- 91000000000247 -->
                          <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                            $varAPIWebToken,
                            'dataInput_Log_FileUpload_1',
                            null,
                            'dataInput_Return'
                            ).
                          ''; ?>
                        </div>
                        <br><br>
                        <div class="col-md-12">
                          <div class="card-body table-responsive p-0" style="height:125px;">
                            <table class="table table-head-fixed table-sm text-nowrap">
                              <div class="form-group input_fields_wrap">
                                <div class="input-group control-group">
                                  <div id="dataShow_ActionPanel"></div>
                                </div>
                              </div>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Business Trip Request Detail
                    </label>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Process.BusinessTrip.BusinessTripSettlement.Functions.Table.TableBrfDetail')
                </div>
              </div>
            </div>

            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active idExpense" id="product-comments-tab" data-toggle="tab" href="#expense" role="tab" aria-controls="product-comments" aria-selected="true"><span style="font-weight:bold;padding:10px;color:#212529;">Expense Claim Cart</span></a>&nbsp;&nbsp;&nbsp;
                <a class="nav-item nav-link idAmount" id="product- desc-tab" data-toggle="tab" href="#amountdueto" role="tab" aria-controls="product-desc" aria-selected="false"><span style="font-weight:bold;padding:10px;color:#212529;">Amount Due to Company Cart</span></a>
              </div><br>
            </nav>

            <div class="tab-pane fade show active" id="expense" role="tabpanel" aria-labelledby="product-comments-tab">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        Expense Claim Cart
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0 expenseCompanyCart" style="height: 180px;" id="expenseCompanyCart">
                      <table class="table text-nowrap table-striped TableExpenseClaim" id="TableExpenseClaim">
                        <thead>
                          <tr>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Transaction Number</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Id</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">UOM</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Price</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Total</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                    <div class="card-body expenseCompanyCart">
                      <table style="float:right;">
                        <tr>
                          <th style="position: relative;right:45px;"> Total Item : <span id="TotalQtyExpense"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="GrandTotalExpense"></span></th>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="amountdueto" role="tabpanel" aria-labelledby="product-desc-tab">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        Amount Due to Company Cart
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0 amountCompanyCart" style="height: 180px;" id="amountCompanyCart">
                      <table class="table text-nowrap table-striped TableAmountDueto" id="TableAmountDueto">
                        <thead>
                          <tr>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Transaction Number</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Id</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">UOM</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Price</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Total</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                    <div class="card-body amountCompanyCart">
                      <table style="float:right;">
                        <tr>
                          <th style="position: relative;right:45px;"> Total Item : <span id="TotalQtyAmount"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="GrandTotalAmount"></span></th>
                        </tr>
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
                        Remark
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body Remark">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <table>
                              <tr>
                                <td style="display: flex;">
                                  <textarea name="var_remark" id="remark" rows="2" cols="150" class="form-control"></textarea>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a onclick="CancelBusinessTripSettlement();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                  </a>
                  <button class="btn btn-default btn-sm float-right" type="submit" id="SubmitBsfList" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit"> Submit
                  </button>
                </div>
              </div>
              <br><br>
            </div>
        </form>
      </div>
      @endif
    </div>
  </section>
</div>
@include('Partials.footer')
@include('Process.BusinessTrip.BusinessTripSettlement.Functions.Footer.FooterBusinessTripSettlement')
@endsection