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

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITTLE -->
      <div class="row title-pages">
        <div class="col-sm-6 title">
          Business Request Trip Form
        </div>
      </div>

      @include('Process.BusinessTrip.BusinessTripRequest.Functions.Menu.MenuBusinessTripRequest')
      @if($var == 0)
        <input hidden id="budgetDetailsData" name="budgetDetailsData" />

        <div class="card">
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
                    <div class="row py-3 justify-content-between" style="gap: 15px;">
                      <div class="col-md-12 col-lg-5">
                        <!-- REQUESTER -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Requester</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div>
                              <input id="requester_detail" style="border-radius:0; width: 60px;" class="form-control" name="requester_detail" readonly>
                            </div>
                            <div>
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="#" id="requester_popup" data-toggle="modal" data-target="#myWorker" class="myWorker">
                                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                </a>
                              </span>
                            </div>
                            <div style="flex: 100%;">
                              <input name="requester" id="requester" style="border-radius:0;" type="text" class="form-control" readonly>
                              <input name="requester_id" id="requester_id" style="border-radius:0;" type="hidden" class="form-control" readonly>
                              <input name="var_combinedBudget" id="combinedBudget" style="border-radius:0;" type="hidden" class="form-control" readonly>
                              <!-- <span id="requester_icon" title="Please Input Requester">
                                <img src="{{ asset('AdminLTE-master/dist/img/mandatory.png') }}" width="17" alt="">
                              </span> -->
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
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date Commance Travel</label>
                          <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                            <div class="input-group">
                              <input id="dateCommance" name="dateCommance" style="border-radius:0;" type="date" class="form-control">
                            </div>
                          </div>
                        </div>

                        <!-- DATE END TRAVEL -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date End Travel</label>
                          <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                            <div class="input-group">
                              <input id="dateEnd" name="dateEnd" style="border-radius:0;" type="date" class="form-control">
                            </div>
                          </div>
                        </div>
                        
                        <!-- BENEFICIARY -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Beneficiary</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div>
                              <input id="beneficiary_detail" style="border-radius:0; width: 60px;" class="form-control" name="beneficiary_detail" readonly>
                            </div>
                            <div>
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="#" id="beneficiary_popup" data-toggle="modal" data-target="#myBeneficiary" class="myBeneficiary"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                              </span>
                            </div>
                            <div style="flex: 100%;">
                              <input name="beneficiary" id="beneficiary" style="border-radius:0;" type="text" class="form-control" readonly>
                              <input name="person_refID" id="person_refID" style="border-radius:0;" type="hidden" class="form-control" readonly>
                              <input name="beneficiary_id" id="beneficiary_id" style="border-radius:0;" type="hidden" class="form-control" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-lg-5">
                        <!-- DEPARTING FROM -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="headStationLocation" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Departing From</label>
                          <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                            <div class="input-group">
                              <input id="headStationLocation" name="headStationLocation" style="border-radius:0;" type="text" class="form-control" autocomplete="off">
                            </div>
                          </div>
                        </div>

                        <!-- DESTINATION TO -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="bussinesLocation" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Destination To</label>
                          <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                            <div class="input-group">
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

                        <!-- BANK NAME -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div>
                              <input id="bank_name" style="border-radius:0; width: 60px;" name="bank_name" class="form-control" readonly>
                              <input id="bank_code" style="border-radius:0;" class="form-control" name="bank_code" hidden>
                            </div>
                            <div>
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="#" id="bank_name_popup" data-toggle="modal" data-target="#myGetBank" class="myGetBank">
                                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                </a>
                              </span>
                            </div>
                            <div style="flex: 100%;">
                              <input id="bank_name_detail" style="border-radius:0;" class="form-control" name="bank_name_detail" readonly>
                            </div>
                          </div>
                        </div>

                        <!-- BANK ACCOUNT -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div>
                              <input id="bank_account" style="border-radius:0; width: 90px;" name="bank_account" class="form-control" readonly>
                              <input id="bank_account_id" style="border-radius:0;" class="form-control" name="bank_account_id" hidden>
                            </div>
                            <div>
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="#" id="bank_account_popup" data-toggle="modal" data-target="#myBankAccount" class="myBankAccount"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                              </span>
                            </div>
                            <div style="flex: 100%;">
                              <input id="bank_account_detail" style="border-radius:0;" class="form-control" name="bank_account_detail" readonly>
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
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Qty Budget</th>
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Qty Avail</th>
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Price</th>
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Currency</th>
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Balance Budget</th>
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Total Budget</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- BUDGET TRIP -->
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
                    <div class="row py-3 justify-content-between" style="gap: 1rem;">
                      <div class="col-md-12 col-lg-3">
                        <!-- TITLE -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <div style="font-size: 0.9rem; font-weight: bold;">
                            Transport
                          </div>
                        </div>

                        <!-- TAXI -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="taxi" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">1. Taxi</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 p-0">
                            <div class="input-group">
                              <input id="taxi" name="taxi" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- AIRPLANE -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="airplane" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">2. Airplane</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="airplane" name="airplane" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- TRAIN -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="train" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">3. Train</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="train" name="train" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- BUS -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="bus" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">4. Bus</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="bus" name="bus" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- SHIP -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="ship" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">5. Ship</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="ship" name="ship" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- TOL/ROAD -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="tol_road" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">6. Tol/Road</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="tol_road" name="tol_road" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- PARK -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="park" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">7. Park</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="park" name="park" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- ACCESS BAGAGE -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="access_bagage" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">8. Access Bagage</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="access_bagage" name="access_bagage" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- FUEL -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="fuel" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">9. Fuel</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="fuel" name="fuel" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- TOTAL TRANSPORT -->
                        <div class="row">
                          <label for="total_transport" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0 text-bold">Total</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input disabled id="total_transport" name="total_transport" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-lg-3">
                        <!-- TITLE -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <div style="font-size: 0.9rem; font-weight: bold;">
                            Accomodation
                          </div>
                        </div>

                        <!-- HOTEL -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="hotel" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">1. Hotel</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="hotel" name="hotel" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- MESS -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="mess" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">2. Mess</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="mess" name="mess" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- GUEST HOUSE -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="guest_house" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">3. Guest House</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="guest_house" name="guest_house" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- OTHER -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="other_accomodation" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">4. Other</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="other_accomodation" name="other_accomodation" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- COMPLEMENT -->
                        <div class="row d-none d-sm-none d-md-none d-xl-block" style="margin-bottom: 1rem;">
                          <div class="col-sm-9 col-md-8 col-lg-5 p-0 invisible">
                            <div class="input-group">
                              <input style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- COMPLEMENT -->
                        <div class="row d-none d-sm-none d-md-none d-xl-block" style="margin-bottom: 1rem;">
                          <div class="col-sm-9 col-md-8 col-lg-5 p-0 invisible">
                            <div class="input-group">
                              <input style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- COMPLEMENT -->
                        <div class="row d-none d-sm-none d-md-none d-xl-block" style="margin-bottom: 1rem;">
                          <div class="col-sm-9 col-md-8 col-lg-5 p-0 invisible">
                            <div class="input-group">
                              <input style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- COMPLEMENT -->
                        <div class="row d-none d-sm-none d-md-none d-xl-block" style="margin-bottom: 1rem;">
                          <div class="col-sm-9 col-md-8 col-lg-5 p-0 invisible">
                            <div class="input-group">
                              <input style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- COMPLEMENT -->
                        <div class="row d-none d-sm-none d-md-none d-xl-block" style="margin-bottom: 1rem;">
                          <div class="col-sm-9 col-md-8 col-lg-5 p-0 invisible">
                            <div class="input-group">
                              <input style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- TOTAL ACCOMODATION -->
                        <div class="row">
                          <label for="total_accomodation" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0 text-bold">Total</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input disabled id="total_accomodation" name="total_accomodation" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-lg-3">
                        <!-- TITLE -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <div style="font-size: 0.9rem; font-weight: bold;">
                            Allowance, Entertainment, & Others
                          </div>
                        </div>

                        <!-- ALLOWANCE -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="allowance" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">1. Allowance</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="allowance" name="allowance" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- ENTERTAINMENT -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="entertainment" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">2. Entertainment</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="entertainment" name="entertainment" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- OTHER -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="other" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">3. Other</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input id="other" name="other" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- COMPLEMENT -->
                        <div class="row d-none d-sm-none d-md-none d-xl-block" style="margin-bottom: 1rem;">
                          <div class="col-sm-9 col-md-8 col-lg-5 p-0 invisible">
                            <div class="input-group">
                              <input style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- COMPLEMENT -->
                        <div class="row d-none d-sm-none d-md-none d-xl-block" style="margin-bottom: 1rem;">
                          <div class="col-sm-9 col-md-8 col-lg-5 p-0 invisible">
                            <div class="input-group">
                              <input style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- COMPLEMENT -->
                        <div class="row d-none d-sm-none d-md-none d-xl-block" style="margin-bottom: 1rem;">
                          <div class="col-sm-9 col-md-8 col-lg-5 p-0 invisible">
                            <div class="input-group">
                              <input style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- COMPLEMENT -->
                        <div class="row d-none d-sm-none d-md-none d-xl-block" style="margin-bottom: 1rem;">
                          <div class="col-sm-9 col-md-8 col-lg-5 p-0 invisible">
                            <div class="input-group">
                              <input style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- COMPLEMENT -->
                        <div class="row d-none d-sm-none d-md-none d-xl-block" style="margin-bottom: 1rem;">
                          <div class="col-sm-9 col-md-8 col-lg-5 p-0 invisible">
                            <div class="input-group">
                              <input style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- COMPLEMENT -->
                        <div class="row d-none d-sm-none d-md-none d-xl-block" style="margin-bottom: 1rem;">
                          <div class="col-sm-9 col-md-8 col-lg-5 p-0 invisible">
                            <div class="input-group">
                              <input style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                            </div>
                          </div>
                        </div>

                        <!-- TOTAL BUSINESS TRIP -->
                        <div class="row">
                          <label for="total_business_trip" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0 text-bold">Total Business Trip</label>
                          <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div class="input-group">
                              <input disabled id="total_business_trip" name="total_business_trip" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
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
                <button class="btn btn-default btn-sm button-submit" id="cancelButton" type="button">
                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" />
                  <div>Cancel</div>
                </button>
              </div>
              <div style="display: flex;">
                <button class="btn btn-default btn-sm button-submit" id="submitButton" type="submit">
                  <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" />
                  <div>Submit</div>
                </button>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Process.BusinessTrip.BusinessTripRequest.Functions.Footer.FooterBusinessTripRequest')
@endsection