<aside class="main-sidebar sidebar-{{ $ColorMode }}-primary elevation-2">
    <div class="sidebar" style="height: 80%;">
        <div class="user-panel mt-3 d-flex align-items-center">
            <div class="image">
                <img src="/AdminLTE-master/dist/img/logo_no_name.svg" class="img-circle elevation-2" alt="User Image"
                    style="padding:3px;background-color:white;margin-top:5px;height:33.59px !important;" />
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
                @foreach($privilageMenu as $group)
                    @php
                        $groupEntity = $group['entities'];

                        $groupCaption = $groupEntity['menuGroupCaption'] ?? '';
                        $groupIcon = $groupEntity['menuGroupIconSource'] ?? 'far fa-circle';
                        $subGroups = $groupEntity['itemList'] ?? [];

                        // Depth 0
                        $groupPadding = 0;
                    @endphp

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link"
                            style="padding-left: {{ $groupPadding }}px; padding-top:.5rem; padding-bottom:.5rem;">
                            <i class="nav-icon {{ $groupIcon }}"></i>
                            <p>
                                {{ $groupCaption }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        @if(count($subGroups))
                            <ul class="nav nav-treeview">
                                @foreach($subGroups as $subGroup)
                                    @php
                                        $subEntity = $subGroup['entities'];

                                        $subCaption = $subEntity['menuSubGroupCaption'] ?? '';
                                        $menus = $subEntity['itemList'] ?? [];

                                        // Depth 1
                                        $subPadding = 25;

                                        // Icon Mapping
                                        $iconMap = [
                                            'Transaction' => 'fas fa-exchange-alt',
                                            'Report' => 'fas fa-chart-bar',
                                            'Master Data' => 'fas fa-database',
                                        ];

                                        $subIcon = $iconMap[$subCaption] ?? 'far fa-folder';
                                    @endphp

                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link"
                                            style="padding-left: {{ $subPadding }}px; padding-top:.5rem; padding-bottom:.5rem;">
                                            <i class="nav-icon {{ $subIcon }}"></i>
                                            <p>
                                                {{ $subCaption }}
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>

                                        @if(count($menus))
                                            <ul class="nav nav-treeview">
                                                @foreach($menus as $menu)
                                                    @php
                                                        $entity = $menu['entities'];

                                                        $caption = $entity['menuCaption'] ?? '';

                                                        // Skip Login & Logout
                                                        if (in_array($caption, ['Login', 'Logout'])) {
                                                            continue;
                                                        }

                                                        // Hanya tampilkan menu yang diizinkan
                                                        // if (!$entity['signAllowedAccess']) {
                                                        //     continue;
                                                        // }

                                                        $url = $entity['menuURLPath'] ?? null;

                                                        if ($url && \Illuminate\Support\Facades\Route::has($url)) {
                                                            $finalUrl = route($url);
                                                        } elseif ($url) {
                                                            $finalUrl = url($url);
                                                        } else {
                                                            $finalUrl = '#';
                                                        }

                                                        $isActive = $url
                                                            ? request()->is(trim($url, '/') . '*')
                                                            : false;

                                                        // Depth 2
                                                        $menuPadding = 30;
                                                    @endphp

                                                    <li class="nav-item">
                                                        <a href="{{ $finalUrl }}" class="nav-link {{ $isActive ? 'active' : '' }}"
                                                            style="padding-left: {{ $menuPadding }}px; padding-top:.5rem; padding-bottom:.5rem;">
                                                            <p>{{ $caption }}</p>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>

    <div class="user-panel mt-0 pb-0 mb-0 d-flex sidebar-{{ $ColorMode }}-primary"
        style="text-align:center;height:20%;border-top:2px white solid;">
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