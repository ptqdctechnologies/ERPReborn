<div id="mySearchArf" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Advance Request</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <form method="post" enctype="multipart/form-data" action="{{ route('AdvanceSettlement.SearchAdvanceRequest') }}" id="FormSubmitSearchAdvance">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td style="padding-top: 10px;"><label>Budget&nbsp;Code</label></td>
                                        <td>
                                            <div class="input-group">
                                                <input autocomplete="off" id="budget_code" style="border-radius:0;" name="budget_code" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 10px;"><label>Requester</label></td>
                                        <td>
                                            <div class="input-group">
                                                <input autocomplete="off" id="requester" style="border-radius:0;" name="requester" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 10px;"><label>Transaction&nbsp;Number</label></td>
                                        <td>
                                            <div class="input-group">
                                                <input autocomplete="off" id="trano" style="border-radius:0;" name="trano" class="form-control">
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
                                        <td style="padding-top: 10px;"><label>Sub&nbsp;Budget&nbsp;Code</label></td>
                                        <td>
                                            <div class="input-group">
                                                <input autocomplete="off" id="sub_budget_code" style="border-radius:0;" name="sub_budget_code" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 10px;"><label>Benificiary</label></td>
                                        <td>
                                            <div class="input-group">
                                                <input autocomplete="off" id="benificiary" style="border-radius:0;" name="benificiary" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br><br>
                            <a class="btn btn-default btn-sm" style="float: right;" onclick="ResetFilter()">
                                <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="12" alt="" title="Reset"> &nbsp; Reset
                            </a>
                            <button class="btn btn-default btn-sm" style="float: right;position: relative;right:10px;" type="submit" id="SubmitSearchAdvance" >
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="12" alt="" title="Search"> &nbsp; Search
                            </button>
                        </div>
                    </div>
                </form>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="min-height: 390px;">
                                <table class="table table-head-fixed text-nowrap TableSearchArfinAsf" id="TableSearchArfinAsf">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Transaction Number</th>
                                            <th>Budget Code</th>
                                            <th>Sub Budget Code</th>
                                            <th>Requester</th>
                                            <th>Benificiary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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