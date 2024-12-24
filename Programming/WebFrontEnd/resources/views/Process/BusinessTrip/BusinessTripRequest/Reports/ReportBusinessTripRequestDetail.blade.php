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
                                                                : BRF-24000203
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Budget</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataDetails']['general']['budget']['combinedBudgetCodeList'][0] . " - " . $dataReport['dataDetails']['general']['budget']['combinedBudgetNameList'][0]; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Sub Budget</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataDetails']['general']['budget']['combinedBudgetSectionCodeList'][0] . " - " . $dataReport['dataDetails']['general']['budget']['combinedBudgetSectionNameList'][0]; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Product</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataDetails']['details']['itemList'][0]['entities']['product_RefID']; ?>
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
                                                                <label style="margin-right: 1rem; white-space: nowrap;">Date Commance Travel</label>
                                                            </th>
                                                            <td>
                                                                : 2024-12-18
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Date End Travel</label>
                                                            </th>
                                                            <td>
                                                                : 2024-12-20
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Date BRF</label>
                                                            </th>
                                                            <td>
                                                                : 2024-12-12
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Contact Phone</label>
                                                            </th>
                                                            <td>
                                                                : 0896734873
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem; ">Bank Account</label>
                                                            </th>
                                                            <td style="line-height: 16px;">
                                                                : (<?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAcronym']; ?>) <?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountNumber']; ?> - <?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountName']; ?>
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
                                                                : <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['requesterWorkerFullName'] ?? '-'; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Beneficiary</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['beneficiaryWorkerFullName'] ?? '-'; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Departing From</label>
                                                            </th>
                                                            <td>
                                                                : Jakarta
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Destination To</label>
                                                            </th>
                                                            <td>
                                                                : Batam
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
                                                                : 3,450,000.00
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Total Payment</label>
                                                            </th>
                                                            <td>
                                                                : 3,890,000.00
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
                                                                : 0.00
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
                                                                : 3,890,000.00
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
                                            <label class="text-bold" style="margin-right: 1rem;">Reason To Travel</label>
                                            <div class="mt-1" style="line-height: 16px;">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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