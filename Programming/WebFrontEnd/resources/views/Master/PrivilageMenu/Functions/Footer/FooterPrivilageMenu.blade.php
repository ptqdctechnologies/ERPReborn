<!-- SELECT FOR FILTER BY DOCUMENT TYPE  -->
<script>
    $("#user_role_popup").prop("disabled", true);
    $("#SavePrivilageMenu").prop("disabled", true);
    $("#Modul").prop("disabled", true);
    var checkedValue = [];
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: '{!! route("getDepartement") !!}',
        success: function(data) {
            $(".Modul").empty();

            var option = "<option value='" + '' + "'>" + 'Select Modul' + "</option>";
            $(".Modul").append(option);

            var len = data.length;
            for (var i = 0; i < len; i++) {
                var ids = data[i].Sys_ID;
                var names = data[i].Name;
                var option2 = "<option value='" + ids + "'>" + names + "</option>";
                $(".Modul").append(option2);
            }
        }
    });
</script>

<script>

    var keys = 0;

    $('#Modul').on("select2:select", function(e) {

        $('#TableSubMenu').find('tbody').empty();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: '{!! route("getRole") !!}?departement_id=' + $('#Modul').val(),
            success: function(data) {
                $.each(data, function(key, val) {

                    keys += 1;

                    $('#SelectAll').prop("checked", false);
                    $('#UnSelectAll').prop("checked", false);

                    var checkedSubMenu = "";
                    var checkedSubMenuCreate = "";
                    var checkedSubMenuRead = "";
                    var checkedSubMenuUpdate = "";
                    var checkedSubMenuDelete = "";


                    var disabledSubMenuCreate = "disabled";
                    var disabledSubMenuRead = "disabled";
                    var disabledSubMenuUpdate = "disabled";
                    var disabledSubMenuDelete = "disabled";

                    for (var i = 0; i < checkedValue.length; i++) {
                        if (checkedValue[i] == val.Sys_ID) {
                            checkedSubMenu = "checked";
                            disabledSubMenuCreate = "";
                            disabledSubMenuRead = "";
                            disabledSubMenuUpdate = "";
                            disabledSubMenuDelete = "";
                            continue;
                        }
                        if (checkedValue[i] == val.Sys_ID + '1111') {
                            checkedSubMenuCreate = "checked";
                            continue;
                        }
                        if (checkedValue[i] == val.Sys_ID + '2222') {
                            checkedSubMenuRead = "checked";
                            continue;
                        }
                        if (checkedValue[i] == val.Sys_ID + '3333') {
                            checkedSubMenuUpdate = "checked";
                            continue;
                        }
                        if (checkedValue[i] == val.Sys_ID + '4444') {
                            checkedSubMenuDelete = "checked";
                            continue;
                        }
                    }

                    var html = '<tr>' +
                            '<td>' +
                                '<div class="input-group">&nbsp;&nbsp;' +
                                    '<span class="input-group-text">' +
                                        '<input type="checkbox" ' + checkedSubMenu + ' name="Sub_Menu" id="Sub_Menu' + keys + '" class="Sub_Menu" value="' + val.Sys_ID + '" onclick="OpenAction(' + keys + ', this)">' +
                                    '</span>' +
                                    '<span style="position: relative;top:7px;left:15px;">' + val.FullName + '</span>' +
                                '</div>' +
                            '</td>' +
                            '<td>' +
                                '<div class="input-group">&nbsp;&nbsp;' +
                                    '<span class="input-group-text" style="margin: 0 auto;display: block;">' +
                                        '<input type="checkbox" ' + disabledSubMenuCreate + ' ' + checkedSubMenuCreate + ' name="Sub_Menu_Create" id="Sub_Menu_Create' + keys + '" class="Sub_Menu_Create" value="' + val.Sys_ID + 1111 + '">' +
                                    '</span>' +
                                '</div>' +
                            '</td>' +
                            '<td>' +
                                '<div class="input-group">&nbsp;&nbsp;' +
                                    '<span class="input-group-text" style="margin: 0 auto;display: block;">' +
                                        '<input type="checkbox" ' + disabledSubMenuRead + ' ' + checkedSubMenuRead + ' name="Sub_Menu_Read" id="Sub_Menu_Read' + keys + '" class="Sub_Menu_Read" value="' + val.Sys_ID + 2222 + '">' +
                                    '</span>' +
                                '</div>' +
                            '</td>' +
                            '<td>' +
                                '<div class="input-group">&nbsp;&nbsp;' +
                                    '<span class="input-group-text" style="margin: 0 auto;display: block;">' +
                                        '<input type="checkbox" ' + disabledSubMenuUpdate + ' ' + checkedSubMenuUpdate + ' name="Sub_Menu_Update" id="Sub_Menu_Update' + keys + '" class="Sub_Menu_Update" value="' + val.Sys_ID + 3333 + '">' +
                                    '</span>' +
                                '</div>' +
                            '</td>' +
                            '<td>' +
                                '<div class="input-group">&nbsp;&nbsp;' +
                                    '<span class="input-group-text" style="margin: 0 auto;display: block;">' +
                                        '<input type="checkbox" ' + disabledSubMenuDelete + ' ' + checkedSubMenuDelete + ' name="Sub_Menu_Delete" id="Sub_Menu_Delete' + keys + '" class="Sub_Menu_Delete" value="' + val.Sys_ID + 4444 + '">' +
                                    '</span>' +
                                '</div>' +
                            '</td>' +
                        '</tr>';
                    $('table.TableSubMenu tbody').append(html);

                });

                $('.Sub_Menu').click(function() {
                    var id = $(this).val();
                    if ($(this).is(":checked")) {
                        $('#UnSelectAll').prop("checked", false);
                        checkedValue.push(id);

                    } else {
                        $('#SelectAll').prop("checked", false);
                        var result = checkedValue.filter(function(elem) {
                            return elem != id;
                        });
                        checkedValue = result;
                    }

                    if(checkedValue.length > 0){
                        $("#SavePrivilageMenu").prop("disabled", false);
                    }
                    else{
                        $("#SavePrivilageMenu").prop("disabled", true);
                    }

                });

                $('.Sub_Menu_Create').click(function() {
                    var id = $(this).val();
                    if ($(this).is(":checked")) {
                        $('#UnSelectAll').prop("checked", false);
                        checkedValue.push(id);

                    } else {
                        $('#SelectAll').prop("checked", false);
                        var result = checkedValue.filter(function(elem) {
                            return elem != id;
                        });
                        checkedValue = result;
                    }
                });

                $('.Sub_Menu_Read').click(function() {
                    var id = $(this).val();
                    if ($(this).is(":checked")) {
                        $('#UnSelectAll').prop("checked", false);
                        checkedValue.push(id);

                    } else {
                        $('#SelectAll').prop("checked", false);
                        var result = checkedValue.filter(function(elem) {
                            return elem != id;
                        });
                        checkedValue = result;
                    }
                });

                $('.Sub_Menu_Update').click(function() {
                    var id = $(this).val();
                    if ($(this).is(":checked")) {
                        $('#UnSelectAll').prop("checked", false);
                        checkedValue.push(id);

                    } else {
                        $('#SelectAll').prop("checked", false);
                        var result = checkedValue.filter(function(elem) {
                            return elem != id;
                        });
                        checkedValue = result;
                    }
                });

                $('.Sub_Menu_Delete').click(function() {
                    var id = $(this).val();
                    if ($(this).is(":checked")) {
                        $('#UnSelectAll').prop("checked", false);
                        checkedValue.push(id);

                    } else {
                        $('#SelectAll').prop("checked", false);
                        var result = checkedValue.filter(function(elem) {
                            return elem != id;
                        });
                        checkedValue = result;
                    }
                });
            }
        });
    });
