<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <p class="brand-link text-center">

        <span class="brand-text font-weight-light text-yellow" style="text-transform:uppercase">{{ auth()->user()->getRoleNames()->first()}}</span>
    </p>
    <!-- Sidebar -->
    <div
        class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue" style="margin: 0px -8px;"></div>
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            {{-- <img src="{{ auth()->user()->avatarUrl() }}" class="img-circle elevation-2 h-100 "
                                 alt="User Image"> --}}
                        </div>
                        <div class="info">
                            <a  class="d-block">{{ auth()->user()->name }}</a>
                        </div>
                    </div>
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item  ">
                                <a href="{{ route('dashboard') }}" class="nav-link {{ Route::currentRouteName()  == 'dashboard' ? "active" : "" }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                             @role('admin')
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}" class="nav-link {{ Route::currentRouteName()  == 'categories.index' ? "active" : "" }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Categories
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('cinemas.index') }}" class="nav-link {{ Route::currentRouteName()  == 'cinemas.index' ? "active" : "" }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Cinemas
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('requests.index') }}" class="nav-link {{ Route::currentRouteName()  == 'requests.index' ? "active" : "" }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Requests
                                        </p>
                                    </a>
                                </li>

                            @endrole


                            @role('manager')
                                <li class="nav-item">
                                    <a href="{{ route('movies.index') }}" class="nav-link {{ Route::currentRouteName()  == 'movies.index' ? "active" : "" }} ">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Movies
                                        </p>
                                    </a>
                                </li>

                               
                                <li class="nav-item">
                                    <a href="{{ route('halls.index') }}" class="nav-link {{ Route::currentRouteName()  == 'halls.index' ? "active" : "" }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Halls
                                        </p>
                                    </a>
                                </li>
                               
                                <li class="nav-item">
                                    <a href="{{ route('shows.index') }}" class="nav-link {{ Route::currentRouteName()  == 'shows.index' ? "active" : "" }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Shows Control
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('shows.today') }}" class="nav-link {{ Route::currentRouteName()  == 'shows.today' ? "active" : "" }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Today Shows
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('times.index') }}" class="nav-link {{ Route::currentRouteName()  == 'times.index' ? "active" : "" }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Times
                                        </p>
                                    </a>
                                </li>

                            @endrole

                          
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 64.8489%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
    <!-- /.sidebar -->
</aside>


