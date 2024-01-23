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
        url: '{!! route("getMenuGroup") !!}',
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


    $('#Modul').on("select2:select", function(e) {

        var keys = 0;

        $('#TableSubMenu').find('tbody').empty();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: '{!! route("getSubMenu") !!}?menu_group_id=' + $('#Modul').val(),
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

                    var ActionCreate = 0;
                    var ActionRead = 0;
                    var ActionUpdate = 0;
                    var ActionDelete = 0;
                    var ActionCreateID = 0;
                    var ActionReadID = 0;
                    var ActionUpdateID = 0;
                    var ActionDeleteID = 0;

                    for (var n = 0; n < checkedValue.length; n++) {
                        if (checkedValue[n] == val.Sys_ID) {
                            checkedSubMenu = "checked";
                            continue;
                        }

                        for (var i = 0; i < val.MenuAction.length; i++) {

                            if(val.MenuAction[i]['entities']['caption'] == "Create"){

                                if (checkedValue[n] == val.MenuAction[i]['recordID']) {
                                    checkedSubMenuCreate = "checked";
                                    disabledSubMenuCreate = "";
                                    continue;
                                }

                            }
                            if(val.MenuAction[i]['entities']['caption'] == "Read"){

                                if (checkedValue[n] == val.MenuAction[i]['recordID']) {
                                    checkedSubMenuRead = "checked";
                                    disabledSubMenuRead = "";
                                    continue;
                                }

                            }
                            if(val.MenuAction[i]['entities']['caption'] == "Edit"){
                                
                                if (checkedValue[n] == val.MenuAction[i]['recordID']) {
                                    checkedSubMenuUpdate = "checked";
                                    disabledSubMenuUpdate = "";
                                    continue;
                                }

                            }
                            if(val.MenuAction[i]['entities']['caption'] == "Delete"){
                                
                                if (checkedValue[n] == val.MenuAction[i]['recordID']) {
                                    checkedSubMenuDelete = "checked";
                                    disabledSubMenuDelete = "";
                                    continue;
                                }

                            }
                        }

                    }

                    
                    for (var i = 0; i < val.MenuAction.length; i++) {

                        if(val.MenuAction[i]['entities']['caption'] == "Create"){
                            ActionCreate = 1;
                            ActionCreateID = val.MenuAction[i]['recordID'];
                        }
                        if(val.MenuAction[i]['entities']['caption'] == "Read"){
                            ActionRead = 1;
                            ActionReadID = val.MenuAction[i]['recordID'];
                        }
                        if(val.MenuAction[i]['entities']['caption'] == "Edit"){
                            ActionUpdate = 1;
                            ActionUpdateID = val.MenuAction[i]['recordID'];
                        }
                        if(val.MenuAction[i]['entities']['caption'] == "Delete"){
                            ActionDelete = 1;
                            ActionDeleteID = val.MenuAction[i]['recordID'];
                        }
                    }

                    var html = '<tr>' +
                            '<td>' +
                                '<div class="input-group">&nbsp;&nbsp;' +
                                    '<span class="input-group-text">' +
                                        '<input type="checkbox" ' + checkedSubMenu + ' name="Sub_Menu" id="Sub_Menu' + keys + '" class="Sub_Menu" value="' + val.Sys_ID + '" onclick="OpenAction(' + keys + ', ' + ActionCreate + ', ' + ActionRead + ', ' + ActionUpdate + ', ' + ActionDelete + ', this)">' +
                                    '</span>' +
                                    '<span style="position: relative;top:7px;left:15px;">' + val.Caption + '</span>' +
                                '</div>' +
                            '</td>' +
                            '<td>' +
                                '<div class="input-group">&nbsp;&nbsp;' +
                                    '<span class="input-group-text" style="margin: 0 auto;display: block;">' +
                                        '<input type="checkbox" ' + disabledSubMenuCreate + ' ' + checkedSubMenuCreate + ' name="Sub_Menu_Create" id="Sub_Menu_Create' + keys + '" class="Sub_Menu_Create" value="' + ActionCreateID + '">' +
                                    '</span>' +
                                '</div>' +
                            '</td>' +
                            '<td>' +
                                '<div class="input-group">&nbsp;&nbsp;' +
                                    '<span class="input-group-text" style="margin: 0 auto;display: block;">' +
                                        '<input type="checkbox" ' + disabledSubMenuRead + ' ' + checkedSubMenuRead + ' name="Sub_Menu_Read" id="Sub_Menu_Read' + keys + '" class="Sub_Menu_Read" value="' + ActionReadID + '">' +
                                    '</span>' +
                                '</div>' +
                            '</td>' +
                            '<td>' +
                                '<div class="input-group">&nbsp;&nbsp;' +
                                    '<span class="input-group-text" style="margin: 0 auto;display: block;">' +
                                        '<input type="checkbox" ' + disabledSubMenuUpdate + ' ' + checkedSubMenuUpdate + ' name="Sub_Menu_Update" id="Sub_Menu_Update' + keys + '" class="Sub_Menu_Update" value="' + ActionUpdateID + '">' +
                                    '</span>' +
                                '</div>' +
                            '</td>' +
                            '<td>' +
                                '<div class="input-group">&nbsp;&nbsp;' +
                                    '<span class="input-group-text" style="margin: 0 auto;display: block;">' +
                                        '<input type="checkbox" ' + disabledSubMenuDelete + ' ' + checkedSubMenuDelete + ' name="Sub_Menu_Delete" id="Sub_Menu_Delete' + keys + '" class="Sub_Menu_Delete" value="' + ActionDeleteID + '">' +
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
    function OpenAction(key, ActionCreate, ActionRead, ActionUpdate, ActionDelete, event) {

        if(event.checked){

            if(ActionCreate == 1){
                $("#Sub_Menu_Create" + key).prop("disabled", false);
            }
            else{
                $("#Sub_Menu_Create" + key).prop("disabled", true);
            }

            if(ActionRead == 1){
                $("#Sub_Menu_Read" + key).prop("disabled", false);
            }
            else{
                $("#Sub_Menu_Read" + key).prop("disabled", true);
            }

            if(ActionUpdate == 1){
                $("#Sub_Menu_Update" + key).prop("disabled", false);
            }
            else{
                $("#Sub_Menu_Update" + key).prop("disabled", true);
            }

            if(ActionDelete == 1){
                $("#Sub_Menu_Delete" + key).prop("disabled", false);
            }
            else{
                $("#Sub_Menu_Delete" + key).prop("disabled", true);
            }

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
                    var keys  = key + 1;
                    
                    if(value.value != 0){

                        checkedValue.push(value.value);

                        $("#Sub_Menu_Create" + keys).prop("checked", true);
                        $("#Sub_Menu_Create" + keys).prop("disabled", false);

                    }
                    else{
                        $("#Sub_Menu_Create" + keys).prop("checked", false);
                        $("#Sub_Menu_Create" + keys).prop("disabled", true);
                    }

                });

                $.each(sub_Menu_Read, function(key, value) {
                    
                    var keys  = key + 1;
                    
                    if(value.value != 0){

                        checkedValue.push(value.value);

                        $("#Sub_Menu_Read" + keys).prop("checked", true);
                        $("#Sub_Menu_Read" + keys).prop("disabled", false);

                    }
                    else{
                        $("#Sub_Menu_Read" + keys).prop("checked", false);
                        $("#Sub_Menu_Read" + keys).prop("disabled", true);
                    }

                });

                $.each(sub_Menu_Update, function(key, value) {
                    
                    var keys  = key + 1;
                    
                    if(value.value != 0){

                        checkedValue.push(value.value);

                        $("#Sub_Menu_Update" + keys).prop("checked", true);
                        $("#Sub_Menu_Update" + keys).prop("disabled", false);

                    }
                    else{
                        $("#Sub_Menu_Update" + keys).prop("checked", false);
                        $("#Sub_Menu_Update" + keys).prop("disabled", true);
                    }

                });

                $.each(sub_Menu_Delete, function(key, value) {
                    
                    var keys  = key + 1;
                    
                    if(value.value != 0){

                        checkedValue.push(value.value);

                        $("#Sub_Menu_Delete" + keys).prop("checked", true);
                        $("#Sub_Menu_Delete" + keys).prop("disabled", false);

                    }
                    else{
                        $("#Sub_Menu_Delete" + keys).prop("checked", false);
                        $("#Sub_Menu_Delete" + keys).prop("disabled", true);
                    }

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
                        // checkedValue.push(value.value);
                        var keys  = key + 1;
                    
                        if(value.value != 0){

                            checkedValue.push(value.value);

                            $("#Sub_Menu_Create" + keys).prop("checked", true);
                            $("#Sub_Menu_Create" + keys).prop("disabled", false);
                        }
                        else{
                            $("#Sub_Menu_Create" + keys).prop("checked", false);
                            $("#Sub_Menu_Create" + keys).prop("disabled", true);
                        }
                        
                    }

                    
                });
                $.each(sub_Menu_Read, function(key, value) {
                    if(!checkedValue.includes(value.value)){
                        // checkedValue.push(value.value);
                        var keys  = key + 1;
                    
                        if(value.value != 0){

                            checkedValue.push(value.value);

                            $("#Sub_Menu_Read" + keys).prop("checked", true);
                            $("#Sub_Menu_Read" + keys).prop("disabled", false);

                        }
                        else{
                            $("#Sub_Menu_Read" + keys).prop("checked", false);
                            $("#Sub_Menu_Read" + keys).prop("disabled", true);
                        }
                    }
                });
                $.each(sub_Menu_Update, function(key, value) {
                    if(!checkedValue.includes(value.value)){
                        // checkedValue.push(value.value);
                        var keys  = key + 1;
                    
                        if(value.value != 0){

                            checkedValue.push(value.value);

                            $("#Sub_Menu_Update" + keys).prop("checked", true);
                            $("#Sub_Menu_Update" + keys).prop("disabled", false);

                        }
                        else{
                            $("#Sub_Menu_Update" + keys).prop("checked", false);
                            $("#Sub_Menu_Update" + keys).prop("disabled", true);
                        }
                    }
                });
                $.each(sub_Menu_Delete, function(key, value) {
                    if(!checkedValue.includes(value.value)){
                        // checkedValue.push(value.value);
                        var keys  = key + 1;
                    
                        if(value.value != 0){

                            checkedValue.push(value.value);

                            $("#Sub_Menu_Delete" + keys).prop("checked", true);
                            $("#Sub_Menu_Delete" + keys).prop("disabled", false);

                        }
                        else{
                            $("#Sub_Menu_Delete" + keys).prop("checked", false);
                            $("#Sub_Menu_Delete" + keys).prop("disabled", true);
                        }
                    }
                });
            }
            // console.log(checkedValue);
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


        // console.log(checkedValue);

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