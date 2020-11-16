@extends('Partials.app')
  @section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('ProcurementAndCommercial.Transactions.ASF.managerName')
    @include('ProcurementAndCommercial.Transactions.ASF.currency')
    @include('ProcurementAndCommercial.Transactions.ASF.finance')
    @include('ProcurementAndCommercial.Transactions.ASF.searchArf')

    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Create Advance Request</a>                
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
            <!--|-------------------------------------------------------------------------|
                |                         Create Advance Request                          |
                |-------------------------------------------------------------------------|-->
            <form method="post" action="" enctype="multipart/form-data">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="card">
                  <div class="card-body">
                    <div class="row">                                                                
                      <div class="col-md-6">
                        <div class="card">
                          <div class="card-body">
                            <label class="card-title">Create New ASF Pulsa</label>
                            <br><hr><br>
                            <div class="form-group">
                              <table>
                                <tr>
                                    <td><label>ARF Pulsa Trano</label></td>
                                    <td>
                                      <div class="input-group">
                                        <input id="currencyCodeId" style="border-radius:0;" type="text" class="form-control">
                                        <div class="input-group-append">
                                          <span style="border-radius:0;" class="input-group-text">
                                            <a href="#"><i data-toggle="modal" data-target="#currency" class="fas fa-gift"></i></a>
                                          </span>
                                        </div>
                                      </div>
                                    </td>                              
                                  </tr>
                                  <tr>
                                    <td><label>Manager</label></td>
                                    <td>
                                      <div class="input-group">
                                        <input id="currencyCodeId" style="border-radius:0;" type="text" class="form-control">
                                        <div class="input-group-append">
                                          <span style="border-radius:0;" class="input-group-text">
                                            <a href="#"><i data-toggle="modal" data-target="#currency" class="fas fa-gift"></i></a>
                                          </span>
                                        </div>
                                      </div>
                                    </td>                              
                                  </tr>
                                  <tr>
                                    <td><label>Requester</label></td>
                                    <td>
                                      <div class="input-group">
                                        <input id="currencyCodeId" style="border-radius:0;" type="text" class="form-control">
                                        <div class="input-group-append">
                                          <span style="border-radius:0;" class="input-group-text">
                                            <a href="#"><i data-toggle="modal" data-target="#currency" class="fas fa-gift"></i></a>
                                          </span>
                                        </div>
                                      </div>
                                    </td>                              
                                  </tr>
                                  <tr>
                                    <td><label>Finance Receiving Name</label></td>
                                    <td>
                                      <div class="input-group">
                                        <input id="currencyCodeId" style="border-radius:0;" type="text" class="form-control">
                                        <div class="input-group-append">
                                          <span style="border-radius:0;" class="input-group-text">
                                            <a href="#"><i data-toggle="modal" data-target="#currency" class="fas fa-gift"></i></a>
                                          </span>
                                        </div>
                                      </div>
                                    </td>                              
                                  </tr>
                                  <tr>
                                    <td><label>Remark</label></td>
                                    <td>
                                      <div class="input-group">
                                        <input id="" style="border-radius:0;" type="text" class="form-control">                                  
                                      </div>
                                    </td>
                                    <td>
                                  </tr>                            
                                </table>
                              </div>                        
                            </div>
                          </div>
                        </div>                                                                                   

                        <div class="col-md-6">
                          <div class="card">
                            <div class="card-body">
                              <label class="card-title">File Attachment</label>
                              <br><hr><br>
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
              </div>
            </form>
              <!--|-------------------------------------------------------------------------|
                  |                            End Advance Request                          |
                  |-------------------------------------------------------------------------|
                  |-------------------------------------------------------------------------|
                  |                        Edit Create & ARF Chart                          |
                  |-------------------------------------------------------------------------|-->
              
              <div class="card">
                <div class="card-body">
                  <div class="card-header">
                    <label class="card-title"></label>
                  </div>
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                      <thead>
                        <tr>
                            <th>No</th>
                          <th>Action</th>                          
                          <th>Trano</th>
                          <th>Project</th>
                          <th>Site</th>
                          <th>Work ID</th>
                          <th>Item</th>
                          <th>QTY</th>
                          <th>Price</th>
                          <th>Total</th>
                          <th>Progress</th>
                          <th>Description</th>
                          <th>Available</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <td id="workid">1</td>
                          <td>
                            <a class="btn btn-warning btn-sm" href="#">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                          <td>1</td>
                          <td>2</td>
                          <td>3</td>
                          <td>4</td>
                          <td>5</td>
                          <td>6</td>
                          <td>7</td>
                          <td>8</td>
                          <td>9</td>
                          <td>10</td>
                          <td>11</td>
                        </tr>
                        <tr>
                        <td id="workid">1</td>
                          <td>
                            <a class="btn btn-warning btn-sm" href="#">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                          <td>yes11</td>
                          <td>yes10</td>
                          <td>yes9</td>
                          <td>yes8</td>
                          <td>yes7</td>
                          <td>yes6</td>
                          <td>yes5</td>
                          <td>yes4</td>
                          <td>yes3</td>
                          <td>yes2</td>
                          <td>yes1</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>                  
                </div>
              </div>

                          <!--|-------------------------------------------------------------------------|
                  |                               End ARF Chart                             |
                  |-------------------------------------------------------------------------|-->

        <form method="post" action="" enctype="multipart/form-data">
          <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
            <div class="card">
              <div class="card-body">
                <div class="row">                      
                  
                  
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="form-group">
                        <label class="card-title">Item for ASF</label>
                        <br><hr><br>
                          <table>
                            <tr>
                              <td><label>ARF Trano</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                              
                            </tr>                            
                            <tr>
                              <td><label>Project</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Site</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Work ID</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Item</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Qty</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Price</label></td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Total</label></td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                              
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Already ASF</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                              
                            </tr>                            

                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
              
              <!--|-------------------------------------------------------------------------|
                  |                               End ARF Chart                             |
                  |-------------------------------------------------------------------------|-->                  
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body">
                        <div class="form-group">
                        <label class="card-title">Expense Claim</label>
                        <br><hr><br>
                          <table>
                          <tr>
                              <td><label>QTY</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Price</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Total</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                      
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body">
                      <label class="card-title">Amount Due to Company</label>
                      <br><hr><br>
                        <div class="form-group">
                          <table>
                          <tr>
                              <td><label>QTY</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Price</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Total</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>                                                                                                            
                    </div>
                    <button type="reset" class="btn btn-danger btn-sm float-right">
                      <i class="fa fa-times" aria-hidden="true"></i>
                      Cancel
                    </button>
                    <button type="submit" class="btn btn-success btn-sm float-right">
                      <i class="fa fa-check-square" aria-hidden="true"></i>
                      Add
                    </button>
                  </div>                                      
                </div>
              </div>
            </div>
          </div>                
        </form>
              <!--|-------------------------------------------------------------------------|
                  |                               End ARF Chart                             |
                  |-------------------------------------------------------------------------|-->
        <form method="post" action="" enctype="multipart/form-data">
          <div class="card">
            <div class="card-body">
              <div class="card-header">
                <label class="card-title">ASF Cart</label>
                <br><hr>
              </div>
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                  <thead>
                    <tr>
                    <th>No</th>
                      <th>Edit</th>
                      <th>Delete</th>                          
                      <th>ARF No</th>
                      <th>Project</th>
                      <th>Site</th>
                      <th>Work ID</th>
                      <th>Item</th>
                      <th>Total Expense Claim</th>
                      <th>Total Due to Company</th>
                      <th>Total ASF</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>                                                  
                      <td>1</td>
                      <td>2</td>
                      <td>3</td>
                      <td>4</td>
                      <td>5</td>
                      <td>6</td>
                      <td>7</td>
                      <td>8</td>
                      <td>9</td>
                      <td>10</td>
                      <td>11</td>
                    </tr>
                    <tr>
                    
                    <td>1</td>
                      <td>2</td>
                      <td>3</td>
                      <td>4</td>
                      <td>5</td>
                      <td>6</td>
                      <td>7</td>
                      <td>8</td>
                      <td>9</td>
                      <td>10</td>
                      <td>11</td>
                    </tr>
                  </tbody>
                </table>
              </div>                  
            </div>
          </div>              
            <button type="submit" class="btn btn-success btn-sm float-right">
                <i class="fa fa-check-square" aria-hidden="true"></i>
                Submit ASF
            </button>

                          <!--|-------------------------------------------------------------------------|
                  |                               End ARF Chart                             |
                  |-------------------------------------------------------------------------|-->
                        <!--|-------------------------------------------------------------------------|
                  |                               End ARF Chart                             |
                  |-------------------------------------------------------------------------|-->
            </form>
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
  @endsection