<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-3">
            <!-- WORK CODE -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Work
                    Code</label>
                <div class="col-6 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="work_code" name="work_code" style="border-radius:0;"
                            autocomplete="off" value="<?= isset($workCode) ? $workCode : ''; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row" id="workCodeMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="workCodeMessageText"></div>
            </div>

            <!-- WORK NAME -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Work
                    Name</label>
                <div class="col-6 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="work_name" name="work_name" style="border-radius:0;"
                            autocomplete="off" value="<?= isset($workName) ? $workName : ''; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row" id="workNameMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="workNameMessageText"></div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- STATUS -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">Work Status</label>
                <div class="col-4 d-flex" style="gap: 1rem;">
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="work_status" id="active"
                            <?= isset($workStatus) && $workStatus == 1 ? 'checked' : ''; ?> />
                        <label class="form-check-label" for="active">Active</label>
                    </div>
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="work_status" id="inactive"
                            <?= isset($workStatus) && $workStatus == 0 ? 'checked' : ''; ?> />
                        <label class="form-check-label" for="inactive">Inactive</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>