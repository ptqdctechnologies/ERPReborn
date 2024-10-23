@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProject')
@include('getFunction.getProducts')
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
        
        <form id="modifyBudgetForm" method="post" enctype="multipart/form-data" action="{{ route('Budget.PreviewModifyBudget') }}">
        @csrf
            <input type="hidden" id="hiddenBudgetData" name="hiddenBudgetData" value="">
            <input type="hidden" id="budgetDetailsData" name="budgetDetailsData" />
            <input type="hidden" id="modifyBudgetListData" name="modifyBudgetListData" />

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

                                <div class="card-body">
                                    @include('Budget.Budget.Functions.Header.HeaderModifyBudget')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ADD NEW MODIFY BUDGET -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Add Modify Budget
                                        <!-- Add New AFE (Approval For Expenditure) -->
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="py-3" >
                                        <!-- REASON FOR MODIFY -->
                                        <div class="row" style="margin-bottom: 1rem;">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <label for="reason_modify" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Reason for Modify</label>
                                                    <div class="col-sm-9 col-md-8 col-lg-7 p-0">
                                                        <div class="input-group">
                                                            <input id="reason_modify" style="border-radius:0;" class="form-control" name="reason_modify" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ADDITIONAL CO -->
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Additional CO</label>
                                                    <div class="col-sm-9 col-md-8 col-lg-7 p-0" style="display: flex; gap: 16px;">
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
                                        <div id="currency_field" class="row" style="margin-bottom: 1rem; display: none; margin-top: 1rem;">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <label for="currency_popup" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Currency</label>
                                                    <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                        <div>
                                                            <input id="currency_id" hidden name="currency_id">
                                                            <input id="currency_symbol" style="border-radius:0; width: 40px;" class="form-control" name="currency_symbol" readonly>
                                                        </div>
                                                        <div>
                                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                                <a href="#" id="currency_popup" data-toggle="modal" data-target="#myCurrency" class="myCurrency">
                                                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                                                </a>
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

                                        <!-- EXCHANGE RATE -->
                                        <div id="exchange_rate_field" class="row" style="margin-bottom: 1rem; display: none;">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <label for="exchange_rate" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Exchange Rate</label>
                                                    <div class="col-sm-9 col-md-8 col-lg-2 p-0">
                                                        <div class="input-group">
                                                            <input id="exchange_rate" style="border-radius:0;" class="form-control" name="exchange_rate" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- VALUE CO -->
                                        <div id="value_co_field" class="row" style="margin-bottom: 1rem; display: none;">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <label for="value_co" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Value CO(+/-)</label>
                                                    <div class="col-sm-9 col-md-8 col-lg-2 p-0">
                                                        <div class="input-group" data-toggle="tooltip" data-placement="top" title="Pesan">
                                                            <input id="value_co" style="border-radius:0;" class="form-control number-only" name="value_co" autocomplete="off">
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
                                    <div class="row pt-3">
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <div class="col p-0">
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
                                <div class="wrapper-budget table-responsive card-body p-0 table-existing-budget">
                                    <table id="budgetTable" class="table table-head-fixed text-wrap table-sm">
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
                                                <th class="container-thead-tr-budget">Modify (+/-)</th>
                                                <th class="container-thead-tr-budget">Price</th>
                                                <th class="container-thead-tr-budget">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                                    
                                    <!-- CONTENT FORM -->
                                    <div id="formAddNewItem">
                                        <!-- PRODUCT ID -->
                                        <div id="newItemForm" class="row" style="gap: 15px; margin-bottom: 1rem; display: none;">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <label for="products_popup" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Product</label>
                                                    <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                        <div>
                                                            <input id="products_id" hidden name="products_id">
                                                            <input id="products_id_show" style="border-radius:0; width: 105px;" class="form-control" name="products_id_show" readonly>
                                                        </div>
                                                        <div>
                                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                                <a href="#" id="products_popup" data-toggle="modal" data-target="#myProducts" class="myProducts"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                            </span>
                                                        </div>
                                                        <div style="flex: 100%;">
                                                            <div class="input-group">
                                                                <input id="products_name" style="border-radius:0;" name="products_name" class="form-control" readonly>
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
                                                    <label for="qty" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Qty</label>
                                                    <div class="col-sm-9 col-md-8 col-lg-2 p-0">
                                                        <input id="qty" style="border-radius:0;" class="form-control number-only" name="qty" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- PRICE -->
                                        <div id="newItemFormThree" class="row" style="gap: 15px; margin-bottom: 1rem; display: none;">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <label for="price" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Price</label>
                                                    <div class="col-sm-9 col-md-8 col-lg-2 p-0">
                                                        <div class="input-group">
                                                            <input id="price" style="border-radius:0;" class="form-control number-only" name="price" autocomplete="off">
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
                                                    <div class="col-sm-9 col-md-8 col-lg-2 p-0">
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
                                                    <div class="col-sm-9 col-md-8 col-lg-7 p-0 d-flex justify-content-end">
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
                                <div class="wrapper-budget card-body table-bordered table-responsive p-0 table-existing-budget">
                                    <table id="listBudgetTable" class="table table-head-fixed text-wrap table-sm">
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
                                                <th class="container-thead-tr-budget">Modify (+/-)</th>
                                                <th class="container-thead-tr-budget">Price</th>
                                                <th class="container-thead-tr-budget">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
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
                            <!-- <button class="btn btn-default btn-sm button-submit" id="submitButton" type="submit" disabled> -->
                            <button class="btn btn-default btn-sm button-submit" id="submitButton" type="submit">
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