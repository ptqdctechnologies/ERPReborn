<script>
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

    $(window).one('load', function(e) {
        getPaymentTerm();
        getVAT();
    });
</script>