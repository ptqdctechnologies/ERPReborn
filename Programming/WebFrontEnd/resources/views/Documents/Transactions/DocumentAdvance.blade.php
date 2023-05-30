<div class="card" style="position:relative;bottom:10px;">
  <div class="tab-content p-3" id="nav-tabContent">
    <div class="row">

      <!-- 1 -->

      <div class="card ShowDocument">
        <table>
          <tr>
            <td>
              <a class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                View Document
              </a>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-12 ShowDocument">
        <div class="card">
          <div class="card-header">
            <label class="card-title">
              Last Status : Awaiting
            </label>
          </div>

          <div class="card-body table-responsive p-0">
            <table class="table table-head-fixed text-nowrap table-sm TableListDocument" id="TableListDocument">
              <thead>
                <tr>
                  <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                  <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                  <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Name</th>
                  <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Status</th>
                  <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Comment</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- 2 -->

      <div class="card-body ShowDocumentList" style="font-weight: bold;">
        <center>
          <h3><b><span style="text-transform:uppercase">{{ $data['header']['title'] }}</span></b></h3>
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
                  <td style="padding-top: 5px;"><label>{{ $data['header']['title'] }} Date</label></td>
                  <td>:</td>
                  <td>{{ $data['header']['date'] }}</td>
                </tr>
                <tr>
                  <td style="padding-top: 5px;"><label>Currency</label></td>
                  <td>:</td>
                  <td>{{ $data['content']['itemList']['ungrouped'][0]['entities']['baseCurrencyISOCode'] }}</td>
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
                  <td style="padding-top: 5px;"><label>Bank Name</label></td>
                  <td>:</td>
                  <td>{{ $data['content']['bankAccount']['beneficiary']['bankName'] }}</td>
                </tr>
                <tr>
                  <td style="padding-top: 5px;"><label>Account Name</label></td>
                  <td>:</td>
                  <td>{{ $data['content']['bankAccount']['beneficiary']['bankAccountNumber'] }}</td>
                </tr>
                <tr>
                  <td style="padding-top: 5px;"><label>Account Number</label></td>
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
                @foreach($data['content']['itemList']['ungrouped'] as $datas)
                @php $grand_total += $datas['entities']['priceBaseCurrencyValue']; @endphp
                <tr>
                  <td style="border:1px solid #4B586A;color:#4B586A;">{{ $no++ }}</td>
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
                  <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="6">GRAND TOTAL</th>
                  <td style="border:1px solid #4B586A;color:#4B586A;"><span id="GrandTotal">{{ number_format($grand_total,2) }}</span></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>

      <!-- <div class="col-12 FileAttachment" style="width: 100%;">
        <div class="card">
          <div class="card-header">
            <label class="card-title">
              File Attachment
            </label>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
              </button>
            </div>
          </div>

          <div class="card-body file-attachment">
            <div class="col-md-12">
              <input hidden type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value="{{ $data['content']['attachmentFiles']['main']['logFileUploadPointer_RefID']}}" readonly="true" name="dataInput_Log_FileUpload_Pointer_RefID">
              <input hidden type="file" id="dataInput_Log_FileUpload_Pointer_RefID_Action" name="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" onchange="javascript: @php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_DOMInputFileContent(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIWebToken, 'Upload', 'dataInput_Log_FileUpload_Pointer_RefID', 'dataInput_Log_FileUpload_Pointer_RefID_Action', 'dataShow_ActionPanel', 'dataShow_MasterFileRecord'); @endphp;" />
            </div>
            <div class="col-md-12">
              <div class="card-body table-responsive p-0" style="height:125px;">
                <table class="table table-head-fixed table-sm text-nowrap">
                  <div class="form-group input_fields_wrap">
                    <div class="input-group control-group">
                      <div id="dataShow_ActionPanel"></div>
                    </div>
                  </div>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div> -->


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
                <textarea name="" id="" cols="140" rows="3" style="border:1px solid #e9ecef;"> {{ $data['content']['advanceRemarks'] }} </textarea>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 ApprovalHistory">
        <div class="card">
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
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <ul>
                  <li>
                    SUBMITTED 18-05-2023 05:57:25 : Eka Bagus Dwi putra (Project Control Officer)
                    Sign : 6656681791a5b8638922415f2d5bd35d
                    Comment : pengajuan makan malem, buah dan minuman dikarenakan setiap hari lembur sampai malam
                  </li>
                </ul>
                <ul>
                  <li>
                    APPROVED 18-05-2023 12:17:26 : Wahyu Ramadhani (Project Manager) ( )
                    Sign : 693f7d46bfed79cd8c21199ee3182757
                    Comment :
                  </li>
                </ul>
                <ul>
                  <li>
                    APPROVED 19-05-2023 12:08:56 : Kiki Mustikawati (GM Finance & Accounting)
                    Sign : 4b25d152bb4d80f30842a7bd87a2e43f
                    Comment :
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>