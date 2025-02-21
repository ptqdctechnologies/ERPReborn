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



            <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview" style="position: relative;left:2px;">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-home" style="color:#e9ecef;"></i>
                        <label>
                            Home
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Document</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('CheckDocument.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Check Document</label>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('MyDocument.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>My Document</label>

                                    </a>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview" style="position: relative;left:2px;">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-shopping-basket" style="color:#e9ecef;"></i>
                        <label>
                            Budget
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Input Budget</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Modify Budget</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </li>

                <li class="nav-item has-treeview" style="position: relative;left:2px;">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-users" style="color:#e9ecef;"></i>
                        <label>
                            Human Resource
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Salary Allocation</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview" style="position: relative;left:2px;">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-credit-card" style="color:#e9ecef;"></i>
                        <label>
                            Finance
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Financial Report</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Loan</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Loan Settlement</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Tax Recon</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Debit Note</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Credit Note</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>General Journal</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview" style="position: relative;left:2px;">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-chart-line" style="color:#e9ecef;"></i>
                        <label>
                            Sales
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Customer Order</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Invoice</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Payment Receive</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview" style="position: relative;left:2px;">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-hourglass-start" style="color:#e9ecef;"></i>
                        <label>
                            &nbsp;Process
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Advance Request</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.ReportAdvanceSummary') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Advance Summary</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.ReportAdvanceSummaryDetail') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Advance Report Detail</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Advance Request</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Advance Settlement</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceSettlement.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Advance Settlement</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Business Trip Request</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('BusinessTripRequest.index') }}?var=1" class=" nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Business Trip Request</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Business Trip Settlement</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('BusinessTripSettlement.index') }}?var=1" class=" nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Business Trip Settlement</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Reimbursement</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-cart-arrow-down" style="color:#e9ecef;"></i>
                        <label>
                            Purchase
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Material Service Request</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                        <li class="nav-item">
                                            <a href="{{ route('PurchaseRequisition.ReportPurchaseRequisitionSummary') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Purchase Order Summary</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>

                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('PurchaseRequisition.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Purchase Requisition</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Purchase Order</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                        <li class="nav-item">
                                            <a href="{{ route('PurchaseOrder.ReportPurchaseOrderSummary') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Purchase Order Summary</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('PurchaseOrder.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Purchase Order</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Order Picking</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('OrderPicking.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Order Picking</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Account Payable</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Payment Supplier</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-warehouse" style="color:#e9ecef;"></i>
                        <label>
                            Inventory
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>



                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Delivery Order Request</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('DeliveryOrderRequest.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Delivery Order Request</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Delivery Order</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('DeliveryOrder.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Delivery Order</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Material Receive</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('MaterialReceive.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Material Receive</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Material Return</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('MaterialReturn.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Material Return</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-registered" style="color:#e9ecef;"></i>
                        <label>
                            &nbsp;Register
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('PrivilageMenu.index') }}" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Privilage Menu</label>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Master COA</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Master Employee</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('Product.index') }}?var=1" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Master Product</label>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('Warehouse.index') }}?var=1" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Master Warehouse</label>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Master Supplier</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Master Bank</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Master Customer</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Asset Register</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Transaction Code </label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-user" style="color:#e9ecef;"></i>
                        <label>
                            &nbsp;Admin
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Master Budget </label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Workflow Approval </label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Closing Budget </label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Closing Periode </label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nafile:///home/mulyadi/Downloads/sidebar.blade.phpv nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul> -->
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