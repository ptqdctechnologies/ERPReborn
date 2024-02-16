<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailArfList").hide();
        $("#detailTransAvail").hide();
        $("#projectcode2").prop("disabled", true);
        $("#sitecode2").prop("disabled", true);
        $("#requester_name2").prop("disabled", true);
        $("#buttonArfList").prop("disabled", true);
        $("#product-comments-tab").prop("disabled", true);
    });
</script>

<script>
    $(document).ready(function() {

        $('.addTranoNumber1').click(function() {
            var a = "aaa";
            var b = "bbb";
            $("#tranoType").val(a);
            $("#remark").val(b);
        });
        $('.addTranoNumber2').click(function() {
            var a = "ccc";
            var b = "ddd";
            $("#tranoType").val(a);
            $("#remark").val(b);
        });
        $('.addTranoNumber3').click(function() {
            var a = "eee";
            var b = "fff";
            $("#tranoType").val(a);
            $("#remark").val(b);
        });
    });
</script>

<script>
    // var y = 1; //initlal text box count
    $('#saveTranoNumber').click(function() {

        const swalWithBootstrapButtons = Swal.mixin({
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: true,
        })

        swalWithBootstrapButtons.fire({

        title: 'Are you sure?',
        text: "Save this data?",
        type: 'question',
        
        showCancelButton: true,
        confirmButtonText: 'Yes, save it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.value) {
            swalWithBootstrapButtons.fire(
            'Succesful!',
            'Data has been updated !',
            'success'
            )

        } else if (
            result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'Process Canceled !',
                'error'
                )
            }
        })
    });
</script>