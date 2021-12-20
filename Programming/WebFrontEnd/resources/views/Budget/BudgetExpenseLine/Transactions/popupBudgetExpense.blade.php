<div id="popupBudgetExpenseLine" class="modal fade" role="dialog" style="margin-top: 250px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-body">
                    <form action="{{ route('BudgetExpenseLine.index') }}" method="GET">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td><label style="margin-left: 85px;">Budget</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="BudgetId2" name="BudgetId2" type="hidden" class="form-control">
                                                    <input required="" id="BudgetName2" style="border-radius:0;" name="BudgetName2" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#mySearchBudget2" class="fas fa-gift Budget2" style="color:grey;"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label style="margin-left: 85px;">Budget Expense</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="BudgetExpenseId" name="BudgetExpenseId" type="hidden" class="form-control">
                                                    <input id="BudgetExpenseName" style="border-radius:0;" name="BudgetExpenseName" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#mySearchBudgetExpense" class="fas fa-gift BudgetExpense" style="color:grey;"></i></a>
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
        $('.Budget2').on('click', function(e) {
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
                    var t = $('#tableBudget2').DataTable();
                    $.each(data, function(key, val) {
                        t.row.add([
                                '<tbody><tr><td>' + no++ + '</td>',
                                '<td><span data-dismiss="modal" class="klikBudget2" data-id="' + val.sys_ID + '" data-name="' + val.documentNumber + '">' + val.sys_ID + '</span></td>',
                                '<td>' + val.documentNumber + '</td></tr></tbody>'
                        ])  .draw();
                        
                    });
                    $('.klikBudget2').on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var id = $this.data("id");
                        var name = $this.data("name");
                        $("#BudgetId2").val(id);
                        $("#BudgetName2").val(name);

                    });
                }
            });
        });

        $('.BudgetExpense').on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: 'GET',
                url: '{!! route("BudgetExpenseLine.GetBudgetExpense") !!}?BudgetId2=' + $('#BudgetId2').val(),
                success: function(data) {
                    var no = 1;
                    var t = $('#tableBudgetExpense').DataTable();
                    $.each(data, function(key, val) {
                        t.row.add([
                                '<tbody><tr><td>' + no++ + '</td>',
                                '<td><span data-dismiss="modal" class="klikBudgetExpense" data-id="' + val.sys_ID + '" data-name="' + val.name + '">' + val.sys_ID + '</span></td>',
                                '<td>' + val.name + '</td></tr></tbody>',
                                '<td>' + val.owner + '</td></tr></tbody>',
                        ])  .draw();
                        
                    });
                    $('.klikBudgetExpense').on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var id = $this.data("id");
                        var name = $this.data("name");
                        $("#BudgetExpenseId").val(id);
                        $("#BudgetExpenseName").val(name);

                    });
                }
            });
        });

    });
</script>