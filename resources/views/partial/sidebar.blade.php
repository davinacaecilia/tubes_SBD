<section id="sidebar">
    <a href="{{ url('admin/dashboard') }}" class="brand">
       
        <span class="text">
            <span class="octa">Google </span><span class="prime">Arts & Culture</span>
        </span>
    </a>
    <ul class="side-menu top">
        <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ url('admin/dashboard') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>

        <li class="{{ Request::is('admin/art*') ? 'active' : '' }} has-dropdown">
            <a href="#" class="dropdown-toggle"> <i class='bx bxs-palette'></i>
                <span class="text">Art Managements</span>
                <i class='bx bx-chevron-down toggle-icon'></i> </a>
            <ul class="submenu"> <li class="{{ Request::is('admin/art') ? 'active' : '' }}">
                    <a href="{{ url('admin/art') }}">
                        <i class='bx bx-list-ul'></i> <span class="text">Arts List</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/art/create') ? 'active' : '' }}">
                    <a href="{{ url('admin/art/create') }}">
                        <i class='bx bx-plus-circle'></i>
                        <span class="text">Add Art</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/art/status') ? 'active' : '' }}">
                    <a href="{{ url('admin/art/status') }}">
                        <i class='bx bx-check-shield'></i>
                        <span class="text">Art Status</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/museum*') ? 'active' : '' }} has-dropdown">
            <a href="#" class="dropdown-toggle">
                <i class='bx bxs-building-house'></i>
                <span class="text">Museum Managements</span>
                <i class='bx bx-chevron-down toggle-icon'></i>
            </a>
            <ul class="submenu">
                <li class="{{ Request::is('admin/museum') ? 'active' : '' }}">
                    <a href="{{ url('admin/museum') }}">
                        <i class='bx bx-list-ul'></i>
                        <span class="text">Museums List</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/museum/create') ? 'active' : '' }}">
                    <a href="{{ url('admin/museum/create') }}">
                        <i class='bx bx-plus-circle'></i>
                        <span class="text">Add Museum</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="{{ Request::is('admin/media*') ? 'active' : '' }} has-dropdown">
            <a href="#" class="dropdown-toggle">
                <i class='bx bxs-file-image'></i>
                <span class="text">Medium Management</span>
                <i class='bx bx-chevron-down toggle-icon'></i>
            </a>
            <ul class="submenu">
                <li class="{{ Request::is('admin/media') ? 'active' : '' }}">
                    <a href="{{ url('admin/media') }}">
                        <i class='bx bx-list-ul'></i>
                        <span class="text">Medium List</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/media/create') ? 'active' : '' }}">
                    <a href="{{ url('admin/media/create') }}">
                        <i class='bx bx-plus-circle'></i>
                        <span class="text">Add Media</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Manajemen User (Tetap Langsung) -->
        <li class="{{ Request::is('admin/user*') ? 'active' : '' }}">
            <a href="{{ url('admin/user') }}">
                <i class='bx bxs-group'></i>
                <span class="text">User Management</span>
            </a>
        </li>

        <li>
            <a href="{{ url('logout') }}" class="logout" onclick="return confirm('Are you sure you want to log out?')">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>