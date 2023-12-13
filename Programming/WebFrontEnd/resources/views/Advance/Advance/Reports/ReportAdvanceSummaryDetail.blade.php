@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Advance Summary Report Detail</label>
        </div>
      </div>

      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">

          <div class="row">
            <div class="col-12 ShowDocumentList" style="font-weight: bold;">
              <div class="card">
                <div class="card-header">
                  <center>
                    <h3><span style="text-transform:uppercase;font-weight:bold;">Advance Summary Report Detail</span></h3>
                  </center>
                </div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <table>
                          <tr>
                            <td style="padding-top: 5px;"><label>Transaction Number</label></td>
                            <td>:</td>
                            <td>{{ $dataHeader['DocumentNumber'] }}</td>
                          </tr>
                          <tr>
                            <td style="padding-top: 5px;"><label>Budget Code</label></td>
                            <td>:</td>
                            <td>{{ $dataHeader['CombinedBudgetCode'] }} - {{ $dataHeader['CombinedBudgetName'] }}</td>
                          </tr>
                          <tr>
                            <td style="padding-top: 5px;"><label>Sub Budget Code</label></td>
                            <td>:</td>
                            <td>{{ $dataHeader['CombinedBudgetSectionCode'] }} - {{ $dataHeader['CombinedBudgetSectionName'] }}</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <table>
                          <tr>
                            <td style="padding-top: 5px;"><label>Date</label></td>
                            <td>:</td>
                            <td>{{ date("d-m-Y", strtotime($dataHeader['Date'])) }}</td>
                          </tr>
                          <tr>
                            <td style="padding-top: 5px;"><label>Requester</label></td>
                            <td>:</td>
                            <td>{{ $dataHeader['RequesterWorkerName'] }}</td>
                          </tr>
                          <tr>
                            <td style="padding-top: 5px;"><label>Beneficiary</label></td>
                            <td>:</td>
                            <td>{{ $dataHeader['BeneficiaryWorkerName'] }}</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 ShowDocumentList">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="table table-head-fixed text-nowrap TableListDocumentDetail" id="TableListDocumentDetail">
                    <thead>
                      <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT ID</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">DESCRIPTION & SPECIFICATIONS</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UNIT PRICE</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">TOTAL ADVANCE</th>
                      </tr>
                    </thead>
                    @php $no = 1; $total = 0; @endphp
                    @foreach($dataDetail as $dataDetails)
                    @php $total += $dataDetails['PriceBaseCurrencyValue'] @endphp
                    <tbody>
                      <td style="border:1px solid #4B586A;color:#4B586A;">{{ $no++ }}</td>
                      <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataDetails['Product_RefID'] }}</td>
                      <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataDetails['ProductName'] }}</td>
                      <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataDetails['Quantity'] }}</td>
                      <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($dataDetails['ProductUnitPriceBaseCurrencyValue'],2) }}</td>
                      <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($dataDetails['PriceBaseCurrencyValue'],2) }}</td>
                    </tbody>
                    @endforeach
                    <tfoot>
                      <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="5">GRAND TOTAL ADVANCE</th>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><span id="GrandTotal">{{ number_format($total,2) }}</span></td>
                      </tr>
                    </tfoot>
                  </table>
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
@endsection