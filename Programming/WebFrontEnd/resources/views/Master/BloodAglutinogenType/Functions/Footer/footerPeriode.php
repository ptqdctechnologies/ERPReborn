<script type="text/javascript">
    $(function() {
        $.ajax({
            type: "GET",
            url: '{{route("periode.index")}}',
            data: json_object,
            contentType: "application/json",
            processData: true,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(data) {

                Swal.fire("Success !", "Data add to cart", "success");

                y++;
                $.each(data, function(key, val) {

                    var t = $('#tableACnth').DataTable();
                    t.row.add([
                        '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                        '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                        '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>'
                    ]).draw();
                });
            },
            error: function(data) {
                Swal.fire("Error !", "Data Canceled Added", "error");
            }
        });


    });
</script>
