@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getRequester')
@include('getFunction.getProduk')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <!--|-------------------------------------------------------------------------|
                |                         Create Advance Request                          |
                |-------------------------------------------------------------------------|-->
          <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-header">
                      <label class="card-title">File Attachment &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Add New Reimbursement to Customer Expenditure</label>

                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Select a file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                            </div>
                          </div>
                        </div>



                        <div class="card">
                          <div class="card-body">
                            <div class="card-header">
                            </div>
                            <div class="card-body table-responsive p-0" style="height: 200px;">
                              <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>File Name</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>This is file name</td>
                                    <td>
                                      <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash"></i>
                                      </a>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <br><br><br>
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>Requester Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Name of Beneficiary</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Bank Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="requestcode" style="border-radius:0;" type="text" class="form-control form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Bank Account Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Bank Account Number</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Origin of Budget</label></td>
                              <td>
                                <select class="form-control select2" style="width: 100%;">
                                  <option selected="selected">Project</option>
                                  <option>OPEX</option>
                                  <option>CAPEX</option>
                                  <option>SALES</option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Currency</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="" style="border-radius:0;" type="text" class="form-control form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#mylogin" class="fas fa-gift"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Customer</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#mySPC" class="fas fa-gift"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input id="subprojectn" style="border-radius:0;" type="text" class="form-control form-control">
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <br><br><br>
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>Project Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input id="projectname" style="border-radius:0;" type="text" class="form-control form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Site Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#mySPC" class="fas fa-gift"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input id="subprojectn" style="border-radius:0;" type="text" class="form-control form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>PIC Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="requestcode" style="border-radius:0;" type="text" class="form-control form-control">
                                </div>
                              </td>
                              <td>
                                <input id="requestname" style="border-radius:0;" type="text" class="form-control form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Manager Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="" style="border-radius:0;" type="text" class="form-control form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#mylogin" class="fas fa-gift"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input style="border-radius:0;" type="text" class="form-control form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Finance Receiving Menu</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="" style="border-radius:0;" type="text" class="form-control form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#mylogin" class="fas fa-gift"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input style="border-radius:0;" type="text" class="form-control form-control">
                              </td>
                            </tr>
                          </table>
                        </div>
                        <br><br><br><br><br><br><br>
                      </div>
                    </div>
                  </div>
                </div>

                <a class="btn btn-danger btn-sm float-right" href="#">
                  <i class="fa fa-times" aria-hidden="true"></i>
                  Cancel
                </a>
                <a class="btn btn-danger btn-sm float-right" href="#">
                  <i class="fa fa-times" aria-hidden="true"></i>
                  Reset
                </a>
                <a class="btn btn-primary btn-sm float-right" href="#">
                  <i class="fa fa-check-square" aria-hidden="true"></i>
                  Submit
                </a>
              </div>
            </div>
          </div>
          <!--|-------------------------------------------------------------------------|
                  |                            End Advance Request                          |
                  |-------------------------------------------------------------------------|
                  |-------------------------------------------------------------------------|
                  |                               Create BOQ                                |
                  |-------------------------------------------------------------------------|
                -->

          <div class="card">
            <div class="card-body">
              <div class="card-header">
                <label class="card-title">Detail Advance Request Form (ARF)</label>

              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="form-group">
                        <table>
                          <tr>
                            <td><label>Work Id</label></td>
                            <td>
                              <input id="workid" style="border-radius:0;" type="text" class="form-control form-control" value="">
                            </td>
                          </tr>
                          <tr>
                            <td><label>Product Id</label></td>
                            <td>
                              <div class="input-group">
                                <input id="prodid" style="border-radius:0;" type="text" class="form-control form-control">
                                <div class="input-group-append">
                                  <span style="border-radius:0;" class="input-group-text form-control">
                                    <a href="#"><i data-toggle="modal" data-target="#mylogin" class="fas fa-gift"></i></a>
                                  </span>
                                </div>
                              </div>
                            </td>
                            <td>
                              <input id="prodid" style="border-radius:0;" type="text" class="form-control form-control">
                            </td>
                          </tr>
                          <tr>
                            <td><label>Qty</label></td>
                            <td>
                              <input id="qty" style="border-radius:0;" type="text" class="form-control form-control">
                            </td>
                            <td>
                              <button>Text</button>
                            </td>
                          </tr>
                          <tr>
                            <td><label>Unit Price</label></td>
                            <td>
                              <input id="price" style="border-radius:0;" type="text" class="form-control form-control">
                            </td>
                            <td>
                              <button>Text</button>
                            </td>
                          </tr>
                          <tr>
                            <td><label>Remark</label></td>
                            <td>
                              <textarea name="" id="" cols="30" rows="2"></textarea>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <a class="btn btn-danger btn-sm float-right" href="#">
                <i class="fa fa-times" aria-hidden="true"></i>
                Cancel
              </a>
              <a class="btn btn-primary btn-sm float-right" href="#">
                <i class="fa fa-check-square" aria-hidden="true"></i>
                Add To Cart
              </a>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="card-header">
                <label class="card-title">ARF List (Cart)</label>
                <br>
                <hr>
              </div>
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Work Id</th>
                      <th>Work Name</th>
                      <th>Product Id</th>
                      <th>Product Name</th>
                      <th>Qty</th>
                      <th>Uom</th>
                      <th>Price</th>
                      <th>Total</th>
                      <th>Currency</th>
                      <th>Remark</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <a class="btn btn-warning btn-sm" href="#">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>QWERTY QWERTY QWERTY QWERTY QWERTY QWERTY QWERTY QWERTY QWERTY QWERTY QWERTY QWERTY QWERTY QWERTY</td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>yes</td>
                    </tr>
                    <tr>
                      <td>
                        <a class="btn btn-warning btn-sm" href="#">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>yes</td>
                      <td>yes</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <a class="btn btn-danger btn-sm float-right" href="#">
                <i class="fa fa-times" aria-hidden="true"></i>
                Cancel
              </a>
              <a class="btn btn-primary btn-sm float-right" href="#">
                <i class="fa fa-check-square" aria-hidden="true"></i>
                Save Data
              </a>
            </div>
          </div>
          <!--|-------------------------------------------------------------------------|
                  |                               End ARF Chart                             |
                  |-------------------------------------------------------------------------|-->
        </div>
      </div>
    </div>
  </section>
</div>
@include('Partials.footer')
<script type="text/javascript">
  $(document).ready(function() {
    $(".btn-success").click(function() {
      var html = $(".clone").html();
      $(".increment").after(html);
    });
    $("body").on("click", ".btn-danger", function() {
      $(this).parents(".control-group").remove();
    });
  });
</script>
<script>
  function myBOQ() {
    document.getElementById("workid").value = document.getElementById("workid").value;
    document.getElementById("prodid").value = document.getElementById("prodid").value;
    document.getElementById("qty").value = document.getElementById("qty").value;
    document.getElementById("price").value = document.getElementById("price").value;
    document.getElementById("remark").value = document.getElementById("remark").value;
  }
</script>
@endsection