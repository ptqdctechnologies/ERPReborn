@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getAdvance')
@include('getFunction.getAdvanceSettlement')
@include('getFunction.getWorkFlow')
@include('Process.Advance.AdvanceSettlement.Functions.PopUp.PopUpAdvanceSettlementRevision')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Advance Settlement</label>
        </div>
      </div>

      @include('Process.Advance.AdvanceSettlement.Functions.Menu.MenuAdvanceSettlement')
      @if($var == 0)
      <div class="card" style="position:relative;bottom:10px;">
        <form method="post" action="{{ route('SelectWorkFlow') }}" id="FormStoreAdvanceSettlement">
          @csrf
          <input type="hidden" name="DocumentTypeID" id="DocumentTypeID">
          <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID">

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
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <!-- BODY -->
                  @include('Process.Advance.AdvanceSettlement.Functions.Header.HeaderAdvanceSettlement')
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
                      File Attachment
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

          <!-- ADVANCE REQUEST DETAIL -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
                  <div class="card-header">
                    <label class="card-title">
                      Advance Request Detail
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <!-- BODY -->
                  @include('Process.Advance.AdvanceSettlement.Functions.Table.TableArfDetail')

                  <!-- BUTTON -->
                  <div class="card-body">
                    <div class="row" style="gap: 1rem;">
                      <div class="col">
                        <table style="float:right;">
                          <tr>
                            <th style="position: relative;right:20px;"> Total : <span id="TotalAdvanceDetail">0.00</span></th>
                          </tr>
                          {{-- <tr>
                            <td>
                              <br>
                              <a class="btn btn-default btn-sm float-right" id="advance-details-add" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                              </a>
                            </td>
                          </tr> --}}
                        </table>
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
                      <textarea name="var_remark" id="remark" class="form-control"></textarea>
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
                <a onclick="CancelAdvance()" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                </a>

                <button type="button" id="advance-details-add" class="btn btn-default btn-sm float-right" data-toggle="modal" data-target="#advanceSettlementFormModal" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
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

<div class="modal fade" id="advanceSettlementFormModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="margin: 0px;font-weight:bold;">Are you sure you want to save this data?</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="wrapper-budget table-responsive card-body p-0" style="max-height: 230px;">
          <table class="table text-nowrap table-sm" id="tableAdvanceList">
            <tbody></tbody>
          </table>
        </div>
        <div class="card-body">
          <table style="float:right;">
            <tr>
              <th> Total Item :
                <span id="GrandTotal">0.00</span>
              </th>
            </tr>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="submitArf" class="btn btn-default btn-sm" onclick="SubmitForm();" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
          <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Yes, save it
        </button>

        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color:#e9ecef;border:1px solid #ced4da;">
          <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> No, cancel
        </button>
      </div>
    </div>
  </div>
</div>

@include('Partials.footer')
@include('Process.Advance.AdvanceSettlement.Functions.Footer.FooterAdvanceSettlement')
@endsection