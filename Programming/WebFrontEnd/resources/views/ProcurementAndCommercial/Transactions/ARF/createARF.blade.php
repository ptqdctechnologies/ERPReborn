@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('ProcurementAndCommercial.Transactions.ARF.project')
@include('ProcurementAndCommercial.Transactions.ARF.subpc')
@include('ProcurementAndCommercial.Transactions.ARF.requester')
@include('ProcurementAndCommercial.Transactions.ARF.currency')
@include('ProcurementAndCommercial.Transactions.ARF.manager')
@include('ProcurementAndCommercial.Transactions.ARF.financeStaff')
@include('ProcurementAndCommercial.Transactions.ARF.produk')
manager
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <nav class="w-100">
          <div class="nav nav-tabs" id="product-tab" role="tablist">
            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">ARF</a>
            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">BOQ Detail</a>
          </div>
        </nav>

        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">
            <form method="post" action="" enctype="multipart/form-data" id="quickForm">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Add New Advanced Request Form (ARF)
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus btn-sm"></i>
                      </button>
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>Project Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input required="" id="projectcode" style="border-radius:0;" name="projek_code" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>

                              <td>
                                <input required="" id="projectname" style="border-radius:0;" readonly="" class="form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Site Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input required="" id="subprojectc" style="border-radius:0;" name="sub_projek_code" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#mySPC" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input required="" id="subprojectn" style="border-radius:0;" readonly="" class="form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Currency</label></td>
                              <td>
                                <div class="input-group">
                                  <input required="" id="currencyCode" style="border-radius:0;" name="request_name" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myCurrency" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input required="" id="currencyName" style="border-radius:0;" readonly="" class="form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>PIC Name</label></td>
                              <td>
                                <div class="input-group">
                                  <input required="" id="requestcode" style="border-radius:0;" readonly="" name="request_name" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <input required="" id="requestname" style="border-radius:0;" readonly="" class="form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Manager</label></td>
                              <td>
                                <div class="input-group">
                                  <input required="" id="managerArfUid" style="border-radius:0;" name="manager" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myManagerArf" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input required="" id="managerArfName" style="border-radius:0;" readonly="" class="form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Finance Staff</label></td>
                              <td>
                                <div class="input-group">
                                  <input required="" id="financeArfUid" style="border-radius:0;" name="manager" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#"><i data-toggle="modal" data-target="#myfinanceArf" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <input required="" id="financeArfName" style="border-radius:0;" readonly="" class="form-control">
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


          <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Detail Transaction & Attachment
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus btn-sm"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>Name Of Beneficiary</label></td>
                              <td>
                                <input required="" id="" style="border-radius:0;" type="text" class="form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Bank Name</label></td>
                              <td>
                                <input required="" id="" style="border-radius:0;" type="text" class="form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Account Name</label></td>
                              <td>
                                <input required="" id="" style="border-radius:0;" type="text" class="form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Account Number</label></td>
                              <td>
                                <input required="" id="" style="border-radius:0;" type="text" class="form-control">
                              </td>
                            </tr>
                            <tr>
                              <td><label>Origin Of Budget</label></td>
                              <td>
                                <div class="input-group">
                                  <select class="form-control select2bs4" style="width: 100%;">
                                    <option selected="selected">Project</option>
                                    <option>Overhead</option>
                                    <option>Sales</option>
                                  </select>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><Label>Internal Notes</Label></td>
                              <td>
                                <textarea name="" id="" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="input-group control-group increment">
                            <input required="" type="file" name="filename[]" class="form-control">
                            <div class="input-group-btn">
                              <button class="btn btn-outline-primary btn-sm fileInputMulti" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                          </div>
                          <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                              <input required="" type="file" name="filename[]" class="form-control">
                              <div class="input-group-btn">
                                <button class="btn btn-outline-secondary btn-sm remove-attachment" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br><br><br><br><br>

                        <button type="reset" class="btn btn-outline-danger btn-sm float-right" title="Cancel">
                          <i class="fa fa-times" aria-hidden="true">Cancel</i>
                        </button>
                        <button type="submit" class="btn btn-outline-success btn-sm float-right" title="Submit" style="margin-right:5px;">
                          <i class="fas fa-plus" aria-hidden="true">Submit</i>
                        </button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>

          <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      BOQ3 Detail
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus btn-sm"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Applied</th>
                          <th>Work Id</th>
                          <th>Work Name</th>
                          <th>Product Id</th>
                          <th>Description</th>
                          <th>Qty</th>
                          <th>Uom</th>
                          <th>Price</th>
                          <th>Total</th>
                          <th>Currency</th>
                          <th>Remark</th>
                        </tr>
                      </thead>
                      <tbody>
                        @for($i = 0; $i < 5; $i++) <tr>
                          <td>
                            <button type="reset" class="btn btn-outline-success btn-sm float-right klikDetailArf" title="Submit">
                              <i class="fas fa-plus" aria-hidden="true"></i>
                            </button>

                          </td>
                          <td><span>1</span></td>
                          <td><span class="tag tag-success" id="getWorkId">2</span></td>
                          <td><span class="tag tag-success" id="getWorkName">3</span></td>
                          <td><span class="tag tag-success" id="getProductId">4</span></td>
                          <td><span>5</span></td>
                          <td><span class="tag tag-success" id="getQty">6</span></td>
                          <td><span>7</span></td>
                          <td><span class="tag tag-success" id="getPrice">8</span></td>
                          <td><span>9</span></td>
                          <td><span>10</span></td>
                          <td><span class="tag tag-success" id="getRemark">11</span></td>
                          </tr>
                          @endfor
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Detail Transaction & Available Total
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus btn-sm"></i>
                      </button>
                    </div>
                  </div>


                  <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data" id="quickForm">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="card">
                            <div class="card-body">
                              <div class="form-group">
                                <table>
                                  <tr>
                                    <td><label>Requester Name</label></td>
                                    <td>
                                      <div class="input-group">
                                        <input required="" id="requestNameArf" style="border-radius:0;" type="text" class="form-control">
                                        <div class="input-group-append">
                                          <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i data-toggle="modal" data-target="#myRequesterNameArf" class="fas fa-gift" style="color:grey;"></i></a>
                                          </span>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><label>Work Id</label></td>
                                    <td>
                                      <input required="" id="putWorkId" style="border-radius:0;" type="text" class="form-control" value="">
                                    </td>
                                    <td>
                                      <input required="" id="putWorkName" style="border-radius:0;" type="text" class="form-control">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><label>Product Id</label></td>
                                    <td>
                                      <div class="input-group">
                                        <input required="" id="putProductId" style="border-radius:0;" type="text" class="form-control">
                                        <div class="input-group-append">
                                          <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i data-toggle="modal" data-target="#myProductArf" class="fas fa-gift" style="color:grey;"></i></a>
                                          </span>
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                      <input required="" id="produkArfName" style="border-radius:0;" type="text" class="form-control">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><label>Qty</label></td>
                                    <td>
                                      <input required="" id="putQty" style="border-radius:0;" type="text" class="form-control">
                                    </td>
                                    <td>
                                      <input required="" id="id" style="border-radius:0;" type="text" class="form-control">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><label>Unit Price</label></td>
                                    <td>
                                      <input required="" id="putPrice" style="border-radius:0;" type="text" class="form-control">
                                    </td>
                                    <td>
                                      <input required="" id="id6" style="border-radius:0;" type="text" class="form-control">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><Label>Remark</Label></td>
                                    <td>
                                      <textarea name="" id="putRemark" cols="30" rows="3" class="form-control"></textarea>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><label>NetAct</label></td>
                                    <td>
                                      <input required="" id="id6" style="border-radius:0;" type="text" class="form-control">
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              <button type="reset" class="btn btn-outline-danger btn-sm float-right" title="Cancel">
                                <i class="fa fa-times" aria-hidden="true">Cancel</i>
                              </button>
                              <button type="submit" class="btn btn-outline-success btn-sm float-right" style="margin-right:5px;" title="Add to ARF List(Cart)">
                                <i class="fas fa-check" aria-hidden="true">Add to ARF List(Cart)</i>
                              </button>
                            </div>
                          </div>
                        </div>
                    </form>

                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title" style="border:10px solid #DCDCDC;width:100%;">
                            <p style="position:relative;text-align:center;top:7px;">Available Total</p>
                          </div>

                          <div class="card-body table-responsive p-0" style="height: 90px;">
                            <table>

                              <tbody>
                                <br>
                                <tr>
                                  <td>BOQ3 after AFE</td>
                                  <td>:</td>
                                  <td style="font-weight:bold;">{{ number_format(200000,2,',','.') }}</td>
                                </tr>
                                <tr>
                                  <td>Requester Total</td>
                                  <td>:</td>
                                  <td style="font-weight:bold;">{{ number_format(200000,2,',','.') }}</td>
                                </tr>
                                <tr>
                                  <td>Balance</td>
                                  <td>:</td>
                                  <td style="font-weight:bold;color:red;">{{ number_format(200000,2,',','.') }}</td>
                                </tr>
                                <tr>
                                  <td>New Balance</td>
                                  <td>:</td>
                                  <td style="font-weight:bold;color:red;">{{ number_format(200000,2,',','.') }}</td>
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
          </div>
        </div>

        <form method="post" action="" enctype="multipart/form-data" id="quickForm">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">
                    ARF List (Cart)
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus btn-sm"></i>
                    </button>
                  </div>
                </div>

                <div class="card-body table-responsive p-0" style="height: 300px;">
                  <table id="editableArf" class="table table-head-fixed text-nowrap table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Work Id</th>
                        <th>Work Name</th>
                        <th>Product Id</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Uom</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Currency</th>
                        <th>Remark</th>
                        <th>Net Act</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
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
                        <td>yes</td>
                        <td>yes</td>
                      </tr>
                      <tr>
                        <td>2</td>
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
                        <td>yes</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <button type="reset" class="btn btn-outline-danger btn-sm float-right" title="Cancel">
                <i class="fa fa-times" aria-hidden="true">Cancel ARF List(Cart)</i>
              </button>
              <button type="submit" class="btn btn-outline-success btn-sm float-right" style="margin-right:5px;" title="Add to ARF List(Cart)">
                <i class="fas fa-save" aria-hidden="true">Save ARF List(Cart)</i>
              </button>
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
    $(".btn-success").click(function() {
      var html = $(".clone").html();
      $(".increment").after(html);
    });
    $("body").on("click", ".btn-danger", function() {
      $(this).parents(".control-group").remove();
    });
  });
