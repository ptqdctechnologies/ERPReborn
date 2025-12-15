@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <form method="post" enctype="multipart/form-data" name="formHeaderBrf">
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="row">
                            @csrf
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Add New Supplier
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card-body table-responsive p-0" style="height: 120px;width:100%;">
                                                    <table class="table table-head-fixed text-nowrap">
                                                        <div class="form-group input_fields_wrap">
                                                            <div class="input-group control-group" style="width:100%;">
                                                                <input type="file" class="form-control filenames_1" id="filenames_1" style="height:26px;" name="filenames">
                                                                <div class="input-group-btn">
                                                                    <a class="btn btn-outline btn-success btn-sm add_field_button">
                                                                        <i class="fas fa-plus" aria-hidden="true" title="Add File" style="color:white;">Add</i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="card-title">
                                                Input Supplier
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
                                                                <td><label>Status Supplier</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <select class="form-control" style="width: 100%; border-radius:0;" id="jobTitle">
                                                                            <option selected="selected">Alabama</option>
                                                                            <option>Alaska</option>
                                                                            <option>California</option>
                                                                            <option>Delaware</option>
                                                                            <option>Tennessee</option>
                                                                            <option>Texas</option>
                                                                            <option>Washington</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Name</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Address</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Address 2</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
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
                                                                <td><label>Province</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <select class="form-control" style="width: 100%; border-radius:0;" id="jobTitle">
                                                                            <option selected="selected">Alabama</option>
                                                                            <option>Alaska</option>
                                                                            <option>California</option>
                                                                            <option>Delaware</option>
                                                                            <option>Tennessee</option>
                                                                            <option>Texas</option>
                                                                            <option>Washington</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>City</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <select class="form-control" style="width: 100%; border-radius:0;" id="jobTitle">
                                                                            <option selected="selected">Alabama</option>
                                                                            <option>Alaska</option>
                                                                            <option>California</option>
                                                                            <option>Delaware</option>
                                                                            <option>Tennessee</option>
                                                                            <option>Texas</option>
                                                                            <option>Washington</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Country</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Telp</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
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
                                                                <td><label>Fax</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Email Address</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Year of Establishment</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Year of Operation</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>




                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <table>

                                                            <tr>
                                                                <td><label><strong> Size of Company</strong></label></td>
                                                            </tr>

                                                            <tr>
                                                                <td><label>How Many Branch</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Scale</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
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
                                                                <br><br>
                                                                <td><label>List of Branch Address</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Total Number of Employees</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <table>
                                                            <tr>
                                                                <td><label>Contac Person</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <select class="form-control" style="width: 100%; border-radius:0;" id="jobTitle">
                                                                            <option selected="selected">Alabama</option>
                                                                            <option>Alaska</option>
                                                                            <option>California</option>
                                                                            <option>Delaware</option>
                                                                            <option>Tennessee</option>
                                                                            <option>Texas</option>
                                                                            <option>Washington</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Finance</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <select class="form-control" style="width: 100%; border-radius:0;" id="jobTitle">
                                                                            <option selected="selected">Alabama</option>
                                                                            <option>Alaska</option>
                                                                            <option>California</option>
                                                                            <option>Delaware</option>
                                                                            <option>Tennessee</option>
                                                                            <option>Texas</option>
                                                                            <option>Washington</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Director</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
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
                                                                <td><label>Bank Name</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Account Number Name</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Account Number Number</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
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
                                                                <td><label>Type Supplier</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Specialist Supplier</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><label>Remark</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <table>

                                                            <tr>
                                                                <td><label><strong> Supplier PKP</strong></label></td>
                                                            </tr>

                                                            <tr>
                                                                <td><label>PKP</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
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
                                                                <br><br>
                                                                <td><label>NPWP</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="text" class="form-control">
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
                                                                <br><br>
                                                                <td><label>Date</label></td>
                                                                <td>
                                                                    <div class="input-group">
                                                                        <input id="department" style="border-radius:0;" type="date" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <br>
                                                    <a href="#" class="btn btn-outline btn-danger btn-sm float-right" title="Cancel">
                                                        <i class="fa fa-times" aria-hidden="true" title="Cancel">Cancel</i>
                                                    </a>
                                                    <button type="reset" class="btn btn-outline btn-warning btn-sm float-right" title="Reset">
                                                        <i class="fa fa-times" aria-hidden="true" title="Reset">Reset</i>
                                                    </button>
                                                    <a class="btn btn-outline btn-success btn-sm float-right" href="javascript:formDetailTransAttch()" style="margin-right:5px;">
                                                        <i class="fas fa-plus" aria-hidden="true" title="Submit">Submit</i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Advance.BussinesTrip.Functions.Footer.footerBrf')
@endsection