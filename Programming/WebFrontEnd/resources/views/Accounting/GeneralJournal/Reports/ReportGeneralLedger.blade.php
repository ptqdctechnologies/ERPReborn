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
            <label style="font-size:15px;position:relative;top:7px;color:white;">
              Report General Ledger
            </label>
          </div>
        </div>

        <div class="card">
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row p-1" style="row-gap: 1rem;">
                      @include('Accounting.GeneralJournal.Functions.Header.HeaderGeneralLedger')
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12" style="margin-bottom: 1rem;">
                <div class="row" style="gap: 1rem;">
                  <!-- OPENING BALANCE -->
                  <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
                    <div class="p-3 d-flex align-items-center justify-content-between text-bold"
                      style="background-color: #e8f6e9; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                      <div>OPENING BALANCE</div>
                      <div class="d-flex align-items-center justify-content-center invisible"
                        style="background-color: #36AE7C; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">
                        0</div>
                    </div>
                    <hr class="m-0" style="background-color: #ced4da;" />
                    <div id="nominal_beginning_balance" class="p-3 text-bold" style="font-size: larger;">
                      IDR 0.00
                    </div>
                  </div>

                  <!-- TOTAL DEBIT -->
                  <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
                    <div class="p-3 d-flex align-items-center justify-content-between text-bold"
                      style="background-color: #ffebed; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                      <div>TOTAL DEBIT</div>
                      <div id="total_cash_out" class="d-flex align-items-center justify-content-center"
                        style="background-color: #EB5353; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">
                        0</div>
                    </div>
                    <hr class="m-0" style="background-color: #ced4da;" />
                    <div id="nominal_cash_out" class="p-3 text-bold" style="font-size: larger;">
                      IDR 0.00
                    </div>
                  </div>

                  <!-- TOTAL CREDIT -->
                  <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
                    <div class="p-3 d-flex align-items-center justify-content-between text-bold"
                      style="background-color: #e8eaf6; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                      <div>TOTAL CREDIT</div>
                      <div id="total_cash_in" class="d-flex align-items-center justify-content-center"
                        style="background-color: #187498; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">
                        0</div>
                    </div>
                    <hr class="m-0" style="background-color: #ced4da;" />
                    <div id="nominal_cash_in" class="p-3 text-bold" style="font-size: larger;">
                      IDR 0.00
                    </div>
                  </div>

                  <!-- CLOSING BALANCE -->
                  <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
                    <div class="p-3 d-flex align-items-center justify-content-between text-bold"
                      style="background-color: #e8f6e9; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                      <div>CLOSING BALANCE</div>
                      <div class="d-flex align-items-center justify-content-center invisible"
                        style="background-color: #F9D923; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">
                        0</div>
                    </div>
                    <hr class="m-0" style="background-color: #ced4da;" />
                    <div id="nominal_ending_balance" class="p-3 text-bold" style="font-size: larger;">
                      IDR 0.00
                    </div>
                  </div>

                  <!-- TOTAL ENTRIES -->
                  <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
                    <div class="p-3 d-flex align-items-center justify-content-between text-bold"
                      style="background-color: #e8f6e9; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                      <div>TOTAL ENTRIES</div>
                      <div class="d-flex align-items-center justify-content-center invisible"
                        style="background-color: #F9D923; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">
                        0</div>
                    </div>
                    <hr class="m-0" style="background-color: #ced4da;" />
                    <div id="nominal_ending_balance" class="p-3 text-bold" style="font-size: larger;">
                      IDR 0.00
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12" id="table_container">
                <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-head-fixed w-100" id="table_summary">
                        <thead>
                          <tr>
                            <th
                              style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                              No</th>
                            <th
                              style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                              Journal Number</th>
                            <th
                              style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                              Date</th>
                            <th
                              style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                              Description</th>
                            <th
                              style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                              Ref Doc</th>
                            <th
                              style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                              Debit (Rp)</th>
                            <th
                              style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                              Credit (Rp)</th>
                            <th
                              style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                              Balance (Rp)</th>
                          </tr>
                        </thead>
                      </table>
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

  @include('Accounting.GeneralJournal.Functions.Footer.FooterReportGeneralLedger')
  @include('Partials.footer')
@endsection