@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('Documents.Functions.PopUp.SearchCheckDocument')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <input type="hidden" id="sourceData" value="{{ $sourceData }}">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Check Document on Process
          </label>
        </div>
      </div>

      @include('Documents.Functions.Menu.MenuCheckDocument')

      <?php if ($var == 1) { ?>
      <div class="card" style="position:relative;bottom:10px;">
        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
          <!-- BUTTON VIEW DOCUMENT TRANSACTION -->
          {{-- <div class="row">
            <div class="card ViewDocument" style="background-color:#e9ecef;border:1px solid #ced4da;margin-left:10px;">
              <a class="btn btn-default btn-sm">
                View Document Transaction
              </a>
            </div>
          </div> --}}

          <div class="row">
            {{-- @include('Documents.Transactions.DocumentWorkflow') --}}

            <!-- HEADER -->
            <div class="col-12 ShowDocumentList">
              <div class="card">
                <!-- TITLE -->
                <div class="card-header">
                  <h3 class="text-bold text-center text-uppercase">
                    <?= $transactionType; ?>
                  </h3>
                </div>

                <!-- CONTENT -->
                <?php if (isset($components['detail'])) { ?>
                  <div class="card-body">
                    <div class="row" style="margin: .6rem 0rem; gap: 1rem; line-height: normal;">
                      @include($components['detail'])
                    </div>
                  </div>
                <?php } ?>

                <?php if (isset($components['customDetail'])) { ?>
                  @include($components['customDetail'])
                <?php } ?>
              </div>
            </div>

            <!-- TABLE HEADER LOG HISTORY -->
            <?php if (isset($components['headerRevision']) && $dataHeader['dateUpdate']) { ?>
              <div class="col-12 ShowDocumentList">
                <div class="card">
                  <div class="card-body p-0">
                    @include($components['headerRevision'])
                  </div>
                </div>
              </div>
            <?php } ?>

            <!-- TABLE DOC TRACKING & LOG HISTORY -->
            <div class="col-12 ShowDocumentList">
              <div class="card">
                <div class="card-body p-0">
                  <?php if (!$dataHeader['dateUpdate']) { ?>
                    @include($components['table'])
                  <?php } else { ?>
                    @include($components['revision'])
                  <?php } ?>
                </div>
              </div>
            </div>

            <!-- ADDITIONAL -->
            <?php if (isset($components['additional'])) { ?>
              <div class="col-12 ShowDocumentList">
                <div class="card">
                  @include($components['additional'])
                </div>
              </div>
            <?php } ?>

            <!-- TEXT AREA FIELD (Remarks, Reason To Travel) -->
            <?php if (isset($textAreaFields) && !$dataHeader['dateUpdate']) { ?>
              <div class="col-12 ShowDocumentList">
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
            <?php } ?>

            <!-- APPROVAL HISTORY -->
            <div class="col-12 ShowDocumentList">
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
                  <div class="row text-bold" style="margin-top: .7rem; gap: 1rem;">
                    Last Status : 
                      @if(isset($dataWorkFlows))
                        @if($statusDocument == 0)
                          Waiting {{ $dataWorkFlows[count($dataWorkFlows)-1]['workFlowPathActionName'] }} from {{ $dataWorkFlows[count($dataWorkFlows)-1]['nextApproverEntityName'] }}
                        @elseif($statusDocument == 1)
                          Final Approved
                        @elseif($statusDocument == 2)
                          Document Doesn't Has Workflow
                        @endif
                      @endif
                  </div>
                  <div class="row" style="margin-top: .7rem; gap: 1rem;">
                    @include('Components.ApprovalHistory')
                  </div>
                </div>
              </div>
            </div>

            <!-- BUTTON APPROVAL -->
            <div class="col-12 text-right">
              <!-- CANCEL -->
              <a href="/CheckDocument?var=1" class="btn btn-default btn-sm" style="background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('images/Icon/Pagination/Previous-300-32.png') }}" width="13" alt="" title="Cancel"> Cancel
              </a>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Documents.Functions.Footer.FooterCheckDocument')
@endsection