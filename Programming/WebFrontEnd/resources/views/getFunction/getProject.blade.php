<div id="myProject" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Project</h4>
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
                                            <th>Project Code</th>
                                            <th>Project Name</th>
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
            $("#projectcode2").prop("disabled", true);

        

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: 'GET',
                url: '{!! route("ARF.index2") !!}?projectcode=' + $('#projectcode').val()+ '&var=' + 1,
                success: function(data) {
                    console.log(data);
                    var no = 1;
                    $.each(data, function(key, val) {
                        
                        var t = $('#tableGetSite').DataTable();
                        t.row.add([
                                '<td>' + no++ + '</td>',
                                '<td><span data-dismiss="modal" class="klikSite" data-id="' + val.sys_ID + '" data-name="' + val.sys_Text + '">' + val.sys_ID + '</span></td>',
                                '<td>' + val.sys_Text + '</td>',
                        ]).draw();
                        
                    });
                    
                    $('.klikSite').on('click', function(e) {
                        
                        e.preventDefault(); // in chase you change to a link or button
                        $("#brfhide3").show();
                        $(".pageArfBoq").show();
                        $(".pageDetailTransaction").show();
                        $("#showContentBOQ3").show();
                        $("#showContentBOQ2").show();
                        $("#tableShowHideBOQ2").show();
                        $("#tableShowHideBOQ3").show();
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


                        //End batas

                        var datas = [];

                        for (var i = 1; i <= x; i++) {
                            var data = {
                                origin_budget: "x",
                                projectcode: "x",
                                projectname: "x",
                                sitecode: "x",
                                sitecode2: "x",
                                beneficiary: "x",
                                bank_name: "x",
                                account_name: "x",
                                account_number: "x",
                                internal_notes: "x",
                                request_name: "x",
                                putWorkId: "x",
                                putWorkName: "x",
                                putProductId: "x",
                                putProductName: "x",
                                putQty: "x",
                                putQtys: "x",
                                putUom: "x",
                                putPrice: "x",
                                putCurrency: "x",
                                totalArfDetails: "x",
                                putRemark: "x",
                            }
                            datas.push(data);
                        }

                        var json_object = JSON.stringify(datas);
                        // console.log(json_object);

                        $.ajax({
                            type: "POST",
                            url: '{{route("BRF.store")}}',
                            data: json_object,
                            contentType: "application/json",
                            processData: true,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                y++;
                                $.each(data, function(key, val) {

                                    var t = $('#tableBudgetBrf').DataTable();
                                    t.row.add([
                                        '<a class="btn btn-outline-success btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;" href="javascript:cek()"><i class="fa fa-plus" aria-hidden="true"></i></a>',
                                        '<span id="lastProductId_' + y + '">' + val.putProductId + '</span>',
                                        '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                                        '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                                        '<span id="lastProductName_' + y + '">' + val.putProductName + '</span>',
                                        '<span id="lastPrice_' + y + '">' + val.putPrice + '</span>',
                                        '<span id="totalArfDetails_' + y + '">' + val.totalArfDetails + '</span>',
                                        '<span id="lastCurrency_' + y + '">' + val.putCurrency + '</span>',
                                        '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                                        '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                                        '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>'
                                    ]).draw();

                                    // var t = $('#tableArfDetail').DataTable();
                                    // t.row.add([
                                    //     '<a class="btn btn-outline-success btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;" href="javascript:addToDetailSettlement()"><i class="fa fa-plus" aria-hidden="true"></i></a>',
                                    //     '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-blue" style="width: 90%;"></div></div><small><center>90 %</center></small>',
                                    //     '<span id="lastProductId">' + val.putProductId + '</span>',
                                    //     '<span id="lastProductName">' + val.putProductName + '</span>',
                                    //     '<span id="lastUom">' + val.putUom + '</span>',
                                    //     '<span id="lastPrice">' + val.putPrice + '</span>',
                                    //     '<span id="lastQty">' + val.putQtys + '</span>',
                                    //     '<span id="totalArfDetails">' + val.totalArfDetails + '</span>',
                                    //     '<span id="lastCurrency">' + val.putCurrency + '</span>',
                                    //     '<span id="lastRemark">' + val.putRemark + '</span>',
                                    //     '<span id="lastRemark">' + val.putRemark + '</span>',
                                    // ]).draw();

                                });
                            },
                            error: function(data) {
                                Swal.fire("Error !", "Data Gagal Ditambahkan", "error");
                            }
                        });

                    });
                    
                }
            });
        });

    });
</script>

<script>
    

</script>