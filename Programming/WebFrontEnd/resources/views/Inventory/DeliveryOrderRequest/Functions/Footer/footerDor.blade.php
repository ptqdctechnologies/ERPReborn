<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".headerDor1").hide();
        $(".headerDor2").hide();
        $(".headerDor3").hide();
        $("#detailDor").hide();
        $("#detailDorList").hide();
        // $("#dorCart").hide();
    });
</script>

<script>
    $(function() {
        $(".deliverType").on('click', function(e) {
            e.preventDefault();
            var valType = $(".deliverType").val();
            if(valType == "Warehouse to Site"){
                $(".headerDor1").show();
                $(".headerDor2").hide();
                $(".headerDor3").hide();
            }
            else if(valType == "Warehouse to Warehouse"){
                $(".headerDor2").show();
                $(".headerDor1").hide();
                $(".headerDor3").hide();
            }
            else if(valType == "Supplier to Site"){
                $(".headerDor3").show();
                $(".headerDor2").hide();
                $(".headerDor1").hide();
            }
        });
    });
</script>
<!--  END SHOW HIDE AVAILABEL -->

<script>

    var x = 1,
        y = 0;
        xx = 0; //initlal text box count

    function validateFormDetailDor() {

        var prNumberDorDetail = document.forms["formDetailDor"]["prNumberDorDetail"].value;
        var projectDorDetail = document.forms["formDetailDor"]["projectDorDetail"].value;
        var projectDorDetail2 = document.forms["formDetailDor"]["projectDorDetail2"].value;
        var siteDorDetail = document.forms["formDetailDor"]["siteDorDetail"].value;
        var siteDorDetail2 = document.forms["formDetailDor"]["siteDorDetail2"].value;
        var workIdDorDetail = document.forms["formDetailDor"]["workIdDorDetail"].value;
        var workIdDorDetail2 = document.forms["formDetailDor"]["workIdDorDetail2"].value;
        var productIdDorDetail = document.forms["formDetailDor"]["productIdDorDetail"].value;
        var productIdDorDetail2 = document.forms["formDetailDor"]["productIdDorDetail2"].value;
        var priceDorDetail = document.forms["formDetailDor"]["priceDorDetail"].value;
        var averageDorDetail = document.forms["formDetailDor"]["averageDorDetail"].value;
        var qtyDorDetail = document.forms["formDetailDor"]["qtyDorDetail"].value;
        var qtyDorDetail2 = document.forms["formDetailDor"]["qtyDorDetail2"].value;
        var discountDorDetail = document.forms["formDetailDor"]["discountDorDetail"].value;
        var discountDorDetail2 = document.forms["formDetailDor"]["discountDorDetail2"].value;
        var afterDiscountDorDetail = document.forms["formDetailDor"]["afterDiscountDorDetail"].value;
        
        if (prNumberDorDetail == "") {
            Swal.fire("Error !", "Please Input PR Number !", "error");
        }
        else if (projectDorDetail == "") {
            Swal.fire("Error !", "Please Input Project !", "error");
        }
        else if (projectDorDetail2 == "") {
            Swal.fire("Error !", "Please InputProject !", "error");
        }
        else if (siteDorDetail == "") {
            Swal.fire("Error !", "Please Input Site !", "error");
        }
        else if (siteDorDetail2 == "") {
            Swal.fire("Error !", "Please Input Site !", "error");
        }
        else if (workIdDorDetail == "") {
            Swal.fire("Error !", "Please Input Work Id !", "error");
        }
        else if (workIdDorDetail2 == "") {
            Swal.fire("Error !", "Please Input Work Id !", "error");
        }
        else if (productIdDorDetail == "") {
            Swal.fire("Error !", "Please Input Product Id !", "error");
        }
        else if (productIdDorDetail2 == "") {
            Swal.fire("Error !", "Please Input Product Id !", "error");
        }
        else if (priceDorDetail == "") {
            Swal.fire("Error !", "Please Input Price !", "error");
        }
        else if (averageDorDetail == "") {
            Swal.fire("Error !", "Please Input Average !", "error");
        }
        else if (qtyDorDetail == "") {
            Swal.fire("Error !", "Please Input Qty !", "error");
        }
        else if (qtyDorDetail2 == "") {
            Swal.fire("Error !", "Please Input Qty !", "error");
        }
        else if (discountDorDetail == "") {
            Swal.fire("Error !", "Please Input Discount !", "error");
        }
        else if (discountDorDetail2 == "") {
            Swal.fire("Error !", "Please Input Discount !", "error");
        }
        else if (afterDiscountDorDetail == "") {
            Swal.fire("Error !", "Please Input After Discount !", "error");
        }
        else{
            $("#detailDorList").show();
            var datas = [];

            for (var i = 1; i <= x; i++) {
                var data = {
                    origin_budget: "xxxx",
                    projectcode: "xxxx",
                    projectname: "xxxx",
                    sitecode: "xxxx",
                    sitecode2: "xxxx",
                    beneficiary: "xxxx",
                    bank_name: "xxxx",
                    account_name: "xxxx",
                    account_number: "xxxx",
                    internal_notes: "xxxx",
                    request_name: "xxxx",
                    putWorkId: "xxxx",
                    putWorkName: "xxxx",
                    putProductId: "xxxx",
                    putProductName: "xxxx",
                    putQty: "xxxx",
                    putQtys: "xxxx",
                    putUom: "xxxx",
                    putPrice: "xxxx",
                    putCurrency: "xxxx",
                    totalArfDetails: "xxxx",
                    putRemark: "xxxx",
                    filenames: "xxxx",
                }
                datas.push(data);
            }

            var json_object = JSON.stringify(datas);
            // console.log(json_object);

            $.ajax({
                type: "POST",
                url: '{{route("ARF.store")}}',
                data: json_object,
                contentType: "application/json",
                processData: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },

                success: function(data) {

                  Swal.fire("Success !", "Data add to cart", "success");
                  y++;
                  $.each(data, function(key, val) {

                      var t = $('#tableDorCart').DataTable();
                      t.row.add([
                          '<center><button class="btn btn-outline-danger btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;"><i class="fa fa-trash"></i></button></center>',
                          '<span id="lastProductId_' + y + '">' + val.putProductId + '</span>',
                          '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                          '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                          '<span id="lastProductName_' + y + '">' + val.putProductName + '</span>',
                          '<span id="lastPrice_' + y + '">' + val.putPrice + '</span>',
                          '<span id="totalArfDetails_' + y + '">' + val.totalArfDetails + '</span>'
                      ]).draw();
                  });
                },
                error: function(data) {
                    Swal.fire("Error !", "Data Canceled Added", "error");
                }
            });
        }
    }
