<!-- MENU -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <label class="card-title">
                    <ul class="navbar-nav ml-auto left">
                        <li class="nav-item dropdown user-menu">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="color:#4B586A;font-size:12px;padding:2px;cursor:pointer;">
                                <span style="position:relative;cursor:pointer;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="25" alt="add" style="border: 1px solid #ced4da;padding: 2px 4px;border-radius:3px;" /> 
                                    SELECT ACTION
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-left" style="padding: 10px;font-size:14px;background-color:#4B586A;margin-top:8px;">
                                <li class="nav-item">
                                    <a href="{{ route('DebitNote.index') }}" class="nav-link" style="color:white;padding-bottom:10px;">
                                        <i class="far fa-file nav-icon-sm"> Create Debit Note</i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="modal" data-target="#myPopUpDebitNote" style="color:white;padding-bottom:10px;cursor:pointer;">
                                        <i class="far fa-file nav-icon-sm"> Revision Debit Note</i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </label>
            </div>
        </div>
    </div>
</div>