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
                                            Add Trano Type
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
                                                            <td><label>Trano Prefix (Ex.PR01, PO01) </label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="tranoPrefix" name="tranoPrefix" class="form-control">
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
                                                <button type="reset" class="btn btn-outline btn-success btn-sm float-right" id="addTranoType" style="margin-right: 5px;">
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
@include('Master.transactionNumber.Functions.Footer.footerTranoType')
@endsection