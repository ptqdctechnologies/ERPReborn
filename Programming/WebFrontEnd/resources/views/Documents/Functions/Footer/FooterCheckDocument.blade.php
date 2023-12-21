<script type="text/javascript">
    var sourceData = <?= $sourceData ?>;

    if (sourceData == 1) {
        $(".ShowDocumentList").show();
        $(".InternalNotes").show();
        $(".FileAttachment").show();
        $(".ApprovalHistory").show();
        $(".ViewDocument").hide();
        $(".DocumentWorkflow").hide();
    } else {
        $(".ShowDocumentList").hide();
        $(".InternalNotes").hide();
        $(".FileAttachment").hide();
        $(".ApprovalHistory").hide();
    }
</script>

<script>
    $('.mySearchCheckDocument').one('click', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDocumentType") !!}',
            success: function(data) {
                $(".DocumentType").empty();

                var option = "<option value='" + '' + "'>" + 'Select Document Type' + "</option>";
                $(".DocumentType").append(option);

                var len = data.length;
                for (var i = 0; i < len; i++) {
                    var ids = data[i].Sys_ID;
                    var names = data[i].Name;
                    var option2 = "<option value='" + ids + "'>" + names + "</option>";
                    $(".DocumentType").append(option2);
                }
            }
        });
    });
</script>

<script>
    $('#DocumentType').on("select2:select", function(e) {

        ShowLoading();

        $('#TableCheckDocument').find('tbody').empty();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;

        $.ajax({
            type: 'GET',
            url: '{!! route("CheckDocument.ShowDocumentListData") !!}?DocumentType=' + $('#DocumentType').val(),
            success: function(data) {
                var no = 1;
                t = $('#TableCheckDocument').DataTable();
                t.clear().draw();
                $.each(data, function(key, val) {
                    keys += 1;
                    t.row.add([
                        '<tbody><tr><td><input id="businessDocument_RefID' + keys + '" value="' + val.Sys_ID + '" type="hidden">' + no++ + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.DocumentNumber + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.CombinedBudgetCode + '-' + val.CombinedBudgetSectionCode + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.CombinedBudgetSectionCode + '-' + val.CombinedBudgetSectionName + '</span></td></tr></tbody>',
                    ]).draw();
                });

                HideLoading();
            }
        });
    });
</script>

<script>
    $('#TableCheckDocument tbody').on('click', 'tr', function() {

        $("#mySearchCheckDocument").modal('toggle');

        var row = $(this).closest("tr");
        var documentNumber = row.find("td:nth-child(2)").text();
        var id = row.find("td:nth-child(1)").text();
        var businessDocument_RefID = $('#businessDocument_RefID' + id).val();

        $("#businessDocument_RefID").val(businessDocument_RefID);
        $("#businessDocumentNumber").val(documentNumber);
    });
</script>

<script>
    $(".ViewWorkflow").hide();

    $('.ViewDocument').on('click', function() {
        $(".DocumentWorkflow").hide();
        $(".ShowDocumentList").show();
        $(".InternalNotes").show();
        $(".FileAttachment").show();
        $(".ApprovalHistory").show();

        $(".ViewDocument").hide();
        $(".ViewWorkflow").show();
    });

    $('.ViewWorkflow').on('click', function() {
        $(".DocumentWorkflow").show();
        $(".ShowDocumentList").hide();
        $(".InternalNotes").hide();
        $(".FileAttachment").hide();
        $(".ApprovalHistory").hide();

        $(".ViewDocument").show();
        $(".ViewWorkflow").hide();
    });
</script>

<!-- VALIDATION IF FORM DOCUMENT NUMBER INPUTED, PURPOSE FOR DELETE DOCUMENT REF ID -->
<script>
    var triggered = 0;
    $('#businessDocumentNumber').on('input', function() {
        if (triggered == 0) {
            $('#businessDocument_RefID').val("");
            triggered++;
        }
    });
    $('#businessDocumentNumber').on('blur', function() {
        // reset the triggered value to 0
        triggered = 0;
    });
</script>

<script>
    $('#submit').on('click', function() {
        ShowLoading();
    });
</script>


<script type="text/javascript">
    function ApproveButton(businessDocument_ID) {

        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success btn-sm',
            cancelButtonClass: 'btn btn-danger btn-sm',
            buttonsStyling: true,
        })

        swalWithBootstrapButtons.fire({

            title: 'Are you sure?',
            text: "Send this data?",
            type: 'question',

            showCancelButton: true,
            confirmButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/save.png") }}" width="13" alt=""><span style="color:black;">Yes, save it </span>',
            cancelButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/cancel.png") }}" width="13" alt=""><span style="color:black;"> No, cancel </span>',
            confirmButtonColor: '#e9ecef',
            cancelButtonColor: '#e9ecef',
            reverseButtons: true
        }).then((result) => {

            if (result.value) {

                const swalWithBootstrapButtons = Swal.mixin({
                    confirmButtonClass: 'btn btn-success btn-sm',
                    cancelButtonClass: 'btn btn-danger btn-sm',
                    buttonsStyling: true,
                })

                swalWithBootstrapButtons.fire({

                    title: 'Comment',
                    text: "Please write your comment here",
                    type: 'question',
                    input: 'text',
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

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: 'GET',
                            url: '{!! route("ApprovalDocument.ApprovalAccepted") !!}?businessDocument_ID=' + businessDocument_ID + '&comment=' + result.value,
                            success: function(data) {

                                if (data.status == "200") {
                                    swalWithBootstrapButtons.fire({

                                        title: 'Successful !',
                                        type: 'success',
                                        html: 'Document Has Been Approved',
                                        showCloseButton: false,
                                        showCancelButton: false,
                                        focusConfirm: false,
                                        confirmButtonText: '<span style="color:black;"> OK </span>',
                                        confirmButtonColor: '#4B586A',
                                        confirmButtonColor: '#e9ecef',
                                        reverseButtons: true
                                    }).then((result) => {
                                        if (result.value) {
                                            window.location.href = '/MyDocument';
                                        }
                                    })
                                } else if (data.status == "Final") {
                                    swalWithBootstrapButtons.fire({

                                        title: 'Successful !',
                                        type: 'success',
                                        html: 'Docunent Has Been Final Approved',
                                        showCloseButton: false,
                                        showCancelButton: false,
                                        focusConfirm: false,
                                        confirmButtonText: '<span style="color:black;"> OK </span>',
                                        confirmButtonColor: '#4B586A',
                                        confirmButtonColor: '#e9ecef',
                                        reverseButtons: true
                                    }).then((result) => {
                                        if (result.value) {
                                            window.location.href = '/MyDocument';
                                        }
                                    })
                                } else {
                                    Swal.fire("Error", "Data Error", "error");
                                }

                                HideLoading();
                            },
                            error: function(jqXHR, textStatus, errorThrown) {

                                HideLoading();

                                Swal.fire("Error", "Data Error", "error");
                            }
                        });

                    }
                })

            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                HideLoading();
                ErrorNotif("Data Cancel Approved");
            }
        })
    }
</script>