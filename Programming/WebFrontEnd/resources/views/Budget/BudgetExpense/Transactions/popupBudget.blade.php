<div id="popupBudget" class="modal fade" role="dialog" style="margin-top: 250px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-body">
                    <form action="{{ route('BudgetExpense.index') }}" method="GET">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td><label style="margin-left: 85px;">Budget</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="BudgetId" name="BudgetId" type="hidden" class="form-control">
                                                    <input required="" id="BudgetName" style="border-radius:0;" name="BudgetName" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#mySearchBudget1" class="fas fa-gift Budget" style="color:grey;"></i></a>
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
        $('.Budget').on('click', function(e) {
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
                    var t = $('#tableBudget').DataTable();
                    $.each(data, function(key, val) {
                        t.row.add([
                                '<tbody><tr><td>' + no++ + '</td>',
                                '<td><span data-dismiss="modal" class="klikBudget" data-id="' + val.sys_ID + '" data-name="' + val.documentNumber + '">' + val.sys_ID + '</span></td>',
                                '<td>' + val.documentNumber + '</td></tr></tbody>'
                        ])  .draw();
                        
                    });
                    $('.klikBudget').on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        var id = $this.data("id");
                        var name = $this.data("name");
                        $("#BudgetId").val(id);
                        $("#BudgetName").val(name);

                    });
                }
            });
        });

    });
</script>