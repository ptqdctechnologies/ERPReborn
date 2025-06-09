<script>
    var dataProject = [];
    var triggerUpdateByID = '';
    var siteUpdateID = '';
    var dataEvents = [
        // {
        //     id: 1741599036136,
        //     title: "Party",
        //     start: "2025-03-20T14:30:00",
        //     end: "2025-03-20T17:30:00",
        //     allDay: false,
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
    var dataDetail = [];

    function getAuthorized() {
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
                    dataProject = data;

                    $('#authorizedSelect').empty();
                    $('#authorizedSelect').append('<option disabled selected>Select an Authorized</option>');

                    data.forEach(function(project) {
                        $('#authorizedSelect').append('<option value="' + project.sys_ID + '">' + project.sys_Text + '</option>');
                    });
                } else {
                    console.log('Data project code not found.');
                }

                $("#authorizedSelectContainer").show();
                $("#authorizedLoading").hide();
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getProject error: ', textStatus, errorThrown);
            },
        });
    }

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
                    dataProject = data;

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

                if (triggerUpdateByID) {
                    document.getElementById("siteSelect").value = siteUpdateID;

                    $('#siteSelect').empty();
                    $('#siteSelect').append('<option disabled selected>Select a Site Code</option>');

                    data.forEach(function(site) {
                        $('#siteSelect').append('<option value="' + site.Sys_ID + '">' + '(' + site.Code + ') ' + site.Name + '</option>');
                    });

                    $("#siteSelect").prop("disabled", false);
                    $("#siteSelect").val(siteUpdateID).change();
                    $("#siteSelectContainer").show();
                } else {
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
                console.log('data', data);
                
                if (data && Array.isArray(data)) {
                    $('#onBehalfSelect').empty();
                    $('#onBehalfSelect').append('<option disabled selected>Select On Behalf</option>');

                    data.forEach(function(person) {
                        $('#onBehalfSelect').append('<option value="' + person.sys_ID + '">' + person.sys_Text + '</option>');
                    });
                } else {
                    console.log('Data not found.');
                }

                $("#onBehalfSelectContainer").show();
                $("#onBehalfLoading").hide();
            }, 
            error: function (textStatus, errorThrown) {
                console.log('Function getPerson error: ', textStatus, errorThrown);
            },
        });
    }

    function saveCombinedBudget(params) {
        $("#var_combinedBudget_RefID").val(params.value);
    }

    function convertToISODateTime(startDate, fromHours) {
        // Mengubah startDate menjadi format YYYY-MM-DD
        var dateParts = startDate.split('/');
        var formattedDate = `${dateParts[2]}-${dateParts[0]}-${dateParts[1]}`;

        // Menggabungkan tanggal dengan jam
        return `${formattedDate}T${fromHours}`;
    }

    function convertToISODateTimeNew(dateStr, timeStr) {
        // Pecah tanggal dari format MM/DD/YYYY
        const [month, day, year] = dateStr.split('/');
        
        // Gabungkan ke format YYYY-DD-MM
        const formattedDate = `${year}-${month}-${day}`;

        // Jika ada jam, tambahkan waktu juga
        // if (timeStr) {
        //     return `${formattedDate}T${timeStr}`;
        // }

        return formattedDate;
    }

    function resetForm(params) {
        document.getElementById("eventStartDate").value         = params.startDate;
        document.getElementById("eventFinishDate").value        = params.finishDate;
        document.getElementById("eventFromHours").value         = params.fromHours;
        document.getElementById("eventToHours").value           = params.toHours;
        document.getElementById("eventDailyAct").value          = params.dailyAct;
        document.getElementById("eventModalLabel").innerHTML    = params.title;
        document.getElementById("eventModalSubmit").innerHTML   = params.submit;
        document.getElementById("projectSelect").value          = params.projectID;
        document.getElementById("siteSelect").value             = params.siteID;

        $("#projectSelect").val(params.changeProjectID).change();
        $("#siteSelect").prop("disabled", params.changeDisabledSiteID);
        $("#siteSelect").val(params.changeSiteID).change();
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
        var findProject = dataProject.find((el) => el.sys_ID == projectID.value);

        const dataObject = {
            title: `(${findProject.code}) ${dailyAct.value}`,
            start: convertToISODateTime(startDate.value, fromHours.value),
            end: convertToISODateTime(finishDate.value, toHours.value),
            originData: {
                startDate: startDate.value,
                finishDate: finishDate.value,
                fromHours: fromHours.value,
                toHours: toHours.value,
                projectID: projectID.value,
                siteID: siteID.value,
                personID: personID.value,
                dailyAct: dailyAct.value
            }
        };

        const dataObjectDetail = {
            entities: {
                combinedBudgetSection_RefID: siteID.value,
                startDateTimeTZ: `${convertToISODateTimeNew(startDate.value)} ${fromHours.value}:00 +07`,
                finishDateTimeTZ: `${convertToISODateTimeNew(finishDate.value)} ${toHours.value}:00 +07`,
                activity: dailyAct.value,
                colorText: null,
                colorBackground: null
            }
        };

        // OLD
        // const dataObjectDetail = {
        //     // HEADER
        //     documentNumber: null,
        //     person_RefID: personID.value,
        //     startDateTimeTZ: `${convertToISODateTimeNew(startDate.value)} ${fromHours.value}:00 +07`,
        //     finishDateTimeTZ: `${convertToISODateTimeNew(finishDate.value)} ${toHours.value}:00 +07`,
        //     project_RefID: projectID.value,
        //     colorText: null,
        //     colorBackground: null,
        //     // DETAIL
        //     personWorkTimeSheet_RefID: null,
        //     projectSectionItem_RefID: null,
        //     startDateTimeTZ: `${convertToISODateTimeNew(startDate.value)} ${fromHours.value}:00 +07`,
        //     finishDateTimeTZ: `${convertToISODateTimeNew(finishDate.value)} ${toHours.value}:00 +07`,
        //     activity: dailyAct.value,
        //     colorText: null,
        //     colorBackground: null,
        // };

        if (triggerUpdateByID) {
            var findIndex       = dataEvents.findIndex((val) => val.id == triggerUpdateByID);
            var findIndexDetail = dataDetail.findIndex((val) => val.id == triggerUpdateByID);

            dataObject.id = triggerUpdateByID;
            dataObjectDetail.id = triggerUpdateByID;

            $('#calendar').fullCalendar('removeEvents', triggerUpdateByID);

            dataEvents[findIndex] = dataObject;
            dataDetail[findIndex] = dataObjectDetail;

            $('#calendar').fullCalendar('renderEvent', dataObject, true);
        } else {
            dataObject.id = uniqid;
            dataObjectDetail.id = uniqid;

            dataEvents.push(dataObject);
            dataDetail.push(dataObjectDetail);

            $('#calendar').fullCalendar('renderEvent', dataObject, true);
        }

        $("#timesheetDetail").val(JSON.stringify(dataDetail));

        $('#eventModal').modal('hide');

        resetForm({
            startDate: '',
            finishDate: '',
            fromHours: '',
            toHours: '',
            dailyAct: '',
            title: 'Add Event',
            submit: 'Add',
            projectID: '',
            siteID: '',
            changeProjectID: 'Select a Project Code',
            changeDisabledSiteID: true,
            changeSiteID: 'Select a Site Code',
            changePersonID: 'Select On Behalf'
        });
    }

    function SelectWorkFlow(formatData) {
        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success btn-sm',
            cancelButtonClass: 'btn btn-danger btn-sm',
            buttonsStyling: true,
        });

        swalWithBootstrapButtons.fire({
            title: 'Comment',
            text: "Please write your comment here",
            type: 'question',
            input: 'textarea',
            showCloseButton: false,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: '<span style="color:black;"> OK </span>',
            confirmButtonColor: '#4B586A',
            confirmButtonColor: '#e9ecef',
            reverseButtons: true
        }).then((result) => {
            ShowLoading();
            TimesheetStore({...formatData, comment: result.value});
        });
    }

    function TimesheetStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("Timesheet.store") }}',
            success: function(res) {
                HideLoading();

                if (res.status === 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + res.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        ShowLoading();
                        window.location.href = '/Timesheet';
                    });
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error', jqXHR, textStatus, errorThrown);
            }
        });
    }

    $("#FormSubmitTimesheet").on("submit", function(e) {
        e.preventDefault();

        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success btn-sm',
            cancelButtonClass: 'btn btn-danger btn-sm',
            buttonsStyling: true,
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Save this data?",
            type: 'question',
            showCancelButton: true,
            confirmButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/save.png") }}" width="13" alt=""><span style="color:black;">Yes, save it </span>',
            cancelButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/cancel.png") }}" width="13" alt=""><span style="color:black;"> No, cancel </span>',
            confirmButtonColor: '#e9ecef',
            cancelButtonColor: '#e9ecef',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                var action = $(this).attr("action");
                var method = $(this).attr("method");
                var form_data = new FormData($(this)[0]);

                ShowLoading();

                $.ajax({
                    url: action,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: method,
                    success: function(response) {
                        if (response.message == "WorkflowError") {
                            HideLoading();
                            $("#submitTimesheet").prop("disabled", false);

                            CancelNotif("You don't have access", '/Timesheet');
                        } else if (response.message == "MoreThanOne") {
                            HideLoading();

                            $('#getWorkFlow').modal('toggle');

                            var t = $('#tableGetWorkFlow').DataTable();
                            t.clear();
                            $.each(response.data, function(key, val) {
                                t.row.add([
                                    '<td><span data-dismiss="modal" onclick="SelectWorkFlow(\'' + val.Sys_ID + '\', \'' + val.NextApprover_RefID + '\', \'' + response.approverEntity_RefID + '\', \'' + response.documentTypeID + '\');"><img src="{{ asset("AdminLTE-master/dist/img/add.png") }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></span></td>',
                                    '<td style="border:1px solid #e9ecef;">' + val.FullApproverPath + '</td></tr></tbody>'
                                ]).draw();
                            });
                        } else {
                            const formatData = {
                                workFlowPath_RefID: response.workFlowPath_RefID, 
                                nextApprover: response.nextApprover_RefID, 
                                approverEntity: response.approverEntity_RefID, 
                                documentTypeID: response.documentTypeID,
                                storeData: response.storeData
                            };

                            HideLoading();
                            SelectWorkFlow(formatData);
                        }
                    },
                    error: function(response) {
                        console.log('response error', response);
                        
                        HideLoading();
                        $("#submitTimesheet").prop("disabled", false);
                        CancelNotif("You don't have access", '/Timesheet');
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                HideLoading();
                CancelNotif("Data Cancel Inputed", '/Timesheet');
            }
        });
    });

    $(document).ready(function () {
        $("#onBehalfSelectContainer").hide();
        $("#authorizedSelectContainer").hide();

        $("#siteSelect").prop("disabled", true);
        $("#siteLoading").hide();

        getAuthorized();
        getProject();
        getPerson();
        getDocumentType("Timesheet Form");

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
            editable: false,
            height: 600,
            showNonCurrentDates: false,
            displayEventEnd: true,
            defaultView: 'month',
            yearColumns: 3,
            eventLimit: true,
            eventTextColor: '#F6F8D5',
            eventBorderColor: '',
            eventBackgroundColor: '#4F959D',
            timeFormat: 'HH:mm',
            header: {
                left: 'prev,next, today',
                center: 'title',
                right: 'year,month,agendaWeek,agendaDay'
            },
            events: function(start, end, timezone, callback) {
                const visibleEvents = dataEvents.filter(event => {
                    const eventStart = new Date(event.start);
                    const eventEnd = new Date(event.end || event.start);
                    return eventStart <= end && eventEnd >= start;
                });
                
                callback(visibleEvents);
                // This ensures the calendar always uses the current dataEvents array
                // callback(dataEvents);
            },
            // dayClick: function(date, event, view){
            //     console.log('dayClick', event);
            // },
            select: function(resource, start, end){
                // console.log('select', resource);
                $('#eventModal').modal('show');
            },
            eventClick: function(info) {
                const { originData } = info;

                triggerUpdateByID = info.id;
                siteUpdateID = originData.siteID;

                resetForm({
                    startDate: originData.startDate,
                    finishDate: originData.finishDate,
                    fromHours: originData.fromHours,
                    toHours: originData.toHours,
                    dailyAct: originData.dailyAct,
                    title: 'Edit Event',
                    submit: 'Edit',
                    projectID: originData.projectID,
                    siteID: originData.siteID,
                    changeProjectID: originData.projectID,
                    changeDisabledSiteID: false,
                    changeSiteID: originData.siteID,
                    changePersonID: originData.personID
                });

                $('#eventModal').modal('show');
            },
            lazyFetching: true,
        });

        $('#eventModal').on('hidden.bs.modal', function (event) {
            triggerUpdateByID = '';

            resetForm({
                startDate: '',
                finishDate: '',
                fromHours: '',
                toHours: '',
                dailyAct: '',
                title: 'Add Event',
                submit: 'Add',
                projectID: '',
                siteID: '',
                changeProjectID: 'Select a Project Code',
                changeDisabledSiteID: true,
                changeSiteID: 'Select a Site Code',
                changePersonID: 'Select On Behalf'
            });
        });
    });
</script>