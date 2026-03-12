@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getBusinessTripRequests')
@include('Process.BusinessTrip.BusinessTripRequest.Functions.PopUp.PopUpBusinessTripRequestSummaryData')
@include('Process.BusinessTrip.BusinessTripSettlement.Functions.PopUp.PopUpBusinessTripSettlementRevision')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Business Trip Settlement
          </label>
        </div>
      </div>

      @include('Process.BusinessTrip.BusinessTripSettlement.Functions.Menu.MenuBusinessTripSettlement')

      @if($var == 0)
      <!-- CONTENT -->
      <div class="card">
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
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section Budget Information">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                @include('Process.BusinessTrip.BusinessTripSettlement.Functions.Header.HeaderBusinessTripSettlement')
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
                    Attachment
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section Attachment">
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

        <!-- BUSINESS TRIP SETTLEMENT DETAIL -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">
                      Business Trip Settlement Detail
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                </div>

                <div class="card-body">
                  <!-- TRAVEL & FARES, ACCOMMODATION, ALLOWANCE, ENTERTAINMENT, & OTHER -->
                  <div class="row py-3 justify-content-between" style="gap: 1rem;">
                    <!-- TRAVEL & FARES COLUMN -->
                    <div class="col-md-12 col-lg-3">
                      <!-- TITLE -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <div style="font-size: 0.9rem; font-weight: bold;">
                          Travel & Fares
                        </div>
                      </div>

                      <!-- TAXI -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label for="taxi" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">1. Taxi</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="input-group">
                            <input id="taxi" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                          </div>
                        </div>
                      </div>

                      <!-- AIRPLANE -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label for="airplane" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">2. Airplane</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="input-group">
                            <input id="airplane" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                          </div>
                        </div>
                      </div>

                      <!-- TRAIN -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label for="train" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">3. Train</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="input-group">
                            <input id="train" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                          </div>
                        </div>
                      </div>

                      <!-- BUS -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label for="bus" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">4. Bus</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="input-group">
                            <input id="bus" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                          </div>
                        </div>
                      </div>

                      <!-- SHIP -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label for="ship" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">5. Ship</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="input-group">
                            <input id="ship" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                          </div>
                        </div>
                      </div>

                      <!-- TOL/ROAD -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label for="tol_road" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">6. Tol/Road</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="input-group">
                            <input id="tol_road" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                          </div>
                        </div>
                      </div>

                      <!-- PARK -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label for="park" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">7. Park</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="input-group">
                            <input id="park" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                          </div>
                        </div>
                      </div>

                      <!-- EXCESS BAGAGE -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label for="excess_bagage" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">8. Excess Bagage</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="input-group">
                            <input id="excess_bagage" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                          </div>
                        </div>
                      </div>

                      <!-- FUEL -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label for="fuel" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">9. Fuel</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="input-group">
                            <input id="fuel" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                          </div>
                        </div>
                      </div>

                      <!-- HOTEL -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label for="hotel" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">10. Hotel</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="input-group">
                            <input id="hotel" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                          </div>
                        </div>
                      </div>

                      <!-- MESS -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label for="mess" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">11. Mess</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="input-group">
                            <input id="mess" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                          </div>
                        </div>
                      </div>

                      <!-- GUEST HOUSE -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label for="guest_house" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0">12. Guest House</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="input-group">
                            <input id="guest_house" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                          </div>
                        </div>
                      </div>

                      <!-- TOTAL TRANSPORT -->
                      <div class="row">
                        <label for="total_transport" class="col-sm-3 col-md-4 col-lg-6 col-form-label p-0 text-bold">Sub Total</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="input-group">
                            <input disabled id="total_transport" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- ACCOMMODATION, ENTERTAINMENT, OTHER COLUMN -->
                    <div class="col-md-12 col-lg-2">
                      <!-- ACCOMMODATION -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <div class="col-12 p-0" style="font-size: 0.9rem; font-weight: bold; margin-bottom: 1rem;">
                          Accommodation
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 p-0">
                          <input id="allowance" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                        </div>
                      </div>

                      <!-- ENTERTAINMENT -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <div class="col-12 p-0" style="font-size: 0.9rem; font-weight: bold; margin-bottom: 1rem;">
                          Entertainment
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 p-0">
                          <input id="entertainment" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                        </div>
                      </div>

                      <!-- OTHER -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <div class="col-12 p-0" style="font-size: 0.9rem; font-weight: bold; margin-bottom: 1rem;">
                          Other
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 p-0">
                          <input id="other" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                        </div>
                      </div>
                    </div>

                    <!-- TRANSACTION INFORMATION -->
                    <div class="col-md-12 col-lg-5">
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

                    <!-- GARIS & ICON -->
                    <div class="col-md-12 col-lg-12 d-flex align-items-center px-0" style="gap: 0.2rem;">
                      <hr class="m-0" style="width: 100%;" />
                      <img src="{{ asset('AdminLTE-master/dist/img/plus-circle.svg') }}" width="13" alt="" />
                    </div>

                    <div class="d-sm-none d-md-none d-lg-block col-md-12 col-lg-3"></div>
                    
                    <!-- TOTAL BSF -->
                    <div class="col-md-12 col-lg-2 p-0">
                      <div style="font-size: 0.75rem; margin-bottom: 1rem; font-weight: bold;">
                        Total BSF
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-9 p-0">
                        <input disabled id="total_business_trip" name="total_business_trip" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                      </div>
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

                <div class="card-body">
                  <div class="row py-3">
                    <textarea name="var_remark" id="remark" rows="2" cols="150" class="form-control" placeholder="Tulis remark disini"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- BUTTON -->
        <div class="px-3 pb-3">
          <div style="display: flex; justify-content: flex-end; gap: 8px;">
            <button class="btn btn-default btn-sm button-submit" id="cancelButton" type="button" onclick="cancelForm('{{ route('BusinessTripSettlement.index', ['var' => 1]) }}')">
              <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" />
              <div>Cancel</div>
            </button>

            <button type="button" class="btn btn-default btn-sm button-submit" onclick="validationForm()">
              <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" />
              <div>Submit</div>
            </button>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
</div>

@include('Process.BusinessTrip.BusinessTripSettlement.Functions.Footer.FooterBusinessTripSettlement')
@include('Partials.footer')
@endsection