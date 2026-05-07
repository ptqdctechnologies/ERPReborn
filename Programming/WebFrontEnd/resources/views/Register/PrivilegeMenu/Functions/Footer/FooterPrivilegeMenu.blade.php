<script>
    let checkedValue = [];
    const modulSelect = document.getElementById("modul");
    const menuTypeSelect = document.getElementById("menu_type");
    const formList = {
        department_id: {
            component: '#department_name',
            containerMessageId: '#departmentMessage',
            messageId: '#departmentMessageText'
        },
        role_id: {
            component: '#role_name',
            containerMessageId: '#roleMessage',
            messageId: '#roleMessageText'
        },
        modul: {
            component: '#modul',
            containerMessageId: '#modulMessage',
            messageId: '#modulMessageText'
        },
        menu_type: {
            component: '#menu_type',
            containerMessageId: '#menuTypeMessage',
            messageId: '#menuTypeMessageText'
        },
        list_menu: {
            component: '#list_menu',
            containerMessageId: '#listMenuMessage',
            messageId: '#listMenuMessageText'
        }
    };

    function validateCheckbox() {
        const checkboxes = document.querySelectorAll('input[name="list_menu[]"]');

        const checked = [...checkboxes].some(c => c.checked);

        if (checked) {
            checkboxes.forEach(c => c.style.outline = '');

            ErrorHandler.hideErrorInputMessage(formList.list_menu.component, formList.list_menu.containerMessageId);
        } else {
            checkboxes.forEach(c => c.style.outline = '1px solid red');

            ErrorHandler.showErrorInputMessage(formList.list_menu.component, formList.list_menu.containerMessageId);
        }
    }

    function updateSelectAllState() {
        const allCheckbox = $('input[name="list_menu[]"]');
        const checkedCheckbox = $('input[name="list_menu[]"]:checked');

        $('#select_all').prop(
            'checked',
            allCheckbox.length > 0 && allCheckbox.length === checkedCheckbox.length
        );
    }

    function getMenuGroup() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getMenuGroup") !!}',
            success: function (response) {
                const data = (response.data.length > 0 && response.data[0]) ? response.data : [];

                let select = $('#modul');
                select.empty();
                select.append('<option disabled selected value="">Select a Modul</option>');

                $.each(data, function (index, item) {
                    select.append(
                        `<option value="${item.Sys_ID}">${item.Name}</option>`
                    );
                });

                select.prop('disabled', false);
                $('#menu_type').prop('disabled', false);
            }
        });
    }

    function getPrivilegeMenu(role_id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("PrivilegeMenu.DataListPrivilegeMenu") !!}?sys_id_role=' + role_id,
            success: function (response) {
                const data = (response.status == 200 && response.data[0]) ? response.data : [];

                for (let i = 0; i < data.length; i++) {
                    if (!checkedValue.includes(data[i]['menuAction_RefID'])) {
                        checkedValue.push(data[i]['menuAction_RefID']);
                    }
                }
            }
        });
    }

    function getSubMenuTable(modul_id, menu_type) {
        $('#privilege_menu_table tbody').empty();
        $('#privilege_menu_loading_table').show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route(name: "getSubMenu") !!}?menu_group_id=' + modul_id + '&type=' + menu_type,
            success: function (response) {
                const data = (response.status == 200 && response.data[0]) ? response.data : [];

                let html = '';

                data.forEach(function (item, index) {
                    let checked = "";
                    for (var i = 0; i < checkedValue.length; i++) {
                        if (checkedValue[i] == item.defaultMenuAction_RefID) {
                            checked = "checked";
                        }
                    }

                    html += `
                        <tr>
                            <td style="padding-left: 0.29rem;">
                                <div class="input-group">
                                    &nbsp;&nbsp;
                                    <span class="input-group-text">
                                        <input type="checkbox" ${checked} name="list_menu[]" id="list_menu${index}" value="${item.defaultMenuAction_RefID}">
                                    </span>
                                    <span style="position: relative;top:7px;left:8px;">
                                        ${item.caption}
                                    </span>
                                </div>
                            </td>
                        </tr>
                    `;
                });

                $('#privilege_menu_table tbody').html(html);
                $('#privilege_menu_loading_table').hide();

                updateSelectAllState();
                validateCheckbox()
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('jqXHR, textStatus, errorThrown', jqXHR, textStatus, errorThrown);

                $('#privilege_menu_loading_table').hide();
                $('#privilege_menu_table tbody').html(`
                    <tr>
                        <td style="text-align:center; padding:10px; color:#6c757d;">
                            No Data Display Available
                        </td>
                    </tr>
                `);
            }
        })
    }

    $('#tableDepartment').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_modal_department"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $("#department_id").val(id);
        $("#department_name").val(name);
        $("#department_name").css({ "background-color": "#e9ecef" });

        $("#role_id").val("");
        $("#role_name").val("");
        $("#role_name").css({ "background-color": "#fff" });
        $("#myRoleTrigger").prop("disabled", false);
        $("#myRoleTrigger").css("cursor", "pointer");

        ErrorHandler.hideErrorInputMessage(formList.department_id.component, formList.department_id.containerMessageId);

        getModalRole(id);

        $("#myDepartment").modal('toggle');
    });

    $('#tableRole').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_modal_role"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $("#role_id").val(id);
        $("#role_name").val(name);
        $("#role_name").css({ "background-color": "#e9ecef" });

        ErrorHandler.hideErrorInputMessage(formList.role_id.component, formList.role_id.containerMessageId);

        getPrivilegeMenu(id);

        $("#myRole").modal('toggle');
    });

    $('#modul').on("change", function (e) {
        if (e.target.value && menuTypeSelect.value) {
            getSubMenuTable(e.target.value, menuTypeSelect.value);
            updateSelectAllState();
        }

        ErrorHandler.hideErrorInputMessage(formList.modul.component, formList.modul.containerMessageId);
    });

    $('#menu_type').on("change", function (e) {
        if (e.target.value && modulSelect.value) {
            getSubMenuTable(modulSelect.value, e.target.value);
            updateSelectAllState();
        }

        ErrorHandler.hideErrorInputMessage(formList.menu_type.component, formList.menu_type.containerMessageId);
    });

    $('#privilege_menu_form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '{!! route("PrivilegeMenu.store") !!}',
            data: $(this).serialize(),
            beforeSend: function () {
                Utils.showLoading();
            }
        })
            .done(function (response) {
                if (response.status === 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        Utils.cancelForm("{{ route('PrivilegeMenu.index') }}");
                    });
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error('jqXHR, textStatus, errorThrown', jqXHR, textStatus, errorThrown);

                if (jqXHR.status === 422) {
                    let errors = jqXHR.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        if (formList[key]) {
                            ErrorHandler.showErrorInputMessage(formList[key].component, formList[key].containerMessageId, formList[key].messageId, value[0]);

                            if (formList[key].component == formList.list_menu.component) {
                                validateCheckbox();
                            }
                        }
                    });
                }
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                Utils.hideLoading();
            });
    });

    $(document).on('change', 'input[name="list_menu[]"]', function () {
        updateSelectAllState();
        validateCheckbox();
    });

    $(document).on('change', '#select_all', function () {
        $('input[name="list_menu[]"]').prop('checked', $(this).is(':checked'));
        validateCheckbox();
    });

    $(document).ready(function () {
        getMenuGroup();
        getModalDepartment();

        $("#myRoleTrigger").prop("disabled", true);
    });
</script>