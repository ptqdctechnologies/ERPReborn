@extends('Partials.app')
    @section('main')
        @include('Partials.navbar')
        @include('Partials.sidebar')
        @include('ProcurementAndCommercial.Functions.project')
        @include('ProcurementAndCommercial.Functions.subpc')
        @include('ProcurementAndCommercial.Functions.requester')
        @include('ProcurementAndCommercial.Functions.currency')
        @include('ProcurementAndCommercial.Functions.manager')
        @include('ProcurementAndCommercial.Functions.financeStaff')
        @include('ProcurementAndCommercial.Functions.produk')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="tab-content p-3" id="nav-tabContent">
                            @include('ProcurementAndCommercial.Functions.sectHeader')
                            @include('ProcurementAndCommercial.Functions.sectBOQ3')
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="card-title">
                                                Detail Transaction & Available Total
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-angle-down btn-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="" enctype="multipart/form-data" id="quickForm">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <table>
                                                                        <tr>
                                                                            <td><label>Work Id</label></td>
                                                                            <td>
                                                                                <input required="" readonly="" id="putWorkId" style="border-radius:0;" type="text" class="form-control" value="">
                                                                            </td>
                                                                            <td>
                                                                                <input required="" readonly="" id="putWorkName" style="border-radius:0;" type="text" class="form-control">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label>Product Id</label></td>
                                                                            <td>
                                                                                <div class="input-group">
                                                                                    <input required="" readonly="" id="putProductId" style="border-radius:0;" type="text" class="form-control">
                                                                                    <div class="input-group-append">
                                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                                            <a href="#" readonly=""><i data-toggle="modal" data-target="#myProductArf" class="fas fa-gift" style="color:grey;"></i></a>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <input required="" readonly="" id="putProductName" style="border-radius:0;" type="text" class="form-control">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label>Qty Request</label></td>
                                                                            <td>
                                                                                <input name="qty" id="qtyCek" style="border-radius:0;" type="text" class="form-control ChangeQty" value="0">
                                                                                <input name="qty" id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input required="" readonly="" id="putUom" style="border-radius:0;" type="text" class="form-control">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label>Unit Price</label></td>
                                                                            <td>
                                                                                <input name="price" id="putPrice" style="border-radius:0;" type="text" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input name="price_detail" id="putCurrency" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label>Total</label></td>
                                                                            <td>
                                                                                <input name="price" id="totalprDetails" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><Label>Remark</Label></td>
                                                                            <td>
                                                                                <textarea name="" id="putRemark" cols="23" rows="2" class="form-control"></textarea>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="card-title" style="border:5px solid #DCDCDC;width:100%;">
                                                                <p style="position:relative;text-align:center;top:7px;">Available Total</p>
                                                            </div>
                                                            <div class="card-body table-responsive p-0 available" style="height: 100px;">
                                                                <table>
                                                                    <tbody>
                                                                        <br>
                                                                        <tr>
                                                                            <td title="Total BOQ Detail"><label>Total BOQ</label></td>
                                                                            <td>:</td>
                                                                            <td style="font-weight:bold;">
                                                                                <input name="price" id="totalBOQ" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                                                            </td>
                                                                            <td>IDR</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label>Requester Total</label></td>
                                                                            <td>:</td>
                                                                            <td style="font-weight:bold;">
                                                                                <input name="price" id="totalRequester" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                                                            </td>
                                                                            <td>IDR</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label>Balance</label></td>
                                                                            <td>:</td>
                                                                            <td style="font-weight:bold;color:red;">
                                                                                <input name="price" id="totalBalance" style="border-radius:0;background-color:white;border:1px solid white;color:red;" type="text" class="form-control" readonly="">
                                                                            </td>
                                                                            <td>IDR</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                                    <button type="reset" class="btn btn-outline-danger btn-sm float-right detailTransaction" title="Cancel">
                                                        <i class="fa fa-times" aria-hidden="true">Cancel</i>
                                                    </button>
                                                    <a href="#" class="btn btn-outline-success btn-sm float-right" id="buttonprList" style="margin-right:5px;" title="Add to ARF List(Cart)">
                                                        <i class="fas fa-check" aria-hidden="true"><span> Add to PR List(Cart) </span></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <label class="card-title">
                                                    ARF List (Cart)
                                                </label>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body table-responsive p-0">
                                                <table class="table table-head-fixed text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Delete</th>
                                                            <th>Work Id</th>
                                                            <th>Work Name</th>
                                                            <th>Product Id</th>
                                                            <th>Product Name</th>
                                                            <th>Qty</th>
                                                            <th>Uom</th>
                                                            <th>Price</th>
                                                            <th>Total</th>
                                                            <th>Currency</th>
                                                            <th>Remark</th>
                                                            <th>Net Act</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <!-- <center><span class="table-remove"><button type="button" class="btn btn-outline-danger btn-rounded btn-sm my-0 klikcek"><i class="fa fa-trash"></i></button></span></center> -->
                                                            </td>
                                                            <td contenteditable="false" id="prListWorkId"></td>
                                                            <td contenteditable="false" id="prListWorkName"></td>
                                                            <td contenteditable="false" id="prListProductId"></td>
                                                            <td contenteditable="false" id="prListProductName"></td>
                                                            <td contenteditable="true"><input name="qty" id="prListQty" style="border-radius:0;width:50px;border:1px solid white;" type="text" class="form-control ChangeQtys"></td>
                                                            <td contenteditable="false" id="prListUom"></td>
                                                            <td contenteditable="false" id="prListPrice"></td>
                                                            <td contenteditable="false" id="prListTotal"></td>
                                                            <td contenteditable="false" id="prListCurrency"></td>
                                                            <td contenteditable="false" id="prListRemark"></td>
                                                            <td contenteditable="false" id="prListNetAct"></td>
                                                        </tr>                                      
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <button type="reset" class="btn btn-outline-danger btn-sm float-right" title="Cancel">
                                            <i class="fa fa-times" aria-hidden="true">Cancel PR List(Cart)</i>
                                        </button>
                                        <button type="submit" class="btn btn-outline-success btn-sm float-right" style="margin-right:5px;" title="Add to ARF List(Cart)">
                                            <i class="fas fa-save" aria-hidden="true">Save PR List(Cart)</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include('Partials.footer')
        <script type="text/javascript">
            $(document).ready(function() {
                $(".btn-success").click(function() {
                    var html = $(".clone").html();
                    $(".increment").after(html);
                });
                $("body").on("click", ".btn-danger", function() {
                    $(this).parents(".control-group").remove();
                });
            });
        </script>
        <!--  SHOW HIDE AVAILABEL -->
        <script type="text/javascript">
            $(document).ready(function() {
                $(".available").hide();
            });
        </script>
        <!--  END SHOW HIDE AVAILABEL -->

        <script type="text/javascript">
            $(document).ready(function() {
                $(".detailTransaction").click(function() {
                    $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", false);
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('.klikDetail1').click(function() {
                    $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
                    $("#buttonArfList").prop("disabled", true);
                    $(".available").show();

                    var get11 = $("#getWorkId1").html();
                    var get21 = $("#getWorkName1").html();
                    var get31 = $("#getProductId1").html();
                    var get41 = $("#getQty1").html();
                    var get51 = $("#getPrice1").html();
                    var get61 = $("#getRemark1").html();
                    var get71 = $("#getProductName1").html();
                    var get81 = $("#getUom1").html();
                    var get91 = $("#getCurrency1").html();
                    var get101 = $("#getRequester1").html();
                    var totalBOQ1 = get41 * get51;
                    var totalBalance1 = totalBOQ1 - get101;
                    $("#totalBalance").val(totalBalance1);
                    $("#totalBOQ").val(totalBOQ1);
                    $("#totalRequester").val(get101);
                    $("#putWorkId").val(get11);
                    $("#putWorkName").val(get21);
                    $("#putProductId").val(get31);
                    $("#putQty").val(get41);
                    $("#putPrice").val(get51);
                    $("#putRemark").val(get61);
                    $("#putProductName").val(get71);
                    $("#putUom").val(get81);
                    $("#putCurrency").val(get91);
                });
                $('.klikDetail2').click(function() {
                    $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
                    $("#buttonArfList").prop("disabled", true);
                    $(".available").show();
                    var get12 = $("#getWorkId2").html();
                    var get22 = $("#getWorkName2").html();
                    var get32 = $("#getProductId2").html();
                    var get42 = $("#getQty2").html();
                    var get52 = $("#getPrice2").html();
                    var get62 = $("#getRemark2").html();
                    var get72 = $("#getProductName2").html();
                    var get82 = $("#getUom2").html();
                    var get92 = $("#getCurrency2").html();
                    var get102 = $("#getRequester2").html();
                    var totalBOQ2 = get42 * get52;
                    var totalBalance2 = totalBOQ2 - get102;
                    $("#totalBalance").val(totalBalance2);
                    $("#totalBOQ").val(totalBOQ2);
                    $("#totalRequester").val(get102);
                    $("#putWorkId").val(get12);
                    $("#putWorkName").val(get22);
                    $("#putProductId").val(get32);
                    $("#putQty").val(get42);
                    $("#putPrice").val(get52);
                    $("#putRemark").val(get62);
                    $("#putProductName").val(get72);
                    $("#putUom").val(get82);
                    $("#putCurrency").val(get92);
                });
                $('.klikDetail3').click(function() {
                    $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
                    $("#buttonArfList").prop("disabled", true);
                    $(".available").show();
                    var get13 = $("#getWorkId3").html();
                    var get23 = $("#getWorkName3").html();
                    var get33 = $("#getProductId3").html();
                    var get43 = $("#getQty3").html();
                    var get53 = $("#getPrice3").html();
                    var get63 = $("#getRemark3").html();
                    var get73 = $("#getProductName3").html();
                    var get83 = $("#getUom3").html();
                    var get93 = $("#getCurrency3").html();
                    var get103 = $("#getRequester3").html();
                    var totalBOQ3 = get43 * get53;
                    var totalBalance3 = totalBOQ3 - get103;
                    $("#totalBalance").val(totalBalance3);
                    $("#totalBOQ").val(totalBOQ3);
                    $("#totalRequester").val(get103);
                    $("#putWorkId").val(get13);
                    $("#putWorkName").val(get23);
                    $("#putProductId").val(get33);
                    $("#putQty").val(get43);
                    $("#putPrice").val(get53);
                    $("#putRemark").val(get63);
                    $("#putProductName").val(get73);
                    $("#putUom").val(get83);
                    $("#putCurrency").val(get93);
                });
                $('.klikDetail4').click(function() {
                    $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
                    $("#buttonArfList").prop("disabled", true);
                    $(".available").show();
                    var get14 = $("#getWorkId4").html();
                    var get24 = $("#getWorkName4").html();
                    var get34 = $("#getProductId4").html();
                    var get44 = $("#getQty4").html();
                    var get54 = $("#getPrice4").html();
                    var get64 = $("#getRemark4").html();
                    var get74 = $("#getProductName4").html();
                    var get84 = $("#getUom4").html();
                    var get94 = $("#getCurrency4").html();
                    var get104 = $("#getRequester4").html();
                    var totalBOQ4 = get44 * get54;
                    var totalBalance4 = totalBOQ4 - get104;
                    $("#totalBalance").val(totalBalance4);
                    $("#totalBOQ").val(totalBOQ4);
                    $("#totalRequester").val(get104);
                    $("#putWorkId").val(get14);
                    $("#putWorkName").val(get24);
                    $("#putProductId").val(get34);
                    $("#putQty").val(get44);
                    $("#putPrice").val(get54);
                    $("#putRemark").val(get64);
                    $("#putProductName").val(get74);
                    $("#putUom").val(get84);
                    $("#putCurrency").val(get94);
                });
            });
        </script>
        <script>
            $('document').ready(function() {
                $('.ChangeQty').keyup(function() {
                    var qtyReq = $(this).val();
                    if (qtyReq == 0 || qtyReq == '') {
                        qtyReq = 0;
                    }
                    var putQty = parseFloat($('#putQty').val());
                    var putPrice = parseFloat($('#putPrice').val());
                        if (qtyReq == '') {
                            $("#buttonprList").prop("disabled", true);
                        } else if (qtyReq > putQty) {
                            alert("Your Request Is Over Budget");
                            $("#buttonprList").prop("disabled", true);
                        } else {
                            var totalReq = parseFloat(qtyReq) * parseFloat(putPrice);
                            var totalReq = parseFloat(totalReq).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                                $('#totalprDetails').val(totalReq);
                                $("#buttonprList").prop("disabled", false);
                        }

                });
            });
        </script>

        <script>
            $('document').ready(function() {
                $('.ChangeQtys').keyup(function() {
                    var qtyReq = $(this).val();
                    if (qtyReq == 0 || qtyReq == '') {
                        qtyReq = 0;
                    }
                    var putQty = parseFloat($('#putQty').val());
                    var putPrice = parseFloat($('#putPrice').val());
                    if (qtyReq == '') {
                    } else if (qtyReq > putQty) {
                        alert("Your Request Is Over Budget");
                    } else {
                        var totalReq = parseFloat(qtyReq) * parseFloat(putPrice);
                        var totalReq = parseFloat(totalReq).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                            $('#prListTotal').html(totalReq);
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#buttonprList').click(function() {
                    var list1 = $("#putWorkId").val();
                    var list2 = $("#putWorkName").val();
                    var list3 = $("#putProductId").val();
                    var list4 = $("#putProductName").val();
                    var list5 = $("#qtyCek").val();
                    var list6 = $("#putUom").val();
                    var list7 = $("#putPrice").val();
                    var list8 = $("#totalprDetails").val();
                    var list9 = $("#putCurrency").val();
                    var list10 = $("#putRemark").val();
                    var list11 = $("#putNetAct").val();

                    $("#prListWorkId").html(list1);
                    $("#prListWorkName").html(list2);
                    $("#prListProductId").html(list3);
                    $("#prListProductName").html(list4);
                    $("#prListQty").val(list5);
                    $("#prListUom").html(list6);
                    $("#prListPrice").html(list7);
                    $("#prListTotal").html(list8);
                    $("#prListCurrency").html(list9);
                    $("#prListRemark").html(list10);
                    $("#prListNetAct").html(list11);
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.klikcek').click(function() {        
                    var list1 = $("#prListQty").val();
                    alert(list1);
                });
            });
        </script>
    @endsection

    <!-- default section tertutup  -->