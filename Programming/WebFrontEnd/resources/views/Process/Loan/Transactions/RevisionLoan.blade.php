@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getCurrencies')
@include('getFunction.getChartOfAccount')
@include('getFunction.getBankLists')
@include('getFunction.getBanksAccount')
@include('getFunction.getSuppliers')
@include('getFunction.getLoans')
@include('getFunction.getWorkFlow')
@include('Process.Loan.Functions.Popup.PopUpLoanRevision')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Revision Loan
          </label>
        </div>
      </div>

      @include('Process.Loan.Functions.Menu.MenuLoan')
      
      <!-- CONTENT -->
      <div class="card">
        <!-- <form method="POST" action="{{ route('Loan.update', $loanRefID) }}" id="loan_form">
          @csrf
          @method('PUT') -->
          <input type="hidden" name="DocumentTypeID" id="DocumentTypeID" value="<?= $documentTypeRefID; ?>">
          <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID" value="<?= $header['combinedBudgetRefID']; ?>">

          <!-- LOAN DETAILS -->
          <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- HEADER -->
                  <div class="card-header">
                    <label class="card-title">
                      Loan Details
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section Loan Request">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  @include('Process.Loan.Functions.Header.HeaderRevisionLoan')
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

          <!-- BUTTON -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col">
                <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Account Payable"> Submit
                </button>

                <a onclick="cancelForm('{{ route('Loan.index', ['var' => 1]) }}')" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Account Payable List Cart"> Cancel
                </a>
              </div>
            </div>
          </div>
        <!-- </form> -->
      </div>
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Process.Loan.Functions.Footer.FooterRevisionLoan')
@endsection