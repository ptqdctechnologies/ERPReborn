@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('Process.Advance.AdvanceRequest.Functions.PopUp.PopUpAdvanceRevision')
@include('Process.Advance.AdvanceRequest.Functions.Table.TableAdvanceRevision')
@include('getFunction.getProduct')
@include('getFunction.getWorkFlow')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Advance Request Revision</label>
        </div>
      </div>

      @include('Process.Advance.AdvanceRequest.Functions.Menu.MenuAdvanceRequest')

      <!-- CONTENT -->
      <div class="card">
        <form method="post" enctype="multipart/form-data" action="{{ route('SelectWorkFlow') }}" id="FormUpdateAdvance">
          @csrf
          <input type="hidden" name="Sys_ID_Advance" value="{{ $Sys_ID_Advance }}" id="Sys_ID_Advance">
          <input type="hidden" name="DocumentTypeID" value="{{ $DocumentTypeID }}" id="DocumentTypeID" />
          <input type="hidden" name="var_date" id="var_date" />
          <input type="hidden" name="var_recordIDDetail" id="var_recordIDDetail" />
          <input type="hidden" name="var_product_id" id="var_product_id" />
          <input type="hidden" name="var_product_name" id="var_product_name" />
          <input type="hidden" name="var_quantity" id="var_quantity" />
          <input type="hidden" name="var_uom" id="var_uom" />
          <input type="hidden" name="var_qty_id" id="var_qty_id" />
          <input type="hidden" name="var_currency_id" id="var_currency_id" />
          <input type="hidden" name="var_price" id="var_price" />
          <input type="hidden" name="var_total" id="var_total" />
          <input type="hidden" name="var_currency" id="var_currency" />
          <input type="hidden" name="var_combinedBudgetSectionDetail_RefID" id="var_combinedBudgetSectionDetail_RefID" />

          <!-- ADVANCE REQUEST -->
          <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
                  <div class="card-header">
                    <label class="card-title">
                      Advance Request
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  @include('Process.Advance.AdvanceRequest.Functions.Header.HeaderAdvanceRevision')
                </div>
              </div>
            </div>
          </div>
          
          <!-- ADVANCE REQUEST DETAIL -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
                  <div class="card-header">
                    <label class="card-title">
                      Advance Request Detail
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  @include('Process.Advance.AdvanceRequest.Functions.Header.HeaderAdvanceDetailRevision')
                </div>
              </div>
            </div>
          </div>

          <!-- FILE ATTACHMENT -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
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

                  <!-- CONTENT -->
                  <div class="card-body">
                    <div class="row py-3">
                      <div class="col-lg-5">
                        <div class="row">
                          <div class="col p-0">
                            <?php if ($fileAttachment) { ?>
                              <input type="text" id="dataInput_Log_FileUpload" name="dataInput_Log_FileUpload_1" style="display:none" value="{{ $fileAttachment; }}">
                              <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                $varAPIWebToken,
                                'dataInput_Log_FileUpload',
                                $fileAttachment,
                                'dataInput_Return'
                                ).
                              ''; ?>
                            <?php } else { ?>
                              <input type="text" id="dataInput_Log_FileUpload" name="dataInput_Log_FileUpload_1" style="display:none">
                              <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                $varAPIWebToken,
                                'dataInput_Log_FileUpload',
                                null,
                                'dataInput_Return'
                                ).
                              ''; ?>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- BUDGET DETAILS -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
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

                  <!-- BODY -->
                  <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
                    <table class="table table-head-fixed text-nowrap table-sm" id="tableGetBudgetDetails">
                      <thead>
                        <tr>
                          <!-- @if($statusRevisi == 1)
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Trano</th>
                          @endif -->
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Id</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                          <!-- @if($statusRevisi == 1)
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Advance</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Budget Avail</th>
                          @else -->
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Budget</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                          <!-- @endif -->
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total Budget</th>
                          <!-- @if($statusRevisi == 1)
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total Payment</th>
                          @endif -->
                            <th class="sticky-col forth-col-arf" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Qty Req</th>
                            <th class="sticky-col third-col-arf" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Price Req</th>
                            <th class="sticky-col second-col-arf" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Total Req</th>
                            <th class="sticky-col first-col-arf" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Balance Qty</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                        <tr class="loadingBudgetDetails">
                          <td colspan="11" class="p-0" style="border: 0px; height: 150px;">
                            <div class="d-flex flex-column justify-content-center align-items-center py-3">
                              <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                              </div>
                              <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                Loading...
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="errorMessageContainerBudgetDetails">
                          <td colspan="11" class="p-0" style="border: 0px;">
                            <div class="d-flex flex-column justify-content-center align-items-center py-3">
                              <div id="errorMessageBudgetDetails" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                            </div>
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>

                  <!-- FOOTER -->
                  <div class="card-body tableShowHideBudget">
                    <table style="float:right;">
                      <tr>
                        <th style="position: relative;right:20px;"> Total : <span id="TotalBudgetSelected">0.00</span></th>
                      </tr>
                      <tr>
                        <td>
                          <br>
                          <a class="btn btn-default btn-sm float-right" id="budget-details-add" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                          </a>
                          <a class="btn btn-default btn-sm float-right" id="budget-details-reset" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Add to Advance List"> Reset
                          </a>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- ADVANCE LIST (CART) -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
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

                  <!-- TABLE -->
                  <div class="card-body table-responsive p-0" style="height:135px;">
                    <table class="table table-head-fixed text-nowrap table-sm" id="tableAdvanceList">
                      <thead>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Id</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total</th>
                      </thead>

                      <tbody></tbody>
                    </table>
                  </div>

                  <!-- FOOTER -->
                  <div class="card-body">
                    <table style="float:right;">
                      <tr>
                        <th> Total Item :
                          <span id="GrandTotal">0.00</span>
                        </th>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- REMARK -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
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

                  <!-- CONTENT -->
                  <div class="card-body">
                    <div class="row py-3">
                      <textarea name="var_remark" id="remark" class="form-control">{{ $remark; }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- BUTTON -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col">
                <a onclick="CancelAdvance()" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                </a>

                <button class="btn btn-default btn-sm float-right" type="submit" id="submitArf" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Process.Advance.AdvanceRequest.Functions.Footer.FooterAdvanceRequestRevision')
@endsection