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
                                            Edit New UOM
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
                                                            <td><label>UOM Code</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="projectcode" style="border-radius:0;" name="project_code" class="form-control" required>
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>UOM Name</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="projectcode" style="border-radius:0;" name="project_code" class="form-control" required>
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>UOM Description</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <textarea name="" id="" cols="10" rows="4" class="form-control"></textarea>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <button type="reset" class="btn btn-outline btn-success btn-sm float-right" id="saveBrfList" style="margin-right: 5px;">
                                                    <i class="fas fa-save" aria-hidden="true" title="Submit to Advance">Submit</i>
                                                </button>
                                                <button type="reset" class="btn btn-outline btn-warning btn-sm float-right" id="saveBrfList" style="margin-right: 5px;">
                                                    <i class="fas fa-times" aria-hidden="true" title="Submit to Advance">Reset</i>
                                                </button>
                                                <button type="reset" class="btn btn-outline btn-danger btn-sm float-right" id="saveBrfList" style="margin-right: 5px;">
                                                    <i class="fas fa-times" aria-hidden="true" title="Submit to Advance">Cancel</i>
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
</div>
</section>
</div>
@include('Partials.footer')
@include('Master.transactionNumber.Functions.Footer.footerTranoType')
@endsection