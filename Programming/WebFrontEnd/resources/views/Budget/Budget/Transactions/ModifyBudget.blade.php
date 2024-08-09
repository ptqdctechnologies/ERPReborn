@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProduct')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITTLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px; display: flex; align-items: center; font-size:15px; color:white;">
                    Modify Budget
                </div>
            </div>

            <!-- CONTENT -->
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Add New AFE (Approval For Expenditure)
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body p-3">
                                    <!-- BUDGET CODE -->
                                    <div class="row" style="margin-bottom: 1rem;">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label p-0">Budget Code</label>
                                        <div class="col-sm-3">
                                            <div class="row">
                                                <div class="col-sm-4 p-0" style="display: flex;">
                                                    <div style="flex: 1;">
                                                        <input id="projectcode" style="border-radius:0;" name="projectcode" class="form-control" readonly>
                                                    </div>
                                                    
                                                    <div>
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#" id="projectcode2" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-8 p-0">
                                                    <div class="input-group">
                                                        <input id="projectname" style="border-radius:0;" class="form-control" name="projectname" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SUB BUDGET CODE -->
                                    <div class="row" style="margin-bottom: 1rem;">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label p-0">Sub Budget Code</label>
                                        <div class="col-sm-3">
                                            <div class="row">
                                                <div class="col-sm-4 p-0" style="display: flex;">
                                                    <div style="flex: 1;">
                                                        <input id="projectcode" style="border-radius:0;" name="projectcode" class="form-control" readonly>
                                                    </div>
                                                    
                                                    <div>
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#" id="projectcode2" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-8 p-0">
                                                    <div class="input-group">
                                                        <input id="projectname" style="border-radius:0;" class="form-control" name="projectname" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- REASON FOR MODIFY -->
                                    <div class="row" style="margin-bottom: 1rem;">
                                        <label for="reason_modify" class="col-sm-2 col-form-label p-0">Reason for Modify</label>
                                        <div class="col-sm-3 p-0">
                                            <div class="input-group">
                                                <input id="reason_modify" style="border-radius:0;" class="form-control" name="reason_modify">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ADDITIONAL CO -->
                                    <div class="row" style="">
                                        <label for="reason_modify" class="col-sm-2 col-form-label p-0">Additional CO</label>
                                        <div class="col-sm-3 p-0" style="display: flex; gap: 16px;">
                                            <div>
                                                <input type="radio" name="radio1">
                                                <label>Yes</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="radio1">
                                                <label>No</label>
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