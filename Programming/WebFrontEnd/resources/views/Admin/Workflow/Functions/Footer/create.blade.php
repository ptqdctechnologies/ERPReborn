<style>
    /* ============================================================
       WORKFLOW BUILDER — STYLES
       ============================================================ */

    /* Container */
    #section_two_container {
        padding: 0 0.5rem;
    }

    /* Level card */
    .wf-level-card {
        background: #fff;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        margin-bottom: 0;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .06);
        overflow: hidden;
        width: 100%;
    }

    /* Card header bar */
    .wf-level-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 8px 12px;
        border-bottom: 1px solid #dee2e6;
        min-height: 44px;
    }

    /* Badge-style type labels */
    .wf-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .4px;
        text-transform: uppercase;
        padding: 4px 10px;
        border-radius: 4px;
        color: #fff;
    }

    .wf-badge-start {
        background-color: #17a2b8;
    }

    .wf-badge-approver {
        background-color: #007bff;
    }

    .wf-badge-final {
        background-color: #28a745;
    }

    /* Level sequence number */
    .wf-level-seq {
        font-size: 12px;
        color: #6c757d;
        margin-left: 8px;
        font-weight: 600;
    }

    /* Header left group */
    .wf-level-header-left {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* Header right action buttons */
    .wf-level-actions {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    /* Generic action button */
    .wf-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: #e9ecef;
        border: 1px solid #ced4da;
        border-radius: 3px;
        padding: 4px 8px;
        font-size: 12px;
        cursor: pointer;
        line-height: 1;
        color: #495057;
        user-select: none;
        transition: background-color .15s, border-color .15s;
        white-space: nowrap;
    }

    .wf-btn:hover:not(:disabled) {
        background-color: #d4d8db;
        border-color: #b1b7bc;
    }

    .wf-btn:disabled,
    .wf-btn.disabled {
        opacity: .4;
        cursor: not-allowed;
        pointer-events: none;
    }

    .wf-btn-danger {
        background-color: #fff0f0;
        border-color: #f5c6cb;
        color: #721c24;
    }

    .wf-btn-danger:hover:not(:disabled) {
        background-color: #f8d7da;
        border-color: #f1b0b7;
    }

    .wf-btn-add {
        background-color: #e8f4fd;
        border-color: #b8d9f5;
        color: #004085;
    }

    .wf-btn-add:hover:not(:disabled) {
        background-color: #cce5ff;
        border-color: #9acffa;
    }

    /* Person list */
    .wf-person-list {
        padding: 8px 12px;
    }

    .wf-person-item {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 5px 0;
        border-bottom: 1px solid #f1f3f5;
    }

    .wf-person-item:last-child {
        border-bottom: none;
    }

    .wf-person-seq {
        font-size: 11px;
        font-weight: 700;
        color: #6c757d;
        min-width: 22px;
        text-align: center;
    }

    .wf-person-id,
    .wf-person-name {
        flex: 1;
        font-size: 12px;
        padding: 3px 6px;
        border: 1px solid #dee2e6;
        border-radius: 3px;
        background: #f8f9fa;
        color: #495057;
        min-width: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .wf-person-id {
        max-width: 90px;
    }

    .wf-person-actions {
        display: flex;
        gap: 3px;
    }

    /* Flow connector arrow */
    .wf-connector {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 26px;
        color: #adb5bd;
        font-size: 16px;
        position: relative;
    }

    .wf-connector::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 1px;
        height: 26px;
        background: #dee2e6;
        z-index: 0;
    }

    .wf-connector i {
        position: relative;
        z-index: 1;
        background: #fff;
        padding: 0 4px;
    }

    /* Add-person footer row */
    .wf-person-add-row {
        padding: 6px 0 2px 0;
        border-top: 1px dashed #dee2e6;
        margin-top: 4px;
    }

    /* Responsive */
    @media (max-width: 576px) {
        .wf-person-id {
            display: none;
        }
    }
</style>

<script>
    /* ============================================================
       WORKFLOW BUILDER — DATA & LOGIC
       ============================================================ */

    let currentUidPerson = null;

    /* --- Unique ID generator --- */
    let _uidCounter = 100;
    function genUid() { return ++_uidCounter; }

    /* --- Initial data with stable UIDs --- */
    let dummyData = [
        {
            uid: genUid(),
            id: 0,
            type: 'start',
            person: [
                { uid: genUid(), id: 0, person_id: '', person_name: '' }
                // { uid: genUid(), id: 1, person_id: '', person_name: '' },
            ]
        },
        // {
        //     uid: genUid(),
        //     id: 1,
        //     type: 'approver1',
        //     person: [
        //         { uid: genUid(), id: 0, person_id: '', person_name: 'wisnu' },
        //         { uid: genUid(), id: 1, person_id: '', person_name: 'trenggono' }
        //     ]
        // },
        // {
        //     uid: genUid(),
        //     id: 2,
        //     type: 'approver2',
        //     person: [
        //         { uid: genUid(), id: 0, person_id: '', person_name: 'caca' },
        //         { uid: genUid(), id: 1, person_id: '', person_name: 'handika' }
        //     ]
        // },
        {
            uid: genUid(),
            id: 3,
            type: 'finalApprover',
            person: [
                { uid: genUid(), id: 0, person_id: '', person_name: '' }
            ]
        }
    ];

    function pickPerson(id) {
        currentUidPerson = id;
    }

    /* ============================================================
       HELPER – renumber approver types & level ids
       ============================================================ */
    function normalizeData() {
        let approverCount = 0;
        dummyData.forEach(function (level, idx) {
            if (level.type === 'start' || level.type === 'finalApprover') {
                level.id = idx;
                return;
            }
            approverCount++;
            level.type = 'approver' + approverCount;
            level.id = idx;
        });
    }

    /* ============================================================
       HELPER – build label text from type
       ============================================================ */
    function typeLabel(type, seqInArray) {
        if (type === 'start') return 'Start';
        if (type === 'finalApprover') return 'End';
        /* approverX → extract number for nice label */
        var match = type.match(/^approver(\d+)$/);
        if (match) return 'Next ' + match[1];
        return type;
    }

    /* ============================================================
       RENDER
       ============================================================ */
    function showDetail() {
        var $container = $('#section_two_container');
        $container.empty();

        var totalLevels = dummyData.length;

        dummyData.forEach(function (level, idx) {
            var isStart = level.type === 'start';
            var isFinal = level.type === 'finalApprover';
            var isApprover = !isStart && !isFinal;

            /* --- determine approver index for button disable rules --- */
            /* index after start = index 1. The one just before final = totalLevels-2 */
            var isDirectlyAfterStart = (idx === 1);
            var isDirectlyBeforeFinal = (idx === totalLevels - 2);

            /* --- Badge class --- */
            var badgeClass = isStart ? 'wf-badge-start' : (isFinal ? 'wf-badge-final' : 'wf-badge-approver');

            /* --- Action buttons (level) --- */
            var levelActionsHtml = '';

            if (isStart) {
                /* Only "add approver" button on start level */
                levelActionsHtml += '<button type="button" class="wf-btn wf-btn-add btn-add-approver">' +
                    '<i class="fas fa-plus mr-1"></i> Add Next Approver' +
                    '</button>';
            }

            if (isApprover) {
                var upDisabled = isDirectlyAfterStart ? 'disabled' : '';
                var downDisabled = isDirectlyBeforeFinal ? 'disabled' : '';

                levelActionsHtml +=
                    '<button type="button" class="wf-btn btn-move-level-up ' + upDisabled + '" ' +
                    'data-level-uid="' + level.uid + '" ' +
                    (upDisabled ? 'disabled' : '') + ' title="Naik">' +
                    '<i class="fas fa-chevron-up"></i>' +
                    '</button>' +
                    '<button type="button" class="wf-btn btn-move-level-down ' + downDisabled + '" ' +
                    'data-level-uid="' + level.uid + '" ' +
                    (downDisabled ? 'disabled' : '') + ' title="Turun">' +
                    '<i class="fas fa-chevron-down"></i>' +
                    '</button>' +
                    '<button type="button" class="wf-btn wf-btn-danger btn-delete-level" ' +
                    'data-level-uid="' + level.uid + '" title="Hapus Level">' +
                    '<i class="fas fa-trash-alt"></i>' +
                    '</button>';
            }

            /* --- Person rows --- */
            var personRowsHtml = '';
            var personCount = level.person.length;
            level.person.forEach(function (p, pIdx) {
                var pUpDisabled = (pIdx === 0) ? 'disabled' : '';
                var pDownDisabled = (pIdx === personCount - 1) ? 'disabled' : '';
                var pDeleteDisabled = (personCount <= 1) ? 'disabled' : '';

                personRowsHtml +=
                    '<div class="wf-person-item" data-person-uid="' + p.uid + '">' +
                    '<span class="wf-person-seq">' + (pIdx + 1) + '</span>' +
                    // '<span class="wf-person-id"  title="Person ID">'   + escapeHtml(p.person_id   || '—') + '</span>' +
                    '<span id="requester_container' + (p.uid) + '" class="input-group-text form-control" data-toggle="modal" data-target="#myRequesters" onclick="pickPerson(' + (p.uid) + ')" style="border-radius: 0; cursor: pointer; width: auto;">' +
                    '<i id="requester_icon' + (p.uid) + '" class="fas fa-gift"></i>' +
                    '</span>' +
                    '<span class="wf-person-name form-control" title="Person Name">' + escapeHtml(p.person_name || '') + '</span>' +
                    '<div class="wf-person-actions">' +
                    '<button type="button" class="wf-btn btn-move-person-up ' + pUpDisabled + '" ' +
                    'data-level-uid="' + level.uid + '" data-person-uid="' + p.uid + '" ' +
                    (pUpDisabled ? 'disabled' : '') + ' title="Naik">' +
                    '<i class="fas fa-chevron-up"></i>' +
                    '</button>' +
                    '<button type="button" class="wf-btn btn-move-person-down ' + pDownDisabled + '" ' +
                    'data-level-uid="' + level.uid + '" data-person-uid="' + p.uid + '" ' +
                    (pDownDisabled ? 'disabled' : '') + ' title="Turun">' +
                    '<i class="fas fa-chevron-down"></i>' +
                    '</button>' +
                    '<button type="button" class="wf-btn wf-btn-danger btn-delete-person ' + pDeleteDisabled + '" ' +
                    'data-level-uid="' + level.uid + '" data-person-uid="' + p.uid + '" ' +
                    (pDeleteDisabled ? 'disabled' : '') + ' title="Hapus Person">' +
                    '<i class="fas fa-times"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>';
            });

            /* --- Add person footer --- */
            var addPersonFooterHtml =
                '<div class="wf-person-add-row">' +
                '<button type="button" class="wf-btn wf-btn-add btn-add-person" ' +
                'data-level-uid="' + level.uid + '">' +
                '<i class="fas fa-plus mr-1"></i> Add Person' +
                '</button>' +
                '</div>';

            /* --- Full card HTML --- */
            var cardHtml =
                '<div class="col-12 wf-level-wrapper" data-level-uid="' + level.uid + '">' +
                '<div class="wf-level-card">' +
                '<div class="wf-level-header">' +
                '<div class="wf-level-header-left">' +
                '<span class="wf-badge ' + badgeClass + '">' +
                '<i class="fas ' + (isStart ? 'fa-play-circle' : (isFinal ? 'fa-flag-checkered' : 'fa-user-check')) + '"></i>' +
                typeLabel(level.type) +
                '</span>' +
                // '<span class="wf-level-seq">Level ' + (idx + 1) + '</span>' +
                '</div>' +
                '<div class="wf-level-actions">' +
                levelActionsHtml +
                '</div>' +
                '</div>' +
                '<div class="wf-person-list">' +
                (personRowsHtml || '<div class="text-muted" style="font-size:12px;padding:4px 0"></div>') +
                (!isFinal ? addPersonFooterHtml : '') +
                '</div>' +
                '</div>' +
                '</div>';

            /* Append card */
            $container.append(cardHtml);

            /* Append connector arrow (not after last) */
            if (idx < totalLevels - 1) {
                $container.append(
                    '<div class="col-12 wf-connector"><i class="fas fa-chevron-down"></i></div>'
                );
            }
        });
    }

    /* ============================================================
       ADD APPROVER
       ============================================================ */
    function addApprover() {
        /* Find position just before finalApprover */
        var finalIdx = dummyData.findIndex(function (l) { return l.type === 'finalApprover'; });
        if (finalIdx === -1) finalIdx = dummyData.length;

        /* Count existing approvers to name new one */
        var approverCount = dummyData.filter(function (l) {
            return l.type !== 'start' && l.type !== 'finalApprover';
        }).length;

        var newLevel = {
            uid: genUid(),
            id: 0,                          /* normalizeData will fix */
            type: 'approver' + (approverCount + 1),
            person: [
                { uid: genUid(), id: 0, person_id: '', person_name: '' },
                // { uid: genUid(), id: 1, person_id: '', person_name: '' }
            ]
        };

        dummyData.splice(finalIdx, 0, newLevel);
        normalizeData();
        showDetail();
    }

    /* ============================================================
       DELETE APPROVER
       ============================================================ */
    function deleteApprover(levelUid) {
        var idx = dummyData.findIndex(function (l) { return l.uid === levelUid; });
        if (idx === -1) return;

        var level = dummyData[idx];
        if (level.type === 'start' || level.type === 'finalApprover') return; /* guard */

        dummyData.splice(idx, 1);
        normalizeData();
        showDetail();
    }

    /* ============================================================
       MOVE LEVEL
       ============================================================ */
    function moveLevel(levelUid, direction) {
        var idx = dummyData.findIndex(function (l) { return l.uid === levelUid; });
        if (idx === -1) return;

        var level = dummyData[idx];
        if (level.type === 'start' || level.type === 'finalApprover') return; /* guard */

        var targetIdx = direction === 'up' ? idx - 1 : idx + 1;

        /* Boundary: cannot go past start (idx 0) or finalApprover (last) */
        if (targetIdx <= 0 || targetIdx >= dummyData.length - 1) return;
        if (dummyData[targetIdx].type === 'start' || dummyData[targetIdx].type === 'finalApprover') return;

        /* Swap */
        var temp = dummyData[targetIdx];
        dummyData[targetIdx] = dummyData[idx];
        dummyData[idx] = temp;

        normalizeData();
        showDetail();
    }

    /* ============================================================
       MOVE PERSON
       ============================================================ */
    function movePerson(levelUid, personUid, direction) {
        var level = dummyData.find(function (l) { return l.uid === levelUid; });
        if (!level) return;

        var pIdx = level.person.findIndex(function (p) { return p.uid === personUid; });
        if (pIdx === -1) return;

        var targetPIdx = direction === 'up' ? pIdx - 1 : pIdx + 1;
        if (targetPIdx < 0 || targetPIdx >= level.person.length) return;

        /* Swap, keeping uid+data intact */
        var temp = level.person[targetPIdx];
        level.person[targetPIdx] = level.person[pIdx];
        level.person[pIdx] = temp;

        showDetail();
    }

    /* ============================================================
       ADD PERSON
       ============================================================ */
    function addPerson(levelUid) {
        var level = dummyData.find(function (l) { return l.uid === levelUid; });
        if (!level) return;

        level.person.push({
            uid: genUid(),
            id: level.person.length,
            person_id: '',
            person_name: ''
        });

        showDetail();
    }

    /* ============================================================
       DELETE PERSON
       ============================================================ */
    function deletePerson(levelUid, personUid) {
        var level = dummyData.find(function (l) { return l.uid === levelUid; });
        if (!level) return;

        /* Guard: minimal harus ada 1 person per level */
        if (level.person.length <= 1) return;

        var pIdx = level.person.findIndex(function (p) { return p.uid === personUid; });
        if (pIdx === -1) return;

        level.person.splice(pIdx, 1);
        showDetail();
    }

    /* ============================================================
       UTILITY – escape HTML to prevent XSS
       ============================================================ */
    function escapeHtml(str) {
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function commentWorkflow() {
        const currentComment = document.getElementById('workflow_comment').value || "";
        const detailData = dummyData.map(item =>
            item.person.map(person => person.person_id)
        );

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
            inputValue: currentComment,
            showCloseButton: false,
            showCancelButton: true,
            focusConfirm: false,
            cancelButtonText: '<span style="color:black;"> Cancel </span>',
            confirmButtonText: '<span style="color:black;"> OK </span>',
            cancelButtonColor: '#DDDAD0',
            confirmButtonColor: '#DDDAD0',
            reverseButtons: true
        }).then((result) => {
            if ('value' in result) {
                $("#workflow_comment").val(result.value);
                $("#workflow_detail_data").val(JSON.stringify(detailData));

                document.getElementById('workflowForm').requestSubmit();
            }
        });

        $("#workflow_summary_modal").modal('toggle');
    }

    /* ============================================================
       DELEGATED EVENT HANDLERS
       ============================================================ */
    /* Add approver — only on start level */
    $('#section_two_container').on('click', '.btn-add-approver', function () {
        addApprover();
    });

    /* Delete level */
    $('#section_two_container').on('click', '.btn-delete-level', function () {
        var uid = parseInt($(this).data('level-uid'), 10);
        deleteApprover(uid);
    });

    /* Move level up */
    $('#section_two_container').on('click', '.btn-move-level-up', function () {
        var uid = parseInt($(this).data('level-uid'), 10);
        moveLevel(uid, 'up');
    });

    /* Move level down */
    $('#section_two_container').on('click', '.btn-move-level-down', function () {
        var uid = parseInt($(this).data('level-uid'), 10);
        moveLevel(uid, 'down');
    });

    /* Move person up */
    $('#section_two_container').on('click', '.btn-move-person-up', function () {
        var levelUid = parseInt($(this).data('level-uid'), 10);
        var personUid = parseInt($(this).data('person-uid'), 10);
        movePerson(levelUid, personUid, 'up');
    });

    /* Move person down */
    $('#section_two_container').on('click', '.btn-move-person-down', function () {
        var levelUid = parseInt($(this).data('level-uid'), 10);
        var personUid = parseInt($(this).data('person-uid'), 10);
        movePerson(levelUid, personUid, 'down');
    });

    /* Add person */
    $('#section_two_container').on('click', '.btn-add-person', function () {
        var levelUid = parseInt($(this).data('level-uid'), 10);
        addPerson(levelUid);
    });

    /* Delete person */
    $('#section_two_container').on('click', '.btn-delete-person', function () {
        var levelUid = parseInt($(this).data('level-uid'), 10);
        var personUid = parseInt($(this).data('person-uid'), 10);
        deletePerson(levelUid, personUid);
    });

    /* ============================================================
       EXISTING HANDLERS — preserved unchanged
       ============================================================ */
    function fillTransactionType(cursor, dataTarget) {
        $("#transaction_type_container").css({ "cursor": cursor });
        $('#transaction_type_container').attr({
            'data-toggle': 'modal',
            'data-target': dataTarget
        });
    }

    $('#budget_code_list_table').on('click', 'tbody tr', function () {
        const table = $('#budget_code_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const code = dataRow.code;
            const name = dataRow.name;

            $("#budget_preview").val(`${code} - ${name}`);
            $("#budget_id").val(id);
            $("#budget_name").val(name);
            $("#budget_code").val(code);

            $('#budget_preview').css("background-color", "#e9ecef");

            fillTransactionType('pointer', '#transaction_type_modal');

            ErrorHandler.hideErrorInputMessage("#budget_preview", "#budget_message");
        }

        $("#budget_code_modal").modal('toggle');
    });

    $('#transaction_type_list_table').on('click', 'tbody tr', function () {
        const table = $('#transaction_type_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const name = dataRow.name;

            $('#transaction_type_preview').val(name);
            $('#transaction_type_id').val(id);
            $('#transaction_type_name').val(name);

            $('#transaction_type_preview').css("background-color", "#e9ecef");

            showDetail();
            getRequesters();

            ErrorHandler.hideErrorInputMessage("#transaction_type_preview", "#transaction_type_message");
        }

        $("#transaction_type_modal").modal('toggle');
    });

    $('#tableRequesters').on('click', 'tbody tr', function () {
        const table = $('#tableRequesters').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const result = dummyData
                .flatMap(item => item.person)
                .find(person => person.uid === currentUidPerson);

            result.person_id = dataRow.sys_ID || '';
            result.person_name = dataRow.personName || '';

            showDetail();
        }

        $("#myRequesters").modal('toggle');
    });

    $('#workflowForm').on('submit', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("Workflow.store") !!}',
            data: $(this).serialize(),
            beforeSend: function () {
                Utils.showLoading();
            },
            success: function (response) {
                Utils.hideLoading();

                if (response.status == 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:#0046FF;font-weight:bold;">' + response.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        cancelForm("{{ route('Workflow.index') }}");
                    });
                } else {
                    ErrorNotif("Create Workflow Failed");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                Utils.hideLoading();

                // if (jqXHR.status === 422) {
                //     let errors = jqXHR.responseJSON.errors;

                //     $.each(errors, function (key, value) {
                //         // console.log(key + ': ' + value[0]);

                //         if (formList[key]) {
                //             ErrorHandler.showErrorInputMessage(formList[key].component, formList[key].containerMessageId, formList[key].messageId, value[0]);
                //         }
                //     });
                // }
            }
        });
    });

    $(document).ready(function () {
        getTransactionType();

        fillTransactionType('not-allowed', '#');
        $("#transaction_type_container").css({ "cursor": "not-allowed" });
        $('#transaction_type_container').attr({
            'data-toggle': 'modal',
            'data-target': '#'
        });
    });
</script>