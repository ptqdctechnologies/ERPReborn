@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getLoans')
@include('getFunction.getChartOfAccount')
@include('getFunction.getLoanSettlements')
@include('Process.LoanSettlement.Functions.PopUp.PopUpLoanSettlement')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
        <!-- TITTLE -->
        <div class="row title-pages mb-1">
            <div class="col-sm-6 title">
                Revision Loan Settlement Form
            </div>
        </div>

        @include('Process.LoanSettlement.Functions.Menu.MenuLoanSettlement')

        <div class="card">
            <!-- ADD NEW SETTLEMENT -->
            <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
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

                            @include('Process.LoanSettlement.Functions.Header.HeaderRevisionLoanSettlement')
                        </div>
                    </div>
                </div>
            </div>

            <!-- FILE ATTACHMENT -->
            <div class="tab-content px-3 pb-2" id="nav-tabContent">
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
                                <div class="row py-3 overflow-auto">
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

            <!-- LOAN SETTLEMENT DETAIL -->
            <div class="tab-content px-3 pb-2" id="nav-tabContent">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="card-title">
                                    Loan Settlement Detail
                                </label>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                    </button>
                                </div>
                            </div>

                            @include('Process.LoanSettlement.Functions.Header.HeaderRevisionLoanSettlementDetail')
                        </div>
                    </div>
                </div>
            </div>

            <!-- REMARK -->
            <div class="tab-content px-3 pb-2" id="nav-tabContent">
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

                            <div class="card-body">
                                <div class="row py-3">
                                    <textarea name="var_remark" id="remark" rows="2" cols="150" class="form-control" placeholder="Tulis remark disini"><?= $header['remark']; ?></textarea>
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

                        <a onclick="cancelForm('{{ route('LoanSettlement.index', ['var' => 1]) }}')" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>

@include('Process.LoanSettlement.Functions.Footer.FooterRevisionLoanSettlement')
@include('Partials.footer')
@endsection