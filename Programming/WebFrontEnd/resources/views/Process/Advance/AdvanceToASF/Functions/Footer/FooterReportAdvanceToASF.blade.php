<script>
    const projectID   = document.getElementById("project_id");
    const projectName = document.getElementById("project_name");
    const projectCode = document.getElementById("project_code");

    const siteID   = document.getElementById("site_id");
    const siteName = document.getElementById("site_name");
    const siteCode = document.getElementById("site_code");

    const requesterID   = document.getElementById("requester_id");
    const requesterName = document.getElementById("requester_name");

    const date = document.getElementById("reservation");

    // function advanceToASFStore() { 
    //     const formatData = { 
    //         project_id: projectID.value,
    //         project_name: projectName.value,
    //         project_code: projectCode.value,
    //         site_id: siteID.value,
    //         site_name: siteName.value,
    //         site_code: siteCode.value,
    //         requester_id: requesterID.value,
    //         requester_name: requesterName.value,
    //         date: date.value,
    //     }; 
         
    //     ShowLoading(); 
         
    //     $.ajaxSetup({ 
    //         headers: { 
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
    //         } 
    //     }); 
        
    //     $.ajax({ 
    //         type: 'POST', 
    //         data: formatData, 
    //         url: '{!! route("AdvanceRequest.ReportAdvanceToASFStore") !!}', 
    //         success: function(response) { 
    //             HideLoading(); 
                
    //             if (response.statusCode == 200) { 
    //                 let tbody = $('#testing tbody'); 
    //                 tbody.empty(); 
                    
    //                 let number = 0; 
                    
    //                 $.each(response.data, function(key, val) { 
    //                     number += 1; 
    //                     let row = `
    //                         <tr>
    //                             <td>${number}</td>
    //                             <td>${number}</td>
    //                             <td>${number}</td>
    //                             <td>${number}</td> 
    //                             <td>${number}</td>
    //                             <td>${number}</td>
    //                             <td>${number}</td>
    //                             <td>${number}</td>
    //                             <td>${number}</td>
    //                             <td>${number}</td>
    //                             <td>${number}</td>
    //                             <td>${number}</td>
    //                             <td>${number}</td>
    //                             <td>${number}</td>
    //                             <td>${number}</td>
    //                         </tr> 
    //                     `; 
                        
    //                     tbody.append(row); 
    //                 }); 
                        
    //                 $("#table_container").css("display", "block"); 
    //                 $('#testing').DataTable(); 
    //             } 
    //         }, 
    //         error: function(jqXHR, textStatus, errorThrown) { 
    //             HideLoading(); 
    //             ErrorNotif("Data Cancel Inputed"); 
    //         } 
    //     }); 
    // }

    // function advanceToASFStore() {
    //     const formatData = {
    //         project_id: projectID.value,
    //         project_name: projectName.value,
    //         project_code: projectCode.value,
    //         site_id: siteID.value,
    //         site_name: siteName.value,
    //         site_code: siteCode.value,
    //         requester_id: requesterID.value,
    //         requester_name: requesterName.value,
    //         date: date.value,
    //     };

    //     ShowLoading();

    //     if ($.fn.DataTable.isDataTable('#testing')) {
    //         $('#testing').DataTable().destroy();
    //     }

    //     $('#testing tbody').empty();

    //     $('#testing').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         destroy: true,
    //         info: true,
    //         paging: true,
    //         searching: true,
    //         lengthChange: true,
    //         pageLength: 10,
    //         ajax: {
    //             url: '{!! route("AdvanceRequest.ReportAdvanceToASFStore") !!}',
    //             type: 'POST',
    //             data: function (d) {
    //                 return $.extend({}, d, formatData);
    //             },
    //             complete: function () {
    //                 HideLoading();
    //                 $("#table_container").css("display", "block");
    //                 $('#testing').DataTable();
    //             },
    //             error: function (xhr, error, thrown) {
    //                 HideLoading();
    //                 ErrorNotif("Gagal mengambil data dari server.");
    //             }
    //         },
    //         columns: [
    //             {
    //                 data: null,
    //                 render: function (data, type, row, meta) {
    //                     console.log('data', data);
                        
    //                     return meta.row + meta.settings._iDisplayStart + 1;
    //                 },
    //                 className: "align-middle text-center"
    //             },
    //             {
    //                 data: 'ARF_Number',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             },
    //             {
    //                 data: 'ARF_Date',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             },
    //             {
    //                 data: 'ARF_Requester',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             },
    //             {
    //                 data: 'ARF_Total_IDR',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             },
    //             {
    //                 data: 'ARF_Number',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             },
    //             {
    //                 data: 'ARF_Number',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             },
    //             {
    //                 data: 'ARF_Number',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             },
    //             {
    //                 data: 'ARF_Number',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             },
    //             {
    //                 data: 'ARF_Number',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             },
    //             {
    //                 data: 'ARF_Number',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             },
    //             {
    //                 data: 'ARF_Number',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             },
    //             {
    //                 data: 'ARF_Number',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             },
    //             {
    //                 data: 'ARF_Number',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             },
    //             {
    //                 data: 'ARF_Number',
    //                 defaultContent: '-',
    //                 className: "align-middle"
    //             }
    //         ]
    //     });
    // }

    function resetForm() {
        $("#project_name").css('background-color', '#fff');
        $(`#project_name`).val("");
        $(`#project_id`).val("");
        $(`#project_code`).val("");

        $("#requester_name").css('background-color', '#fff');
        $(`#requester_name`).val("");
        $(`#requester_id`).val("");

        $("#site_name").css('background-color', '#fff');
        $(`#site_name`).val("");
        $(`#site_id`).val("");
        $(`#site_code`).val("");

        $("#reservation").css('background-color', '#fff');
        $(`#reservation`).val("");
    }

    function showLoadingAndSubmit(event) {
        event.preventDefault(); 

        document.getElementById('exportForm').submit();
        ShowLoading();

        setTimeout(function() {
            HideLoading();
        }, 2000);
    }

    function validationForm(params) {
        const isProjectIDNotEmpty = projectID.value.trim() !== '';

        if (isProjectIDNotEmpty) {
            // advanceToASFStore();
            ShowLoading();
            $('#reportAdvanceToASFForm').submit();
        } else {
            $("#project_name").css("border", "1px solid red");
            $("#project_message").show();
            return;
        }
    }

    $('#tableProjects').on('click', 'tbody tr', async function() {
        let sysId       = $(this).find('input[data-trigger="sys_id_project"]').val();
        let projectCode = $(this).find('td:nth-child(2)').text();
        let projectName = $(this).find('td:nth-child(3)').text();

        $("#project_id").val("");
        $("#project_code").val("");
        $("#project_name").val("");

        $("#project_name").css("border", "1px solid #ced4da");
        $("#project_message").hide();
        // $("#project_loading").css({"display":"block"});
        // $("#myProjectsTrigger").css({"display":"none"});

        $('#myProjects').modal('hide');

        // try {
        //     var checkWorkFlow = await checkingWorkflow(sysId, documentTypeID.value);

            $("#project_id").val(sysId);
            $("#project_code").val(projectCode);
            $("#project_name").val(`${projectCode} - ${projectName}`);
            $("#project_name").css({"background-color":"#e9ecef"});
            $("#myProjectsTrigger").prop("disabled", true);
            $("#myProjectsTrigger").css({"cursor":"not-allowed"});

            getSites(sysId);
            $("#mySitesTrigger").prop("disabled", false);
            $("#mySitesTrigger").css("cursor", "pointer");
        // } catch (error) {
        //     console.error('Error checking workflow:', error);

        //     $("#project_loading").css({"display":"none"});
        //     $("#myProjectsTrigger").css({"display":"block"});

        //     Swal.fire("Error", "Error Checking Workflow", "error");
        // }
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        let sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        let siteCode    = $(this).find('td:nth-child(2)').text();
        let siteName    = $(this).find('td:nth-child(3)').text();

        $("#site_id").val(sysId);
        $("#site_code").val(siteCode);
        $("#site_name").val(`${siteCode} - ${siteName}`);

        $("#site_name").css({"background-color":"#e9ecef"});
        $('#mySites').modal('hide');
    });

    $('#tableRequesters').on('click', 'tbody tr', function() {
        let sysId       = $(this).find('input[data-trigger="sys_id_requesters"]').val();
        let name        = $(this).find('td:nth-child(2)').text();
        let position    = $(this).find('td:nth-child(3)').text();

        $("#requester_id").val(sysId);
        $("#requester_name").val(`${position} - ${name}`);

        $("#requester_name").css({"background-color":"#e9ecef"});
        $('#myRequesters').modal('hide');
    });

    $(window).one('load', function(e) {
        $('#reservation').on('apply.daterangepicker', function(ev, picker) {
            let selectedDate = $(this).val();

            if (selectedDate) {
                $("#reservation").css({
                    "background-color": "#e9ecef",
                    "border": "1px solid #ced4da"
                });
            }
        });

        $("#mySitesTrigger").prop("disabled", true);
        $("#mySitesTrigger").css("cursor", "not-allowed");
    });
</script>