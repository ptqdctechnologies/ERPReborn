<div class="card-body ShowDocumentList" style="font-weight: bold;">
  <center>
    <h3><b><span style="text-transform:uppercase">PURCHASE ORDER</span></b></h3>
  </center>
  <br>
  <div class="row">
  <div class="col-md-8">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 5px;"><label>{{ $data['header']['title'] }} Number</label></td>
            <td>:</td>
            <td>{{ $data['header']['number'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Travel Date</label></td>
            <td>:</td>
            <td>{{ $data['header']['date'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Budget Code</label></td>
            <td>:</td>
            <td>{{ $data['content']['itemList']['ungrouped'][0]['entities']['combinedBudgetCode'] }} - {{ $data['content']['itemList']['ungrouped'][0]['entities']['combinedBudgetName'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Origin of Budget</label></td>
            <td>:</td>
            <td>{{ $data['content']['itemList']['ungrouped'][0]['entities']['baseCurrencyISOCode'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>File Attachment</label></td>
            <td>:</td>
            <td>{{ $data['content']['itemList']['ungrouped'][0]['entities']['baseCurrencyISOCode'] }}</td>
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
            <td>{{ $data['header']['date'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Vendor</label></td>
            <td>:</td>
            <td>{{ $data['content']['itemList']['ungrouped'][0]['entities']['combinedBudgetSectionCode'] }} - {{ $data['content']['itemList']['ungrouped'][0]['entities']['combinedBudgetSectionName'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Vendor Address</label></td>
            <td>:</td>
            <td>{{ $data['content']['involvedPersons']['requester']['name'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Telp.</label></td>
            <td>:</td>
            <td>{{ $data['content']['involvedPersons']['requester']['name'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Delivery Travel</label></td>
            <td>:</td>
            <td>{{ $data['header']['date'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Please Delivery To</label></td>
            <td>:</td>
            <td>{{ $data['content']['involvedPersons']['requester']['name'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Invoice To</label></td>
            <td>:</td>
            <td>{{ $data['content']['involvedPersons']['requester']['name'] }}</td>
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
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PERIOD</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PR NUMBER</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">BUDGET ID</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">BUDGET NAME</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NET ACT</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">DESCRIPTION</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UOM</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UNIT PRICE</th>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; $grand_total = 0; @endphp
          @foreach($data['content']['itemList']['ungrouped'] as $datas)
          @php $grand_total += $datas['entities']['priceBaseCurrencyValue']; @endphp
          <tr>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $no++ }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['product_RefID'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['productName'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['baseCurrencyISOCode'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['quantityUnitName'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['quantity'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ $datas['entities']['remarks'] }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($datas['entities']['priceBaseCurrencyValue'],2) }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($datas['entities']['productUnitPriceBaseCurrencyValue'],2) }}</td>
            <td style="border:1px solid #4B586A;color:#4B586A;">{{ number_format($datas['entities']['productUnitPriceBaseCurrencyValue'],2) }}</td>
            <td style="border:1px solid #4B586A;color:#4B586content']['advanceRemarksA;">{{ number_format($datas['entities']['priceBaseCurrencyValue'],2) }}</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="10">GRAND TOTAL</th>
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
          <p>{{ $data['header']['number'] }}</p>
        </div>
      </div>
    </div>
  </div>
</div>