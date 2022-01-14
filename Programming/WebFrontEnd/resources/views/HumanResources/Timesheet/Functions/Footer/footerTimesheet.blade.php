<script>

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
        var calendar = $('#calendar').fullCalendar({
            selectable:true,
            height:600,
            showNonCurrentDates:false,
            editable:false,
            defaultView:'month',
            yearColumns:2,
            header:{
                left:'prev,next today',
                center:'title',
                right:'year,month,agendaWeek,agendaDay'
            },
            events : "{{ route('Timesheet.event') }}",
            dayClick:function(date,event,view){
                $('#start').val(convertdate(date));
                $('#popUpCalender').modal("show");
            },
            select:function(start,end){
                $('#start').val(convertdate(start));
                $('#end').val(convertdate(end));
                $('#popUpCalender').modal("show");
            }
            
        });
        // if ((Date.parse(startDate) <= Date.parse(endDate))) {
        //     alert("End date should be greater than Start date");
        //     document.getElementById("EndDate").value = "";
        // }

    });
  
</script>