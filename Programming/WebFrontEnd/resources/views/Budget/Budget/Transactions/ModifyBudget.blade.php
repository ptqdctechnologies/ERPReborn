@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProject')
@include('getFunction.getProduct')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITTLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px; display: flex; align-items: center; font-size:15px; color:white;">
                    Modify Budget
                </div>
            </div>

            <!-- CONTENT -->
            <div class="card">
                <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Add New AFE (Approval For Expenditure)
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <form id="upload_form" method="post" enctype="multipart/form-data" action="{{ route('ModifyBudget') }}">
                                @csrf
                                    <div class="card-body py-3">
                                        <!-- BUDGET CODE -->
                                        <div class="row" style="margin-bottom: 1rem;">
                                            <label class="col-sm-2 col-form-label p-0">Budget Code</label>
                                            <div class="col-sm-3">
                                                <div class="row">
                                                    <div class="col-sm-4 p-0" style="display: flex;">
                                                        <div style="flex: 1;">
                                                            <input id="project_id" hidden name="project_id">
                                                            <input id="project_code" style="border-radius:0;" data-toggle="modal" data-target="#myProject" name="project_code" class="form-control myProject" readonly>
                                                        </div>
                                                        
                                                        <div>
                                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                                <a href="#" id="project_code_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-8 p-0">
                                                        <div class="input-group">
                                                            <input id="project_name" style="border-radius:0;" class="form-control" name="project_name" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SUB BUDGET CODE -->
                                        <div class="row" style="margin-bottom: 1rem;">
                                            <label class="col-sm-2 col-form-label p-0">Sub Budget Code</label>
                                            <div class="col-sm-3">
                                                <div class="row">
                                                    <div class="col-sm-4 p-0" style="display: flex;">
                                                        <div style="flex: 1;">
                                                            <input id="site_id" hidden name="site_id">
                                                            <input id="site_code" style="border-radius:0;" data-toggle="modal" data-target="#mySiteCode" name="site_code" class="form-control" readonly>
                                                        </div>
                                                        
                                                        <div>
                                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                                <a href="#" id="site_code_popup" data-toggle="modal" data-target="#mySiteCode" class="mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-8 p-0">
                                                        <div class="input-group">
                                                            <input id="site_name" style="border-radius:0;" class="form-control" name="site_name" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- REASON FOR MODIFY -->
                                        <div class="row" style="margin-bottom: 1rem;">
                                            <label for="reason_modify" class="col-sm-2 col-form-label p-0">Reason for Modify</label>
                                            <div class="col-sm-3 p-0">
                                                <div class="input-group">
                                                    <input id="reason_modify" style="border-radius:0;" class="form-control" name="reason_modify">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ADDITIONAL CO -->
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label p-0">Additional CO</label>
                                            <div class="col-sm-3 p-0" style="display: flex; gap: 16px;">
                                                <div>
                                                    <input type="radio" name="additional_co" value="yes">
                                                    <label>Yes</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="additional_co" value="no">
                                                    <label>No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- CURRENCY -->
                                        <div id="currency_field" class="row" style="margin-bottom: 1rem; margin-top: 1rem; display: none;">
                                            <label for="currency" class="col-sm-2 col-form-label p-0">Currency</label>
                                            <div class="col-sm-3 p-0">
                                                <div class="input-group">
                                                    <input id="currency" style="border-radius:0;" class="form-control" name="currency">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- VALUE CO ADDITIONAL -->
                                        <div id="value_co_additional_field" class="row" style="display: none;">
                                            <label for="value_co_additional" class="col-sm-2 col-form-label p-0">Value CO Additional</label>
                                            <div class="col-sm-3 p-0">
                                                <div class="input-group">
                                                    <input id="value_co_additional" style="border-radius:0;" class="form-control" name="value_co_additional">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ATTACHMENT FILES -->
                                        <div class="row" style="margin-top: 1rem;">
                                            <label class="col-sm-2 col-form-label p-0">File Attachment</label>
                                            <div class="col-sm-10 p-0 form-group">
                                                <div class="custom-file">
                                                    <div id="hidden_inputs"></div>
                                                    <input type="file" id="attachment_file" multiple>
                                                </div>

                                                <div class="card">
                                                    <!-- /.card-header -->
                                                    <div class="table-responsive p-0">
                                                        <table class="table table-bordered table-hover text-nowrap" id="file_table" style="margin-bottom: 0; display: none;">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2" style="vertical-align:middle;">No</th>
                                                                    <th rowspan="2" style="vertical-align:middle;">File Name</th>
                                                                    <th rowspan="2" style="vertical-align:middle;">Size</th>
                                                                    <th rowspan="2" style="vertical-align:middle;">Upload Date & Time</th>
                                                                    <th colspan="2" style="vertical-align:middle; text-align: center;">
                                                                        Action
                                                                        <tr>
                                                                            <th style="vertical-align:middle;">Preview</th>
                                                                            <th style="vertical-align:middle;">Delete</th>
                                                                        </tr>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="file_list">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SUBMIT -->
                                        <div class="row" style="display: flex; justify-content: flex-end;">
                                            <button class="btn btn-default btn-sm" type="submit" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt=""> Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
