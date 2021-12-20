<script type="text/javascript">
    $(document).ready(function() {
        $(".detailASF").hide();
        $("#detailArfList").hide();
        $("#buttonDetailBsf").prop("disabled", true);
        $("#saveBsf").prop("disabled", true);
        $("#ManagerNameId").prop("disabled", true);
        $("#CurrencyId").prop("disabled", true);
        $("#FinanceId").
prop("disabled", true);
    });
</script>

<script>
    var x = 1, y = 0; xx = 0;//initlal text box count
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    $('.add_field_button').click(function () {
            cek = 0;
            addColomn();
    });
    function addColomn(){ //on add input button click
        if(cek == 0){
            cek++;
            x++; //text box increment
            $(wrapper).append(

                '<div class="col-md-12">'
                +   '<div class="form-group">'
                +       '<div class="input-group control-group" style="width:105%;position:relative;right:8px;">'
                +           '<input type="file" class="form-control filenames" id="filenames_' + x + '" style="height:26px;">'
                +           '<div class="input-group-btn">'
                +               '<button class="btn btn-outline-secondary btn-sm remove_field" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>'
                +           '</div>'
                +       '</div>'
                +    '</div>'
                +'</div>'

            ); //add input box                
        }                        
    }

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().parent('div').remove(); x--;
    })
</script>

