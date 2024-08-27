@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProject')
@include('getFunction.getProduct')
@include('getFunction.getCurrency')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITTLE -->
            <div class="row mb-1 title-pages">
                <div class="col-sm-6 title">
                    Modify Budget
                </div>
            </div>
        
        <form method="post" enctype="multipart/form-data" action="{{ route('Budget.PreviewModifyBudget') }}">
        @csrf
            <!-- CONTENT -->
            <div class="card">
                <!-- Add New Advance Request -->
                <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Add Budget & Sub Budget Code
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body py-3">
                                    @include('Budget.Budget.Functions.Header.HeaderModifyBudget')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ADD NEW AFE (APPROVAL FOR EXPENDITURE) -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Add New AFE (Approval For Expenditure)
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body py-3">
                                    <!-- =====REASON FOR MODIFY===== -->
                                    <div class="row" style="margin-bottom: 1rem;">
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <label for="reason_modify" class="col-4 col-form-label p-0">Reason for Modify</label>
                                                <div class="col p-0">
                                                    <div class="input-group">
                                                        <input id="reason_modify" style="border-radius:0;" class="form-control" name="reason_modify" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- =====ADDITIONAL CO===== -->
                                    <div class="row" style="margin-bottom: 1rem;">
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <label class="col-4 col-form-label p-0">Additional CO</label>
                                                <div class="col p-0" style="display: flex; gap: 16px;">
                                                    <div>
                                                        <input type="radio" name="additional_co" value="yes">
                                                        <label>Yes</label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" name="additional_co" value="no">
                                                        <label>No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- CURRENCY -->
                                    <div id="currency_field" class="row" style="margin-bottom: 1rem; display: none;">
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <label for="currency_popup" class="col-4 col-form-label p-0">Currency</label>
                                                <div class="col d-flex p-0">
                                                    <div>
                                                        <input id="currency_id" hidden name="currency_id">
                                                        <input id="currency_symbol" style="border-radius:0;" class="form-control" name="currency_symbol" readonly>
                                                    </div>
                                                    <div>
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#" id="currency_popup" data-toggle="modal" data-target="#myCurrency" class="myCurrency"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                        </span>
                                                    </div>
                                                    <div style="flex: 100%;">
                                                        <div class="input-group">
                                                            <input id="currency_name" style="border-radius:0;" name="currency_name" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- IDR RATE -->
                                    <div id="value_idr_rate_field" class="row" style="margin-bottom: 1rem; display: none;">
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <label for="value_idr_rate" class="col-4 col-form-label p-0">IDR Rate</label>
                                                <div class="col p-0">
                                                    <div class="input-group">
                                                        <input id="value_idr_rate" style="border-radius:0;" class="form-control number-only" name="value_idr_rate" autocomplete="off" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- VALUE CO ADDITIONAL -->
                                    <div id="value_co_additional_field" class="row" style="margin-bottom: 1rem; display: none;">
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <label for="value_co_additional" class="col-4 col-form-label p-0">Value CO Additional</label>
                                                <div class="col p-0">
                                                    <div class="input-group">
                                                        <input id="value_co_additional" style="border-radius:0;" class="form-control number-only" name="value_co_additional" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- VALUE CO DEDUCTIVE -->
                                    <div id="value_co_deductive_field" class="row" style="margin-bottom: 1rem; display: none;">
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <label for="value_co_deductive" class="col-4 col-form-label p-0">Value CO Deductive</label>
                                                <div class="col p-0">
                                                    <div class="input-group">
                                                        <input id="value_co_deductive" style="border-radius:0;" class="form-control number-only" name="value_co_deductive" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

                                <div class="card-body py-3">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <label class="col-4 col-form-label p-0">Select a File</label>
                                                <div class="col p-0">
                                                    <div class="custom-file">
                                                        <div id="hidden_inputs"></div>
                                                        <input type="file" id="attachment_file" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 1rem;">
                                        <div class="col-lg-12 p-0">
                                            <div class="card m-0">
                                                <!-- /.card-header -->
                                                <div class="table-responsive p-0">
                                                    <table class="table table-bordered table-hover text-nowrap" id="file_table" style="margin-bottom: 0; display: none;">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2" style="vertical-align:middle;">No</th>
                                                                <th rowspan="2" style="vertical-align:middle;">File Name</th>
                                                                <th rowspan="2" style="vertical-align:middle;">Size</th>
                                                                <th rowspan="2" style="vertical-align:middle;">Upload Date & Time</th>
                                                                <th colspan="2" style="vertical-align:middle; text-align: center;">
                                                                    Action
                                                                    <tr>
                                                                        <th style="vertical-align:middle;">Preview</th>
                                                                        <th style="vertical-align:middle;">Delete</th>
                                                                    </tr>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="file_list">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BUDGET DETAILS -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
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

                                <!-- BUDGET DETAILS TABLE -->
                                <div class="wrapper-budget card-body table-responsive p-0 table-existing-budget">
                                    <table id="budgetTable" class="table table-head-fixed text-nowrap table-sm">
                                        <thead>
                                            <tr>
                                                <th class="container-thead-tr-budget">Product Id</th>
                                                <th class="container-thead-tr-budget">Product Name</th>
                                                <th class="container-thead-tr-budget">Qty Budget</th>
                                                <th class="container-thead-tr-budget">Qty Avail</th>
                                                <th class="container-thead-tr-budget">Price</th>
                                                <th class="container-thead-tr-budget">Currency</th>
                                                <th class="container-thead-tr-budget">Balance Budget</th>
                                                <th class="container-thead-tr-budget">Total Budget</th>
                                                <th class="sticky-col sixth-col-modify-budget container-thead-tr-fixed-budget">Qty Additional</th>
                                                <th class="sticky-col fifth-col-modify-budget container-thead-tr-fixed-budget">Price Additional</th>
                                                <th class="sticky-col forth-col-modify-budget container-thead-tr-fixed-budget">Total Additional</th>
                                                <th class="sticky-col third-col-modify-budget container-thead-tr-fixed-budget">Qty Saving</th>
                                                <th class="sticky-col second-col-modify-budget container-thead-tr-fixed-budget">Price Saving</th>
                                                <th class="sticky-col first-col-modify-budget container-thead-tr-fixed-budget">Total Saving</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="container-tbody-tr-budget">
                                                    1
                                                </td>
                                                <td class="container-tbody-tr-budget">
                                                    PLN - Biaya Penyambungan
                                                </td>
                                                <td class="container-tbody-tr-budget">
                                                    1.00
                                                </td>
                                                <td class="container-tbody-tr-budget">
                                                    -,194.64
                                                </td>
                                                <td class="container-tbody-tr-budget">
                                                    38,878,545.00
                                                </td>
                                                <td class="container-tbody-tr-budget">
                                                    IDR
                                                </td>
                                                <td class="container-tbody-tr-budget">
                                                    200,000.00
                                                </td>
                                                <td class="container-tbody-tr-budget">
                                                    500,000.00
                                                </td>
                                                <td class="sticky-col sixth-col-modify-budget container-tbody-tr-fixed-budget">
                                                    <input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_additional" name="qty_additional">
                                                </td>
                                                <td class="sticky-col fifth-col-modify-budget container-tbody-tr-fixed-budget">
                                                    <input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_additional" name="price_additional">
                                                </td>
                                                <td class="sticky-col forth-col-modify-budget container-tbody-tr-fixed-budget">
                                                    <input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_additional" name="total_additional" disabled>
                                                </td>
                                                <td class="sticky-col third-col-modify-budget container-tbody-tr-fixed-budget">
                                                    <input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_saving" name="qty_saving">
                                                </td>
                                                <td class="sticky-col second-col-modify-budget container-tbody-tr-fixed-budget">
                                                    <input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_saving" name="price_saving">
                                                </td>
                                                <td class="sticky-col first-col-modify-budget container-tbody-tr-fixed-budget">
                                                    <input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_saving" name="total_saving" disabled>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- ADD TO CART -->
                                <div class="card-body py-0">
                                    <div class="row py-3 d-flex justify-content-end">
                                        <a id="buttonBudgetDetails" class="btn btn-default btn-sm button-submit">
                                            <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" />
                                            <div>Add to Cart</div>
                                        </a>
                                    </div>
                                </div>

                                <!-- ADD NEW ITEM FORM -->
                                <div id="budgetForm" class="card-body py-0">
                                    <!-- BUTTON ADD NEW ITEM -->
                                    <div class="row pb-3">
                                        <a id="addNewItemBtn" class="btn btn-default btn-sm button-submit">
                                            <i class="fas fa-plus-circle"></i>
                                            Add New Item
                                        </a>
                                        
                                        <!-- <button id="addNewItemBtn" class="btn btn-default btn-sm button-submit" type="submit">
                                            <i class="fas fa-plus-circle"></i>
                                            <div>Add New Item</div>
                                        </button> -->
                                    </div>

                                    <!-- CONTENT -->
                                    <div id="formAddNewItem">
                                        <div id="newItemForm" class="row" style="gap: 15px; margin-bottom: 1rem; display: none;">
                                            <div class="col-sm-12 cold-md-12 col-lg-3">
                                                <div class="row">
                                                    <label for="product_id" class="col-4 col-form-label p-0">Product ID</label>
                                                    <div class="col p-0">
                                                        <input id="product_id" style="border-radius:0;" class="form-control" name="product_id" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 cold-md-12 col-lg-3">
                                                <div class="row">
                                                    <label for="product_name" class="col-4 col-form-label p-0">Product Name</label>
                                                    <div class="col p-0">
                                                        <input id="product_name" style="border-radius:0;" class="form-control" name="product_name" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="newItemFormTwo" class="row" style="gap: 15px; margin-bottom: 1rem; display: none;">
                                            <div class="col-sm-12 cold-md-12 col-lg-3">
                                                <div class="row">
                                                    <label for="qty" class="col-4 col-form-label p-0">Qty</label>
                                                    <div class="col p-0">
                                                        <input id="qty" style="border-radius:0;" class="form-control number-only" name="qty" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 cold-md-12 col-lg-3">
                                                <div class="row">
                                                    <label for="price" class="col-4 col-form-label p-0">Price</label>
                                                    <div class="col p-0">
                                                        <input id="price" style="border-radius:0;" class="form-control number-only" name="price" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="buttonItemForm" class="row" style="gap: 15px; margin-bottom: 1rem; display: none;">
                                            <div class="col-sm-12 cold-md-12 col-lg-3"></div>
                                            <div class="col-sm-12 cold-md-12 col-lg-3 p-0 d-flex justify-content-end">
                                                <a id="addToCartNewFormItem" class="btn btn-default btn-sm" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                                    Add to Cart
                                                </a>
                                                <!-- <button id="addToCartNewFormItem" class="btn btn-default btn-sm" type="button" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                                    Add to Cart
                                                </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODIFY BUDGET LIST (CART) -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Modify Budget List (cart)
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- MODIFY BUDGET LIST TABLE -->
                                <div class="wrapper-budget card-body table-responsive p-0 table-existing-budget">
                                    <table id="listBudgetTable" class="table table-head-fixed text-nowrap table-sm">
                                        <thead>
                                            <tr>
                                                <th class="container-thead-tr-budget">Product Id</th>
                                                <th class="container-thead-tr-budget">Product Name</th>
                                                <th class="container-thead-tr-budget">Qty Budget</th>
                                                <th class="container-thead-tr-budget">Qty Avail</th>
                                                <th class="container-thead-tr-budget">Price</th>
                                                <th class="container-thead-tr-budget">Currency</th>
                                                <th class="container-thead-tr-budget">Balance Budget</th>
                                                <th class="container-thead-tr-budget">Total Budget</th>
                                                <th class="container-thead-tr-budget">Qty Additional</th>
                                                <th class="container-thead-tr-budget">Price Additional</th>
                                                <th class="container-thead-tr-budget">Total Additional</th>
                                                <th class="container-thead-tr-budget">Qty Saving</th>
                                                <th class="container-thead-tr-budget">Price Saving</th>
                                                <th class="container-thead-tr-budget">Total Saving</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BUTTON SUBMIT OR CANCEL -->
                <div class="px-3 pb-2">
                    <div style="display: flex; justify-content: flex-end; gap: 8px;">
                        <div style="display: flex;">
                            <button class="btn btn-default btn-sm button-submit" id="cancelButton" type="button">
                                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" />
                                <div>Cancel</div>
                            </button>
                        </div>
                        <div style="display: flex;">
                            <button class="btn btn-default btn-sm button-submit" id="submitButton" type="submit" disabled>
                                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" />
                                <div>Submit</div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Budget.Budget.Functions.Footer.footerModifyBudget')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css-page/ModifyBudget.css') }}">
@endpush