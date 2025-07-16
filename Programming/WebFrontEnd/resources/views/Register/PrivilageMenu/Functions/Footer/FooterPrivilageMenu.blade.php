<!-- SELECT FOR FILTER BY DOCUMENT TYPE  -->
<script>
    $("#user_role_popup").prop("disabled", true);
    $("#SavePrivilageMenu").prop("disabled", true);
    $("#Modul").prop("disabled", true);
    var checkedValue = [];
</script>
<!-- 
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
</script> -->

<script>
    function TableSubMenu(){
        $('#SelectAll').prop("checked", false);
        $('#UnSelectAll').prop("checked", false);

        var ModulID = $('#Modul').val();
        var Type = $('#Type').val();
        var keys = 0;

        $('#TableSubMenu').find('tbody').empty();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getSubMenu") !!}?menu_group_id=' + ModulID + '&type=' + Type,
            success: function(data) {
                $.each(data, function(key, val) {
                    
                    keys += 1;

                    var checkedSubMenu = "";
                    for (var i = 0; i < checkedValue.length; i++) {
                        if (checkedValue[i] == val.DefaultMenuAction_RefID) {

                            checkedSubMenu = "checked";

                        }
                    }

                    var html = '<tr>' +
                            '<td>' +
                                '<div class="input-group">&nbsp;&nbsp;' +
                                    '<span class="input-group-text">' +
                                        '<input type="checkbox" ' + checkedSubMenu + ' name="Sub_Menu" id="Sub_Menu' + keys + '" class="Sub_Menu" value="' + val.DefaultMenuAction_RefID + '">' +
                                    '</span>' +
                                    '<span style="position: relative;top:7px;left:15px;">' + val.Caption + '</span>' +
                                '</div>' +
                            '</td>' +
                        '</tr>';

                    $('table.TableSubMenu tbody').append(html);

                    if(checkedValue.length > 0){
                        $("#SavePrivilageMenu").prop("disabled", false);
                    }
                    else{
                        $("#SavePrivilageMenu").prop("disabled", true);
                    }

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
            },
            error: function (textStatus, errorThrown, error) {
                console.log('textStatus', textStatus);
                console.log('errorThrown', errorThrown);
                console.log('error', error);
            }
        });
    }
</script>

<script>
    $('#Modul').on("select2:select", function(e) {
        TableSubMenu();
    });
</script>

<script>
    $('#Type').on("select2:select", function(e) {
        TableSubMenu();
    });
</script>

<script>
    $('#SelectAll').click(function() {
        if ($(this).is(":checked")) {
            $('.Sub_Menu').prop("checked", true);
            $('#UnSelectAll').prop("checked", false);

            var sub_Menu = document.getElementsByClassName('Sub_Menu');
            if (checkedValue.length == 0) {
                $.each(sub_Menu, function(key, value) {
                    checkedValue.push(value.value);
                });
                
            }
            else{
                $.each(sub_Menu, function(key, value) {
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
        var sub_Menu = document.getElementsByClassName('Sub_Menu');

        $.each(sub_Menu, function(key, value) {
            // checkedValue = checkedValue.filter(item => item !== value.value);

            var result = checkedValue.filter(function(elem) {
                return elem != value.value;
            });
            checkedValue = result;
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