@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('Advance.BusinessTrip.Functions.PopUp.PopUpBusinessTripRevision')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getWorker')

<div class="content-wrapper" style="position:relative;bottom:12px;">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Business Trip Request Revision</label>
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
                      Business Trip Request Revision
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Advance.BusinessTrip.Functions.Header.HeaderBusinessTripRevision')
                </div>
              </div>
            </div>
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true"><span style="font-weight:bold;padding:40px;color:black;">Please Fill this Form Below</span></a>&nbsp&nbsp&nbsp
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false"><span style="font-weight:bold;padding:40px;color:black;">Transport Details</span></a>
              </div>
            </nav>

            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
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
                                    <input name="request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly value="{{ $dataRequester['name'] }}" required>
                                    <input name="request_name_id" id="request_name_id" style="border-radius:0;" type="hidden" class="form-control" value="{{ $dataRequester['workerJobsPosition_RefID'] }}" readonly required>
                                    <div class="input-group-append">
                                      <span style="border-radius:0;" class="input-group-text form-control">
                                        <a id="request_name2" data-toggle="modal" data-target="#myWorker"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                      </span>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td><label>Job Tittle</label></td>
                                <td>
                                  <div class="input-group">
                                    <select class="form-control" style="width: 100%; border-radius:0;" id="jobTitle" name="jobTitle">
                                      <option selected="selected">Alabama</option>
                                      <option>Alaska</option>
                                      <option>California</option>
                                      <option>Delaware</option>
                                      <option>Tennessee</option>
                                      <option>Texas</option>
                                      <option>Washington</option>
                                    </select>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td><label>Department</label></td>
                                <td>
                                  <div class="input-group">
                                    <input id="department" name="department" style="border-radius:0;" type="text" class="form-control">
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td><label>Reason To Travel</label></td>
                                <td>
                                  <textarea id="reasonTravel" name="reasonTravel" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
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
                            </table>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <table>
                            <tr>
                              <td><label>Head Station Location</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="headStationLocation" name="headStationLocation" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Business Trip Location</label></td>
                              <td>
                                <textarea id="bussinesLocation" name="bussinesLocation" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
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
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
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
                    <div class="card-body table-responsive p-0" id="brfhide2">
                      <table id="table1" class="table table-head-fixed text-nowrap table-striped">
                        <thead>
                          <tr>
                            <th>Transport Type</th>
                            <th>Transport Booking</th>
                            <th>Time Of Depart</th>
                            <th>Time Of Arrival</th>
                            <th>Quoted Fare(IDR)</th>
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
                  @include('getFunction.BOQ3')
                </div>
              </div>
            </div>

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
                  <div class="card-body" id="brfhide1">
                    <div class="form-group">
                      <table>
                        <tr>
                          <td><label><strong>Transport Type Applicable</strong></label></td>
                        </tr>
                        <tr>
                          <div class="form-group clearfix">
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="transportApplicableBus" name="TransportType" value="Bus" checked>
                                <label for="transportApplicableBus">Bus
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="transportApplicableRail" name="TransportType" value="Rail">
                                <label for="transportApplicableRail">Rail
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="transportApplicableAir" name="TransportType" value="Air">
                                <label for="transportApplicableAir">Air
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="transportApplicableSea" name="TransportType" value="Sea">
                                <label for="transportApplicableSea">Sea
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="transportApplicableVehicle" name="TransportType" value="Company Vehicle">
                                <label for="transportApplicableVehicle">Company Vehicle
                                </label>
                              </div>
                            </td>
                            <td>
                              <div class="icheck-primary d-inline">
                                <input type="radio" id="transportApplicableTrain" name="TransportType" value="Train">
                                <label for="transportApplicableTrain">Train
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
                  <div class="card-body" id="brfhide5">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label><strong> Budget Detail</strong></label></td>
                            </tr>
                            <tr class="budgetDetail">
                              <td><label>Product ID</label></td>
                              <td>
                                <div class="input-group">
                                  <input name="budget_name" id="budget_name" style="border-radius:0;" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myRequesterNameArf" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr class="budgetDetail">
                              <td><label>Sequence Request</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="sequenceRequest" name="sequenceRequest" style="border-radius:0;" type="number" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Budget Request for BT</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="budgetRequest" name="budgetRequest" style="border-radius:0;" type="number" class="form-control">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <table>
                            <br>
                            <tr>
                              <td><label><strong> Payment Sequence</strong></label></td>
                            </tr>
                            <tr>
                              <td><label>Sequence</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="sequence" style="border-radius:0;border:none;background-color:white;font-weight:bold;" value="1" type="number" class="form-control" readonly>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Allowance</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="allowance" style="border-radius:0;" type="number" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div id="iconAllowance" style="color: red;margin-left:5px;"></div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Transport</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="transport" style="border-radius:0;" type="number" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div id="iconTransport" style="color: red;margin-left:5px;"></div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <table>
                            <br><br><br><br><br>
                            <tr>
                              <td><label>Airport Tax</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="airport_tax" style="border-radius:0;" type="number" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div id="iconAirportTax" style="color: red;margin-left:5px;"></div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Accomodation</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="accomodation" style="border-radius:0;" type="number" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div id="iconAccomodation" style="color: red;margin-left:5px;"></div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <table>
                            <br><br><br><br><br>
                            <tr>
                              <td><label>Other</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="other" style="border-radius:0;" type="number" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div id="iconOther" style="color: red;margin-left:5px;"></div>
                              </td>
                            </tr>
                          </table>
                          <div style="padding-right:10px;padding-top:10px;">
                            <a class="btn btn-default btn-sm float-right CancelDetailBrf" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
                              <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel to Add Advance List Cart"> Cancel
                            </a>
                            <a class="btn btn-default btn-sm float-right" onclick="addFromDetailtoCartJs();" id="AddToBrfListCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                              <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                            </a>
                          </div>
                          <br><br><br>
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
                    <label class="card-title">Business Trip Request Form
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body table-responsive p-0 brfhide6" style="height: 180px;">
                    <table class="table table-head-fixed text-nowrap table-striped tableBrf">
                      <thead>
                        <tr>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;width:7%;">Action</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;width:20%;">Allowance</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;width:20%;">Transport</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;width:20%;">Airport Tax</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;width:20%;">Accomodation</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;width:13%;">Others</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>

                  <div class="card-body table-responsive p-0 brfhide6">
                    <table class="table table-head-fixed text-nowrap table-striped tableBrf">
                      <thead>
                        <tr>
                          <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;width:7%;"></td>
                          <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;width:20%;" id="valAllowance"></td>
                          <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;width:20%;" id="valTransport"></td>
                          <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;width:20%;" id="valAirportTax"></td>
                          <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;width:20%;" id="valAccomodation"></td>
                          <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;width:13%;" id="valOthers"></td>
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
@include('Advance.BusinessTrip.Functions.Footer.FooterBusinessTripRevision')
@endsection