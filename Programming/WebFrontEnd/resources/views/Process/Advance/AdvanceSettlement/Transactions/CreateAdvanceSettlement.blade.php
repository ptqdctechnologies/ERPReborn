@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getAdvance')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Advance Settlement</label>
        </div>
      </div>

      @include('Process.Advance.AdvanceSettlement.Functions.Menu.MenuAdvanceSettlement')
      @if($var == 0)
      <div class="card" style="position:relative;bottom:10px;">
        <form method="post" enctype="multipart/form-data" action="{{ route('AdvanceSettlement.store') }}" id="FormStoreAdvanceSettlement">
          @csrf
          <!-- ADD NEW SETTLEMENT -->
          <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
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

                  <!-- BODY -->
                  <div class="card-body">
                    <div class="row pt-3" style="row-gap: 1rem; margin-bottom: 1rem;">
                      <!-- ADVANCE NUMBER -->
                      <div class="col-md-12 col-lg-5">
                        <div class="row">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Advance Number</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div>
                              <input id="advance_number" style="border-radius:0;" name="advance_number" size="20" class="form-control" readonly>
                              <input id="advance_id" style="border-radius:0;" name="advance_id" class="form-control" hidden>
                              <input id="modal_advance_document_number" style="border-radius:0;" name="modal_advance_document_number" class="form-control" hidden>
                            </div>
                            <div class="input-group-append">
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="javascript:;" id="myGetModalAdvanceTrigger" data-toggle="modal" data-target="#myGetModalAdvance">
                                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myGetModalAdvanceTrigger">
                                </a>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- BENEFICIARY -->
                      <div class="col-md-12 col-lg-5">
                        <div class="row">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Beneficiary</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div>
                              <input id="beneficiary_name" style="border-radius:0;" name="beneficiary_name" size="24" class="form-control" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row pb-3" style="row-gap: 1rem;">
                      <!-- BANK NAME -->
                      <div class="col-md-12 col-lg-5">
                        <div class="row">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div>
                              <input id="bank_name" style="border-radius:0;" name="bank_name" size="24" class="form-control" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- BANK ACCOUNT -->
                      <div class="col-md-12 col-lg-5">
                        <div class="row">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div>
                              <input id="bank_account" style="border-radius:0;" name="bank_account" size="24" class="form-control" readonly>
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
                            <input type="text" id="dataInput_Log_FileUpload" name="dataInput_Log_FileUpload_1" style="display:none">
                            <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                              $varAPIWebToken,
                              'dataInput_Log_FileUpload',
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
                  <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
                    <table class="table table-head-fixed text-nowrap table-sm" id="tableAdvanceDetail">
                      <thead>
                        <tr>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Transaction Number</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product ID</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                          <!-- <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Budget</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th> -->
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Request</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Settlement</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Balance</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- <tr>
                          <td style="text-align: center;">Adv/QDC/2025/000119</td>
                          <td style="text-align: center;">88000000000927</td>
                          <td style="text-align: center;">PLN - Biaya Penyambungan</td>
                          <td style="text-align: center;">65.00</td>
                          <td style="text-align: center;">65.00</td>
                          <td style="text-align: center;">72,475.00</td>
                          <td style="text-align: center;">kva</td>
                          <td style="text-align: center;">100,000.00</td>
                          <td style="border:1px solid #e9ecef;background-color:white;width: 100px;">
                            <input class="form-control number-without-negative" id="qty_req1" autocomplete="off" style="border-radius:0px;">
                          </td>
                          <td style="border:1px solid #e9ecef;background-color:white;width: 100px; padding-right: .3rem;">
                            <input class="form-control number-without-negative" id="total_req1" autocomplete="off" style="border-radius:0px;" disabled="">
                          </td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>

                  <div class="card-body">
                    <div class="row" style="gap: 1rem;">
                      <div class="col">
                        <div class="row py-3 px-2" style="border: 1px solid rgba(0,0,0,.1); border-radius: 2px;">
                          <div class="col">
                            <!-- TITLE -->
                            <div class="row text-bold" style="margin-bottom: 1rem; font-size: 0.9rem;">
                              Transaction Information
                            </div>

                            <!-- TOTAL BRF -->
                            <div class="row" style="margin-bottom: 1rem;">
                              <div class="col">
                                <div class="row">
                                  <label for="taxi" class="col-sm-3 col-md-4 col-lg-7 col-form-label p-0">Total BRF</label>
                                  <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                    <div class="input-group">
                                      <input disabled id="total_business_trip_request" name="total_business_trip_request" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- TOTAL SETTLEMENT -->
                            <div class="row" style="margin-bottom: 1rem;">
                              <div class="col">
                                <div class="row">
                                  <label for="taxi" class="col-sm-3 col-md-4 col-lg-7 col-form-label p-0">Total Settlement</label>
                                  <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                    <div class="input-group">
                                      <input disabled id="total_settlement" name="total_settlement" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- TOTAL UNSETTLEMENT -->
                            <div class="row" style="margin-bottom: 1rem;">
                              <div class="col">
                                <div class="row">
                                  <label for="taxi" class="col-sm-3 col-md-4 col-lg-7 col-form-label p-0">Total Unsettlement</label>
                                  <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                    <div class="input-group">
                                      <input disabled id="total_unsettlement" name="total_unsettlement" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- BALANCE -->
                            <div class="row">
                              <div class="col">
                                <div class="row">
                                  <label for="taxi" class="col-sm-3 col-md-4 col-lg-7 col-form-label p-0">Balance</label>
                                  <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                    <div class="input-group">
                                      <input disabled id="total_balanced" name="total_balanced" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <table style="float:right;">
                          <tr>
                            <th style="position: relative;right:20px;"> Total : <span id="TotalBudgetSelected">0.00</span></th>
                          </tr>
                          <tr>
                            <td>
                              <br>
                              @if($statusRevisi == 1)
                              <a class="btn btn-default btn-sm float-right" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                              </a>
                              @else
                              <a class="btn btn-default btn-sm float-right" id="budget-details-add" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                              </a>
                              <a class="btn btn-default btn-sm float-right" id="budget-details-reset" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
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
                <a onclick="" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
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
@include('Process.Advance.AdvanceSettlement.Functions.Footer.FooterAdvanceSettlement')
@endsection