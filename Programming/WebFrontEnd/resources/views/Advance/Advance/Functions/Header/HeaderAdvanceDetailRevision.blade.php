<div class="card-body advance-detail">
    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <table>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Bank Name</label></td>
                        <td>
                            <div class="input-group">
                                <input id="bank_name" style="border-radius:0;" name="bank_name" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="bank_name2" data-toggle="modal" data-target="#myGetBank" class="myGetBank"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <table>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Bank Account</label></td>
                        <td>
                            <div class="input-group">
                                <input id="beneficiaryBankAccount_RefID" style="border-radius:0;" class="form-control" name="beneficiaryBankAccount_RefID" hidden>
                                <input id="bank_account" style="border-radius:0;" name="bank_account" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="bank_account2" data-toggle="modal" data-target="#myBankAccount" class="myBankAccount"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <table>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Account Name</label></td>
                        <td>
                        <td>
                            <div class="input-group">
                                <input id="account_name" style="border-radius:0;" class="form-control" name="account_name" readonly>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>