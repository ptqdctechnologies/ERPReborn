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
                        <label class="card-title">My Project</label>
                        <br><hr><br>
                        <div class="card">
                            <div class="card-body" style="height:385px;">
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text">
                                        <a href="#"><i data-toggle="modal" data-target="#managerName" class="fas fa-folder"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>                          
                      </div>                      
                      
                      <div class="col-md-8">
                      <label class="card-title">Documents</label>
                      <br><hr><br>
                      <div class="card">
                        <div class="card-body">
                        <div class="card-header">
                            <table>
                                <tr>
                                    <td>Filter By: Document Type</td>
                                    <td>
                                    <div class="input-group">
                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected">Site</option>
                                            <option>Warehouse</option>                                        
                                        </select>
                                    </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>                          
                                    <th>Trano</th>
                                    <th>Submite Date</th>
                                    <th>Last Approval Date</th>
                                    <th>Status</th>
                                    <th>Next Person</th>                                    
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