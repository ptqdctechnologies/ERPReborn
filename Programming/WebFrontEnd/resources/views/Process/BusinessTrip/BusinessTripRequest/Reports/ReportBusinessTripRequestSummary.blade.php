@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Business Trip Request Report Summary</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12 ShowDocument">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Budget</label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="project_code" style="border-radius:0;" name="project_code" class="form-control" size="17" readonly>
                                                        <input id="project_id" style="border-radius:0;" name="project_id" class="form-control" readonly hidden>
                                                    </div>
                                                    <div>
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="javascript:;" id="myProjectSecond" data-toggle="modal" data-target="#myProjectSecond">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecond">
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Sub Budget</label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="site_code" style="border-radius:0;" name="site_code" class="form-control" size="17" readonly>
                                                        <input id="site_id" style="border-radius:0;" name="site_id" class="form-control" readonly hidden>
                                                    </div>
                                                    <div>
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="javascript:;" id="mySiteCodeSecond" data-toggle="modal" data-target="#mySiteCodeSecond">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecond">
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Requester</label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="requester_name" style="border-radius:0;" name="requester_name" class="form-control" size="17" readonly>
                                                        <input id="requester_id" style="border-radius:0;" name="requester_id" class="form-control" readonly hidden>
                                                    </div>
                                                    <div>
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="javascript:;" id="myRequesterSecond" data-toggle="modal" data-target="#myRequesterSecond">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myRequesterSecond">
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Beneficiary</label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="beneficiary_name" style="border-radius:0;" name="beneficiary_name" class="form-control" size="17" readonly>
                                                        <input id="beneficiary_id" style="border-radius:0;" name="beneficiary_id" class="form-control" readonly hidden>
                                                    </div>
                                                    <div>
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="javascript:;" id="myBeneficiarySecond" data-toggle="modal" data-target="#myBeneficiarySecond">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                                            </a>
                                                        </span>
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
        </div>
    </section>
</div>

@include('Partials.footer')
@endsection