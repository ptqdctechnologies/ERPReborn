@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getWorker')
<!-- @include('getFunction.getBeneficiary')
@include('getFunction.getBankList')
@include('getFunction.getBankAccount') -->

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Advance Request</label>
        </div>
      </div>

      @include('Process.Advance.AdvanceRequest.Functions.Menu.MenuAdvanceRequest')
      @if($var == 0)
      <!-- CONTENT -->
      <div class="card">
        <form method="post" enctype="multipart/form-data" action="{{ route('SelectWorkFlow') }}" id="FormSubmitAdvance">
          @csrf
          <input type="hidden" name="DocumentTypeID" value="{{ $DocumentTypeID }}" id="DocumentTypeID">

          <!-- ADD NEW ADVANCE REQUEST -->
          <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
                  <div class="card-header">
                    <label class="card-title">
                      Add New Advance Request
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <!-- BODY -->
                  @include('Process.Advance.AdvanceRequest.Functions.Header.HeaderAdvance')
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

                  <!-- BODY -->
                  <div class="card-body">
                    <div class="row py-3" style="gap: 15px;">
                      <div class="col-md-12 col-lg-5">
                        <!-- REQUESTER -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Requester</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div>
                              <input id="worker_name_second" style="border-radius:0;" name="worker_name_second" class="form-control" size="17" readonly>
                              <input id="worker_id_second" style="border-radius:0;" name="worker_id_second" class="form-control" hidden>
                            </div>
                            <div>
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="javascript:;" id="myWorkerSecondTrigger" data-toggle="modal" data-target="#myWorkerSecond">
                                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myWorkerSecondTrigger">
                                </a>
                              </span>
                            </div>
                            <div style="flex: 100%;">
                              <input id="worker_position_second" style="border-radius:0;" name="worker_position_second" class="form-control" readonly>
                            </div>
                          </div>
                        </div>

                        <!-- BENEFICIARY -->
                        <div class="row">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Beneficiary</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div>
                              <input id="beneficiary_second_person_position" style="border-radius:0;" size="17" class="form-control" name="beneficiary_second_person_position" readonly>
                              <input id="beneficiary_second_id" style="border-radius:0;" class="form-control" name="beneficiary_second_id" hidden>
                              <input id="beneficiary_second_person_ref_id" style="border-radius:0;" class="form-control" name="beneficiary_second_person_ref_id" hidden>
                            </div>
                            <div>
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="javascript:;" id="beneficiary_second_popup" data-toggle="modal" data-target="#myBeneficiarySecond">
                                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                </a>
                              </span>
                            </div>
                            <div style="flex: 100%;">
                              <input id="beneficiary_second_person_name" name="beneficiary_second_person_name" style="border-radius:0;" type="text" class="form-control" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-lg-5">
                        <!-- BANK NAME -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div>
                              <input id="bank_list_name" style="border-radius:0;" name="bank_list_name" class="form-control" size="17" readonly>
                              <input id="bank_list_code" style="border-radius:0;" class="form-control" name="bank_list_code" hidden>
                            </div>
                            <div>
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="javascript:;" id="bank_list_popup_vendor" data-toggle="modal" data-target="#myGetBankList" class="myGetBankList">
                                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                </a>
                              </span>
                            </div>
                            <div style="flex: 100%;">
                              <input id="bank_list_detail" style="border-radius:0;" class="form-control" name="bank_list_detail" readonly>
                            </div>
                          </div>
                        </div>

                        <!-- BANK ACCOUNT -->
                        <div class="row">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div>
                              <input id="bank_accounts" style="border-radius:0;" name="bank_accounts" class="form-control number-without-characters" size="17" autocomplete="off" readonly>
                              <input id="bank_accounts_duplicate" style="border-radius:0;" class="form-control" name="bank_accounts_duplicate" hidden>
                              <input id="bank_accounts_id" style="border-radius:0;" class="form-control" name="bank_accounts_id" hidden>
                              <input id="bank_accounts_duplicate_id" style="border-radius:0;" class="form-control" name="bank_accounts_duplicate_id" hidden>
                            </div>
                            <div>
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="javascript:;" id="bank_accounts_popup_vendor" data-toggle="modal" data-target="#myBankAccount" class="myBankAccount">
                                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                </a>
                              </span>
                            </div>
                            <div style="flex: 100%;">
                              <input id="bank_accounts_detail" style="border-radius:0;" class="form-control" name="bank_accounts_detail" autocomplete="off" readonly>
                              <input id="bank_accounts_duplicate_detail" style="border-radius:0;" class="form-control" name="bank_accounts_duplicate_detail" hidden>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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

                  <!-- BODY -->
                  <div class="card-body">
                    <div class="row py-3">
                      <div class="col-lg-5">
                        <div class="row">
                          <div class="col p-0">
                            <input type="text" id="dataInput_Log_FileUpload_1" name="dataInput_Log_FileUpload_1" style="display:none">
                            <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                              $varAPIWebToken,
                              'dataInput_Log_FileUpload_1',
                              null,
                              'dataInput_Return'
                              ).
                            ''; ?>
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
                    <table class="table table-head-fixed text-nowrap table-sm">
                      <thead>
                        <tr>
                          @if($statusRevisi == 1)
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Trano</th>
                          @endif
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Id</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                          @if($statusRevisi == 1)
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Advance</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Budget Avail</th>
                          @else
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Budget</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                          @endif
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total Budget</th>
                          @if($statusRevisi == 1)
                            <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total Payment</th>
                          @endif
                            <th class="sticky-col forth-col-arf" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Qty Req</th>
                            <th class="sticky-col third-col-arf" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Price Req</th>
                            <th class="sticky-col second-col-arf" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Total Req</th>
                            <th class="sticky-col first-col-arf" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Balance Qty</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <!-- FOOTER -->
                  <div class="card-body tableShowHideBudget">
                    <table style="float:right;">
                      <tr>
                        <th style="position: relative;right:20px;"> Total : <span id="TotalBudgetSelected"></span></th>
                      </tr>
                      <tr>
                        <td>
                          <br>
                          @if($statusRevisi == 1)
                          <a class="btn btn-default btn-sm float-right" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                          </a>
                          @else
                          <a class="btn btn-default btn-sm float-right" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                          </a>
                          <a class="btn btn-default btn-sm float-right" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Add to Advance List"> Reset
                          </a>
                          @endif
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
                    <table class="table table-head-fixed text-nowrap table-sm">
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
                          <span id="GrandTotal"></span>
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
                      <textarea name="var_remark" id="remark" class="form-control"></textarea>
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
      @endif
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Process.Advance.AdvanceRequest.Functions.Footer.FooterAdvanceRequest')
@endsection