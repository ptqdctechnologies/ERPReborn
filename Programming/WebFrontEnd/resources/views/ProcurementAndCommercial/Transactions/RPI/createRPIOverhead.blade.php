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
                      <div class="col-md-10">
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
                              </tbody>
                            </table>
                          </div>                        
                        </div>
                      </div>
                      </div>                                            
                    </div>                    

                    <button type="reset" class="btn btn-danger btn-sm float-right">
                      <i class="fa fa-times" aria-hidden="true"></i>
                      Reset
                    </button>
                    <a class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#searchArf" style="color:white;">
                      <i class="fas fa-gift" aria-hidden="true"></i>
                      Search ARF
                    </a>                                        
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
                            
              <form action="">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label class="card-title">Create RPI Transaction</label>
                        <br><hr>
                        </div>
                    </div>

                      <div class="col-md-6">
                        <div class="form-group">                        
                          <table>
                          <tr>
                              <td><label>PO Number</label></td>
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
                              <td><label>PO Value</label></td>
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
                              <td><label>PO Value Already Invoice</label></td>
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
                              <td><label>Balance</label></td>
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
                              <td><label>PPN / VAT</label></td>
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
                              <td><label>Payment Term</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <p>days</p>
                              </td>
                            </tr>

                            <tr>
                              <td><Label>PO Remark/Notes</Label></td>
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
                              <td><label>Supplier Code</label></td>
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
                              <td><label>Supplier Invoice No</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>                              
                            </tr>
                            <tr>
                              <td><label>Status Delivery</label></td>                                                              
                              <td>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Site</option>
                                        <option>Warehouse</option>                                        
                                    </select>                                
                                </td>
                            </tr>          

                            <tr>
                              <td><label>Currency Code</label></td>
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
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Exchange Rate</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>                              
                            </tr>
                            <tr>
                              <td><label>Payment Transfer to</label></td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" checked>
                                  <label for="customRadio1" class="custom-control-label">Transfer</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                                  <label for="customRadio2" class="custom-control-label">Cheque</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio3" name="customRadio">
                                  <label for="customRadio3" class="custom-control-label">Cash</label>
                                </div>
                              </td>
                              <td>                              
                            </tr>    
                            <tr>
                              <td>

                              </td>
                              <td>
                                <textarea name="" id="" cols="30" rows="3"></textarea>
                            </td>                      
                            </tr>
                            <tr>
                              <td><label>RPI Notes</label></td>
                              <td>
                                <textarea name="" id="" cols="30" rows="3"></textarea>
                            </td>                      
                            </tr>
                            <tr>
                              <td><label>Voucher Type</label></td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio4" name="customRadio" checked>
                                  <label for="customRadio4" class="custom-control-label">Bank Voucher</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio5" name="customRadio">
                                  <label for="customRadio5" class="custom-control-label">Petty Cash Voucher</label>
                                </div>
                              </td>                                                            
                            </tr>    
                          </table>
                        </div>
                      </div>                                                                                                            
                      <br>
                      
                      <div class="col-md-12">
                      <hr>
                      <label class="card-title">Document Verification</label>
                      <br><hr><br>
                      </div>

                      <div class="col-md-6">                                            
                        <div class="form-group">
                          <table>                            
                            <tr>
                              <td><label>Receipt/ Invoice Origin</label></td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" checked>
                                  <label for="customRadio1" class="custom-control-label">Yes</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                                  <label for="customRadio2" class="custom-control-label">No</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio3" name="customRadio">
                                  <label for="customRadio3" class="custom-control-label">N/A</label>
                                </div>
                              </td>
                              <td>                              
                            </tr>


                            <tr>
                              <td><label>VAT/PPN Origin</label></td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" checked>
                                  <label for="customRadio1" class="custom-control-label">Yes</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                                  <label for="customRadio2" class="custom-control-label">No</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio3" name="customRadio">
                                  <label for="customRadio3" class="custom-control-label">N/A</label>
                                </div>
                              </td>
                              <td>                              
                            </tr>
                            <tr>
                              <td><label>With Stamp Duty</label></td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" checked>
                                  <label for="customRadio1" class="custom-control-label">Yes</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                                  <label for="customRadio2" class="custom-control-label">No</label>
                                </div>
                              </td>
                            </tr>                            
                            <tr>
                              <td><label>Stamp Duty</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="currencyCodeId" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Internal Notes</label></td>                              
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
                              <td><label>BAST/FAT/PAT/DO Origin</label></td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" checked>
                                  <label for="customRadio1" class="custom-control-label">Yes</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                                  <label for="customRadio2" class="custom-control-label">No</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio3" name="customRadio">
                                  <label for="customRadio3" class="custom-control-label">N/A</label>
                                </div>
                              </td>
                              <td>                              
                            </tr>
                            <tr>
                              <td><label>BAST/FAT/PAT/DO Signed by QDC's Staff</label></td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" checked>
                                  <label for="customRadio1" class="custom-control-label">Yes</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                                  <label for="customRadio2" class="custom-control-label">No</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio3" name="customRadio">
                                  <label for="customRadio3" class="custom-control-label">N/A</label>
                                </div>
                              </td>
                              <td>                              
                            </tr>                            
                          </table>
                        </div>
                      </div>                      
                    </div>                    
                  </div>
                </div>              
              
                    <button type="reset" class="btn btn-danger btn-sm float-right">
                      <i class="fa fa-times" aria-hidden="true"></i>
                      Cancel
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm float-right">
                      <i class="fa fa-times" aria-hidden="true"></i>
                      Reset
                    </button>
                    <button type="submit" class="btn btn-success btn-sm float-right">
                      <i class="fa fa-check-square" aria-hidden="true"></i>
                      Submit
                    </button>                    
                  </div>
                </div>
              </div>
              </form>
              <!--|-------------------------------------------------------------------------|
                  |                               End ARF Chart                             |
                  |-------------------------------------------------------------------------|-->

              <div class="card">
                <div class="card-body">
                  <div class="card-header">
                    <label class="card-title">PO Detail</label>
                    <br><hr>
                  </div>
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                      <thead>
                        <tr>
                        <th></th>
                          <th</th>                          
                          <th></th>
                          <th>Product Id</th>
                          <th>Description</th>
                          <th>Qty</th>
                          <th>Uom</th>
                          <th>Price</th>
                          <th>Total</th>
                          <th>Available</th>
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
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>                  
                </div>
              </div>

                          <!--|-------------------------------------------------------------------------|
                  |                               End ARF Chart                             |
                  |-------------------------------------------------------------------------|-->              
                                      
              <form action="">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label class="card-title">Detail Request Payment for Invoice (RPI)</label>                    
                        <br><hr>
                        </div>
                    </div>

                      <div class="col-md-6">
                        <div class="form-group">                        
                          <table>
                          <tr>
                              <td><label>Work ID</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="currencyCodeId" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                              
                            </tr>
                            <tr>
                              <td><label>Product ID</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                              
                            </tr>                            
                          </table>
                        </div>
                      </div>  
                      
                      <div class="col-md-6">                                            
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>Qty Request</label></td>
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
                              <td><label>Unit Price</label></td>
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
                      <br>                      
                      <div class="col-md-12">                                            
                        <div class="form-group">
                          <table>                            
                            <tr>
                              <td><label>Product Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                              
                            </tr>
                            <tr>
                              <td><label>RPI Value</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                              
                            </tr>                            
                            <tr>
                              <td><label>PPN/VAT</label></td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" checked>
                                  <label for="customRadio1" class="custom-control-label">Yes</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                                  <label for="customRadio2" class="custom-control-label">No</label>
                                </div>
                              </td>                              
                              <td>                              
                            </tr>
                            <tr>
                              <td><label>PPN Value (%)</label></td>                                                              
                              <td>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Site</option>
                                        <option>Warehouse</option>                                        
                                    </select>                                
                                </td>
                            </tr>
                            <tr>
                            <td><label>Gros Up</label></td>                                                              
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                                  <label for="customRadio2" class="custom-control-label">No</label>
                                </div>
                              </td>
                            </tr>

                            <tr>
                              <td><label>Holding Tax</label></td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" checked>
                                  <label for="customRadio1" class="custom-control-label">Yes</label>
                                </div>
                              </td>
                              <td>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                                  <label for="customRadio2" class="custom-control-label">No</label>
                                </div>
                              </td>                              
                              <td>                              
                            </tr>
                            <tr>
                              <td><label>Holding Tax Value</label></td>                                                              
                              <td>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Site</option>
                                        <option>Warehouse</option>                                        
                                    </select>                                
                                </td>
                            </tr>

                            <tr>
                              <td><label>Holding Tax Text</label></td>                                                              
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
                              <td>

                              </td>
                              <td>
                                <textarea name="" id="" cols="30" rows="3"></textarea>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Before Deducation</label></td>                                                              
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                                                        
                            </tr>
                            <tr>
                              <td><label>Total Value</label></td>                                                              
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                                                        
                            </tr> 
                            <tr>
                              <td><label>COA Code</label></td>
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
                              <td><label>Job Number</label></td>                                                              
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                                                        
                            </tr>                             
                          </table>

                          <button type="reset" class="btn btn-danger btn-sm float-right">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            Cancel Add
                          </button>
                          <button type="submit" class="btn btn-success btn-sm float-right">
                            <i class="fa fa-check-square" aria-hidden="true"></i>
                            Add to RIP List (Cart)
                          </button>                    
                        </div>
                      </div>                      
                    </div>                    
                  </div>
                </div>            
                
                
                <div class="card">
                <div class="card-body">
                  <div class="card-header">
                    <label class="card-title">RPI List (Cart)</label>
                    <br><hr>
                  </div>
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                      <thead>
                        <tr>
                        <th></th>
                          <th</th>                          
                          <th></th>
                          <th>Product Id</th>
                          <th>Description</th>                          
                          <th>Uom</th>
                          <th>Price</th>
                          <th>Value</th>
                          <th>PPN</th>
                          <th>PPN Value</th>
                          <th>Gross Up</th>
                          <th>Holding Tax</th>
                          <th>Holding Tax Value</th>
                          <th>Deducation</th>
                          <th>Total Value</th>
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
                          <td>10</td>
                          <td>10</td>
                          <td>10</td>
                          <td>10</td>
                          <td>10</td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>                  
                </div>
              </div>


              <div class="card">
                <div class="card-body">
                  <div class="card-header">                                        

                    <select class="form-control select2" style="width: 10%;float:right;">
                        <option selected="selected">Clipboard</option>
                        <option>Open Clipboard</option>                                        
                        <option>Save Journal to Clipboard</option>
                    </select>
                    <a class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#searchArf" style="color:white;float:left;">
                      <i class="fas fa-plus" aria-hidden="true"></i>
                      Add New Journal
                    </a>
                    <a class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#searchArf" style="color:white;float:left;" >
                      <i class="fas fa-print" aria-hidden="true"></i>
                      Print this Journal
                    </a>


                  </div>
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                      <thead>
                        <tr>
                        <th></th>
                          <th</th>                                                    
                          <th>Rel Number</th>
                          <th>COA Code</th>                          
                          <th>COA Name</th>
                          <th>Debit</th>
                          <th>Credit</th>
                          <th>Job Number</th>
                          <th></th>                          
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
                        </tr>                        
                      </tbody>
                    </table>
                  </div>                  
                  </div>
                </div>                                
                </div>    
                </div>
              </div>
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