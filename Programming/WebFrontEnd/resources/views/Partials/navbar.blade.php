<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="height:35px;padding-top:14px;">
    <ul class="navbar-nav">
        <li class="nav-item">
            <br>
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <br>&nbsp;&nbsp;&nbsp;&nbsp;
            <span id="clock"></span>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">      
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('AdminLTE-master/dist/img/user.png')}}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">IT PT QDC</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header bg-secondary">
                    <img src="{{ asset('AdminLTE-master/dist/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
                    <p>
                        {{Session::get('SessionLoginName')}}
                        <small>Member since Oct. 2020</small>
                    </p>
                </li>
                
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-sm">Profile</a>
                    <a href="{{ route('logout') }}" class="btn btn-default btn-sm float-right">Sign out</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>