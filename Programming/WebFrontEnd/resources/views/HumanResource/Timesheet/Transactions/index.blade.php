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
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">
                Timesheet
              </li>
            </ol>
          </div>
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
                <div class="ml-3 mt-3">
                  <button class="btn btn-success btn-sm" id="addEventButton" data-toggle="modal" data-target="#eventModal">
                    <i class="fa fa-plus"></i> Add Activity
                  </button>
                </div>
                <div id="calendar"></div>
                <div class="py-3 pr-3 d-flex justify-content-end">
                  <button type="submit" class="btn btn-success btn-sm">
                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit"> Submit
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<!-- EVENT MODAL -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <!-- TITLE -->
      <div class="modal-header">
        <h3 class="modal-title text-bold" id="eventModalLabel">Add Activity</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- BODY -->
      <div class="modal-body">
        <div class="card mb-0">
          <div class="card-body">
            <div class="row" style="row-gap: 1rem;">
              <!-- START DATE -->
              <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="row p-0 align-items-center">
                  <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Start Date</label>
                  <div class="col-sm-9 col-md-8 col-lg-7 p-0">
                    <div class="input-group date" id="startDate" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="eventStartDate" id="eventStartDate" data-target="#startDate" style="height: auto;" />
                      <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- FINISH DATE -->
              <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="row p-0 align-items-center">
                  <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Finish Date</label>
                  <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="input-group date" id="finishDate" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="eventFinishDate" id="eventFinishDate" data-target="#finishDate" style="height: auto;" />
                      <div class="input-group-append" data-target="#finishDate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- FROM -->
              <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="row p-0 align-items-center">
                  <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">From</label>
                  <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="input-group date" id="fromHours" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="eventFromHours" id="eventFromHours" data-target="#fromHours" style="height: auto;" />
                      <div class="input-group-append" data-target="#fromHours" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- TO -->
              <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="row p-0 align-items-center">
                  <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">To</label>
                  <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="input-group date" id="toHours" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="eventToHours" id="eventToHours" data-target="#toHours" style="height: auto;" />
                      <div class="input-group-append" data-target="#toHours" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- PROJECT CODE -->
              <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="row p-0 align-items-center">
                  <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Project Code</label>
                  <div class="col-sm-9 col-md-8 col-lg-7 p-0">
                    <select class="form-control select2bs4" id="projectSelect" onchange="getSite(this);" style="width: 100%;">
                      <option disabled selected>Select a Project Code</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- SITE CODE -->
              <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="row p-0 align-items-center">
                  <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Site Code</label>
                  <div class="col-sm-9 col-md-8 col-lg-7 p-0">
                    <div id="siteSelectContainer">
                      <select class="form-control select2bs4" id="siteSelect" style="width: 100%;">
                        <option disabled selected>Select a Site Code</option>
                      </select>
                    </div>

                    <div class="spinner-border spinner-border-sm" id="siteLoading" role="status">
                      <span class="sr-only"></span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- ON BEHALF OF -->
              <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="row p-0 align-items-center">
                  <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">On Behalf Of</label>
                  <div class="col-sm-9 col-md-8 col-lg-7 p-0">
                    <select class="form-control select2bs4" id="onBehalfSelect" style="width: 100%;">
                      <option disabled selected>Select On Behalf</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- DAILY ACT -->
              <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="row p-0 align-items-center">
                  <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Daily Act</label>
                  <div class="col-sm-9 col-md-8 col-lg-7 p-0">
                    <textarea class="form-control" name="eventDailyAct" id="eventDailyAct"></textarea>
                  </div>
                </div>
              </div>

              <div class="d-sm-none d-md-none d-lg-block col-sm-12 col-md-12 col-lg-6"></div>

              <!-- BUTTON -->
              <div class="col-sm-12 col-md-12 col-lg-6 float-right">
                <div class="row p-0">
                  <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                  <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-end" style="gap: .5rem;">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-sm" id="eventModalSubmit" onclick="saveEvent()">Save</button>
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

@include('Partials.footer')
@include('HumanResources.Timesheet.Functions.Footer.footerTimesheet')
@endsection