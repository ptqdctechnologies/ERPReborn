<script>
    let checkedValue = [];
    const modulSelect = document.getElementById("modul");
    const menuTypeSelect = document.getElementById("menu_type");

    $('#modul').on("change", function (e) {
        if (e.target.value && menuTypeSelect.value) {
            getSubMenuTable(e.target.value, menuTypeSelect.value);
        }
    });

    $('#menu_type').on("change", function (e) {
        if (e.target.value && modulSelect.value) {
            getSubMenuTable(modulSelect.value, e.target.value);
        }
    });

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
                                        <input type="checkbox" ${checked} name="list_menu[]" id="list_menu${index}" value="${item.sys_ID}">
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
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('error', errorThrown)

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

    $('#SelectAll').click(function () {
        if ($(this).is(":checked")) {
            $('.Sub_Menu').prop("checked", true);
            $('#UnSelectAll').prop("checked", false);

            var sub_Menu = document.getElementsByClassName('Sub_Menu');
            if (checkedValue.length == 0) {
                $.each(sub_Menu, function (key, value) {
                    checkedValue.push(value.value);
                });

            }
            else {
                $.each(sub_Menu, function (key, value) {
                    if (!checkedValue.includes(value.value)) {
                        checkedValue.push(value.value);
                    }
                });
            }
        }

        $('#SelectAll').prop("checked", true);
        if (checkedValue.length > 0) {
            $("#SavePrivilageMenu").prop("disabled", false);
        }
        else {
            $("#SavePrivilageMenu").prop("disabled", true);
        }
    });

    $('#UnSelectAll').change(function () {
        $('#SelectAll').prop("checked", false);
        $('#UnSelectAll').prop("checked", true);
        $('.Sub_Menu').prop("checked", false);
        var sub_Menu = document.getElementsByClassName('Sub_Menu');

        $.each(sub_Menu, function (key, value) {
            // checkedValue = checkedValue.filter(item => item !== value.value);

            var result = checkedValue.filter(function (elem) {
                return elem != value.value;
            });
            checkedValue = result;
        });

        if (checkedValue.length > 0) {
            $("#SavePrivilageMenu").prop("disabled", false);
        }
        else {
            $("#SavePrivilageMenu").prop("disabled", true);
        }
    });

    $('#SavePrivilageMenu').click(function () {
        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success btn-sm',
            cancelButtonClass: 'btn btn-danger btn-sm',
            buttonsStyling: true,
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Save this data?",
            type: 'question',
            showCancelButton: true,
            confirmButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/save.png") }}" width="13" alt=""><span style="color:black;">Yes, save it </span>',
            cancelButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/cancel.png") }}" width="13" alt=""><span style="color:black;"> No, cancel </span>',
            confirmButtonColor: '#e9ecef',
            cancelButtonColor: '#e9ecef',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                ShowLoading();

                var data = {
                    checkedValue: checkedValue,
                    user_role_id: $("#user_role_id").val(),
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    data: data,
                    url: '{!! route("PrivilegeMenu.store") !!}',
                    success: function (data) {
                        HideLoading();
                        if (data.status == 200) {
                            const swalWithBootstrapButtons = Swal.mixin({
                                confirmButtonClass: 'btn btn-success btn-sm',
                                cancelButtonClass: 'btn btn-danger btn-sm',
                                buttonsStyling: true,
                            })

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
                                if (result.value) {
                                    ShowLoading();
                                    window.location.href = '/PrivilageMenu';
                                }
                            })
                        } else {
                            ErrorNotif("Data Cancel Inputed");
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // FUNCTION ERROR NOTIFICATION 
                        ErrorNotif("Data Cancel Inputed");
                    }
                });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                HideLoading();
                // FUNCTION ERROR NOTIFICATION 
                CancelNotif("Data Cancel Inputed", '/PrivilageMenu');
            }
        })
    });

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

        getModalRole(id);

        $("#myDepartment").modal('toggle');
    });

    $('#tableRole').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_modal_role"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $("#role_id").val(id);
        $("#role_name").val(name);
        $("#role_name").css({ "background-color": "#e9ecef" });

        getPrivilegeMenu(id);

        $("#myRole").modal('toggle');
    });

    $(document).ready(function () {
        getMenuGroup();
        getModalDepartment();

        $("#myRoleTrigger").prop("disabled", true);
    });
</script>