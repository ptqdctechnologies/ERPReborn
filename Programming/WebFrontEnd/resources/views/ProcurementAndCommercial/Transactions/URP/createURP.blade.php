@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getManagerName')
@include('getFunction.getCurrency')
@include('getFunction.getFinanceStaff')
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
                      <label class="card-title">Update Request Price</label>
                      <br>
                      <hr><br>
                      <div class="form-group">
                        <table>
                          <tr>
                            <td>
                              <div class="input-group">
                                <input id="projectcode" style="border-radius:0;" type="text" class="form-control form-control">
                                <div class="input-group-append">
                                  <span style="border-radius:0;" class="input-group-text form-control">
                                    <a href="#"><i data-toggle="modal" data-target="#checkDocument" class="fas fa-gift"></i></a>
                                  </span>
                                </div>
                              </div>
                            </td>
                            <td>
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="#"><i data-toggle="modal" data-target="#" class="fas fa-arrow-circle-left"></i></a>
                                Show
                              </span>
                            </td>

                          </tr>
                        </table>
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
        </div>
      </div>
    </div>
  </section>
</div>

<!--|----------------------------------------------------------------------------------|
    |                             Function My Project Code                             |
    |----------------------------------------------------------------------------------|-->
<div id="checkDocument" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Choose Project</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <table>
              <tr>
                <td><label>Search By</label></td>
                <td>
                  <select class="form-control" style="border-radius:0;">
                    <option selected="selected">Project</option>
                    <option>Overhead</option>
                    <option>Sales</option>
                  </select>
                </td>
                <td>
                  <div class="input-group">
                    <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </form>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Trano</th>
                      <th>Uid</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @for($i = 0; $i < 20; $i++) <tr>
                      <td><span class="tag tag-success tombolProject">
                          <p id="kata1"> Approved</p>
                        </span></td>
                      <td>
                        <p id="kata">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</p>
                      </td>
                      <td>
                        <p id="kata">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</p>
                      </td>
                      </tr>
                      @endfor
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
<!--|----------------------------------------------------------------------------------|
    |                            End Function My Project Code                          |
    |----------------------------------------------------------------------------------|-->

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
@endsection