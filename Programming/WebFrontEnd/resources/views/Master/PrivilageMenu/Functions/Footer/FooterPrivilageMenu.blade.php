<!-- SELECT FOR FILTER BY DOCUMENT TYPE  -->
<script>
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
        url: '{!! route("getDocumentType") !!}',
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

        $('#TableSubMenu').find('tbody').empty();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("CheckDocument.ShowDocumentListData") !!}?DocumentType=' + $('#Modul').val(),
            success: function(data) {
                $.each(data, function(key, val) {
                    

                    var checked = "";
                    var result = checkedValue.filter(function(elem) {
                        if(elem == val.Sys_ID){
                            console.log(val.Sys_ID);
                            checked = "checked";
                        }
                        else{
                            checked = "";
                        }
                    });

                    // console.log(checked);

                    var html = '<tr>' +
                        '<td>' +
                            '<div class="input-group">&nbsp;&nbsp;' +
                                '<span class="input-group-text">' +
                                    '<input type="checkbox" ' + checked + ' name="Sub_Menu" id="Sub_Menu" class="Sub_Menu" value="' + val.Sys_ID +'">' +
                                '</span>' +
                                '<span style="position: relative;top:7px;left:15px;">' + val.DocumentNumber +'</span>' +
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
                        var result = checkedValue.filter(function(elem) {
                            return elem != id;
                        });
                        checkedValue = result;
                    }

                    console.log(checkedValue);

                });
            }
        });
    });
</script>

<script>
    $('#SelectAll').click(function() {

        if ($(this).is(":checked")) {
            $('.Sub_Menu').prop("checked", true);
            $('#UnSelectAll').prop("checked", false);
            var inputElements = document.getElementsByClassName('Sub_Menu');

            if (checkedValue.length > 0) {
                checkedValue = [];
            }

            $.each(inputElements, function(key, value) {
                checkedValue.push(value.value);
            });
        }

        $('#SelectAll').prop("checked", true);

        // console.log(checkedValue);

    });

    $('#UnSelectAll').change(function() {
        ($(this).is(":checked") ? $('.Sub_Menu').prop("checked", false) : $('.Sub_Menu').prop("checked", false))

        $('#SelectAll').prop("checked", false);
        $('#UnSelectAll').prop("checked", true);

        checkedValue = [];


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