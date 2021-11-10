<div id="myProject" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Budget</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetProject">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1 @endphp
                                        @foreach($data as $datas)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td data-dismiss="modal" class="klikProject" data-id="{{$datas['sys_ID']}}" data-name="{{$datas['sys_Text']}}">{{$datas['sys_ID']}}</td>
                                            <td>{{$datas['sys_Text']}}</td>
                                        </tr>
                                        @endforeach
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
<!--|----------------------------------------------------------------------------------|
    |                            End Function My Project Code                          |
    |----------------------------------------------------------------------------------|-->

<script>

    // $('#tableGetSite').empty();

    $(function() {
        $('.klikProject').on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            var code = $this.data("id");
            var name = $this.data("name");
            $("#projectcode").val(code);
            $("#projectcode2").val(code);
            $("#projectname").val(name);
            $("#headerProjectCode").val(code);
            $("#sitecode2").prop("disabled", false);
            $("#advance_number2").prop("disabled", false);
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: 'GET',
                url: '{!! route("ARF.index2") !!}?projectcode=' + $('#projectcode').val()+ '&var=' + 1,
                success: function(data) {
                    
                    var no = 1;

                    var t = $('#tableGetSite').DataTable();
                    $.each(data, function(key, val) {

                        t.row.add([
                                '<tbody><tr><td>' + no++ + '</td>',
                                '<td><span data-dismiss="modal" class="klikSite" data-id="' + val.sys_ID + '" data-name="' + val.sys_Text + '">' + val.sys_ID + '</span></td>',
                                '<td>' + val.sys_Text + '</td></tr></tbody>'
                        ])  .draw();
                        
                    });
                    
                    $('.klikSite').on('click', function(e) {
                        e.preventDefault(); // in chase you change to a link or button
                        $("#projectcode2").prop("disabled", true);

                        $("#brfhide3").show();
                        $(".pageArfBoq").show();
                        $(".pageDetailTransaction").show();
                        $("#showContentBOQ3").show();
                        $("#showContentBOQ2").show();
                        $("#tableShowHideBOQ2").show();
                        $("#tableShowHideBOQ3").show();


                        $("#tableShowHideGetBudgetArf").show();

                        var $this = $(this);
                        var code = $this.data("id");
                        var name = $this.data("name");
                        $("#sitecode").val(code);
                        $("#sitecode2").val(name);
                        $("#sitename").val(name);

                        $("#request_name2").prop("disabled", false);
                        $("#sitecode2").prop("disabled", true);

                        //DATA MIX

                        $("#arfNumberAsf").prop("disabled", true);
                        $("#requester").val("requester 1");
                        $("#managerAsfUid").val("Manager 1");
                        $("#managerAsfName").val("Manager Detail 1");
                        $("#currency").val("IDR");
                        $("#currencyCode").val("IDR");
                        $("#financeArfUtableBudgetBrfid").val("finance 1");
                        $("#financeArfName").val("Finance Detail 1");
                        $("#remark").val("Remark 1");
                        $("#total").val("100000");
                        $("#totalDetail").val("Rp");


                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: 'GET',
                            url: '{!! route("ARF.index3") !!}?sitecode=' + $('#sitecode').val()+ '&var=' + 1,
                            success: function(data) {
                                console.log(data.data);
                                console.log(data.data2);
                                
                                var no = 1;

                                var t = $('#tableBudgetDetail').DataTable();
                                $.each(data.data, function(key, val2) {

                                    t.row.add([
                                        '<button type="reset" class="btn btn-outline-success btn-sm float-right klikBudgetDetail" data-id1="' + val2.name + '" data-id2="' + val2.quantity + '" data-id3="' + val2.unitPriceBaseCurrencyValue + '" title="Submit" style="border-radius: 100px;"><i class="fas fa-plus" aria-hidden="true"></i></button>',
                                        '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>',
                                        '<span id="getWorkId">' + 'N/A' + '</span>',
                                        '<span id="getWorkName">' + 'N/A' + '</span>',
                                        '<span id="getProductId">' + 'N/A' + '</span>',
                                        '<span id="getProductName">' + val2.name + '</span>',
                                        '<span id="getQty2">' + val2.quantity + '</span>',
                                        '<span id="getQty">' + 'N/A' + '</span>',
                                        '<span id="getPrice">' + val2.unitPriceBaseCurrencyValue + '</span>',
                                        '<span id="totalArf">' + val2.priceBaseCurrencyValue + '</span>',
                                        '<span id="getUom">' + 'N/A' + '</span>',
                                        '<span id="getCurrency">' + 'N/A' + '</span>',
                                    ]).draw();
                                    
                                });

                                var t2 = $('#tableGetRequester').DataTable();
                                $.each(data.data2, function(key, val) {

                                    t2.row.add([
                                        '<tbody><tr><td>' + no++ + '</td>',
                                        '<td><span data-dismiss="modal" class="klikRequester" data-id="' + val.sys_ID + '" data-name="' + val.name + '">' + val.sys_ID + '</span></td>',
                                        '<td>' + val.name + '</td></tr></tbody>'
                                    ]).draw();
                                    
                                });

                                $(".klikRequester").on('click', function(e) {
                                    e.preventDefault(); // in chase you change to a link or button
                                    var $this = $(this);
                                    var id = $this.data("id");
                                    var name = $this.data("name");
                                    $("#request_name").val(name);
                                    $("#budget_name").val(name);
                                    
                                });

                                $('.klikBudgetDetail').on('click', function(e){
                                    e.preventDefault();
                                    var $this = $(this);
                                    var status = $this.data("id1");

                                    $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", true);
                                    $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", true);
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                    $(".available").show();
                                    $("#detailTransAvail").show();
                                    $("#putProductId2").prop("disabled", true);
                                    
                                    if(status == "Unspecified Product"){
                                        $("#product_id2").prop("disabled", false);
                                        var get31 = "";
                                        var get71 = "";
                                    }
                                    else{
                                        $("#product_id2").prop("disabled", true);
                                        var get31 = $("#getProductId").html();
                                        var get71 = $this.data("id1");
                                    }

                                    var get11 = $("#getWorkId").html();
                                    var get21 = $("#getWorkName").html();
                                    var get4 = $("#getQty").html().replace(/[^a-zA-Z0-9 ]/g, "");
                                    var get41 = $this.data("id2");
                                    var get51 = $this.data("id3");
                                    var get61 = $("#getRemark").html();
                                    var get81 = $("#getUom").html();
                                    var get91 = $("#getCurrency").html();
                                    var get101 = $("#getRequester").html();

                                    var totalBalance = (get41 * get51);
                                    var totalRequested = ((get4 - get41) * get51);

                                    $("#putWorkId").val(get11);
                                    $("#putWorkName").val(get21);
                                    $("#putProductId").val(get31);
                                    $("#totalRequester").val(totalRequested);
                                    $("#totalQtyRequest").val(get4 - get41);
                                    $("#totalBalance").val(totalBalance);
                                    $("#putQty").val(get41);
                                    $("#putPrice").val(get51);
                                    $("#putRemark").val(get61);
                                    $("#putProductName").val(get71);
                                    $("#putUom").val(get81);
                                    $("#putCurrency").val(get91);
                                    $("#status").val(status);
                                });
                            }
                        });

                    });
                    
                }
            });
        });

    });
</script>