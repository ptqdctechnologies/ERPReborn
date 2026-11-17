<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-4">
            <!-- GROUP CODE -->
            <div class="row">
                <label for="group_code" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Group
                    Code</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="group_code" name="group_code" style="border-radius:0;"
                            autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row" id="groupCodeMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="groupCodeMessageText"></div>
            </div>

            <!-- GROUP NAME -->
            <div class="row" style="margin-top: 1rem;">
                <label for="group_name" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Group
                    Name</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="group_name" name="group_name" style="border-radius:0;"
                            autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row" id="groupNameMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="groupNameMessageText"></div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-4"></div>
    </div>
</div>