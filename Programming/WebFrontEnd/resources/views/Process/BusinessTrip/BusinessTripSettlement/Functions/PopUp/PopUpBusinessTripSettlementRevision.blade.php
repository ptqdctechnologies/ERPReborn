<div class="modal fade" id="businessTripSettlementRevisionModal" tabindex="-1"
    aria-labelledby="businessTripSettlementRevisionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="businessTripSettlementRevisionModalLabel"
                    style="font-size: 15px; font-weight:bold; text-align: center;">
                    BUSINESS TRIP SETTLEMENT REVISION
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <form id="editForm" method="POST"
                    action="{{ route('BusinessTripSettlement.RevisionBusinessTripSettlementIndex') }}">
                    @csrf
                    <div class="card mb-0" style="width: fit-content;">
                        <div class="card-body d-flex align-items-center justify-content-center" style="gap: 1rem;">
                            <label class="p-0 m-0">Revision Number</label>
                            <div class="form-group d-flex">
                                <div>
                                    <span id="modal_business_trip_settlement_document_number_icon"
                                        class="input-group-text form-control" data-toggle="modal"
                                        data-target="#businessTripSettlementListModal"
                                        style="cursor:pointer; border-radius: 0;">
                                        <i class="fas fa-gift"></i>
                                    </span>
                                </div>
                                <div>
                                    <input id="modal_business_trip_settlement_document_number" class="form-control"
                                        style="border-radius:0; background-color: white;" readonly />
                                    <input id="modal_business_trip_settlement_id" class="form-control"
                                        name="modal_business_trip_settlement_id"
                                        style="border-radius:0; background-color: white;" hidden />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-cancel" class="btn btn-sm" data-dismiss="modal"
                    style="background-color: #e9ecef; border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel" />
                    Cancel
                </button>
                <button type="button" id="btn-edit" class="btn btn-sm"
                    style="background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/edit.png') }}" width="13" alt="" title="Edit" />
                    Edit
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#btn-edit').on('click', function () {
        const businessTripSettlementModalRefID = $('#modal_business_trip_settlement_id').val();

        if (businessTripSettlementModalRefID) {
            ShowLoading();

            $('#editForm').submit();
        } else {
            $('#modal_business_trip_settlement_document_number').focus();
            $('#modal_business_trip_settlement_document_number').css("border", "1px solid red");
        }
    });

    $('#btn-cancel').on('click', function () {
        $('#modal_business_trip_settlement_id').val("");
        $('#modal_business_trip_settlement_document_number').val("");
    });
</script>