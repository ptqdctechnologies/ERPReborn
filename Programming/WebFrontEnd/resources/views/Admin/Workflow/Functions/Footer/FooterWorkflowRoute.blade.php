<script>
    var idxStart = 1, idxIntermediate = 1, idxEnd = 1, cekStart = 0, cekIntemediate = 0, cekEnd = 0;
    var add_start = $(".add_start");
    var add_intermediate = $(".add_intermediate");
    var add_end = $(".add_end");
    $('.add_start_button').click(function () {
            cekStart = 0;
            addColomnStart();
    });
    $('.add_intermediate_button').click(function () {
            cekIntemediate = 0;
            addColomnIntermediate();
    });
    $('.add_end_button').click(function () {
            cekEnd = 0;
            addColomnEnd();
    });

    function addColomnStart(){ //on add input button click
        if(cekStart == 0){
            cekStart++;
            idxStart++; //text box increment
            $(add_start).append(
                '<td>'
                +   '<div class="input-group">'
                +       '<input id="start' + idxStart + '" style="border-radius:0;background-color:white;width:10%;" name="start[]" class="form-control" readonly>'
                +       '<div class="input-group-append">'
                +           '<span style="border-radius:0;background-color:white;" class="input-group-text form-control">'
                +               '<a href="#" id="" data-toggle="modal" data-target="#myUser" onclick="myUserStart('+ idxStart +')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>'
                +           '</span>&nbsp;'
                +           '<span style="border-radius:0;background-color:white;" class="input-group-text form-control">'
                +               '<a class="remove_start"><img src="{{ asset("AdminLTE-master/dist/img/cancel.png") }}" width="13" alt=""></a>'
                +           '</span>'
                +       '</div>'
                +       '<br><br>'
                +    '</div>'
                +'</td>'

            ); //add input box                
        }                        
    }

    function addColomnIntermediate(){ //on add input button click
        if(cekIntemediate == 0){
            cekIntemediate++;
            idxIntermediate++; //text box increment
            $(add_intermediate).append(
                '<td>'
                +   '<div class="input-group">'
                +       '<input id="intermediate' + idxIntermediate + '" style="border-radius:0;background-color:white;width:10%;" name="intermediate[]" class="form-control" readonly>'
                +       '<div class="input-group-append">'
                +           '<span style="border-radius:0;background-color:white;" class="input-group-text form-control">'
                +               '<a href="#" id="" data-toggle="modal" data-target="#myUser" onclick="myUserIntermediate('+ idxIntermediate +')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>'
                +           '</span>&nbsp;'
                +           '<span style="border-radius:0;background-color:white;" class="input-group-text form-control">'
                +               '<a class="remove_intermediate"><img src="{{ asset("AdminLTE-master/dist/img/cancel.png") }}" width="13" alt=""></a>'
                +           '</span>'
                +       '</div>'
                +       '<br><br>'
                +    '</div>'
                +'</td>'

            ); //add input box                
        }                        
    }

    function addColomnEnd(){ //on add input button click
        if(cekEnd == 0){
            cekEnd++;
            idxEnd++; //text box increment
            $(add_end).append(
                '<td>'
                +   '<div class="input-group">'
                +       '<input id="end' + idxEnd + '" style="border-radius:0;background-color:white;width:10%;" name="end[]" class="form-control" readonly>'
                +       '<div class="input-group-append">'
                +           '<span style="border-radius:0;background-color:white" class="input-group-text form-control">'
                +               '<a href="#" id="" data-toggle="modal" data-target="#myUser" onclick="myUserEnd('+ idxEnd +')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>'
                +           '</span>&nbsp;'
                +           '<span style="border-radius:0;background-color:white;" class="input-group-text form-control">'
                +               '<a class="remove_end"><img src="{{ asset("AdminLTE-master/dist/img/cancel.png") }}" width="13" alt=""></a>'
                +           '</span>'
                +       '</div>'
                +       '<br><br>'
                +    '</div>'
                +'</td>'

            ); //add input box                
        }                        
    }

    $(add_start).on("click",".remove_start", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().parent('div').remove(); idxStart--;
    })

    $(add_intermediate).on("click",".remove_intermediate", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().parent('div').remove(); idxStart--;
    })

    $(add_end).on("click",".remove_end", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().parent('div').remove(); idxStart--;
    })


</script>

<script>


    document.addEventListener('DOMContentLoaded', (event) => {

    var dragSrcEl = null;

    function handleDragStart(e) {
    this.style.opacity = '0.4';
    
    dragSrcEl = this;

    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);
    }

    function handleDragOver(e) {
    if (e.preventDefault) {
        e.preventDefault();
    }

    e.dataTransfer.dropEffect = 'move';
    
    return false;
    }

    function handleDragEnter(e) {
    this.classList.add('over');
    }

    function handleDragLeave(e) {
    this.classList.remove('over');
    }

    function handleDrop(e) {
    if (e.stopPropagation) {
        e.stopPropagation(); // stops the browser from redirecting.
    }
    
    if (dragSrcEl != this) {
        dragSrcEl.innerHTML = this.innerHTML;
        this.innerHTML = e.dataTransfer.getData('text/html');
    }
    
    return false;
    }

    function handleDragEnd(e) {
    this.style.opacity = '1';
    
    items.forEach(function (item) {
        item.classList.remove('over');
    });
    }


    let items = document.querySelectorAll('.container .box');
    items.forEach(function(item) {
    item.addEventListener('dragstart', handleDragStart, false);
    item.addEventListener('dragenter', handleDragEnter, false);
    item.addEventListener('dragover', handleDragOver, false);
    item.addEventListener('dragleave', handleDragLeave, false);
    item.addEventListener('drop', handleDrop, false);
    item.addEventListener('dragend', handleDragEnd, false);
    });
    });
</script>