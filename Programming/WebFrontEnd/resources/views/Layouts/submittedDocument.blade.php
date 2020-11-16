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
                      
                      <div class="col-md-12">
                      <div class="card">
                      <div class="card-body">
                        <div class="form-group">
                        <label class="card-title">Search My Submitted Document</label>
                        <br><hr></br>
                          <table>
                            <tr>
                              <td><label>Transaction Type</label></td>
                              <td>
                                <div class="input-group">
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Site</option>
                                        <option>Warehouse</option>                                        
                                    </select>

                                </div>
                              </td>                              
                            </tr>
                            <tr>
                              <td><label>Trano</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                              
                            </tr>
                            <tr>
                              <td><label>Project Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                              
                            </tr>
                            <tr>
                              <td><label>Order By</label></td>
                              <td>
                                <div class="input-group">
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Site</option>
                                        <option>Warehouse</option>                                        
                                    </select>
                                </div>
                              </td>                              
                            </tr>
                            <tr>
                              <td><label>Hide Final Approval</label></td>
                              <td>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                    <label for="customCheckbox1" class="custom-control-label"></label>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Hide Rejected</label></td>
                              <td>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                                    <label for="customCheckbox1" class="custom-control-label"></label>
                                </div>
                              </td>
                            </tr>                            
                          </table>
                        </div>
                      </div>
                      </div>
                      </div>                                                                                                    
                    </div>                    
                  </div>
                </div>
                <a class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#searchArf" style="color:white;">
                      <i class="fas fa-gift" aria-hidden="true"></i>
                      Search
                    </a>
              </div>
              
              <!--|-------------------------------------------------------------------------|
                  |                               End ARF Chart                             |
                  |-------------------------------------------------------------------------|-->              
                          <!--|-------------------------------------------------------------------------|
                  |                               End ARF Chart                             |
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