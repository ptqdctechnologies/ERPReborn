@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
  <div class="card card-primary">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Timesheet</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Timesheet</li>
            </ol>
          </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div class="ml-3 mt-3">
                  <button class="btn btn-success btn-sm" id="addEventButton">Add Event</button>
                </div>
                <div id="calendar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="modal fade" id="popUpCalender" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="position: relative;top:120px;right:75px;width:130%;">
            <div class="modal-header">
                <h3>Add Event</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="popUpCalender">
              <form action="{{ route('Timesheet.store') }}" method="post">
                @csrf
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                          <table>
                            <tr>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <td>Start Date</td>
                                  <td>
                                    <div class="input-group" style="width: 80%;">
                                      <input type="date" name="start" id="start" style="border-radius:0;" class="form-control">
                                    </div>
                                  </td>
                                  <td>End Date</td>
                                  <td>
                                    <div class="input-group">
                                      <input type="date" name="end" id="end" style="border-radius:0;" class="form-control">
                                    </div>
                                  </td>
                                </div>
                              </div>
                            </tr>
                            <tr>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <td>From</td>
                                  <td>
                                    <div class="input-group" style="width: 80%;">
                                      <select id="from" name="from" class="form-control" style="border-radius:0;">
                                        <option value="08:00">08:00</option>
                                        <option value="09:00">09:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                        <option value="21:00">21:00</option>
                                        <option value="22:00">22:00</option>
                                        <option value="23:00">23:00</option>
                                      </select>
                                    </div>
                                  </td>
                                  <td>To</td>
                                  <td>
                                    <div class="input-group">
                                      <select id="to" name="to" class="form-control" style="border-radius:0;">
                                        <option value="08:00">08:00</option>
                                        <option value="09:00">09:00</option>
                                        <option value="10:00">10:00</option>
                                        <option value="11:00">11:00</option>
                                        <option value="12:00">12:00</option>
                                        <option value="13:00">13:00</option>
                                        <option value="14:00">14:00</option>
                                        <option value="15:00">15:00</option>
                                        <option value="16:00">16:00</option>
                                        <option value="17:00">17:00</option>
                                        <option value="18:00">18:00</option>
                                        <option value="19:00">19:00</option>
                                        <option value="20:00">20:00</option>
                                        <option value="21:00">21:00</option>
                                        <option value="22:00">22:00</option>
                                        <option value="23:00">23:00</option>
                                      </select>
                                    </div>
                                  </td>
                                </div>
                              </div>
                            </tr>
                            <tr>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <td>All Day</td>
                                  <td>
                                    <div class="icheck-primary d-inline">
                                      <input type="radio" id="cek" name="allDay" value="All Day">
                                      Yes
                                    </div>
                                    <div class="icheck-primary d-inline">
                                      <input type="radio" id="cek2" name="allDay" value="All Day">
                                      No
                                    </div>
                                  </td>
                                </div>
                              </div>
                            </tr>
                            <tr>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <td>Budget</td>
                                  <td>
                                    <div class="input-group" style="width: 80%;">
                                      <input id="projectcode" style="border-radius:0;" name="var_budget_code" class="form-control">
                                      <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                          <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                        </span>
                                      </div>
                                    </div>
                                  </td>
                                  <td>Sub Budget</td>
                                  <td>
                                    <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" name="var_budget_code" class="form-control">
                                      <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                          <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                        </span>
                                      </div>
                                    </div>
                                  </td>
                                </div>
                              </div>
                            </tr>
                            <tr>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <td>Daily Act</td>
                                  <td>
                                    <div class="input-group" style="width: 80%;">
                                      <textarea name="title" id="title" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                  </td>
                                  <td>On Behalf Of</td>
                                  <td>
                                    <div class="input-group">
                                      <input id="projectcode" style="border-radius:0;" name="var_budget_code" class="form-control">
                                      <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                          <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                        </span>
                                      </div>
                                    </div>
                                  </td>
                                </div>
                              </div>
                            </tr>
                            <tr>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <td>Background</td>
                                  <td>
                                    <div class="input-group" style="width: 80%;">
                                      <input type="color" id="projectcode" style="border-radius:0;" name="var_budget_code" class="form-control">
                                    </div>
                                  </td>
                                  <td>Text</td>
                                  <td>
                                    <div class="input-group">
                                      <input type="color" id="projectcode" style="border-radius:0;" name="var_budget_code" class="form-control">
                                    </div>
                                  </td>
                                </div>
                              </div>
                            </tr>
                          </div>
                        </div>
                      </table>
                    </div>
                  </div>
                </div>
              <button type="submit" class="btn btn-outline btn-success btn-sm" style="margin-left: 280px;">
                  <i class="fa fa-pencil" aria-hidden="true">Submit</i>
              </button>
              </form>
            </div>
        </div>
    </div>
</div>
  <!-- /.content-wrapper -->

@include('Partials.footer')
@include('HumanResources.Timesheet.Functions.Footer.footerTimesheet')
@endsection