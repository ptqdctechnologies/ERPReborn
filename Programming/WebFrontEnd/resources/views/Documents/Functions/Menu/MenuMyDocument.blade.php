<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title">
                    <ul class="navbar-nav ml-auto left">
                        <li class="nav-item dropdown user-menu">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="color:#4B586A;font-size:12px;height:12px;">
                                <span style="position:relative;bottom:5px;"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"> SELECT ACTION </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-left" style="padding: 10px;font-size:14px;background-color:#4B586A;margin-top:8px;">
                                @if(in_array("Module.Finance.Advance.Transaction.Create", Session::get('privilageMenu'), TRUE))
                                <li class="nav-item">
                                    <a href="{{ route('AdvanceRequest.index') }}" class="nav-link" style="color:white;padding-bottom:10px;">
                                        <i class="far fa-file nav-icon-sm"> Show My Submitted Document</i>
                                    </a>
                                </li>
                                @endif
                                @if(in_array("Module.Finance.Advance.Transaction.Edit", Session::get('privilageMenu'), TRUE))
                                <li class="nav-item">
                                    <a class="nav-link myPopUpArfRevision" data-toggle="modal" data-target="#myPopUpArfRevision" style="color:white;padding-bottom:10px;">
                                        <i class="far fa-file nav-icon-sm"> Show My Approved Document</i>
                                    </a>
                                </li>
                                @endif
                                @if(in_array("Module.Finance.Advance.Transaction.Edit", Session::get('privilageMenu'), TRUE))
                                <li class="nav-item">
                                    <a class="nav-link myPopUpArfRevision" data-toggle="modal" data-target="#myPopUpArfRevision" style="color:white;padding-bottom:10px;">
                                        <i class="far fa-file nav-icon-sm"> Show Document in My Workflow</i>
                                    </a>
                                </li>
                                @endif
                                @if(in_array("Module.Finance.Advance.Transaction.Edit", Session::get('privilageMenu'), TRUE))
                                <li class="nav-item">
                                    <a class="nav-link myPopUpArfRevision" data-toggle="modal" data-target="#myPopUpArfRevision" style="color:white;padding-bottom:10px;">
                                        <i class="far fa-file nav-icon-sm"> Show My Document History</i>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </label>
            </div>
        </div>
    </div>
</div>