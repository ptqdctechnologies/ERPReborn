@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Create Supplier
                        </label>
                    </div>
                </div>

                @include('Master.Supplier.Functions.Menu.MenuSupplier')

                <div class="card">
                    <!-- MASTER SUPPLIER -->
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Master Supplier
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                aria-label="Collapse Section Budget Information">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    <div class="card-body">
                                        <div class="row py-3" style="gap: 1rem;">
                                            <!-- LEFT -->
                                            <div class="col-md-12 col-lg-5">
                                                <!-- SUPPLIER NAME -->
                                                <div class="row">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier
                                                        Name</label>
                                                    <div class="col-5 d-flex">
                                                        <div class="input-group">
                                                            <input class="form-control" id="supplier_name"
                                                                name="supplier_name" style="border-radius:0;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- TAX ID -->
                                                <div class="row" style="margin-top: 1rem;">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Tax
                                                        ID</label>
                                                    <div class="col-5 d-flex">
                                                        <div class="input-group">
                                                            <input class="form-control" id="tax_id" name="tax_id"
                                                                style="border-radius:0;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- PHONE -->
                                                <div class="row" style="margin-top: 1rem;">
                                                    <label
                                                        class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Phone</label>
                                                    <div class="col-5 d-flex">
                                                        <div class="input-group">
                                                            <input class="form-control" id="phone_number"
                                                                name="phone_number" style="border-radius:0;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- EMAIL -->
                                                <div class="row" style="margin-top: 1rem;">
                                                    <label
                                                        class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Email</label>
                                                    <div class="col-5 d-flex">
                                                        <div class="input-group">
                                                            <input class="form-control" id="email" name="email"
                                                                style="border-radius:0;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- COUNTRY -->
                                                <div class="row" style="margin-top: 1rem;">
                                                    <label
                                                        class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Country</label>
                                                    <div class="col-5 d-flex">
                                                        <div>
                                                            <span style="border-radius:0;"
                                                                class="input-group-text form-control">
                                                                <a href="javascript:;" id="myBanksTrigger"
                                                                    data-toggle="modal" data-target="#myBanks">
                                                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}"
                                                                        width="13" alt="myBanksTrigger">
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <div style="flex: 100%;">
                                                            <div class="input-group">
                                                                <input id="bank_name_second_detail"
                                                                    style="border-radius:0; background-color: white;"
                                                                    class="form-control" name="bank_name_detail" readonly>
                                                                <input id="bank_name_second_name" style="border-radius:0;"
                                                                    name="bank_name" class="form-control" hidden>
                                                                <input id="bank_name_second_id" style="border-radius:0;"
                                                                    class="form-control" name="bank_code" hidden>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- PROVINCE -->
                                                <div class="row" style="margin-top: 1rem;">
                                                    <label
                                                        class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Province</label>
                                                    <div class="col-5 d-flex">
                                                        <div>
                                                            <span style="border-radius:0;"
                                                                class="input-group-text form-control">
                                                                <a href="javascript:;" id="myBanksTrigger"
                                                                    data-toggle="modal" data-target="#myBanks">
                                                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}"
                                                                        width="13" alt="myBanksTrigger">
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <div style="flex: 100%;">
                                                            <div class="input-group">
                                                                <input id="bank_name_second_detail"
                                                                    style="border-radius:0; background-color: white;"
                                                                    class="form-control" name="bank_name_detail" readonly>
                                                                <input id="bank_name_second_name" style="border-radius:0;"
                                                                    name="bank_name" class="form-control" hidden>
                                                                <input id="bank_name_second_id" style="border-radius:0;"
                                                                    class="form-control" name="bank_code" hidden>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- CITY -->
                                                <div class="row" style="margin-top: 1rem;">
                                                    <label
                                                        class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">City</label>
                                                    <div class="col-5 d-flex">
                                                        <div>
                                                            <span style="border-radius:0;"
                                                                class="input-group-text form-control">
                                                                <a href="javascript:;" id="myBanksTrigger"
                                                                    data-toggle="modal" data-target="#myBanks">
                                                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}"
                                                                        width="13" alt="myBanksTrigger">
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <div style="flex: 100%;">
                                                            <div class="input-group">
                                                                <input id="bank_name_second_detail"
                                                                    style="border-radius:0; background-color: white;"
                                                                    class="form-control" name="bank_name_detail" readonly>
                                                                <input id="bank_name_second_name" style="border-radius:0;"
                                                                    name="bank_name" class="form-control" hidden>
                                                                <input id="bank_name_second_id" style="border-radius:0;"
                                                                    class="form-control" name="bank_code" hidden>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- ADDRESS -->
                                                <div class="row" style="margin-top: 1rem;">
                                                    <label
                                                        class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Address</label>
                                                    <div class="col-5">
                                                        <textarea id="address" name="address" cols="30" rows="4"
                                                            class="form-control" autocomplete="off"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- RIGHT -->
                                            <div class="col-md-12 col-lg-5">
                                                <!-- CONTACT PERSON -->
                                                <div class="row">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Contact
                                                        Person</label>
                                                    <div class="col-5 d-flex">
                                                        <div class="input-group">
                                                            <input class="form-control" id="contact_person"
                                                                name="contact_person" style="border-radius:0;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- BANK NAME -->
                                                <div class="row" style="margin-top: 1rem;">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank
                                                        Name</label>
                                                    <div class="col-5 d-flex">
                                                        <div>
                                                            <span style="border-radius:0;"
                                                                class="input-group-text form-control">
                                                                <a href="javascript:;" id="myBanksTrigger"
                                                                    data-toggle="modal" data-target="#myBanks">
                                                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}"
                                                                        width="13" alt="myBanksTrigger">
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <div style="flex: 100%;">
                                                            <div class="input-group">
                                                                <input id="bank_name_second_detail"
                                                                    style="border-radius:0; background-color: white;"
                                                                    class="form-control" name="bank_name_detail" readonly>
                                                                <input id="bank_name_second_name" style="border-radius:0;"
                                                                    name="bank_name" class="form-control" hidden>
                                                                <input id="bank_name_second_id" style="border-radius:0;"
                                                                    class="form-control" name="bank_code" hidden>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- ACCOUNT NUMBER -->
                                                <div class="row" style="margin-top: 1rem;">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account
                                                        Number</label>
                                                    <div class="col-5 d-flex">
                                                        <div class="input-group">
                                                            <input class="form-control" id="account_number"
                                                                name="account_number" style="border-radius:0;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- ACCOUNT NAME -->
                                                <div class="row" style="margin-top: 1rem;">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account
                                                        Name</label>
                                                    <div class="col-5 d-flex">
                                                        <div class="input-group">
                                                            <input class="form-control" id="account_name"
                                                                name="account_name" style="border-radius:0;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- REMARK -->
                                                <div class="row" style="margin-top: 1rem;">
                                                    <label
                                                        class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Remark</label>
                                                    <div class="col-5">
                                                        <textarea name="internalNote" id="internalNote" cols="30" rows="4"
                                                            class="form-control" autocomplete="off"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TYPE -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Type
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                aria-label="Collapse Section Budget Information">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    <div class="card-body">
                                        <div class="row py-3" style="gap: 1rem;">
                                            <!-- LEFT -->
                                            <div class="col-md-12 col-lg-5">
                                                <!-- LEGAL ENTITY -->
                                                <div class="row">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Legal
                                                        Entity</label>
                                                    <div class="col-5">
                                                        <select class="form-control" id="legal_entity" name="legal_entity"
                                                            style="border-radius:0;" type="text">
                                                            <option disabled selected>Select a Legal Entity</option>
                                                            <option>PT (Perseroan Terbatas)</option>style="margin-top:
                                                            1rem;"
                                                            <option>CV (Commanditaire Vennootschap)</option>
                                                            <option>Koperasi</option>
                                                            <option>Yayasan</option>
                                                            <option>Firma (Fa)</option>
                                                            <option>Usaha Perseorangan</option>
                                                            <option>Bentuk Lain Khusus (BUT)</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- SUPPLIER CATEGORY -->
                                                <div class="row" style="margin-top: 1rem;">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier
                                                        Category</label>
                                                    <div class="col-5">
                                                        <div class="d-flex">
                                                            <div class="form-group w-100">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        style="margin-top: 0;">
                                                                    <label class="form-check-label">Mandor</label>
                                                                </div>
                                                                <div class="form-check" style="margin-top: .5rem;">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        style="margin-top: 0;">
                                                                    <label class="form-check-label">Manufacture</label>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <button type="button"
                                                                    class="btn btn-default btn-sm float-right"
                                                                    style="background-color:#e9ecef;border:1px solid #ced4da;width:max-content;">
                                                                    Add New
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- RIGHT -->
                                            <div class="col-md-12 col-lg-5">
                                                <!-- SUPPLIER CATEGORY -->
                                                <div class="row">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier
                                                        Category</label>
                                                    <div class="col-5">
                                                        <div class="d-flex">
                                                            <div class="form-group w-100">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        style="margin-top: 0;">
                                                                    <label class="form-check-label">Sipil</label>
                                                                </div>
                                                                <div class="form-check" style="margin-top: .5rem;">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        style="margin-top: 0;">
                                                                    <label class="form-check-label">Tower</label>
                                                                </div>
                                                                <div class="form-check" style="margin-top: .5rem;">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        style="margin-top: 0;">
                                                                    <label class="form-check-label">Electrical</label>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <button type="button"
                                                                    class="btn btn-default btn-sm float-right"
                                                                    style="background-color:#e9ecef;border:1px solid #ced4da;width:max-content;">
                                                                    Add New
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FILE ATTACHMENT -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Attachment
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    <div class="card-body">
                                        <div class="row py-3">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <div class="col p-0">
                                                        <input type="text" id="dataInput_Log_FileUpload"
                                                            name="dataInput_Log_FileUpload_1" style="display:none">
                                                        <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken,
        'dataInput_Log_FileUpload',
        null,
        'dataInput_Return'
    ) .
        ''; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BUTTON -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()"
                                    style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt=""
                                        title="Submit to Account Payable"> Submit
                                </button>
                                <button type="button" class="btn btn-default btn-sm float-right"
                                    onclick="cancelForm('{{ route('Supplier.index') }}')"
                                    style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt=""
                                        title="Cancel to Account Payable"> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('Partials.footer')
@endsection