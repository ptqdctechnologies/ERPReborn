@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getAdvance')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Business Trip Request Report Detail</label>
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
                                        @include('Process.BusinessTrip.BusinessTripRequest.Functions.Header.HeaderReportBusinessTripRequestDetail')
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
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-3 p-0 text-bold">
                                                        BRF Number
                                                    </div>
                                                    <div class="col-sm-8 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['brfNumber']; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-3 p-0 text-bold">
                                                        Budget
                                                    </div>
                                                    <div class="col-sm-8 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['budgetCode'] . " - " . $dataReport['dataHeaderOne']['budgetName']; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-3 p-0 text-bold">
                                                        Sub Budget
                                                    </div>
                                                    <div class="col-sm-8 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['siteCode'] . " - " . $dataReport['dataHeaderOne']['siteName']; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-3 p-0 text-bold">
                                                        Product
                                                    </div>
                                                    <div class="col-sm-8 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['productID']; ?> (<?= $dataReport['dataHeaderOne']['productName']; ?>)
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Tanggal Mulai Perjalanan
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['dateCommence']; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Tanggal Akhir Perjalanan
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['dateEnd']; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Tanggal Pembuatan BRF
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['dateBRF']; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Contact Phone
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['contactPhone']; ?>
                                                    </div>
                                                </div>
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
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Requester
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['requester']; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Beneficiary
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['beneficiary']; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-4 col-md-6 p-0 text-bold">
                                                        Departing From
                                                    </div>
                                                    <div class="col-sm-8 col-md-6 p-0">
                                                        : <?= $dataReport['dataHeaderOne']['departingFrom']; ?>
                                                    </div>
                                                </div>
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
                                        <div class="row p-1" style="line-height: 14px; row-gap: 1rem;">
                                            <div class="col-sm-12 col-md-4">
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

                        <!-- HEADER THREE -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
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
                    <?php }; Session::forget("isButtonReportBusinessTripRequestDetailSubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.BusinessTrip.BusinessTripRequest.Functions.Footer.FooterReportBusinessTripRequestDetail')
@endsection