@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">Periode</label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="table1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Periode Code</th>
                                                <th>Year</th>
                                                <th>Month</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>April 2016</td>
                                                <td>2016</td>
                                                <td>4</td>
                                                <td>2016-4-10</td>
                                                <td>2016-4-20</td>
                                                <td>ACTIVE</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
@include('Master.transactionNumber.Functions.Footer.footerTranoNumber')
@endsection