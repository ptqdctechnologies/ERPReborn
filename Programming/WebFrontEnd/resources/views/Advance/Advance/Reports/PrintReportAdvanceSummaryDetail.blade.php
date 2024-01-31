@extends('Partials.app')
@section('main')

<!-- <style>
  table,
  th,
  td {
    border: 1px solid #ced4da;
    border-collapse: collapse;
  }
</style> -->

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1">
        <div class="col-sm-12">
          <center>
            <b><label style="font-size:20px;">{{ $title}} <br><br><br> </label></b>
          </center>
          <table style="float:left;">
            <tr>
              <td><label>Advance Number</label></td>
              <td>:</td>
              <td>{{ $data['dataHeader']['DocumentNumber'] }}</td>
            </tr>
            <tr>
              <td><label>Budget Code</label></td>
              <td>:</td>
              <td>{{ $data['dataHeader']['CombinedBudgetCode'] }} - {{ $data['dataHeader']['CombinedBudgetName'] }}</td>
            </tr>
            <tr>
              <td><label>Sub Budget Code</label></td>
              <td>:</td>
              <td>{{ $data['dataHeader']['CombinedBudgetSectionCode'] }} - {{ $data['dataHeader']['CombinedBudgetSectionName'] }}</td>
            </tr>
            <tr>
              <td><label>Date</label></td>
              <td>:</td>
              <td>{{ date("d-m-Y", strtotime($data['dataHeader']['Date'])) }}</td>
            </tr>
            <tr>
              <td><label>Currency</label></td>
              <td>:</td>
              <td>{{ $data['dataHeader']['ProductUnitPriceCurrencyISOCode'] }}</td>
            </tr>
            <tr>
              <td><label>Requester</label></td>
              <td>:</td>
              <td>{{ $data['dataHeader']['RequesterWorkerName'] }}</td>
            </tr>
            <tr>
              <td><label>Beneficiary</label></td>
              <td>:</td>
              <td>{{ $data['dataHeader']['BeneficiaryWorkerName'] }}</td>
            </tr>
          </table>

          <table style="float:right;">
            <tr>
              <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/AdminLTE-master/dist/img/qdc.png'))) }}" width="190"></td>
            </tr>
          </table>
          <br><br><br><br><br><br>

          <table style="float:right;">
            <tr>
              <td>Bank Name</td>
              <td>:</td>
              <td>{{ $data['dataHeader']['BankAcronym'] }} - {{ $data['dataHeader']['BankName'] }}</td>
            </tr>
            <tr>
              <td>Bank Account</td>
              <td>:</td>
              <td>{{ $data['dataHeader']['BankAccountNumber'] }} - {{ $data['dataHeader']['BankAccountName'] }}</td>
            </tr>
          </table>

          <br><br><br><br><br>
        </div>
      </div>
      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">

            <div class="col-12 ShowTableReportAdvanceSummaryDetail">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="TableReportAdvanceSummaryDetail" id="TableReportAdvanceSummaryDetail" style="font-size: 13px;width:100%;border: 1px solid #ced4da;border-collapse: collapse;">
                    <thead>
                      <tr style="border: 1px solid #ced4da;border-collapse: collapse;">
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">No</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Product ID</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Description & Spesification</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Quantity</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Unit Price</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Advance</th>
                      </tr>
                    </thead>
                    @php $no = 1; $total = 0; @endphp
                    @foreach($data['dataDetail'] as $dataDetails)
                    @php $total += $dataDetails['PriceBaseCurrencyValue'] @endphp
                    <tbody>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $no++ }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetails['Product_RefID'] }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetails['ProductName'] }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetails['Quantity'],2) }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetails['ProductUnitPriceBaseCurrencyValue'],2) }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetails['PriceBaseCurrencyValue'],2) }}</td>
                    </tbody>
                    @endforeach
                    <tfoot>
                      <tr style="font-weight:bolder;border: 1px solid #ced4da;border-collapse: collapse;">
                        <th style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;text-align:center;" colspan="5">GRAND TOTAL ADVANCE</th>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><span id="GrandTotal">{{ number_format($total,2) }}</span></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-1">
        <div class="col-sm-12">
          <table style="position: fixed;bottom: 0;left: 0;right: 0;height: 50px;float:right;">
            <tr>
              <td>Printed By</td>
              <td>:</td>
              <td>{{ $printedBy }} - {{ $date }}</td>
            </tr>
          </table>
        </div>
      </div>

    </div>
  </section>
</div>
@endsection