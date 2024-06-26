<div class="col-12 ShowDocumentList" style="font-weight: bold;">
  <div class="card">
    <div class="card-header">
      <center>
        <h3><span style="text-transform:uppercase;font-weight:bold;">{{ $dataTransaction['header']['title'] }}</span></h3>
      </center>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <table>
              <tr>
                <td style="padding-top: 5px;"><label>{{ $dataTransaction['header']['title'] }} Number</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['header']['number'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Travel Date</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['header']['date'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Budget Code</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['content']['general']['budget']['combinedBudgetFullNameList'][0] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Sub Budget Code</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['content']['general']['budget']['combinedBudgetSectionFullNameList'][0] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Requester</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['content']['general']['involvedPersons'][0]['requesterWorkerName'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Beneficiary</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['content']['general']['involvedPersons'][0]['beneficiaryWorkerName'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Job Title</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['header']['date'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Departement</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['header']['date'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>File Attachment</label></td>
                <td>:</td>
                
                @if($dataTransaction['content']['general']['attachmentFiles']['main']['itemList'] != "")
                <td>
                  @foreach($dataTransaction['content']['general']['attachmentFiles']['main']['itemList'] as $data_file)
                  <a href="{{ $data_file['entities']['downloadURL'] }}" title="Download Attachment">- {{ $data_file['entities']['name'] }} </a> <br>
                  @endforeach
                </td>
                @endif
              </tr>
            </table>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <table>
              <tr>
                <td style="padding-top: 5px;"><label>Revision</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['header']['date'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Reason to Travel</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['header']['date'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Head Station Location</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['header']['date'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Business Trip Location</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['header']['date'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Contact Phone Number</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['header']['date'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Transport Type</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['header']['date'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Travel Arrangement</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['header']['date'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Payment Applicable</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['header']['date'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Accomodation</label></td>
                <td>:</td>
                <td>{{ $dataTransaction['header']['date'] }}</td>
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
      <center>
        <label style="font-size:13px;position:relative;top:7px;font-weight:bold;">Payment Sequence</label>
      </center>
      <table class="table table-head-fixed text-nowrap TableListDocumentDetail" id="TableListDocumentDetail">
        <thead>
          <tr>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">BUDGET NAME</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">ALLOWANCE</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">TRANSPORT</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">AIRPORT TAX</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">ACCOMODATION</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">OTHER</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; $grand_total = 0; @endphp
          @foreach($dataTransaction['content']['details']['itemList'] as $datas)
          @php $grand_total += $datas['entities']['priceBaseCurrencyValue']; @endphp
          <tr>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $no++ }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['product_RefID'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['product_RefID'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['productName'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['quantity'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['quantityUnitName'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($datas['entities']['productUnitPriceBaseCurrencyValue'],2) }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($datas['entities']['priceBaseCurrencyValue'],2) }}</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="7">GRAND TOTAL</th>
            <td style="border:1px solid #4B586A;color:#4B586A;"><span id="GrandTotal">{{ number_format($grand_total,2) }}</span></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>

<div class="col-12 ShowDocumentList">
  <div class="card">
    <div class="card-body table-responsive p-0">
      <center>
        <label style="font-size:13px;position:relative;top:7px;font-weight:bold;">Payment Request</label>
      </center>
      <table class="table table-head-fixed text-nowrap TableListDocumentDetail" id="TableListDocumentDetail">
        <thead>
          <tr>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">BUDGET NAME</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">ALLOWANCE</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">TRANSPORT</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">AIRPORT TAX</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">ACCOMODATION</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">OTHER</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; $grand_total = 0; @endphp
          @foreach($dataTransaction['content']['details']['itemList'] as $datas)
          @php $grand_total += $datas['entities']['priceBaseCurrencyValue']; @endphp
          <tr>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $no++ }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['product_RefID'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['product_RefID'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['productName'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['quantity'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['quantityUnitName'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($datas['entities']['productUnitPriceBaseCurrencyValue'],2) }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($datas['entities']['priceBaseCurrencyValue'],2) }}</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="7">GRAND TOTAL</th>
            <td style="border:1px solid #4B586A;color:#4B586A;"><span id="GrandTotal">{{ number_format($grand_total,2) }}</span></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>