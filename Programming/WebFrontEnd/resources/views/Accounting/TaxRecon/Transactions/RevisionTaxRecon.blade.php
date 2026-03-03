@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('Accounting.TaxRecon.Functions.PopUp.PopUpTaxReconRevision')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Revision Tax Reconciliation
                    </label>
                </div>
            </div>

            @include('Accounting.TaxRecon.Functions.Menu.MenuTaxRecon')
            
            <!-- CONTENT -->
            <div class="card">
                <!-- TAX -->
                <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- TITLE -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Tax
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                @include('Accounting.TaxRecon.Functions.Header.HeaderRevisionTax')
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- TAX DETAILS -->
                <div class="tab-content px-3 pb-2 tax-components" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- TITLE -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Tax Details
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- BODY VAT -->
                                <?php if ($type === 'VAT') { ?>
                                    <div class="wrapper-budget card-body table-responsive p-0" id="vat-table" style="height: 230px;">
                                        <table class="table table-head-fixed text-nowrap table-sm" id="journal_details_table">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Add</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Transaction Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">VAT Type</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Transaction Type</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Name</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Tax Invoice Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Tax Based</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">VAT Rate</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">VAT Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- <tr>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        <input hidden data-budget-id="sys_ID" />
                                                        <input type="checkbox" aria-label="Checkbox for following text input" />
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        AP-23000091
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        IDR
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        In
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        Import
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        PT. X
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        1398902/10
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        02/03/2025
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        50,000,000.00
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        10%
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        5,000,000.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        <input hidden data-budget-id="sys_ID" />
                                                        <input type="checkbox" aria-label="Checkbox for following text input" />
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        AP-23000092
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        IDR
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        In
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        Domestic
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        PT. Y
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        129387012
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        03/03/2025
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        100,000,000.00
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        -
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        10,000,000.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        <input hidden data-budget-id="sys_ID" />
                                                        <input type="checkbox" aria-label="Checkbox for following text input" />
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        TREM-23000002
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        IDR
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        In
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        Import
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        PT. Z
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        837932881088782
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        04/03/2025
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        5,000,000.00
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        -
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        500,000.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        <input hidden data-budget-id="sys_ID" />
                                                        <input type="checkbox" aria-label="Checkbox for following text input" />
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        INV-23000002
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        IDR
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        Out
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        Domestic
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        PT. XY
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        P19283091829/09283
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        05/03/2025
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        1,000,000.00
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        -
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        100,000.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        <input hidden data-budget-id="sys_ID" />
                                                        <input type="checkbox" aria-label="Checkbox for following text input" />
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        DN-23000008
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        IDR
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        Out
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        Export
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        PT. Z
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        998783672
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        06/03/2025
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        1,000,000.00
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        -
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        100,000.00
                                                    </td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } ?>
                                
                                <?php if ($type === 'WHT') { ?>
                                    <!-- BODY WHT -->
                                    <div class="wrapper-budget card-body table-responsive p-0 wht-table" style="height: 230px;">
                                        <table class="table table-head-fixed text-nowrap table-sm" id="journal_details_table">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Add</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Transaction Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Tax Type</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Name</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Tax Based</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">WHT Rate</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">WHT Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- <tr>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        <input hidden data-budget-id="sys_ID" />
                                                        <input type="checkbox" aria-label="Checkbox for following text input" />
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        AP-23000091
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        IDR
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        WHT 23
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        PT. X
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        06/03/2025
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        50,000,000.00
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        2%
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        5,000,000.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        <input hidden data-budget-id="sys_ID" />
                                                        <input type="checkbox" aria-label="Checkbox for following text input" />
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        AP-23000092
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        IDR
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        WHT 42
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        PT. Y
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        07/03/2025
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        100,000,000.00
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        2.65%
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        10,000,000.00
                                                    </td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- FOOTER WHT -->
                                    <div class="card-body wht-table">
                                        <div class="row">
                                            <div class="col">
                                                <div class="text-red" id="budgetDetailsMessage" style="display: none;">
                                                    Please input at least one item.
                                                </div>
                                            </div>
                                            <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
                                                Total : <span id="TotalBudgetSelected">0.00</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if ($type === 'PREPAID WHT') { ?>
                                    <!-- BODY PREPAID WHT -->
                                    <div class="wrapper-budget card-body table-responsive p-0 prepaid-wht-table" style="height: 230px;">
                                        <table class="table table-head-fixed text-nowrap table-sm" id="journal_details_table">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Add</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Transaction Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Tax Type</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Name</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Tax Based</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">WHT Rate</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">WHT Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- <tr>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        <input hidden data-budget-id="sys_ID" />
                                                        <input type="checkbox" aria-label="Checkbox for following text input" />
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        INV-23000001
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        IDR
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        WHT 42
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        PT. XY
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        08/03/2025
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        1,000,000,000.00
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        2.65%
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        100,000,000.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        <input hidden data-budget-id="sys_ID" />
                                                        <input type="checkbox" aria-label="Checkbox for following text input" />
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        INV-23000002
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        IDR
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        WHT 42
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        PT. XYZ
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        09/03/2025
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        1,000,000,000.00
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        10%
                                                    </td>
                                                    <td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">
                                                        100,000,000.00
                                                    </td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- FOOTER PREPAID WHT -->
                                    <div class="card-body prepaid-wht-table">
                                        <div class="row">
                                            <div class="col">
                                                <div class="text-red" id="budgetDetailsMessage" style="display: none;">
                                                    Please input at least one item.
                                                </div>
                                            </div>
                                            <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
                                                Total : <span id="TotalBudgetSelected">0.00</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- BUTTON -->
                <div class="tab-content px-3 pb-2 tax-components" id="nav-tabContent">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Tax Recon"> 
                                <span id="submit-button-text">Submit</span>
                            </button>

                            <button type="button" class="btn btn-default btn-sm float-right" onclick="cancelForm('{{ route('TaxRecon.index', ['var' => 1]) }}')" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel to Tax Recon"> 
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Accounting.TaxRecon.Functions.Footer.FooterRevisionTaxRecon')
@include('Partials.footer')
@endsection