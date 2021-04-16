<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        // $(".headerDor1").hide();
        // $(".headerDor2").hide();
        // $(".headerDor3").hide();
        // $("#detailDor").hide();
        // $("#detailDorList").hide();
        // $("#dorCart").hide();
    });
</script>

<script>
    $(function() {
        $(".warehouseMret").on('click', function(e) {
            e.preventDefault();
            var valAddress = $(".warehouseMret").val();
            if(valAddress == "Jakarta"){
              $("#address").val("Jakarta");
            }
            else if(valAddress == "Bandung"){
              $("#address").val("Bandung");
            }
            else if(valAddress == "Surabaya"){
              $("#address").val("Surabaya");
            }
        });
    });
</script>
<!--  END SHOW HIDE AVAILABEL -->

<script>

    var x = 1,
        y = 0;
        xx = 0; //initlal text box count

    function validateFormHeaderMret() {
        var projectcode = document.forms["formHeaderMret"]["projectcode"].value;
        var doNumberMret = document.forms["formHeaderMret"]["doNumberMret"].value;
        var address = document.forms["formHeaderMret"]["address"].value;
        var sitecode = document.forms["formHeaderMret"]["sitecode"].value;
        var warehouseMret = document.forms["formHeaderMret"]["warehouseMret"].value;
        var delivery = document.forms["formHeaderMret"]["delivery"].value;
        var receive = document.forms["formHeaderMret"]["receive"].value;
        
        if (projectcode == "") {
            Swal.fire("Error !", "Please Input Project Code !", "error");
        }
        else if (doNumberMret == "") {
            Swal.fire("Error !", "Please Input DO Number !", "error");
        }
        else if (address == "") {
            Swal.fire("Error !", "Please Input Address !", "error");
        }
        else if (sitecode == "") {
            Swal.fire("Error !", "Please Input Site !", "error");
        }
        else if (warehouseMret == "") {
            Swal.fire("Error !", "Please Input Warehouse !", "error");
        }
        else if (delivery == "") {
            Swal.fire("Error !", "Please Input Delivery !", "error");
        }
        else if (receive == "") {
            Swal.fire("Error !", "Please Input Receive !", "error");
        }
        else{
            var datas = [];

            for (var i = 1; i <= x; i++) {
                var data = {
                    origin_budget: "xxxx",
                    projectcode: "xxxx",
                    projectname: "xxxx",
                    subprojectc: "xxxx",
                    subprojectn: "xxxx",
                    beneficiary: "xxxx",
                    bank_name: "xxxx",
                    account_name: "xxxx",
                    account_number: "xxxx",
                    internal_notes: "xxxx",
                    requestNameArf: "xxxx",
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
                url: '{{route('ARF.store')}}',
                data: json_object,
                contentType: "application/json",
                processData: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    Swal.fire("Success !", "Data Added to DO Detail", "success");
                    console.log(data);
                    y++;
                    $.each(data, function(key, val) {
                        $('#tableDetailDorMret').append('<tr id="control-group"><td><center><a class="btn btn-outline-success btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;" href="javascript:cek()"><i class="fa fa-plus" aria-hidden="true"></i></a></center></td><td><span id="lastWorkId_' + y + '">' + val.putWorkId + '</span></td><td><span id="lastWorkName_' + y + '">' + val.putWorkName + '</span></td><td><span id="lastProductId_' + y + '">' + val.putProductId + '</span></td><td><span id="lastUom_' + y + '">' + val.putUom + '</span></td><td><span id="lastUom_' + y + '">' + val.putUom + '</span></td><td><span id="lastUom_' + y + '">' + val.putUom + '</span></td><td><span id="lastUom_' + y + '">' + val.putUom + '</span></td><td><span id="lastUom_' + y + '">' + val.putUom + '</span></td><td><span id="lastUom_' + y + '">' + val.putUom + '</span></td></tr>');
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
    function cek() {
        $("#work_id").val("x");
        $("#product_id").val("x");
        $("#product_name").val("x");
        $("#remark").val("x");
        $("#nect_act").val("x");
        $("#qty").val("x");
        $("#qty2").val("x");
        $("#unit_price").val("x");
        $("#unit_price2").val("x");
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