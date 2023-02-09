@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('Advance.BusinessTrip.Functions.PopUp.PopUpBusinessTripRequestRevision')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getWorker')
@include('getFunction.getProduk')

<div class="content-wrapper" style="position:relative;bottom:12px;">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Business Trip Request Form Revision</label>
        </div>
      </div>
      @include('Advance.BusinessTrip.Functions.Menu.MenuBusinessTripRequest')
      <div class="card" style="position:relative;bottom:10px;">
        <form method="post" enctype="multipart/form-data" action="{{ route('BusinessTripRequest.update', $var_recordID) }}" id="FormSubmitBusinessTrip">
          @csrf
          @method('PUT')
          <input id="var_recordID" style="border-radius:0;" name="var_recordID" value="{{ $var_recordID }}" class="form-control" type="hidden">
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="row">
              @csrf
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Add New Business Trip Request Form
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Advance.BusinessTrip.Functions.Header.HeaderBusinessTripRequestRevision')
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
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value="" readonly="true" name="dataInput_Log_FileUpload_Pointer_RefID">
                          <input type="file" id="dataInput_Log_FileUpload_Pointer_RefID_Action" name="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" onchange="javascript: @php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_DOMInputFileContent(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIWebToken, 'Upload', 'dataInput_Log_FileUpload_Pointer_RefID', 'dataShow_ActionPanel', 'dataShow_MasterFileRecord'); @endphp;" />
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
                                  <input name="request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly value="{{ $dataRequester['name'] }}">
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
                                  <input id="request_position" style="border-radius:0;" class="form-control" name="request_position" readonly value="{{ $dataRequester['jobPosition'] }}">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Contact Phone</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="contactPhone" name="contactPhone" style="border-radius:0;" type="text" class="form-control" value="{{ $dataRequester['jobPosition'] }}">
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
                  @include('getFunction.BOQ3')
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
                          <tr>
                            <div class="form-group clearfix">
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="transportApplicableBus" name="TransportType" value="Bus" checked>
                                  <label for="transportApplicableBus">Bus
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="transportApplicableRail" name="TransportType" value="Rail">
                                  <label for="transportApplicableRail">Rail
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="transportApplicableAir" name="TransportType" value="Air">
                                  <label for="transportApplicableAir">Air
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="transportApplicableSea" name="TransportType" value="Sea">
                                  <label for="transportApplicableSea">Sea
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="transportApplicableVehicle" name="TransportType" value="Company Vehicle">
                                  <label for="transportApplicableVehicle">Company Vehicle
                                  </label>
                                </div>
                              </td>
                              <!-- <td>
                                <div class="icheck-primary d-inline">
                                  <input type="checkbox" id="transportApplicableTrain" name="TransportType" value="Train">
                                  <label for="transportApplicableTrain">Train
                                  </label>
                                </div>
                              </td> -->
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
                                  <input type="radio" id="lupsum" name="paymentApplicable" value="Lumpsum" checked>
                                  <label for="lupsum">Lumpsum
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="radio" id="nonLupsum" name="paymentApplicable" value="Non Lumpsum">
                                  <label for="nonLupsum">Non Lumpsum
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
                                  <input type="radio" id="arrangeCompany" name="accomodation" value="Arrange by Company" checked>
                                  <label for="arrangeCompany">Arrange by Company
                                  </label>
                                </div>
                              </td>
                              <td>
                                <div class="icheck-primary d-inline">
                                  <input type="radio" id="arrangeEmployee" name="accomodation" value="Arrange by Employee">
                                  <label for="arrangeEmployee">Arrange by Employee
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
                                  <option value="Bus">Bus</option>
                                  <option value="Rail">Rail</option>
                                  <option value="Air">Air</option>
                                  <option value="Sea">Sea</option>
                                  <option value="Company Vehicle">Company Vehicle</option>
                                  <!-- <option value="Train">Train</option> -->
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
                          <th colspan="6" style="border:2px solid #e9ecef;width:60%;"> Payment Sequence</th>
                        </tr>
                        <tr>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:12%;border:1px solid #e9ecef;">Product ID</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:8%;border:1px solid #e9ecef;">Product Name</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Budget Request</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:2%;border:1px solid #e9ecef;">Sequence Req</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:2%;border:1px solid #e9ecef;">Sequence</th>

                          <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Allowance</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Transport</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Airport Tax</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Accomodation</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Other</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Balance</th>
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
                          <input id="sequence" style="border-radius:0;font-weight:bold;" value="1" type="text" class="form-control" readonly>
                          <input id="putSequence" style="border-radius:0;border:none;background-color:white;font-weight:bold;" type="hidden" class="form-control" readonly>
                        </td>
                        
                        <td style="border:1px solid #e9ecef;">
                          <input id="allowance" style="border-radius:0;" type="text" class="form-control" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                        </td>
                        <td style="border:1px solid #e9ecef;">
                          <input id="transport" style="border-radius:0;" type="text" class="form-control" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                        </td>
                        <td style="border:1px solid #e9ecef;">
                          <input id="airport_tax" style="border-radius:0;" type="text" class="form-control" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                        </td>
                        <td style="border:1px solid #e9ecef;">
                          <input id="accomodation" style="border-radius:0;" type="text" class="form-control" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                        </td>
                        <td style="border:1px solid #e9ecef;">
                          <input id="other" style="border-radius:0;" type="text" class="form-control" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                        </td>
                        <td style="border:1px solid #e9ecef;">
                          <input id="totalBalance" style="border-radius:0;" type="text" class="form-control" readonly="">
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
                      <a class="btn btn-default btn-sm float-right" onclick="CancelDetailBrf()" id="CancelDetailBrf" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
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
            </div>
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
                  <div class="card-body table-responsive p-0" style="height: 180px;">
                    <table class="table table-head-fixed text-nowrap table-striped TableBusinessTrip" id="TableBusinessTrip">
                      <thead>
                        <tr>
                          <th style="border:1px solid #e9ecef;text-align: center;width:7%;">Action</th>
                          <th style="border:1px solid #e9ecef;text-align: center;width:10%;">Product ID</th>
                          <th style="border:1px solid #e9ecef;text-align: center;width:10%;">Product Name</th>
                          <th style="border:1px solid #e9ecef;text-align: center;width:10%;">Sequence</th>
                          <th style="border:1px solid #e9ecef;text-align: center;width:13%;">Allowance</th>
                          <th style="border:1px solid #e9ecef;text-align: center;width:13%;">Transport</th>
                          <th style="border:1px solid #e9ecef;text-align: center;width:13%;">Airport Tax</th>
                          <th style="border:1px solid #e9ecef;text-align: center;width:13%;">Accomodation</th>
                          <th style="border:1px solid #e9ecef;text-align: center;width:13%;">Others</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>

                  <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap table-striped TableBusinessTrip">
                      <thead>
                        <tr>
                          <th style="border:1px solid #e9ecef;width:7%;"">Sub Total</th>
                          <td style="border:1px solid #e9ecef;width:10%;"></td>
                          <td style="border:1px solid #e9ecef;width:10%;"></td>
                          <td style="border:1px solid #e9ecef;width:10%;"></td>
                          <td style="border:1px solid #e9ecef;width:13%;" id="valAllowance"></td>
                          <td style="border:1px solid #e9ecef;width:13%;" id="valTransport"></td>
                          <td style="border:1px solid #e9ecef;width:13%;" id="valAirportTax"></td>
                          <td style="border:1px solid #e9ecef;width:13%;" id="valAccomodation"></td>
                          <td style="border:1px solid #e9ecef;width:13%;" id="valOthers"></td>
                        </tr>
                      </thead>
                    </table>
                    <table class="table table-head-fixed text-nowrap table-striped">
                      <tfoot>
                        <tr>
                          <th style="color:brown;float:right;">Total Business Trip : <span id="totalBrf"></span> || Total Sequence : <span id="totalSequence"></span></th>
                        </tr>
                      </tfoot>
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
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Advance.BusinessTrip.Functions.Footer.FooterBusinessTripRequestRevision')
@endsection