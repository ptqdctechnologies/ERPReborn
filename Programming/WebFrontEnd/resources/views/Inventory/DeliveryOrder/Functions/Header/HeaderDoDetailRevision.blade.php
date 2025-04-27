<!-- BODY -->
<div class="card-body">
    <div class="row py-3" style="gap: 15px;">
        <!-- LEFT COLUMN -->
        <div class="col-md-12 col-lg-5">
            <!-- TRANSPORTER -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Transporter
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="transporter_name" style="border-radius:0;" class="form-control" size="20" value="<?= $Data[0]['transporterName'] ?? ''; ?>" readonly>
                        <input id="transporter_id" style="border-radius:0;" name="transporter_id" class="form-control" hidden>
                    </div>
                    <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control myTransporter">
                            <a href="javascript:;" id="myTransporterTrigger" data-toggle="modal" data-target="#myTransporter" style="display: block;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myTransporterTrigger">
                            </a>
                        </span>
                    </div>
                </div>
            </div>

            <!-- TRANS. PHONE -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Trans. Phone
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="transporter_phone" style="border-radius:0;" class="form-control" size="20" value="<?= $Data[0]['transporterPhone'] ?? ''; ?>" readonly>
                    </div>
                </div>
            </div>

            <!-- TRANS. FAX -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Trans. Fax
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="transporter_fax" style="border-radius:0;" class="form-control" size="20" value="<?= $Data[0]['transporterFax'] ?? ''; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-md-12 col-lg-5">
            <!-- TRANS. CONTACT PERSON -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Trans. Contact Person
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="transporter_contact" style="border-radius:0;" class="form-control" size="20" value="<?= $Data[0]['transporterContactPerson'] ?? ''; ?>" readonly>
                    </div>
                </div>
            </div>

            <!-- TRANS. HANDPHONE -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Trans. Handphone
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="transporter_handphone" style="border-radius:0;" class="form-control" size="20" value="<?= $Data[0]['transporterHandphone'] ?? ''; ?>" readonly>
                    </div>
                </div>
            </div>

            <!-- TRANS. ADDRESS -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Trans. Address
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <textarea id="transporter_address" rows="3" style="border-radius:0;" class="form-control" readonly><?= $Data[0]['transporterAddress'] ?? ''; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>