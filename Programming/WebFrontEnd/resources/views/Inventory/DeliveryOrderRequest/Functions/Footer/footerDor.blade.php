<!--  SHOW HIDE AVAILABEL -->
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
    });
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
    });
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
    
    $('#addFromDetailtoCart').click(function(ev){
        ev.preventDefault();
        ev.stopPropagation();
        
        $("#detailDorList").show();

        var trano = $("#prNumberDorDetail").val();
        var project = $("#projectDorDetail").val();
        var productIdDorDetail = $('#productIdDorDetail').val();
        var productIdDorDetail2 = $("#productIdDorDetail2").val();

        var html = '<tr>'+
                    '<td>'+
                        '<button type="button" class="btn btn-danger btn-xs remove"><i class="fa fa-trash"></i></button> '+
                        '<button type="button" class="btn btn-warning btn-xs edit" data-dismiss="modal" data-id1="'+trano+'" data-id2="'+project+'" data-id3="'+productIdDorDetail+'" data-id4="'+productIdDorDetail2+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                    '</td>'+
                    '<td>'+trano+'</td>'+
                    '<td>'+project+'</td>'+
                    '<td>'+project+'</td>'+
                    '<td>'+productIdDorDetail+'</td>'+
                    '<td>'+productIdDorDetail2+'</td>'+
                '</tr>';
        $('table.tableDorCart tbody').append(html);

        $("body").on("click", ".remove", function () {
            $(this).closest("tr").remove();
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
            $("#putProductId").val(id1);
            $("#putProductName").val(id2);
            $('#qtyCek').val(id3);
            $("#putUom").val(id4);
            $("#priceCek").val(id5);
            $("#putCurrency").val(id6);
            $("#totalArfDetails").val(id7);
            $("#putRemark").val(id8);
            $("#totalBalance").val(id9);

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
        $("#prQty").val("");
        $("#inDorQty").val("");
        $("#balanceQty").val("");

        $("#tableShowHideDor").find("input,button,textarea,select").attr("disabled", false);
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