<script>
    $('#modal_specialization_supplier_trigger').on('click', function () {
        $('#mySpecializationSupplierRevision').modal('toggle');
        $('#supplierSpecializationListModal').modal('toggle');
    });

    $('#tableSupplierSpecializationListModal').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_supplier_specialization"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#modal_specialization_supplier_id").val(code);
        $("#modal_specialization_supplier_text").val(`${code} - ${name}`);
        $("#modal_specialization_supplier_text").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

        $('#mySpecializationSupplierRevision').modal('toggle');
        $('#supplierSpecializationListModal').modal('toggle');
    });

    $(document).ready(function () {
        getSupplierSpecialization();
    });
</script>