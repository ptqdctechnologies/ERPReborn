@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProduct')
@include('Advance.BusinessTrip.Functions.PopUp.PopUpBusinessTripRequestRevision')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getWorker')

<div class="content-wrapper" style="position:relative;bottom:12px;">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Business Request Trip Form </label>
        </div>
      </div>
      @include('Advance.BusinessTrip.Functions.Menu.MenuBusinessTripRequest')
      @if($var == 0)
      <div class="card" style="position:relative;bottom:10px;">
        <form method="post" enctype="multipart/form-data" action="{{ route('BusinessTripRequest.store') }}" id="FormSubmitBusinessTrip">
          @csrf
          <div class="tab-content p-3" id="nav-tabContent">
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
                  @include('Advance.BusinessTrip.Functions.Header.HeaderBusinessTripRequest')
                </div>
              </div>
            </div>


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
                          <input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value="" readonly="true" name="dataInput_Log_FileUpload_Pointer_RefID">
                          <input type="file" id="dataInput_Log_FileUpload_Pointer_RefID_Action" name="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" onchange="javascript: @php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_DOMInputFileContent(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIWebToken, 'Upload', 'dataInput_Log_FileUpload_Pointer_RefID', 'dataInput_Log_FileUpload_Pointer_RefID_Action', 'dataShow_ActionPanel', 'dataShow_MasterFileRecord'); @endphp;" />
                        </div>
                        <br><br>
                        <div class="col-md-12">
                          <div class="card-body table-responsive p-0" style="height:125px;">

                            <table class="table table-head-fixed table-sm text-nowrap">
                              <div class="form-group input_fields_wrap">

                                <div class="input-group control-group">

                                  <!-- <div id="dataShow_MasterFileRecord" style="border-style:solid; border-width:1px;"></div> -->
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
                          <table>
                            <tr>
                              <td><label>Requester</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly>
                                  <input name="request_name_id" id="request_name_id" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                  <input name="var_combinedBudget" id="combinedBudget" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#" id="request_name2" data-toggle="modal" data-target="#myWorker" class="myWorker"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input id="request_position" style="border-radius:0;" class="form-control" name="request_position" readonly>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Contact Phone</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="contactPhone" name="contactPhone" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Date Commance Travel</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="dateCommance" name="dateCommance" style="border-radius:0;" type="date" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Date End Travel</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="dateEnd" name="dateEnd" style="border-radius:0;" type="date" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Head Station Location</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="headStationLocation" name="headStationLocation" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <table>

                          <tr>
                            <td><label>Business Trip Location</label></td>
                            <td>
                              <textarea id="bussinesLocation" name="bussinesLocation" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td><label>Reason To Travel</label></td>
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

            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active idFollowingCondition" id="product-comments-tab" data-toggle="tab" href="#followingCondition" role="tab" aria-controls="product-comments" aria-selected="true"><span style="font-weight:bold;padding:10px;color:#212529;">The following condition</span></a>&nbsp;&nbsp;&nbsp;
                <a class="nav-item nav-link idTransportDetails" id="product- desc-tab" data-toggle="tab" href="#transportDetails" role="tab" aria-controls="product-desc" aria-selected="false"><span style="font-weight:bold;padding:10px;color:#212529;">Transport Details</span></a>
              </div><br>
            </nav>

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
                        <table style="width: 100%;">
                          <tr>
                            <td><label><strong>Transport Type Applicable</strong></label></td>
                          </tr>

                          @for($i = 0; $i < 6 ; $i++) <div class="form-group clearfix">
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="checkbox" class="transportApplicable" name="TransportType" id="{{ $varDataTransport[$i]['sys_ID'] }}" value="{{ $varDataTransport[$i]['sys_ID'] }}">
                                <label for="transportApplicableBus"> {{ $varDataTransport[$i]['sys_Text'] }}
                                </label>
                              </div>
                            </td>
                      </div>
                      @endfor
                      </tr>
                      <tr>
                        @for($i = 6; $i < 12 ; $i++) <div class="form-group clearfix">
                          <td>
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" class="transportApplicable" name="TransportType" id="{{ $varDataTransport[$i]['sys_ID'] }}" value="{{ $varDataTransport[$i]['sys_ID'] }}">
                              <label for="transportApplicableBus"> {{ $varDataTransport[$i]['sys_Text'] }}
                              </label>
                            </div>
                          </td>
                    </div>
                    @endfor
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
                            <input type="radio" id="lupsum" name="paymentApplicable" value="{{ $varDataApplicable['0']['sys_ID'] }}" checked>
                            <label for="lupsum"> {{ $varDataApplicable['0']['sys_Text'] }}
                            </label>
                          </div>
                        </td>
                        <td>
                          <div class="icheck-primary d-inline">
                            <input type="radio" id="nonLupsum" name="paymentApplicable" value="{{ $varDataApplicable['1']['sys_ID'] }}">
                            <label for="nonLupsum"> {{ $varDataApplicable['1']['sys_Text'] }}
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
                            <input type="radio" id="arrangeCompany" name="accomodation" value="{{ $varDataAccomodation[0]['sys_ID'] }}" checked>
                            <label for="arrangeCompany"> {{ $varDataAccomodation[0]['sys_Text'] }}
                            </label>
                          </div>
                        </td>
                        <td>
                          <div class="icheck-primary d-inline">
                            <input type="radio" id="arrangeEmployee" name="accomodation" value="{{ $varDataAccomodation[1]['sys_ID'] }}">
                            <label for="arrangeEmployee"> {{ $varDataAccomodation[1]['sys_Text'] }}
                            </label>
                          </div>
                        </td>
                      </div>
                    </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

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
                            @foreach($varDataTransport as $varDataTransports)
                            <option value="{{ $varDataTransports['sys_ID'] }}"> {{$varDataTransports['sys_Text']}} </option>
                            @endforeach
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
            @include('Advance.BusinessTrip.Functions.Table.getBOQ')
          </div>
        </div>
      </div>

      <!-- <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <label class="card-title">
                Business Trip Cost Payment
              </label>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                </button>
              </div>
            </div>

            <div class="card-body table-responsive p-0" id="detailTransAvail">
              <table class="table table-head-fixed text-nowrap table-sm" style="text-align: center;width:120%;">
                <thead>
                  <tr>
                    <th colspan="5" style="border:2px solid #e9ecef;width:40%;"> Budget Detail</th>
                    <th class="paymentSequence" style="border:2px solid #e9ecef;width:60%;"> Payment Sequence</th>
                    <input type="hidden" id="paymentSequence" value="4">
                  </tr>
                  <tr>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;"> {!! $spasi !!} Product ID {!! $spasi !!}</th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;"> {!! $spasi !!} Product Name {!! $spasi !!}</th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;"> Budget Request </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;"> Sequence Req</th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;"> Sequence</th>

                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;"> {!! $spasi !!} Allowance {!! $spasi !!}</th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;"> {!! $spasi !!} Accomodation {!! $spasi !!}</th>

                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="a_airport_tax"> Airplane ► Airport Tax</th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="a_extra_baggage_charge"> Airplane ► Extra Baggage Charge </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="a_ticket_fare"> Airplane ► Ticket Fare </th>

                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="b_ticket_fare"> Busway ► Ticket Fare </th>

                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="m_ticket_fare"> MRT ► Ticket Fare </th>

                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="cc_fuel_charge"> Company's Car ► Fuel Charge </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="cc_parking_charge"> Company's Car ► Parking Charge </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="cc_parking_charge"> Company's Car ► Toll Charge </th>

                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="cm_fuel_charge"> Company's Motorcycle ► Fuel Charge </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="cm_parking_charge"> Company's Motorcycle ► Parking Charge </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="cm_toll_charge"> Company's Motorcycle ► Toll Charge </th>

                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="ec_compensation_fee"> Employee's Car ► Compensation Fee </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="ec_fuel_charge"> Employee's Car ► Fuel Charge </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="ec_parking_charge"> Employee's Car ► Parking Charge </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="ec_toll_charge"> Employee's Car ► Toll Charge </th>

                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="em_compensation_fee"> Employee's Motorcycle ► Compensation Fee </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="em_fuel_charge"> Employee's Motorcycle ► Fuel Charge </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="em_parking_charge"> Employee's Motorcycle ► Parking Charge </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="em_toll_charge"> Employee's Motorcycle ► Toll Charge </th>

                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="ib_ticket_fare"> Intercity Bus ► Ticket Fare </th>

                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="it_ticket_fare"> Intercity Train ► Ticket Fare </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="it_extra_baggage_charge"> Intercity Train ► Extra Baggage Charge </th>

                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="s_ticket_fare"> Ship ► Ticket Fare </th>

                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="tb_rental_fee"> Taxibike ► Rental Fee </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="tb_fuel_charge"> Taxibike ► Fuel Charge </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="tb_parking_charge"> Taxibike ► Parking Charge </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="tb_toll_charge"> Taxibike ► Toll Charge </th>


                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="t_driver_fee"> Taxi ► Driver Fee </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="t_rental_fee"> Taxi ► Rental Fee </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="t_fuel_charge"> Taxi ► Fuel Charge </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="t_parking_charge"> Taxi ► Parking Charge </th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;" class="t_toll_charge"> Taxi ► Toll Charge </th>

                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;"> {!! $spasi !!} Other {!! $spasi !!}</th>
                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;"> {!! $spasi !!} Balance {!! $spasi !!}</th>
                  </tr>
                </thead>
                <tbody>
                  <td style="border:1px solid #e9ecef;">
                    <div class="input-group">
                      &nbsp;<input id="putWorkId" type="hidden" style="border-radius:0;" class="form-control" readonly>
                      &nbsp;<input id="putProductId" style="border-radius:0;" class="form-control" readonly>
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#" id="putProductId2" data-toggle="modal" data-target="#myProduct"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                        </span>
                      </div>
                    </div>
                  </td>
                  <td style="border:1px solid #e9ecef;">
                    <input id="putProductName" style="border-radius:0;" type="text" class="form-control" readonly="">
                  </td>
                  <td style="border:1px solid #e9ecef;">
                    <input id="budgetRequest" name="budgetRequest" style="border-radius:0;" type="text" class="form-control" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                  </td>
                  <td style="border:1px solid #e9ecef;">
                    <input id="sequenceRequest" name="sequenceRequest" style="border-radius:0;" type="number" class="form-control">
                  </td>
                  <td style="border:1px solid #e9ecef;">
                    <input id="sequence" name="sequence" style="border-radius:0;font-weight:bold;" value="1" type="text" class="form-control" readonly>
                    <input id="putSequence" style="border-radius:0;border:none;background-color:white;font-weight:bold;" type="hidden" class="form-control" readonly>
                  </td>

                  <td style="border:1px solid #e9ecef;">
                    <input id="allowance" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="81000000000001">
                  </td>
                  <td style="border:1px solid #e9ecef;">
                    <input id="accomodation" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="81000000000003">
                  </td>

                  <td style="border:1px solid #e9ecef;" class="a_airport_tax">
                    <input id="a_airport_tax" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000041">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="a_extra_baggage_charge">
                    <input id="a_extra_baggage_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000042">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="a_ticket_fare">
                    <input id="a_ticket_fare" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000040">
                  </td>

                  <td style="border:1px solid #e9ecef;" class="b_ticket_fare">
                    <input id="b_ticket_fare" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000031">
                  </td>

                  <td style="border:1px solid #e9ecef;" class="m_ticket_fare">
                    <input id="m_ticket_fare" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000035">
                  </td>

                  <td style="border:1px solid #e9ecef;" class="cc_fuel_charge">
                    <input id="cc_fuel_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000016">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="cc_parking_charge">
                    <input id="cc_parking_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000018">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="cc_toll_charge">
                    <input id="cc_toll_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000017">
                  </td>

                  <td style="border:1px solid #e9ecef;" class="cm_fuel_charge">
                    <input id="cm_fuel_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000002">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="cm_parking_charge">
                    <input id="cm_parking_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000004">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="cm_toll_charge">
                    <input id="cm_toll_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000003">
                  </td>

                  <td style="border:1px solid #e9ecef;" class="ec_compensation_fee">
                    <input id="ec_compensation_fee" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000029">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="ec_fuel_charge">
                    <input id="ec_fuel_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000026">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="ec_parking_charge">
                    <input id="ec_parking_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000028">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="ec_toll_charge">
                    <input id="ec_toll_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000027">
                  </td>

                  <td style="border:1px solid #e9ecef;" class="em_compensation_fee">
                    <input id="em_compensation_fee" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000014">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="em_fuel_charge">
                    <input id="em_fuel_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000011">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="em_parking_charge">
                    <input id="em_parking_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000013">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="em_toll_charge">
                    <input id="em_toll_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000012">
                  </td>

                  <td style="border:1px solid #e9ecef;" class="ib_ticket_fare">
                    <input id="ib_ticket_fare" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000033">
                  </td>

                  <td style="border:1px solid #e9ecef;" class="it_ticket_fare">
                    <input id="it_ticket_fare" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000037">
                  </td>
                  <td style="border:1px solid3 #e9ecef;" class="it_extra_baggage_charge">
                    <input id="it_extra_baggage_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000038">
                  </td>

                  <td style="border:1px solid #e9ecef;" class="s_ticket_fare">
                    <input id="s_ticket_fare" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000044">
                  </td>

                  <td style="border:1px solid #e9ecef;" class="tb_rental_fee">
                    <input id="tb_rental_fee" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000006">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="tb_fuel_charge">
                    <input id="tb_fuel_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000007">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="tb_parking_charge">
                    <input id="tb_parking_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000009">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="tb_toll_charge">
                    <input id="tb_toll_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000008">
                  </td>

                  <td style="border:1px solid #e9ecef;" class="t_driver_fee">
                    <input id="t_driver_fee" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000021">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="t_rental_fee">
                    <input id="t_rental_fee" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000020">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="t_fuel_charge">
                    <input id="t_fuel_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000022">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="t_parking_charge">
                    <input id="t_parking_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000024">
                  </td>
                  <td style="border:1px solid #e9ecef;" class="t_toll_charge">
                    <input id="t_toll_charge" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="221000000000023">
                  </td>

                  <td style="border:1px solid #e9ecef;">
                    <input id="other" style="border-radius:0;" type="text" class="form-control" name="formPaymentSequence" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" data-id="81000000000004">
                  </td>
                  <td style="border:1px solid #e9ecef;">
                    <input id="totalBalance" style="border-radius:0;" type="text" class="form-control" readonly="">
                    <input id="totalCostPerProduct" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                  </td>

                  <input id="statusEditBrf" style="border-radius:0;" type="hidden" class="form-control" readonly="" value="No">
                  <input id="ValidateAllowance" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                  <input id="ValidateTransport" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                  <input id="ValidateAirportTax" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                  <input id="ValidateAccomodation" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                  <input id="ValidateOther" style="border-radius:0;" type="hidden" class="form-control" readonly="">

                </tbody>
              </table>
              <div style="padding-right:10px;padding-top:10px;">
                <a class="btn btn-default btn-sm float-right" onclick="CancelDetailBrf()" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel to Add Advance List Cart"> Cancel
                </a>
                <a class="btn btn-default btn-sm float-right" onclick="addFromDetailtoCartJs()" id="AddToBrfListCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                </a>
              </div>
              <br><br><br>
            </div>
          </div>
        </div>
      </div> -->
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
                    <th style="border:1px solid #e9ecef;text-align: center;">Work ID</th>
                    <th style="border:1px solid #e9ecef;text-align: center;">Work Name</th>
                    <th style="border:1px solid #e9ecef;text-align: center;">Product ID</th>
                    <th style="border:1px solid #e9ecef;text-align: center;">Product Name</th>
                    <!-- <th style="border:1px solid #e9ecef;text-align: center;">Sequence</th> -->

                    <th style="border:1px solid #e9ecef;text-align: center;">Allowance</th>
                    <th style="border:1px solid #e9ecef;text-align: center;">Accomodation</th>

                    <!-- <th style="border:1px solid #e9ecef;text-align: center;" class="a_airport_tax">Airplane ► Airport Tax</th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="a_extra_baggage_charge">Airplane ► Extra Baggage Charge</th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="a_ticket_fare">Airplane ► Ticket Fare</th>

                    <th style="border:1px solid #e9ecef;text-align: center;" class="b_ticket_fare">Busway ► Ticket Fare</th>

                    <th style="border:1px solid #e9ecef;text-align: center;" class="m_ticket_fare">MRT ► Ticket Fare</th>

                    <th style="border:1px solid #e9ecef;text-align: center;" class="cc_fuel_charge">Company's Car ► Fuel Charge</th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="cc_parking_charge">Company's Car ► Parking Charge</th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="cc_parking_charge">Company's Car ► Toll Charge</th>

                    <th style="border:1px solid #e9ecef;text-align: center;" class="cm_fuel_charge">Company's Motorcycle ► Fuel Charge</th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="cm_parking_charge">Company's Motorcycle ► Parking Charge</th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="cm_toll_charge">Company's Motorcycle ► Toll Charge</th>

                    <th style="border:1px solid #e9ecef;text-align: center;" class="ec_compensation_fee"> Employee's Car ► Compensation Fee </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="ec_fuel_charge"> Employee's Car ► Fuel Charge </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="ec_parking_charge"> Employee's Car ► Parking Charge </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="ec_toll_charge"> Employee's Car ► Toll Charge </th>

                    <th style="border:1px solid #e9ecef;text-align: center;" class="em_compensation_fee"> Employee's Motorcycle ► Compensation Fee </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="em_fuel_charge"> Employee's Motorcycle ► Fuel Charge </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="em_parking_charge"> Employee's Motorcycle ► Parking Charge </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="em_toll_charge"> Employee's Motorcycle ► Toll Charge </th>

                    <th style="border:1px solid #e9ecef;text-align: center;" class="ib_ticket_fare"> Intercity Bus ► Ticket Fare </th>

                    <th style="border:1px solid #e9ecef;text-align: center;" class="it_ticket_fare"> Intercity Train ► Ticket Fare </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="it_extra_baggage_charge"> Intercity Train ► Extra Baggage Charge </th>

                    <th style="border:1px solid #e9ecef;text-align: center;" class="s_ticket_fare"> Ship ► Ticket Fare </th>

                    <th style="border:1px solid #e9ecef;text-align: center;" class="tb_rental_fee"> Taxibike ► Rental Fee </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="tb_fuel_charge"> Taxibike ► Fuel Charge </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="tb_parking_charge"> Taxibike ► Parking Charge </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="tb_toll_charge"> Taxibike ► Toll Charge </th>


                    <th style="border:1px solid #e9ecef;text-align: center;" class="t_driver_fee"> Taxi ► Driver Fee </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="t_rental_fee"> Taxi ► Rental Fee </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="t_fuel_charge"> Taxi ► Fuel Charge </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="t_parking_charge"> Taxi ► Parking Charge </th>
                    <th style="border:1px solid #e9ecef;text-align: center;" class="t_toll_charge"> Taxi ► Toll Charge </th> -->

                    <th style="border:1px solid #e9ecef;text-align: center;">Others</th>
                    <th style="border:1px solid #e9ecef;text-align: center;">Total</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
                <!-- <tfoot style="position: relative;top:100px;">
                  <tr>
                    <th style="border:1px solid #e9ecef;text-align:center;"" colspan=" 4">Sub Total</th> -->

                <!-- <td style="border:1px solid #e9ecef;" id="81000000000001"></td>
                    <td style="border:1px solid #e9ecef;" id="81000000000003"></td>

                    <td style="border:1px solid #e9ecef;" id="221000000000041" class="a_airport_tax"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000042" class="a_extra_baggage_charge"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000040" class="a_ticket_fare"></td>

                    <td style="border:1px solid #e9ecef;" id="221000000000031" class="b_ticket_fare"></td>

                    <td style="border:1px solid #e9ecef;" id="221000000000035" class="m_ticket_fare"></td>

                    <td style="border:1px solid #e9ecef;" id="221000000000016" class="cc_fuel_charge"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000018" class="cc_parking_charge"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000017" class="cc_parking_charge"></td>

                    <td style="border:1px solid #e9ecef;" id="221000000000002" class="cm_fuel_charge"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000004" class="cm_parking_charge"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000003" class="cm_toll_charge"></td>

                    <td style="border:1px solid #e9ecef;" id="221000000000029" class="ec_compensation_fee"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000026" class="ec_fuel_charge"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000028" class="ec_parking_charge"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000027" class="ec_toll_charge"></td>

                    <td style="border:1px solid #e9ecef;" id="221000000000014" class="em_compensation_fee"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000011" class="em_fuel_charge"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000013" class="em_parking_charge"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000012" class="em_toll_charge"></td>

                    <td style="border:1px solid #e9ecef;" id="221000000000033" class="ib_ticket_fare"></td>

                    <td style="border:1px solid #e9ecef;" id="221000000000037" class="it_ticket_fare"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000038" class="it_extra_baggage_charge"></td>

                    <td style="border:1px solid #e9ecef;" id="221000000000044" class="s_ticket_fare"></td>

                    <td style="border:1px solid #e9ecef;" id="221000000000006" class="tb_rental_fee"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000007" class="tb_fuel_charge"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000009" class="tb_parking_charge"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000008" class="tb_toll_charge"></td>

                    <td style="border:1px solid #e9ecef;" id="221000000000021" class="t_driver_fee"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000020" class="t_rental_fee"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000022" class="t_fuel_charge"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000024" class="t_parking_charge"></td>
                    <td style="border:1px solid #e9ecef;" id="221000000000023" class="t_toll_charge"></td>

                    <td style="border:1px solid #e9ecef;" id="81000000000004"></td> -->

                <!-- </tr>
                </tfoot> -->
              </table>
            </div>

            <div class="card-body BrfListCart">
              <table style="float:right;">
                <tr>
                  <th style="position: relative;right:45px;"> Total Item : <span id="TotalAllowance"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="TotalAccomodation"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="TotalOther"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="GrandTotal"></span></th>
                </tr>
              </table>
            </div>

          </div>
          <a onclick="CancelBusinessTrip();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
            <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Business Trip List Cart"> Cancel
          </a>
          <button class="btn btn-default btn-sm float-right" type="submit" id="saveBrfList" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
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
@include('Advance.BusinessTrip.Functions.Footer.FooterBusinessTripRequest')
@endsection