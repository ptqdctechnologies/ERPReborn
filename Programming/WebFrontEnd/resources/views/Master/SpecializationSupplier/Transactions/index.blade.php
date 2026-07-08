@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getSupplierSpecialization')
    @include('Master.SpecializationSupplier.Functions.PopUp.PopUpSpecializationSupplierRevision')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Specialization Supplier
                        </label>
                    </div>
                </div>

                @include('Master.SpecializationSupplier.Functions.Menu.index')
            </div>
        </section>
    </div>

    @include('Partials.footer')
    @include('Master.SpecializationSupplier.Functions.Footer.index')
@endsection