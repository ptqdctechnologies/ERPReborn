<div class="col-12 ShowDocument">
  <div class="card">
    <form method="post" enctype="multipart/form-data" action="{{ route('AdvanceRequest.ReportAdvanceSummaryDetailStore') }}">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Document Number&nbsp;</label></th>
                  <td>
                    <div class="input-group">
                      <input id="advance_RefID" hidden name="advance_RefID" value="{{ $advance_RefID }}">
                      <input id="advance_number" style="border-radius:0;background-color:white;" class="form-control" name="advance_number" value="{{ $advance_number }}" readonly>
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#" id="advance_popup" data-toggle="modal" data-target="#PopUpTableAdvanceRevision" class="PopUpTableAdvanceRevision"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                        </span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <button class="btn btn-default btn-sm" type="submit">
                      <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="" title="Show"> Show
                    </button>
                  </td>
                  </form>
                </tr>
              </table>
            </div>
          </div>  

          <div class="col-md-2">
            <div class="form-group">
              <table style="float:right;">
                <tr>
                  <form method="post" enctype="multipart/form-data" action="{{ route('AdvanceRequest.PrintExportReportAdvanceSummary') }}" id="FormSubmitReportAdvanceSummary">
                    @csrf
                    <td>
                      <select name="print_type" id="print_type" class="form-control">
                        <option value="PDF">PDF</option>
                        <option value="Excel">Excel</option>
                      </select>
                    </td>
                    <td>

                      <button class="btn btn-default btn-sm" type="submit">
                        <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" title="Print">
                      </button>
                    </td>

                  </form>
                </tr>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('.PopUpTableAdvanceRevision').on('click', function(e) {
            e.preventDefault();

            var keys = 0;

            $.ajax({
                type: 'GET',
                url: '{!! route("AdvanceRequest.AdvanceListData") !!}',
                success: function(data) {
                    var no = 1; t = $('#TableSearchArfRevision').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_advance_revision' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.DocumentNumber + '</td>',
                            '<td>' + val.CombinedBudgetCode + '</td>',
                            '<td>' + val.CombinedBudgetName + '</td>',
                            '<td>' + val.CombinedBudgetSectionCode + '</td>',
                            '<td>' + val.CombinedBudgetSectionName + '</td></tr></tbody>'
                        ]).draw();

                    });
                }
            });
        });

    });
</script>