<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/assets-template/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Ticketing</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assets-template/img/default1.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">John Doe</a>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link
                    {{ request()->is('admins/home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">PARAMETER</li>
                <li class="nav-item">
                    <a href="{{ route('halte') }}" class="nav-link
                        {{ request()->is('admins/Halte') ? 'active' : '' }}
                    ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Halte
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('helptopic') }}" class="nav-link
                        {{ request()->is('admins/HelpTopic') ? 'active' : '' }}
                    ">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Help Topic
                        </p>
                    </a>
                </li>




                <li class="nav-header">SECURITY</li>
                <li class="nav-item has-treeview
                    {{ request()->is('User') ? 'menu-open' : '' }}
                    {{ request()->is('User/Create') ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user') }}" class="nav-link
                            {{ request()->is('User') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.create') }}" class="nav-link
                            {{ request()->is('User/Create') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>








                <li class="nav-item has-treeview
                    {{ request()->is('changePassword') ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Account
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('changePassword') }}" class="nav-link
                            {{ request()->is('changePassword') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>









            </ul>
        </nav>
    </div>
</aside>