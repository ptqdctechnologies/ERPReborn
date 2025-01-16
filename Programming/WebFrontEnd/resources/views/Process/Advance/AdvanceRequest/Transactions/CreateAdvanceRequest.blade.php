@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProduct')
@include('Process.Advance.AdvanceRequest.Functions.PopUp.PopUpAdvanceRevision')
@include('Process.Advance.AdvanceRequest.Functions.Table.TableAdvanceRevision')
@include('getFunction.getProject')
@include('getFunction.getWorker')
@include('getFunction.getBeneficiary')
@include('getFunction.getBank')
@include('getFunction.getEntityBankAccount')
@include('getFunction.getWorkFlow')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Advance Request</label>
        </div>
      </div>
      @include('Process.Advance.AdvanceRequest.Functions.Menu.MenuAdvanceRequest')
      @if($var == 0)
      <div class="card" style="position:relative;bottom:10px;">
        <form method="post" enctype="multipart/form-data" action="{{ route('SelectWorkFlow') }}" id="FormSubmitAdvance">
          @csrf
          <input type="hidden" name="DocumentTypeID" value="{{ $DocumentTypeID }}" id="DocumentTypeID">
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Add New Advance Request
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Process.Advance.AdvanceRequest.Functions.Header.HeaderAdvance')
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
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
                  @include('Process.Advance.AdvanceRequest.Functions.Header.HeaderAdvanceDetail')
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

            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        Budget Details
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>
                    @include('Process.Advance.AdvanceRequest.Functions.Table.getBOQ')
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Advance List (Cart)
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <div class="card-body table-responsive p-0 AdvanceListCart" style="height:135px;">
                    <table class="table table-head-fixed text-nowrap table-sm TableAdvance" id="TableAdvance">
                      <thead>
                        <tr>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Id</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Uom</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>

                  <div class="card-body AdvanceListCart">
                    <table style="float:right;">
                      <tr>
                        <th> Total Item :
                          <!-- <span id="TotalQty"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                          <span id="GrandTotal"></span>
                        </th>
                      </tr>
                    </table>
                  </div>

                </div>

              </div>
            </div>
            
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
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
                    <div class="card-body Remark">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <table>
                              <tr>
                                <td style="display: flex;">
                                  <textarea name="var_remark" id="remark" rows="2" cols="150" class="form-control"></textarea>
                                  <span id="remark_icon" title="Please Input Remark" style="position: relative;top:10px;left:5px;"><img src="{{ asset('AdminLTE-master/dist/img/mandatory.png') }}" width="17" alt=""></span>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a onclick="CancelAdvance()" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                  </a>

                  <button class="btn btn-default btn-sm float-right" type="submit" id="submitArf" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                  </button>
                </div>
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
@include('Process.Advance.AdvanceRequest.Functions.Footer.FooterAdvanceRequest')
@endsection