</script>

<script>
  function buttonSubmitDor() {
    var headerProjectCode = document.forms["formHeaderDor"]["headerProjectCode"].value;
    var headerPrNumber = document.forms["formHeaderDor"]["headerPrNumber"].value;
    var headerOriginBudget = document.forms["formHeaderDor"]["headerOriginBudget"].value;
    var headerWarehouse1 = document.forms["formHeaderDor"]["headerWarehouse1"].value;
    var headerAddres1 = document.forms["formHeaderDor"]["headerAddres1"].value;
    var headerSiteName1 = document.forms["formHeaderDor"]["headerSiteName1"].value;
    var headerAddress2 = document.forms["formHeaderDor"]["headerAddress2"].value;
    var headerWarehouse2 = document.forms["formHeaderDor"]["headerWarehouse2"].value;
    var headerAddress3 = document.forms["formHeaderDor"]["headerAddress3"].value;
    var headerWarehouse3 = document.forms["formHeaderDor"]["headerWarehouse3"].value;
    var headerAddress4 = document.forms["formHeaderDor"]["headerAddress4"].value;
    var headerSupplier = document.forms["formHeaderDor"]["headerSupplier"].value;
    var headerAddress5 = document.forms["formHeaderDor"]["headerAddress5"].value;
    var headerSiteName2 = document.forms["formHeaderDor"]["headerSiteName2"].value;
    var headerAddress6 = document.forms["formHeaderDor"]["headerAddress6"].value;
    var headerReceiverName = document.forms["formHeaderDor"]["headerReceiverName"].value;
    var headerReceiverNumber = document.forms["formHeaderDor"]["headerReceiverNumber"].value;

    if (headerProjectCode == "") {
      Swal.fire("Error !", "Please Input Project Code !", "error");
    } else if (headerPrNumber == "") {
      Swal.fire("Error !", "Please Input PR Number !", "error");
    } else if (headerOriginBudget == "") {
      Swal.fire("Error !", "Please Input Origin Budget !", "error");
    } else if (headerWarehouse1 == "") {
      Swal.fire("Error !", "Please Input Warehouse !", "error");
    } else if (headerAddres1 == "") {
      Swal.fire("Error !", "Please Input Address !", "error");
    } else if (headerSiteName1 == "") {
      Swal.fire("Error !", "Please Input Site Name !", "error");
    } else if (headerAddress2 == "") {
      Swal.fire("Error !", "Please Input Address !", "error");
    } else if (headerWarehouse2 == "") {
      Swal.fire("Error !", "Please Input Warehouse !", "error");
    } else if (headerAddress3 == "") {
      Swal.fire("Error !", "Please Input Address !", "error");
    } else if (headerWarehouse3 == "") {
      Swal.fire("Error !", "Please Input Warehouse !", "error");
    }else if (headerAddress4 == "") {
      Swal.fire("Error !", "Please Input Address !", "error");
    }else if (headerSupplier == "") {
      Swal.fire("Error !", "Please Input Supplier !", "error");
    }else if (headerAddress5 == "") {
      Swal.fire("Error !", "Please Input Address !", "error");
    }else if (headerSiteName2 == "") {
      Swal.fire("Error !", "Please Input Site Name !", "error");
    }else if (headerAddress6 == "") {
      Swal.fire("Error !", "Please Input Address !", "error");
    }else if (headerReceiverName == "") {
      Swal.fire("Error !", "Please Input Receiver Name !", "error");
    }else if (headerReceiverNumber == "") {
      Swal.fire("Error !", "Please Input Receiver Number !", "error");
    }
     else {

      const swalWithBootstrapButtons = Swal.mixin({
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: true,
      })

      swalWithBootstrapButtons.fire({

        title: 'Are you sure?',
        text: "Save this data?",
        type: 'question',

        showCancelButton: true,
        confirmButtonText: 'Yes, save it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          swalWithBootstrapButtons.fire(
            'Succesful!',
            'Data has been updated !',
            'success'
        )   
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Process Canceled !',
            'error'
          )
        }
      })
    }
  }
</script>