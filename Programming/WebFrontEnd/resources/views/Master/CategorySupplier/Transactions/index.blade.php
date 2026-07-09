@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getSupplierCategory')
    @include('Master.CategorySupplier.Functions.PopUp.PopUpCategorySupplierRevision')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Category Supplier
                        </label>
                    </div>
                </div>

                @include('Master.CategorySupplier.Functions.Menu.index')
            </div>
        </section>
    </div>

    @include('Partials.footer')
    @include('Master.CategorySupplier.Functions.Footer.index')
@endsection