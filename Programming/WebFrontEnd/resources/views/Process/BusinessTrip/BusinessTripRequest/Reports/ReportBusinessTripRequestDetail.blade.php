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
                                        <div class="row">
                                            <!-- LEFT -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem; white-space: nowrap;">BRF Number</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataHeaderOne']['brfNumber']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Budget</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataHeaderOne']['budgetCode'] . " - " . $dataReport['dataHeaderOne']['budgetName']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Sub Budget</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataHeaderOne']['siteCode'] . " - " . $dataReport['dataHeaderOne']['siteName']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Product</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataHeaderOne']['productID']; ?> (<?= $dataReport['dataHeaderOne']['productName']; ?>)
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- MIDDLE -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem; white-space: nowrap;">Tanggal Mulai Perjalanan</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataHeaderOne']['dateCommence']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Tanggal Akhir Perjalanan</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataHeaderOne']['dateEnd']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Tanggal Pembuatan BRF</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataHeaderOne']['dateBRF']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Contact Phone</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataHeaderOne']['dateBRF']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem; ">Bank Account</label>
                                                            </th>
                                                            <td style="line-height: 16px;">
                                                                : (<?= $dataReport['dataHeaderOne']['bankType']; ?>) <?= $dataReport['dataHeaderOne']['bankAccountNumber']; ?> - <?= $dataReport['dataHeaderOne']['bankAccountName']; ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- RIGHT -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Requester</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataHeaderOne']['requester']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Beneficiary</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataHeaderOne']['beneficiary']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Departing From</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataHeaderOne']['departingFrom']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Destination To</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataHeaderOne']['destinationTo']; ?>
                                                            </td>
                                                        </tr>
                                                    </table>
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
                                        <div class="row">
                                            <!-- LEFT -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Total Transport</label>
                                                            </th>
                                                            <td>
                                                                : <?= number_format($dataReport['dataHeaderTwo']['totalTransport'], 2, '.', ','); ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- MIDDLE -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Total Accommodation</label>
                                                            </th>
                                                            <td>
                                                                : <?= number_format($dataReport['dataHeaderTwo']['totalAccommodation'], 2, '.', ','); ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- RIGHT -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Total Business Trip</label>
                                                            </th>
                                                            <td>
                                                                : <?= number_format($dataReport['dataHeaderTwo']['totalBusinessTrip'], 2, '.', ','); ?>
                                                            </td>
                                                        </tr>
                                                    </table>
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