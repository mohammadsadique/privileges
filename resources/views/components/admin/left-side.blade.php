

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('homedashboard')}}" class="brand-link">
        <img src="{{ url('/') }}/adminlte3/dist/img/AdminLTELogo.png" alt="TC"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Super Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(!empty(session()->get('login')))
                    <img src="{{ url('/') }}/public/img/staff/{{session()->get('login')->image}}" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{ url('/') }}/adminlte3/dist/img/user2-160x160.jpg"
                    class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{route('profile')}}" class="d-block">@if(!empty(session()->get('login'))){{ session()->get('login')->name }}@endif</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">




                <li class="nav-item">
                    <a href="{{route('homedashboard')}}" class="nav-link {{ (Request::segment(2) == 'dashboard') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ (Request::segment(1) == 'privilege') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{ (Request::segment(1) == 'privilege') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p> Privilege <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{route('addpages')}}" class="nav-link {{ (Request::segment(2) == 'addpages') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Pages </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('showprivilege')}}" class="nav-link {{ (Request::segment(2) == 'show-privilege') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show Privilege </p>
                            </a>
                        </li>
                    </ul>
                </li>   
               
                <li class="nav-item has-treeview {{ (Request::segment(1) == 'managestaff') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{ (Request::segment(1) == 'managestaff') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p> Manage Staff <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{route('addstaff')}}" class="nav-link {{ (Request::segment(2) == 'addstaff') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Staff </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('allstaff')}}" class="nav-link {{ (Request::segment(2) == 'allstaff') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Staff </p>
                            </a>
                        </li>
                    </ul>
                </li>              
                <li class="nav-item">
                    <a href="{{route('profile')}}" class="nav-link {{ (Request::segment(2) == 'profile') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-user"></i>
                        <p> Profile </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p> Logout </p>
                    </a>
                </li>



            </ul>
        </nav>
    </div>
</aside>