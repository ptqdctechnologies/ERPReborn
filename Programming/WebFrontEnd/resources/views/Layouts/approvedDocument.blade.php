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
                      
                      <div class="col-md-6">
                      <div class="card">
                      <div class="card-body">
                        <div class="form-group">
                        <label class="card-title">Search My Approved Document</label>
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
                            
                          </table>
                        </div>
                      </div>
                      </div>
                      </div>
                      
                      <div class="col-md-6">                    
                      <div class="card">
                      <div class="card-body">
                      <label class="card-title">Approved Date Range</label>                        
                      <br><hr><br>
                        <div class="form-group">
                          <table>
                          <tr>
                              <td><label>Start Date</label></td>
                              <td>
                                <div class="input-group">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input style="border-radius:0;" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>End Date</label></td>
                              <td>
                                <div class="input-group">
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                        <input style="border-radius:0;" type="text" class="form-control datetimepicker-input" data-target="#reservationdate2"/>
                                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                              </td>
                            </tr>                            
                          </table>
                        </div>
                      </div>     
                      </div>
                    </div>                                                                                                       
                    </div>                    
                      <a class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#searchArf" style="color:white;">
                        <i class="fas fa-gift" aria-hidden="true"></i>
                        Search
                      </a>
                      <a class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#searchArf" style="color:white;">
                        <i class="fas fa-print" aria-hidden="true"></i>
                        Export to Excel
                      </a>
                  </div>                  
                </div>                
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