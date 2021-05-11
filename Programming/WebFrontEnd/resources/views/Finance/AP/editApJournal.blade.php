@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <form method="post" enctype="multipart/form-data" action="#" name="formHeaderMret">
                        <div class="row">
                            @csrf
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Edit AP Bank Journal
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td><label>Transaction</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="projectcode" style="border-radius:0;" name="project_code" class="form-control" required>
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Reference Number</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="projectcode" style="border-radius:0;" name="project_code" class="form-control" required>
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Project Code</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="projectcode" style="border-radius:0;" name="project_code" class="form-control" required>
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Site Code</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="projectcode" style="border-radius:0;" name="project_code" class="form-control" required>
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td><label>AP Number</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="tranoType" name="tranoType" class="form-control">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Chart of Account</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="projectcode" style="border-radius:0;" name="project_code" class="form-control" required>
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input id="projectname" style="border-radius:0;" class="form-control" name="projek_name">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Currency Code</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="projectcode" style="border-radius:0;" name="project_code" class="form-control" required>
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input id="projectname" style="border-radius:0;" class="form-control" name="projek_name">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>

                                                        <tr>
                                                            <td><label>IDR Rate</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="tranoType" name="tranoType" class="form-control">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Debit</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="tranoType" name="tranoType" class="form-control">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Credit</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="tranoType" name="tranoType" class="form-control">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Job Number</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="tranoType" name="tranoType" class="form-control">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <button type="reset" class="btn btn-outline btn-danger btn-sm float-right" id="addTranoType" style="margin-right: 5px;">
                                                    <i class="fas fa-plus" aria-hidden="true" title="Submit to Advance">Reset</i>
                                                </button>
                                                <button type="reset" class="btn btn-outline btn-success btn-sm float-right" id="addTranoType" style="margin-right: 5px;">
                                                    <i class="fas fa-plus" aria-hidden="true" title="Submit to Advance">Add to Grid</i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title"></label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableTranoType" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Ref Number</th>
                                                <th>COA Code</th>
                                                <th>COA Name</th>
                                                <th>Valuta</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="card-body table-responsive p-0 brfhide6">
                                    <table class="table table-head-fixed text-nowrap table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th style="text-align: right;" id="valAllowance"></th>
                                                <th style="text-align: right;" id="valTransport"></th>
                                                <th style="text-align: right;" id="valAirportTax"></th>
                                                <th style="text-align: right;" id="valAccomodation"></th>
                                                <th style="text-align: right;" id="valOthers"></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="card-body table-responsive p-0 brfhide6">
                                    <table class="table table-head-fixed text-nowrap table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th style="text-align: right;color:brown">Total Debit : <span id="totalBrf"></span> || Total Credit : <span id="totalSequence"></span></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <button type="reset" class="btn btn-outline btn-success btn-sm float-right" id="saveBrfList" style="margin-right: 5px;">
                                <i class="fas fa-save" aria-hidden="true" title="Submit to Advance">Submit</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
@include('Partials.footer')
@include('Master.transactionNumber.Functions.Footer.footerTranoType')
@endsection