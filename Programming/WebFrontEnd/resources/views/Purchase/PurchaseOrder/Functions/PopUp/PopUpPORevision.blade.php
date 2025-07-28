<div id="myPopUpPORevision" class="modal fade" role="dialog" aria-hidden="true" style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:35%;font-weight:bold;">
                        Purchase Order Revision
                    </span>
                    <br><br><br>

                    <div class="card" style="margin-left: 8%;">
                        <div class="card-body"> 
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td>
                                            <label>Revision Number&nbsp;</label>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <form id="editForm" action="{{ route('PurchaseOrder.RevisionPurchaseOrder') }}" method="post">
                                                @csrf
                                                    <input id="purchaseOrder_RefID" style="border-radius:0;" name="purchaseOrder_RefID" type="hidden" class="form-control">
                                                </form>
                                                <input required="" id="purchaseOrder_number" style="border-radius:0;" name="purchaseOrder_number" type="text" class="form-control" required readonly>
                                                <div class="input-group-append" style="cursor: pointer;">
                                                    <span style="border-radius:0;" class="input-group-text form-control" id="purchaseOrder_number_icon">
                                                        <a data-toggle="modal" data-target="#mySearchPO">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="" />
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>                                            
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-edit" style="margin-left: 38%;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/edit.png') }}" width="13" alt="" title="Edit"> Edit
                    </a>
                    <a class="btn btn-sm btn-cancel" style="background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel"> Cancel
                    </a>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.btn-edit').on('click', function() {
        var purchaseOrderRefID = $('#purchaseOrder_RefID').val();

        if (purchaseOrderRefID) {
            ShowLoading();

            $('#editForm').submit();
        } else {
            $('#purchaseOrder_number').focus();
            $('#purchaseOrder_number').css("border", "1px solid red");
            $('#purchaseOrder_number_icon').css("border", "1px solid red");
        }
    });

    // $('.btn-edit').on('click', function() {
    //     var purchaseOrder_RefID = $('#purchaseOrder_RefID').val();
    //     var purchaseOrder_number = $('#purchaseOrder_number').val();
        
    //     if (purchaseOrder_RefID) {
    //         ShowLoading();
    //         window.location.href = '/RevisionPurchaseOrder?purchaseOrder_RefID=' + purchaseOrder_RefID + '&purchaseOrder_number=' + purchaseOrder_number;
    //     } else {
    //         $('#purchaseOrder_number').focus();
    //         $('#purchaseOrder_number').css("border", "1px solid red");
    //         $('#purchaseOrder_number_icon').css("border", "1px solid red");
    //     }
    // });

    $('.btn-cancel').on('click', function() {
        $('#purchaseOrder_RefID').val("");
        $('#purchaseOrder_number').val("");
    });
</script>