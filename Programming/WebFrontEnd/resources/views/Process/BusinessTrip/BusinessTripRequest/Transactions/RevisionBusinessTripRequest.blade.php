@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProduct')
@include('Process.BusinessTrip.BusinessTripRequest.Functions.PopUp.PopUpBusinessTripRequestRevision')
@include('getFunction.getSite')
@include('getFunction.getWorker')
@include('getFunction.getBeneficiary')
@include('getFunction.getBank')
@include('getFunction.getBankList')
@include('getFunction.getBankAccount')
@include('getFunction.getEntityBankAccount')
@include('getFunction.getWorkFlow')
@include('getFunction.getBusinessTripRequest')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITTLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Business Trip Request Form Revision
          </label>
        </div>
      </div>

      @include('Process.BusinessTrip.BusinessTripRequest.Functions.Menu.MenuBusinessTripRequest')
      <div class="card">
        <form method="post" action="{{ route('SelectWorkFlow') }}" id="FormRevisionBusinessTrip">
          @csrf
          <input hidden id="DocumentTypeID" name="DocumentTypeID">
          <input hidden id="var_combinedBudget_RefID" name="var_combinedBudget_RefID" value="<?= $budget['id']; ?>" />
          <input hidden id="combinedBudgetSectionDetail_RefID" name="combinedBudgetSectionDetail_RefID" value="<?= $combinedBudgetSectionDetail_RefID; ?>" />
          <input hidden id="personBusinessTripRefID" name="personBusinessTripRefID" value="<?= $personBusinessTripRefID; ?>" />
          <input hidden id="personBusinessTripDetailRefID" name="personBusinessTripDetailRefID" value="<?= $personBusinessTripDetailRefID; ?>" />
          <input hidden id="budgetDetailsData" />

          <!-- BUSINESS REQUEST TRIP FORM -->
          <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- TITLE -->
                  <div class="card-header">
                    <label class="card-title">
                      Business Request Trip Form
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <!-- BODY -->
                  <div class="card-body">
                    @include('Process.BusinessTrip.BusinessTripRequest.Functions.Header.HeaderBusinessTripRequestRevision')
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

          <!-- PLEASE FILL THIS FORM BELOW -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- TITLE -->
                  <div class="card-header">
                    <label class="card-title">
                      Please Fill this Form Below
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <!-- BODY -->
                  <div class="card-body">
                    <div class="row pt-3" style="gap: 15px; margin-bottom: 1rem;">
                      <div class="col-md-12 col-lg-5">
                        <!-- REQUESTER -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Requester</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div>
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="javascript:;" id="requester_popup" data-toggle="modal" data-target="#myWorker" class="myWorker">
                                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                </a>
                              </span>
                            </div>
                            <div>
                              <input id="requester_detail" style="border-radius:0;" class="form-control" size="17" name="requester_detail" readonly value="<?= $requester['position']; ?>" />
                            </div>
                            <div style="flex: 100%;">
                              <input name="requester" id="requester" style="border-radius:0;" type="text" class="form-control" readonly value="<?= $requester['name']; ?>" />
                              <input name="requester_id" id="requester_id" style="border-radius:0;" type="hidden" class="form-control" readonly value="<?= $requester['id']; ?>" />
                            </div>
                          </div>
                        </div>

                        <!-- CONTACT PHONE -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Contact Phone</label>
                          <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                            <div class="input-group">
                              <input id="contactPhone" name="contactPhone" style="border-radius:0;" type="text" class="form-control" disabled value="<?= $requester['contact']; ?>" />
                            </div>
                          </div>
                        </div>

                        <!-- DATE COMMANCE TRAVEL -->
                        <div class="row">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date Commence Travel</label>
                          <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                            <div class="input-group" style="width: 95px;">
                              <input id="dateCommance" name="dateCommance" style="border-radius:0;" type="date" class="form-control" value="<?= $dateTravel['commence']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row" id="dateCommenceTravelMessage" style="margin-top: .3rem; display: none;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div class="text-red">
                              Date Commence Travel cannot be empty.
                            </div>
                          </div>
                        </div>

                        <!-- DATE END TRAVEL -->
                        <div class="row" style="margin-top: 1rem;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date End Travel</label>
                          <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                            <div class="input-group" style="width: 95px;">
                              <input id="dateEnd" name="dateEnd" style="border-radius:0;" type="date" class="form-control" value="<?= $dateTravel['end']; ?>" />
                            </div>
                          </div>
                        </div>
                        <div class="row" id="dateEndTravelMessage" style="margin-top: .3rem; display: none;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div class="text-red">
                              Date End Travel cannot be empty.
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-lg-5">
                        <!-- DEPARTING FROM -->
                        <div class="row">
                          <label for="departingFrom" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Departing From</label>
                          <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                            <div class="input-group" style="width: 95px;">
                              <input id="departingFrom" name="departingFrom" style="border-radius:0;" type="text" class="form-control" autocomplete="off" value="<?= $departing['from']; ?>" />
                            </div>
                          </div>
                        </div>
                        <div class="row" id="departingFromMessage" style="margin-top: .3rem; display: none;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div class="text-red">
                              Departing From cannot be empty.
                            </div>
                          </div>
                        </div>

                        <!-- DESTINATION TO -->
                        <div class="row" style="margin-top: 1rem;">
                          <label for="destinationTo" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Destination To</label>
                          <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                            <div class="input-group" style="width: 95px;">
                              <input id="destinationTo" name="destinationTo" style="border-radius:0;" type="text" class="form-control" autocomplete="off" value="<?= $departing['to']; ?>" />
                            </div>
                          </div>
                        </div>
                        <div class="row" id="destinationToMessage" style="margin-top: .3rem; display: none;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div class="text-red">
                              Destination To cannot be empty.
                            </div>
                          </div>
                        </div>

                        <!-- REASON TO TRAVEL -->
                        <div class="row" style="margin-top: 1rem;">
                          <label for="reasonTravel" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Reason To Travel</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <textarea id="reasonTravel" name="reasonTravel" style="border-radius:0;" cols="30" rows="3" class="form-control"><?= $reason; ?></textarea>
                          </div>
                        </div>
                        <div class="row" id="reasonToTravelMessage" style="margin-top: .3rem; display: none;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div class="text-red">
                              Reason to Travel cannot be empty.
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

          <!-- BUDGET DETAILS -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- TITLE -->
                  <div class="card-header">
                    <label class="card-title">
                      Budget Details
                    </label>
                    <div class="card-tools d-flex" style="margin-left: -50px !important;">
                      <div>
                        <input id="budget_detail_search" style="border-radius: 4px; display: none;" class="form-control" autocomplete="off" placeholder="Search Product">
                      </div>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <div class="wrapper-budget table-responsive card-body p-0" style="height: 12em;">
                    <table id="budgetTable" class="table table-head-fixed text-wrap table-sm">
                      <thead>
                        <tr>
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;"></th>
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Product Code</th>
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Product Name</th>
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Total Budget</th>
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Currency</th>
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Balanced Budget</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                        <tr class="loading">
                          <td colspan="9">
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
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- BUSINESS TRIP BUDGET DETAILS -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Business Trip Budget Details
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="row pt-3" style="gap: 1rem;">
                      <div class="col-12">
                        <!-- TITLE -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <div style="font-size: 0.9rem; font-weight: bold;">
                            1. Travel & Fares
                          </div>
                        </div>

                        <div class="row" style="row-gap: 1rem;" id="travel-fares-container">
                          <div class="loading-container py-3" style="justify-items: center; width: 100%;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                              <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                              </div>
                              <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                Loading...
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <!-- TITLE -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <div style="font-size: 0.9rem; font-weight: bold;">
                            2. Allowance
                          </div>
                        </div>
                        <div class="row" id="allowance-container">
                          <div class="loading-container py-3" style="justify-items: center; width: 100%;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                              <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                              </div>
                              <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                Loading...
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <!-- TITLE -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <div style="font-size: 0.9rem; font-weight: bold;">
                            3. Entertainment
                          </div>
                        </div>
                        <div class="row" id="entertainment-container">
                          <div class="loading-container py-3" style="justify-items: center; width: 100%;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                              <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                              </div>
                              <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                Loading...
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12" style="margin-bottom: 1rem;">
                        <!-- TITLE -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <div style="font-size: 0.9rem; font-weight: bold;">
                            4. Other
                          </div>
                        </div>
                        <div class="row" id="other-container">
                          <div class="loading-container py-3" style="justify-items: center; width: 100%;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                              <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                              </div>
                              <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                Loading...
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <hr>
                            <div class="row">
                              <div class="col-9"></div>
                              <div class="col-3">
                                <div class="row">
                                  <label class="p-0 col-5 text-bold">Total BRF</label>
                                  <div class="p-0">
                                    <div class="input-group">
                                      <input id="total_business_trip" name="total_business_trip" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative" value="<?= number_format($total['brf'], 2, '.', ','); ?>" disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="row" id="totalBRFMessage" style="margin-top: .3rem; display: none;">
                                  <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                    <div class="text-red">
                                      Total BRF cannot be empty.
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- PAYMENT -->
                    <div class="row py-3">
                      <div class="col-12 p-0">
                        <!-- PAYMENT -->
                        <div class="row m-0">
                          <div class="text-center" style="margin-bottom: 1rem; font-size: 0.9rem; font-weight: bold;">
                            Payment
                          </div>
                        </div>

                        <!-- DIRECT TO VENDOR -->
                        <div class="row m-0">
                          <div class="col-md-12 col-lg-5 p-0" style="margin-bottom: 1rem;">
                            <div class="row mt-0 mx-0">
                              <label for="direct_to_vendor" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Direct to Vendor</label>
                              <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                <div class="input-group">
                                  <input id="direct_to_vendor" name="vendor_amount" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative" value="<?= number_format($payment['directVendor']['value'], 2, '.', ','); ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="row" id="directToVendorMessage" style="margin-top: .3rem; display: none;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div class="text-red">
                                  Direct to Vendor cannot be empty.
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12 col-lg-5 p-0">
                            <!-- BANK NAME -->
                            <div class="row mt-0 mx-0" style="margin-bottom: 1rem;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div>
                                  <span style="border-radius:0;" class="input-group-text form-control">
                                    <a href="javascript:;" id="bank_list_popup_vendor" data-toggle="modal" data-target="#myGetBankList" class="myGetBankList">
                                      <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                    </a>
                                  </span>
                                </div>
                                <div>
                                  <input id="bank_list_name" style="border-radius:0;" class="form-control" size="17" readonly value="<?= $payment['directVendor']['bankName']['code']; ?>" />
                                  <input id="bank_list_code" name="vendor_bank_name" style="border-radius:0;" class="form-control" hidden value="<?= $payment['directVendor']['bankName']['id']; ?>" />
                                </div>
                                <div style="flex: 100%;">
                                  <input id="bank_list_detail" style="border-radius:0;" class="form-control" readonly value="<?= $payment['directVendor']['bankName']['name']; ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="row" id="bankNameVendorMessage" style="margin-top: .3rem; display: none;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div class="text-red">
                                  Bank Name cannot be empty.
                                </div>
                              </div>
                            </div>

                            <!-- BANK ACCOUNT -->
                            <div class="row mt-0 mx-0">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div>
                                  <span style="border-radius:0;" class="input-group-text form-control">
                                    <a href="javascript:;" id="bank_accounts_popup_vendor" data-toggle="modal" data-target="#myBankAccount" class="myBankAccount">
                                      <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                    </a>
                                  </span>
                                </div>
                                <div>
                                  <input id="bank_accounts" style="border-radius:0;" class="form-control number-without-characters" size="17" autocomplete="off" readonly value="<?= $payment['directVendor']['bankAccount']['number']; ?>" />
                                  <input id="bank_accounts_duplicate" style="border-radius:0;" class="form-control" hidden value="<?= $payment['directVendor']['bankAccount']['number']; ?>" />
                                  <input id="bank_accounts_id" name="vendor_bank_account" style="border-radius:0;" class="form-control" hidden value="<?= $payment['directVendor']['bankAccount']['id']; ?>" />
                                  <input id="bank_accounts_duplicate_id" style="border-radius:0;" class="form-control" hidden value="<?= $payment['directVendor']['bankAccount']['id']; ?>" />
                                </div>
                                <div style="flex: 100%;">
                                  <input id="bank_accounts_detail" style="border-radius:0;" class="form-control" autocomplete="off" readonly value="<?= $payment['directVendor']['bankAccount']['name']; ?>" />
                                  <input id="bank_accounts_duplicate_detail" style="border-radius:0;" class="form-control" hidden value="<?= $payment['directVendor']['bankAccount']['name']; ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="row" id="bankAccountVendorMessage" style="margin-top: .3rem; display: none;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div class="text-red">
                                  Bank Account cannot be empty.
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <hr />

                        <!-- BY CORP CARD -->
                        <div class="row m-0">
                          <div class="col-md-12 col-lg-5 p-0" style="margin-bottom: 1rem;">
                            <div class="row mt-0 mx-0">
                              <label for="by_corp_card" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">By Corp Card</label>
                              <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                <div class="input-group">
                                  <input id="by_corp_card" name="corp_amount" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative" value="<?= number_format($payment['corpCard']['value'], 2, '.', ','); ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="row" id="byCorpCardMessage" style="margin-top: .3rem; display: none;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div class="text-red">
                                  By Corp Card cannot be empty.
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12 col-lg-5 p-0">
                            <!-- BANK NAME -->
                            <div class="row mt-0 mx-0" style="margin-bottom: 1rem;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div>
                                  <span style="border-radius:0;" class="input-group-text form-control">
                                    <a href="javascript:;" id="bank_list_popup_corp_card" data-toggle="modal" data-target="#myGetBankListSecond" class="myGetBankListSecond">
                                      <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                    </a>
                                  </span>
                                </div>
                                <div>
                                  <input id="bank_list_second_name" style="border-radius:0;" class="form-control" size="17" readonly value="<?= $payment['corpCard']['bankName']['code']; ?>" />
                                  <input id="bank_list_second_code" name="corp_bank_name" style="border-radius:0;" class="form-control" hidden value="<?= $payment['corpCard']['bankName']['id']; ?>" />
                                </div>
                                <div style="flex: 100%;">
                                  <input id="bank_list_second_detail" style="border-radius:0;" class="form-control" readonly value="<?= $payment['corpCard']['bankName']['name']; ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="row" id="bankNameCorpCardMessage" style="margin-top: .3rem; display: none;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div class="text-red">
                                  Bank Name cannot be empty.
                                </div>
                              </div>
                            </div>

                            <!-- BANK ACCOUNT -->
                            <div class="row mt-0 mx-0">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div>
                                  <span style="border-radius:0;" class="input-group-text form-control">
                                    <a href="javascript:;" id="bank_accounts_popup_corp_card" data-toggle="modal" data-target="#myBankAccountSecond" class="myBankAccountSecond">
                                      <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                    </a>
                                  </span>
                                </div>
                                <div>
                                  <input id="bank_accounts_second" style="border-radius:0;" class="form-control number-without-characters" size="17" autocomplete="off" readonly value="<?= $payment['corpCard']['bankAccount']['number']; ?>" />
                                  <input id="bank_accounts_duplicate_second" style="border-radius:0;" class="form-control number-without-characters" size="17" autocomplete="off" hidden value="<?= $payment['corpCard']['bankAccount']['number']; ?>" />
                                  <input id="bank_accounts_id_second" name="corp_bank_account" style="border-radius:0;" class="form-control" hidden value="<?= $payment['corpCard']['bankAccount']['id']; ?>" />
                                  <input id="bank_accounts_duplicate_id_second" style="border-radius:0;" class="form-control" hidden value="<?= $payment['corpCard']['bankAccount']['id']; ?>" />
                                </div>
                                <div style="flex: 100%;">
                                  <input id="bank_accounts_detail_second" style="border-radius:0;" class="form-control" autocomplete="off" readonly value="<?= $payment['corpCard']['bankAccount']['name']; ?>" />
                                  <input id="bank_accounts_detail_duplicate_second" style="border-radius:0;" class="form-control" autocomplete="off" hidden value="<?= $payment['corpCard']['bankAccount']['name']; ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="row" id="bankAccountCorpCardMessage" style="margin-top: .3rem; display: none;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div class="text-red">
                                  Bank Account cannot be empty.
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <hr />

                        <!-- TO OTHER -->
                        <div class="row m-0">
                          <div class="col-md-12 col-lg-5 p-0" style="margin-bottom: 1rem;">
                            <div class="row mt-0 mx-0">
                              <label for="to_other" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">To Other</label>
                              <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                <div class="input-group">
                                  <input id="to_other" name="other_amount" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative" value="<?= number_format($payment['other']['value'], 2, '.', ','); ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="row" id="toOtherMessage" style="margin-top: .3rem; display: none;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div class="text-red">
                                  To Other cannot be empty.
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12 col-lg-5 p-0">
                            <!-- BENEFICIARY -->
                            <div class="row mt-0 mx-0" style="margin-bottom: 1rem;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Beneficiary</label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div>
                                  <span style="border-radius:0;" class="input-group-text form-control">
                                    <a href="javascript:;" id="beneficiary_second_popup" data-toggle="modal" data-target="#myBeneficiarySecond">
                                      <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                    </a>
                                  </span>
                                </div>
                                <div>
                                  <input id="beneficiary_second_person_position" style="border-radius:0;" size="17" class="form-control" readonly value="<?= $payment['other']['beneficiary']['position']; ?>" />
                                  <input id="beneficiary_second_id" name="other_beneficiary" style="border-radius:0;" class="form-control" hidden value="<?= $payment['other']['beneficiary']['id']; ?>" />
                                  <input id="beneficiary_second_person_ref_id" style="border-radius:0;" class="form-control" hidden value="<?= $payment['other']['beneficiary']['positionID']; ?>" />
                                </div>
                                <div style="flex: 100%;">
                                  <input id="beneficiary_second_person_name" style="border-radius:0;" type="text" class="form-control" readonly value="<?= $payment['other']['beneficiary']['name']; ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="row" id="beneficiaryToOtherMessage" style="margin-top: .3rem; display: none;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div class="text-red">
                                  Beneficiary cannot be empty.
                                </div>
                              </div>
                            </div>

                            <!-- BANK NAME -->
                            <div class="row mt-0 mx-0" style="margin-bottom: 1rem;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div>
                                  <span style="border-radius:0;" class="input-group-text form-control">
                                    <a href="javascript:;" id="bank_list_popup_second" data-toggle="modal" data-target="#myGetBankListThird" class="myGetBankListThird">
                                      <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                    </a>
                                  </span>
                                </div>
                                <div>
                                  <input id="bank_list_third_name" style="border-radius:0;" class="form-control" size="17" readonly value="<?= $payment['other']['bankName']['code']; ?>" />
                                  <input id="bank_list_third_code" name="other_bank_name" style="border-radius:0;" class="form-control" hidden value="<?= $payment['other']['bankName']['id']; ?>" />
                                </div>
                                <div style="flex: 100%;">
                                  <input id="bank_list_third_detail" style="border-radius:0;" class="form-control" readonly value="<?= $payment['other']['bankName']['name']; ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="row" id="bankNameToOtherMessage" style="margin-top: .3rem; display: none;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div class="text-red">
                                  Bank Name cannot be empty.
                                </div>
                              </div>
                            </div>

                            <!-- BANK ACCOUNT -->
                            <div class="row mt-0 mx-0">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div>
                                  <span style="border-radius:0;" class="input-group-text form-control">
                                    <a href="javascript:;" id="bank_accounts_third_popup" data-toggle="modal" data-target="#myBankAccountThird">
                                      <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                    </a>
                                  </span>
                                </div>
                                <div>
                                  <input id="bank_accounts_third" style="border-radius:0;" size="17" class="form-control number-without-characters" autocomplete="off" readonly value="<?= $payment['other']['bankAccount']['number']; ?>" />
                                  <input id="bank_accounts_duplicate_third" style="border-radius:0;" size="17" class="form-control number-without-characters" hidden value="<?= $payment['other']['bankAccount']['number']; ?>" />
                                  <input id="bank_accounts_third_id" name="other_bank_account" style="border-radius:0;" class="form-control" hidden value="<?= $payment['other']['bankAccount']['id']; ?>" />
                                  <input id="bank_accounts_duplicate_third_id" style="border-radius:0;" class="form-control" hidden value="<?= $payment['other']['bankAccount']['id']; ?>" />
                                </div>
                                <div style="flex: 100%;">
                                  <input id="bank_accounts_third_detail" style="border-radius:0;" class="form-control" autocomplete="off" readonly value="<?= $payment['other']['bankAccount']['name']; ?>" />
                                  <input id="bank_accounts_duplicate_third_detail" style="border-radius:0;" class="form-control" hidden value="<?= $payment['other']['bankAccount']['name']; ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="row" id="bankAccountToOtherMessage" style="margin-top: .3rem; display: none;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div class="text-red">
                                  Bank Account cannot be empty.
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <hr />

                        <!-- TOTAL PAYMENT -->
                        <div class="row m-0">
                          <div class="col-md-12 col-lg-5 p-0">
                            <div class="row mt-0 mx-0">
                              <label for="total_payment" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Total Payment</label>
                              <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                <div class="input-group">
                                  <input id="total_payment" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative" disabled value="<?= number_format($total['payment'], 2, '.', ','); ?>" />
                                </div>
                              </div>
                            </div>
                            <div class="row" id="totalPaymentMessage" style="margin-top: .3rem; display: none;">
                              <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                              <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                <div class="text-red">
                                  Total Payment cannot be empty.
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
            </div>
          </div>

          <!-- BUTTON -->
          <div class="px-3 pb-3">
            <div style="display: flex; justify-content: flex-end; gap: 8px;">
              <!-- <button type="button" id="budget-details-add" class="btn btn-default btn-sm float-right" data-toggle="modal" data-target="#businessTripRevisionFormModal" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Business Trip"> Submit
              </button> -->

              <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Business Trip"> Submit
              </button>
              
              <button class="btn btn-default btn-sm button-submit" id="cancelButton" type="button" onclick="cancelForm('{{ route('BusinessTripRequest.index', ['var' => 1]) }}')">
                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" />
                <div>Cancel</div>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="businessTripRevisionFormModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document" style="height: -webkit-fill-available; display: flex; align-items: center;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="margin: 0px;font-weight:bold;">Are you sure you want to save this data?</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="row" style="margin-bottom: 1rem;">
          <div class="col">
            <div style="font-size: 0.9rem;">
              Travel & Fares
            </div>
          </div>
          <div class="col">
            <div id="travelSummary" style="font-size: 0.9rem;text-align:right;"></div>
          </div>
        </div>
        <div class="row" style="margin-bottom: 1rem;">
          <div class="col">
            <div style="font-size: 0.9rem;">
              Allowance
            </div>
          </div>
          <div class="col">
            <div id="allowanceSummary" style="font-size: 0.9rem;text-align:right;"></div>
          </div>
        </div>
        <div class="row" style="margin-bottom: 1rem;">
          <div class="col">
            <div style="font-size: 0.9rem;">
              Entertainment
            </div>
          </div>
          <div class="col">
            <div id="entertainmentSummary" style="font-size: 0.9rem;text-align:right;"></div>
          </div>
        </div>
        <div class="row" style="margin-bottom: 1rem;">
          <div class="col">
            <div style="font-size: 0.9rem;">
              Other
            </div>
          </div>
          <div class="col">
            <div id="otherSummary" style="font-size: 0.9rem;text-align:right;"></div>
          </div>
        </div>
        <div class="row" style="margin-bottom: 1rem;">
          <div class="col">
            <!-- <div style="font-size: 0.9rem;text-align: right;margin-bottom: 0.3rem;">+</div> -->
            <hr style="margin: 0;" />
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div style="font-size: 0.9rem;">
              Total BRF
            </div>
          </div>
          <div class="col">
            <div id="totalSummary" style="font-size: 0.9rem;text-align:right;"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="revisionBRF" class="btn btn-default btn-sm" onclick="SubmitForm();" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
          <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Yes, save it
        </button>

        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color:#e9ecef;border:1px solid #ced4da;">
          <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> No, cancel
        </button>
      </div>
    </div>
  </div>
</div>

@include('Partials.footer')
@include('Process.BusinessTrip.BusinessTripRequest.Functions.Footer.FooterBusinessTripRequestRevision')
@endsection