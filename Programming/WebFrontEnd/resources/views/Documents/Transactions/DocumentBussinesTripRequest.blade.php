<div class="card-body ShowDocumentList" style="font-weight: bold;">
  <center>
    <h3><b><span style="text-transform:uppercase">BUSINESS TRIP REQUEST</span></b></h3>
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
            <td style="padding-top: 5px;"><label>Sub Budget Code</label></td>
            <td>:</td>
            <td>{{ $data['content']['itemList']['ungrouped'][0]['entities']['combinedBudgetSectionCode'] }} - {{ $data['content']['itemList']['ungrouped'][0]['entities']['combinedBudgetSectionName'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Requester</label></td>
            <td>:</td>
            <td>{{ $data['content']['involvedPersons']['requester']['name'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Name of Beneficiary</label></td>
            <td>:</td>
            <td>{{ $data['content']['involvedPersons']['beneficiary']['name'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Job Title</label></td>
            <td>:</td>
            <td>{{ $data['content']['itemList']['ungrouped'][0]['entities']['baseCurrencyISOCode'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Departement</label></td>
            <td>:</td>
            <td>{{ $data['content']['itemList']['ungrouped'][0]['entities']['baseCurrencyISOCode'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>File Attachment</label></td>
            <td>:</td>
            <td>
              <input hidden type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value="{{ $data['content']['attachmentFiles']['main']['logFileUploadPointer_RefID']}}" readonly="true" name="dataInput_Log_FileUpload_Pointer_RefID">
              <input hidden type="file" id="dataInput_Log_FileUpload_Pointer_RefID_Action" name="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" onchange="javascript: @php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_DOMInputFileContent(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIWebToken, 'Upload', 'dataInput_Log_FileUpload_Pointer_RefID', 'dataInput_Log_FileUpload_Pointer_RefID_Action', 'dataShow_ActionPanel', 'dataShow_MasterFileRecord'); @endphp;" />
              <div id="dataShow_ActionPanel"></div>
            </td>
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
            <td style="padding-top: 5px;"><label>Reason to Travel</label></td>
            <td>:</td>
            <td>{{ $data['header']['date'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Head Station Location</label></td>
            <td>:</td>
            <td>{{ $data['content']['bankAccount']['beneficiary']['bankName'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Business Trip Location</label></td>
            <td>:</td>
            <td>{{ $data['content']['bankAccount']['beneficiary']['bankAccountNumber'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Contact Phone Number</label></td>
            <td>:</td>
            <td>{{ $data['content']['bankAccount']['beneficiary']['bankAccountName'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Transport Type</label></td>
            <td>:</td>
            <td>{{ $data['content']['bankAccount']['beneficiary']['bankAccountName'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Travel Arrangement</label></td>
            <td>:</td>
            <td>{{ $data['content']['bankAccount']['beneficiary']['bankAccountName'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Payment Applicable</label></td>
            <td>:</td>
            <td>{{ $data['content']['bankAccount']['beneficiary']['bankAccountName'] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>Accomodation</label></td>
            <td>:</td>
            <td>{{ $data['content']['bankAccount']['beneficiary']['bankAccountName'] }}</td>
          </tr>
        </table>
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
          @foreach($data['content']['itemList']['ungrouped'] as $datas)
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
          @foreach($data['content']['itemList']['ungrouped'] as $datas)
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