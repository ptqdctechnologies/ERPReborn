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
                                    <label class="card-title">View Supplier</label>
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
                                                <th>Supplier Code</th>
                                                <th>Supplier Name</th>
                                                <th>Supplier Address</th>
                                                <th>Supplier Phone</th>
                                                <th>Supplier Email</th>
                                                <th>Supplier Fax</th>
                                                <th>Supplier Descriptions</th>
                                                <th>Supplier Contact Person</th>
                                                <th>Finance</th>
                                                <th>Director</th>
                                                <th>Status</th>
                                                <th>Bank Name</th>
                                                <th>Account Number</th>
                                                <th>Account Number Name</th>
                                                <th>NPWP</th>
                                                <th>Jenis Supplier</th>
                                                <th>Sub Jenis Supplier</th>
                                                <th>PKP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                            </tr>
                                            <tr>
                                            <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
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