@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProduct')
@include('Process.BusinessTrip.BusinessTripRequest.Functions.PopUp.PopUpBusinessTripRequestRevision')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getWorker')

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
                                <a href="#" id="requester_popup" data-toggle="modal" data-target="#myWorker" class="myWorker"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
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
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div class="input-group">
                              <input id="contactPhone" name="contactPhone" style="border-radius:0;" type="text" class="form-control" disabled>
                            </div>
                          </div>
                        </div>

                        <!-- DATE COMMANCE TRAVEL -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date Commance Travel</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div class="input-group">
                              <input id="dateCommance" name="dateCommance" style="border-radius:0;" type="date" class="form-control">
                            </div>
                          </div>
                        </div>

                        <!-- DATE END TRAVEL -->
                        <div class="row">
                          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date End Travel</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div class="input-group">
                              <input id="dateEnd" name="dateEnd" style="border-radius:0;" type="date" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-lg-5">
                        <!-- DEPARTING FROM -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="headStationLocation" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Departing From</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div class="input-group">
                              <input id="headStationLocation" name="headStationLocation" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </div>
                        </div>

                        <!-- DESTINATION TO -->
                        <div class="row" style="margin-bottom: 1rem;">
                          <label for="bussinesLocation" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Destination To</label>
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div class="input-group">
                              <input id="bussinesLocation" name="bussinesLocation" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </div>
                        </div>

                        <!-- REASON TO TRAVEL -->
                        <div class="row">
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
        </div>
      @endif
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Process.BusinessTrip.BusinessTripRequest.Functions.Footer.FooterBusinessTripRequest')
@endsection