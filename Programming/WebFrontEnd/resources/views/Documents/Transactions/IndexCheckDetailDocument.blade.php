@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Check Document on Process</label>
        </div>
      </div>
      
      <!-- CONTENT -->
      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">
            <input type="hidden" id="advanceRefID" name="advanceRefID" value="{{ $dataHeader[0]['Sys_ID_Advance'] }}" class="form-control" style="border-radius:0;">

            <!-- HEADER -->
            <div class="col-12">
              <div class="card">
                <!-- TITLE -->
                <div class="card-header">
                  <h3 class="text-bold text-center">
                    <?= $title; ?>
                  </h3>
                </div>

                <!-- CONTENT -->
                <div class="card-body">
                  <div class="row" style="margin: .6rem 0rem; gap: 1rem;">
                    <?php if ($title === "ADVANCE FORM") { ?>
                      @include('Components.AdvanceDetailDocument')
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- DETAIL -->
            <div class="col-12">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT ID</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT NAME</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UOM</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UNIT PRICE</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">TOTAL</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $no = 1; $grand_total = 0; ?>
                      <?php foreach ($dataHeader as $dataDetail) { ?>
                        <?php $grand_total += $dataDetail['PriceBaseCurrencyValue'];  ?>
                        <tr>
                          <td style="border:1px solid #4B586A;color:#4B586A;"><?= $no++; ?></td>
                          <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['Product_RefID']; ?></td>
                          <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['ProductName']; ?></td>
                          <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['Quantity']; ?></td>
                          <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['QuantityUnitName']; ?></td>
                          <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['ProductUnitPriceBaseCurrencyValue']; ?></td>
                          <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['PriceBaseCurrencyValue']; ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>

                    <tfoot>
                      <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="6">
                          GRAND TOTAL
                        </th>
                        <td style="border:1px solid #4B586A;color:#4B586A;">
                          <span id="GrandTotal">
                            <?= number_format($grand_total, 2, '.', ''); ?>
                          </span>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>

            <!-- INTERNAL NOTES -->
            <div class="col-12">
              <div class="card">
                <!-- TITLE -->
                <div class="card-header">
                  <label class="card-title">
                    Internal Notes
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                <!-- CONTENT -->
                <div class="card-body">
                  <div class="row" style="margin: .6rem 0rem;">
                    <div class="col">
                      <?= nl2br(e($dataHeader[0]['Remarks'])); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- BUTTON APPROVAL -->
            <div class="col-12 text-right" style="margin-bottom: 1rem;">
              <?php if ($statusApprover == "YES") { ?>
                <!-- APPROVE -->
                <a onclick="ApproveButton({{ $businessDocument_RefID }})" class="btn btn-default btn-sm" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right:10px;">
                  <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Approve"> Approve
                </a>

                <!-- REJECT -->
                <a onclick="RejectButton({{ $businessDocument_RefID }}, {{ $submitter_ID }})" class="btn btn-default btn-sm" style="background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Reject"> Reject
                </a>
              <?php } ?>

              <?php if ($statusApprover == "RESUBMIT") { ?>
                <!-- RESUBMIT -->
                <button class="btn btn-default btn-sm btn-resubmit" style="background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Resubmit" /> Resubmit
                </button>

                <!-- CANCEL -->
                <a href="/MyDocument" class="btn btn-default btn-sm" style="background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel"> Cancel
                </a>
              <?php } ?>
            </div>

            <!-- APPROVAL HISTORY -->
            <div class="col-12">
              <div class="card">
                <!-- TITLE -->
                <div class="card-header">
                  <label class="card-title">
                    Approval History
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                <!-- CONTENT -->
                <div class="card-body">
                  <div class="row" style="margin-top: .7rem; gap: 1rem;">
                    <div class="col">
                      <?php foreach ($dataWorkFlows as $dataWorkFlow) { ?>
                        <?php $comment = $dataWorkFlow['remarks'] == "undefined" || !$dataWorkFlow['remarks'] ? '-' : $dataWorkFlow['remarks']; ?>
                        <ul style="padding: 0 1rem;">
                          <li>
                            <div style="margin-bottom: .5rem;">
                              <span style="text-transform:uppercase;font-weight:bold;">
                                <?= $dataWorkFlow['workFlowPathActionName'] == "Rejection To Resubmit" ? "Reject" : $dataWorkFlow['workFlowPathActionName']; ?>
                              </span>
                              <?= date('D, m/d/Y H:m:s', strtotime($dataWorkFlow['approvalDateTimeTZ'])) ?> : <?= $dataWorkFlow['approverEntityName']; ?> (<?= $dataWorkFlow['approverEntityFullJobPositionTitle']; ?>)
                            </div>
                            <div>
                              Comment : <?= nl2br(e($comment)); ?>
                            </div>
                          </li>
                        </ul>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Documents.Functions.Footer.FooterApprovalDocument')
@endsection