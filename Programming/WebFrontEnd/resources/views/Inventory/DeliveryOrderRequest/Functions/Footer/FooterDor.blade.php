<script type="text/javascript">
    $(document).ready(function() {
        $(".headerDor1").hide();
        $(".headerDor2").hide();
        $(".headerDor3").hide();
        $(".headerDor4").hide();
        $("#detailPR").hide();
        $("#detailDor").hide();
        $("#detailDorList").hide();
        $("#tableShowHideDor").hide();
        $("#headerPrNumber2").prop("disabled", true);
        $("#pr_number2").prop("disabled", true);
    });
</script>

<script>
    function klikProject(code, name) {
        $("#projectcode").val(code);
        $("#projectname").val(name);
        $("#pr_number2").prop("disabled", false);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("AdvanceSettlement.AdvanceByBudgetID") !!}?projectcode=' + $('#projectcode').val(),
            success: function(data) {

                var no = 1;
                t = $('#tableSearchArfinAsf').DataTable();
                $.each(data.DataAdvanceRequest, function(key, val) {
                    t.row.add([
                        '<tbody><tr><td>' + no++ + '</td>',
                        '<td><span data-dismiss="modal" onclick="klikAdvanceNumberInAsf(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.documentNumber + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikAdvanceNumberInAsf(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudget_RefID + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikAdvanceNumberInAsf(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudgetName + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikAdvanceNumberInAsf(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudgetSection_RefID + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikAdvanceNumberInAsf(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudgetSectionName + '</span></td>',
                    ]).draw();

                });
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".deliverType").on('click', function(e) {
          e.preventDefault();
          var valType = $(".deliverType").val();
          if(valType == "Warehouse to Site"){
              $(".headerDor1").show();
              $(".headerDor2").hide();
              $(".headerDor3").hide();
              $(".headerDor4").hide();
          }
          else if(valType == "Warehouse to Warehouse"){
              $(".headerDor2").show();
              $(".headerDor1").hide();
              $(".headerDor3").hide();
              $(".headerDor4").hide();
          }
          else if(valType == "Supplier to Site"){
              $(".headerDor3").show();
              $(".headerDor2").hide();
              $(".headerDor1").hide();
              $(".headerDor4").hide();
          }
          else if(valType == "Site to Warehouse"){
              $(".headerDor4").show();
              $(".headerDor3").hide();
              $(".headerDor2").hide();
              $(".headerDor1").hide();
          }
      });

      $(".siteName1").on('click', function(e) {
          e.preventDefault();
          var valSite = $(".siteName1").val();
          if(valSite == "WH-001"){
              $("#headerAddressSiteName1").val("Jl. Baru Leko. Kode Pos, : 97796. Desa/Kelurahan, : DESA LEKO SULA. Kecamatan/Kota (LN), Kec. Mangoli Barat, Kab. Kepulauan Sula, Prov. Maluku Utara");
          }
          else if(valSite == "WH-002"){
              $("#headerAddressSiteName1").val("Bekasi cyber park, RT.001/RW.009, Kayuringin Jaya, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17415");
          }
      });

      $(".siteName2").on('click', function(e) {
          e.preventDefault();
          var valSite = $(".siteName2").val();
          if(valSite == "WH-001"){
              $("#headerAddressSiteName2").val("Jl. Baru Leko. Kode Pos, : 97796. Desa/Kelurahan, : DESA LEKO SULA. Kecamatan/Kota (LN), Kec. Mangoli Barat, Kab. Kepulauan Sula, Prov. Maluku Utara");
          }
          else if(valSite == "WH-002"){
              $("#headerAddressSiteName2").val("Bekasi cyber park, RT.001/RW.009, Kayuringin Jaya, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17415");
          }
      });

      $(".siteName3").on('click', function(e) {
          e.preventDefault();
          var valSite = $(".siteName3").val();
          if(valSite == "WH-001"){
              $("#headerAddressSiteName3").val("Jl. Baru Leko. Kode Pos, : 97796. Desa/Kelurahan, : DESA LEKO SULA. Kecamatan/Kota (LN), Kec. Mangoli Barat, Kab. Kepulauan Sula, Prov. Maluku Utara");
          }
          else if(valSite == "WH-002"){
              $("#headerAddressSiteName3").val("Bekasi cyber park, RT.001/RW.009, Kayuringin Jaya, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17415");
          }
      });
    });
