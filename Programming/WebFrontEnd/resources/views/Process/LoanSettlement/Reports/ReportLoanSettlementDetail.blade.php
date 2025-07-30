@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getBusinessTripRequest')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Loan Settlement Report Detail</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <!-- FORM -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row p-1" style="row-gap: 1rem;">
                                        @include('Process.LoanSettlement.Functions.Header.HeaderReportLoanSettlementDetail')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($dataReport) { ?>
                        <!-- HEADER ONE -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-1" style="line-height: 14px; row-gap: 1rem;">
                                            <div class="col-sm-12 col-md-4">
                                                <!-- BUDGET -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-3 p-0 text-bold">
                                                        Budget
                                                    </div>
                                                    <div class="col-sm-8 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['budgetCode']; ?>
                                                    </div>
                                                </div>
                                                <!-- SUB BUDGET -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-3 p-0 text-bold">
                                                        Sub Budget
                                                    </div>
                                                    <div class="col-sm-8 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['siteCode']; ?>
                                                    </div>
                                                </div>
                                                <!-- DESCRIPTION -->
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-3 p-0 text-bold">
                                                        Description
                                                    </div>
                                                    <div class="col-sm-8 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['productID']; ?> (<?= $dataReport['dataHeaderOne']['productName']; ?>)
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <!-- DATE COMMENCE TRAVEL -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Date Commence Travel
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['dateCommence']; ?>
                                                    </div>
                                                </div>
                                                <!-- DATE END TRAVEL -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Date End Travel
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['dateEnd']; ?>
                                                    </div>
                                                </div>
                                                <!-- BRF DATE -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        BRF Date
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['dateBRF']; ?>
                                                    </div>
                                                </div>
                                                <!-- CONTACT PHONE -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Contact Phone
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['contactPhone']; ?>
                                                    </div>
                                                </div>
                                                <!-- BANK ACCOUNT -->
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Bank Account
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : (<?= $dataReport['dataHeaderOne']['bankType']; ?>) <?= $dataReport['dataHeaderOne']['bankAccountNumber']; ?> - <?= $dataReport['dataHeaderOne']['bankAccountName']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <!-- REQUESTER -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Requester
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['requester']; ?>
                                                    </div>
                                                </div>
                                                <!-- BENEFICIARY -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Beneficiary
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['beneficiary']; ?>
                                                    </div>
                                                </div>
                                                <!-- DEPARTING FROM -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Departing From
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['departingFrom']; ?>
                                                    </div>
                                                </div>
                                                <!-- DESTINATION TO -->
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Destination To
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['destinationTo']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- HEADER TWO -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-1 text-bold px-0" style="line-height: 14px;">
                                            File Attachment
                                        </div>
                                        <div class="row p-1 pt-2">
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

                        <!-- HEADER THREE -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-1" style="line-height: 14px; row-gap: 1rem;">
                                            <div class="col-sm-12 col-md-4">
                                                <!-- TOTAL ALLOWANCE -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-4 p-0 text-bold">
                                                        Total Allowance
                                                    </div>
                                                    <div class="col-sm-8 col-md-8 p-0">
                                                        : <?= number_format($dataReport['dataHeaderTwo']['totalAllowance'], 2, '.', ','); ?>
                                                    </div>
                                                </div>

                                                <!-- TOTAL TRANSPORT -->
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-4 p-0 text-bold">
                                                        Total Transport
                                                    </div>
                                                    <div class="col-sm-8 col-md-8 p-0">
                                                        : <?= number_format($dataReport['dataHeaderTwo']['totalTransport'], 2, '.', ','); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <!-- TOTAL ENTERTAINMENT -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Total Entertainment
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= number_format($dataReport['dataHeaderTwo']['totalEntertainment'], 2, '.', ','); ?>
                                                    </div>
                                                </div>

                                                <!-- TOTAL ACCOMMODATION -->
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Total Accommodation
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= number_format($dataReport['dataHeaderTwo']['totalAccommodation'], 2, '.', ','); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <!-- TOTAL OTHER -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Total Other
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= number_format($dataReport['dataHeaderTwo']['totalOther'], 2, '.', ','); ?>
                                                    </div>
                                                </div>

                                                <!-- TOTAL BUSINESS TRIP -->
                                                <div class="d-sm-flex d-md-none row">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Total Business Trip
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= number_format($dataReport['dataHeaderTwo']['totalBusinessTrip'], 2, '.', ','); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-sm-none d-md-block" style="margin-top: 1rem;">
                                            <hr class="m-0" />
                                        </div>
                                        <div class="d-sm-none d-md-flex row p-1" style="line-height: 14px; row-gap: 1rem; margin-top: 1rem;">
                                            <div class="d-sm-none d-md-block col-sm-12 col-md-4"></div>
                                            <div class="d-sm-none d-md-block col-sm-12 col-md-4"></div>
                                            <!-- TOTAL BUSINESS TRIP -->
                                            <div class="d-sm-none d-md-block col-sm-12 col-md-4">
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Total Business Trip
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= number_format($dataReport['dataHeaderTwo']['totalBusinessTrip'], 2, '.', ','); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- HEADER FOUR -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- REASON TO TRAVEL -->
                                        <div class="form-group py-1">
                                            <label class="text-bold" style="margin-right: 1rem;">Reason to Travel</label>
                                            <div class="mt-1" style="line-height: 16px;">
                                                <?= $dataReport['dataHeaderThree']['reason']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; Session::forget("isButtonReportLoanDetailSubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.LoanSettlement.Functions.Footer.FooterReportLoanSettlementDetail')
@endsection