@extends('Partials.app')
@section('main')
  @include('Partials.navbar')
  @include('Partials.sidebar')
  @include('getFunction.getProjects')
  @include('getFunction.getSites')
  @include('getFunction.getRequesters')
  @include('getFunction.getBeneficiaries')
  @include('getFunction.getBanks')
  @include('getFunction.getBankLists')
  @include('getFunction.getBanksAccount')
  @include('getFunction.getBusinessTripRequests')

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- TITTLE -->
        <div class="row mb-1" style="background-color:#4B586A;">
          <div class="col-sm-6" style="height:30px;">
            <label style="font-size:15px;position:relative;top:7px;color:white;">
              Business Trip Request Form
            </label>
          </div>
        </div>

        @include('Process.BusinessTrip.BusinessTripRequest.Functions.Menu.MenuBusinessTripRequest')
        @if($var == 0)
              <div class="card">
                <input hidden id="budgetDetailsData" />
                <input hidden id="DocumentTypeID" name="DocumentTypeID" value="<?= $documentType_RefID; ?>">

                <!-- ADD NEW BUSINESS REQUEST TRIP FORM -->
                <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <!-- TITLE -->
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

                        @include('Process.BusinessTrip.BusinessTripRequest.Functions.Header.sectionOne')
                      </div>
                    </div>
                  </div>
                </div>

                <!-- FILE ATTACHMENT -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <!-- TITLE -->
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
                                  <input type="text" id="dataInput_Log_FileUpload_1" name="dataInput_Log_FileUpload_1"
                                    style="display:none">
                                  <?php  echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataInput_Log_FileUpload_1',
            null,
            'dataInput_Return'
          ) .
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

                        @include('Process.BusinessTrip.BusinessTripRequest.Functions.Header.sectionTwo')
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
                              <input id="budget_detail_search" style="border-radius: 4px; display: none;" class="form-control"
                                autocomplete="off" placeholder="Search Product">
                            </div>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                            </button>
                          </div>
                        </div>

                        @include('Process.BusinessTrip.BusinessTripRequest.Functions.Table.TableBrf')
                      </div>
                    </div>
                  </div>
                </div>

                <!-- BUSINESS TRIP BUDGET DETAILS -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <!-- TITLE -->
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

                        @include('Process.BusinessTrip.BusinessTripRequest.Functions.Header.sectionThree')
                      </div>
                    </div>
                  </div>
                </div>

                <!-- BUTTON -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                  <div class="row">
                    <div class="col">
                      <button type="button" class="btn btn-default btn-sm float-right button-submit"
                        style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" />
                        <div>Submit</div>
                      </button>

                      <button type="button" class="btn btn-default btn-sm float-right button-submit"
                        onclick="cancelForm('{{ route('BusinessTripRequest.index') }}')"
                        style="background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" />
                        <div>Cancel</div>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
        @endif
      </div>
    </section>
  </div>

  @include('Process.BusinessTrip.BusinessTripRequest.Functions.Footer.FooterBusinessTripRequest')
  @include('Partials.footer')
@endsection