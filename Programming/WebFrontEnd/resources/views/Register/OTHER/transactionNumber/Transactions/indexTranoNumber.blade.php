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
                                    <label class="card-title">Trano Type List</label>
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
                                                <th>Add</th>
                                                <th>Type</th>
                                                <th>Trano Prefix</th>
                                                <th>Last Trano</th>
                                                <th>Last Month & Year</th>
                                                <th>Ket</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <button type="reset" class="btn btn-success btn-sm float-right addTranoNumber1" style="border-radius: 100px;position:relative;right:40px;">
                                                        <i class="fas fa-check" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button type="reset" class="btn btn-success btn-sm float-right addTranoNumber2" style="border-radius: 100px;position:relative;right:40px;">
                                                        <i class="fas fa-check" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                                <td>x</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button type="reset" class="btn btn-success btn-sm float-right addTranoNumber3" style="border-radius: 100px;position:relative;right:40px;">
                                                        <i class="fas fa-check" aria-hidden="true"></i>
                                                    </button>
                                                </td>
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

                    <form method="post" enctype="multipart/form-data" action="#" name="formHeaderMret">
                        <div class="row">
                            @csrf
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Add Trano Number
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td><label>Trano Type</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="tranoType" name="tranoType" class="form-control">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Format Finance </label></td>
                                                            <td>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="formatFinance" name="formatFinance" value="Bus">
                                                                    <label for="formatFinance">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Status Payment </label></td>
                                                            <td>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="formatFinance" name="formatFinance" value="Bus">
                                                                    <label for="statusPayment">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Remark</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <textarea name="" id="remark" cols="30" rows="4" class="form-control"></textarea>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <button type="reset" class="btn btn-outline btn-success btn-sm float-right" id="saveTranoNumber" style="margin-right: 5px;">
                                                    <i class="fas fa-plus" aria-hidden="true" title="Submit to Advance">Create</i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@include('Partials.footer')
@include('Master.transactionNumber.Functions.Footer.footerTranoNumber')
@endsection