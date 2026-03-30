@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getBank')
@include('getFunction.getWorker')
@include('getFunction.getProduct')
@include('getFunction.getWorkFlow')
@include('getFunction.getBankList')
@include('getFunction.getBeneficiary')
@include('getFunction.getBankAccount')
@include('getFunction.getEntityBankAccount')
@include('getFunction.getBusinessTripRequest')
@include('Process.BusinessTrip.BusinessTripRequest.Functions.PopUp.PopUpBusinessTripRequestRevision')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITTLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Revision Business Trip Request Form
          </label>
        </div>
      </div>

      @include('Process.BusinessTrip.BusinessTripRequest.Functions.Menu.MenuBusinessTripRequest')

      <div class="card">
        <form method="post" action="{{ route('SelectWorkFlow') }}" id="FormRevisionBusinessTrip">
          @csrf
          <input hidden id="DocumentTypeID" name="DocumentTypeID" value="<?= $documentType_RefID; ?>">
          <input hidden id="var_combinedBudget_RefID" name="var_combinedBudget_RefID" value="<?= $budget['id']; ?>" />
          <input hidden id="combinedBudgetSectionDetail_RefID" name="combinedBudgetSectionDetail_RefID" value="<?= $combinedBudgetSectionDetail_RefID; ?>" />
          <input hidden id="personBusinessTripRefID" name="personBusinessTripRefID" value="<?= $personBusinessTripRefID; ?>" />
          <input hidden id="personBusinessTripDetailRefID" name="personBusinessTripDetailRefID" value="<?= $personBusinessTripDetailRefID; ?>" />
          <input hidden id="workStructure_RefID" name="workStructure_RefID" value="<?= $workStructure_RefID; ?>" />
          <input hidden id="product_RefID" name="product_RefID" value="<?= $product_RefID; ?>" />
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

                  @include('Process.BusinessTrip.BusinessTripRequest.Functions.Header.HeaderBusinessTripRequestRevision')
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

                  @include('Process.BusinessTrip.BusinessTripRequest.Functions.Header.HeaderBusinessTripRequest2Revision')
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
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Work</th>
                          <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Product</th>
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

                  @include('Process.BusinessTrip.BusinessTripRequest.Functions.Header.HeaderBusinessTripRequest3Revision')
                </div>
              </div>
            </div>
          </div>

          <!-- BUTTON -->
          <div class="px-3 pb-3">
            <div style="display: flex; justify-content: flex-end; gap: 8px;">
              <button class="btn btn-default btn-sm button-submit" id="cancelButton" type="button" onclick="cancelForm('{{ route('BusinessTripRequest.index', ['var' => 1]) }}')">
                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" />
                <div>Cancel</div>
              </button>

              <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Business Trip"> Submit
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
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color:#e9ecef;border:1px solid #ced4da;">
          <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> No, cancel
        </button>

        <button type="button" id="revisionBRF" class="btn btn-default btn-sm" onclick="SubmitForm();" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
          <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Yes, save it
        </button>
      </div>
    </div>
  </div>
</div>

@include('Process.BusinessTrip.BusinessTripRequest.Functions.Footer.FooterBusinessTripRequestRevision')
@include('Partials.footer')
@endsection