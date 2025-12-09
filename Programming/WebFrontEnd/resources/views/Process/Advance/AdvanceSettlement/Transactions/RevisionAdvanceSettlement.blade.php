@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getWorkFlow')
@include('getFunction.getAdvanceSettlement')
@include('Process.Advance.AdvanceSettlement.Functions.PopUp.PopUpAdvanceSettlementRevision')
@include('Process.Advance.AdvanceSettlement.Functions.PopUp.PopUpAdvanceSettlementSummaryData')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Advance Settlement Revision
          </label>
        </div>
      </div>

      @include('Process.Advance.AdvanceSettlement.Functions.Menu.MenuAdvanceSettlement')

      <div class="card" style="position:relative;bottom:10px;">
        <form method="POST" action="{{ route('SelectWorkFlow') }}" id="FormRevisionAdvanceSettlement">
          @csrf
          <input type="hidden" name="DocumentTypeID" id="DocumentTypeID" value="<?= $documentType_RefID; ?>">
          <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID">

          <!-- ADVANCE SETTLEMENT -->
          <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
                  <div class="card-header">
                    <label class="card-title">
                      Advance Settlement
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <!-- BODY -->
                  @include('Process.Advance.AdvanceSettlement.Functions.Header.HeaderAdvanceSettlementRevision')
                </div>
              </div>
            </div>
          </div>

          <!-- ATTACHMENT -->
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
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
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
                            <?php if (isset($fileID) && $fileID) { ?>
                              <input type="text" id="dataInput_Log_FileUpload" name="dataInput_Log_FileUpload_1" style="display:none" value="<?= $fileID; ?>">
                              <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                $varAPIWebToken,
                                'dataInput_Log_FileUpload',
                                $fileID,
                                'dataInput_Return'
                                ).
                              ''; ?>
                            <?php } else { ?>
                              <input type="text" id="dataInput_Log_FileUpload" name="dataInput_Log_FileUpload_1" style="display:none">
                              <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                $varAPIWebToken,
                                'dataInput_Log_FileUpload',
                                null,
                                'dataInput_Return'
                                ).
                              ''; ?>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- ADVANCE SETTLEMENT DETAIL -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
                  <div class="card-header">
                    <label class="card-title">
                      Advance Settlement Details
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <!-- BODY -->
                  @include('Process.Advance.AdvanceSettlement.Functions.Table.TableAsfDetail')

                  <!-- BUTTON -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <div class="text-red" id="advanceDetailsMessage" style="display: none;">
                          Please input at least one item.
                        </div>
                      </div>
                      <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
                        Total : <span id="TotalAdvanceDetail">0.00</span>
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
                  <!-- HEADER -->
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

                  <!-- CONTENT -->
                  <div class="card-body">
                    <div class="row py-3">
                      <div class="col p-0">
                        <textarea name="var_remark" id="remark" class="form-control"><?= $remark; ?></textarea>
                        <div id="remarkMessage" style="margin-top: .3rem;display: none;">
                          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                            <div class="text-red">
                              Remark cannot be empty.
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
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col">
                <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                </button>

                <a onclick="cancelForm('{{ route('AdvanceSettlement.index', ['var' => 1]) }}')" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                </a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Process.Advance.AdvanceSettlement.Functions.Footer.FooterAdvanceSettlementRevision')
@endsection