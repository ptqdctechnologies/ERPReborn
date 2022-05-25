<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".headeriSupp1").hide();
        $(".headeriSupp2").hide();
        $("#detailPR").hide();
        $("#detailiSupp").hide();
        $("#iSuppCart").hide();
        $("#tableShowHideSupp").hide();
        $("#headerPrNumber2").prop("disabled", true);
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
      $(".materialSource").on('click', function(e) {
          e.preventDefault();
          var valType = $(".materialSource").val();
          
          if(valType == "Supplier to Site"){
              $(".headeriSupp1").show();
              $(".headeriSupp2").hide();
          }
          else if(valType == "Warehouse to Warehouse"){
              $(".headeriSupp2").show();
              $(".headeriSupp1").hide();
          }
      });
    });
</script>

<script>

    $(function() {
                    
        $('#addToPoDetail').on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            $("#tableShowHideSupp").show();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '{!! route("getSite") !!}?sitecode=' + $('.projectCodeiSupp').val()+ '&var=' + 1,
                success: function(data) {
                    var no = 1;
                    $.each(data, function(key, val2) {

                    console.log(val2.name);
                        var html = '<tr>'+
                                    '<td>'+
                                        '<button type="reset" class="btn btn-outline-success btn-sm float-right klikPoDetail" data-id1="' + val2.name + '" data-id2="' + val2.quantity + '" data-id3="' + val2.quantityUnitName + '" title="Submit" style="border-radius: 100px;"><i class="fas fa-plus" aria-hidden="true"></i></button>'+
                                    '</td>'+
                                    '<td>'+'<span id="getProject">' + 'N/A' + '</span>'+'</td>'+
                                    '<td>'+'<span id="getSite">' + 'N/A' + '</span>'+'</td>'+
                                    '<td>'+'<span id="getWorkId">' + 'N/A' + '</span>'+'</td>'+
                                    '<td>'+'<span id="getProductId">' + 'N/A' + '</span>'+'</td>'+
                                    '<td>'+'<span id="getProductName">' + val2.name + '</span>'+'</td>'+
                                    '<td>'+'<span id="getQtyBudget">' + 'N/A' + '</span>'+'</td>'+
                                    '<td>'+'<span id="getQty">' + val2.quantity + '</span>'+'</td>'+
                                    '<td>'+'<span id="getUom">' + val2.quantityUnitName + '</span>'+'</td>'+
                                    '<td>'+'<span id="getRemark">' + 'N/A' + '</span>'+'</td>'+
                                '</tr>';
                                
                        $('table.tablePoDetailiSupp tbody').append(html);
                    });

                    $('.klikPoDetail').on('click', function(e){
                        e.preventDefault();
                        var $this = $(this);
                        var get7 = $this.data("id3");
                        var get3 = $this.data("id2");
                        var get6 = $this.data("id1");
                        $("#detailiSupp").show();

                        var get1 = $("#getProject").html();
                        var get2 = $("#getWorkId").html();
                        var get4 = $("#getSite").html();
                        var get5 = $("#getProductId").html();
                        var get8 = $("#getRemark").html();

                        $("#projectiSuppDetail").val(get1);
                        $("#projectiSuppDetail2").val(get1);
                        $("#workIdiSuppDetail").val(get2);
                        $("#workIdiSuppDetail2").val(get2);
                        $("#qtyiSupp").val(get3);
                        $("#qtyiSupp2").val(get7);
                        $("#siteiSuppDetail").val(get4);
                        $("#siteiSuppDetail2").val(get4);
                        $("#productiSuppDetail").val(get5);
                        $("#productiSuppDetail2").val(get6);
                        $("#remarkiSuppDetail").val(get8);
                        $("#qtyInPoiSupp").val(get3);
                        $("#qtyIniSupp").val(get3);
                        $("#balanceQtyiSupp").val(get3);
                    });
                }
            });
        });
    });
</script>

