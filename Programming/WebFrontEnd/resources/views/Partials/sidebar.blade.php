<aside class="main-sidebar sidebar-{{ $ColorMode }}-primary elevation-2">

    <div class="sidebar" style="height: 80%;">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/AdminLTE-master/dist/img/logo_no_name.svg" class="img-circle elevation-2" alt="User Image" style="padding:3px;background-color:white;margin-top:5px;height:33.59px !important;">
            </div>
            <div class="info">
                <h3><a href="#" class="d-block" style="position: relative;top:7px;">ERP QDC</a></h3>
            </div>
        </div>

        <nav class="mt-2" >

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(isset($privilageMenu))
                    @foreach($privilageMenu as $MenuLayouts)
                    <li class="nav-item has-treeview" style="position: relative;left:2px;">
                        <a href="#" class="nav-link">
                            <i class="nav-icon-sm {{ $MenuLayouts['entities']['iconSource'] }}" style="color:#e9ecef;"></i>
                            <label>
                                &nbsp; {{ $MenuLayouts['entities']['caption'] }}
                            </label>
                            <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            @foreach($MenuLayouts['entities']['itemList'] as $MenuLayouts2)
                                <li class="nav-item">

                                    @if($MenuLayouts2['entities']['caption'] == "Transaction" || $MenuLayouts2['entities']['caption'] == "Report")
                                    <a href="#" class="nav-link">&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>{{ $MenuLayouts2['entities']['caption'] }}</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @foreach($MenuLayouts2['entities']['itemList'] as $MenuLayouts3)
                                            <li class="nav-item">
                                                @php $url = "login"; @endphp
                                                @if(isset($MenuLayouts3['entities']['URLPath']))
                                                    @php $url = $MenuLayouts3['entities']['URLPath']; @endphp
                                                @endif
                                                <a href="{{ route($url) }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <i class="nav-icon-sm far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                    <label>{{ $MenuLayouts3['entities']['caption'] }}</label>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @else
                                    
                                        @if(isset($MenuLayouts2['entities']['itemList']))
                                    
                                            <a href="#" class="nav-link">&nbsp;
                                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                                <label>{{ $MenuLayouts2['entities']['caption'] }}</label>
                                                <i class="right fas fa-angle-left"></i>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                @foreach($MenuLayouts2['entities']['itemList'] as $MenuLayouts3)
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                                        <label>{{ $MenuLayouts3['entities']['caption'] }}</label>
                                                        <i class="right fas fa-angle-left"></i>
                                                    </a>
                                                    <ul class="nav nav-treeview">
                                                        @if(isset($MenuLayouts3['entities']['itemList']))
                                                            @foreach($MenuLayouts3['entities']['itemList'] as $MenuLayouts4)
                                                                <li class="nav-item">
                                                                    @php $url = "login"; @endphp
                                                                    @if(isset($MenuLayouts4['entities']['URLPath']))
                                                                        @php $url = $MenuLayouts4['entities']['URLPath']; @endphp
                                                                    @endif
                                                                    <a href="{{ route($url) }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <i class="nav-icon-sm far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                                        <label>{{ $MenuLayouts4['entities']['caption'] }}</label>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </li>
                                                @endforeach 
                                            </ul>

                                        @else
                                            @if($MenuLayouts2['entities']['caption'] != "Login" && $MenuLayouts2['entities']['caption'] != "Logout")
                                                @php $url = "login"; @endphp
                                                @if(isset($MenuLayouts2['entities']['URLPath']))
                                                    @php $url = $MenuLayouts2['entities']['URLPath']; @endphp
                                                @endif
                                                <a href="{{ route($url) }}?var=1" class="nav-link">&nbsp;
                                                    <i class="nav-icon-sm far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                    <label>{{ $MenuLayouts2['entities']['caption'] }}</label>
                                                </a>
                                            @endif
                                        @endif
                                    @endif
                                </li>

                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                @endif
            </ul>
        </nav>
    </div>

    <div class="user-panel mt-0 pb-0 mb-0 d-flex sidebar-{{ $ColorMode }}-primary" style="text-align:center;height:20%;border-top:2px white solid;">
        <div class="card-body sidebar">
            <hr>
            <a href="#" class="d-block" style="font-size:15px;">
                <h1><b>{{ $CountDocumentWorkflowComposer ?? '-' }}</b></h1>
            </a>
            <a href="#" class="d-block" style="font-size:15px;">
                <h5>Document to Process</h5>
            </a>
            <a href="{{ route('MyDocument.index') }}">
                <span class="btn btn-default btn-sm"> Go to Document</span>
            </a>
            <br><br>
        </div>
    </div>

</aside>