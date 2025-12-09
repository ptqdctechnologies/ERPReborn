<script>
    function getBusinessDocumentTypeSendRedis() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBusinessDocumentTypeSendRedis") !!}',
        });
    }
    
    $(window).one('load', function(e) {
        getBusinessDocumentTypeSendRedis();
    });
</script>