<script type="text/javascript">
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
   $(document).ready(function () {
    $('#addFromDetailiSupptoCart').click(function(ev){
        ev.preventDefault();
        ev.stopPropagation();

        var qtyReq = $('#qtyiSuppChange').val();
        var qtyiSupp = $('#qtyiSupp').val();
        

        if (qtyReq > qtyiSupp) {
            Swal.fire("Error !", "Your Qty Request is Over", "error");
            $("#qtyiSuppChange").val(0);
            $("#addFromDetailiSupptoCart").prop("disabled", true);
        }else {
            $("#qtyiSuppChange").val("");
            $("#addFromDetailiSupptoCart").prop("disabled", false);

            var val = $("#productiSuppDetail2").val();
            if(val != ""){
                $.ajax({
                    type: "POST",
                    url: '{!! route("iSupp.StoreValidateiSupp") !!}?productiSuppDetail2=' + $('#productiSuppDetail2').val(),
                    success: function(data) {

                        if(data == "200"){
                            $("#iSuppCart").show();

                            var projectiSupp = $("#projectiSuppDetail").val();
                            var siteiSupp = $("#siteiSuppDetail").val();
                            var workIdiSuppDetail = $('#workIdiSuppDetail').val();
                            var productiSuppDetail = $("#productiSuppDetail").val();
                            var productiSuppDetail2 = $("#productiSuppDetail2").val();
                            var qtyiSupp2 = $('#qtyiSupp2').val();

                            var html = '<tr>'+
                                        '<td>'+
                                            '<button type="button" class="btn btn-danger btn-xs remove" data-id1="'+productiSuppDetail2+'"><i class="fa fa-trash"></i></button> '+
                                            '<button type="button" class="btn btn-warning btn-xs edit" data-dismiss="modal" data-id1="'+productiSuppDetail2+'" data-id2="'+qtyReq+'" data-id3="'+qtyiSupp2+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                                        '</td>'+
                                        '<td>'+'<span id="getProject">' + projectiSupp + '</span>'+'</td>'+
                                        '<td>'+'<span id="getSite">' + siteiSupp + '</span>'+'</td>'+
                                        '<td>'+'<span id="getWorkId">' + workIdiSuppDetail + '</span>'+'</td>'+
                                        '<td>'+'<span id="getProductId">' + productiSuppDetail + '</span>'+'</td>'+
                                        '<td>'+'<span id="getProductName">' + productiSuppDetail2 + '</span>'+'</td>'+
                                        '<td>'+'<span id="getQty">' + qtyReq + '</span>'+'</td>'+
                                        '<td>'+'<span id="getUom">' + qtyiSupp2 + '</span>'+'</td>'+
                                    '</tr>';
                            $('table.tableiSuppCart tbody').append(html);

                            $("body").on("click", ".remove", function () {
                                $(this).closest("tr").remove();
                                var ProductId = $(this).data("id1");
                                $.ajax({
                                    type: "POST",
                                    url: '{!! route("iSupp.StoreValidateiSupp2") !!}?productiSuppDetail2=' + ProductId,
                                });
                            });
                            $("body").on("click", ".edit", function () {
                                var $this = $(this);
                                var id1 = $this.data("id1");
                                var id2 = $this.data("id2");
                                var id3 = $this.data("id3");

                                $.ajax({
                                    type: "POST",
                                    url: '{!! route("iSupp.StoreValidateiSupp2") !!}?productiSuppDetail2=' + id1,
                                });

                                $("#projectiSuppDetail").val("N/A");
                                $("#projectiSuppDetail2").val("N/A");
                                $("#workIdiSuppDetail").val("N/A");
                                $("#workIdiSuppDetail2").val("N/A");
                                $("#qtyiSuppChange").val(id2);
                                $("#qtyiSupp2").val(id3);
                                $("#siteiSuppDetail").val("N/A");
                                $("#siteiSuppDetail2").val("N/A");
                                $("#productiSuppDetail").val("N/A");
                                $("#productiSuppDetail2").val(id1);
                                $("#remarkiSuppDetail").val("N/A");
                                $("#qtyInPoiSupp").val("N/A");
                                $("#qtyIniSupp").val("N/A");
                                $("#balanceQtyiSupp").val("N/A");

                                $(this).closest("tr").remove();
                            });

                            $("#projectiSuppDetail").val("");
                            $("#projectiSuppDetail2").val("");
                            $("#workIdiSuppDetail").val("");
                            $("#workIdiSuppDetail2").val("");
                            $("#qtyiSuppChange").val("");
                            $("#qtyiSupp2").val("");
                            $("#siteiSuppDetail").val("");
                            $("#siteiSuppDetail2").val("");
                            $("#productiSuppDetail").val("");
                            $("#productiSuppDetail2").val("");
                            $("#remarkiSuppDetail").val("");
                            $("#qtyInPoiSupp").val("");
                            $("#qtyIniSupp").val("");
                            $("#balanceQtyiSupp").val("");
                        }
                        else{
                            Swal.fire("Error !", "Please use edit to update this item !", "error");
                        }
                    },
                });   
            }
            else{
                Swal.fire("Error !", "Data Cannot Empty", "error");
            }
        }
    });
});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".CanceliSupp").click(function() {
            $("#tableShowHideDor").find("input,button,textarea,select").attr("disabled", false);
        });
    });
</script>