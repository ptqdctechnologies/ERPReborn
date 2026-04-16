<aside class="main-sidebar sidebar-{{ $ColorMode }}-primary elevation-2">
    <div class="sidebar" style="height: 80%;">
        <div class="user-panel mt-3 d-flex align-items-center">
            <div class="image">
                <img src="/AdminLTE-master/dist/img/logo_no_name.svg" class="img-circle elevation-2" alt="User Image" style="padding:3px;background-color:white;margin-top:5px;height:33.59px !important;" />
            </div>
            <div class="info">
                <h3>
                    <a href="#" class="d-block" style="position: relative;top:7px;">ERP QDC</a>
                </h3>
            </div>
        </div>

        <hr class="my-4" style="background-color: white;" />

        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @php
                    $renderMenu = function ($menus, $depth = 0) use (&$renderMenu) {

                        foreach ($menus as $menu) {

                            if (!isset($menu['entities'])) continue;

                            $entities = $menu['entities'];

                            $caption = $entities['caption'] ?? null;
                            $children = $entities['itemList'] ?? [];
                            $hasChildren = !empty($children);

                            // Skip kosong
                            if (empty($caption) && $hasChildren) {
                                $renderMenu($children, $depth);
                                continue;
                            }

                            if (in_array($caption, ['Login','Logout'])) continue;

                            // 🎯 Icon Mapping
                            $iconMap = [
                                'Transaction' => 'fas fa-exchange-alt',
                                'Report' => 'fas fa-chart-bar',
                            ];

                            $icon = $entities['iconSource'] 
                                ?? ($iconMap[$caption] ?? 'far fa-circle');

                            // 🔗 URL
                            $url = $entities['URLPath'] ?? null;

                            if ($url && \Illuminate\Support\Facades\Route::has($url)) {
                                $finalUrl = route($url);
                            } elseif ($url) {
                                $finalUrl = url($url);
                            } else {
                                $finalUrl = '#';
                            }

                            // ⭐ Active
                            $isActive = $url ? request()->is(trim($url, '/').'*') : false;

                            // 🎯 Padding (parent = no indent)
                            $paddingLeft = 0; 
                            if ($depth === 0) {
                                $paddingLeft = 0;
                            } elseif ($depth === 1) {
                                $paddingLeft = 10 + ($depth * 15);
                            } else {
                                $paddingLeft = 0 + ($depth * 15);
                            }

                            // $depth === 0 ? 0 : $depth === 1 ? (10 + ($depth * 15)) : (15 + ($depth * 15));

                            // 🎯 Icon hanya sampai level 1
                            $showIcon = $depth <= 1;
                @endphp

                <li class="nav-item {{ $hasChildren ? 'has-treeview' : '' }} {{ $isActive ? 'menu-open' : '' }}">
                    <a href="{{ $hasChildren ? '#' : $finalUrl }}"
                    class="nav-link {{ $isActive ? 'active' : '' }}"
                    style="padding-left: {{ $paddingLeft }}px; padding-top:0.5rem; padding-bottom:0.5rem;">

                        @if($showIcon)
                            <i class="nav-icon {{ $icon }}"></i>
                        @endif

                        <p>
                            {{ $caption }}
                            @if($hasChildren)
                                <i class="right fas fa-angle-left"></i>
                            @endif
                        </p>
                    </a>

                    @if($hasChildren)
                        <ul class="nav nav-treeview">
                            @php $renderMenu($children, $depth + 1); @endphp
                        </ul>
                    @endif
                </li>

                @php
                        }
                    };
                @endphp

                {{-- Render --}}
                @if(!empty($privilageMenu))
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