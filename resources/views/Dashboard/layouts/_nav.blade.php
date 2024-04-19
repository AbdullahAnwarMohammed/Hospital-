<nav id="sidebar" class="sidebar-wrapper">
    <!-- Sidebar brand start  -->


    <!-- Sidebar content start -->
    <div class="sidebar-content">

        <!-- sidebar menu start -->
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">العامة</li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="icon-devices_other"></i>
                        <span class="menu-text">الرئيسية</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="index.html">Admin</a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route("admin.sections.index") }}">
                        <i class="icon-message-circle"></i>
                        <span class="menu-text">الاقسام</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route("admin.dectors.index") }}">
                        <i class="icon-message-circle"></i>
                        <span class="menu-text">الدكاترة</span>
                    </a>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="icon-calendar1"></i>
                        <span class="menu-text">{{trans('main-sidebar_trans.Services')}}</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a class="slide-item" href="{{ route("admin.service.index") }}">{{trans('main-sidebar_trans.Single_service')}}</a></li>
                            <li><a class="slide-item" href="">{{trans('main-sidebar_trans.group_services')}}</a></li>
                            <li><a class="slide-item" href="">{{trans('main-sidebar_trans.Insurance')}}</a></li>
                            <li><a class="slide-item" href="">{{trans('main-sidebar_trans.ambulance')}}</a></li>
                            <li><a class="slide-item" href="">{{trans('main-sidebar_trans.Ambulance_calls')}}</a></li>
    
                        </ul>
                    </div>
                </li>

              

            </ul>
        </div>
        <!-- sidebar menu end -->

    </div>
    <!-- Sidebar content end -->
</nav>