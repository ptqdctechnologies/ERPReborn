@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getInvoice')
@include('Finance.Invoice.Functions.PopUp.PopUpInvoiceRevision')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Revision Invoice
          </label>
        </div>
      </div>

      @include('Finance.Invoice.Functions.Menu.MenuInvoice')

      @if($var == 0)
      <div class="card">

        <input type="hidden" name="DocumentTypeID" id="DocumentTypeID" value="<?= $documentType_RefID; ?>">
        <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID">

        <!-- INVOICE -->
        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    Invoice
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                <!-- BODY -->
                <div class="card-body">
                  <div class="row py-3" style="gap: 15px;">
                    <!-- LEFT -->
                    <div class="col-md-12 col-lg-5">
                      <!-- BUDGET -->
                      <div class="row">
                        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Budget Code</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <span class="input-group-text form-control" style="border-radius:0;">
                              <a href="javascript:;" id="budget_trigger" data-toggle="modal" data-target="#myProjectSecond" style="display: block; cursor: pointer;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box">
                              </a>

                              <div id="budget_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                              </div>
                            </span>
                          </div>
                          <div>
                            <div class="input-group">
                              <input id="budget_number" class="form-control" readonly style="border-radius:0; background-color: white; cursor: default;">
                              <input id="budget_id" name="budget_id" style="border-radius:0;" class="form-control" hidden>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row" id="budget_message" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div class="text-red">
                            Budget Code cannot be empty.
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="col-md-12 col-lg-5">
                      <!-- CUSTOMER -->
                      <div class="row">
                        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Customer</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <div class="input-group">
                              <input id="invoice_partner_number" style="border-radius:0;" class="form-control" readonly>
                              <input id="invoice_partner_id" name="invoice_partner_id" style="border-radius:0;" class="form-control" hidden>
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

        <!-- INVOICE DETAILS -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    Invoice Details
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                <!-- BODY -->
                <div class="wrapper-budget card-body table-responsive p-0" style="height: 227px; border-bottom: 1px solid #e9ecef;">
                  <table class="table table-head-fixed text-nowrap table-sm" id="invoice_details_table">
                    <thead>
                      <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;width: 20%;">Sub Budget</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;width: 17%;">CO</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;width: 17%;">Prev. Progress</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;width: 17%;">Acc. Invoice</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;width: 17%;">Outs. CO</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;width: 17%;">Curr. Progress</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;width: 17%;">Curr. Invoice</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;width: 18%;">Balance CO</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 12%;padding-right: 5px !important;">Progress (%)</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 12%;padding-right: 5px !important;">Invoice Value</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                      <tr id="invoice_loading_table" style="display: none;">
                        <td colspan="5" class="p-0" style="border: 0px; height: 150px;">
                          <div class="d-flex flex-column justify-content-center align-items-center py-3">
                            <div class="spinner-border" role="status">
                              <span class="sr-only">Loading...</span>
                            </div>
                            <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                              Loading...
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <!-- FOOTER -->
                <div class="card-body">
                  <div class="row my-2">
                    <div class="col">
                      <div class="row text-red" id="invoice_details_message" style="display: none; margin-bottom: 1rem; margin-left: auto;">
                        Please input at least one item.
                      </div>
                      <div class="row d-flex" style="gap: 5%; margin-left: auto;">
                        <div class="d-flex" style="gap: 8px; margin-bottom: 1rem;">
                          <label>VAT</label>
                          <select type="text" id="ppn" class="form-control" name="ppn" onchange="onChangeVAT(this)" style="border-radius:0;width:auto;">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                          </select>
                        </div>
                        <div id="invoice_vat_percentage" style="gap: 8px; margin-bottom: 1rem; display: none;">
                          <input hidden id="vatOptionValue" style="width: 20%;" />
                          <label>VAT (%)</label>
                          <select name="vatValue" id="vatOption" style="border-radius:0;width:auto;" class="form-control" onChange="calculateTotal();">
                            <option>0%</option>
                            <option>10%</option>
                            <option>11%</option>
                            <option>12%</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col" style="font-size: 0.77rem; color: #212529; font-weight: 600;">
                      <div id="invoice_details_total" class="col text-right" style="margin-bottom: 0.6rem;">
                        Total Invoice: 0.00
                      </div>
                      <div id="invoice_details_vat" class="col text-right" style="margin-bottom: 0.6rem;">
                        Total VAT: 0.00
                      </div>
                    </div>
                  </div>

                  <hr class="m-0" />

                  <div class="row my-2">
                    <div class="col"></div>
                    <div class="col" style="font-size: 0.77rem; color: #212529; font-weight: 600;">
                      <div id="invoice_details_total" class="col text-right" style="margin-top: 0.6rem;">
                        Grand Total: 0.00
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- REMARK -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label for="remark" class="card-title">
                    Remarks
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section Remark">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                <!-- CONTENT -->
                <div class="card-body">
                  <div class="row py-3">
                    <div class="col p-0">
                      <textarea name="remarks" id="remarks" class="form-control"></textarea>
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
                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
              </button>

              <a onclick="cancelForm('{{ route('Invoice.index', ['var' => 1]) }}')" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Purchase Order List Cart"> Cancel
              </a>
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Finance.Invoice.Functions.Footer.FooterRevisionInvoice')
@endsection