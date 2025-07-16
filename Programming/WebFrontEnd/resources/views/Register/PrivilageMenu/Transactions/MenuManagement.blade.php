@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE MENU MANAGEMENT -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Menu Management</label>
                </div>
            </div>

            <div class="card">
                <!-- MODULE CARD -->
                <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- TITLE -->
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

                                <!-- SELECT COMPONENT -->
                                <div class="card-body">
                                    <div class="row py-3">
                                        <label class="col-2 col-form-label p-0">Select Menu</label>
                                        <div class="col-3 menuOption">
                                            <select class="form-control" id="menuSelect" style="width: 100%;"></select>
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

                <!-- NAVIGATION CARD -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- TITLE -->
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

                                <!-- BUTTON -->
                                <div class="card-body pb-0 pt-3">
                                    <div class="row" style="gap: 8px;">
                                        <!-- NEW FOLDER -->
                                        <div>
                                            <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modalNewFolder" style="font-size: 12px; gap: 4px; width: max-content; height: 30px;">
                                                <i class="fas fa-plus-circle"></i>
                                                New Folder
                                            </button>
                                        </div>

                                        <!-- NEW MENU -->
                                        <div>
                                            <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modalNewMenu" style="font-size: 12px; gap: 4px; width: max-content; height: 30px;">
                                                <i class="fas fa-plus-circle"></i>
                                                New Menu
                                            </button>
                                        </div>

                                        <!-- DELETE -->
                                        <div>
                                            <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#modalDelete" style="font-size: 12px; gap: 4px; width: max-content; height: 30px;">
                                                <i class="fas fa-minus-circle"></i>
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- DATA -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col px-0">
                                            <!-- LOADING ANIMATION -->
                                            <div class="spinner-border spinner-border-sm spinner-sub-menu" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>

                                            <!-- DATA LISTS -->
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

<!-- MODAL ADD NEW FOLDER -->
<div class="modal fade" id="modalNewFolder" tabindex="-1" aria-labelledby="modalNewFolderLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h5 style="font-size: 16px;">
                    Add New Folder
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="menu_caption" class="col-3 col-form-label" style="font-size: 14px;">Menu Caption</label>
                    <div class="col-9 d-flex">
                        <input id="menu_caption" class="form-control" name="menu_caption" autocomplete="off" style="border-radius:0; margin: auto;">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu_id" class="col-3 col-form-label" style="font-size: 14px;">Menu ID</label>
                    <div class="col-9 d-flex">
                        <input id="menu_id" class="form-control" name="menu_id" autocomplete="off" style="border-radius:0; margin: auto;">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type_folder" class="col-3 col-form-label" style="font-size: 14px;">Type</label>
                    <div class="col-9 d-flex">
                        <select id="type_folder" class="custom-select" style="border-radius: 0; font-size: 0.875rem; padding: .10rem .10rem; margin: auto;">
                            <option value="Transaction">Transaction</option>
                            <option value="Report">Report</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addNewFolder()">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ADD NEW MENU -->
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
                    <label for="new_menu_caption" class="col-3 col-form-label pt-0" style="font-size: 14px;">Menu Caption</label>
                    <div class="col">
                        <div class="input-group">
                            <input id="new_menu_caption" style="border-radius:0;" class="form-control" name="new_menu_caption" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="new_menu_id" class="col-3 col-form-label pt-0" style="font-size: 14px;">Menu ID</label>
                    <div class="col">
                        <div class="input-group">
                            <input id="new_menu_id" style="border-radius:0;" class="form-control" name="new_menu_id" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="new_menu_link" class="col-3 col-form-label pt-0" style="font-size: 14px;">Link</label>
                    <div class="col">
                        <div class="input-group">
                            <input id="new_menu_link" style="border-radius:0;" class="form-control" name="new_menu_link" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="new_type_folder" class="col-3 col-form-label pt-0" style="font-size: 14px;">Type</label>
                    <div class="col">
                        <div class="input-group">
                            <select id="new_type_folder" class="custom-select" style="width: 100%; padding: .10rem .10rem; font-size: 0.75rem; border-radius: 0;">
                                <option value="Transaction">TRANSACTION</option>
                                <option value="Report">REPORT</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="padding: .275rem .75rem; font-size: 16px;">Close</button>
                <button type="button" class="btn btn-primary" onclick="addNewSubMenu()" style="padding: .275rem .75rem; font-size: 16px;">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DELETE -->
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

<!-- MODAL CONFIRM PIN -->
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
@include('Register.PrivilageMenu.Functions.Footer.FooterMenuManagement')
@endsection