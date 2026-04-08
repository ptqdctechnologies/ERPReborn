<script>
    const documentTypeID = document.getElementById("DocumentTypeID");
    let remark = document.getElementById("remark");
    let fileID = document.getElementById("dataInput_Log_FileUpload");
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

                dataTemp.push({
                    entities: {
                        personBusinessTripSequenceDetail_RefID: 80000000000189,
                        businessTripCostComponentEntity_RefID: parseInt(refID),
                        amountCurrency_RefID: 62000000000001,
                        amountCurrencyValue: parseFloat(value.replace(/,/g, '')),
                        amountCurrencyExchangeRate: 1
                    }
                });
            }
        });

        return dataTemp;
    }

    function getBusinessTripCostComponentEntityNew() {
        // $components = $request->cost_component;

        // foreach ($components as $id => $amount) {
        //     // $id = id component
        //     // $amount = value input
        // }

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
                    if (mapping[item.name]) {
                        $(mapping[item.name])
                            .attr('name', 'cost_component[' + item.value + '][businessTripCostComponentEntity_RefID]');
                    }
                });

                initializeBSFCalculation();
            },
            error: function (textStatus, errorThrown) {
                console.log('error', textStatus, errorThrown);
            }
        });
    }

    function getDetailBrf(brfID) {
        $.ajax({
            type: 'POST',
            url: '{!! route("BusinessTripRequest.Detail") !!}?person_business_trip_id=' + brfID,
            success: function (response) {
                let businessTripRequest = response?.data ?? [];

                if (businessTripRequest.length === 0) {
                    console.log('data not found.');
                    return;
                }

                console.log('businessTripRequest', businessTripRequest);

                $("#requester_name").val(`${businessTripRequest[0].RequesterWorkerPosition} - ${businessTripRequest[0].RequesterWorkerName}`);
            },
            error: function (textStatus, errorThrown) {
                console.log('error', textStatus, errorThrown);
            }
        });
    }

    function parseCurrency(value) {
        const clean = value.replace(/,/g, '').trim();
        return isNaN(parseFloat(clean)) ? 0 : parseFloat(clean);
    }

    function calculateTotalBRF() {
        const ids = ['taxi', 'airplane', 'train', 'bus', 'ship', 'tol_road', 'park', 'excess_bagage', 'fuel', 'hotel', 'mess', 'guest_house'];
        let total = 0;

        ids.forEach(id => {
            const input = document.getElementById(id);

            if (input && input.value) {
                const amount = parseCurrency(input.value);
                total += amount;
            }
        });

        $("#total_transport").val(currencyTotal(total));
    }

    function initializeBSFCalculation() {
        const ids = ['taxi', 'airplane', 'train', 'bus', 'ship', 'tol_road', 'park', 'excess_bagage', 'fuel', 'hotel', 'mess', 'guest_house'];

        ids.forEach(id => {
            const input = document.getElementById(id);

            if (input) {
                input.addEventListener('input', calculateTotalBRF);
            }
        });
    }

    function BusinessTripSettlementStore() {
        $.ajax({
            type: 'POST',
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
            url: '{!! route("BusinessTripSettlement.store") !!}',
            success: function (res) {
                HideLoading();

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
                BusinessTripSettlementStore();
            }
        });
    }

    function validationForm() {
        dataStore = getCostComponentData();
        const totalTransport = document.getElementById("total_transport");

        $("#travel_fares_modal_summary").text(totalTransport.value);
        $('#text_total_brf_modal_summary').text('Total BSF');
        $('#businessTripRequestFormModal').modal('show');
    }

    function SubmitForm() {
        $('#businessTripRequestFormModal').modal('hide');
        commentWorkflow();
    }

    function getWorkflow(combinedBudgetRefID) {
        $.ajax({
            type: 'POST',
            data: {
                businessDocumentType_RefID: documentTypeID.value,
                combinedBudget_RefID: combinedBudgetRefID
            },
            url: '{!! route("GetWorkflow") !!}',
            success: function (response) {
                console.log('response', response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('jqXHR, textStatus, errorThrown', jqXHR, textStatus, errorThrown);
                Swal.fire("Error", "Data Error", "error");

                $("#loadingBudget").css({ "display": "none" });
                $("#myBusinessTripRequest").css({ "display": "block" });
            }
        });
    }

    $('#table_brf').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_brf"]').val();
        const sysText = $(this).find('td:nth-child(2)').text();

        $("#brf_id").val(sysId);
        $("#brf_number").val(sysText);
        $("#brf_number").css({ "display": "block", "background-color": "#e9ecef" });

        // getWorkflow(sysId);
        getDetailBrf(sysId);

        $("#myBusinessTripRequest").modal('toggle');
    });

    $('#table_bsf').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_bsf"]').val();
        const sysText = $(this).find('td:nth-child(2)').text();

        $("#bsf_number_id").val(sysId);
        $("#bsf_number_trano").val(sysText);
        $("#bsf_number_trano").css({ "display": "block", "background-color": "#e9ecef" });

        $("#myBusinessTripSettlement").modal('toggle');
    });

    $(document).ready(function () {
        getBusinessTripSettlement();
        getBusinessTripRequest();
        getBusinessTripCostComponentEntityNew();
    });
</script>