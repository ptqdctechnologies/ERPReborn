<div class="card-body ShowDocumentList" style="font-weight: bold;">
  <center>
    <h3><b><span style="text-transform:uppercase">{{ $dataTransaction['header']['title'] }}</span></b></h3>
  </center>
  <br>
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
            <td style="padding-top: 5px;"><label>{{ $dataTransaction['header']['title'] }} Date</label></td>
            <td>:</td>
            <td>{{ $dataTransaction['header']['date'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Currency</label></td>
            <td>:</td>
            <td>{{ $dataTransaction['content']['general']['accumulatedValues']['baseCurrencyISOCode'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Budget Code</label></td>
            <td>:</td>
            <td>{{ $dataTransaction['content']['general']['budget']['combinedBudgetCodeList'][0] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Sub Budget Code</label></td>
            <td>:</td>
            <td>{{ $dataTransaction['content']['general']['budget']['combinedBudgetSectionCodeList'][0] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>File Attachment</label></td>
            <td>:</td>
            <td>{{ $dataTransaction['content']['general']['attachmentFiles']['main']['logFileUploadPointer_RefID'] }}</td>
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
            <td style="padding-top: 5px;"><label>Requester</label></td>
            <td>:</td>
            <td>{{ $dataTransaction['content']['general']['involvedPersons'][0]['requesterWorkerJobsPositionName'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Beneficiary</label></td>
            <td>:</td>
            <td>{{ $dataTransaction['content']['general']['involvedPersons'][0]['beneficiaryWorkerJobsPositionName'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Bank Name</label></td>
            <td>:</td>
            <td>{{ $dataTransaction['content']['general']['bankAccount']['beneficiary']['bankFullName'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Account Name</label></td>
            <td>:</td>
            <td>{{ $dataTransaction['content']['general']['bankAccount']['beneficiary']['bankAccountName'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Account Number</label></td>
            <td>:</td>
            <td>{{ $dataTransaction['content']['general']['bankAccount']['beneficiary']['bankAccountNumber'] }}</td>
          </tr>
        </table>
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
          @foreach($dataTransaction['content']['details']['itemList'] as $datas)
          @php $grand_total += $datas['entities']['priceBaseCurrencyValue']; @endphp
          <tr>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $no++ }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['product_RefID'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['productName'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($datas['entities']['quantity'],2) }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['quantityUnitName'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($datas['entities']['productUnitPriceBaseCurrencyValue'],2) }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($datas['entities']['priceBaseCurrencyValue'],2) }}</td>
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
          <p>{{ $dataTransaction['content']['general']['remarks'] }}</p>
        </div>
      </div>
    </div>
  </div>
</div>