<script>
    $(function() {
        $(".SelectProject").on('click', function(e) {
            e.preventDefault();
            var id = $(".SelectProject").val();
                
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: 'GET',
                url: '{!! route("ARF.index2") !!}?projectcode=' + id,
                success: function(data) {
                    $("#SelectSite").empty();
                    var datas = data;
                    var len = 0;
                    // var option = "<option value='" + '' + "'>" + '- Select Site - ' + "</option>";
                    // $("#SelectSite").append(option);
                    len = datas.length;
                    for (var i = 0; i < len; i++) {
                        var ids = datas[i].sys_ID;
                        var names = datas[i].sys_Text;
                        var option = "<option value='" + ids + "'>" + names + "</option>";
                        $("#SelectSite").append(option);
                    }
                }
            });
        });

    });
    $(function() {
        $(".SelectProject2").on('click', function(e) {
            e.preventDefault();
            var id = $(".SelectProject2").val();
                
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: 'GET',
                url: '{!! route("ARF.index2") !!}?projectcode=' + id,
                success: function(data) {
                    $("#SelectSite2").empty();
                    var datas = data;
                    var len = 0;
                    // var option = "<option value='" + '' + "'>" + '- Select Site - ' + "</option>";
                    // $("#SelectSite2").append(option);
                    len = datas.length;
                    for (var i = 0; i < len; i++) {
                        var ids = datas[i].sys_ID;
                        var names = datas[i].sys_Text;
                        var option = "<option value='" + ids + "'>" + names + "</option>";
                        $("#SelectSite2").append(option);
                    }
                }
            });
        });

    });
    $(document).ready(function () {

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        function convertdate(str){
            const d = new Date(str);
            let month = '' + (d.getMonth() + 1);
            let day = '' + d.getDate();
            let year = d.getFullYear();
            if(month.length < 2) month = '0' + month;
            if(day.length < 2) day = '0' + day;
            // let hour = ''+d.getUTCHours();
            // let minutes = ''+d.getUTCMinutes();
            // let seconds = ''+d.getUTCSeconds();
            // if(hour.length < 2) hour = '0' + hour;
            // if(minutes.length < 2) minutes = '0' + minutes;
            // if(seconds.length < 2) seconds = '0' + seconds;
            return [year,month,day].join('-');
        };
        $('#addEventButton').on('click', function(){
            $('#popUpCalender').modal("show");
        });
        $('#filterEventButton').on('click', function(){
            $('#popUpFilter').modal("show");
        });
        $('#addActivityButton').on('click', function(){
            $('#popUpActivity').modal("show");
        });
        @if($status == '200')
            @if(isset($varData))
                var calendar = $('#calendar').fullCalendar({
                    selectable:true,
                    height:600,
                    showNonCurrentDates:true,
                    editable:false,
                    defaultView:'month',
                    yearColumns:3,
                    header:{
                        left:'prev,next today',
                        center:'title',
                        right:'year,month,agendaWeek,agendaDay'
                    },
                    events: [
                            @foreach($varData as $key => $rows)
                            {
                                title: '{{$rows["documentNumber"]}}',
                                start: '{{ $rows["startDateTimeTZ"]}}',
                                end: '{{ date("Y-m-d",strtotime($rows["finishDateTimeTZ"] . "+1 days"))}}',
                                color  : '{{ $rows["colorBackground"]}}',
                                textColor: '{{ $rows["colorText"]}}',
                                timesheetId: '{{ $rows["sys_ID"]}}',
                            },
                            @endforeach

                            @foreach($varData2 as $key2 => $rows2)
                            {
                                title: '{{$rows2["activity"]}}',
                                start: '{{ $rows2["startDateTimeTZ"]}}',
                                end: '{{ date("Y-m-d",strtotime($rows2["finishDateTimeTZ"] . "+1 days"))}}',
                                color  : '{{ $rows2["colorBackground"]}}',
                                textColor: '{{ $rows2["colorText"]}}',
                                timesheetId: '{{ $rows2["sys_ID"]}}',
                            },
                            @endforeach
                    ],
                    dayClick:function(date,event,view){
                        $('#startDate').val(convertdate(date));
                        $('#popUpCalender').modal("show");
                    },
                    select:function(start,end){
                        $('#startDate').val(convertdate(start));
                        $('#finishDate').val(convertdate(end));
                        $('#popUpCalender').modal("show");
                    },
                    // eventClick:function(event){
                    //     $('#startDate2').val(convertdate(event.start));
                    //     $('#finishDate2').val(convertdate(event.end));
                    //     $('#backgroundColor2').val(event.color);
                    //     $('#textColor2').val(event.textColor);
                    //     $('#activity2').val(event.title);
                    //     $('#timesheetId').val(event.timesheetId);
                    //     $('#popUpCalenderEdit').modal("show");
                    // },
                    // eventClick2:function(event){
                    //     $('#startDate2').val(convertdate(event.start));
                    //     $('#finishDate2').val(convertdate(event.end));
                    //     $('#backgroundColor2').val(event.color);
                    //     $('#textColor2').val(event.textColor);
                    //     $('#activity2').val(event.title);
                    //     $('#timesheetId').val(event.timesheetId);
                    //     $('#popUpEditActivity').modal("show");
                    // },
                    
                });
            @endif
        @else
            var calendar = $('#calendar').fullCalendar({
                selectable:true,
                height:600,
                showNonCurrentDates:false,
                editable:false,
                defaultView:'month',
                yearColumns:3,
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'year,month,agendaWeek,agendaDay'
                },
                dayClick:function(date,event,view){
                    $('#startDate').val(convertdate(date));
                    $('#popUpCalender').modal("show");
                },
                select:function(start,end){
                    $('#startDate').val(convertdate(start));
                    $('#finishDate').val(convertdate(end));
                    $('#popUpCalender').modal("show");
                }
                
            });
        @endif
        // if ((Date.parse(startDate) <= Date.parse(endDate))) {
        //     alert("End date should be greater than Start date");
        //     document.getElementById("EndDate").value = "";
        // }
    });
  
</script>