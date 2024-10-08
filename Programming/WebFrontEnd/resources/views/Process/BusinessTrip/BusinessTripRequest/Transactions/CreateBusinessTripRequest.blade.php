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
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Business Request Trip Form</label>
        </div>
      </div>
      @include('Process.BusinessTrip.BusinessTripRequest.Functions.Menu.MenuBusinessTripRequest')
      @if($var == 0)
      <div class="card" style="position:relative;bottom:10px;">
        <form method="post" enctype="multipart/form-data" action="{{ route('BusinessTripRequest.store') }}" id="FormSubmitBusinessTrip">
          @csrf
          <div class="tab-content p-3" id="nav-tabContent">
            <!-- ADD NEW BUSINESS REQUEST TRIP FORM -->
            <div class="row">
              @csrf
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
                  @include('Process.BusinessTrip.BusinessTripRequest.Functions.Header.HeaderBusinessTripRequest')
                </div>
              </div>
            </div>

            <!-- FILE ATTACHMENT -->
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
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
            </div>

            <!-- PLEASE FILL THIS FORM BELOW -->
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
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <table class="col-lg-10">
                            <tr>
                              <td class="col-4 pl-0" style="padding-top: 5px;"><label>Requester</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="requester" id="requester" style="border-radius:0;" type="text" class="col-4 form-control" readonly>
                                  <input name="requester_id" id="requester_id" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                  <input name="var_combinedBudget" id="combinedBudget" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#" id="requester_popup" data-toggle="modal" data-target="#myWorker" class="myWorker"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                  </div>

                                  <input id="requester_detail" style="border-radius:0;" class="col-7 form-control" name="requester_detail" readonly>
                                  <span id="requester_icon" title="Please Input Requester" style="position: relative;top:2px;left:3px;"><img src="{{ asset('AdminLTE-master/dist/img/mandatory.png') }}" width="17" alt=""></span>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="col-4 pl-0"><label>Contact Phone</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="contactPhone" name="contactPhone" style="border-radius:0;" type="text" class="form-control" disabled>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="col-4 pl-0"><label>Date Commance Travel</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="dateCommance" name="dateCommance" style="border-radius:0;" type="date" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="col-4 pl-0"><label>Date End Travel</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="dateEnd" name="dateEnd" style="border-radius:0;" type="date" class="form-control">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <table class="col-lg-10">
                            <tr>
                              <td class="col-4 pl-0"><label>Head Station Location</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="headStationLocation" name="headStationLocation" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="col-4 pl-0"><label>Business Trip Location</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="bussinesLocation" name="bussinesLocation" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="col-4 pl-0"><label>Reason To Travel</label></td>
                              <td>
                                <textarea id="reasonTravel" name="reasonTravel" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
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

            <!-- TAB -->
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active idFollowingCondition" id="product-comments-tab" data-toggle="tab" href="#followingCondition" role="tab" aria-controls="product-comments" aria-selected="true"><span style="font-weight:bold;padding:10px;color:#212529;">The following condition</span></a>&nbsp;&nbsp;&nbsp;
                <a class="nav-item nav-link idTransportDetails" id="product- desc-tab" data-toggle="tab" href="#transportDetails" role="tab" aria-controls="product-desc" aria-selected="false"><span style="font-weight:bold;padding:10px;color:#212529;">Transport Details</span></a>
              </div><br>
            </nav>

            <!-- CONTENT THE FOLLOWING CONDITION -->
            <div class="tab-pane fade show active" id="followingCondition" role="tabpanel" aria-labelledby="product-comments-tab">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        The following condition will apply in travelling to and returning from your temporary work location
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body FollowingCondition">
                      <div class="form-group">
                        <div>
                          <label>
                            <strong>Transport Type Applicable</strong>
                          </label>
                          <div style="display: flex; column-gap: 16px; row-gap: 8px; flex-wrap: wrap;">
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000011">
                              <label for="transportApplicableBus"> Airplane
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000007">
                              <label for="transportApplicableBus"> Commuter Bus / Busway
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000009">
                              <label for="transportApplicableBus"> Commuter Line, MRT, or LRT
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000004">
                              <label for="transportApplicableBus"> Company's Car
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000001">
                              <label for="transportApplicableBus"> Company's Motorcycle
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000006">
                              <label for="transportApplicableBus"> Employee's Car
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000003">
                              <label for="transportApplicableBus"> Employee's Motorcycle
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000008">
                              <label for="transportApplicableBus"> Intercity Bus
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000010">
                              <label for="transportApplicableBus"> Intercity Train
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000012">
                              <label for="transportApplicableBus"> Ship
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000002">
                              <label for="transportApplicableBus"> Taxibike / Rent Motorcycle
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000005">
                              <label for="transportApplicableBus"> Taxi / Rent Car
                              </label>
                            </div>
                          </div>
                        </div>

                        <div style="margin-top: 0.6rem;">
                          <label>
                            <strong>Travel Arragement</strong>
                          </label>
                          <div style="display: flex; column-gap: 16px; row-gap: 8px; flex-wrap: wrap;">
                            <div class="icheck-primary d-inline">
                              <input type="radio" id="dayTripTravel" name="travelArragement" value="Day Trip Travel" checked>
                              <label for="dayTripTravel">Day Trip Travel
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="radio" id="shortTerm" name="travelArragement" value="Short Term">
                              <label for="shortTerm">Short Term
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="radio" id="longTerm" name="travelArragement" value="Long Term">
                              <label for="longTerm">Long Term
                              </label>
                            </div>
                          </div>
                        </div>

                        <div style="margin-top: 0.6rem;">
                          <label>
                            <strong>Payment Applicable</strong>
                          </label>
                          <div style="display: flex; column-gap: 16px; row-gap: 8px; flex-wrap: wrap;">
                            <div class="icheck-primary d-inline">
                              <input type="radio" id="lupsum" name="paymentApplicable" value="218000000000001" checked>
                              <label for="lupsum">Lump Sum
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="radio" id="nonLupsum" name="paymentApplicable" value="218000000000002">
                              <label for="nonLupsum">Non Lump Sum
                              </label>
                            </div>
                          </div>
                        </div>

                        <div style="margin-top: 0.6rem;">
                          <label>
                            <strong>Accomodation</strong>
                          </label>
                          <div style="display: flex; column-gap: 16px; row-gap: 8px; flex-wrap: wrap;">
                            <div class="icheck-primary d-inline">
                              <input type="radio" id="arrangeCompany" name="accomodationArrange" value="219000000000001" checked>
                              <label for="arrangeCompany"> Arrange By Company
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="radio" id="arrangeEmployee" name="accomodationArrange" value="219000000000002">
                              <label for="arrangeEmployee"> Arrange By Employee
                              </label>
                            </div>
                          </div>
                        </div>

                        <!-- <table style="width: 100%;">
                          <tr>
                            <td><label><strong>Transport Type Applicable</strong></label></td>
                          </tr>
                          <tr>
                            <div class="form-group clearfix">
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000011">
                                  <label for="transportApplicableBus"> Airplane
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000007">
                                  <label for="transportApplicableBus"> Commuter Bus / Busway
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000009">
                                  <label for="transportApplicableBus"> Commuter Line, MRT, or LRT
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000004">
                                  <label for="transportApplicableBus"> Company's Car
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000001">
                                  <label for="transportApplicableBus"> Company's Motorcycle
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000006">
                                  <label for="transportApplicableBus"> Employee's Car
                                  </label>
                                </div>
                              </td>
                            </div>
                          </tr>
                          <tr>
                            <div class="form-group clearfix">
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000003">
                                  <label for="transportApplicableBus"> Employee's Motorcycle
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000008">
                                  <label for="transportApplicableBus"> Intercity Bus
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000010">
                                  <label for="transportApplicableBus"> Intercity Train
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000012">
                                  <label for="transportApplicableBus"> Ship
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000002">
                                  <label for="transportApplicableBus"> Taxibike / Rent Motorcycle
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" class="transportApplicable" name="TransportTypeApplicable" value="220000000000005">
                                  <label for="transportApplicableBus"> Taxi / Rent Car
                                  </label>
                                </div>
                              </td>
                            </div>
                          </tr>

                          <tr>
                            <td><label><strong> Travel Arragement</strong></label></td>
                          </tr>
                          <tr>
                            <div class="form-group clearfix">
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="radio" id="dayTripTravel" name="travelArragement" value="Day Trip Travel" checked>
                                  <label for="dayTripTravel">Day Trip Travel
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="radio" id="shortTerm" name="travelArragement" value="Short Term">
                                  <label for="shortTerm">Short Term
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="radio" id="longTerm" name="travelArragement" value="Long Term">
                                  <label for="longTerm">Long Term
                                  </label>
                                </div>
                              </td>
                            </div>
                          </tr>

                          <tr>
                            <td><label><strong> Payment Applicable</strong></label></td>
                          </tr>
                          <tr>
                            <div class="form-group clearfix">
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="radio" id="lupsum" name="paymentApplicable" value="218000000000001" checked>
                                  <label for="lupsum">Lump Sum
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="radio" id="nonLupsum" name="paymentApplicable" value="218000000000002">
                                  <label for="nonLupsum">Non Lump Sum
                                  </label>
                                </div>
                              </td>
                            </div>
                          </tr>

                          <tr>
                            <td><label><strong> Accomodation</strong></label></td>
                          </tr>
                          <tr>
                            <div class="form-group clearfix">
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="radio" id="arrangeCompany" name="accomodationArrange" value="219000000000001" checked>
                                  <label for="arrangeCompany"> Arrange By Company
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="radio" id="arrangeEmployee" name="accomodationArrange" value="219000000000002">
                                  <label for="arrangeEmployee"> Arrange By Employee
                                  </label>
                                </div>
                              </td>
                            </div>
                          </tr>
                        </table> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- CONTENT TRANSPORT DETAILS -->
            <div class="tab-pane fade" id="transportDetails" role="tabpanel" aria-labelledby="product-desc-tab">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        Transport Details
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body table-responsive p-0 TransportDetails" style="height:200px;">
                      <table class="table table-head-fixed text-nowrap table-striped table-sm TableTransportDetails" id="TableTransportDetails">
                        <label>
                          <a class="btn btn-default btn-sm float-right" onclick="AddFormTransportDetails();" style="position:relative;top:5px;left:5px;">
                            <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add">
                          </a>
                        </label>
                        <thead>
                          <tr>
                            <th style="width:10px;"></th>
                            <th style="border:1px solid #e9ecef;text-align: center;">Transport Type</th>
                            <th style="border:1px solid #e9ecef;text-align: center;">Transport Booking</th>
                            <th style="border:1px solid #e9ecef;text-align: center;">Time Of Depart</th>
                            <th style="border:1px solid #e9ecef;text-align: center;">Time Of Arrival</th>
                            <th style="border:1px solid #e9ecef;text-align: center;">Quoted Fare (IDR)</th>
                          </tr>
                          <tr class="FormTransportDetails">
                            <td></td>
                            <td style="border:1px solid #e9ecef;">
                              <div class="input-group">
                                <select class="form-control select2bs4" id="transportType" style="width: 100%; border-radius:0;">
                                  <option selected="selected"></option>
                                  <option value="220000000000011">Airplane</option>
                                  <option value="220000000000007">Commuter Bus / Busway</option>
                                  <option value="220000000000009">Commuter Line, MRT, or LRT</option>
                                  <option value="220000000000004">Company's Car</option>
                                  <option value="220000000000001">Company's Motorcycle</option>
                                  <option value="220000000000006">Employee's Car</option>
                                  <option value="220000000000003">Employee's Motorcycle</option>
                                  <option value="220000000000008">Intercity Bus</option>
                                  <option value="220000000000010">Intercity Train</option>
                                  <option value="220000000000012">Ship</option>
                                  <option value="220000000000002">Taxibike / Rent Motorcycle</option>
                                  <option value="220000000000005">Taxi / Rent Car</option>
                                </select>
                              </div>
                            </td>
                            <td style="border:1px solid #e9ecef;">
                              <div class="input-group">
                                <input id="transportBooking" name="transportBooking" style="border-radius:0;" type="text" class="form-control">
                              </div>
                            </td>
                            <td style="border:1px solid #e9ecef;">
                              <div class="input-group">
                                <input id="dateDepart" name="dateDepart" style="border-radius:0;" type="date" class="form-control">
                              </div>
                            </td>
                            <td style="border:1px solid #e9ecef;">
                              <div class="input-group">
                                <input id="dateArrival" name="dateArrival" style="border-radius:0;" type="date" class="form-control">
                              </div>
                            </td>
                            <td style="border:1px solid #e9ecef;">
                              <div class="input-group">
                                <input id="qoutedFare" name="contactPhone" style="border-radius:0;" type="text" class="form-control" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                              </div>
                            </td>
                          </tr>
                          <tr class="FormTransportDetails">
                            <td colspan="3"></td>
                            <td style="border:1px solid #e9ecef;position:relative;left:30px;">
                              <div class="input-group">
                                <a class="btn btn-default btn-sm float-right" onclick="UpdateFormTransportDetails();" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                  <img src="{{ asset('AdminLTE-master/dist/img/edit.png') }}" width="13" alt="" title="Add to Advance List"> Update
                                </a>
                                <a class="btn btn-default btn-sm float-right" onclick="CancelFormTransportDetails();" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
                                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel to Add Advance List Cart"> Cancel
                                </a>
                              </div>
                            </td>
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

            <!-- PLEASE SELECT YOUR BUDGET FOR THIS BUSINESS TRIP -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Please select your budget for this business trip
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Process.BusinessTrip.BusinessTripRequest.Functions.Table.getBOQ')
                </div>
              </div>
            </div>

            <!-- BUSINESS TRIP REQUEST FORM -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">Business Trip Request Form
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body table-responsive p-0 BrfListCart" style="height: 180px;">
                    <table class="table table-head-fixed text-nowrap table-striped TableBusinessTrip" id="TableBusinessTrip">
                      <thead>
                        <tr>
                          <!-- <th style="border:1px solid #e9ecef;text-align: center;">Work ID</th>
                          <th style="border:1px solid #e9ecef;text-align: center;">Work Name</th> -->
                          <th style="border:1px solid #e9ecef;text-align: center;">Product ID</th>
                          <th style="border:1px solid #e9ecef;text-align: center;">Product Name</th>
                          <th style="border:1px solid #e9ecef;text-align: center;">Allowance</th>
                          <th style="border:1px solid #e9ecef;text-align: center;">Accomodation</th>
                          <th style="border:1px solid #e9ecef;text-align: center;">Others</th>
                          <th style="border:1px solid #e9ecef;text-align: center;">Total</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>

                  <div class="card-body BrfListCart">
                    <table style="float:right;">
                      <th> Total Item :
                        <span id="GrandTotal"></span>
                      </th>
                    </table>
                  </div>

                </div>
                <a onclick="CancelBusinessTrip();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Business Trip List Cart"> Cancel
                </a>
                <button class="btn btn-default btn-sm float-right" type="submit" id="SaveBrfList" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Business Trip"> Submit
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