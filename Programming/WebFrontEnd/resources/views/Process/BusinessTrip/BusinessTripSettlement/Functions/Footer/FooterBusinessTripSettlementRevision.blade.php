<script>
    const dataSettlementDetails = {!! json_encode($dataSettlementDetails ?? []) !!};
    const businessTripID = document.getElementById("brf_id");
    const totalBusinessTrip = document.getElementById("total_business_trip");
    const remark = document.getElementById("remark");
    const fileID = document.getElementById("dataInput_Log_FileUpload");
    let dataStore = [];
    let dataWorkflow = {
        workFlowPathRefID: null,
        approverEntityRefID: null,
        comment: null
    };

    function getCostComponentData() {
        const dataTemp = [];

        document.querySelectorAll("input[name^='cost_component']").forEach(input => {
            const name = input.getAttribute("name");
            const value = input.value.trim();

            // ambil angka di dalam bracket []
            const match = name.match(/cost_component\[(\d+)\]/);

            // skip jika value kosong
            if (match && value !== '') {
                const refID = match[1];
                const findDataSettlementDetails = dataSettlementDetails.find(val => val.BusinessTripCostComponentEntity_RefID == refID);

                dataTemp.push({
                    recordID: findDataSettlementDetails ? findDataSettlementDetails.Sys_ID : null,
                    entities: {
                        personBusinessTripSequenceDetail_RefID: findDataSettlementDetails ? findDataSettlementDetails.PersonBusinessTripSequenceDetail_RefID : null,
                        businessTripCostComponentEntity_RefID: parseInt(refID),
                        amountCurrency_RefID: dataSettlementDetails[0].AmountCurrency_RefID,
                        amountCurrencyValue: parseFloat(value.replace(/,/g, '')),
                        amountCurrencyExchangeRate: dataSettlementDetails[0].AmountCurrencyExchangeRate,
                    }
                });
            }
        });

        return dataTemp;
    }

    function getBusinessTripCostComponentEntityNew() {
        $.ajax({
            type: 'GET',
            url: '{!! route("getBusinessTripCostComponentEntityNew") !!}',
            success: function (response) {
                console.log('response', response);

                const mapping = {
                    'Taxi': '#taxi',
                    'Airplane': '#airplane',
                    'Train': '#train',
                    'Bus': '#bus',
                    'Ship': '#ship',
                    'Tol/Road': '#tol_road',
                    'Park': '#park',
                    'Excess Baggage': '#excess_bagage',
                    'Fuel': '#fuel',
                    'Hotel': '#hotel',
                    'Mess': '#mess',
                    'Guest House': '#guest_house',
                    'Accommodation': '#allowance',
                    'Entertainment': '#entertainment',
                    'Other': '#other'
                };

                response.forEach(function (item) {
                    const findDataSettlementDetails = dataSettlementDetails.find(val => val.BusinessTripCostComponentEntity_RefID == item.value);

                    if (mapping[item.name]) {
                        $(mapping[item.name])
                            .attr('name', 'cost_component[' + item.value + '][businessTripCostComponentEntity_RefID]');

                        if (findDataSettlementDetails) {
                            $(mapping[item.name])
                                .attr('value', Utils.formatCurrency(findDataSettlementDetails.AmountCurrencyValue));
                        }
                    }
                });

                initializeBSFCalculation();
                calculateTotalBSF();
            },
            error: function (textStatus, errorThrown) {
                console.log('error', textStatus, errorThrown);
            }
        });
    }

    function calculateTotalBSF() {
        const ids = ['taxi', 'airplane', 'train', 'bus', 'ship', 'tol_road', 'park', 'excess_bagage', 'fuel', 'hotel', 'mess', 'guest_house'];
        let total = 0;

        ids.forEach(id => {
            const input = document.getElementById(id);

            if (input && input.value) {
                const amount = Utils.parseFloatSafe(Utils.removeCommas(input.value));
                total += amount;
            }
        });

        const idsOther = ['allowance', 'entertainment', 'other'];
        let totalOther = 0;

        idsOther.forEach(id => {
            const input = document.getElementById(id);

            if (input && input.value) {
                const amount = Utils.parseFloatSafe(Utils.removeCommas(input.value));
                totalOther += amount;
            }
        });

        $("#total_transport").val(Utils.formatCurrency(total));
        $("#total_business_trip").val(Utils.formatCurrency(total + totalOther));
        ErrorHandler.hideErrorInputMessage("#total_business_trip", "#totalBusinessTripMessage");
    }

    function initializeBSFCalculation() {
        const ids = ['taxi', 'airplane', 'train', 'bus', 'ship', 'tol_road', 'park', 'excess_bagage', 'fuel', 'hotel', 'mess', 'guest_house', 'allowance', 'entertainment', 'other'];

        ids.forEach(id => {
            const input = document.getElementById(id);

            if (input) {
                input.addEventListener('input', calculateTotalBSF);
            }
        });
    }

    function BusinessTripSettlementRevision() {
        $.ajax({
            type: 'PUT',
            data: {
                workFlowPath_RefID: dataWorkflow.workFlowPathRefID,
                approverEntity: dataWorkflow.approverEntityRefID,
                comment: dataWorkflow.comment,
                storeData: {
                    dataInput_Log_FileUpload_1: fileID.value,
                    var_remark: remark.value,
                    businessTripSettlementDetail: JSON.stringify(dataStore)
                }
            },
            url: `{{ route('BusinessTripSettlement.update', $businessTripSettlementID) }}`,
            success: function (res) {
                HideLoading();

                console.log('res test', res);

                if (res.status == 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:#0046FF;font-weight:bold;">' + res.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        cancelForm("{{ route('BusinessTripSettlement.index', ['var' => 1]) }}");
                    });
                } else {
                    ErrorNotif("Create Business Trip Settlement Failed");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                HideLoading();
                ErrorNotif("Internal Server Error");
            }
        });
    }

    function commentWorkflow() {
        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success btn-sm',
            cancelButtonClass: 'btn btn-danger btn-sm',
            buttonsStyling: true,
        });

        swalWithBootstrapButtons.fire({
            title: 'Comment',
            text: "Please write your comment here",
            type: 'question',
            input: 'textarea',
            showCloseButton: false,
            showCancelButton: true,
            focusConfirm: false,
            cancelButtonText: '<span style="color:black;"> Cancel </span>',
            confirmButtonText: '<span style="color:black;"> OK </span>',
            cancelButtonColor: '#DDDAD0',
            confirmButtonColor: '#DDDAD0',
            reverseButtons: true
        }).then((result) => {
            if ('value' in result) {
                dataWorkflow.comment = result.value;
                ShowLoading();
                BusinessTripSettlementRevision();
            }
        });
    }

    function SubmitForm() {
        $('#businessTripRequestFormModal').modal('hide');
        commentWorkflow();
    }

    function validationForm() {
        const isBusinessTripIDNotEmpty = businessTripID.value.trim() !== '';
        const isTotalBusinessTripNotEmpty = totalBusinessTrip.value.trim() !== '' && totalBusinessTrip.value.trim() !== '0.00';
        const totalTransport = document.getElementById("total_transport");
        const totalAllowance = document.getElementById("allowance");
        const totalEntertainment = document.getElementById("entertainment");
        const totalOther = document.getElementById("other");

        if (isBusinessTripIDNotEmpty && isTotalBusinessTripNotEmpty) {
            dataStore = getCostComponentData();

            $("#travel_fares_modal_summary").text(totalTransport.value || '0.00');
            $("#allowance_modal_summary").text(totalAllowance.value || '0.00');
            $("#entertainment_modal_summary").text(totalEntertainment.value || '0.00');
            $("#other_modal_summary").text(totalOther.value || '0.00');
            $("#total_brf_modal_summary").text(totalBusinessTrip.value || '0.00');
            $('#text_total_brf_modal_summary').text('Total BSF');
            $('#businessTripRequestFormModal').modal('show');
        } else {
            if (!isBusinessTripIDNotEmpty && !isTotalBusinessTripNotEmpty) {
                ErrorHandler.showErrorInputMessage("#brf_number", "#businessTripNumberMessage");
                ErrorHandler.showErrorInputMessage("#total_business_trip", "#totalBusinessTripMessage");

                return;
            }
            if (!isBusinessTripIDNotEmpty) {
                ErrorHandler.showErrorInputMessage("#brf_number", "#businessTripNumberMessage");

                return;
            }
            if (!isTotalBusinessTripNotEmpty) {
                ErrorHandler.showErrorInputMessage("#total_business_trip", "#totalBusinessTripMessage");

                return;
            }
        }

        console.log('dataStore', dataStore);
    }

    $(document).ready(function () {
        getBusinessTripSettlement();
        getBusinessTripCostComponentEntityNew();
    });
</script>