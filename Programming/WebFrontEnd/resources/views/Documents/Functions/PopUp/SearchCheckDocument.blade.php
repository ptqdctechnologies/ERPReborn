<div id="mySearchCheckDocument" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Document</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <table>
                            <tr>
                                <td style="padding-top: 5px;"><label>Transaction</label></td>
                                <td>
                                    <div class="input-group">
                                        <select name="" id="" class="form-control" onclick="CheckDocument(this)">
                                            <option value=""></option>
                                            <option value="{!! route('AdvanceRequest.AdvanceListData') !!}">Advance</option>
                                            <option value="{!! route('AdvanceSettlement.AdvanceSettlementListData') !!}">Advance Settlement</option>
                                            <option value="{!! route('BusinessTripRequest.BusinessTripRequestListData') !!}">Bussines Trip Request</option>
                                            <option value="{!! route('BusinessTripSettlement.BusinessTripSettlementListData') !!}">Bussines Trip Settlement</option>
                                            <option value="{!! route('PurchaseRequisition.PurchaseRequisitionListData') !!}">Purchase Requisition</option>
                                            <option value="{!! route('PurchaseOrder.PurchaseOrderListData') !!}">Purchase Order</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            </table>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 430px;">
                                <table class="table table-head-fixed text-nowrap TableCheckDocument" id="TableCheckDocument">
                                    <thead>
                                        <tr>
                                            <th style="position:relative;left:10px;">No</th>
                                            <th style="position:relative;left:10px;">Trano</th>
                                            <th style="position:relative;left:10px;">Project Code</th>
                                            <th style="position:relative;left:10px;">Site Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>