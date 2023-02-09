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
                  <button class="btn btn-success btn-sm" id="addEventButton"><i class="fa fa-plus"></i>Add Event</button>
                  <button class="btn btn-success btn-sm" id="addActivityButton"><i class="fa fa-plus"></i>Add Activity</button>
                  <button class="btn btn-success btn-sm" id="filterEventButton"><i class="fa fa-filter"></i> Filter</button>
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

<div class="modal fade" id="popUpFilter" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="position: relative;top:120px;right:155px;width:170%;">
      <div class="modal-header">
          <h3>Filter By</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body" id="popUpFilter">
        <form action="{{ route('Timesheet.index') }}" method="get">
          <input type="hidden" name="test" value="1">
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="row">
                <table>
                  <!-- <tr>
                    <div class="col-md-12">
                      <div class="form-group">
                        <td>Project</td>
                        <td>
                          <div class="input-group">
                            <select class="form-control SelectProject2" id="SelectProject2" name="SelectProject2" style="border-radius:0;">
                              @foreach($data as $datas1)
                              <option value="{{ $datas1['sys_ID'] }}">{{$datas1['sys_Text']}}</option>
                              @endforeach
                            </select>
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Site</td>
                        <td>
                          <div class="input-group">
                            <select class="form-control select2" id="SelectSite2" name="SelectSite2" style="border-radius:0;">
                              <option value=""> -- Select Site -- </option>
                            </select>
                          </div>
                        </td>
                      </div>
                    </div>
                  </tr> -->
                  <tr>
                    <div class="col-md-12">
                      <div class="form-group">
                        <td>Date</td>
                        <td>
                          <div class="input-group">
                            <input type="date" name="FilterDate" id="FilterDate" style="border-radius:0;" class="form-control">
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;On Behalf Of</td>
                          <td>
                            <div class="input-group">
                              <select class="form-control select2" id="FilterBehalfOf" name="FilterBehalfOf" style="border-radius:0;">
                              <option value=""> -- Select Person -- </option>
                                @foreach($data2 as $datas2)
                                <option value="{{ $datas2['sys_ID'] }}">{{$datas2['sys_Text']}}</option>
                                @endforeach
                              </select>
                            </div>
                          </td>
                        </div>
                      </div>
                    </div>
                  </tr>
                  <tr>
                    <div class="col-md-12">
                      <div class="form-group">
                      <td>Timesheet</td>
                        <td>
                          <div class="input-group" style="width: 100%;">
                            <select class="form-control select2" style="border-radius:0;" name="timesheet">
                              <option value=""> -- Select Timesheet -- </option>
                              @foreach($TimesheetData as $TimesheetDatas)
                              <option value="{{ $TimesheetDatas['sys_ID'] }}">{{$TimesheetDatas['documentNumber']}}</option>
                              @endforeach
                            </select>
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Document Number</td>
                        <td>
                          <div class="input-group">
                            <input type="text" name="FilterDocumentNumber" id="FilterDocumentNumber" style="border-radius:0;" class="form-control">
                          </div>
                        </td>
                      </div>
                    </div>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-outline btn-success btn-sm" style="margin-left: 370px;">
              <i class="fa fa-pencil" aria-hidden="true">Submit</i>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="popUpCalender" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="position: relative;top:120px;right:155px;width:170%;">
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
                          <div class="input-group">
                            <input type="date" name="startDate" id="startDate" style="border-radius:0;" class="form-control">
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Finish Date</td>
                        <td>
                          <div class="input-group">
                            <input type="date" name="finishDate" id="finishDate" style="border-radius:0;" class="form-control">
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
                          <div class="input-group">
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
                        <td>&nbsp;&nbsp;To</td>
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
                        <td>Project</td>
                        <td>
                          <div class="input-group">
                            <select class="form-control SelectProject" name="ProjectEvent" style="border-radius:0;">
                              @foreach($data as $datas1)
                              <option value="{{ $datas1['sys_ID'] }}">{{$datas1['sys_Text']}}</option>
                              @endforeach
                            </select>
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Site</td>
                        <td>
                          <div class="input-group">
                            <select class="form-control SelectSite select2" id="SelectSite" name="SelectSite" style="border-radius:0;">
                              <option value=""> -- Select Site -- </option>
                            </select>
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
                          <div class="input-group">
                            <textarea name="activity" id="activity" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;On Behalf Of</td>
                        <td>
                          <div class="input-group">
                            <select class="form-control select2" id="behalfOf" name="behalfOf" style="border-radius:0;">
                              @foreach($data2 as $datas2)
                              <option value="{{ $datas2['sys_ID'] }}">{{$datas2['sys_Text']}}</option>
                              @endforeach
                            </select>
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
                          <div class="input-group">
                            <input type="color" id="backgroundColor" style="border-radius:0;" name="backgroundColor" class="form-control">
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Text</td>
                        <td>
                          <div class="input-group">
                            <input type="color" id="textColor" style="border-radius:0;" name="textColor" class="form-control">
                          </div>
                        </td>
                      </div>
                    </div>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-outline btn-success btn-sm" style="margin-left: 370px;">
              <i class="fa fa-pencil" aria-hidden="true">Submit</i>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="popUpCalenderEdit" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="position: relative;top:120px;right:155px;width:170%;">
      <div class="modal-header">
          <h3>Edit Event</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body" id="popUpCalenderEdit">
        <form action="{{ route('Timesheet.updates') }}" method="post">
        <input type="hidden" name="timesheetId" id="timesheetId" style="border-radius:0;" class="form-control">
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
                          <div class="input-group">
                            <input type="date" name="startDate2" id="startDate2" style="border-radius:0;" class="form-control">
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Finish Date</td>
                        <td>
                          <div class="input-group">
                            <input type="date" name="finishDate2" id="finishDate2" style="border-radius:0;" class="form-control">
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
                          <div class="input-group">
                            <select id="from2" name="from2" class="form-control" style="border-radius:0;">
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
                        <td>&nbsp;&nbsp;To</td>
                        <td>
                          <div class="input-group">
                            <select id="to2" name="to2" class="form-control" style="border-radius:0;">
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
                        <td>Project</td>
                        <td>
                          <div class="input-group">
                            <select class="form-control SelectProject" name="ProjectEvent2" style="border-radius:0;">
                              @foreach($data as $datas1)
                              <option value="{{ $datas1['sys_ID'] }}">{{$datas1['sys_Text']}}</option>
                              @endforeach
                            </select>
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Site</td>
                        <td>
                          <div class="input-group">
                            <select class="form-control SelectSite select2" id="SelectSite" name="SelectSite" style="border-radius:0;">
                              <option value=""> -- Select Site -- </option>
                            </select>
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
                          <div class="input-group">
                            <textarea name="activity2" id="activity2" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;On Behalf Of</td>
                        <td>
                          <div class="input-group">
                            <select class="form-control select2" id="behalfOf2" name="behalfOf2" style="border-radius:0;">
                              @foreach($data2 as $datas2)
                              <option value="{{ $datas2['sys_ID'] }}">{{$datas2['sys_Text']}}</option>
                              @endforeach
                            </select>
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
                          <div class="input-group">
                            <input type="color" id="backgroundColor2" style="border-radius:0;" name="backgroundColor2" class="form-control">
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Text</td>
                        <td>
                          <div class="input-group">
                            <input type="color" id="textColor2" style="border-radius:0;" name="textColor2" class="form-control">
                          </div>
                        </td>
                      </div>
                    </div>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-outline btn-success btn-sm" style="margin-left: 370px;">
              <i class="fa fa-pencil" aria-hidden="true">Submit</i>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="popUpActivity" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="position: relative;top:120px;right:155px;width:170%;">
      <div class="modal-header">
          <h3>Add Activity</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body" id="popUpActivity">
        <form action="{{ route('Timesheet.storeActivity') }}" method="post">
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
                          <div class="input-group">
                            <input type="date" name="startDate3" id="startDate3" style="border-radius:0;" class="form-control">
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Finish Date</td>
                        <td>
                          <div class="input-group">
                            <input type="date" name="finishDate3" id="finishDate3" style="border-radius:0;" class="form-control">
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
                          <div class="input-group">
                            <textarea name="activity3" id="activity3" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Timesheet</td>
                        <td>
                          <div class="input-group" style="width: 150%;">
                            <select class="form-control select2" style="border-radius:0;" name="timesheet2">
                              <option value=""> -- Select Timesheet -- </option>
                              @foreach($TimesheetData as $TimesheetDatas)
                              <option value="{{ $TimesheetDatas['sys_ID'] }}">{{$TimesheetDatas['documentNumber']}}</option>
                              @endforeach
                            </select>
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
                          <div class="input-group">
                            <input type="color" id="backgroundColor3" style="border-radius:0;" name="backgroundColor3" class="form-control">
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Text</td>
                        <td>
                          <div class="input-group">
                            <input type="color" id="textColor3" style="border-radius:0;" name="textColor3" class="form-control">
                          </div>
                        </td>
                      </div>
                    </div>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-outline btn-success btn-sm" style="margin-left: 370px;">
              <i class="fa fa-pencil" aria-hidden="true">Submit</i>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="popUpEditActivity" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="position: relative;top:120px;right:155px;width:170%;">
      <div class="modal-header">
          <h3>Edit Activity</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body" id="popUpEditActivity">
        <form action="{{ route('Timesheet.storeActivity') }}" method="post">
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
                          <div class="input-group">
                            <input type="date" name="startDate3" id="startDate3" style="border-radius:0;" class="form-control">
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Finish Date</td>
                        <td>
                          <div class="input-group">
                            <input type="date" name="finishDate3" id="finishDate3" style="border-radius:0;" class="form-control">
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
                          <div class="input-group">
                            <textarea name="activity3" id="activity3" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Timesheet</td>
                        <td>
                          <div class="input-group" style="width: 150%;">
                            <select class="form-control select2" style="border-radius:0;" name="timesheet2">
                              <option value=""> -- Select Timesheet -- </option>
                              @foreach($TimesheetData as $TimesheetDatas)
                              <option value="{{ $TimesheetDatas['sys_ID'] }}">{{$TimesheetDatas['documentNumber']}}</option>
                              @endforeach
                            </select>
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
                          <div class="input-group">
                            <input type="color" id="backgroundColor3" style="border-radius:0;" name="backgroundColor3" class="form-control">
                          </div>
                        </td>
                        <td>&nbsp;&nbsp;Text</td>
                        <td>
                          <div class="input-group">
                            <input type="color" id="textColor3" style="border-radius:0;" name="textColor3" class="form-control">
                          </div>
                        </td>
                      </div>
                    </div>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-outline btn-success btn-sm" style="margin-left: 370px;">
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