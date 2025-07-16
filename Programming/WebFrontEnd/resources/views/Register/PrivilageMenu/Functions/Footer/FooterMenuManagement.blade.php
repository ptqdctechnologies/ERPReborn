<!-- MENU & SUB MENU -->
<script>
    // GET MENU OPTION
    $(window).one('load', function(e) {
        e.preventDefault();

        var keys = 0;

        $('.menuOption').hide();

        $.ajax({
            type: 'GET',
            url: '{!! route("getMenuGroup") !!}',
            success: function(data) {
                data.data.forEach(function(item) {
                    var option = $('<option>', {
                        value: item.Sys_ID,
                        text: item.Name
                    });

                    $('#menuSelect').append(option);
                });

                $('#menuSelect').select2();
                $('.menuOption').show();
                $('.spinner-menu').hide();

                loadSubMenu($('#menuSelect').val());
            },
            error: function(xhr, status, error) {
                Swal.fire("Error", "Failed to Get Menu Data", "error");
            }
        });
    });

    let localMenuData = []; 

    // GET SUB MENU OPTION
    function loadSubMenu(selectedValue) {
        $('.spinner-sub-menu').show();
        $('.data-menu-management').hide();

        $.ajax({
            type: 'GET',
            url: '{!! route("getOneSubMenu") !!}',
            data: { selectedValue: selectedValue },
            success: function(data) {
                var resultArray = Array.isArray(data) ? data : Object.values(data);

                localMenuData = [];

                localMenuData = [...localMenuData, ...resultArray];

                displaySubMenu(); 
            },
            error: function(xhr, status, error) {
                $('.spinner-sub-menu').hide();
                $('.data-menu-management').html('No data available for this navigation.');
                Swal.fire("Error", "Failed to Get Sub Menu Data", "error");
            }
        });
    }

    // ADD NEW FOLDER
    function addNewFolder() {
        const menuCaption = $('#menu_caption').val();
        const menuId = $('#menu_id').val();
        const typeFolder = $('#type_folder').val();

        if (!menuCaption) {
            alert('Please fill in all fields.');
            return;
        }

        localMenuData.push({
            id: menuId,
            Caption: menuCaption,
            Type: typeFolder,
            isNew: true
        });

        displaySubMenu();

        $('#menu_caption').val('');
        $('#menu_id').val('');
        $('#type_folder').val('Transaction');
        $('#modalNewFolder').modal('hide');
    }

    // ADD NEW MENU
    function addNewSubMenu() {
        const menuCaption = $('#new_menu_caption').val();
        const menuId = $('#new_menu_id').val();
        const menuLink = $('#new_menu_link').val();
        const typeFolder = $('#new_type_folder').val();

        if (!menuCaption) {
            alert('Please fill in all fields.');
            return;
        }

        localMenuData.push({
            id: menuId,
            Caption: menuCaption,
            Link: menuLink,
            Type: typeFolder,
        });

        displaySubMenu();

        $('#new_menu_caption').val('');
        $('#new_menu_id').val('');
        $('#new_menu_link').val('');
        $('#new_type_folder').val('Transaction');
        $('#modalNewMenu').modal('hide');
    }

    // SHOW FOLDER/MENU
    function displaySubMenu() {
        let groupedData = localMenuData.reduce(function(acc, item) {
            if (!acc[item.Type]) {
                acc[item.Type] = [];
            }
            acc[item.Type].push(item);
            return acc;
        }, {});

        let displayData = '';

        const groupedDatasss = {
            Transaction: {},
            Reports: {}
        };

        localMenuData.forEach(item => {
            const { Type, id } = item;

            if (!groupedDatasss[Type]) {
                groupedDatasss[Type] = {};
            }

            if (id) {
                if (!groupedDatasss[Type][id]) {
                    groupedDatasss[Type][id] = [];
                }
                groupedDatasss[Type][id].push(item);
            } else {
                if (!groupedDatasss[Type].main) {
                    groupedDatasss[Type].main = [];
                }
                groupedDatasss[Type].main.push(item);
            }
        });

        if (groupedDatasss.Transaction) {
            displayData += `<li class="nav-item has-treeview" style="list-style-type: none;">`;
            displayData += `<a href="#" class="nav-link d-flex align-items-center">`;
            displayData += `<i class="fas fa-folder" style="font-size: 14px; margin-right: 0.4rem;"></i>`;
            displayData += `<div class="d-flex align-items-center justify-content-between" style="width: 100%; font-size: 14px; font-weight: 400; line-height: 1.5;">`;
            displayData += `<div>Transaction</div>`;
            displayData += `<i class="right fas fa-angle-left"></i>`;
            displayData += `</div>`;
            displayData += `</a>`;

            // Looping untuk `main`
            if (groupedDatasss.Transaction.main) {
                groupedDatasss.Transaction.main.forEach(function(item) {
                    displayData += `<ul class="nav nav-treeview">`;
                    displayData += `<li class="nav-item" data-id="${item.Key}" data-caption="${item.Caption}">`;
                    displayData += `<a href="#" class="nav-link d-flex align-items-center trigger-modal-delete">`;
                    displayData += `<i class="far fa-file nav-icon" style="font-size: 14px;"></i>`;
                    displayData += `<p>${item.Caption}</p>`;
                    displayData += `</a>`;
                    displayData += `</li>`;
                    displayData += `</ul>`;
                });
            }

            // Looping untuk `id` selain `main`
            Object.keys(groupedDatasss.Transaction).forEach(function(id) {
                if (id !== 'main' && Array.isArray(groupedDatasss.Transaction[id])) {  // skip `main` karena sudah diproses di atas
                    displayData += `<ul class="nav nav-treeview" style="margin-left: 0.5rem;">`;
                    displayData += `<a href="#" class="nav-link d-flex align-items-center">`;
                    displayData += `<i class="fas fa-folder" style="font-size: 14px; margin-right: 0.4rem;"></i>`;
                    displayData += `<div class="d-flex align-items-center justify-content-between" style="width: 100%; font-size: 14px; font-weight: 400; line-height: 1.5;">`;
                    displayData += `<div>${id}</div>`;
                    displayData += `<i class="right fas fa-angle-left"></i>`;
                    displayData += `</div>`;
                    displayData += `</a>`;

                    groupedDatasss.Transaction[id].forEach(function(item) {
                        displayData += `<ul class="nav nav-treeview">`;
                        displayData += `<li class="nav-item" data-id="${item.Key}" data-caption="${item.Caption}">`;
                        displayData += `<a href="#" class="nav-link d-flex align-items-center trigger-modal-delete">`;
                        displayData += `<i class="far fa-file nav-icon" style="font-size: 14px;"></i>`;
                        displayData += `<p>${item.Caption}</p>`;
                        displayData += `</a>`;
                        displayData += `</li>`;
                        displayData += `</ul>`;
                    });

                    displayData += `</ul>`;
                }
            });

            displayData += `</li>`;
        }

        if (groupedDatasss.Report) {
            displayData += `<li class="nav-item has-treeview" style="list-style-type: none;">`;
            displayData += `<a href="#" class="nav-link d-flex align-items-center">`;
            displayData += `<i class="fas fa-folder" style="font-size: 14px; margin-right: 0.4rem;"></i>`;
            displayData += `<div class="d-flex align-items-center justify-content-between" style="width: 100%; font-size: 14px; font-weight: 400; line-height: 1.5;">`;
            displayData += `<div>Report</div>`;
            displayData += `<i class="right fas fa-angle-left"></i>`;
            displayData += `</div>`;
            displayData += `</a>`;

            // Looping untuk `main`
            if (groupedDatasss.Report.main) {
                groupedDatasss.Report.main.forEach(function(item) {
                    displayData += `<ul class="nav nav-treeview">`;
                    displayData += `<li class="nav-item" data-id="${item.Key}" data-caption="${item.Caption}">`;
                    displayData += `<a href="#" class="nav-link d-flex align-items-center trigger-modal-delete">`;
                    displayData += `<i class="far fa-file nav-icon" style="font-size: 14px;"></i>`;
                    displayData += `<p>${item.Caption}</p>`;
                    displayData += `</a>`;
                    displayData += `</li>`;
                    displayData += `</ul>`;
                });
            }

            // Looping untuk `id` selain `main`
            Object.keys(groupedDatasss.Report).forEach(function(id) {
                if (id !== 'main' && Array.isArray(groupedDatasss.Report[id])) {  // skip `main` karena sudah diproses di atas
                    displayData += `<ul class="nav nav-treeview" style="margin-left: 0.5rem;">`;
                    displayData += `<a href="#" class="nav-link d-flex align-items-center">`;
                    displayData += `<i class="fas fa-folder" style="font-size: 14px; margin-right: 0.4rem;"></i>`;
                    displayData += `<div class="d-flex align-items-center justify-content-between" style="width: 100%; font-size: 14px; font-weight: 400; line-height: 1.5;">`;
                    displayData += `<div>${id}</div>`;
                    displayData += `<i class="right fas fa-angle-left"></i>`;
                    displayData += `</div>`;
                    displayData += `</a>`;

                    groupedDatasss.Report[id].forEach(function(item) {
                        displayData += `<ul class="nav nav-treeview">`;
                        displayData += `<li class="nav-item" data-id="${item.Key}" data-caption="${item.Caption}">`;
                        displayData += `<a href="#" class="nav-link d-flex align-items-center trigger-modal-delete">`;
                        displayData += `<i class="far fa-file nav-icon" style="font-size: 14px;"></i>`;
                        displayData += `<p>${item.Caption}</p>`;
                        displayData += `</a>`;
                        displayData += `</li>`;
                        displayData += `</ul>`;
                    });

                    displayData += `</ul>`;
                }
            });

            displayData += `</li>`;
        }

        $('.data-menu-management').show();
        $('.data-menu-management').html(displayData);
        $('.spinner-sub-menu').hide();
    }

    $('#menuSelect').on('input', function() {
        loadSubMenu($(this).val());
    });
</script>

<!-- SHOW/HIDE PASSWORD (MODAL DELETE) -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('#menu_password');

    togglePassword.addEventListener('click', function (e) {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Show' : 'Hide';
    });
</script>