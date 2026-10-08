@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getJournal')
    @include('Finance.Journal.Functions.PopUp.revision')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Cash & Bank
                        </label>
                    </div>
                </div>

                @include('Finance.Journal.Functions.Menu.index')
            </div>
        </section>
    </div>

    @include('Finance.Journal.Functions.Footer.index')
    @include('Partials.footer')
@endsection