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
                            Stock Opname
                        </label>
                    </div>
                </div>

                @include('Inventory.StockOpname.Functions.Menu.MenuStockOpname')
            </div>
        </section>
    </div>

    @include('Partials.footer')
@endsection