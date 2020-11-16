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
                          <label class="card-title">Create New Project Progress</label>
                          <br><hr>
                        </div>
                      </div>                                                                                                        
                     
                      <div class="col-md-12">
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
                            </tr>
                            <tr>
                              <td><label>Project Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                  <div class="input-group-append">                                    
                                </div>
                              </td>                            
                            </tr>
                            <tr>
                              <td><label>Site Code</label></td>
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
                            </tr>
                            <tr>
                              <td><label>Site Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="managercode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>                              
                            </tr>
                            <tr>
                              <td><label>Last Progress</label></td>
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
                            </tr>
                            <tr>
                              <td><label>Current Progress</label></td>
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
                    Create
                  </a> 
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