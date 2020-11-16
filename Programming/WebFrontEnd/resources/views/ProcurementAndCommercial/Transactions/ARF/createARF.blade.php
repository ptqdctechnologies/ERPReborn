@extends('Partials.app')
  @section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('ProcurementAndCommercial.Transactions.ARF.project')
    @include('ProcurementAndCommercial.Transactions.ARF.subpc')
    @include('ProcurementAndCommercial.Transactions.ARF.requester')
  
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Create Advance Request</a>
                <a class="nav-item nav-link" id="product-comfirements-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">BOQ</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
            <!--|-------------------------------------------------------------------------|
                |                         Create Advance Request                          |
                |-------------------------------------------------------------------------|-->
              
              
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
              
              <form method="post" action="" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card-header">
                          <label class="card-title">Add New Advance Request Form (ARF)</label>
                          <br><hr>
                        </div>
                      </div>                                                                                                        

                      <div class="col-md-6">                      
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>Name Of Beneficiary</label></td>
                              <td>
                                <input id="" style="border-radius:0;" type="text" class="form-control form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Bank Name</label></td>
                              <td>
                                <input id="" style="border-radius:0;" type="text" class="form-control form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Account Name</label></td>
                              <td>
                                <input id="" style="border-radius:0;" type="text" class="form-control form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Account Number</label></td>
                              <td>
                                <input id="" style="border-radius:0;" type="text" class="form-control form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><Label>Internal Notes</Label></td>
                              <td>
                                <textarea name="" id="" cols="30" rows="3"></textarea>
                              </td>
                            </tr>
                          </table>
                        </div>                        
                      </div>                  

                      <div class="col-md-6">
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>Project Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input id="projectname" style="border-radius:0;" type="text" class="form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Sub Project Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#mySPC" class="fas fa-gift"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input id="subprojectn" style="border-radius:0;" type="text" class="form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Request Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myRequester" class="fas fa-gift"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input id="requestname" style="border-radius:0;" type="text" class="form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Manager</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="managercode" style="border-radius:0;" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myManager" class="fas fa-gift"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input id="managername" style="border-radius:0;" type="text" class="form-control">
                              </td>
                            </tr>
                          </table>
                        </div>
                        <br><br><br>
                        <button class="btn btn-danger btn-sm float-right" type="reset">
                          <i class="fa fa-times" aria-hidden="true"></i>
                          Cancel
                        </button>
                        <button class="btn btn-primary btn-sm float-right" type="submit">
                          <i class="fa fa-check-square" aria-hidden="true"></i>
                          Submit
                        </button>
                      </div>                                                                
                   </div>
                  </div>                                                                
                </div>
              </form>
              
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card-header">
                          <label class="card-title">Attach File</label>
                          <br><hr>
                        </div>
                      </div>                                                                                                        

                      <div class="col-md-12">
                        <div class="form-group">                                               
                          <div class="input-group control-group increment" >
                            <input type="file" name="filename[]" class="form-control">
                            <div class="input-group-btn"> 
                              <button class="btn btn-success btn-sm fileInputMulti" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                          </div>
                          <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                              <input type="file" name="filename[]" class="form-control">
                              <div class="input-group-btn"> 
                                <button class="btn btn-danger btn-sm" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                                                                                                  
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
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="card-header">
                        <label class="card-title">BOQ3 Detail</label>
                        <br><hr>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                          <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                            <thead>
                              <tr>
                                <th>Add</th>
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
                                  <a class="btn btn-success btn-sm" href="#">
                                    <i class="fa fa-plus-square" data-target="#myBOQ" aria-hidden="true"></i>
                                  </a>
                                </td>
                                <td id="workid">yes</td>
                                <td id="workname">yes</td>
                                <td id="prodid">yes</td>
                                <td id="prodname">yes</td>
                                <td id="qty">yes</td>
                                <td id="uom">yes</td>
                                <td id="price">yes</td>
                                <td id="total">yes</td>
                                <td id="currency">yes</td>
                                <td id="remark">yes</td>
                              </tr>
                              <tr>
                                <td>
                                  <a class="btn btn-success btn-sm" href="#">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                  </a>
                                </td>
                                <td>1</td>
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
                              <tr>
                                <td>
                                  <a class="btn btn-success btn-sm" href="#">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                  </a>
                                </td>
                                <td>1</td>
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
                              <tr>
                                <td>
                                  <a class="btn btn-success btn-sm" href="#">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                  </a>
                                </td>
                                <td>1</td>
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
                              <tr>
                                <td>
                                  <a class="btn btn-success btn-sm" href="#">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                  </a>
                                </td>
                                <td>1</td>
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
                              <tr>
                                <td>
                                  <a class="btn btn-success btn-sm" href="#">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                  </a>
                                </td>
                                <td>1</td>
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
                              <tr>
                                <td>
                                  <a class="btn btn-success btn-sm" href="#">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                  </a>
                                </td>
                                <td>1</td>
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
                      </div>
                    </div>
                  </div>
                
              <!--|-------------------------------------------------------------------------|
                  |                               End BOQ                                   |
                  |-------------------------------------------------------------------------|
                  |-------------------------------------------------------------------------|
                  |                        Edit Create & ARF Chart                          |
                  |-------------------------------------------------------------------------|-->
              <form method="post" action="" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">
                  <div class="card-header">
                  <label class="card-title">Detail Advance Request Form (ARF)</label>
                  <br><hr>
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
                              <input id="qty" style="border-radius:0;"  type="text" class="form-control form-control">
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
                  <button class="btn btn-danger btn-sm float-right" type="reset">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    Cancel
                  </button>
                  <button class="btn btn-primary btn-sm float-right" type="submit">
                    <i class="fa fa-check-square" aria-hidden="true"></i>
                    Add To Cart
                  </button>
                </div>
              </div>
            </form>

            <form method="post" action="" enctype="multipart/form-data">
              <div class="card">
                <div class="card-body">
                  <div class="card-header">
                  <label class="card-title">ARF List (Cart)</label>
                  <br><hr>
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
                  <button class="btn btn-danger btn-sm float-right" type="reset">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    Cancel
                  </button>
                  <button class="btn btn-primary btn-sm float-right" type="submit">
                    <i class="fa fa-check-square" aria-hidden="true"></i>
                    Save Data
                  </button>
                </div>
              </div>
            </form>
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
        $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
        });
        $("body").on("click",".btn-danger",function(){ 
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