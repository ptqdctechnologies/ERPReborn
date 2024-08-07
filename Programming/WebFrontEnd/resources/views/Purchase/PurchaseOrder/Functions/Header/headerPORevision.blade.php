<form action="">
    <!-- <div class="card"> -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <table>
                        <tr>
                            <td style="padding-top: 5px;"><label>Supplier Code</label></td>
                            <td>
                                <div class="input-group" style="width: 70%;">
                                    <input id="supplier_code" style="border-radius:0;" class="form-control" value="{{ 
                                    $dataContent['involvedPersons'][0]['requesterWorkerJobsPosition_RefID'] }}" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <!-- <a href="#"><i id="supplier_code2" data-toggle="modal" data-target="#mySupplier" class="fas fa-gift mySupplier"></i></a> -->
                                            <a href="#" id="supplier_code2" data-toggle="modal" data-target="#mySupplier" class="mySupplier"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-group" style="width: 153%;position:relative;right:38%;">
                                    <input id="supplier_name" style="border-radius:0;" class="form-control" name="projectname" value="{{ $dataContent['involvedPersons'][0]['requesterWorkerFullName'] }}}}" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top: 5px;"><label>Type</label></td>
                            <td>
                                <input type="radio" id="cbd" name="type" style="border-radius:0;" value="cbd">
                                <label for="cbd">CBD</label>
                                <input type="radio" id="cod" name="type" style="border-radius:0;" value="cod">
                                <label for="cod">COD</label>
                                <input type="radio" id="pad" name="type" style="border-radius:0;" value="pad" >
                                <label for="pad">PAD</label>
                            </td>
                        </tr>
                        <tr>
                            <td><label>DP</label></td>
                            <td style="solid #e9ecef;">
                                <input type="radio" id="yes" name="dp" style="border-radius:0;" value="yes" checked="checked">
                                <label for="yes">Yes</label>
                                <input type="radio" id="no" name="dp" style="border-radius:0;" value="no" >
                                <label for="no">No</label>
                                <p id="dp_section"><input type="text" style="width: 20%;"> <strong>%</strong></p>
                                <!-- <input id="dp_section" type="text" class="form-control" style="border-radius:0;width: 40%;"> -->
                            </td>
                        </tr>
                        <tr>
                            <td><label>TOP</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <select name="" id="" style="border-radius:0;" type="text" class="form-control">
                                    <option value="">Select</option>
                                    <option value="">Cash Before Delivery</option>
                                    <option value="">Cash On Delivery</option>
                                    <option value="">Progress</option>
                                    <option value="">Payment On Completion</option>
                                    <option value="">Bank Finance</option>
                                    <option value="">Other</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Payment Notes</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control" value="{{ $dataContent['remarks'] }}">
                                </div>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td style="padding-top: 5px;"><label>Deliver To</label></td>
                            <td>
                                <div class="input-group" style="width: 70%;">
                                <input id="deliver_code" style="border-radius:0;" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="deliver_code2" data-toggle="modal" data-target="#myDeliverTo" class="myDeliverTo"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-group" style="width: 153%;position:relative;right:38%;">
                                    <input id="deliver_name" style="border-radius:0;" class="form-control" name="projectname" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Delivery Date Estimate</label></td>
                            <td>
                                <div class="input-group">
                                <input id="dateCommance" name="dateCommance" style="border-radius:0;" type="date" class="form-control">
                                </div>
                            </td>
                        </tr> -->
                        <!-- <tr>
                            <td><label>COD</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <input type="radio" id="yes" name="fav_language" value="HTML">
                                <label for="html">Yes</label>
                                <input type="radio" id="no" name="fav_language" value="HTML" >
                                <label for="html">No</label>
                            </td>
                        </tr> -->
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <table>
                        <!-- <tr>
                            <td><label>Payment Term</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                            </td>
                        </tr> -->
                        
                        <tr>
                            <td><label>Remark PO</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control" value="{{ $dataContent['remarks'] }}">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Internal Note</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <div class="input-group">
                                    <textarea name="" id="" cols="30" rows="4" class="form-control">{{ $dataContent['remarks'] }}</textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
</form>