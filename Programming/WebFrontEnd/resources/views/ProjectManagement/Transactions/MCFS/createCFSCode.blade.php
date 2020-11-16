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
                      
                      <div class="col-md-4">
                      <label class="card-title">Add New CFS</label>
                      <br><hr><br>
                            <div class="card">
                                <div class="card-body">
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td><label>CFS Code</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                                                                                        
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>CFS Name</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                                    
                                                </div>
                                            </td>
                                        </tr>                                        
                                    </table>
                                </div>   
                                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>                                         
                            </div>
                        </div>
                    </div>
                      
                      <div class="col-md-8">
                      <label class="card-title">View CFS List</label>
                      <br><hr><br>
                      <div class="card">
                        <div class="card-body">
                        <div class="card-header">
                            <table>
                                <tr>
                                    <td>Search</td>
                                    <td>
                                    <div class="input-group">
                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected">CFS Code</option>
                                            <option>CFS Name</option>                                        
                                        </select>
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
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>                                    
                                    <th>CFS Code</th>
                                    <th>CFS Name</th>                                    
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