<!-- DISABLE SUD BUDGET CODE KETIKA BUDGET CODE BELUM DIPILIH -->
<script>
    $("#site_code").prop("disabled", true);
    $("#site_code_popup").prop("disabled", true);
</script>

<!-- BUDGET CODE -->
<script>
    $('#tableGetProject tbody').on('click', 'tr', function() {

        $("#myProject").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_budget' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#project_id").val(sys_id);
        $("#project_code").val(code);
        $("#project_name").val(name);
        $("#site_code").prop("disabled", false);
        $("#site_code_popup").prop("disabled", false);
        $("#site_id").val("");
        $("#site_code").val("");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getSite") !!}?project_code=' + sys_id,
            success: function(data) {

                var no = 1;
                var t = $('#tableGetSite').DataTable();
                t.clear();
                $.each(data, function(key, val) {
                    keys += 1;
                    t.row.add([
                        '<tbody><tr><input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                        '<td>' + val.Code + '</td>',
                        '<td>' + val.Name + '</td></tr></tbody>'
                    ]).draw();
                });
            }
        });
    });
</script>

<!-- SITE CODE -->
<script>
    $('#tableGetSite tbody').on('click', 'tr', function() {

        $("#mySiteCode").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_site' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#site_id").val(sys_id);
        $("#site_code").val(code);
        $("#site_name").val(name);

    });
</script>

<!-- FUNCTION KETIKA ADDITIONAL YES OR NO -->
<script>
    function toggleCurrencyField() {
        const additionalCORadios = document.getElementsByName('additional_co');
        const currencyField = document.getElementById('currency_field');
        const currencyInput = document.getElementById('currency');
        const valueCOAdditionalField = document.getElementById('value_co_additional_field');
        const valueCOAdditionalInput = document.getElementById('value_co_additional');
        
        additionalCORadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'yes' && this.checked) {
                    currencyField.style.display = 'flex';
                    valueCOAdditionalField.style.display = 'flex';
                } else {
                    currencyField.style.display = 'none';
                    currencyInput.value = '';

                    valueCOAdditionalField.style.display = 'none';
                    valueCOAdditionalInput.value = '';
                }
            });
        });
    }

    toggleCurrencyField();
</script>

<!-- FILE ATTACHMENT -->
<script>
    const fileInput = document.getElementById('attachment_file');
    const fileList = document.getElementById('file_list');
    const hiddenInputs = document.getElementById('hidden_inputs');
    const fileTable = document.getElementById('file_table');
    let fileIndex = 1;

    fileInput.addEventListener('change', (event) => {
        const files = event.target.files;

        Array.from(files).forEach(file => {
            const row = document.createElement('tr');

            const noCell = document.createElement('td');
            noCell.textContent = fileIndex++;
            row.appendChild(noCell);

            const fileNameCell = document.createElement('td');
            fileNameCell.textContent = file.name;
            row.appendChild(fileNameCell);

            const fileSizeCell = document.createElement('td');
            fileSizeCell.textContent = (file.size / 1024).toFixed(2) + ' KB';
            row.appendChild(fileSizeCell);

            const uploadDateCell = document.createElement('td');
            const currentDateTime = new Date().toLocaleString();
            uploadDateCell.textContent = currentDateTime;
            row.appendChild(uploadDateCell);

            const previewCell = document.createElement('td');
            const previewLink = document.createElement('a');
            previewLink.href = URL.createObjectURL(file);
            previewLink.target = '_blank';
            previewLink.className = 'btn btn-primary btn-sm';
            previewLink.textContent = 'Preview';
            previewCell.appendChild(previewLink);
            row.appendChild(previewCell);

            const deleteCell = document.createElement('td');
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.className = 'btn btn-danger btn-sm';
            deleteButton.onclick = (e) => {
                e.preventDefault();
                row.remove();
                hiddenInput.remove();
                updateTableVisibility();
            };
            deleteCell.appendChild(deleteButton);
            row.appendChild(deleteCell);

            fileList.appendChild(row);

            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'uploaded_files[]';
            hiddenInput.value = file;
            hiddenInputs.appendChild(hiddenInput);
        });

        updateTableVisibility();
    });
    
    function updateTableVisibility() {
        if (fileList.children.length === 0) {
            fileTable.style.display = 'none';
            resetFileInput();
        } else {
            fileTable.style.display = 'inline-table';
        }
    }

    function resetFileInput() {
        fileInput.value = ''; 
    }
</script>
@endsection