@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('Documents.Functions.PopUp.SearchCheckDocument')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Check Document on Process</label>
        </div>
      </div>

      <?php if ($statusHeader == "Yes") { ?>
        @include('Documents.Functions.Menu.MenuCheckDocument')
      <?php } ?>

      <?php if ($var == 1) { ?>
        <?php if ($statusHeader == "No") { ?>
        <div class="card">
        <?php } else if ($statusHeader == "Yes") { ?>
        <div class="card" style="position:relative;bottom:10px;">
        <?php } ?>
          <div class="tab-content p-3" id="nav-tabContent">
            <!-- BUTTON VIEW DOCUMENT TRANSACTION -->
            <div class="row">
              <div class="card ViewDocument" style="background-color:#e9ecef;border:1px solid #ced4da;margin-left:10px;">
                <a class="btn btn-default btn-sm">
                  View Document Transaction
                </a>
              </div>
            </div>

            <div class="row">
              @include('Documents.Transactions.DocumentWorkflow')

              <!-- DETAIL -->
              <div class="col-12 ShowDocumentList">
                <div class="card">
                  <!-- TITLE -->
                  <div class="card-header">
                    <h3 class="text-bold text-center text-uppercase">
                      <?= $dataHeader[0]['BusinessDocumentType_Name']; ?>
                    </h3>
                  </div>

                  <!-- CONTENT -->
                  <div class="card-body">
                    <div class="row" style="margin: .6rem 0rem; gap: 1rem;">
                      <?php if ($businessDocumentType_Name == "Advance Form") { ?>
                        @include('Components.AdvanceDetailDocument')
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>

              <!-- TABLE -->
              <div class="col-12 ShowDocumentList">
                <div class="card">
                  <div class="card-body p-0">
                    @include('Components.AdvanceDetailDocumentTable')
                  </div>
                </div>
              </div>

              <!-- REMARK -->
              <div class="col-12 ShowDocumentList">
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

              @include('Documents.Transactions.DocumentApprovalHistory')
            </div>

          </div>
        </div>
      <?php } ?>

    </div>
  </section>
</div>

@include('Partials.footer')
@include('Documents.Functions.Footer.FooterCheckDocument')
@include('Documents.Functions.Footer.FooterApprovalDocument')
@endsection