</script>

<script>
    function OpenAction(key, val) {
        if(val.checked){
            $("#Sub_Menu_Create" + key).prop("disabled", false);
            $("#Sub_Menu_Read" + key).prop("disabled", false);
            $("#Sub_Menu_Update" + key).prop("disabled", false);
            $("#Sub_Menu_Delete" + key).prop("disabled", false);
        }
        else{

            $("#Sub_Menu_Create" + key).prop("disabled", true);
            $("#Sub_Menu_Read" + key).prop("disabled", true);
            $("#Sub_Menu_Update" + key).prop("disabled", true);
            $("#Sub_Menu_Delete" + key).prop("disabled", true);

            $("#Sub_Menu_Create" + key).prop("checked", false);
            $("#Sub_Menu_Read" + key).prop("checked", false);
            $("#Sub_Menu_Update" + key).prop("checked", false);
            $("#Sub_Menu_Delete" + key).prop("checked", false);

            var Sub_Menu_Create = document.getElementById('Sub_Menu_Create' + key);
            var Sub_Menu_Read = document.getElementById('Sub_Menu_Read' + key);
            var Sub_Menu_Update = document.getElementById('Sub_Menu_Update' + key);
            var Sub_Menu_Delete = document.getElementById('Sub_Menu_Delete' + key);

            var result = checkedValue.filter(function(elem) {
                return elem != Sub_Menu_Create.value;
            });
            checkedValue = result;

            var result2 = checkedValue.filter(function(elem) {
                return elem != Sub_Menu_Read.value;
            });
            checkedValue = result2;

            var result3 = checkedValue.filter(function(elem) {
                return elem != Sub_Menu_Update.value;
            });
            checkedValue = result3;

            var result4 = checkedValue.filter(function(elem) {
                return elem != Sub_Menu_Delete.value;
            });
            checkedValue = result4;
        }
    }
</script>

