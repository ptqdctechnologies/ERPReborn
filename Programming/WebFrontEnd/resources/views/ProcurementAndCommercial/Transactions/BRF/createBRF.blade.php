@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('ProcurementAndCommercial.Functions.project')
@include('ProcurementAndCommercial.Functions.subpc')
@include('ProcurementAndCommercial.Functions.requester')
@include('ProcurementAndCommercial.Functions.produk')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">
                    Add New Business Request Form
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                @include('ProcurementAndCommercial.Functions.sectHeader')

              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">
                    Please Fill this Form Below
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <table>
                          <tr>
                            <td><label>Requester</label></td>
                            <td>
                              <div class="input-group">
                                <input name="requester_name" id="requestNameArf" style="border-radius:0;" type="text" class="form-control">
                                <div class="input-group-append">
                                  <span style="border-radius:0;" class="input-group-text form-control">
                                    <a href="#"><i data-toggle="modal" data-target="#myRequesterNameArf" class="fas fa-gift" style="color:grey;"></i></a>
                                  </span>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td><label>Job Tittle</label></td>
                            <td>
                              <div class="input-group">
                                <select class="form-control select2bs4" style="width: 100%; border-radius:0;">
                                  <option selected="selected">Alabama</option>
                                  <option>Alaska</option>
                                  <option>California</option>
                                  <option>Delaware</option>
                                  <option>Tennessee</option>
                                  <option>Texas</option>
                                  <option>Washington</option>
                                </select>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td><label>Department</label></td>
                            <td>
                              <div class="input-group">
                                <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td><label>Reason To Travel</label></td>
                            <td>
                              <textarea name="" id="" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td><label>Date Commance Travel</label></td>
                            <td>
                              <div class="input-group">
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                  <div class="input-group-append" style="border-radius:0;" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td><label>Date End Travel</label></td>
                            <td>
                              <div class="input-group">
                                <div class="input-group date" id="endate" data-target-input="nearest">
                                  <input style="border-radius:0;" type="text" class="form-control datetimepicker-input" data-target="#endate" />
                                  <div class="input-group-append" data-target="#endate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <table>
                        <tr>
                          <td><label>Head Station Location</label></td>
                          <td>
                            <div class="input-group">
                              <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><label>Business Trip Location</label></td>
                          <td>
                            <textarea name="internal_notes" id="" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td><label>Contact Phone</label></td>
                          <td>
                            <div class="input-group">
                              <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
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

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">
                    The following condition will apply in travelling to and returning from your temporary work location
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body" id="brfhide1">
                  <div class="form-group">
                    <table>
                      <tr>
                        <td><label>Transport Type Applicable</label></td>
                      </tr>
                      <tr>
                        <td>
                          <div class="input-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                              <label for="customCheckbox1" class="custom-control-label">Bus</label>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked>
                              <label for="customCheckbox2" class="custom-control-label">Rail</label>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                              <label for="customCheckbox1" class="custom-control-label">Air</label>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked>
                              <label for="customCheckbox2" class="custom-control-label">Sea</label>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                              <label for="customCheckbox1" class="custom-control-label">QDC Vehicle</label>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked>
                              <label for="customCheckbox2" class="custom-control-label">Rain</label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Travel Arragement</label></td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                              <label for="customRadio1" class="custom-control-label">Day Trip Travel</label>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="form-group">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked>
                              <label for="customRadio2" class="custom-control-label">Short Term</label>
                            </div>
                            </di>
                        </td>
                        <td>
                          <div class="form-group">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio3" disabled>
                              <label for="customRadio3" class="custom-control-label">Long Term</label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Payment Applicable</label></td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                              <label for="customRadio1" class="custom-control-label">Lumpsum</label>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="form-group">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked>
                              <label for="customRadio2" class="custom-control-label">Non Lumpsum</label>
                            </div>
                            </di>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Accomodation</label></td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                              <label for="customRadio1" class="custom-control-label">Arrange By Company</label>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="form-group">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked>
                              <label for="customRadio2" class="custom-control-label">Arrange By Employee</label>
                            </div>
                            </di>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">
                    Transport Details
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body table-responsive p-0" style="height: 250px;" id="brfhide2">
                  <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                    <thead>
                      <tr>
                        <th>Transport Type</th>
                        <th>Transport Booking</th>
                        <th>Time Of Depart</th>
                        <th>Time Of Arrival</th>
                        <th>Quoted Fare(IDR)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
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
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">
                    Please select your budget for this business trip
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body table-responsive p-0" style="height: 250px;" id="brfhide3">
                  <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                    <thead>
                      <tr>
                        <th>Work ID</th>
                        <th>Work Name</th>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Valuta</th>
                        <th>Total Budget</th>
                        <th>Total Cost</th>
                        <th>Available</th>
                        <th>Applied</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
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
            </div>
          </div>


          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">
                    Bussiness Trip Cost Payment
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>
                <br>
                <div class="card-body table-responsive p-0" style="height: 40px;" id="brfhide4">
                  <table>
                    <tr>
                      <td><label>Budget Request</label></td>
                      <td>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                          </div>
                          <input type="text" class="form-control">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">
                    Please Fill this Form Below
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body" id="brfhide5">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="form-group">
                            <table>
                              <tr>
                                <td><label>Sequence</label></td>
                              </tr>
                              <tr>
                                <td><label>Allowance</label></td>
                                <td>
                                  <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td><label>Transport</label></td>
                                <td>
                                  <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="form-group">
                            <table>
                              <br>
                              <tr>
                                <td><label>Airport Tax</label></td>
                                <td>
                                  <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td><label>Accomodation</label></td>
                                <td>
                                  <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="form-group">
                            <table>
                              <br>
                              <tr>
                                <td><label>Other</label></td>
                                <td>
                                  <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>
                          <br><br>
                        </div>
                      </div>
                      <button type="reset" class="btn btn-danger btn-sm float-right">
                        <i class="fa fa-times" aria-hidden="true"></i>
                        Reset
                      </button>
                      <button type="submit" class="btn btn-success btn-sm float-right">
                        <i class="fa fa-check-square" aria-hidden="true"></i>
                        Add
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">Business Trip Request Form
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body table-responsive p-0" style="height: 250px;" id="brfhide6">
                  <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Payment Sequence</th>
                        <th>Allowance</th>
                        <th>Transport</th>
                        <th>Airport Tax</th>
                        <th>Accomodation</th>
                        <th>Others</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <a class="btn btn-warning btn-sm" href="#">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@include('Partials.footer')
<script type="text/javascript">
  $(document).ready(function() {
    $("#brfhide1").hide();
    $("#brfhide2").hide();
    $("#brfhide3").hide();
    $("#brfhide4").hide();
    $("#brfhide5").hide();
    $("#brfhide6").hide();
  });
</script>

<script>
    var x = 1; //initlal text box count        
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    $('.add_field_button').click(function () {
            cek = 0;
            addColomn();
    });
    function addColomn(){ //on add input button click
        if(cek == 0){
            cek++;
            x++; //text box increment
            $(wrapper).append(

                '<div class="col-md-12">'
                +   '<div class="form-group">'
                +       '<div class="input-group control-group" style="width:105%;position:relative;right:8px;">'
                +           '<input type="file" class="form-control filenames" id="filenames_' + x + '" style="height:26px;">'
                +           '<div class="input-group-btn">'
                +               '<button class="btn btn-outline-secondary btn-sm remove_field" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>'
                +           '</div>'
                +       '</div>'
                +    '</div>'
                +'</div>'

            ); //add input box                
        }                        
    }

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().parent('div').remove(); x--;
    })

</script>

@endsection