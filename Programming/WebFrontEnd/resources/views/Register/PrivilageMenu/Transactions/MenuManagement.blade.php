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

                                <div class="card-body pb-0 pt-3">
                                    <div class="row" style="gap: 8px;">
                                        <div>
                                            <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modalNewFolder" style="font-size: 12px; gap: 4px; width: max-content;">
                                                <i class="fas fa-plus-circle"></i>
                                                New Folder
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modalNewMenu" style="font-size: 12px; gap: 4px; width: max-content;">
                                                <i class="fas fa-plus-circle"></i>
                                                New Menu
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modalDelete" style="font-size: 12px; gap: 4px; width: max-content;">
                                                <i class="fas fa-minus-circle"></i>
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>

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

<!-- Modal New Folder -->
<div class="modal fade" id="modalNewFolder" tabindex="-1" aria-labelledby="modalNewFolderLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header align-items-center">
        <div style="font-size: 16px;">
            Add New Folder
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <label for="menu_caption" class="col-3 col-form-label pt-0" style="font-size: 14px;">Menu Caption</label>
            <div class="col">
                <div class="input-group">
                    <input id="menu_caption" style="border-radius:0;" class="form-control" name="menu_caption" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
            <label for="menu_id" class="col-3 col-form-label pt-0" style="font-size: 14px;">Menu ID</label>
            <div class="col">
                <div class="input-group">
                    <input id="menu_id" style="border-radius:0;" class="form-control" name="menu_id" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
            <label for="type_folder" class="col-3 col-form-label pt-0" style="font-size: 14px;">Type</label>
            <div class="col">
                <div class="input-group">
                    <select class="custom-select" style="width: 100%; padding: .10rem .10rem; font-size: 0.75rem; border-radius: 0;">
                        <option>REPORT</option>
                        <option>TRANSACTION</option>
                    </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="padding: .275rem .75rem; font-size: 16px;">Close</button>
        <button type="button" class="btn btn-primary" style="padding: .275rem .75rem; font-size: 16px;">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal New Menu -->
<div class="modal fade" id="modalNewMenu" tabindex="-1" aria-labelledby="modalNewMenuLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header align-items-center">
        <div style="font-size: 16px;">
            Add New Menu
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <label for="menu_caption" class="col-3 col-form-label pt-0" style="font-size: 14px;">Menu Caption</label>
            <div class="col">
                <div class="input-group">
                    <input id="menu_caption" style="border-radius:0;" class="form-control" name="menu_caption" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
            <label for="menu_id" class="col-3 col-form-label pt-0" style="font-size: 14px;">Menu ID</label>
            <div class="col">
                <div class="input-group">
                    <input id="menu_id" style="border-radius:0;" class="form-control" name="menu_id" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
            <label for="menu_link" class="col-3 col-form-label pt-0" style="font-size: 14px;">Link</label>
            <div class="col">
                <div class="input-group">
                    <input id="menu_link" style="border-radius:0;" class="form-control" name="menu_link" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
            <label for="type_folder" class="col-3 col-form-label pt-0" style="font-size: 14px;">Type</label>
            <div class="col">
                <div class="input-group">
                    <select class="custom-select" style="width: 100%; padding: .10rem .10rem; font-size: 0.75rem; border-radius: 0;">
                        <option>REPORT</option>
                        <option>TRANSACTION</option>
                    </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="padding: .275rem .75rem; font-size: 16px;">Close</button>
        <button type="button" class="btn btn-primary" style="padding: .275rem .75rem; font-size: 16px;">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header align-items-center">
        <div style="font-size: 16px;">
            Delete
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="font-size: 14px;">
            Are you sure delete this menu?
        </div>
      </div>
      <div class="modal-footer">
        <button
            type="button"
            class="btn btn-secondary"
            data-dismiss="modal"
            style="padding: .275rem .75rem; font-size: 16px;"
        >
            Close
        </button>
        <button
            type="button"
            class="btn btn-primary"
            data-dismiss="modal"
            data-toggle="modal"
            data-target="#modalPin"
            style="padding: .275rem .75rem; font-size: 16px;"
        >
            Submit
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal PIN -->
<div class="modal fade" id="modalPin" tabindex="-1" aria-labelledby="modalPinLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header align-items-center">
        <div style="font-size: 16px;">
            Confirmation PIN
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <label for="menu_password" class="col-form-label pt-0 pb-1" style="font-size: 14px;">To confirm, please enter your PIN below</label>
        </div>
        <div class="row">
            <div class="input-group">
                <input type="password" id="menu_password" class="form-control number-only" maxlength="6" autocomplete="off" autofocus required style="border-radius:0; font-size: 14px;">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="border-radius:0; height: 21.8px; font-size: 14px; padding: 0 0.5rem;">
                        Show
                    </button>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button
            type="button"
            class="btn btn-secondary"
            data-dismiss="modal"
            style="padding: .275rem .75rem; font-size: 16px;"
        >
            Close
        </button>
        <button type="button" class="btn btn-primary" style="padding: .275rem .75rem; font-size: 16px;">Submit</button>
      </div>
    </div>
  </div>
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

<!-- PASSWORD (MODAL DELETE) -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('#menu_password');

    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        // toggle the text of the button
        this.textContent = type === 'password' ? 'Show' : 'Hide';
    });
</script>
@endsection