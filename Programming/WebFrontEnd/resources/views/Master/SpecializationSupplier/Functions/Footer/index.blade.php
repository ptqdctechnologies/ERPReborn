<script>
    $('#modal_category_supplier_trigger').on('click', function () {
        $('#myCategorySupplierRevision').modal('toggle');
        $('#supplierCategoryListModal').modal('toggle');
    });

    $('#tableSupplierCategoryListModal').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_supplier_category"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#modal_category_supplier_id").val(id);
        $("#modal_category_supplier_text").val(`${code} - ${name}`);
        $("#modal_category_supplier_text").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

        $('#myCategorySupplierRevision').modal('toggle');
        $('#supplierCategoryListModal').modal('toggle');
    });

    $(document).ready(function () {
        getSupplierCategory();
    });
</script>