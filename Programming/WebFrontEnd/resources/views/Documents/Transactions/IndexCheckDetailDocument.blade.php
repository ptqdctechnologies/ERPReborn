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
            <form 
              method="post" 
              action="{{ $title == 'ADVANCE FORM' ? route('AdvanceRequest.RevisionAdvanceIndex') : route('DeliveryOrder.RevisionDeliveryOrderIndex') }}" 
              id="FormSubmitRevision">
              @csrf

              @if ($title == 'ADVANCE FORM')
                <input type="hidden" id="refID" name="advance_RefID" value="76000000000539" class="form-control" style="border-radius:0;">
              @else
                <input type="hidden" id="refID" name="do_RefID" value="{{ $dataHeader[0]['DeliveryOrder_ID'] ?? '180000000000048' }}" class="form-control" style="border-radius:0;">
              @endif
            </form>

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
                    <?php } else if ($title ===  "DELIVERY ORDER FORM") { ?>
                      @include('Components.DeliveryOrderDetailDocument')
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- DETAIL -->
            <div class="col-12">
              <div class="card">
                <div class="card-body p-0">
                  <?php if ($title === "ADVANCE FORM") { ?>
                    @include('Components.AdvanceDetailDocumentTable')
                  <?php } else if ($title === "DELIVERY ORDER FORM") { ?>
                    @include('Components.DeliveryOrderDetailDocumentTable')
                  <?php } ?>
                </div>
              </div>
            </div>

            <!-- REMARK -->
            <div class="col-12">
              <div class="card">
                <!-- TITLE -->
                <div class="card-header">
                  <label class="card-title">
                    Remark
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
                      @include('Components.Remark')
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
                    @include('Components.ApprovalHistory')
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