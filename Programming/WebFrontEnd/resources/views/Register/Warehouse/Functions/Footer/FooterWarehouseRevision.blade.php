<script>
    $(document).ready(function() {
        $('.TableWarehouse').DataTable();
    });
</script>

<script>
    function CancelWarehouse(){
        ShowLoading();
        window.location.href = '/Warehouse?var=1';
    }
</script>


<script>
    function ResetWarehouse(){
        document.getElementById("FormSubmitWarehouse").reset();
    }
</script>