</script>
<!--  END SHOW HIDE AVAILABEL -->
<script type="text/javascript">
   $(document).ready(function () {

    var x = 0;
    
    $('#addFromDetailDortoCart').click(function(ev){
        ev.preventDefault();
        ev.stopPropagation();
        
        $("#detailDorList").show();
        var val = $("#prNumberDorDetail").val();
        if(val != ""){
            $.ajax({
                type: "POST",
                url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequest") !!}?productIdDorDetail=' + $('#productIdDorDetail2').val(),
                success: function(data) {

                    if(data == "200"){

                        var prNumberDorDetail = $("#prNumberDorDetail").val();
                        var projectDorDetail = $("#projectDorDetail").val();
                        var projectDorDetail2 = $('#projectDorDetail2').val();
                        var siteDorDetail = $("#siteDorDetail").val();
                        var siteDorDetail2 = $("#siteDorDetail2").val();
                        var workIdDorDetail = $("#workIdDorDetail").val();
                        var workIdDorDetail2 = $('#workIdDorDetail2').val();
                        var priceDorDetail = $("#priceDorDetail").val();
                        var averageDorDetail = $("#averageDorDetail").val();
                        var qtyDorDetail = $("#qtyDorDetail").val();
                        var qtyDorDetail2 = $('#qtyDorDetail2').val();
                        var productIdDorDetail = $("#productIdDorDetail").val();
                        var productIdDorDetail2 = $("#productIdDorDetail2").val();
                        var prQty = $("#prQty").val();
                        var inDorQty = $("#inDorQty").val();
                        var balanceQty = $("#balanceQty").val();

                        var html = '<tr>'+
                                    '<td>'+
                                        '<button type="button" class="btn btn-danger btn-xs remove" data-id1="'+productIdDorDetail2+'"><i class="fa fa-trash"></i></button> '+
                                        '<button type="button" class="btn btn-warning btn-xs edit" data-dismiss="modal" data-id1="'+prNumberDorDetail+'" data-id2="'+projectDorDetail+'" data-id3="'+projectDorDetail2+'" data-id4="'+siteDorDetail+'" data-id5="'+siteDorDetail2+'" data-id6="'+workIdDorDetail+'" data-id7="'+workIdDorDetail2+'" data-id8="'+priceDorDetail+'" data-id9="'+averageDorDetail+'" data-id10="'+qtyDorDetail+'" data-id11="'+qtyDorDetail2+'" data-id12="'+productIdDorDetail+'" data-id13="'+productIdDorDetail2+'" data-id14="'+prQty+'" data-id15="'+inDorQty+'" data-id16="'+balanceQty+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                                    '</td>'+
                                    '<td>'+prNumberDorDetail+'</td>'+
                                    '<td>'+projectDorDetail+'</td>'+
                                    '<td>'+siteDorDetail+'</td>'+
                                    '<td>'+productIdDorDetail+'</td>'+
                                    '<td>'+productIdDorDetail2+'</td>'+
                                '</tr>';
                        $('table.tableDorCart tbody').append(html);

                        $("body").on("click", ".remove", function () {
                            $(this).closest("tr").remove();
                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequest2") !!}?productIdDorDetail=' + ProductId,
                            });
                        });
                        $("body").on("click", ".edit", function () {
                            var $this = $(this);
                            var id1 = $this.data("id1");
                            var id2 = $this.data("id2");
                            var id3 = $this.data("id3");
                            var id4 = $this.data("id4");
                            var id5 = $this.data("id5");
                            var id6 = $this.data("id6");
                            var id7 = $this.data("id7");
                            var id8 = $this.data("id8");
                            var id9 = $this.data("id9");
                            var id10 = $this.data("id10");
                            var id11 = $this.data("id11");
                            var id12 = $this.data("id12");
                            var id13 = $this.data("id13");
                            var id14 = $this.data("id14");
                            var id15 = $this.data("id15");
                            var id16 = $this.data("id16");

                            $.ajax({
                                type: "POST",
                                url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequest2") !!}?productIdDorDetail=' + id13,
                            });

                            $("#prNumberDorDetail").val(id1);
                            $("#projectDorDetail").val(id2);
                            $("#projectDorDetail2").val(id3);
                            $("#siteDorDetail").val(id4);
                            $("#siteDorDetail2").val(id5);
                            $("#workIdDorDetail").val(id6);
                            $("#workIdDorDetail2").val(id7);
                            $("#priceDorDetail").val(id8);
                            $("#averageDorDetail").val(id9);
                            $("#qtyDorDetail").val(id10);
                            $("#qtyDorDetail2").val(id11);
                            $("#productIdDorDetail").val(id12);
                            $("#productIdDorDetail2").val(id13);
                            $("#prQty").val(id14);
                            $("#inDorQty").val(id15);
                            $("#balanceQty").val(id16);

                            $(this).closest("tr").remove();

                            if(id10 == "Unspecified Product"){
                                $("#product_id2").prop("disabled", false);
                            }
                            else{
                                $("#product_id2").prop("disabled", true);
                            }
                        });

                        $("#prNumberDorDetail").val("");
                        $("#projectDorDetail").val("");
                        $("#projectDorDetail2").val("");
                        $("#siteDorDetail").val("");
                        $("#siteDorDetail2").val("");
                        $("#workIdDorDetail").val("");
                        $("#workIdDorDetail2").val("");
                        $("#priceDorDetail").val("");
                        $("#averageDorDetail").val("");
                        $("#qtyDorDetail").val("");
                        $("#qtyDorDetail2").val("");
                        $("#productIdDorDetail").val("");
                        $("#productIdDorDetail2").val("");
                        $("#prQty").val("");
                        $("#inDorQty").val("");
                        $("#balanceQty").val("");

                        $("#tableShowHideDor").find("input,button,textarea,select").attr("disabled", false);
                    }
                    else{
                        Swal.fire("Cancelled", "Please use edit to update this item !", "error");
                    }
                },
            });   
        }
        else{
            Swal.fire("Cancelled", "Data Cannot Empty", "error");
        }
    });
});
</script>

<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {
            var qtyReq = $(this).val().replace(/[^a-zA-Z0-9 ]/g, "");
            if (qtyReq == 0 || qtyReq == '') {
                qtyReq = 0;
            }
            var qtyDorHide = $('#qtyDorHide').val();
            
            if (qtyReq == '') {
                $("#addFromDetailDortoCart").prop("disabled", true);

            } else if (qtyReq > qtyDorHide) {
                Swal.fire("Error !", "Your Qty Request is Over", "error");
                $("#qtyDorDetail").val(qtyDorHide);
                $("#addFromDetailDortoCart").prop("disabled", true);
            } else {
                $("#addFromDetailDortoCart").prop("disabled", false);
            }

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".CancelDor").click(function() {
            $("#tableShowHideDor").find("input,button,textarea,select").attr("disabled", false);
        });
    });
</script>