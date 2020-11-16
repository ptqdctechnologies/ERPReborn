<!--|----------------------------------------------------------------------------------|
    |                               Function My Requester                              |
    |----------------------------------------------------------------------------------|-->
    <div id="myRequester" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Requester</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td><input type="text" class="form-control" id="username" placeholder="Name"></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0" style="height: 500px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i = 0; $i < 20; $i++)
                                            <tr>
                                                <td><span class="tag tag-success tombolRequest"><p id="kata4" data-dismiss="modal"> Pending {{$i}}</p></span></td>
                                                <td><p id="kata5">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</p></td>
                                            </tr>
                                            @endfor
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
    |                             End Funtion My Requester                             |
    |----------------------------------------------------------------------------------|-->