<script>

    $('#addBsfListCart').click(function() {
      
        var balance = $('#balance').val();
        var total_expense = $('#total_expense').val();
        var total_amount = $('#total_amount').val();
        var totalExpenseAmount = +total_expense + +total_amount;

        if (totalExpenseAmount <= balance) {

          var trano = $('#tranoHide').val();
          var product_id =  $("#productIdHide").val();
          var product_name =  $("#productNameHide").val();
          var uom =  $("#uomHide").val();
          var arf_date = $('#arf_date').val();
          var total_arf = $('#total_arf').val();
          var total_arf2 = $('#total_arf2').val();
          var total_asf = $('#total_asf').val();
          var total_asf2 = $('#total_asf2').val();
          var balance = $('#balance').val();
          var balance2 = $('#balance2').val();
          var qty_expense =  $('#qty_expense').val();
          var qty_expense2 =  $('#qty_expense2').val();
          var price_expense =  $('#price_expense').val();
          var price_expense2 =  $('#price_expense2').val();
          var total_expense =  $('#total_expense').val();
          var total_expense2 =  $('#total_expense2').val();
          var qty_amount =  $('#qty_amount').val();
          var qty_amount2 =  $('#qty_amount2').val();
          var price_amount =  $('#price_amount').val();
          var price_amount2 =  $('#price_amount2').val();
          var total_amount =  $('#total_amount').val();
          var total_amount2 =  $('#total_amount2').val();
          var description =  "cek";

          var html = '<tr>'+
                          '<td>'+
                              '<button type="button" class="btn btn-danger btn-xs remove_amount" data-id="1"><i class="fa fa-trash"></i></button> '+
                              '<button type="button" class="btn btn-warning btn-xs edit_amount" data-dismiss="modal" data-id1="'+trano+'" data-id2="'+arf_date+'" data-id3="'+total_arf+'" data-id4="'+total_arf2+'" data-id5="'+total_asf+'" data-id6="'+total_asf2+'" data-id7="'+balance+'" data-id8="'+balance2+'" data-id9="'+qty_expense+'" data-id10="'+qty_expense2+'" data-id11="'+price_expense+'" data-id12="'+price_expense2+'" data-id13="'+total_expense+'" data-id14="'+total_expense2+'" data-id15="'+qty_amount+'" data-id16="'+qty_amount2+'" data-id17="'+price_amount+'" data-id18="'+price_amount2+'" data-id19="'+total_amount+'" data-id20="'+total_amount2+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                              '<input type="hidden" name="var_trano[]" value="'+trano+'">'+
                              '<input type="hidden" name="var_product_id[]" value="'+product_id+'">'+
                              '<input type="hidden" name="var_product_name[]" value="'+product_name+'">'+
                              '<input type="hidden" name="var_uom[]" value="'+uom+'">'+
                              '<input type="hidden" name="var_price_amount[]" value="'+price_amount+'">'+
                              '<input type="hidden" name="var_qty_amount[]" value="'+qty_amount+'">'+
                              '<input type="hidden" name="var_total_amount[]" value="'+total_amount+'">'+
                              '<input type="hidden" name="var_description[]" value="'+description+'">'+
                          '</td>'+
                          '<td>'+trano+'</td>'+
                          '<td>'+product_id+'</td>'+
                          '<td>'+product_name+'</td>'+
                          '<td>'+uom+'</td>'+
                          '<td>'+qty_amount+'</td>'+
                          '<td>'+price_amount+'</td>'+
                          '<td>'+total_amount+'</td>'+
                          '<td>'+description+'</td>'+
                      '</tr>';
              
          $('table.tableAmountDueto tbody').append(html);

          var html2 = '<tr>'+
                          '<td>'+
                              '<button type="button" class="btn btn-danger btn-xs remove_expense" data-id="1"><i class="fa fa-trash"></i></button> '+
                              '<button type="button" class="btn btn-warning btn-xs edit_expense" data-dismiss="modal" data-id1="'+trano+'" data-id2="'+arf_date+'" data-id3="'+total_arf+'" data-id4="'+total_arf2+'" data-id5="'+total_asf+'" data-id6="'+total_asf2+'" data-id7="'+balance+'" data-id8="'+balance2+'" data-id9="'+qty_expense+'" data-id10="'+qty_expense2+'" data-id11="'+price_expense+'" data-id12="'+price_expense2+'" data-id13="'+total_expense+'" data-id14="'+total_expense2+'" data-id15="'+qty_amount+'" data-id16="'+qty_amount2+'" data-id17="'+price_amount+'" data-id18="'+price_amount2+'" data-id19="'+total_amount+'" data-id20="'+total_amount2+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                              '<input type="hidden" id="var_trano" name="var_trano[]" value="'+trano+'">'+
                              '<input type="hidden" name="var_product_id[]" value="'+product_id+'">'+
                              '<input type="hidden" name="var_product_name[]" value="'+product_name+'">'+
                              '<input type="hidden" name="var_uom[]" value="'+uom+'">'+
                              '<input type="hidden" name="var_price_expense[]" value="'+price_expense+'">'+
                              '<input type="hidden" name="var_qty_expense[]" value="'+qty_expense+'">'+
                              '<input type="hidden" name="var_total_expense[]" value="'+total_expense+'">'+
                              '<input type="hidden" name="var_description[]" value="'+description+'">'+
                          '</td>'+
                          '<td>'+trano+'</td>'+
                          '<td>'+product_id+'</td>'+
                          '<td>'+product_name+'</td>'+
                          '<td>'+uom+'</td>'+
                          '<td>'+qty_expense+'</td>'+
                          '<td>'+price_expense+'</td>'+
                          '<td>'+total_expense+'</td>'+
                          '<td>'+description+'</td>'+
                      '</tr>';
                  
          $('table.tableExpenseClaim tbody').append(html2);
          $("#expenseCompanyCart").show();
          $("#saveAsfList").prop("disabled", false);

          $("body").on("click", ".remove_amount", function() {
              $(this).closest("tr").remove();
          });

          $("body").on("click", ".edit_amount", function () {
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
              var id17 = $this.data("id17");
              var id18 = $this.data("id18");
              var id19 = $this.data("id19");
              var id20 = $this.data("id20");
              

              $("#arf_number").val(id1);
              $("#arf_date").val(id2);
              $('#total_arf').val(id3);
              $("#total_arf2").val(id4);
              $("#total_asf").val(id5);
              $("#total_asf2").val(id6);
              $("#balance").val(id7);
              $("#balance2").val(id8);
              $("#qty_expense").val(id9);
              $("#qty_expense2").val(id10);
              $("#price_expense").val(id11);
              $("#price_expense2").val(id12);
              $("#total_expense").val(id13);
              $("#total_expense2").val(id14);
              $("#qty_amount").val(id15);
              $("#qty_amount2").val(id16);
              $("#price_amount").val(id17);
              $("#price_amount2").val(id18);
              $("#total_amount").val(id19);
              $("#total_amount2").val(id20);
              
              $(this).closest("tr").remove();

              $("#qty_expense").prop("disabled", true);
              $("#price_expense").prop("disabled", true);
          });
          $("body").on("click", ".remove_expense", function () {
              $(this).closest("tr").remove();
          });
          $("body").on("click", ".edit_expense", function () {
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
              var id17 = $this.data("id17");
              var id18 = $this.data("id18");
              var id19 = $this.data("id19");
              var id20 = $this.data("id20");
              

              $("#arf_number").val(id1);
              $("#arf_date").val(id2);
              $('#total_arf').val(id3);
              $("#total_arf2").val(id4);
              $("#total_asf").val(id5);
              $("#total_asf2").val(id6);
              $("#balance").val(id7);
              $("#balance2").val(id8);
              $("#qty_expense").val(id9);
              $("#qty_expense2").val(id10);
              $("#price_expense").val(id11);
              $("#price_expense2").val(id12);
              $("#total_expense").val(id13);
              $("#total_expense2").val(id14);
              $("#qty_amount").val(id15);
              $("#qty_amount2").val(id16);
              $("#price_amount").val(id17);
              $("#price_amount2").val(id18);
              $("#total_amount").val(id19);
              $("#total_amount2").val(id20);
              
              $(this).closest("tr").remove();

              $("#qty_amount").prop("disabled", true);
              $("#price_amount").prop("disabled", true);
          });

          $("#arf_number").val("");
          $("#arf_date").val("");
          $("#total_arf").val("");
          $("#total_arf2").val("");
          $("#priceCek").val("");
          $("#total_asf").val("");
          $("#total_asf2").val("");
          $("#balance").val("");
          $("#balance2").val("");
          $("#qty_expense").val("");
          $("#qty_expense2").val("");
          $("#price_expense").val("");
          $("#price_expense2").val("");
          $("#total_expense").val("");
          $("#total_expense2").val("");
          $("#qty_amount").val("");
          $("#qty_amount2").val("");
          $("#price_amount").val("");
          $("#price_amount2").val("");
          $("#total_amount").val("");
          $("#total_amount2").val("");

          $("#qty_expense").prop("disabled", false);
          $("#price_expense").prop("disabled", false);
          $("#qty_amount").prop("disabled", false);
          $("#price_amount").prop("disabled", false);

        } else {
            Swal.fire("Error !", "Request over budget", "error");
        }
    });
