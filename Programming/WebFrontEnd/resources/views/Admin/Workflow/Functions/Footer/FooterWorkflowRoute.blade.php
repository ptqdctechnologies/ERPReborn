<script>
    var x = 1, y = 0; xx = 0;//initlal text box count
    var add_start = $(".add_start"); //Fields add_start
    $('.add_start_button').click(function () {
            cek = 0;
            addColomn();
    });
    function addColomn(){ //on add input button click
        if(cek == 0){
            cek++;
            x++; //text box increment
            $(add_start).append(
                '<td>'
                +   '<div class="input-group">'
                +       '<input id="user_code' + x + '" style="border-radius:0;background-color:white;width:10%;" name="user_code[]" class="form-control" readonly>'
                +       '<div class="input-group-append">'
                +           '<span style="border-radius:0;" class="input-group-text form-control">'
                +               '<a href="#" id="start2" data-toggle="modal" data-target="#myUser" onclick="myUser('+ x +')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>'
                +           '</span>'
                +       '</div>'
                +       '<br><br>'
                +    '</div>'
                +'</td>'

            ); //add input box                
        }                        
    }

    $(add_start).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().parent('div').remove(); x--;
    })


</script>