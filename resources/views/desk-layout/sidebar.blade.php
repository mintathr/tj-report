<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/assets-template/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Reporting</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if((auth()->user()->is_admin == 1))

                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link
                    {{ request()->is('admins/home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">ACTIVITY</li>
                <li class="nav-item has-treeview
                    {{ request()->is('admins/Activity*') ? 'menu-open' : '' }}
                    {{ request()->is('admins/Find*') ? 'menu-open' : '' }}
                    {{ request()->is('Activity/Create') ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Activity
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('activity.user.create') }}" class="nav-link 
                            {{ request()->is('Activity/Create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Create
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.listActivity') }}" class="nav-link
                            {{ request()->is('admins/Activity*') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Daily</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('findActivity') }}" class="nav-link
                            {{ request()->is('admins/Find*') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Report</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">ASSET</li>
                <!-- <li class="nav-item has-treeview
                    {{ request()->is('admins/Asset*') ? 'menu-open' : '' }}
                    {{ request()->is('admins/Find*') ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Asset
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('asset.user.create') }}" class="nav-link 
                        {{ request()->is('Asset/Create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Create
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.listAsset') }}" class="nav-link
                            {{ request()->is('admins/Asset*') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tabel</p>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <li class="nav-item has-treeview
                    {{ request()->is('Inventaris*') ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Inventaris
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('inventaris.create') }}" class="nav-link
                                {{ request()->is('Inventaris/create') ? 'active' : '' }}
                            ">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p>
                                    Create
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('inventaris') }}" class="nav-link
                                {{ request()->is('Inventaris') ? 'active' : '' }}
                            ">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Data
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-header">PARAMETER</li>
                <li class="nav-item has-treeview
                    {{ request()->is('admins/Halte*') ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Halte
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('halte.create') }}" class="nav-link
                                {{ request()->is('admins/Halte/create') ? 'active' : '' }}
                            ">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p>
                                    Create
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('halte') }}" class="nav-link
                                {{ request()->is('admins/Halte') ? 'active' : '' }}
                            ">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Data
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview
                    {{ request()->is('admins/HelpTopic*') ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Help Topic
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('helptopic.create') }}" class="nav-link
                                {{ request()->is('admins/HelpTopic/create') ? 'active' : '' }}
                            ">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p>
                                    Create
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('helptopic') }}" class="nav-link
                                {{ request()->is('admins/HelpTopic') ? 'active' : '' }}
                            ">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Data
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">SECURITY</li>
                <li class="nav-item has-treeview
                    {{ request()->is('admins/User') ? 'menu-open' : '' }}
                    {{ request()->is('admins/User/Create') ? 'menu-open' : '' }}
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
                            {{ request()->is('admins/User') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.create') }}" class="nav-link
                            {{ request()->is('admins/User/Create') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>






                @else
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link 
                        {{ request()->is('Home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('activity.user.create') }}" class="nav-link 
                        {{ request()->is('Activity/Create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pencil-alt"></i>
                        <p>
                            Activity
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('asset.user.create') }}" class="nav-link 
                        {{ request()->is('Asset/Create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-snowflake"></i>
                        <p>
                            Asset
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                <a href="{{ route('inventaris.create') }}" class="nav-link
                                {{ request()->is('Inventaris/create') ? 'active' : '' }}
                            ">
                    <i class="nav-icon fas fa-cube"></i>
                    <p>
                        Inventaris
                    </p>
                </a>
                </li>

                @endif

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