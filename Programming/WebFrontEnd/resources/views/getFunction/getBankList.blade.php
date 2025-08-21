<!-- DEFAULT MODAL -->
<div id="myGetBankList" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Bank</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetBankList">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Full Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingGetBankName">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                                        Loading...
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="errorMessageContainer">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECOND MODAL -->
<div id="myGetBankListSecond" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Bank</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetBankListSecond">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Full Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingGetBankNameSecond">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                                        Loading...
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="errorMessageContainerSecond">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- THIRD MODAL -->
<div id="myGetBankListThird" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Bank</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetBankListThird">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Full Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingGetBankNameThird">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                                        Loading...
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="errorMessageContainerThird">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorMessageThird" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".errorMessageContainer").hide();
    $(".errorMessageContainerSecond").hide();

    function getBankNameList(source) {
        if (source === "second_modal") {
            $('#tableGetBankListSecond tbody').empty();
            $(".loadingGetBankNameSecond").show();
            $(".errorMessageContainerSecond").hide();
        } else if (source === "third_modal") {
            $('#tableGetBankListThird tbody').empty();
            $(".loadingGetBankNameThird").show();
            $(".errorMessageContainerThird").hide();
        } else {
            $('#tableGetBankList tbody').empty();
            $(".loadingGetBankName").show();
            $(".errorMessageContainer").hide();
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getBankList") !!}',
            success: function(data) {
                if (source === "second_modal") {
                    $(".loadingGetBankNameSecond").hide();

                    var no = 1;
                    var table = $('#tableGetBankListSecond').DataTable();
                    table.clear();

                    if (Array.isArray(data.data) && data.data.length > 0) {
                        $.each(data.data, function(key, val) {
                            keys += 1;
                            table.row.add([
                                '<input id="sys_id_bank_list_second' + keys + '" value="' + val.sys_ID + '" type="hidden">' + no++,
                                val.acronym || '-',
                                val.name || '-'
                            ]).draw();
                        });

                        $("#tableGetBankListSecond_length").show();
                        $("#tableGetBankListSecond_filter").show();
                        $("#tableGetBankListSecond_info").show();
                        $("#tableGetBankListSecond_paginate").show();
                    } else {
                        $(".errorMessageContainerSecond").show();
                        $("#errorMessageSecond").text(`Data not found.`);

                        $("#tableGetBankListSecond_length").hide();
                        $("#tableGetBankListSecond_filter").hide();
                        $("#tableGetBankListSecond_info").hide();
                        $("#tableGetBankListSecond_paginate").hide();
                    }
                } else if (source === "third_modal") {
                    $(".loadingGetBankNameThird").hide();

                    var no = 1;
                    var table = $('#tableGetBankListThird').DataTable();
                    table.clear();

                    if (Array.isArray(data.data) && data.data.length > 0) {
                        $.each(data.data, function(key, val) {
                            keys += 1;
                            table.row.add([
                                '<input id="sys_id_bank_list_third' + keys + '" value="' + val.sys_ID + '" type="hidden">' + no++,
                                val.acronym || '-',
                                val.name || '-'
                            ]).draw();
                        });

                        $("#tableGetBankListThird_length").show();
                        $("#tableGetBankListThird_filter").show();
                        $("#tableGetBankListThird_info").show();
                        $("#tableGetBankListThird_paginate").show();
                    } else {
                        $(".errorMessageContainerThird").show();
                        $("#errorMessageThird").text(`Data not found.`);

                        $("#tableGetBankListThird_length").hide();
                        $("#tableGetBankListThird_filter").hide();
                        $("#tableGetBankListThird_info").hide();
                        $("#tableGetBankListThird_paginate").hide();
                    }
                } else {
                    $(".loadingGetBankName").hide();

                    var no = 1;
                    var table = $('#tableGetBankList').DataTable();
                    table.clear();

                    if (Array.isArray(data.data) && data.data.length > 0) {
                        $.each(data.data, function(key, val) {
                            keys += 1;
                            table.row.add([
                                '<input id="sys_id_bank_list' + keys + '" value="' + val.sys_ID + '" type="hidden">' + no++,
                                val.acronym || '-',
                                val.name || '-'
                            ]).draw();
                        });

                        $("#tableGetBankList_length").show();
                        $("#tableGetBankList_filter").show();
                        $("#tableGetBankList_info").show();
                        $("#tableGetBankList_paginate").show();
                    } else {
                        $(".errorMessageContainer").show();
                        $("#errorMessage").text(`Data not found.`);

                        $("#tableGetBankList_length").hide();
                        $("#tableGetBankList_filter").hide();
                        $("#tableGetBankList_info").hide();
                        $("#tableGetBankList_paginate").hide();
                    }
                }
            },
            error: function (textStatus, errorThrown) {
                if (source === "second_modal") {
                    $('#tableGetBankListSecond tbody').empty();
                    $(".loadingGetBankNameSecond").hide();
                    $(".errorMessageContainerSecond").show();
                    $("#errorMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                } else if (source === "third_modal") {
                    $('#tableGetBankListThird tbody').empty();
                    $(".loadingGetBankNameThird").hide();
                    $(".errorMessageContainerThird").show();
                    $("#errorMessageThird").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                } else {
                    $('#tableGetBankList tbody').empty();
                    $(".loadingGetBankName").hide();
                    $(".errorMessageContainer").show();
                    $("#errorMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                }
            }
        });
    }

    // PILIH BANK PADA MODAL BANK NAME
    $('#tableGetBankList').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[type="hidden"]').val();
        var bankAcronym = $(this).find('td:nth-child(2)').text();
        var bankFullName = $(this).find('td:nth-child(3)').text();

        $('#bank_list_name').val(bankAcronym);
        $('#bank_list_code').val(sysId);
        $('#bank_list_detail').val(bankFullName);

        adjustInputSize(document.getElementById("bank_list_name"), "string");

        $('#myGetBankList').modal('hide');
    });

    // PILIH BANK PADA MODAL BANK NAME
    $('#tableGetBankListSecond').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[type="hidden"]').val();
        var bankAcronym = $(this).find('td:nth-child(2)').text();
        var bankFullName = $(this).find('td:nth-child(3)').text();

        $('#bank_list_second_name').val(bankAcronym);
        $('#bank_list_second_code').val(sysId);
        $('#bank_list_second_detail').val(bankFullName);

        adjustInputSize(document.getElementById("bank_list_second_name"), "string");

        $('#myGetBankListSecond').modal('hide');
    });

    // PILIH BANK PADA MODAL BANK NAME
    $('#tableGetBankListThird').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[type="hidden"]').val();
        var bankAcronym = $(this).find('td:nth-child(2)').text();
        var bankFullName = $(this).find('td:nth-child(3)').text();

        $('#bank_list_third_name').val(bankAcronym);
        $('#bank_list_third_code').val(sysId);
        $('#bank_list_third_detail').val(bankFullName);

        adjustInputSize(document.getElementById("bank_list_third_name"), "string");

        $('#myGetBankListThird').modal('hide');
    });

    $(window).one('load', function(e) {
        getBankNameList();
        getBankNameList('second_modal');
        getBankNameList('third_modal');
    });
</script>