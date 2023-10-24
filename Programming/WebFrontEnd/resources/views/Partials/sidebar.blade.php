<aside class="main-sidebar sidebar-dark-primary elevation-2">

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/AdminLTE-master/dist/img/favicon.ico" class="img-circle elevation-2" alt="User Image" style="padding:3px;background-color:white;margin-top:5px;">
            </div>
            <div class="info">
                <h3><a href="#" class="d-block" style="position: relative;top:7px;">ERP QDC</a></h3>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
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
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('MyDocument.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>My Document</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    @if(in_array("Module.Finance.Advance.Transaction.Create", Session::get('privilageMenu'), TRUE) || in_array("Module.Finance.AdvanceSettlement.Transaction.Create", Session::get('privilageMenu'), TRUE) || in_array("Module.HumanResource.PersonBusinessTrip.Transaction.Create", Session::get('privilageMenu'), TRUE) || in_array("Module.HumanResource.PersonBusinessTripSettlement.Transaction.Create", Session::get('privilageMenu'), TRUE))
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-shopping-basket" style="color:#e9ecef;"></i>
                        <label>
                            Advance
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    @endif
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            @if(in_array("Module.Finance.Advance.Transaction.Create", Session::get('privilageMenu'), TRUE) || in_array("Module.Finance.AdvanceSettlement.Transaction.Create", Session::get('privilageMenu'), TRUE))
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Advance</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            @endif
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @if(in_array("Module.Finance.AdvanceSettlement.Transaction.Create", Session::get('privilageMenu'), TRUE))
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.ReportAdvanceSummary') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Advance Summary</label>
                                            </a>
                                        </li>
                                        @endif
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
                                        @if(in_array("Module.Finance.Advance.Transaction.Create", Session::get('privilageMenu'), TRUE))
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Advance Request</label>
                                            </a>
                                        </li>
                                        @endif
                                        @if(in_array("Module.Finance.AdvanceSettlement.Transaction.Create", Session::get('privilageMenu'), TRUE))
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceSettlement.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Advance Settlement</label>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if(in_array("Module.HumanResource.PersonBusinessTrip.Transaction.Create", Session::get('privilageMenu'), TRUE) || in_array("Module.HumanResource.PersonBusinessTripSettlement.Transaction.Create", Session::get('privilageMenu'), TRUE))
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Business Trip</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            @endif
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
                                        @if(in_array("Module.HumanResource.PersonBusinessTrip.Transaction.Create", Session::get('privilageMenu'), TRUE))
                                        <li class="nav-item">
                                            <a href="{{ route('BusinessTripRequest.index') }}?var=1"" class=" nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Business Trip Request</label>
                                            </a>
                                        </li>
                                        @endif
                                        @if(in_array("Module.HumanResource.PersonBusinessTripSettlement.Transaction.Create", Session::get('privilageMenu'), TRUE))
                                        <li class="nav-item">
                                            <a href="{{ route('BusinessTripSettlement.index') }}?var=1"" class=" nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Business Trip Settlement</label>
                                            </a>
                                        </li>
                                        @endif
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
                    @if(in_array("Module.HumanResource.Timesheet.Transaction.Create", Session::get('privilageMenu'), TRUE))
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-users" style="color:#e9ecef;"></i>
                        <label>
                            Human Resources
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    @endif

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Salary</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if(in_array("Module.HumanResource.Timesheet.Transaction.Create", Session::get('privilageMenu'), TRUE))
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Timesheet</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            @endif
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
                                <label>PR Reallocation</label>
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
                                            <a href="{{ route('iSupp.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                    @if(in_array("Module.SupplyChain.Procurement.PurchaseRequisition.Transaction.Create", Session::get('privilageMenu'), TRUE) || in_array("Module.SupplyChain.Procurement.PurchaseOrder.Transaction.Create", Session::get('privilageMenu'), TRUE))
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-cart-arrow-down" style="color:#e9ecef;"></i>
                        <label>
                            Purchase
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    @endif
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if(in_array("Module.SupplyChain.Procurement.PurchaseRequisition.Transaction.Create", Session::get('privilageMenu'), TRUE))
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Purchase Requisition</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            @endif
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
                                        @if(in_array("Module.SupplyChain.Procurement.PurchaseRequisition.Transaction.Create", Session::get('privilageMenu'), TRUE))
                                        <li class="nav-item">
                                            <a href="{{ route('PurchaseRequisition.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Purchase Requisition</label>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @if(in_array("Module.SupplyChain.Procurement.PurchaseOrder.Transaction.Create", Session::get('privilageMenu'), TRUE))
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Purchase Order</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            @endif
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
                                        @if(in_array("Module.SupplyChain.Procurement.PurchaseOrder.Transaction.Create", Session::get('privilageMenu'), TRUE))
                                        <li class="nav-item">
                                            <a href="{{ route('PurchaseOrder.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Purchase Order</label>
                                            </a>
                                        </li>
                                        @endif
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
                                <label>PPN Reimbursement</label>
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
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-chart-line" style="color:#e9ecef;"></i>
                        <label>
                            Admin
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="position: relative;bottom:130px;background-color:#4B586A;text-align:center;color:white;padding-top:40px;border-top:2px white solid">
        <div class="card-body">
            <h1><b>{{ Session::get('SumDocumentWorkflow') }}</b></h1>
            <h5>Document to Process</h5>
            <a href="{{ route('MyDocument.index') }}">
                <span class="btn btn-default btn-sm"> Go to Document</span>
            </a>
            <br><br>
        </div>
    </div>

</aside>