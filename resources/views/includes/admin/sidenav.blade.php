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
                <li class="{{request()->is('office/admin/dashboard*') ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('admin::index')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <hr>
                </li>
                <li class="{{request()->is('office/admin/admins*') ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('admin::admins::index')}}">
                        <i class="mdi mdi-account-key"></i>
                        <span class="nav-text">Admin</span>
                    </a>
                    <hr>
                </li>
                <li class="{{request()->is('office/admin/event*') ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('admin::event::index')}}">
                        <i class="mdi mdi-calendar"></i>
                        <span class="nav-text">Event</span>
                    </a>
                    <hr>
                </li>
                <li class="{{request()->is('office/admin/user*') ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('admin::user::index')}}">
                        <i class="mdi mdi-account"></i>
                        <span class="nav-text">User</span>
                    </a>
                    <hr>
                </li>
                <li class="{{request()->is('office/admin/faq*') ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('admin::faq::index')}}">
                        <i class="mdi mdi-comment-question-outline"></i>
                        <span class="nav-text">FAQ</span>
                    </a>
                    <hr>
                </li>

                <li class="{{request()->is('office/admin/category*') ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('admin::category::index')}}">
                        <i class="mdi mdi-format-list-bulleted-type"></i>
                        <span class="nav-text">Category</span>
                    </a>
                    <hr>
                </li>
                <li class="{{request()->is('office/admin/suggestion*') ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('admin::suggestion::index')}}">
                        <i class="mdi mdi-comment-processing-outline"></i>
                        <span class="nav-text">Suggestion</span>
                    </a>
                    <hr>
                </li>
                <li class="{{request()->is('office/admin/speaker*') ? 'active' : ''}}">
                    <a class="sidenav-item-link" href="{{route('admin::speakers::index')}}">
                        <i class="mdi mdi-bullhorn-outline"></i>
                        <span class="nav-text">Speaker</span>
                    </a>
                    <hr>
                </li>
            </ul>
        </div>
    </div>
</div>
