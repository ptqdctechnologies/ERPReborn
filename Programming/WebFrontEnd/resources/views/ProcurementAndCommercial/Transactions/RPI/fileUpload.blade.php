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
              <form action="">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="card">
                  <div class="card-body">
                    <div class="row">                    
                      <div class="col-md-12">
                      <label class="card-title">File Attachment</label>
                      <br><hr><br>
                        <div class="form-group">
                        <label>Attach File</label>
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
                          <div class="card-body table-responsive p-0" style="height: 150px;">
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
                                <tr>                                
                                  <td>1</td>
                                  <td>This is file name</td>
                                  <td>                                  
                                    <a class="btn btn-danger btn-sm" href="#">
                                      <i class="fas fa-trash"></i>
                                    </a>
                                  </td>
                                </tr>
                                <tr>                                
                                  <td>1</td>
                                  <td>This is file name</td>
                                  <td>                                  
                                    <a class="btn btn-danger btn-sm" href="#">
                                      <i class="fas fa-trash"></i>
                                    </a>
                                  </td>
                                </tr>
                                <tr>                                
                                  <td>1</td>
                                  <td>This is file name</td>
                                  <td>                                  
                                    <a class="btn btn-danger btn-sm" href="#">
                                      <i class="fas fa-trash"></i>
                                    </a>
                                  </td>
                                </tr>
                                <tr>                                
                                  <td>1</td>
                                  <td>This is file name</td>
                                  <td>                                  
                                    <a class="btn btn-danger btn-sm" href="#">
                                      <i class="fas fa-trash"></i>
                                    </a>
                                  </td>
                                </tr>
                                <tr>                                
                                  <td>1</td>
                                  <td>This is file name</td>
                                  <td>                                  
                                    <a class="btn btn-danger btn-sm" href="#">
                                      <i class="fas fa-trash"></i>
                                    </a>
                                  </td>
                                </tr>
                                <tr>                                
                                  <td>1</td>
                                  <td>This is file name</td>
                                  <td>                                  
                                    <a class="btn btn-danger btn-sm" href="#">
                                      <i class="fas fa-trash"></i>
                                    </a>
                                  </td>
                                </tr>
                                <tr>                                
                                  <td>1</td>
                                  <td>This is file name</td>
                                  <td>                                  
                                    <a class="btn btn-danger btn-sm" href="#">
                                      <i class="fas fa-trash"></i>
                                    </a>
                                  </td>
                                </tr>
                                <tr>                                
                                  <td>1</td>
                                  <td>This is file name</td>
                                  <td>                                  
                                    <a class="btn btn-danger btn-sm" href="#">
                                      <i class="fas fa-trash"></i>
                                    </a>
                                  </td>
                                </tr>
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
                            <br>                          
                            <table>                              
                              <tr>          
                                <td><label>Trano</label></td>                      
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
                                <td><label>Project Code</label></td>                      
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
                              
                            </table>                                                  

                        </div>
                      </div>
                      </div>                                            
                    </div>                    

                    <button type="submit" class="btn btn-primary btn-sm float-right">
                      <i class="fa fa-save" aria-hidden="true"></i>
                      Submit
                    </button>                                                       
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