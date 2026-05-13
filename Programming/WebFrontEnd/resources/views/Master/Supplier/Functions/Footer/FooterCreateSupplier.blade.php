<script>
    let countryCodeTemp = null;
    let specializationData = [];
    const containerMultipleSpecialization = document.getElementById("multiple-specialization");
    const formList = {
        supplier_name: {
            component: '#supplier_name',
            containerMessageId: '#supplierNameMessage',
            messageId: '#supplierNameMessageText'
        },
        phone_number: {
            component: '#phone_number',
            containerMessageId: '#phoneNumberMessage',
            messageId: '#phoneNumberMessageText'
        },
        email: {
            component: '#email',
            containerMessageId: '#emailMessage',
            messageId: '#emailMessageText'
        },
        country_name: {
            component: '#country_name',
            containerMessageId: '#countryMessage',
            messageId: '#countryMessageText'
        },
        province_name: {
            component: '#province_name',
            containerMessageId: '#provinceMessage',
            messageId: '#provinceMessageText'
        },
        city_name: {
            component: '#city_name',
            containerMessageId: '#cityMessage',
            messageId: '#cityMessageText'
        },
        address: {
            component: '#address',
            containerMessageId: '#addressMessage',
            messageId: '#addressMessageText'
        },
        contact_person: {
            component: '#contact_person',
            containerMessageId: '#contactPersonMessage',
            messageId: '#contactPersonMessageText'
        },
        bank_id: {
            component: '#bank_name',
            containerMessageId: '#bankNameMessage',
            messageId: '#bankNameMessageText'
        },
        account_number: {
            component: '#account_number',
            containerMessageId: '#accountNumberMessage',
            messageId: '#accountNumberMessageText'
        },
        account_name: {
            component: '#account_name',
            containerMessageId: '#accountNameMessage',
            messageId: '#accountNameMessageText'
        },
        remark: {
            component: '#remark',
            containerMessageId: '#remarkMessage',
            messageId: '#remarkMessageText'
        },
        legal_entity_value: {
            component: '#legal_entity',
            containerMessageId: '#legalEntityMessage',
            messageId: '#legalEntityMessageText'
        },
        category: {
            component: '#category',
            containerMessageId: '#categoryMessage',
            messageId: '#categoryMessageText'
        },
        specialization: {
            component: '#specialization',
            containerMessageId: '#specializationMessage',
            messageId: '#specializationMessageText'
        }
    };

    function validateCheckbox(value) {
        const checkboxes = document.querySelectorAll(`input[name^="${value}"]`);

        let checked = [...checkboxes].some(cb => cb.checked);

        if (!checked) {
            checkboxes.forEach(cb => {
                cb.style.outline = '1px solid red';
            });

            return false;
        }

        checkboxes.forEach((cb) => {
            if (cb.checked) {
                checked = true;
            }
        });

        checkboxes.forEach(cb => {
            cb.style.outline = '';
        });

        return true;
    }

    function getInstitutionType() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("getInstitutionType") !!}',
        })
            .done(function (response) {
                const data = (response.status == 200 && response.data[0]) ? response.data : [];

                data.forEach(function (project) {
                    $('#legal_entity').append('<option value="' + project.sys_ID + '">' + project.sys_Text + '</option>');
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $("#loadingGetModalAdvanceSettlement").hide();
            });
    }

    function detailSpecialization() {
        specializationData = [];
        addSpecializationRow();
    }

    function addSpecializationRow() {
        const newRow = {
            code: "",
            name: ""
        };

        specializationData.push(newRow);

        renderTable();
    }

    function removeSpecializationRow(index) {
        specializationData.splice(index, 1);
        renderTable();
    }

    function updateField(index, field, value) {
        specializationData[index][field] = value;
    }

    function renderTable() {
        if (containerMultipleSpecialization) {
            containerMultipleSpecialization.innerHTML = "";
        }

        specializationData.forEach((row, index) => {
            const wrapper = document.createElement("div");
            wrapper.className = "row align-items-center";

            if (index === specializationData.length - 1) {
                wrapper.innerHTML += `
                <div class="col-sm-3 col-md-4 col-lg-1 col-form-label">
                    <div class="icon-plus d-flex align-items-center justify-content-center"
                        style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;"
                        onclick="addSpecializationRow()">
                        <i class="fas fa-plus" style="color:#fff;"></i>
                    </div>
                </div>
                <div class="col-4"></div>
                <div class="col-4"></div>
            `;
            } else {
                wrapper.innerHTML += `
                <div class="col-sm-3 col-md-4 col-lg-1 col-form-label">
                    <div class="icon-plus d-flex align-items-center justify-content-center"
                        style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;"
                        onclick="removeSpecializationRow(${index})">
                        <i class="fas fa-minus" style="color:#fff;"></i>
                    </div>
                </div>

                <div class="col-4">
                    <div class="row align-items-center" style="gap: 2rem;">
                        <label class="col-sm-3 col-md-4 col-lg-1 col-form-label">Code</label>
                        <div class="col">
                            <div class="input-group">
                                <input class="form-control"
                                    id="supplier_specialization_code${index}"
                                    name="supplier_specialization_code${index}"
                                    onchange="updateField(${index}, 'code', this.value)"
                                    style="border-radius:0;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="row align-items-center" style="gap: 2rem;">
                        <label class="col-sm-3 col-md-4 col-lg-1 col-form-label">Name</label>
                        <div class="col">
                            <div class="input-group">
                                <input class="form-control"
                                    id="supplier_specialization_name${index}"
                                    name="supplier_specialization_name${index}"
                                    onchange="updateField(${index}, 'name', this.value)"
                                    style="border-radius:0;">
                            </div>
                        </div>
                    </div>
                </div>
            `;
            }

            if (containerMultipleSpecialization) {
                containerMultipleSpecialization.appendChild(wrapper);
            }
        });

        if (specializationData.length > 3) {
            containerMultipleSpecialization.style.cssText = "height: 152px; overflow-y: scroll; overflow-x: hidden;";
        } else {
            containerMultipleSpecialization.removeAttribute('style');
        }
    }

    $('#tableGetBankList').on('click', 'tbody tr', function () {
        const id = $(this).find('input[type="hidden"]').val();
        const acronym = $(this).find('td:nth-child(2)').text();
        const fullName = $(this).find('td:nth-child(3)').text();

        $("#bank_id").val(id);
        $("#bank_name").val(`(${acronym}) ${fullName}`);
        $("#bank_name").css({ "background-color": "#e9ecef" });

        ErrorHandler.hideErrorInputMessage("#bank_name", "#bankNameMessage");

        $('#myGetBankList').modal('toggle');
    });

    $('#tableCountries').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_country"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        countryCodeTemp = code;

        $("#country_id").val(id);
        $("#country_name").val(name);
        $("#country_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#country_name", "#countryMessage");

        getProvincies(code);

        $("#myCountries").modal('toggle');
    });

    $('#tableProvincies').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_province"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#province_id").val(id);
        $("#province_name").val(name);
        $("#province_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#province_name", "#provinceMessage");

        getCities(countryCodeTemp, code);

        $("#myProvincies").modal('toggle');
    });

    $('#tableCities').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_country"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $("#city_id").val(id);
        $("#city_name").val(name);
        $("#city_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#city_name", "#cityMessage");

        $("#myCities").modal('toggle');
    });

    $('#supplier_name').on('input', function (e) {
        if (!e.target.value) {
            ErrorHandler.showErrorInputMessage("#supplier_name", "#supplierNameMessage");
        } else {
            ErrorHandler.hideErrorInputMessage("#supplier_name", "#supplierNameMessage");
        }
    });

    $('#phone_number').on('input', function (e) {
        if (!e.target.value) {
            ErrorHandler.showErrorInputMessage("#phone_number", "#phoneNumberMessage");
        } else {
            ErrorHandler.hideErrorInputMessage("#phone_number", "#phoneNumberMessage");
        }
    });

    $('#email').on('input', function (e) {
        if (!e.target.value) {
            ErrorHandler.showErrorInputMessage("#email", "#emailMessage");
        } else {
            ErrorHandler.hideErrorInputMessage("#email", "#emailMessage");
        }
    });

    $('#address').on('input', function (e) {
        if (!e.target.value) {
            ErrorHandler.showErrorInputMessage("#address", "#addressMessage");
        } else {
            ErrorHandler.hideErrorInputMessage("#address", "#addressMessage");
        }
    });

    $('#contact_person').on('input', function (e) {
        if (!e.target.value) {
            ErrorHandler.showErrorInputMessage("#contact_person", "#contactPersonMessage");
        } else {
            ErrorHandler.hideErrorInputMessage("#contact_person", "#contactPersonMessage");
        }
    });

    $('#account_number').on('input', function (e) {
        if (!e.target.value) {
            ErrorHandler.showErrorInputMessage("#account_number", "#accountNumberMessage");
        } else {
            ErrorHandler.hideErrorInputMessage("#account_number", "#accountNumberMessage");
        }
    });

    $('#account_name').on('input', function (e) {
        if (!e.target.value) {
            ErrorHandler.showErrorInputMessage("#account_name", "#accountNameMessage");
        } else {
            ErrorHandler.hideErrorInputMessage("#account_name", "#accountNameMessage");
        }
    });

    $('#remark').on('input', function (e) {
        if (!e.target.value) {
            ErrorHandler.showErrorInputMessage("#remark", "#remarkMessage");
        } else {
            ErrorHandler.hideErrorInputMessage("#remark", "#remarkMessage");
        }
    });

    $('#supplierForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '{!! route("Supplier.store") !!}',
            data: $(this).serialize(),
            beforeSend: function () {
                Utils.showLoading();
            }
        })
            .done(function (response) {
                console.log('response', response);

                if (response.status === 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        Utils.cancelForm("{{ route('Supplier.index') }}");
                    });
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);

                if (jqXHR.status === 422) {
                    let errors = jqXHR.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        console.log(key + ': ' + value[0]);

                        if (formList[key]) {
                            ErrorHandler.showErrorInputMessage(formList[key].component, formList[key].containerMessageId, formList[key].messageId, value[0]);

                            if (formList[key].component == '#legal_entity') {
                                $('#legal_entity').next('.select2-container')
                                    .find('.select2-selection')
                                    .css("border", "1px solid red");
                            } else if (formList[key].component == '#category') {
                                validateCheckbox('category');
                            } else if (formList[key].component == '#specialization') {
                                validateCheckbox('specialization');
                            }
                        }
                    });
                }
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                Utils.hideLoading();
            });
    });

    $('#add-category').on('click', function (e) {
        $("#supplierSpecializationModal").modal('toggle');
    });

    // $('#cancel-category').on('click', function (e) {
    //     $("#supplierCategoryModal").modal('toggle');
    //     $("#supplierSpecializationModal").modal('show');
    // });

    // $('#submit-category').on('click', function (e) {
    //     $("#supplierCategoryModal").modal('toggle');
    //     $("#supplierSpecializationModal").modal('show');
    // });

    document.querySelectorAll('.parent-checkbox').forEach(parent => {
        parent.addEventListener('change', function () {
            let parentValue = this.value;
            let childGroup = document.querySelector(`.child-group[data-parent="${parentValue}"]`);
            let children = childGroup.querySelectorAll('input[type="checkbox"]');

            children.forEach(child => {
                child.disabled = !this.checked;

                // optional: uncheck saat disable
                if (!this.checked) {
                    child.checked = false;
                }
            });
        });
    });

    document.querySelectorAll('input[name^="category"]').forEach(cb => {
        cb.addEventListener('change', () => {
            const checkboxes = document.querySelectorAll('input[name^="category"]');

            const checked = [...checkboxes].some(c => c.checked);

            if (checked) {
                checkboxes.forEach(c => c.style.outline = '');
                ErrorHandler.hideErrorInputMessage("", "#categoryMessage");
            } else {
                checkboxes.forEach(c => c.style.outline = '1px solid red');
                ErrorHandler.showErrorInputMessage("", "#categoryMessage", "#categoryMessageText", "The category field is required.");
            }
        });
    });

    document.querySelectorAll('input[name^="specialization"]').forEach(cb => {
        cb.addEventListener('change', () => {
            const checkboxes = document.querySelectorAll('input[name^="specialization"]');

            const checked = [...checkboxes].some(c => c.checked);

            if (checked) {
                checkboxes.forEach(c => c.style.outline = '');
                ErrorHandler.hideErrorInputMessage("", "#specializationMessage");
            } else {
                checkboxes.forEach(c => c.style.outline = '1px solid red');
                ErrorHandler.showErrorInputMessage("", "#specializationMessage", "#specializationMessageText", "The specialization field is required.");
            }
        });
    });

    $(document).ready(function () {
        $('#legal_entity').select2();

        $('#supplierSpecializationModal').on('hidden.bs.modal', function (e) {
            detailSpecialization();
        });

        $('#supplierCategoryModal').on('hidden.bs.modal', function (e) {
            $("#supplierCategoryModal").modal('hide');
            $("#supplierSpecializationModal").modal('show');
        });

        $('#legal_entity').on('select2:select', function (e) {
            ErrorHandler.hideErrorInputMessage("", "#legalEntityMessage");
            $('#legal_entity').next('.select2-container')
                .find('.select2-selection')
                .css("border", "1px solid #ced4da");
        });

        getCountries();
        getInstitutionType();
        detailSpecialization();
    });
</script>