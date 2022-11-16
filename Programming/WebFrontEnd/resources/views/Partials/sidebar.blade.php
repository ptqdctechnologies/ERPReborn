<br>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home.dashboard') }}" class="brand-link">
        <img src="/AdminLTE-master/dist/img/favicon.ico" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="padding:3px;background-color:white;margin-top:5px;">
        <span class="brand-text font-weight-light"><label for="">ERP QDC</label></span>
    </a>
    <div class="sidebar">
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
                                    <a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>My Document</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Show My Submitted Document</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Show My Approved Document</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceSettlement.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Show Document in My Workflow</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#asfNumberPopup">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Show My Document History</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('home.checkDocument') }}" class="nav-link">&nbsp;&nbsp;&nbsp;
                                        <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                        <label>Check Document</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('home.dashboard') }}" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Project Dashboard</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                        </li>
                    </ul>


                    <!-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm far fa-folder-open" style="color:#e9ecef;"></i>
                        <label>
                            Master Data
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('BloodAglutinogenType.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Blood Aglutinogen</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('BusinessDocument.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Business Document</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Business Document Authorization Current Stage</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Business Document Authorization Current History</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Business Document Numbering</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Business Document Numbering Format</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Business Document Tmp</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('BusinessDocumentType.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Business Document Type</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('BusinessDocumentVersion.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Business Document Version</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Business Document Version Tmp</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Citizen Family Card</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Citizen Family Card Member</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Citizen Identity</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Citizen Identity Card</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Country.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Country</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('CountryAdministrativeAreaLevel1.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Country Administrative Area Level 1</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('CountryAdministrativeAreaLevel2.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Country Administrative Area Level 2</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('CountryAdministrativeAreaLevel3.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Country Administrative Area Level 3</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('CountryAdministrativeAreaLevel4.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Country Administrative Area Level 4</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Currency.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Currency</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Currency Exchange Rate Central Bank</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Currency Exchange Rate Tax</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Day Off Government Policy</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Day Off National</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Day Off Regional</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Goods Model</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Institution</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Institution Branch</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Institution Type</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Periode</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Person</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Person Account EMail</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Person Account Social Media</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Periode.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Person Gender</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ProductType.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Product</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ProductType.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Product Type</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ProductType.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Quantity Unit</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Religion.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Religion</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Currency.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Social Media</label>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Country.index') }}" class="nav-link">
                                <i class="nav-icon-sm fas fa-file" style="color:#e9ecef;"></i>
                                <label>Trade Mark</label>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-calculator" style="color:#e9ecef;"></i>
                        <label>
                            Accounting
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>AP</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('editApNumber.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Edit AP Number</label>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('editApJournal.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Edit AP Journal</label>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('editApBankJournal.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Edit AP Bank Journal</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                <label>Bank Transaction</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>

                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                <label>OCA</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Advance Request</label>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-shopping-basket" style="color:#e9ecef;"></i>
                        <label>
                            Advance
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Advance</label>
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
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Advance Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Advance Summary Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceSettlement.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Advance Settlement Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#asfNumberPopup">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Advance Settlement Summary Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#asfNumberPopup">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Advance to Settlement Report</label>
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
                                <label>Business Trip</label>
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
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Business Trip Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Business Trip Summary Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceSettlement.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Business Trip Settlement Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#asfNumberPopup">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Business Trip Settlement Summary Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#asfNumberPopup">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Business Trip to Settlement Report</label>
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
                                            <a href="{{ route('BusinessTripRequest.index') }}?var=1"" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Business Trip Request</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('BusinessTripSettlement.index') }}?var=1"" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Reimbursement Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Reimbursement Summary Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceSettlement.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Debit Note Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#asfNumberPopup">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Debit Note Summary Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#asfNumberPopup">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Reimbursement to Debit Note Report</label>
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
                                            <a href="{{ route('ReimbursableExpenditure.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Reimbursement</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#brfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Reimbursement Revision</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('BusinessTripSettlement.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Debit Note</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#bsfNumberPopup">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Debit Note Revision</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fa fa-building" style="color:#e9ecef;"></i>
                        <label>
                            Bank
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                <label>Report</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                <label>Transaction</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('bankReceiveMoney.index') }}" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                        <label>Bank Receive Money</label>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('editBankReceiveMoney.index') }}" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                        <label>Edit Bank Receive Money</label>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('bankSpendMoney.index') }}" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                        <label>Bank Spend Money</label>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('bankSpendMoney.index') }}" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                        <label>Edit Bank Spend Money</label>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('bankChargers.index') }}" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                        <label>Bank Chargers Money</label>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('bankChargers.index') }}" class="nav-link">
                                        <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                        <label>Edit Bank Chargers Money</label>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm far fa-money-bill-alt" style="color:#e9ecef;"></i>
                        <label>
                            Budget
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                <label>Budget</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Budget Report</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('Budget.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Budget</label>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#popupBudget">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Budget Expense</label>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('BudgetExpenseGroup.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Budget Expense Group</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#popupBudgetExpenseLine">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Budget Expense Line</label>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#popupBudgetExpenseLineCeiling">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Budget Expense Line Ceiling</label>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#popupBudgetExpenseLineCeilingObjects">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Budget Expense Ceiling Objects</label>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('BudgetType.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Budget Type</label>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('CodeOfBudgeting.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Code of Budgeting</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                <label>Modification Budget</label>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                        <label>Report</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Modification Budget Report</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon-sm fas fa-folder" style="color:#e9ecef;"></i>
                                        <label>Transaction</label>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Modification Budget</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Modification Budget Revision</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon-sm fas fa-users" style="color:#e9ecef;"></i>
                        <label>
                            Human Resources
                        </label>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">&nbsp;
                                <i class="nav-icon-sm fas fa-arrow-circle-right" style="color:#e9ecef;"></i>
                                <label>Piece Meal</label>
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
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Piece Meal Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Piece Meal Summary Report</label>
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
                                            <a href="{{ route('PieceMeal.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Piece Meal</label>
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
                                <label>Salary</label>
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
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Salary Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Salary Summary Report</label>
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
                                            <a href="{{ route('PieceMeal.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Salary</label>
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
                                <label>Timesheet</label>
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
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Timesheet Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Timesheet Summary Report</label>
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
                                            <a href="{{ route('Timesheet.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Timesheet</label>
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
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>PR Reallocation Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>PR Reallocation Summary Report</label>
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
                                            <a href="{{ route('PieceMeal.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>PR Reallocation</label>
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
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Delivery Order Request Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Delivery Order Request Summary Report</label>
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
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Delivery Order Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Delivery Order Summary Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>DO to DOR Report</label>
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
                                <label>Purchase Requisition</label>
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
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Purchase Requisition Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Purchase Requisition Summary Report</label>
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
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Purchase Order Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Purchase Order Summary Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>PR to PO Report</label>
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
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Account Payable Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Account Payable Summary Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>PO to AP Report</label>
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
                                                <label>Account Payable</label>
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
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>PPN Reimbursement Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>PPN Reimbursement Summary Report</label>
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
                                                <label>PPN Reimbursement</label>
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
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Customer Order Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Customer Order Summary Report</label>
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
                                            <a href="{{ route('CO.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Customer Order</label>
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
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('AdvanceRequest.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Invoice Detail Report</label>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-toggle="modal" data-target="#arfNumberPopUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Invoice Summary Report</label>
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
                                            <a href="{{ route('CO.index') }}?var=1" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <i class="far fa-file nav-icon-sm" style="color:#e9ecef;"></i>
                                                <label>Invoice</label>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>