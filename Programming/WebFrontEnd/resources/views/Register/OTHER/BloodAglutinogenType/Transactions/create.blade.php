@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <form method="post" enctype="multipart/form-data" action="{{ route('BloodAglutinogenType.store') }}" name="formHeaderMret">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Set Blood Aglutinogen Type
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
                                                            <td><label>BloodAglutinogenType</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="BloodAglutinogenType_code" name="BloodAglutinogenType_code" class="form-control">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Year </label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" id="tranoPrefix" name="tranoPrefix" class="form-control" value="2021">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Month</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <select name="" id="" class="form-control">
                                                                        <option value="">Januari</option>
                                                                        <option value="">Februari</option>
                                                                        <option value="">Maret</option>
                                                                        <option value="">April</option>
                                                                        <option value="">Mei</option>
                                                                        <option value="">Juni</option>
                                                                        <option value="">Juli</option>
                                                                        <option value="">Agustus</option>
                                                                        <option value="">September</option>
                                                                        <option value="">Oktober</option>
                                                                        <option value="">November</option>
                                                                        <option value="">Desember</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Start Date</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" type="date" id="tranoPrefix" name="tranoPrefix" class="form-control">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>End Date</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input autocomplete="off" type="date" id="tranoPrefix" name="tranoPrefix" class="form-control">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <button type="reset" class="btn btn-outline btn-danger btn-sm float-right" id="addTranoType" style="margin-right: 5px;">
                                                    <i class="fas fa-plus" aria-hidden="true">Reset</i>
                                                </button>
                                                <button type="submit" class="btn btn-outline btn-success btn-sm float-right" style="margin-right: 5px;">
                                                    <i class="fas fa-plus" aria-hidden="true">Submit</i>
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
@endsection