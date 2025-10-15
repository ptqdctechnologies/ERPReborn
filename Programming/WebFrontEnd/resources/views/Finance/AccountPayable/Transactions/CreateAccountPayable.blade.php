@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getAccountPayable')
@include('getFunction.getPurchaseOrder')
@include('getFunction.getChartOfAccount')
@include('getFunction.getCategory')
@include('getFunction.getPaymentTransfer')
@include('Finance.AccountPayable.Functions.PopUp.PopUpAccountPayableRevision')
@include('Finance.AccountPayable.Functions.PopUp.PopUpAccountPayableSummaryData')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Account Payable
          </label>
        </div>
      </div>

      @include('Finance.AccountPayable.Functions.Menu.MenuAccountPayable')

      @if($var == 0)
      <div class="card">
        <form method="POST" action="{{ route('AccountPayable.store') }}" id="form_submit_account_payable">
        @csrf
          <input type="hidden" name="DocumentTypeID" id="DocumentTypeID" value="<?= $documentType_RefID; ?>">
          <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID">

          <!-- PO INFORMATION -->
          <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
                  <div class="card-header">
                    <label class="card-title">
                      PO Information
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  @include('Finance.AccountPayable.Functions.Header.HeaderPOAccountPayable')
                </div>
              </div>
            </div>
          </div>

          <!-- ACCOUNT PAYABLE -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
                  <div class="card-header">
                    <label class="card-title">
                      Account Payable 
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  @include('Finance.AccountPayable.Functions.Header.HeaderAccountPayable')
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

          <!-- ACCOUNT PAYABLE DETAILS -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
                  <div class="card-header">
                    <label class="card-title">
                      Account Payable Details
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  @include('Finance.AccountPayable.Functions.Table.TableAccountPayable')
                </div>
              </div>
            </div>
          </div>

          <!-- BUTTON -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col">
                <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Account Payable"> Submit
                </button>

                <a onclick="cancelForm('{{ route('AccountPayable.index', ['var' => 1]) }}')" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Account Payable List Cart"> Cancel
                </a>
              </div>
            </div>
          </div>
        </form>
      </div>
      @endif
    </div>
  </section>
</div>

<!-- Modal -->
<div class="modal fade" id="myInformation" tabindex="-1" role="dialog" aria-labelledby="myInformationLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div style="line-height: 1.42857143; margin: 0; font-size: 18px; font-weight: 500; color: inherit; font-family: inherit;">
          Modal title
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        Lorem ipsum dolor sit amet consectetur adipiscing elit a auctor, bibendum urna feugiat nibh turpis blandit pellentesque per, senectus nulla morbi scelerisque potenti placerat at laoreet. Et ac magnis tellus interdum condimentum eget curabitur sollicitudin sed, facilisi fringilla placerat tristique rutrum nam morbi proin dui ligula, malesuada sociosqu sodales praesent imperdiet suspendisse luctus accumsan. Sed nec dis semper facilisi maecenas dapibus placerat odio nulla metus nostra fermentum, consequat inceptos taciti volutpat ligula torquent aliquam curae ante lacinia.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@include('Partials.footer')
@include('Finance.AccountPayable.Functions.Footer.FooterAccountPayable')
@endsection