<script>
    $('#SelectAll').click(function() {

        if ($(this).is(":checked")) {
            $('.Sub_Menu').prop("checked", true);
            $(".Sub_Menu_Create").prop("checked", true);
            $(".Sub_Menu_Read").prop("checked", true);
            $(".Sub_Menu_Update").prop("checked", true);
            $(".Sub_Menu_Delete").prop("checked", true);

            $(".Sub_Menu_Create").prop("disabled", false);
            $(".Sub_Menu_Read").prop("disabled", false);
            $(".Sub_Menu_Update").prop("disabled", false);
            $(".Sub_Menu_Delete").prop("disabled", false);

            $('#UnSelectAll').prop("checked", false);

            var sub_Menu = document.getElementsByClassName('Sub_Menu');
            var sub_Menu_Create = document.getElementsByClassName('Sub_Menu_Create');
            var sub_Menu_Read = document.getElementsByClassName('Sub_Menu_Read');
            var sub_Menu_Update = document.getElementsByClassName('Sub_Menu_Update');
            var sub_Menu_Delete = document.getElementsByClassName('Sub_Menu_Delete');

            if (checkedValue.length == 0) {
                $.each(sub_Menu, function(key, value) {
                    checkedValue.push(value.value);
                });
                $.each(sub_Menu_Create, function(key, value) {
                    checkedValue.push(value.value);
                });
                $.each(sub_Menu_Read, function(key, value) {
                    checkedValue.push(value.value);
                });
                $.each(sub_Menu_Update, function(key, value) {
                    checkedValue.push(value.value);
                });
                $.each(sub_Menu_Delete, function(key, value) {
                    checkedValue.push(value.value);
                });
            }
            else{
                $.each(sub_Menu, function(key, value) {
                    if(!checkedValue.includes(value.value)){
                        checkedValue.push(value.value);
                    }
                });
                $.each(sub_Menu_Create, function(key, value) {
                    if(!checkedValue.includes(value.value)){
                        checkedValue.push(value.value);
                    }
                });
                $.each(sub_Menu_Read, function(key, value) {
                    if(!checkedValue.includes(value.value)){
                        checkedValue.push(value.value);
                    }
                });
                $.each(sub_Menu_Update, function(key, value) {
                    if(!checkedValue.includes(value.value)){
                        checkedValue.push(value.value);
                    }
                });
                $.each(sub_Menu_Delete, function(key, value) {
                    if(!checkedValue.includes(value.value)){
                        checkedValue.push(value.value);
                    }
                });
            }
        }

        $('#SelectAll').prop("checked", true);

        if(checkedValue.length > 0){
            $("#SavePrivilageMenu").prop("disabled", false);
        }
        else{
            $("#SavePrivilageMenu").prop("disabled", true);
        }

    });

    $('#UnSelectAll').change(function() {

        $('#SelectAll').prop("checked", false);
        $('#UnSelectAll').prop("checked", true);

        $('.Sub_Menu').prop("checked", false);
        $(".Sub_Menu_Create").prop("checked", false);
        $(".Sub_Menu_Read").prop("checked", false);
        $(".Sub_Menu_Update").prop("checked", false);
        $(".Sub_Menu_Delete").prop("checked", false);

        $(".Sub_Menu_Create").prop("disabled", true);
        $(".Sub_Menu_Read").prop("disabled", true);
        $(".Sub_Menu_Update").prop("disabled", true);
        $(".Sub_Menu_Delete").prop("disabled", true);

        var sub_Menu = document.getElementsByClassName('Sub_Menu');
        var sub_Menu_Create = document.getElementsByClassName('Sub_Menu_Create');
        var sub_Menu_Read = document.getElementsByClassName('Sub_Menu_Read');
        var sub_Menu_Update = document.getElementsByClassName('Sub_Menu_Update');
        var sub_Menu_Delete = document.getElementsByClassName('Sub_Menu_Delete');

        $.each(sub_Menu, function(key, value) {
            checkedValue = checkedValue.filter(item => item !== value.value);
        });
        $.each(sub_Menu_Create, function(key, value) {
            checkedValue = checkedValue.filter(item => item !== value.value);
        });
        $.each(sub_Menu_Read, function(key, value) {
            checkedValue = checkedValue.filter(item => item !== value.value);
        });
        $.each(sub_Menu_Update, function(key, value) {
            checkedValue = checkedValue.filter(item => item !== value.value);
        });
        $.each(sub_Menu_Delete, function(key, value) {
            checkedValue = checkedValue.filter(item => item !== value.value);
        });

        if(checkedValue.length > 0){
            $("#SavePrivilageMenu").prop("disabled", false);
        }
        else{
            $("#SavePrivilageMenu").prop("disabled", true);
        }

    });
</script>

<script>
    $('#SavePrivilageMenu').click(function() {

        console.log(checkedValue);

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
                    url: '{!! route("PrivilageMenu.store") !!}',
                    success: function(data) {
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
                    error: function(jqXHR, textStatus, errorThrown) {
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
</script>