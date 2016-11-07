
<!-- BEGIN SIDEBAR -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper hide">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler"> </div>
            <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <li class="nav-item start ">
            <a href="{{  route('home')}}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                <span class="arrow"></span>
            </a>

        </li>
        @if(Auth::check())

            @if(Auth::user()->hasRole('Administrator'))

                <li class="nav-item start ">
                    <a href="{{route('resellers.index')}}" class="nav-link nav-toggle">
                        <i class="icon-tag"></i>
                        <span class="title">Resellers</span>
                        <span class="arrow"></span>
                    </a>
                </li>

                <li class="nav-item start ">
                    <a href="{{route('agents.index')}}" class="nav-link nav-toggle">
                        <i class="icon-paper-plane"></i>
                        <span class="title">Agents</span>
                        <span class="arrow"></span>
                    </a>
                </li>

                <li class="nav-item start ">
                    <a href="{{route('transactions.index')}}" class="nav-link nav-toggle">
                        <i class="icon-graph"></i>
                        <span class="title">Transactions</span>
                        <span class="arrow"></span>
                    </a>
                </li>

                <li class="nav-item start ">
                    <a href="{{route('users.index')}}" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">Users</span>
                        <span class="arrow"></span>
                    </a>
                </li>


            @elseif(Auth::user()->hasRole('Reseller'))
                <li class="nav-item start ">
                    <a href="{{route('transactions.index')}}" class="nav-link nav-toggle">
                        <i class="icon-graph"></i>
                        <span class="title">Transactions</span>
                        <span class="arrow"></span>
                    </a>
                </li>
            @elseif(Auth::user()->hasRole('Agent'))

                <li class="nav-item start ">
                    <a href="{{route('transactions.index')}}" class="nav-link nav-toggle">
                        <i class="icon-graph"></i>
                        <span class="title">Transactions</span>
                        <span class="arrow"></span>
                    </a>
                </li>

            @endif

            @if(Auth::user()->hasRole('Root'))
                <li class="nav-item start ">
                    <a href="{{route('log-viewer::dashboard')}}" class="nav-link nav-toggle">
                        <i class="fa fa-fw fa-list"></i>
                        <span class="title">Log Viewer</span>
                        <span class="arrow"></span>
                    </a>
                </li>
            @endif

        @endif

    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
