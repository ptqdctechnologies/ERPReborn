@include('ProcurementAndCommercial.Transactions.ARF.popupRevisionARF')
@include('ProcurementAndCommercial.Transactions.ASF.popupRevisionASF')
@include('ProcurementAndCommercial.Transactions.BRF.popupRevisionBRF')
@include('ProcurementAndCommercial.Transactions.BSF.popupRevisionBSF')
@include('ProcurementAndCommercial.Transactions.PPM.popupRevisionPPM')
@include('Logistic.Transactions.MaterialReceive.popupRevisionMaterialReceive')
@include('ProcurementAndCommercial.Functions.searchArf')
@include('ProcurementAndCommercial.Functions.searchAsf')
@include('ProcurementAndCommercial.Functions.searchBrf')
@include('ProcurementAndCommercial.Functions.searchBsf')
@include('ProcurementAndCommercial.Functions.searchPpm')
@include('Logistic.Functions.searchMaterialReceive')

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home.projectDashboard') }}" class="brand-link">
        <img src="/AdminLTE-master/dist/img/favicon.ico" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><label for="">ERP QDC</label></span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-folder" style="color:#00FFFF;"></i>
                        <label>
                            Home
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Document</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>My Document</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('home.submittedDocument') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Show My Submitted Document</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('home.approvedDocument') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Show My Approved Document</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('home.documentWorkflow') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Show Document in My Workflow</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('home.checkDocument') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Show My Document History</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('home.checkDocument') }}" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Check Document</label>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home.projectDashboard') }}" class="nav-link">
                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                <label>Project Dashboard</label>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-folder" style="color:#00FFFF;"></i>
                        <label>
                            Procurement and Commercial
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Reports</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>ARF & ASF</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>ARF Aging</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>ARF Detail</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>ARF Summary</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>ARF to ASF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>ARF to ASF RSE</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>ASF Detail</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>ASF Summary</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Procurement Request</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Outstanding PR to PO</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Outstanding PR to PO (Details)</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>PR Detail</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>PR Summary</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>PR to DOR</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>PR to PO</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>PO & RPI</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Outstanding PO to RPI</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>PO Detail</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>PO Summary</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>PO Tax Summary</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>PO to RPI</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>PO to RPI - RSE</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>RPI Detail</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>RPI Summary</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Reimbursement</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Outstanding Reimbursement Debit Note Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Reimbursement Debit Note</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="../index2.html" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Transactions</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Advance Request Form</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ARF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New ARF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ARF</label>
                                            </a>
                                        </li>
                                    </ul>

                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Advance Settlement Form</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ASF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create ASF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#asfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ASF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Business Trip Request Form</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('BRF.createBRF') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create BRF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#brfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision BRF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Business Trip Settlement Form</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('BSF.createBSF') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create BSF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#bsfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision BSF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>PPN Reimbursement</label>
                                        <i class="right fas fa-angle-left"></i>

                                    </a>


                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('PPNRem.createPPNRem') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Add New PPN-REM</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit PPN-REM</label>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('PPNRem.createPPNRemSet') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Add New PPN-REM Settlement</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit PPN-REM Settlement</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Progress Piece Meal</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('PPM.addPPM') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Add Progress Piece Meal</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#ppmNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision PPM</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Procurement Request</label>
                                        <i class="right fas fa-angle-left"></i>

                                    </a>


                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('PR.createPR') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create PR</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit PPN-REM</label>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('PPNRem.createPPNRemSet') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Add New PPN-REM Settlement</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit PPN-REM Settlement</label>
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Purchase Order</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('PO.createPO') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create new PO</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('PO.createPOverhead') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create new PO (Overhead)</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('PO.createPOSales') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create new PO (Sales)</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit Existing PO</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit Existing PO (Overhead)</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit Existing PO (Sales)</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('PO.fileUploadPO') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>File Upload</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('PO.requestCancelPO') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Request Cancel PO</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit Remaks PO</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">

                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Reimbursement Expenditure</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('RE.createREtoCustomer') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create Reimbursement to Customer</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('PO.createPOverhead') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit Existing Reimbursement to Customer</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('RE.createPaymentRE') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create Payment Reimbursement</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit Existing Payment to Customer</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('RE.createDebitNote') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create Debit Note Reimbursement</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit Existing Debit Note Reimbursement</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('RE.createPaidDebitNote') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create Paid Debit Note Reimbursement</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('PO.requestCancelPO') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit Existing Paid Debit Note Reimbursement</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Request Payment for Invoice</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('RPI.createRPI') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create RPI</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('RPI.createRPIOverhead') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create RPI (Overhead)</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('RPI.createRPISales') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create RPI (Sales)</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit Existing RPI</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit Existing RPI (Overhead)</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit Existing RPI (Sales)</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('RPI.fileUpload') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>File Upload</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Update Request Price</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('URP.createURP') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create URP</label>
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
                        <i class="nav-icon-sm fas fa-folder" style="color:#00FFFF;"></i>
                        <label>
                            Project Management
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Reports</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Budget</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>BOQ3 Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Detail BOQ3</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Detail Project Budget</label>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Monthly Progress Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Project Budget</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Spend Budget Report</label>
                                            </a>
                                        </li>
                                    </ul>

                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>CFS List</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>CFS Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>General Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>General Report (Overhead)</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>S-Curve Report</label>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="../index2.html" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Transactions</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Budget</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon-sm fas fa-folder" style="color:#ADD8E6;"></i>
                                                <label>Approval For Expenditure</label>
                                                <i class="right fas fa-angle-left"></i>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="{{ route('AFE.createAFE') }}" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Create AFE</label>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('AFE.createAFESwitching') }}" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Create AFE - Switching Currency</label>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Edit Existing AFE</label>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Edit Existing AFE - Switching Currency</label>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon-sm fas fa-folder" style="color:#ADD8E6;"></i>
                                                <label>Project Budget</label>
                                                <i class="right fas fa-angle-left"></i>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="{{ route('PB.createProject') }}" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Create New Project</label>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('PB.createSiteProject') }}" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Add New Site on Project</label>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('PB.createProjectBudget') }}" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Input Project Budget</label>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Edit Existing Temporary BOQ3</label>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('PB.createNonProjectOverheadBudget') }}" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Input Non Project / Overhead Budget</label>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('PB.createBudgetPeriodeNonProject') }}" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Add New Budget Periode Non Project</label>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Edit Existing Site BOQ3</label>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Edit Existing CFS BOQ3</label>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon-sm fas fa-folder" style="color:#ADD8E6;"></i>
                                                <label>Register Customer PO</label>
                                                <i class="right fas fa-angle-left"></i>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="{{ route('RCPO.createRegisterCustomerOrder') }}" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Register New Customer Order</label>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('RCPO.editExistingCustomerOrder') }}" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Edit Existing Customer PO</label>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>All Pending Customer PO</label>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('PB.createNonProjectOverheadBudget') }}" class="nav-link">
                                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                        <label>Register Customer Order Report</label>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>CE Project/Site</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('CEPS.openProject') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Open Project</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('CEPS.closeProject') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Close Project</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Master CFS</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('MCFS.createCFSCode') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create CFS Code</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('MCFS.editCFSCode') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit CFS Code</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('MCFS.viewCFSList') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>View CFS Code</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">

                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Master Engineer Work</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('MEW.addMEW') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Add Enginer Work</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('MEW.editMEW') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Edit Enginer Work</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">

                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Project Progress</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('PP.createPP') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New Project Progress</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Timesheet</label>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-folder" style="color:#00FFFF;"></i>
                        <label>
                            Logistic
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Reports</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Delivery Order</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>DO Detail</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>DO Request Detail</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>DO Request Summary</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>DO Request to DO</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Outstanding DOR to DO </label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Material Receive</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Material Cancel</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Material Form Supplier</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Material Return</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Closing Inventory Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Current Inventory Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Fixed ATR</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Master List</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Master List (New Project)</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Price History Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Stock Card</label>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="../index2.html" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Transactions</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Closing</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ARF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New ARF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ARF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Delivery Order</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ARF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New ARF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ARF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Delivery Order Requester</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ARF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New ARF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ARF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Fixed Assets</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ARF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New ARF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ARF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Material Receive</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('MR.createMaterialReceive') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create Material Receive</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#materialReceiveNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision Material Receive</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Master List</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ARF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New ARF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ARF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Master Specialist Supplier</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ARF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New ARF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ARF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Master Supplier</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ARF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New ARF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ARF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Master Type Supplier</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ARF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New ARF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ARF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Master Unit Of Measurement</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ARF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New ARF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ARF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Master Warehouse</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ARF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New ARF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ARF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Master Cancel</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ARF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New ARF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ARF</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#ADFF2F;"></i>
                                        <label>Master Return</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('ARF.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Create New ARF</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                                <label>Revision ARF</label>
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
                        <i class="nav-icon-sm fas fa-folder" style="color:#00FFFF;"></i>
                        <label>
                            Finance
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Reports</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>AP Aging</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>AP Aging Original Currency</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>AP Aging Tax</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>AP Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>AR Aging</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>AR Aging Original Currency</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>AR Aging Tax</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>AR Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Balance Sheet</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Balance Sheet Closed</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Bank Charge Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Bank Payment Voucher Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Bank Receive Money Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>CO to Invoice</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Debit Note Aged Receivables</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Depreciation Fixed Asset Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Detail Journal Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>General Journal Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>General Ledger Detail Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Invoice</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Invoice Summary</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Journal Report</label>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Kas Bank Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Outstanding CIP</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Payment Final Detail</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Payment Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Profit & Loss</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Profil & Loss Closed</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>REM Aging</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Request Invoice to Invoice</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>RPC Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Settlement Journal Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Tax Recon Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Trial Balance</label>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Transactions</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>AP</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>ASF Journal</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Bank Payment Voucher</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Bank Transaction</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Cancel Invoice</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Cancel PO</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Cancel RPI</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Closing</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Depreciation Fixed Asset</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Exchange Rate</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>General Journal</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Inventory Adjustment</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Invoice</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Layout Balance Sheet</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Layout Profit and Loss</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Markup Limit For Door</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Master Bank</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Master COA</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Master COA-Bank</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Master COA Mapping</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Master Kategori Fixed Asset</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Master Periode</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Overhead Cost Charging</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Payment</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Petty Cash</label>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-folder" style="color:#00FFFF;"></i>
                        <label>
                            Human Resource
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Reports</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Timesheet Detail</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Timesheet Summary</label>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Transactions</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Timesheet Periode</label>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-folder" style="color:#00FFFF;"></i>
                        <label>
                            Sales
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Reports</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Customer Order Report</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Request Price Report</label>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Transactions</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Customer Order</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Master Customer</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Request Price</label>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-folder" style="color:#00FFFF;"></i>
                        <label>
                            Admin
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Menu</label>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Menu Management</label>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Setting</label>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>News</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Pulsa</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Transaction Number</label>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>User</label>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>User Management</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>User Role</label>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:yellow;"></i>
                                <label>Workflow</label>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Document</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Nominal Limit</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Notification</label>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#FF69B4;"></i>
                                        <label>Workflow</label>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>