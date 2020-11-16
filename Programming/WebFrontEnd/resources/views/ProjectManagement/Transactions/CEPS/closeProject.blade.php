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
            <div class="tab-content p-3" id="nav-tabContent">
            <!--|-------------------------------------------------------------------------|
                |                         Create Advance Request                          |
                |-------------------------------------------------------------------------|-->
              <form action="">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="card">
                  <div class="card-body">
                    <div class="row">     

                    <div class="col-md-7">
                      <label class="card-title">Close Project List</label>
                      <br><hr><br>
                      <div class="card">
                        <div class="card-body">                        
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>                                                             
                                    <th>Project Code</th>
                                    <th>Project Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>                                
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>                                    
                                </tr>                                
                            </tbody>
                            </table>
                        </div>                  
                        </div>
                    </div>
                    </div>
                           
                    <div class="col-md-5">
                    <label class="card-title">Project</label>
                    <br><hr><br>
                        <div class="card">
                        <div class="card-body">
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>Project Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control form-control">                                
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Project Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control form-control">                                
                                </div>
                              </td>
                            </tr>
                            <tr>                            
                              <td><label>Open This Project</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control form-control">                                
                                </div>
                              </td>
                            </tr>                            
                            <tr>                                                          
                              <td>
                                <br><hr><br>                              
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;width:10px;" type="text" class="form-control form-control">                                
                                </div>
                              </td>
                              <td>
                              <br><hr><br>
                              <label>Site Project</label></td>
                            </tr>
                          </table>
                        </div>
                            <a class="btn btn-danger btn-sm float-right" href="#">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            Cancel
                            </a>
                            <a class="btn btn-primary btn-sm float-right" href="#">
                            <i class="fa fa-check-square" aria-hidden="true"></i>
                            Submit
                            </a> 
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
  @endsection