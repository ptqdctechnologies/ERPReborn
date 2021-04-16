<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailPPM").hide();
        $("#detailPPMList").hide();
    });
</script>

<script>
  var x = 1; //initlal text box count        
  var wrapper = $(".input_fields_wrap"); //Fields wrapper
  $('.add_field_button').click(function() {
    cek = 0;
    addColomn();
  });

  function addColomn() { //on add input button click
    if (cek == 0) {
      cek++;
      x++; //text box increment
      $(wrapper).append(

        '<div class="col-md-12">' +
        '<div class="form-group">' +
        '<div class="input-group control-group" style="width:105%;position:relative;right:8px;">' +
        '<input type="file" class="form-control filenames" id="filenames_' + x + '" style="height:26px;">' +
        '<div class="input-group-btn">' +
        '<button class="btn btn-outline-secondary btn-sm remove_field" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>'

      ); //add input box                
    }
  }

  $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
    e.preventDefault();
    $(this).parent().parent().parent('div').remove();
    x--;
  })
</script>


<script>
    function validateFormDetailPPM() {
        var work_id = document.forms["formDetailPPM"]["work_id"].value;
        var product_id = document.forms["formDetailPPM"]["product_id"].value;
        var product_name = document.forms["formDetailPPM"]["product_name"].value;
        var qty = document.forms["formDetailPPM"]["qty"].value;
        var unit_price = document.forms["formDetailPPM"]["unit_price"].value;
        
        if (work_id == "") {
            Swal.fire("Error !", "Work ID tidak boleh kosong !", "error");
        }
        else if (product_id == "") {
            Swal.fire("Error !", "Product ID tidak boleh kosong !", "error");
        }
        else if (product_name == "") {
            Swal.fire("Error !", "Product Name tidak boleh kosong !", "error");
        }
        else if (qty == "" || qty == "0") {
            Swal.fire("Error !", "Qty tidak boleh kosong !", "error");
        }
        else if (unit_price == "") {
            Swal.fire("Error !", "Unit Price tidak boleh kosong !", "error");
        }
    }
</script>