</script>

<script>
  $('#saveBsf').click(function() {

      const swalWithBootstrapButtons = Swal.mixin({
        confirmButtonClass: 'btn btn-success btn-sm',
        cancelButtonClass: 'btn btn-danger  btn-sm',
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

          //Batas

          var datax = [];
          for (var i = 1; i <= y; i++) {
            var data = {
              lastWorkId: $('#lastWorkId_' + i).html(),
              lastWorkName: $('#lastWorkName_' + i).html(),
              lastProductId: $('#lastProductId_' + i).html(),
              lastProductName: $('#lastProductName_' + i).html(),
              lastQty: $('#lastQty_' + i).val(),
              lastUom: $('#lastUom_' + i).html(),
              lastPrice: $('#lastPrice_' + i).html(),
              totalArfDetails: $('#totalArfDetails_' + i).html(),
              lastCurrency: $('#lastCurrency_' + i).html(),
              lastRemark: $('#lastRemark_' + i).html(),

            }
            datax.push(data);
          }

          var json_object = JSON.stringify(datax);
          console.log(json_object);

          $.ajax({
            type: "POST",
            url: '{{route("ARF.tests")}}',
            data: json_object,
            contentType: "application/json",
            processData: true,
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(data) {
              console.log(data);
            },
            error: function(data) {
              Swal.fire("Error !", "Data Canceled Added", "error");
            }
          });

          //EndBatas

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
    // }
  });
</script>

<script>
    $('document').ready(function() {
        $('#price_expense').keyup(function() {
            var price_expense = $(this).val();
            var qty_expense = $('#qty_expense').val();
            var total_expense = price_expense * qty_expense;$("#total_expense").val(total_expense);
        });
    });
</script>

<script>
    $('document').ready(function() {
        $('#price_amount').keyup(function() {
            var price_amount = $(this).val();
            var qty_amount = $('#qty_amount').val();
            var total_amount = price_amount * qty_amount;// var total_amount = parseFloat(price_amount * qty_amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            $("#total_amount").val(total_amount);
        });
    });
</script>