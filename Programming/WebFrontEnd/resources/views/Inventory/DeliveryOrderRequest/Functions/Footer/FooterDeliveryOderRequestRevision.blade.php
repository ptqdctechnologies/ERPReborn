<script type="text/javascript">
    $(document).ready(function() {
        $(".headerDor1").hide();
        $(".headerDor2").hide();
        $(".headerDor3").hide();
        $(".headerDor4").hide();
        $("#detailPR").hide();
        $("#detailDor").hide();
        // $(".detailDorList").hide();
        // $("#tableShowHideDor").hide();
        $("#headerPrNumber2").prop("disabled", true);
        $("#pr_number2").prop("disabled", true);
        $("#SubmitDor").prop("disabled", true);
    });
</script>

<script type="text/javascript">
    //GET PR DATA 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var var_recordID = $("#var_recordID").val();
    var pr_number = $("#pr_number").val();

    $.ajax({
        type: "GET",
        url: '{!! route("DeliveryOrderRequest.DeliveryOrderRequestListDataByID") !!}?var_recordID=' + var_recordID,
        success: function(data) {
            $.each(data, function(key, value) {
                
                var html = '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:5%;">' +
                    '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs AddToDetail AddToDetail2" data-dismiss="modal" data-id0="' + value.combinedBudget_SubSectionLevel1_RefID + '" data-id1="' + pr_number + '" data-id2="' + value.product_RefID + '" data-id3="' + value.productName + '" data-id4="' + value.quantity + '" data-id5="' + value.productUnitPriceCurrencyValue + '" data-id6="' + value.priceBaseCurrencyValue + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="18" alt="" title="Add"></button> ' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' +
                    '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + pr_number + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '</tr>';

                $('table.tablePrDetailDor tbody').append(html);
            });

            $("body").on("click", ".AddToDetail", function() {
                $("#detailDor").show();

                var $this = $(this);
                $("#putWorkId").val($this.data("id0"));
                $("#pr_number_detail").val($this.data("id1"));
                $("#putProductId").val($this.data("id2"));
                $("#putProductName").val($this.data("id3"));
                $("#qtyCek").val($this.data("id4").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#putQty").val($this.data("id4"));
                $("#priceCek").val($this.data("id5").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#putPrice").val($this.data("id5"));
                $("#average").val($this.data("id6").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#totalBalance").val($this.data("id4").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                $(".AddToDetail2").prop("disabled", true);
                $(".ActionButton").prop("disabled", true);

            });
        },
    });

    // GET DOR LIST 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var var_recordID = $("#var_recordID").val();

    $.ajax({
        type: "POST",
        url: '{!! route("DeliveryOrderRequest.DeliveryOrderRequestListCartRevision") !!}?var_recordID=' + var_recordID,
        success: function(data) {

            $.each(data, function(key, value) {
                
                //TOTAL PR
                if($("#TotalDeliveryOrderRequest").html() == ""){
                    $("#TotalDeliveryOrderRequest").html('0');
                }
                var TotalDeliveryOrderRequest = parseFloat(value.priceBaseCurrencyValue.replace(/,/g, ''));
                var TotalDeliveryOrderRequest2 = parseFloat($("#TotalDeliveryOrderRequest").html().replace(/,/g, ''));
                $("#TotalDeliveryOrderRequest").html(parseFloat(+TotalDeliveryOrderRequest2 + +TotalDeliveryOrderRequest).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            
                var html =
                    '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:5%;">' +
                    '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditDeliveryOrderRequestListCart(this)" data-dismiss="modal" data-id0="' + value.combinedBudget_SubSectionLevel1_RefID + '" data-id1="' + value.product_RefID + '" data-id2="' + value.productName + '" data-id3="' + value.quantity + '" data-id4="' + value.productUnitPriceCurrencyValue + '" data-id5="' + value.priceBaseCurrencyValue + '" data-id6="' + value.quantity + '" data-id7="' + value.sys_ID + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="18" alt="" title="Edit"></button> ' +
                    '<input type="hidden" name="var_product_id[]" value="' + value.product_RefID + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + value.productName + '">' +
                    '<input type="hidden" name="var_quantity[]" value="' + value.quantity + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + value.quantityUnitName + '">' +
                    '<input type="hidden" name="var_price[]" value="' + value.productUnitPriceCurrencyValue + '">' +
                    '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + value.priceCurrencyISOCode + '">' +
                    '<input type="hidden" name="var_combinedBudget[]" value="' + value.combinedBudgetSectionDetail_RefID + '">' +
                    '<input type="hidden" name="var_recordIDDetail[]" value="' + value.sys_ID + '">' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.combinedBudget_SubSectionLevel1_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '</tr>';

                $('table.TableDorCart tbody').append(html);
            });
        },
    });

</script>

<script type="text/javascript">

    function addFromDetailtoCartJs() {
        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var valQty = $("#qtyCek").val();
        var valPrNumber = $("#pr_number_detail").val();

        $("#qtyCek").css("border", "1px solid #ced4da");
        $("#pr_number_detail").css("border", "1px solid #ced4da");

        if (valQty === "") {
            $("#qtyCek").focus();
            $("#qtyCek").attr('required', true);
            $("#qtyCek").css("border", "1px solid red");
        } else if (valPrNumber === "") {
            $("#pr_number_detail").focus();
            $("#pr_number_detail").attr('required', true);
            $("#pr_number_detail").css("border", "1px solid red");
        } else {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({
                type: "POST",
                url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequest") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                success: function(data) {

                    if (data == "200") {

                        $("#product_id2").prop("disabled", true);
                        var trano = $("#pr_number_detail").val();
                        var work_id = $("#putWorkId").val();
                        var putProductId = $("#putProductId").val();
                        var putProductName = $("#putProductName").val();
                        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
                        var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
                        var average = $("#average").val().replace(/^\s+|\s+$/g, '');
                        var totalBalance = $("#totalBalance").val();
                        var putPrice = $('#putPrice').val();
                        var putQty = $('#putQty').val();

                        //TOTAL DO
                        if($("#TotalDeliveryOrderRequest").html() == ""){
                            $("#TotalDeliveryOrderRequest").html('0');
                        }
                        var TotalDeliveryOrderRequest = parseFloat($("#average").val().replace(/,/g, ''));
                        var TotalDeliveryOrderRequest2 = parseFloat($("#TotalDeliveryOrderRequest").html().replace(/,/g, ''));
                        $("#TotalDeliveryOrderRequest").html(parseFloat(+TotalDeliveryOrderRequest2 + TotalDeliveryOrderRequest).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:5%;">' +
                            '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditDeliveryOrderRequest(this)" data-dismiss="modal" data-id0="' + work_id + '" data-id1="' + putProductId + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + priceCek + '" data-id5="' + average + '" data-id6="' + totalBalance + '" data-id7="' + trano + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '<input type="hidden" name="var_putProductId[]" value="' + putProductId + '">' +
                            '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + parseFloat(qtyCek.replace(/,/g, '')) + '">' +
                            '<input type="hidden" name="var_price[]" value="' + parseFloat(priceCek.replace(/,/g, '')) + '">' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + work_id + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + qtyCek + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + priceCek + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + average + '</td>' +
                            '</tr>';

                        $('table.TableDorCart tbody').append(html);
                        $("#statusEditDor").val("No");


                        $("#pr_number_detail").val("");
                        $("#putWorkId").val("");
                        $("#putProductId").val("");
                        $("#putProductName").val("");
                        $("#qtyCek").val("");
                        $("#priceCek").val("");
                        $("#average").val("");
                        $("#totalBalance").val("");

                        $(".AddToDetail2").prop("disabled", false);
                        $(".ActionButton").prop("disabled", false);
                        $(".detailDorList").show();
                        $("#SubmitDor").prop("disabled", false);

                    } else {
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });
        }
    }
    
</script>

<script type="text/javascript">
    function CancelDetailDor() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var trano = $('#pr_number_detail').val();
        var work_id = $("#putWorkId").val();
        var putProductId = $("#putProductId").val();
        var putProductName = $("#putProductName").val();
        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
        var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
        var average = $("#average").val().replace(/^\s+|\s+$/g, '');
        var totalBalance = $("#totalBalance").val();
        var putPrice = $('#putPrice').val();
        var statusEditDor = $("#statusEditDor").val();

        if (statusEditDor == "Yes") {

            qtyCek = $('#ValidateQuantity').val();
            average = parseFloat(qtyCek.replace(/,/g, '') * priceCek.replace(/,/g, ''));
            
            $.ajax({
                type: "POST",
                url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequest") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                success: function(data) {

                    if (data == "200") {

                        let html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditDeliveryOrderRequest(this)" data-dismiss="modal" data-id0="' + work_id + '" data-id1="' + putProductId + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + priceCek + '" data-id5="' + average + '" data-id6="' + totalBalance + '" data-id7="' + trano + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '<input type="hidden" name="var_putProductId[]" value="' + putProductId + '">' +
                            '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                            '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + work_id + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + qtyCek + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + priceCek + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + average.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '</tr>';
                        $('table.TableDorCart tbody').append(html);

                        var TotalDeliveryOrderRequest = parseFloat($("#TotalDeliveryOrderRequest").html().replace(/,/g, ''));
                        $("#TotalDeliveryOrderRequest").html(parseFloat(+TotalDeliveryOrderRequest + average).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                    }else {
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });
            $("#statusEditDor").val("No");
        }

        $(".AddToDetail2").prop("disabled", false);
        $(".ActionButton").prop("disabled", false);

        
        $("#putProductId").css("border", "1px solid #ced4da");
        $("#putProductId").val("");
        $("#pr_number_detail").val("");
        $("#putWorkId").val("");
        $("#putProductName").val("");
        $("#qtyCek").val("");
        $("#priceCek").val("");
        $("#totalBalance").val("");
        $("#average").val("");
    }
</script>

<script>
    function EditDeliveryOrderRequest(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TableDorCart").deleteRow(i);

        var $this = $(t);

        $.ajax({
            type: "POST",
            url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequest2") !!}?putProductId=' + $this.data("id1") + '&putWorkId=' + $this.data("id0"),
        });

        $("#putWorkId").val($this.data("id0"));
        $("#putProductId").val($this.data("id1"));
        $("#putProductName").val($this.data("id2"));
        $("#qtyCek").val($this.data("id3"));
        $("#putQty").val($this.data("id3"));
        $("#priceCek").val($this.data("id4"));
        $("#average").val($this.data("id5"));
        $("#totalBalance").val($this.data("id6"));
        $("#pr_number_detail").val($this.data("id7"));
        $("#statusEditDor").val("Yes");

        $("#ValidateQuantity").val($this.data("id3"));

        var average = parseFloat($("#average").val().replace(/,/g, ''));
        var TotalDeliveryOrderRequest = parseFloat($("#TotalDeliveryOrderRequest").html().replace(/,/g, ''));
        $("#TotalDeliveryOrderRequest").html(parseFloat(TotalDeliveryOrderRequest - average).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        $(".AddToDetail2").prop("disabled", true);
        $(".ActionButton").prop("disabled", true);
    }

    function EditDeliveryOrderRequestListCart(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TableDorCart").deleteRow(i);

        var $this = $(t);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequest2") !!}?putProductId=' + $this.data("id1") + '&putWorkId=' + $this.data("id0"),
        });

        $("#putWorkId").val($this.data("id0"));
        $("#putProductId").val($this.data("id1"));
        $("#putProductName").val($this.data("id2"));
        $("#qtyCek").val($this.data("id3"));
        $("#putQty").val($this.data("id3"));
        $("#priceCek").val($this.data("id4"));
        $("#average").val($this.data("id5"));
        $("#totalBalance").val($this.data("id6"));
        $("#pr_number_detail").val($this.data("id7"));
        $("#statusEditDor").val("Yes");

        $("#ValidateQuantity").val($this.data("id3"));

        var average = parseFloat($("#average").val().replace(/,/g, ''));
        var TotalDeliveryOrderRequest = parseFloat($("#TotalDeliveryOrderRequest").html().replace(/,/g, ''));
        $("#TotalDeliveryOrderRequest").html(parseFloat(TotalDeliveryOrderRequest - average).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        $(".AddToDetail2").prop("disabled", true);
        $(".ActionButton").prop("disabled", true);
        $("#detailDor").show();
    }
</script>

<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {
            
            var qtyCek = parseFloat($(this).val().replace(/,/g, ''));
            var putQty = $('#putQty').val();
            var priceCek = parseFloat($('#priceCek').val().replace(/,/g, ''));
            var total = qtyCek * priceCek;
            console.log(putQty);
            if (qtyCek == '') {
                $("#addFromDetailDortoCart").prop("disabled", true);
                $("#average").val(0);
            } else if (qtyCek > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Qty Request is Over", "error");
                $("#qtyCek").val(0);
                $("#average").val(0);
                $("#qtyCek").css("border", "1px solid red");
                $("#addFromDetailDortoCart").prop("disabled", true);
            } else {
                $("#qtyCek").css("border", "1px solid #ced4da");
                $('#average').val(parseFloat(total).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#addFromDetailDortoCart").prop("disabled", false);
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

<script type="text/javascript">
    function CancelDor() {
        $("#loading").show();
        $(".loader").show();
        window.location.href = '/DeliveryOrderRequest?var=1';
    }
</script>

<script>
    $(function() {
        $("#FormSubmitDorRevision").on("submit", function(e) { //id of form 
            e.preventDefault();

            var receiver_name = $("#receiver_name").val();
            var receiver_number = $("#receiver_number").val();
            var deliver_type = $("#deliver_type").val();
            $("#receiver_name").css("border", "1px solid #ced4da");
            $("#receiver_number").css("border", "1px solid #ced4da");
            $("#deliver_type").css("border", "1px solid #ced4da");

            if (receiver_name === "") {
                $("#receiver_name").focus();
                $("#receiver_name").attr('required', true);
                $("#receiver_name").css("border", "1px solid red");
            } else if (receiver_number === "") {
                $("#receiver_number").focus();
                $("#receiver_number").attr('required', true);
                $("#receiver_number").css("border", "1px solid red");
            } else if (deliver_type === "") {
                $("#deliver_type").focus();
                $("#deliver_type").attr('required', true);
                $("#deliver_type").css("border", "1px solid red");
            } else {
                var action = $(this).attr("action"); //get submit action from form
                var method = $(this).attr("method"); // get submit method
                var form_data = new FormData($(this)[0]); // convert form into formdata 
                var form = $(this);


                const swalWithBootstrapButtons = Swal.mixin({
                    confirmButtonClass: 'btn btn-success btn-sm',
                    cancelButtonClass: 'btn btn-danger btn-sm',
                    buttonsStyling: true,
                })

                swalWithBootstrapButtons.fire({

                    title: 'Are you sure?',
                    text: "Save this data?",
                    type: 'question',

                    showCancelButton: true,
                    confirmButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/save.png") }}" width="13" alt=""><span style="color:black;">Yes, save it </span>',
                    cancelButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/cancel.png") }}" width="13" alt=""><span style="color:black;"> No, cancel </span>',
                    confirmButtonColor: '#e9ecef',
                    cancelButtonColor: '#e9ecef',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {

                        $("#loading").show();
                        $(".loader").show();

                        $.ajax({
                            url: action,
                            dataType: 'json', // what to expect back from the server
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: method,
                            success: function(response) {

                                $("#loading").hide();
                                $(".loader").hide();

                                swalWithBootstrapButtons.fire({

                                    title: 'Successful !',
                                    type: 'success',
                                    html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + response.advnumber + '</span>',
                                    showCloseButton: false,
                                    showCancelButton: false,
                                    focusConfirm: false,
                                    confirmButtonText: '<span style="color:black;"> Ok </span>',
                                    confirmButtonColor: '#4B586A',
                                    confirmButtonColor: '#e9ecef',
                                    reverseButtons: true
                                }).then((result) => {
                                    if (result.value) {
                                        $("#loading").show();
                                        $(".loader").show();

                                        window.location.href = '/DeliveryOrderRequest?var=1';
                                    }
                                })
                            },

                            error: function(response) { // handle the error
                                Swal.fire("Cancelled", "Data Cancel Inputed", "error");
                            },

                        })


                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({

                            title: 'Cancelled',
                            text: "Process Canceled",
                            type: 'error',
                            confirmButtonColor: '#e9ecef',
                            confirmButtonText: '<span style="color:black;"> Ok </span>',

                        }).then((result) => {
                            if (result.value) {
                                $("#loading").show();
                                $(".loader").show();

                                window.location.href = '/DeliveryOrderRequest?var=1';
                            }
                        })
                    }
                })
            }
        });

    });
</script>