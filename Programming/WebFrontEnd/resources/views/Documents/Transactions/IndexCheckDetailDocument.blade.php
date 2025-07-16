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
            <form method="post" action="{{ route($resubmit['url']) }}" id="FormSubmitRevision">
              @csrf

              <input type="hidden" id="refID" name="{{ $resubmit['name'] }}" value="{{ $resubmit['value'] }}" class="form-control" style="border-radius:0;">
            </form>

            <!-- HEADER -->
            <div class="col-12">
              <div class="card">
                <!-- TITLE -->
                <div class="card-header">
                  <h3 class="text-bold text-center text-uppercase">
                    <?= $transactionType; ?>
                  </h3>
                </div>

                <!-- CONTENT -->
                <div class="card-body">
                  <div class="row" style="margin: .6rem 0rem; gap: 1rem;">
                    @include($components['detail'])
                  </div>
                </div>
              </div>
            </div>

            <!-- TABLE -->
            <div class="col-12">
              <div class="card">
                  @include($components['table'])
              </div>
            </div>

            <?php if (isset($components['additional'])) { ?>
              <div class="col-12">
                <div class="card">
                  @include($components['additional'])
                </div>
              </div>
            <?php } ?>

            <!-- TEXT AREA FIELD (Remarks, Reason To Travel) -->
            <div class="col-12">
              <div class="card">
                <!-- TITLE -->
                <div class="card-header">
                  <label class="card-title">
                    <?= $textAreaFields['title']; ?>
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
                      <?= nl2br(e($textAreaFields['text'])); ?>
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
                <a onclick="RejectButton({{ $businessDocument_RefID }}, {{ $dataWorkFlows[0]['approverEntity_RefID'] }})" class="btn btn-default btn-sm" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right:10px;">
                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Reject"> Reject
                </a>
              <?php } ?>

              <?php if ($statusApprover == "RESUBMIT") { ?>
                <!-- RESUBMIT -->
                <button class="btn btn-default btn-sm btn-resubmit" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right:10px;">
                  <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Resubmit" /> Resubmit
                </button>
              <?php } ?>

              <!-- CANCEL -->
              <a href="/MyDocument" class="btn btn-default btn-sm" style="background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('images/Icon/Pagination/Previous-300-32.png') }}" width="13" alt="" title="Cancel"> Cancel
              </a>
            </div>

            <!-- APPROVAL HISTORY -->
            <div class="col-12">
              <div class="card">
                <!-- TITLE -->
                <div class="card-header">
                  <label class="card-title">
                    Approval History - 
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

            <!-- COMMENT -->
            <div class="col-12">
              <div class="card">
                <!-- TITLE -->
                <div class="card-header">
                  <label class="card-title">
                    Comment
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                <!-- CONTENT -->
                <div class="card-body">
                  <div class="row" style="">
                    <textarea name="comment_approval" id="comment_approval" class="form-control"></textarea>
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