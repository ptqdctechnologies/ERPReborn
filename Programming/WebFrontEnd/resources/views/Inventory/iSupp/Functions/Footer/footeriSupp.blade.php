<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".headeriSupp1").hide();
        $(".headeriSupp2").hide();
        $("#detailPR").hide();
        $("#detailDor").hide();
        $("#detailDorList").hide();
        $("#tableShowHideDor").hide();
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
                url: '{!! route("DOR.StoreValidateDor") !!}?productIdDorDetail=' + $('#productIdDorDetail2').val(),
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
                                url: '{!! route("DOR.StoreValidateDor2") !!}?productIdDorDetail=' + ProductId,
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
                                url: '{!! route("DOR.StoreValidateDor2") !!}?productIdDorDetail=' + id13,
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