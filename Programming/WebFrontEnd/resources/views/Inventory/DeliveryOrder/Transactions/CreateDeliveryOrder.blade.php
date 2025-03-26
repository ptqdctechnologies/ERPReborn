@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('Inventory.DeliveryOrder.Functions.PopUp.PopUpDoRevision')
@include('getFunction.getReferenceNumber')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Delivery Order
                    </label>
                </div>
            </div>

            @include('Inventory.DeliveryOrder.Functions.Menu.MenuDeliveryOrder')
            @if($var == 0)
            <div class="card">

                <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- HEADER -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Add New Delivery Order
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- BODY -->
                                <div class="card-body">
                                    <div class="row py-3" style="gap: 15px;">
                                        <div class="col-md-12 col-lg-5">
                                            <div class="row">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                    Reference Number
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="reference_number" style="border-radius:0;" name="reference_number" class="form-control" size="20" readonly>
                                                        <input id="reference_id" style="border-radius:0;" name="reference_id" class="form-control" hidden>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                          <a href="javascript:;" id="referenceNumberTrigger" data-toggle="modal" data-target="#referenceNumberModal" style="display: block;">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="referenceNumberTrigger">
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
            @endif
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Inventory.DeliveryOrder.Functions.Footer.FooterDeliveryOrder')
@endsection