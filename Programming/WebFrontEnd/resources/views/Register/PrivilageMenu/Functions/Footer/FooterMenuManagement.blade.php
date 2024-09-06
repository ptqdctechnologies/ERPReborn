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
                data.forEach(function(item) {
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

                console.log('resultArray', resultArray);

                var groupedData = resultArray.reduce(function(acc, item) {
                    if (!acc[item.Type]) {
                        acc[item.Type] = [];
                    }
                    acc[item.Type].push(item);
                    return acc;
                }, {});

                if (resultArray.length > 0) {
                    var displayData = '';
                    var no = 1;

                    if (groupedData.Transaction) {
                        displayData += `<li class="nav-item has-treeview" style="list-style-type: none;">`;
                        displayData += `<a href="#" class="nav-link d-flex align-items-center">`;
                        displayData += `<i class="fas fa-folder" style="font-size: 14px; margin-right: 0.4rem;"></i>`;
                        displayData += `<div class="d-flex align-items-center justify-content-between" style="width: 100%; font-size: 14px; font-weight: 400; line-height: 1.5;">`;
                        displayData += `<div>Transaction</div>`;
                        displayData += `<i class="right fas fa-angle-left"></i>`;
                        displayData += `</div>`;
                        displayData += `</a>`;
                        groupedData.Transaction.forEach(function(item) {
                        // DISINI
                        displayData += `<ul class="nav nav-treeview">`;
                        displayData += `<li class="nav-item" data-id="${item.id}" data-caption="${item.Caption}">`;
                        displayData += `<a href="#" class="nav-link d-flex align-items-center trigger-modal-delete">`;
                        displayData += `<i class="far fa-file nav-icon" style="font-size: 14px;"></i>`;
                        displayData += `<p>${item.Caption}</p>`;
                        displayData += `</a>`;
                        displayData += `</li>`;
                        displayData += `</ul>`;
                        });
                        displayData += `</li>`;
                    }

                    if (groupedData.Report) {
                        displayData += `<li class="nav-item has-treeview" style="list-style-type: none;">`;
                        displayData += `<a href="#" class="nav-link d-flex align-items-center">`;
                        displayData += `<i class="fas fa-folder" style="font-size: 14px; margin-right: 0.4rem;"></i>`;
                        displayData += `<div class="d-flex align-items-center justify-content-between" style="width: 100%; font-size: 14px; font-weight: 400; line-height: 1.5;">`;
                        displayData += `<div>Report</div>`;
                        displayData += `<i class="right fas fa-angle-left"></i>`;
                        displayData += `</div>`;
                        displayData += `</a>`;
                        groupedData.Report.forEach(function(item) {
                        // DISINI
                        displayData += `<ul class="nav nav-treeview">`;
                        displayData += `<li class="nav-item" data-id="${item.id}" data-caption="${item.Caption}">`;
                        displayData += `<a href="#" class="nav-link d-flex align-items-center trigger-modal-delete">`;
                        displayData += `<i class="far fa-file nav-icon" style="font-size: 14px;"></i>`;
                        displayData += `<p>${item.Caption}</p>`;
                        displayData += `</a>`;
                        displayData += `</li>`;
                        displayData += `</ul>`;
                        });
                        displayData += `</li>`;
                    }

                    $('.data-menu-management').show();
                    $('.data-menu-management').html(displayData);
                    $('.spinner-sub-menu').hide();

                    $('.trigger-modal-delete').on('click', function(e) {
                        e.preventDefault();

                        // Menghapus background biru dari semua item yang sudah di-klik sebelumnya
                        $('.trigger-modal-delete').closest('li').css('background-color', '');
                        $('.trigger-modal-delete').closest('li').css('width', '');
                        $('.trigger-modal-delete').closest('li').css('padding', '');
                        $('.trigger-modal-delete').closest('li').css('border', '');
                        $('.trigger-modal-delete').closest('li').css('border-radius', '');
                        $('.trigger-modal-delete').closest('li').css('margin-bottom', '');

                        // Menambahkan background biru ke item yang diklik
                        $(this).closest('li').css('background-color', '#E9ECEF');
                        $(this).closest('li').css('width', 'max-content');
                        $(this).closest('li').css('padding', '6px 8px 4px 0px');
                        $(this).closest('li').css('border', '1px solid #17a2b8');
                        $(this).closest('li').css('border-radius', '4px');
                        $(this).closest('li').css('margin-bottom', '4px');

                        const caption = $(this).closest('li').data('caption');
                        $('#modalDelete .modal-body').text(`Are you sure you want to delete "${caption}"?`);
                        // $('#modalDelete').modal('show');
                    });
                } else {
                    $('.data-menu-management').html('No data available for this navigation.');
                }
            },
            error: function(xhr, status, error) {
                $('.spinner-sub-menu').hide();
                $('.data-menu-management').html('No data available for this navigation.');
                Swal.fire("Error", "Failed to Get Sub Menu Data", "error");
            }
        });
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
        // toggle the type attribute
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        // toggle the text of the button
        this.textContent = type === 'password' ? 'Show' : 'Hide';
    });
</script>