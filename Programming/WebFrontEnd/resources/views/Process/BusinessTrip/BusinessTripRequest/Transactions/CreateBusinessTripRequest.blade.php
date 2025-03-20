@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProduct')
@include('Process.BusinessTrip.BusinessTripRequest.Functions.PopUp.PopUpBusinessTripRequestRevision')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getWorker')
@include('getFunction.getBeneficiary')
@include('getFunction.getBank')
@include('getFunction.getBankList')
@include('getFunction.getBankAccount')
@include('getFunction.getEntityBankAccount')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITTLE -->
      <div class="row title-pages">
        <div class="col-sm-6 title">
          Business Trip Request Form
        </div>
      </div>

      @include('Process.BusinessTrip.BusinessTripRequest.Functions.Menu.MenuBusinessTripRequest')
      @if($var == 0)
        <input hidden id="budgetDetailsData" name="budgetDetailsData" />
        <input hidden disabled id="total_transport" name="total_transport" style="border-radius:0;" type="text" class="form-control">

        <div class="card">
          <form method="POST" enctype="multipart/form-data" id="FormSubmitBusinessTrip">
            @csrf
            <!-- ADD NEW BUSINESS REQUEST TRIP FORM -->
            <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        Add New Business Request Trip Form
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>

                    <div class="card-body">
                      @include('Process.BusinessTrip.BusinessTripRequest.Functions.Header.HeaderBusinessTripRequest')
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

                    <div class="card-body">
                      <div class="row pt-3" style="gap: 15px;">
                        <div class="col-md-12 col-lg-5">
                          <!-- REQUESTER -->
                          <div class="row" style="margin-bottom: 1rem;">
                            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Requester</label>
                            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                              <div>
                                <input id="requester_detail" style="border-radius:0;" class="form-control" size="17" name="requester_detail" readonly>
                              </div>
                              <div>
                                <span style="border-radius:0;" class="input-group-text form-control">
                                  <a href="javascript:;" id="requester_popup" data-toggle="modal" data-target="#myWorker" class="myWorker">
                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                  </a>
                                </span>
                              </div>
                              <div style="flex: 100%;">
                                <input name="requester" id="requester" style="border-radius:0;" type="text" class="form-control" readonly>
                                <input name="requester_id" id="requester_id" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                <input name="var_combinedBudget" id="combinedBudget" style="border-radius:0;" type="hidden" class="form-control" readonly>
                              </div>
                            </div>
                          </div>

                          <!-- CONTACT PHONE -->
                          <div class="row" style="margin-bottom: 1rem;">
                            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Contact Phone</label>
                            <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                              <div class="input-group">
                                <input id="contactPhone" name="contactPhone" style="border-radius:0;" type="text" class="form-control" disabled>
                              </div>
                            </div>
                          </div>

                          <!-- DATE COMMANCE TRAVEL -->
                          <div class="row" style="margin-bottom: 1rem;">
                            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date Commence Travel</label>
                            <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                              <div class="input-group" style="width: 95px;">
                                <input id="dateCommance" name="dateCommance" style="border-radius:0;" type="date" class="form-control">
                              </div>
                            </div>
                          </div>

                          <!-- DATE END TRAVEL -->
                          <div class="row">
                            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date End Travel</label>
                            <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                              <div class="input-group" style="width: 95px;">
                                <input id="dateEnd" name="dateEnd" style="border-radius:0;" type="date" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12 col-lg-5">
                          <!-- DEPARTING FROM -->
                          <div class="row" style="margin-bottom: 1rem;">
                            <label for="headStationLocation" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Departing From</label>
                            <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                              <div class="input-group" style="width: 95px;">
                                <input id="headStationLocation" name="headStationLocation" style="border-radius:0;" type="text" class="form-control" autocomplete="off">
                              </div>
                            </div>
                          </div>

                          <!-- DESTINATION TO -->
                          <div class="row" style="margin-bottom: 1rem;">
                            <label for="bussinesLocation" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Destination To</label>
                            <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                              <div class="input-group" style="width: 95px;">
                                <input id="bussinesLocation" name="bussinesLocation" style="border-radius:0;" type="text" class="form-control" autocomplete="off">
                              </div>
                            </div>
                          </div>

                          <!-- REASON TO TRAVEL -->
                          <div class="row" style="margin-bottom: 1rem;">
                            <label for="reasonTravel" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Reason To Travel</label>
                            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                              <textarea id="reasonTravel" name="reasonTravel" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
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
                    <div class="card-header">
                      <label class="card-title">
                        Budget Details
                      </label>
                      <div class="card-tools d-flex" style="margin-left: -50px !important;">
                        <div>
                          <input id="budget_detail_search" style="border-radius: 4px; display: none;" class="form-control" name="budget_detail_search" autocomplete="off" placeholder="Search Product">
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
                            <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Product Id</th>
                            <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Product Name</th>
                            <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Total Budget</th>
                            <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Qty Budget</th>
                            <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Qty Avail</th>
                            <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Price</th>
                            <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Currency</th>
                            <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Current Budget</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
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

                          <div class="row" style="row-gap: 1rem;">
                            <!-- TAXI -->
                            <div class="col-3">
                              <div class="row">
                                <label for="taxi" class="p-0 col-5">Taxi</label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="taxi" name="taxi" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- AIRPLANE -->
                            <div class="col-3">
                              <div class="row">
                                <label for="airplane" class="p-0 col-5">Airplane</label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="airplane" name="airplane" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- TRAIN -->
                            <div class="col-3">
                              <div class="row">
                                <label for="train" class="p-0 col-5">Train</label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="train" name="train" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- BUS -->
                            <div class="col-3">
                              <div class="row">
                                <label for="bus" class="p-0 col-5">Bus</label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="bus" name="bus" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- SHIP -->
                            <div class="col-3">
                              <div class="row">
                                <label for="ship" class="p-0 col-5">Ship</label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="ship" name="ship" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- TOL/ROAD -->
                            <div class="col-3">
                              <div class="row">
                                <label for="tol_road" class="p-0 col-5">Tol/Road</label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="tol_road" name="tol_road" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- PARK -->
                            <div class="col-3">
                              <div class="row">
                                <label for="park" class="p-0 col-5">Park</label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="park" name="park" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- ACCESS BAGAGE -->
                            <div class="col-3">
                              <div class="row">
                                <label for="access_bagage" class="p-0 col-5">Access Bagage</label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="access_bagage" name="access_bagage" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- FUEL -->
                            <div class="col-3">
                              <div class="row">
                                <label for="fuel" class="p-0 col-5">Fuel</label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="fuel" name="fuel" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- HOTEL -->
                            <div class="col-3">
                              <div class="row">
                                <label for="hotel" class="p-0 col-5">Hotel</label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="hotel" name="hotel" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- MESS -->
                            <div class="col-3">
                              <div class="row">
                                <label for="mess" class="p-0 col-5">Mess</label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="mess" name="mess" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- GUEST HOUSE -->
                            <div class="col-3">
                              <div class="row">
                                <label for="guest_house" class="p-0 col-5">Guest House</label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="guest_house" name="guest_house" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
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
                          <div class="row">
                            <div class="col-3">
                              <div class="row">
                                <label class="p-0 col-5 d-none"></label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="allowance" name="allowance" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
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
                          <div class="row">
                            <div class="col-3">
                              <div class="row">
                                <label class="p-0 col-5 d-none"></label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="entertainment" name="entertainment" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
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
                          <div class="row">
                            <div class="col-3">
                              <div class="row">
                                <label class="p-0 col-5 d-none"></label>
                                <div class="p-0">
                                  <div class="input-group">
                                    <input id="other" name="other" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                  </div>
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
                                        <input id="total_business_trip" name="total_business_trip" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative" disabled>
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
                            <div class="col-md-12 col-lg-5 p-0">
                              <div class="row mt-0 mx-0" style="margin-bottom: 1rem;">
                                <label for="direct_to_vendor" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Direct to Vendor</label>
                                <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                  <div class="input-group">
                                    <input id="direct_to_vendor" name="direct_to_vendor" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
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
                              <div class="row mt-0 mx-0">
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

                          <hr />

                          <!-- BY CORP CARD -->
                          <div class="row m-0">
                            <div class="col-md-12 col-lg-5 p-0">
                              <div class="row mt-0 mx-0" style="margin-bottom: 1rem;">
                                <label for="by_corp_card" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">By Corp Card</label>
                                <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                  <div class="input-group">
                                    <input id="by_corp_card" name="by_corp_card" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
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
                                    <input id="bank_list_second_name" style="border-radius:0;" name="bank_list_second_name" class="form-control" size="17" readonly>
                                    <input id="bank_list_second_code" style="border-radius:0;" class="form-control" name="bank_list_second_code" hidden>
                                  </div>
                                  <div>
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="javascript:;" id="bank_list_popup_corp_card" data-toggle="modal" data-target="#myGetBankListSecond" class="myGetBankListSecond">
                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                      </a>
                                    </span>
                                  </div>
                                  <div style="flex: 100%;">
                                    <input id="bank_list_second_detail" style="border-radius:0;" class="form-control" name="bank_list_second_detail" readonly>
                                  </div>
                                </div>
                              </div>

                              <!-- BANK ACCOUNT -->
                              <div class="row mt-0 mx-0">
                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                  <div>
                                    <input id="bank_accounts_second" style="border-radius:0;" name="bank_accounts_second" class="form-control number-without-characters" size="17" autocomplete="off" readonly>
                                    <input id="bank_accounts_duplicate_second" style="border-radius:0;" name="bank_accounts_duplicate_second" class="form-control number-without-characters" size="17" autocomplete="off" hidden>
                                    <input id="bank_accounts_id_second" style="border-radius:0;" class="form-control" name="bank_accounts_id_second" hidden>
                                    <input id="bank_accounts_duplicate_id_second" style="border-radius:0;" class="form-control" name="bank_accounts_duplicate_id_second" hidden>
                                  </div>
                                  <div>
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="javascript:;" id="bank_accounts_popup_corp_card" data-toggle="modal" data-target="#myBankAccountSecond" class="myBankAccountSecond">
                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                      </a>
                                    </span>
                                  </div>
                                  <div style="flex: 100%;">
                                    <input id="bank_accounts_detail_second" style="border-radius:0;" class="form-control" name="bank_accounts_detail_second" autocomplete="off" readonly>
                                    <input id="bank_accounts_detail_duplicate_second" style="border-radius:0;" class="form-control" name="bank_accounts_detail_duplicate_second" autocomplete="off" hidden>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <hr />

                          <!-- TO OTHER -->
                          <div class="row m-0">
                            <div class="col-md-12 col-lg-5 p-0">
                              <div class="row mt-0 mx-0" style="margin-bottom: 1rem;">
                                <label for="to_other" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">To Other</label>
                                <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                  <div class="input-group">
                                    <input id="to_other" name="to_other" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
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

                              <!-- BANK NAME -->
                              <div class="row mt-0 mx-0" style="margin-bottom: 1rem;">
                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                  <div>
                                    <input id="bank_list_third_name" style="border-radius:0;" name="bank_list_third_name" class="form-control" size="17" readonly>
                                    <input id="bank_list_third_code" style="border-radius:0;" class="form-control" name="bank_list_third_code" hidden>
                                  </div>
                                  <div>
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="javascript:;" id="bank_list_popup_second" data-toggle="modal" data-target="#myGetBankListThird" class="myGetBankListThird">
                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                      </a>
                                    </span>
                                  </div>
                                  <div style="flex: 100%;">
                                    <input id="bank_list_third_detail" style="border-radius:0;" class="form-control" name="bank_list_third_detail" readonly>
                                  </div>
                                </div>
                              </div>

                              <!-- BANK ACCOUNT -->
                              <div class="row mt-0 mx-0">
                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                  <div>
                                    <input id="bank_accounts_third" style="border-radius:0;" size="17" name="bank_accounts_third" class="form-control number-without-characters" autocomplete="off" readonly>
                                    <input id="bank_accounts_duplicate_third" style="border-radius:0;" size="17" name="bank_accounts_duplicate_third" class="form-control number-without-characters" hidden>
                                    <input id="bank_accounts_third_id" style="border-radius:0;" class="form-control" name="bank_accounts_third_id" hidden>
                                    <input id="bank_accounts_duplicate_third_id" style="border-radius:0;" class="form-control" name="bank_accounts_duplicate_third_id" hidden>
                                  </div>
                                  <div>
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="javascript:;" id="bank_accounts_third_popup" data-toggle="modal" data-target="#myBankAccountThird">
                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                      </a>
                                    </span>
                                  </div>
                                  <div style="flex: 100%;">
                                    <input id="bank_accounts_third_detail" style="border-radius:0;" class="form-control" name="bank_accounts_third_detail" autocomplete="off" readonly>
                                    <input id="bank_accounts_duplicate_third_detail" style="border-radius:0;" class="form-control" name="bank_accounts_duplicate_third_detail" hidden>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <hr />

                          <!-- TOTAL PAYMENT -->
                          <div class="row m-0">
                            <div class="col-md-12 col-lg-5 p-0">
                              <div class="row mt-0 mx-0" style="margin-bottom: 1rem;">
                                <label for="total_payment" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Total Payment</label>
                                <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                  <div class="input-group">
                                    <input id="total_payment" name="total_payment" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative" disabled>
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
                <div style="display: flex;">
                  <button class="btn btn-default btn-sm button-submit" id="submitButton" type="submit">
                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" />
                    <div>Submit</div>
                  </button>
                </div>
                <div style="display: flex;">
                  <button class="btn btn-default btn-sm button-submit" id="cancelButton" type="button" onclick="CancelBusinessTrip();">
                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" />
                    <div>Cancel</div>
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
@include('Process.BusinessTrip.BusinessTripRequest.Functions.Footer.FooterBusinessTripRequest')
@endsection