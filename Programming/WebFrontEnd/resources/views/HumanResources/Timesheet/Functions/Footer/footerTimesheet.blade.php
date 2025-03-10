<script>
    var testing = [
        // {
        //     id: 1741599036136,
        //     title: "Party",
        //     start: "2025-03-10T16:00",
        //     end: "2025-03-14T17:30",
        // },
        // {
        //     id: '33',
        //     title: 'Live Music',
        //     start: '2025-03-08T13:30:00',
        // },
        // {
        //     id: '55',
        //     title: 'Live Music',
        //     start: '2025-03-08T14:30:00',
        // },
        // {
        //     id: '88',
        //     title: 'Live Music',
        //     start: '2025-03-08T15:30:00',
        // },
        // {
        //     id: '2313',
        //     title: 'Live Music',
        //     start: '2025-03-08T16:30:00',
        // },
        // {
        //     id: '123',
        //     title: 'Live Music',
        //     start: '2025-03-08T17:30:00',
        // },
        // {
        //     id: '423',
        //     title: 'Live Music',
        //     start: '2025-03-08T18:30:00',
        // },
        // {
        //     id: '873',
        //     title: 'Live Music',
        //     start: '2025-03-08T19:30:00',
        // },
        // {
        //     id: '99999',
        //     title: 'Habede Ea',
        //     start: '2025-03-08T20:30:00',
        //     url: 'https://google.com/'
        // },
    ];

    function getProject() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getNewProject") !!}',
            success: function(data) {
                if (data && Array.isArray(data)) {
                    $('#projectSelect').empty();
                    $('#projectSelect').append('<option disabled selected>Select a Project Code</option>');

                    data.forEach(function(project) {
                        $('#projectSelect').append('<option value="' + project.sys_ID + '">' + project.sys_Text + '</option>');
                    });
                } else {
                    console.log('Data project code not found.');
                }
            }, 
            error: function (textStatus, errorThrown) {
                console.log('Function getProject error: ', textStatus, errorThrown);
            },
        });
    }

    function getSite(project_RefID) {
        $("#siteLoading").show();
        $("#siteSelectContainer").hide();
        $("#siteSelect").prop("disabled", false);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getNewSite") !!}?project_code=' + project_RefID.value,
            success: function(data) {
                $("#siteLoading").hide();

                if (data && Array.isArray(data)) {
                    $('#siteSelect').empty();
                    $('#siteSelect').append('<option disabled selected>Select a Site Code</option>');

                    data.forEach(function(site) {
                        $('#siteSelect').append('<option value="' + site.Sys_ID + '">' + '(' + site.Code + ') ' + site.Name + '</option>');
                    });

                    $("#siteSelectContainer").show();
                } else {
                    console.log('Data site code not found.');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getSite error: ', textStatus, errorThrown);
            },
        })
    }

    function getPerson() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getPerson") !!}',
            success: function(data) {
                if (data && Array.isArray(data)) {
                    $('#onBehalfSelect').empty();
                    $('#onBehalfSelect').append('<option disabled selected>Select On Behalf</option>');

                    data.forEach(function(person) {
                        $('#onBehalfSelect').append('<option value="' + person.sys_ID + '">' + person.sys_Text + '</option>');
                    });
                } else {
                    console.log('Data not found.');
                }
            }, 
            error: function (textStatus, errorThrown) {
                console.log('Function getPerson error: ', textStatus, errorThrown);
            },
        });
    }

    function convertToISODateTime(startDate, fromHours) {
        // Mengubah startDate menjadi format YYYY-MM-DD
        var dateParts = startDate.split('/');
        var formattedDate = `${dateParts[2]}-${dateParts[0]}-${dateParts[1]}`;

        // Menggabungkan tanggal dengan jam
        return `${formattedDate}T${fromHours}`;
    }

    function saveEvent() {
        var uniqid      = Date.now();
        var startDate   = document.getElementById("eventStartDate");
        var finishDate  = document.getElementById("eventFinishDate");
        var fromHours   = document.getElementById("eventFromHours");
        var toHours     = document.getElementById("eventToHours");
        var projectID   = document.getElementById("projectSelect");
        var siteID      = document.getElementById("siteSelect");
        var personID    = document.getElementById("onBehalfSelect");
        var dailyAct    = document.getElementById("eventDailyAct");

        const dataObject = {
            id: uniqid,
            title: dailyAct.value,
            start: convertToISODateTime(startDate.value, fromHours.value),
            end: convertToISODateTime(finishDate.value, toHours.value)
        };

        testing.push(dataObject);

        $('#calendar').fullCalendar('renderEvent', dataObject, true);
        $('#eventModal').modal('hide');

        startDate.value = '';
        finishDate.value = '';
        fromHours.value = '';
        toHours.value = '';
        dailyAct.value = '';
    }

    $(document).ready(function () {
        $("#siteSelect").prop("disabled", true);
        $("#siteLoading").hide();

        getProject();
        getPerson();

        $('#fromHours').datetimepicker({
            use24hours: true,
            format: 'HH:mm'
        });

        $('#toHours').datetimepicker({
            use24hours: true,
            format: 'HH:mm'
        });

        $('#startDate').datetimepicker({
            format: 'L'
        });

        $('#finishDate').datetimepicker({
            format: 'L'
        });

        $('#calendar').fullCalendar({
            initialView: 'dayGridMonth',
            selectable: true,
            editable: true,
            height: 600,
            showNonCurrentDates: false,
            defaultView: 'month',
            yearColumns: 3,
            header: {
                left: 'prev,next, today',
                center: 'title',
                right: 'year,month,agendaWeek,agendaDay'
            },
            events: function(start, end, timezone, callback) {
                // This ensures the calendar always uses the current testing array
                callback(testing);
            },
            dayClick: function(date, event, view){
                console.log('dayClick', event);
            },
            select: function(resource, start, end){
                console.log('select', resource);
            },
            eventClick: function(info) {
                console.log('eventClick', info);

                // info.jsEvent.preventDefault(); // don't let the browser navigate

                // if (info.event.url) {
                //     window.open(info.event.url);
                // }
            },
        });
    });
</script>