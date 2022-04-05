<div class="ec-left-sidebar ec-bg-sidebar">
    <div id="sidebar" class="sidebar ec-sidebar-footer">

        <div class="ec-brand">
            <a href="{{route('main::home')}}" title="Ekka">
                <img class="ec-brand-icon" src="{{asset('admin/assets/img/logo/ec-site-logo.png')}}" alt="" />
                <span class="ec-brand-name text-truncate">Gemina</span>
            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="ec-navigation" data-simplebar>
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                <li class="{{request()->is('user/dashboard*') ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('user::index')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <hr>
                </li>
                <li class="has-sub {{request()->is('user/events*') ? 'active' : ''}}">
                    <a class="sidenav-item-link">
                        <i class="mdi mdi-calendar-check-outline"></i>
                        <span class="nav-text">Seminar</span> <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{route('user::product::index')}}">
                                    <span class="nav-text">Buatanku</span>
                                </a>
                            </li>

                            <li class="">
                                <a class="sidenav-item-link" href="{{route('user::product::myEvents')}}">
                                    <span class="nav-text">Kunjunganku</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                </li>
            </ul>
        </div>
    </div>
</div>
