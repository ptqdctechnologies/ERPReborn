@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProjects')
@include('getFunction.getSites')
@include('getFunction.getCurrencies')
@include('getFunction.getProductss')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Modify Budget
                    </label>
                </div>
            </div>

            @include('Budget.Budget.Functions.Menu.MenuModifyBudget')

            @if($var == 0)
            <form id="modifyBudgetForm" method="post" enctype="multipart/form-data" action="{{ route('Budget.PreviewModifyBudget') }}">
                @csrf
                <input hidden id="budgetDetailsData" name="budgetDetailsData" />
                <input hidden id="modifyBudgetListData" name="modifyBudgetListData" />
                <input hidden id="totalModifyFooterData" name="totalModifyFooterData" />
                <input hidden id="totalPriceFooterData" name="totalPriceFooterData" />
                <input hidden id="totalAmountFooterData" name="totalAmountFooterData" />
                
                <!-- CONTENT -->
                <div class="card">
                    <!-- ADD BUDGET & SUB BUDGET CODE -->
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Add Budget & Sub Budget Code
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section Budget Information">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    @include('Budget.Budget.Functions.Header.HeaderModifyBudget')
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ADD MODIFY BUDGET -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Add Modify Budget
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section Budget Information">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    @include('Budget.Budget.Functions.Header.HeaderModifyBudgetDetail')
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ATTACHMENT -->
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
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section Attachment">
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

                    <!-- BUDGET DETAILS -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Budget Details
                                        </label>
                                        <div class="card-tools d-flex" style="margin-left: -50px !important;">
                                            <div>
                                                <input id="budget_detail_search" style="border-radius: 4px;" class="form-control" name="budget_detail_search" autocomplete="off" placeholder="Search Product">
                                            </div>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section Attachment">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
                                        <table id="budgetTable" class="table table-head-fixed text-wrap table-sm">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Balance Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty (+/-)</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
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
                                        </div>

                                        <!-- CONTENT FORM -->
                                        <div id="formAddNewItem">
                                            <!-- PRODUCT ID -->
                                            <div id="newItemForm" class="row" style="gap: 15px; margin-bottom: 1rem; display: none;">
                                                <div class="col-lg-5">
                                                    <div class="row">
                                                        <label for="products_popup" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Product</label>
                                                        <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                                                            <div>
                                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                                    <a href="javascript:;" id="products_popup" data-toggle="modal" data-target="#myProductss" class="myProducts">
                                                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                                                    </a>
                                                                </span>
                                                            </div>
                                                            <div style="flex: 100%;">
                                                                <div class="input-group">
                                                                    <input id="products_name" style="border-radius:0;" name="products_name" class="form-control" readonly>
                                                                    <input id="products_id_show" name="products_id_show" hidden>
                                                                    <input id="products_id" hidden name="products_id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- QTY -->
                                            <div id="newItemFormTwo" class="row" style="gap: 15px; margin-bottom: 1rem; display: none;">
                                                <div class="col-lg-5">
                                                    <div class="row">
                                                        <label for="qty_form" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Qty (+/-)</label>
                                                        <div class="col-sm-9 col-md-8 col-lg-5 p-0">
                                                            <div class="input-group">
                                                                <input id="qty_form" style="border-radius:0;" class="form-control number-only" name="qty_form" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- PRICE -->
                                            <div id="newItemFormThree" class="row" style="gap: 15px; margin-bottom: 1rem; display: none;">
                                                <div class="col-lg-5">
                                                    <div class="row">
                                                        <label for="price_form" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Price</label>
                                                        <div class="col-sm-9 col-md-8 col-lg-5 p-0">
                                                            <div class="input-group">
                                                                <input id="price_form" style="border-radius:0;" class="form-control number-without-negative" name="price_form" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- TOTAL -->
                                            <div id="newItemFormFour" class="row" style="gap: 15px; margin-bottom: 1rem; display: none;">
                                                <div class="col-lg-5">
                                                    <div class="row">
                                                        <label for="total_qty_price" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Total</label>
                                                        <div class="col-sm-9 col-md-8 col-lg-5 p-0">
                                                            <div class="input-group">
                                                                <input id="total_qty_price" style="border-radius:0;" class="form-control number-only" name="total_qty_price" autocomplete="off" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- BUTTON -->
                                            <div id="buttonItemForm" class="row" style="gap: 15px; margin-bottom: 1rem; display: none;">
                                                <div class="col-lg-5">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                                                        <div class="col-sm-9 col-md-8 col-lg-5 p-0 d-flex justify-content-end">
                                                            <a id="addToCartNewFormItem" class="btn btn-default btn-sm" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                                                Add to Cart
                                                            </a>
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

                    <!-- MODIFY BUDGET LIST (CART) -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Modify Budget List (cart)
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section Budget Information">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- MODIFY BUDGET LIST TABLE -->
                                    <div class="wrapper-budget card-body table-bordered table-responsive p-0" style="height: 230px;">
                                        <table id="listBudgetTable" class="table table-head-fixed text-wrap table-sm">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Id</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Balance Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty (+/-)</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="8" style="text-align: left; padding-top: 10px; padding-bottom: 10px;border: 1px solid #e9ecef;">GRAND TOTAL</th>
                                                    <th id="totalModifyFooter" style="text-align: center; padding-top: 10px; padding-bottom: 10px;border: 1px solid #e9ecef;">0</th>
                                                    <th id="totalPriceFooter" style="text-align: center; padding-top: 10px; padding-bottom: 10px;border: 1px solid #e9ecef;">0</th>
                                                    <th id="totalAmountFooter" style="text-align: center; padding-top: 10px; padding-bottom: 10px;border: 1px solid #e9ecef;">0</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BUTTON -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col">
                                <button type="submit" id="submitButton" class="btn btn-default btn-sm float-right" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" /> Submit
                                </button>

                                <button type="button" id="cancelButton" class="btn btn-default btn-sm float-right">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" /> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Budget.Budget.Functions.Footer.footerModifyBudget')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css-page/ModifyBudget.css') }}">
@endpush