<!-- GET ADVANCE -->
<div id="myGetModalAdvance" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose BRF Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap DefaultFeatures" id="BRFNumber">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <!-- <th>Budget Name</th> -->
                                            <th>Sub Budget Code</th>
                                            <!-- <th>Sub Budget Name</th> -->
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalAdvance">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                                        Loading...
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="errorModalAdvanceMessageContainerSecond">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalAdvanceMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".errorModalAdvanceMessageContainerSecond").hide();

    function getModalAdvance(project_id, site_id) {
        $('#tableGetModalAdvance tbody').empty();
        $(".loadingGetModalAdvance").show();
        $(".errorModalAdvanceMessageContainerSecond").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getAdvance") !!}?project_id=' + project_id + '&site_id=' + site_id,
            success: function(datas) {
                const data = [
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000196",
                        combinedBudgetName: "XL Microcell 2007",
                        combinedBudgetSectionCode: "235",
                        combinedBudgetSectionName: "Ampang Kuranji - Padang",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000208",
                        orderSequence: 101,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000107,
                        sys_PID: 76000000000107,
                        sys_RPK: 107,
                        sys_SID: 10076000000000108,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000196",
                        combinedBudgetName: "XL Microcell 2008",
                        combinedBudgetSectionCode: "235",
                        combinedBudgetSectionName: "Lubuk Begalung - Padang",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000209",
                        orderSequence: 102,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000108,
                        sys_PID: 76000000000108,
                        sys_RPK: 108,
                        sys_SID: 10076000000000109,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000198",
                        combinedBudgetName: "XL Microcell 2009",
                        combinedBudgetSectionCode: "237",
                        combinedBudgetSectionName: "Pauh - Padang",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000210",
                        orderSequence: 103,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000109,
                        sys_PID: 76000000000109,
                        sys_RPK: 109,
                        sys_SID: 10076000000000110,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000199",
                        combinedBudgetName: "XL Microcell 2010",
                        combinedBudgetSectionCode: "238",
                        combinedBudgetSectionName: "Padang Utara",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000211",
                        orderSequence: 104,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000110,
                        sys_PID: 76000000000110,
                        sys_RPK: 110,
                        sys_SID: 10076000000000111,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000200",
                        combinedBudgetName: "XL Microcell 2011",
                        combinedBudgetSectionCode: "239",
                        combinedBudgetSectionName: "Padang Barat",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000212",
                        orderSequence: 105,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000111,
                        sys_PID: 76000000000111,
                        sys_RPK: 111,
                        sys_SID: 10076000000000112,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000201",
                        combinedBudgetName: "XL Microcell 2012",
                        combinedBudgetSectionCode: "240",
                        combinedBudgetSectionName: "Padang Selatan",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000213",
                        orderSequence: 106,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000112,
                        sys_PID: 76000000000112,
                        sys_RPK: 112,
                        sys_SID: 10076000000000113,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000202",
                        combinedBudgetName: "XL Microcell 2013",
                        combinedBudgetSectionCode: "241",
                        combinedBudgetSectionName: "Padang Timur",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000214",
                        orderSequence: 107,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000113,
                        sys_PID: 76000000000113,
                        sys_RPK: 113,
                        sys_SID: 10076000000000114,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000203",
                        combinedBudgetName: "XL Microcell 2014",
                        combinedBudgetSectionCode: "242",
                        combinedBudgetSectionName: "Nanggalo - Padang",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000215",
                        orderSequence: 108,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000114,
                        sys_PID: 76000000000114,
                        sys_RPK: 114,
                        sys_SID: 10076000000000115,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000204",
                        combinedBudgetName: "XL Microcell 2015",
                        combinedBudgetSectionCode: "243",
                        combinedBudgetSectionName: "Kuranji - Padang",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000216",
                        orderSequence: 109,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000115,
                        sys_PID: 76000000000115,
                        sys_RPK: 115,
                        sys_SID: 10076000000000116,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000205",
                        combinedBudgetName: "XL Microcell 2016",
                        combinedBudgetSectionCode: "244",
                        combinedBudgetSectionName: "Koto Tangah - Padang",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000217",
                        orderSequence: 110,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000116,
                        sys_PID: 76000000000116,
                        sys_RPK: 116,
                        sys_SID: 10076000000000117,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000206",
                        combinedBudgetName: "XL Microcell 2017",
                        combinedBudgetSectionCode: "245",
                        combinedBudgetSectionName: "Bungus Teluk Kabung - Padang",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000218",
                        orderSequence: 111,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000117,
                        sys_PID: 76000000000117,
                        sys_RPK: 117,
                        sys_SID: 10076000000000118,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000207",
                        combinedBudgetName: "XL Microcell 2018",
                        combinedBudgetSectionCode: "246",
                        combinedBudgetSectionName: "Lubuk Kilangan - Padang",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000219",
                        orderSequence: 112,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000118,
                        sys_PID: 76000000000118,
                        sys_RPK: 118,
                        sys_SID: 10076000000000119,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000208",
                        combinedBudgetName: "XL Microcell 2019",
                        combinedBudgetSectionCode: "247",
                        combinedBudgetSectionName: "Pauh Timur - Padang",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000220",
                        orderSequence: 113,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000119,
                        sys_PID: 76000000000119,
                        sys_RPK: 119,
                        sys_SID: 10076000000000120,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000209",
                        combinedBudgetName: "XL Microcell 2020",
                        combinedBudgetSectionCode: "248",
                        combinedBudgetSectionName: "Padang Barat Selatan",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000221",
                        orderSequence: 114,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000120,
                        sys_PID: 76000000000120,
                        sys_RPK: 120,
                        sys_SID: 10076000000000121,
                        version: 0
                    },
                    {
                        annotation: null,
                        beneficiaryBankAccountName: "BCA 2173108214 a.n. PT QDC Technologies",
                        beneficiaryBankAccount_RefID: 167000000000003,
                        beneficiaryWorkerJobsPosition_RefID: 164000000000017,
                        beneficiaryWorkerName: "Ahmad Faiz Haems Muda",
                        businessDocumentVersion_RefID: 75000001493332,
                        businessDocument_RefID: 74000000020439,
                        combinedBudgetCode: "Q000210",
                        combinedBudgetName: "XL Microcell 2021",
                        combinedBudgetSectionCode: "249",
                        combinedBudgetSectionName: "Padang Utara Timur",
                        combinedBudgetSection_RefID: null,
                        combinedBudget_RefID: null,
                        documentDateTimeTZ: "2023-05-24T00:00:00+07:00",
                        documentNumber: "BRF-24000222",
                        orderSequence: 115,
                        requesterWorkerJobsPosition_RefID: 164000000000023,
                        requesterWorkerName: "Aldi Mulyadi",
                        sys_BaseBranch_RefID: 11000000000002,
                        sys_BaseCurrency_RefID: 62000000000001,
                        sys_Branch_RefID: 11000000000004,
                        sys_ID: 76000000000121,
                        sys_PID: 76000000000121,
                        sys_RPK: 121,
                        sys_SID: 10076000000000122,
                        version: 0
                    }
                ];
                
                $(".loadingGetModalAdvance").hide();

                var no = 1;
                var table = $('#tableGetModalAdvance').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_modal_advance' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_modal_advance" type="hidden">' + no++,
                            val.documentNumber || '-',
                            val.combinedBudgetCode || '-',
                            // val.combinedBudgetName || '-',
                            val.combinedBudgetSectionCode || '-',
                            // val.combinedBudgetSectionName || '-',
                        ]).draw();
                    });

                    $("#tableGetModalAdvance_length").show();
                    $("#tableGetModalAdvance_filter").show();
                    $("#tableGetModalAdvance_info").show();
                    $("#tableGetModalAdvance_paginate").show();
                } else {
                    $(".errorModalAdvanceMessageContainerSecond").show();
                    $("#errorModalAdvanceMessageSecond").text(`Data not found.`);

                    $("#tableGetModalAdvance_length").hide();
                    $("#tableGetModalAdvance_filter").hide();
                    $("#tableGetModalAdvance_info").hide();
                    $("#tableGetModalAdvance_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetModalAdvance tbody').empty();
                $(".loadingGetModalAdvance").hide();
                $(".errorModalAdvanceMessageContainerSecond").show();
                $("#errorModalAdvanceMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $('#BRFNumber').on('draw.dt', function () {
        const filterLabel = document.querySelector('#BRFNumber_filter label');
        console.log('filterLabel', filterLabel);

        if (filterLabel) {
            filterLabel.childNodes[0].nodeValue = 'Search by trano, budget, sub budget:';
        }
    });

    $(window).one('load', function(e) {
        getModalAdvance();
    });

    $('#tableGetModalAdvance').on('click', 'tbody tr', function() {
        var sysId           = $(this).find('input[data-trigger="sys_id_modal_advance"]').val();
        var trano           = $(this).find('td:nth-child(2)').text();
        var budgetCode      = $(this).find('td:nth-child(3)').text();
        var budgetName      = $(this).find('td:nth-child(4)').text();
        var subBudgetCode   = $(this).find('td:nth-child(5)').text();
        var subBudgetName   = $(this).find('td:nth-child(6)').text();

        $("#modal_advance_id").val(sysId);
        $("#modal_advance_document_number").val(trano);
        $("#modal_advance_budget_code").val(trano);

        adjustInputSize(document.getElementById("modal_advance_document_number"), "string");

        $('#myGetModalAdvance').modal('hide');
    });
</script>