</script>

<!-- EDITABLE -->

<script type="text/javascript">
  $(document).ready(function() {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#editableArf').Tabledit({
      url: '{{ route("ASF.editableAsf") }}',
      editButton: true,
      deleteButton: true,
      buttons: {
        edit: {
          class: 'btn btn-outline-secondary',
          html: '<i class="fa fa-pen"></i>&nbsp;',
          action: 'edit'
        },
        delete: {
          class: 'btn btn-outline-secondary',
          html: '<i class="fa fa-trash"></i>&nbsp;',
          action: 'delete'
        },
        save: {
          class: 'btn btn-sm btn-success',
          html: 'Save'
        },
        restore: {
          class: 'btn btn-sm btn-warning',
          html: 'Restore',
          action: 'restore'
        },
        confirm: {
          class: 'btn btn-sm btn-danger',
          html: 'Confirm'
        }
      },
      columns: {
        identifier: [0, 'id'],
        editable: [
          [1, 'nickname'],
          [2, 'firstname'],
          [3, 'lastname'],
          [4, 'nickname'],
          [5, 'firstname'],
          [6, 'lastname'],
          [7, 'nickname'],
          [8, 'firstname'],
          [9, 'lastname'],
          [10, 'nickname'],
          [11, 'firstname']
        ]
      },

      restoreButton: false,
      onSuccess: function(data, textStatus, jqXHR) {
        if (data.action == 'delete') {
          $('#' + data.id).remove();
        }
      }
    });
  });
</script>
<!-- ENDEDITABLE -->

@endsection