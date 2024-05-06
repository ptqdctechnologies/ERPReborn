<div class="col-12 ShowDocumentList" style="font-weight: bold;">
  <div class="card">
    <div class="card-header">
      <center>
        <h3><span style="text-transform:uppercase;font-weight:bold;">{{$dataHeader['BusinessDocumentType_Name']}}</span></h3>
      </center>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <table>
              <tr>
                <td style="padding-top: 5px;"><label>{{$dataHeader['BusinessDocumentType_Name']}}</label></td>
                <td>:</td>
                <td>{{ $dataHeader['DocumentNumber'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Date</label></td>
                <td>:</td>
                <td>{{ date('Y-m-d', strtotime($dataHeader['Date'])) }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Currency</label></td>
                <td>:</td>
                <td>{{ $dataHeader['ProductUnitPriceCurrencyISOCode'] }}</td>
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
              <tr>
                <td style="padding-top: 5px;"><label>File Attachment</label></td>
                <td>:</td>
                @if($Log_FileUpload_Pointer_RefID != 0)
                <td>

                  <div class="input-group ShowFileAttachment">
                    <input type="hidden" value="{{ $dataHeader['Sys_ID_Advance'] }}" id="Sys_ID_Advance">
                    <a class="btn btn-default btn-sm" onclick="ShowFileAttachment({{ $dataHeader['Sys_ID_Advance'] }} );">
                      Show File Attachment
                    </a>
                  </div>

                  <table class="TableFileAttachment">
                    <tbody>
                    </tbody>
                  </table>

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
                @if(isset($dataHeader['DateUpdate']))
                <td>
                  <div class="input-group">
                    <a class="btn btn-default btn-sm" onclick="ShowRevisionHistory({{ $dataHeader['Sys_ID_Advance'] }}, '{{ $dataHeader['DocumentNumber'] }}', '{{$dataHeader['BusinessDocumentType_Name']}}');">
                      Show Revision History
                    </a>
                  </div>
                </td>
                @endif
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
              <tr>
                <td style="padding-top: 5px;"><label>Bank Name</label></td>
                <td>:</td>
                <td>{{ $dataHeader['BankAcronym'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Account Name</label></td>
                <td>:</td>
                <td>{{ $dataHeader['BankAccountName'] }}</td>
              </tr>
              <tr>
                <td style="padding-top: 5px;"><label>Account Number</label></td>
                <td>:</td>
                <td>{{ $dataHeader['BankAccountNumber'] }}</td>
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
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT NAME</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UOM</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UNIT PRICE</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; $grand_total = 0; @endphp
          @foreach($dataDetail as $dataDetails)
          @php $grand_total += $dataDetails['PriceBaseCurrencyValue']; @endphp
          <tr>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $no++ }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataDetails['Product_RefID'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataDetails['ProductName'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($dataDetails['Quantity'],2) }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataDetails['QuantityUnitName'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($dataDetails['ProductUnitPriceBaseCurrencyValue'],2) }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($dataDetails['PriceBaseCurrencyValue'],2) }}</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="6">GRAND TOTAL</th>
            <td style="border:1px solid #4B586A;color:#4B586A;"><span id="GrandTotal">{{ number_format($grand_total,2) }}</span></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>

<div class="col-12 InternalNotes">
  <div class="card">
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
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <p>{!! nl2br(e($dataHeader['Remarks'])) !!}</p>
        </div>
      </div>
    </div>
  </div>
</div>