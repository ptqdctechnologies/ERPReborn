<form action="">
    <!-- <div class="card"> -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <table>
                        <tr>
                            <td style="padding-top: 5px;">
                                <label>
                                    Supplier Code
                                </label>
                            </td>
                            <td>
                                <div class="input-group" style="width: 52%;">
                                    <input id="supplier_id" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                    <input id="supplier_code" style="border-radius:0;" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="javascript:;" id="supplier_code2" data-toggle="modal" data-target="#mySupplier" class="mySupplier">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-group" style="position:relative;right:98.5%;">
                                    <input id="supplier_name" style="border-radius:0;" class="form-control" name="projectname" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>DP</label></td>
                            <td style="solid #e9ecef;">
                                <p id="dp_section"><input type="number" id="downPaymentValue" max="100" style="width: 20%;" /> <strong>%</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td><label>TOP</label></td>
                            <td id="containerLoadingTOP">
                                <div class="d-flex flex-column justify-content-center py-3">
                                    <div class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </td>
                            <td id="containerSelectTOP" style="border:1px solid #e9ecef;">
                                <select name="" id="termOfPaymentOption" style="border-radius:0;" type="text" class="form-control">
                                    <option disabled selected>Select a TOP</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Payment Notes</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
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
                            <td><label>Remark PO</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Internal Note</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <div class="input-group">
                                    <textarea name="" id="" cols="30" rows="4" class="form-control"></textarea>
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