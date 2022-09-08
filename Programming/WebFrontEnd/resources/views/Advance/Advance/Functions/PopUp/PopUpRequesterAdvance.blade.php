<div id="popUpRequesterAdvance" class="modal fade" role="dialog" style="margin-top: 180px;margin-left:6px;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:33%;font-weight:bold;">REQUESTER NAME</span><br><br><br>
                        <div class="card" style="margin-left: 8%;">
                            <div class="card-body"> 
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td><label>Worker &nbsp;</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="popUpWorkerId" style="border-radius:0;" name="popUpWorkerId" type="text" class="form-control" required readonly>
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a data-toggle="modal" data-target="#myWorker"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>                                            
                                        </tr>
                                        <tr>
                                            <td><label>Job Position &nbsp;</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <select class="form-control popUpPositionWorker" name="popUpPositionWorker" id="popUpPositionWorker"  onchange="FunctionJobPositioinAdvance(value);">
                                                        <option selected="selected" value=""> Select Job Position </option>
                                                    </select>
                                                </div>
                                            </td>                                            
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>