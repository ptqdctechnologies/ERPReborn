<aside class="main-sidebar sidebar-{{ $ColorMode }}-primary elevation-2">
    <div class="sidebar" style="height: 80%;">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/AdminLTE-master/dist/img/logo_no_name.svg" class="img-circle elevation-2" alt="User Image" style="padding:3px;background-color:white;margin-top:5px;height:33.59px !important;" />
            </div>
            <div class="info">
                <h3>
                    <a href="#" class="d-block" style="position: relative;top:7px;">ERP QDC</a>
                </h3>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @php
                    $renderMenu = function ($menus) use (&$renderMenu) {
                        foreach ($menus as $menu) {

                            if (!isset($menu['entities'])) continue;

                            $caption = $menu['entities']['caption'] !== 'Reimbursement to Debit Note' && 
                                $menu['entities']['caption'] !== 'Period' &&
                                $menu['entities']['caption'] !== 'Workflow Route' &&
                                $menu['entities']['caption'] !== 'Report Modify Budget Summary' &&
                                $menu['entities']['caption'] !== 'Report BusinessTrip Settlement Summary' &&
                                $menu['entities']['caption'] !== 'Religion' &&
                                $menu['entities']['caption'] !== 'Person Work Time Sheet' &&
                                $menu['entities']['caption'] !== 'Warehouse' &&
                                $menu['entities']['caption'] !== 'Report Material Return Summary' &&
                                $menu['entities']['caption'] !== 'Supplier' &&
                                $menu['entities']['caption'] !== 'Report Purchase Requisition Summary' &&
                                $menu['entities']['caption'] !== 'Report Purchase Requisition To Purchase Order'
                                ? $menu['entities']['caption'] : null;
                            $hasChildren = isset($menu['entities']['itemList']) && count($menu['entities']['itemList']) > 0;

                            // 🚀 RULE: kalau caption kosong / tidak mau ditampilkan → skip node, langsung render child
                            if (empty($caption) && $hasChildren) {
                                $renderMenu($menu['entities']['itemList']);
                                continue;
                            }

                            // skip Login & Logout
                            if (in_array($caption, ['Login','Logout'])) continue;

                            $url = $menu['entities']['URLPath'] ?? 'login';
                            $icon = $menu['entities']['iconSource'] ?? 'far fa-circle';

                            // URL handling aman
                            if (Route::has($url)) {
                                $finalUrl = route($url);
                            } else {
                                $finalUrl = url($url);
                            }
                @endphp

                <li class="nav-item {{ $hasChildren ? 'has-treeview' : '' }}">
                    <a href="{{ $hasChildren ? '#' : $finalUrl . '' }}" class="nav-link">
                        <i class="nav-icon-sm {{ $icon }}" style="color:#e9ecef;"></i>
                        <p>
                            {{ $caption }}
                            @if($hasChildren)
                                <i class="right fas fa-angle-left"></i>
                            @endif
                        </p>
                    </a>

                    @if($hasChildren)
                        <ul class="nav nav-treeview">
                            @php $renderMenu($menu['entities']['itemList']); @endphp
                        </ul>
                    @endif
                </li>

                @php
                        }
                    };
                @endphp

                @if(isset($privilageMenu))
                    @php $renderMenu($privilageMenu); @endphp
                @endif
            </ul>
        </nav>
    </div>

    <div class="user-panel mt-0 pb-0 mb-0 d-flex sidebar-{{ $ColorMode }}-primary" style="text-align:center;height:20%;border-top:2px white solid;">
        <div class="card-body sidebar">
            <hr>
            <a href="javascript:;" class="d-block" style="font-size:15px;">
                <h1><b id="document_count" style="display: none;">0</b></h1>
                <div id="loading_document_count" class="spinner-border spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </a>
            <a href="javascript:;" class="d-block" style="font-size:15px;">
                <h5>Document to Process</h5>
            </a>
            <a href="{{ route('MyDocument.index') }}">
                <span class="btn btn-default btn-sm"> Go to Document</span>
            </a>
            <br><br>
        </div>
    </div>
</aside>
