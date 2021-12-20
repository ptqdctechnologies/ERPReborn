<div id="popupBudgetExpenseLineCeiling" class="modal fade" role="dialog" style="margin-top: 250px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-body">
                    <form action="{{ route('BudgetExpenseLineCeiling.index') }}" method="GET">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td><label style="margin-left: 40px;">Budget</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="BudgetId3" name="BudgetId3" type="hidden" class="form-control">
                                                    <input id="BudgetName3" style="border-radius:0;" name="BudgetName3" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#mySearchBudget3" class="fas fa-gift Budget3" style="color:grey;"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label style="margin-left: 40px;">Budget Expense</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="BudgetExpenseId2" name="BudgetExpenseId2" type="hidden" class="form-control">
                                                    <input id="BudgetExpenseName2" style="border-radius:0;" name="BudgetExpenseName2" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#mySearchBudgetExpense2" class="fas fa-gift BudgetExpense2" style="color:grey;"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label style="margin-left: 40px;">Budget Expense Line</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="BudgetExpenseLineId" name="BudgetExpenseLineId" type="hidden" class="form-control">
                                                    <input id="BudgetExpenseLineName" style="border-radius:0;" name="BudgetExpenseLineName" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#mySearchBudgetExpenseLine" class="fas fa-gift BudgetExpenseLine" style="color:grey;"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline btn-success btn-sm" style="margin-left: 180px;">
                            <i class="fa fa-pencil" aria-hidden="true">View</i>
                        </button>
                        <button type="reset" class="btn btn-outline btn-danger btn-sm">
                            <i class="fa fa-time" aria-hidden="true">Cancel</i>
                        </button>
                    </form>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('.Budget3').on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: 'GET',
                url: '{!! route("BudgetExpense.GetBudget") !!}',
                success: function(data) {
                    var no = 1;
                    var t = $('#tableBudget3').DataTable();
                    $.each(data, function(key, val) {
                        t.row.add([
                                '<tbody><tr><td>' + no++ + '</td>',
                                '<td><span data-dismiss="modal" class="klikBudget3" data-id="' + val.sys_ID + '" data-name="' + val.documentNumber + '">' + val.sys_ID + '</span></td>',
                                '<td>' + val.documentNumber + '</td></tr></tbody>'
                        ])  .draw();
                        
                    });
                    $('.klikBudget3').on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var id = $this.data("id");
                        var name = $this.data("name");
                        $("#BudgetId3").val(id);
                        $("#BudgetName3").val(name);

                    });
                }
            });
        });

        $('.BudgetExpense2').on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: 'GET',
                url: '{!! route("BudgetExpenseLine.GetBudgetExpense") !!}?BudgetId3=' + $('#BudgetId3').val(),
                success: function(data) {
                    var no = 1;
                    var t = $('#tableBudgetExpense2').DataTable();
                    $.each(data, function(key, val) {
                        t.row.add([
                                '<tbody><tr><td>' + no++ + '</td>',
                                '<td><span data-dismiss="modal" class="klikBudgetExpense2" data-id="' + val.sys_ID + '" data-name="' + val.name + '">' + val.sys_ID + '</span></td>',
                                '<td>' + val.name + '</td></tr></tbody>',
                                '<td>' + val.owner + '</td></tr></tbody>',
                        ])  .draw();
                        
                    });
                    $('.klikBudgetExpense2').on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var id = $this.data("id");
                        var name = $this.data("name");
                        $("#BudgetExpenseId2").val(id);
                        $("#BudgetExpenseName2").val(name);

                    });
                }
            });
        });
        $('.BudgetExpenseLine').on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: 'GET',
                url: '{!! route("BudgetExpenseLineCeiling.GetBudgetExpenseLine") !!}?BudgetExpenseId2=' + $('#BudgetExpenseId2').val(),
                success: function(data) {
                    var no = 1;
                    var t = $('#tableBudgetExpenseLine').DataTable();
                    $.each(data, function(key, val) {
                        t.row.add([
                                '<tbody><tr><td>' + no++ + '</td>',
                                '<td><span data-dismiss="modal" class="klikBudgetExpenseLine" data-id="' + val.sys_ID + '" data-name="' + val.name + '">' + val.sys_ID + '</span></td>',
                                '<td>' + val.name + '</td></tr></tbody>',
                        ])  .draw();
                        
                    });
                    $('.klikBudgetExpenseLine').on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var id = $this.data("id");
                        var name = $this.data("name");
                        $("#BudgetExpenseLineId").val(id);
                        $("#BudgetExpenseLineName").val(name);

                    });
                }
            });
        });
    });
</script>