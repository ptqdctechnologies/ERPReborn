@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Menu Management</label>
                </div>
            </div>

            <div class="card">
                <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Module
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row py-3">
                                        <label class="col-2 col-form-label p-0">Select Menu</label>
                                        <div class="col-3 menuOption">
                                            <select class="form-control select2" id="menuSelect" style="width: 100%;"></select>
                                        </div>
                                        <div class="spinner-border spinner-border-sm spinner-menu" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Navigation
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body testing">
                                    <div class="spinner-border spinner-border-sm spinner-sub-menu" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
<script>
    $(window).one('load', function(e) {
        e.preventDefault();

        var keys = 0;

        $('.menuOption').hide();

        $.ajax({
            type: 'GET',
            url: '{!! route("getMenuGroup") !!}',
            success: function(data) {
                data.forEach(function(item) {
                    var option = $('<option>', {
                        value: item.Sys_ID,
                        text: item.Name
                    });

                    $('#menuSelect').append(option);
                });

                $('#menuSelect').select2();
                $('.menuOption').show();
                $('.spinner-menu').hide();

                loadSubMenu($('#menuSelect').val());
            },
            error: function(xhr, status, error) {
                Swal.fire("Error", "Failed to Get Menu Data", "error");
            }
        });
    });

    function loadSubMenu(selectedValue) {
        $('.spinner-sub-menu').show();
        $('.testing').hide();

        $.ajax({
            type: 'GET',
            url: '{!! route("getOneSubMenu") !!}',
            data: { selectedValue: selectedValue },
            success: function(data) {
                var resultArray = Array.isArray(data) ? data : Object.values(data);

                if (resultArray.length > 0) {
                    var displayData = '';
                    var no = 1;
                    resultArray.forEach(function(item) {
                        displayData += `<div>Nomor: ${no++}</div>`;
                        displayData += `<div>Menu Group RefID: ${item.MenuGroup_RefID}</div>`;
                        displayData += `<div>Order Sequence: ${item.OrderSequence}</div>`;
                        displayData += `<div>Sys Branch RefID: ${item.Sys_Branch_RefID}</div>`;
                        displayData += `<div>Sys ID: ${item.Sys_ID}</div>`;
                        displayData += `<div>Sys PID: ${item.Sys_PID}</div>`;
                        displayData += `<div>Sys RPK: ${item.Sys_RPK}</div>`;
                        displayData += `<div>Sys SID: ${item.Sys_SID}</div>`;
                    });

                    $('.testing').show();
                    $('.testing').html(displayData);
                    $('.spinner-sub-menu').hide();
                } else {
                    $('.testing').html('No data available for this selection.');
                }
            },
            error: function(xhr, status, error) {
                Swal.fire("Error", "Failed to Get Menu Data", "error");
            }
        });
    }

    $('#menuSelect').on('input', function() {
        loadSubMenu($(this).val());
    });
</script>

<!-- <script>
    $('#menuSelect').on('load', function() {
        var selectedValue = $(this).val();

        $.ajax({
            type: 'GET',
            url: '{!! route("getOneSubMenu") !!}',
            data: { selectedValue: selectedValue },
            success: function(data) {
                var resultArray = Array.isArray(data) ? data : Object.values(data);
                
                if (resultArray.length > 0) {
                    var displayData = '';
                    var no = 1;
                    resultArray.forEach(function(item) {
                        displayData += `<div>Nomor: ${no++}</div>`;
                        displayData += `<div>Menu Group RefID: ${item.MenuGroup_RefID}</div>`;
                        displayData += `<div>Order Sequence: ${item.OrderSequence}</div>`;
                        displayData += `<div>Sys Branch RefID: ${item.Sys_Branch_RefID}</div>`;
                        displayData += `<div>Sys ID: ${item.Sys_ID}</div>`;
                        displayData += `<div>Sys PID: ${item.Sys_PID}</div>`;
                        displayData += `<div>Sys RPK: ${item.Sys_RPK}</div>`;
                        displayData += `<div>Sys SID: ${item.Sys_SID}</div>`;
                    });

                    $('.testing').html(displayData);
                } else {
                    $('.testing').html('No data available for this selection.');
                }
            },
            error: function(xhr, status, error) {
                Swal.fire("Error", "Failed to Get Menu Data", "error");
            }
        });
    });
</script> -->
@endsection