<div id="popupBudgetExpenseLineCeilingObjects" class="modal fade" role="dialog" style="margin-top: 250px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-body">
                    <form action="{{ route('BudgetExpenseLineCeilingObjects.index') }}" method="GET">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td><label style="margin-left: 10px;">Budget</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="BudgetId4" name="BudgetId4" type="hidden" class="form-control">
                                                    <input required="" id="BudgetName4" style="border-radius:0;" name="BudgetName4" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#mySearchBudget4" class="fas fa-gift Budget4" style="color:grey;"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label style="margin-left: 10px;">Budget Expense</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="BudgetExpenseId3" name="BudgetExpenseId3" type="hidden" class="form-control">
                                                    <input id="BudgetExpenseName3" style="border-radius:0;" name="BudgetExpenseName3" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#mySearchBudgetExpense3" class="fas fa-gift BudgetExpense3" style="color:grey;"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label style="margin-left: 10px;">Budget Expense Line</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="BudgetExpenseLineId2" name="BudgetExpenseLineId2" type="hidden" class="form-control">
                                                    <input id="BudgetExpenseLineName2" style="border-radius:0;" name="BudgetExpenseLineName2" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#mySearchBudgetExpenseLine2" class="fas fa-gift BudgetExpenseLine2" style="color:grey;"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label style="margin-left: 10px;">Budget Expense Line Ceiling</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="BudgetExpenseLineCeilingId" name="BudgetExpenseLineCeilingId" type="hidden" class="form-control">
                                                    <input id="BudgetExpenseLineCeilingName" style="border-radius:0;" name="BudgetExpenseLineCeilingName" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#mySearchBudgetExpenseLineCeiling" class="fas fa-gift BudgetExpenseLineCeiling" style="color:grey;"></i></a>
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
        $('.Budget4').on('click', function(e) {
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
                    var t = $('#tableBudget4').DataTable();
                    $.each(data, function(key, val) {
                        t.row.add([
                                '<tbody><tr><td>' + no++ + '</td>',
                                '<td><span data-dismiss="modal" class="klikBudget4" data-id="' + val.sys_ID + '" data-name="' + val.documentNumber + '">' + val.sys_ID + '</span></td>',
                                '<td>' + val.documentNumber + '</td></tr></tbody>'
                        ])  .draw();
                        
                    });
                    $('.klikBudget4').on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var id = $this.data("id");
                        var name = $this.data("name");
                        $("#BudgetId4").val(id);
                        $("#BudgetName4").val(name);

                    });
                }
            });
        });

        $('.BudgetExpense3').on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: 'GET',
                url: '{!! route("BudgetExpenseLine.GetBudgetExpense") !!}?BudgetId4=' + $('#BudgetId4').val(),
                success: function(data) {
                    var no = 1;
                    var t = $('#tableBudgetExpense3').DataTable();
                    $.each(data, function(key, val) {
                        t.row.add([
                                '<tbody><tr><td>' + no++ + '</td>',
                                '<td><span data-dismiss="modal" class="klikBudgetExpense3" data-id="' + val.sys_ID + '" data-name="' + val.name + '">' + val.sys_ID + '</span></td>',
                                '<td>' + val.name + '</td></tr></tbody>',
                                '<td>' + val.owner + '</td></tr></tbody>',
                        ])  .draw();
                        
                    });
                    $('.klikBudgetExpense3').on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var id = $this.data("id");
                        var name = $this.data("name");
                        $("#BudgetExpenseId3").val(id);
                        $("#BudgetExpenseName3").val(name);

                    });
                }
            });
        });
        $('.BudgetExpenseLine2').on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: 'GET',
                url: '{!! route("BudgetExpenseLineCeiling.GetBudgetExpenseLine") !!}?BudgetExpenseId3=' + $('#BudgetExpenseId3').val(),
                success: function(data) {
                    var no = 1;
                    var t = $('#tableBudgetExpenseLine2').DataTable();
                    $.each(data, function(key, val) {
                        t.row.add([
                                '<tbody><tr><td>' + no++ + '</td>',
                                '<td><span data-dismiss="modal" class="klikBudgetExpenseLine2" data-id="' + val.sys_ID + '" data-name="' + val.name + '">' + val.sys_ID + '</span></td>',
                                '<td>' + val.name + '</td></tr></tbody>',
                        ])  .draw();
                        
                    });
                    $('.klikBudgetExpenseLine2').on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var id = $this.data("id");
                        var name = $this.data("name");
                        $("#BudgetExpenseLineId2").val(id);
                        $("#BudgetExpenseLineName2").val(name);

                    });
                }
            });
        });

        $('.BudgetExpenseLineCeiling').on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: 'GET',
                url: '{!! route("BudgetExpenseLineCeilingObjects.GetBudgetExpenseLineCeiling") !!}?BudgetExpenseLineId2=' + $('#BudgetExpenseLineId2').val(),
                success: function(data) {
                    var no = 1;
                    var t = $('#tableBudgetExpenseLineCeiling').DataTable();
                    $.each(data, function(key, val) {
                        t.row.add([
                                '<tbody><tr><td>' + no++ + '</td>',
                                '<td><span data-dismiss="modal" class="klikBudgetExpenseLineCeiling" data-id="' + val.sys_ID + '" data-name="' + val.budgetPeriod + '">' + val.sys_ID + '</span></td>',
                                '<td>' + val.budgetPeriod + '</td></tr></tbody>',
                        ])  .draw();
                        
                    });
                    $('.klikBudgetExpenseLineCeiling').on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var id = $this.data("id");
                        var name = $this.data("name");
                        $("#BudgetExpenseLineCeilingId").val(id);
                        $("#BudgetExpenseLineCeilingName").val(name);

                    });
                }
            });
        });
        

    });
</script>