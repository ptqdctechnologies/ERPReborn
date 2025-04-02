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
                        Revision Delivery Order
                    </label>
                </div>
            </div>

            @include('Inventory.DeliveryOrder.Functions.Menu.MenuDeliveryOrder')
        </div>
    </section>
</div>

@include('Partials.footer')
@endsection