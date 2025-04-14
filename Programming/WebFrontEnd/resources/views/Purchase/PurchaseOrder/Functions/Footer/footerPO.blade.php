<script>
    const msrIDList = [];
    const ppn = document.getElementById('ppn');
    const downPaymentValue = document.getElementById('downPaymentValue');
    
    downPaymentValue.addEventListener('input', function () {
        let value = parseInt(this.value);
        if (value > 100) this.value = 100;
        if (value < 0) this.value = 0;
    });

    ppn.addEventListener('change', function () {
        if (this.value == "Yes") {
            $('#containerValuePPN').show();
        } else {
            $('#containerValuePPN').hide();
        }
    });

    $('#containerValuePPN').hide();
    $(".loadingPurchaseOrderTable").hide();
    $(".errorPurchaseOrderTable").hide();
    
    function getPaymentTerm() {
        $('#containerSelectTOP').hide();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getPaymentTerm") !!}',
            success: function(data) {
                $('#containerLoadingTOP').hide();

                if (data && Array.isArray(data)) {
                    $('#containerSelectTOP').show();

                    $('#termOfPaymentOption').empty();
                    $('#termOfPaymentOption').append('<option disabled selected>Select a TOP</option>');

                    data.forEach(function(project) {
                        $('#termOfPaymentOption').append('<option value="' + project.sys_ID + '">' + project.name + '</option>');
                    });
                } else {
                    console.log('Data top code not found.');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getPaymentTerm error: ', textStatus, errorThrown);
            }
        });
    }

    function getVAT() {
        $('#containerSelectPPN').hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getVAT") !!}',
            success: function(data) {
                $('#containerLoadingPPN').hide();

                if (data && Array.isArray(data)) {
                    $('#containerSelectPPN').show();

                    $('#vatOption').empty();
                    $('#vatOption').append('<option disabled selected>Select a PPN</option>');

                    data.forEach(function(project) {
                        $('#vatOption').append('<option value="' + project.sys_PID + '">' + project.tariffFixRate + '</option>');
                    });
                } else {
                    console.log('Data vat not found.');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getVAT error: ', textStatus, errorThrown);
            }
        });
    }

    function getDetailPurchaseRequisition(purchase_requisition_id) {
        $("#tablePurchaseOrderDetail tbody").hide();
        $(".loadingPurchaseOrderTable").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getPurchaseRequisitionDetail") !!}?purchase_requisition_id=' + purchase_requisition_id,
            success: function(data) {
                $(".loadingPurchaseOrderTable").hide();
                console.log('data getPurchaseRequisitionDetail', data);
            },
            error: function (textStatus, errorThrown) {
                console.log('error', textStatus, errorThrown);
            }
        });
    }

    $('#tableGetModalPurchaseRequisition').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_modal_purchase_requisition"]').val();
        var checkDoubleMsrID    = msrIDList.includes(sysId);

        if (checkDoubleMsrID) {
            Swal.fire("Error", "MSR number has been selected !", "error");
        } else {
            msrIDList.push(sysId);
            getDetailPurchaseRequisition(sysId);
        }
    });

    $(window).one('load', function(e) {
        getPaymentTerm();
        getVAT();
    });
</script>