<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".detailASF").hide();
        $("#detailArfList").hide();
        $("#amountCompanyCart").hide();
        $("#expenseClaimCart").hide();
    });
</script>
<!--  END SHOW HIDE AVAILABEL -->
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