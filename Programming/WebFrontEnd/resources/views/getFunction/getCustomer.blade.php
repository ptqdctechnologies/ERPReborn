<div id="myCustomer" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Customer</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetCustomer">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Customer Code</th>
                                            <th>Customer Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1 @endphp
                                        @foreach($data3 as $datas)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td data-dismiss="modal" class="klikCustomer" data-id="{{$datas['code']}}" data-name="{{$datas['fullName']}}">{{$datas['code']}}</td>
                                            <td>{{$datas['fullName']}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--|----------------------------------------------------------------------------------|
    |                            End Function My Project Code                          |
    |----------------------------------------------------------------------------------|-->

<script>

    // $('#tableGetSite').empty();

    $(function() {
        $('.klikCustomer').on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            var code = $this.data("id");
            var name = $this.data("name");
            $("#var_customer").val(code);
            $("#var_customer2").val(name);
        });

    });
</script>