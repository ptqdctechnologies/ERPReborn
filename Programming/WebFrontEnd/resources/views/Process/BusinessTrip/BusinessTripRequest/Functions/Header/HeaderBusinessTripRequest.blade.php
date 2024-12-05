<div class="row py-3 justify-content-between" style="gap: 15px;">
    <div class="col-md-12 col-lg-5">
        <div class="row">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                <div>
                    <input id="projectcode" style="border-radius:0; width: 60px;" name="projectcode" class="form-control" readonly>
                </div>
                <div>
                    <span style="border-radius:0;" class="input-group-text form-control">
                        <a href="#" id="projectcode2" data-toggle="modal" data-target="#myProject" class="myProject">
                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                        </a>
                    </span>
                </div>
                <div style="flex: 100%;">
                    <div class="input-group">
                        <input id="projectname" style="border-radius:0;" class="form-control" name="projectname" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-5">
        <div class="row">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget Code</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                <div>
                    <input id="sitecode" style="border-radius:0; width: 60px;" name="sitecode" class="form-control" readonly>
                </div>
                <div>
                    <span style="border-radius:0;" class="input-group-text form-control">
                        <a href="#" id="sitecode2" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                    </span>
                </div>
                <div style="flex: 100%;">
                    <div class="input-group">
                        <input id="sitename" style="border-radius:0;" class="form-control" name="sitename" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>