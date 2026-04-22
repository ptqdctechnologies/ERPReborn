<script>
    let countryCodeTemp = null;
    const supplierName = document.getElementById("supplier_name");
    const phoneNumber = document.getElementById("phone_number");
    const email = document.getElementById("email");
    const countryName = document.getElementById("country_name");
    const provinceName = document.getElementById("province_name");
    const cityName = document.getElementById("city_name");
    const address = document.getElementById("address");
    const contactPerson = document.getElementById("contact_person");
    const bankName = document.getElementById("bank_name");
    const accountNumber = document.getElementById("account_number");
    const accountName = document.getElementById("account_name");
    const remark = document.getElementById("remark");
    const legalEntity = document.getElementById("legal_entity");

    function validateCheckbox(value) {
        const checkboxes = document.querySelectorAll(`input[name="${value}"]`);

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

    function validationForm() {
        const isSupplierNameNotEmpty = supplierName.value.trim() !== '';
        const isPhoneNumberNotEmpty = phoneNumber.value.trim() !== '';
        const isEmailNotEmpty = email.value.trim() !== '';
        const isCountryNameNotEmpty = countryName.value.trim() !== '';
        const isProvinceNameNotEmpty = provinceName.value.trim() !== '';
        const isCityNameNotEmpty = cityName.value.trim() !== '';
        const isAddressNotEmpty = address.value.trim() !== '';
        const isContactPersonNotEmpty = contactPerson.value.trim() !== '';
        const isBankNameNotEmpty = bankName.value.trim() !== '';
        const isAccountNumberNotEmpty = accountNumber.value.trim() !== '';
        const isAccountNameNotEmpty = accountName.value.trim() !== '';
        const isRemarkNotEmpty = remark.value.trim() !== '';
        const isLegalEntityNotEmpty = legalEntity.value.trim() !== '';
        const isCategoryChecklist = validateCheckbox('category');
        const isSpecializationChecklist = validateCheckbox('specialization');

        if (
            isSupplierNameNotEmpty &&
            isPhoneNumberNotEmpty &&
            isEmailNotEmpty &&
            isCountryNameNotEmpty &&
            isProvinceNameNotEmpty &&
            isCityNameNotEmpty &&
            isAddressNotEmpty &&
            isContactPersonNotEmpty &&
            isBankNameNotEmpty &&
            isAccountNumberNotEmpty &&
            isAccountNameNotEmpty &&
            isRemarkNotEmpty &&
            isLegalEntityNotEmpty &&
            isCategoryChecklist &&
            isSpecializationChecklist
        ) {
            console.log('here');
        } else {
            if (
                !isSupplierNameNotEmpty &&
                !isPhoneNumberNotEmpty &&
                !isEmailNotEmpty &&
                !isCountryNameNotEmpty &&
                !isProvinceNameNotEmpty &&
                !isCityNameNotEmpty &&
                !isAddressNotEmpty &&
                !isContactPersonNotEmpty &&
                !isBankNameNotEmpty &&
                !isAccountNumberNotEmpty &&
                !isAccountNameNotEmpty &&
                !isRemarkNotEmpty &&
                !isLegalEntityNotEmpty &&
                !isCategoryChecklist &&
                !isSpecializationChecklist
            ) {
                ErrorHandler.showErrorInputMessage("#supplier_name", "#supplierNameMessage");
                ErrorHandler.showErrorInputMessage("#phone_number", "#phoneNumberMessage");
                ErrorHandler.showErrorInputMessage("#email", "#emailMessage");
                ErrorHandler.showErrorInputMessage("#country_name", "#countryMessage");
                ErrorHandler.showErrorInputMessage("#province_name", "#provinceMessage");
                ErrorHandler.showErrorInputMessage("#city_name", "#cityMessage");
                ErrorHandler.showErrorInputMessage("#address", "#addressMessage");
                ErrorHandler.showErrorInputMessage("#contact_person", "#contactPersonMessage");
                ErrorHandler.showErrorInputMessage("#bank_name", "#bankNameMessage");
                ErrorHandler.showErrorInputMessage("#account_number", "#accountNumberMessage");
                ErrorHandler.showErrorInputMessage("#account_name", "#accountNameMessage");
                ErrorHandler.showErrorInputMessage("#remark", "#remarkMessage");
                ErrorHandler.showErrorInputMessage("", "#categoryMessage");
                ErrorHandler.showErrorInputMessage("", "#specializationMessage");
                ErrorHandler.showErrorInputMessage("", "#legalEntityMessage");
                $('#legal_entity').next('.select2-container')
                    .find('.select2-selection')
                    .css("border", "1px solid red");

                return;
            }
            if (!isSupplierNameNotEmpty) {
                ErrorHandler.showErrorInputMessage("#supplier_name", "#supplierNameMessage");

                return;
            }
            if (!isPhoneNumberNotEmpty) {
                ErrorHandler.showErrorInputMessage("#phone_number", "#phoneNumberMessage");

                return;
            }
            if (!isEmailNotEmpty) {
                ErrorHandler.showErrorInputMessage("#email", "#emailMessage");

                return;
            }
            if (!isCountryNameNotEmpty) {
                ErrorHandler.showErrorInputMessage("#country_name", "#countryMessage");

                return;
            }
            if (!isProvinceNameNotEmpty) {
                ErrorHandler.showErrorInputMessage("#province_name", "#provinceMessage");

                return;
            }
            if (!isCityNameNotEmpty) {
                ErrorHandler.showErrorInputMessage("#city_name", "#cityMessage");

                return;
            }
            if (!isAddressNotEmpty) {
                ErrorHandler.showErrorInputMessage("#address", "#addressMessage");

                return;
            }
            if (!isContactPersonNotEmpty) {
                ErrorHandler.showErrorInputMessage("#contact_person", "#contactPersonMessage");

                return;
            }
            if (!isBankNameNotEmpty) {
                ErrorHandler.showErrorInputMessage("#bank_name", "#bankNameMessage");

                return;
            }
            if (!isAccountNumberNotEmpty) {
                ErrorHandler.showErrorInputMessage("#account_number", "#accountNumberMessage");

                return;
            }
            if (!isAccountNameNotEmpty) {
                ErrorHandler.showErrorInputMessage("#account_name", "#accountNameMessage");

                return;
            }
            if (!isRemarkNotEmpty) {
                ErrorHandler.showErrorInputMessage("#remark", "#remarkMessage");

                return;
            }
            if (!isLegalEntityNotEmpty) {
                ErrorHandler.showErrorInputMessage("", "#legalEntityMessage");
                $('#legal_entity').next('.select2-container')
                    .find('.select2-selection')
                    .css("border", "1px solid red");

                return;
            }
            if (!isCategoryChecklist) {
                ErrorHandler.showErrorInputMessage("", "#categoryMessage");

                return;
            }
            if (!isSpecializationChecklist) {
                ErrorHandler.showErrorInputMessage("", "#specializationMessage");

                return;
            }
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

    document.querySelectorAll('input[name="category"]').forEach(cb => {
        cb.addEventListener('change', () => {
            const checkboxes = document.querySelectorAll('input[name="category"]');

            const checked = [...checkboxes].some(c => c.checked);

            if (checked) {
                checkboxes.forEach(c => c.style.outline = '');
                ErrorHandler.hideErrorInputMessage("", "#categoryMessage");
            } else {
                checkboxes.forEach(c => c.style.outline = '1px solid red');
                ErrorHandler.showErrorInputMessage("", "#categoryMessage");
            }
        });
    });

    document.querySelectorAll('input[name="specialization"]').forEach(cb => {
        cb.addEventListener('change', () => {
            const checkboxes = document.querySelectorAll('input[name="specialization"]');

            const checked = [...checkboxes].some(c => c.checked);

            if (checked) {
                checkboxes.forEach(c => c.style.outline = '');
                ErrorHandler.hideErrorInputMessage("", "#specializationMessage");
            } else {
                checkboxes.forEach(c => c.style.outline = '1px solid red');
                ErrorHandler.showErrorInputMessage("", "#specializationMessage");
            }
        });
    });

    $(document).ready(function () {
        $('#legal_entity').select2();

        $('#legal_entity').on('select2:select', function (e) {
            ErrorHandler.hideErrorInputMessage("", "#legalEntityMessage");
            $('#legal_entity').next('.select2-container')
                .find('.select2-selection')
                .css("border", "1px solid #ced4da");
        });

        getCountries();
    });
</script>