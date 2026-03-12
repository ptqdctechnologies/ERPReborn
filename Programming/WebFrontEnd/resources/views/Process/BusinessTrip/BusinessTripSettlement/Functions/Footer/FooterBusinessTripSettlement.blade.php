<script>
    function getBusinessTripCostComponentEntityNew() {
        // $components = $request->cost_component;

        // foreach ($components as $id => $amount) {
        //     // $id = id component
        //     // $amount = value input
        // }

        $.ajax({
            type: 'GET',
            url: '{!! route("getBusinessTripCostComponentEntityNew") !!}',
            success: function(response) {
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

                response.forEach(function(item) {
                    if(mapping[item.name]){
                        $(mapping[item.name])
                        .attr('name', 'cost_component['+item.value+'][businessTripCostComponentEntity_RefID]');
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
            success: function(response) {
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

    function validationForm() {
        const totalTransport = document.getElementById("total_transport");

        $("#travel_fares_modal_summary").text(totalTransport.value);
        $('#text_total_brf_modal_summary').text('Total BSF');
        $('#businessTripRequestFormModal').modal('show');
    }

    $('#table_brf').on('click', 'tbody tr', async function() {
        const sysId     = $(this).find('input[data-trigger="sys_id_brf"]').val();
        const sysText   = $(this).find('td:nth-child(2)').text();

        $("#brf_id").val(sysId);
        $("#brf_number").val(sysText);
        $("#brf_number").css({"display":"block", "background-color": "#e9ecef"});

        getDetailBrf(sysId);

        $("#myBusinessTripRequest").modal('toggle');
    });

    $(document).ready(function() {
        getBusinessTripRequest();
        getBusinessTripCostComponentEntityNew();
    });
</script>