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

                                <!-- <div class="card-body">
                                    <div class="row pt-3">
                                        NEW FOLDER
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            New Folder
                                        </button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        NEW MENU
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalNewMenu">
                                            New Menu
                                        </button>
                                        <div class="modal fade" id="exampleModalNewMenu" tabindex="-1" aria-labelledby="exampleModalNewMenuLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalNewMenuLabel">Modal New Menu</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        DELETE
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalDelete">
                                            Delete
                                        </button>
                                        <div class="modal fade" id="exampleModalDelete" tabindex="-1" aria-labelledby="exampleModalDeleteLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalDeleteLabel">Modal Delete</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col px-0">
                                            <div class="spinner-border spinner-border-sm spinner-sub-menu" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <nav class="p-0 col-12">
                                                <ul class="nav-sidebar p-0 data-menu-management" data-widget="treeviews" role="menu" data-accordion="false">

                                                </ul>
                                            </nav>
                                        </div>
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
        $('.data-menu-management').hide();

        $.ajax({
            type: 'GET',
            url: '{!! route("getOneSubMenu") !!}',
            data: { selectedValue: selectedValue },
            success: function(data) {
                var resultArray = Array.isArray(data) ? data : Object.values(data);

                var groupedData = resultArray.reduce(function(acc, item) {
                    if (!acc[item.Type]) {
                        acc[item.Type] = [];
                    }
                    acc[item.Type].push(item);
                    return acc;
                }, {});

                if (resultArray.length > 0) {
                    var displayData = '';
                    var no = 1;

                    if (groupedData.Transaction) {
                        displayData += `<li class="nav-item has-treeview" style="list-style-type: none;">`;
                        displayData += `<a href="#" class="nav-link d-flex align-items-center">`;
                        displayData += `<i class="fas fa-folder" style="font-size: 14px; margin-right: 0.4rem;"></i>`;
                        displayData += `<div class="d-flex align-items-center justify-content-between" style="width: 100%; font-size: 14px; font-weight: 400; line-height: 1.5;">`;
                        displayData += `<div>Transaction</div>`;
                        displayData += `<i class="right fas fa-angle-left"></i>`;
                        displayData += `</div>`;
                        displayData += `</a>`;
                        groupedData.Transaction.forEach(function(item) {
                            displayData += `<ul class="nav nav-treeview">`;
                            displayData += `<li class="nav-item">`;
                            displayData += `<a href="#" class="nav-link d-flex align-items-center">`;
                            displayData += `<i class="far fa-file nav-icon" style="font-size: 14px;"></i>`;
                            displayData += `<p>${item.Caption}</p>`;
                            displayData += `</a>`;
                            displayData += `</li>`;
                            displayData += `</ul>`;
                        });
                        displayData += `</li>`;
                    }

                    if (groupedData.Report) {
                        displayData += `<li class="nav-item has-treeview" style="list-style-type: none;">`;
                        displayData += `<a href="#" class="nav-link d-flex align-items-center">`;
                        displayData += `<i class="fas fa-folder" style="font-size: 14px; margin-right: 0.4rem;"></i>`;
                        displayData += `<div class="d-flex align-items-center justify-content-between" style="width: 100%; font-size: 14px; font-weight: 400; line-height: 1.5;">`;
                        displayData += `<div>Report</div>`;
                        displayData += `<i class="right fas fa-angle-left"></i>`;
                        displayData += `</div>`;
                        displayData += `</a>`;
                        groupedData.Report.forEach(function(item) {
                            displayData += `<ul class="nav nav-treeview">`;
                            displayData += `<li class="nav-item">`;
                            displayData += `<a href="#" class="nav-link d-flex align-items-center">`;
                            displayData += `<i class="far fa-file nav-icon" style="font-size: 14px;"></i>`;
                            displayData += `<p>${item.Caption}</p>`;
                            displayData += `</a>`;
                            displayData += `</li>`;
                            displayData += `</ul>`;

                        });
                        displayData += `</li>`;
                    }

                    $('.data-menu-management').show();
                    $('.data-menu-management').html(displayData);
                    $('.spinner-sub-menu').hide();
                } else {
                    $('.data-menu-management').html('No data available for this navigation.');
                }
            },
            error: function(xhr, status, error) {
                $('.spinner-sub-menu').hide();
                $('.data-menu-management').html('No data available for this navigation.');
                Swal.fire("Error", "Failed to Get Sub Menu Data", "error");
            }
        });
    }

    $('#menuSelect').on('input', function() {
        loadSubMenu($(this).val());
    });
</script>
@endsection