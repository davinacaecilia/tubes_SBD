<section id="sidebar">
    <a href="{{ route('admin.dashboard') }}" class="brand">
        <span class="text">
            <span class="octa">Google </span><span class="prime">Arts & Culture</span>
        </span>
    </a>
    <ul class="side-menu top">
        {{-- Dashboard --}}
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>

        {{-- Art Managements --}}
        <li class="{{ request()->routeIs('admin.art.*') ? 'active' : '' }} has-dropdown">
            <a href="#" class="dropdown-toggle"> <i class='bx bxs-palette'></i>
                <span class="text">Art Managements</span>
                <i class='bx bx-chevron-down toggle-icon'></i> </a>
            <ul class="submenu">
                <li class="{{ request()->routeIs('admin.art.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.art.index') }}">
                        <i class='bx bx-list-ul'></i> <span class="text">Arts List</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.art.create') ? 'active' : '' }}">
                    {{-- PERBAIKAN DI SINI --}}
                    <a href="{{ route('admin.art.create') }}">
                        <i class='bx bx-plus-circle'></i>
                        <span class="text">Add Art</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.art.status') ? 'active' : '' }}">
                    {{-- PERBAIKAN DI SINI --}}
                    <a href="{{ route('admin.art.status') }}">
                        <i class='bx bx-check-shield'></i>
                        <span class="text">Art Status</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Museum Managements --}}
        <li class="{{ request()->routeIs('admin.museum.*') ? 'active' : '' }} has-dropdown">
            <a href="#" class="dropdown-toggle">
                <i class='bx bxs-building-house'></i>
                <span class="text">Museum Managements</span>
                <i class='bx bx-chevron-down toggle-icon'></i>
            </a>
            <ul class="submenu">
                <li class="{{ request()->routeIs('admin.museum.index') ? 'active' : '' }}">
                    {{-- PERBAIKAN DI SINI --}}
                    <a href="{{ route('admin.museum.index') }}">
                        <i class='bx bx-list-ul'></i>
                        <span class="text">Museums List</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.museum.create') ? 'active' : '' }}">
                    {{-- PERBAIKAN DI SINI --}}
                    <a href="{{ route('admin.museum.create') }}">
                        <i class='bx bx-plus-circle'></i>
                        <span class="text">Add Museum</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Medium Management --}}
        <li class="{{ request()->routeIs('admin.media.*') ? 'active' : '' }} has-dropdown">
            <a href="#" class="dropdown-toggle">
                <i class='bx bxs-file-image'></i>
                <span class="text">Medium Management</span>
                <i class='bx bx-chevron-down toggle-icon'></i>
            </a>
            <ul class="submenu">
                <li class="{{ request()->routeIs('admin.media.index') ? 'active' : '' }}">
                    {{-- PERBAIKAN DI SINI --}}
                    <a href="{{ route('admin.media.index') }}">
                        <i class='bx bx-list-ul'></i>
                        <span class="text">Medium List</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.media.create') ? 'active' : '' }}">
                    {{-- PERBAIKAN DI SINI --}}
                    <a href="{{ route('admin.media.create') }}">
                        <i class='bx bx-plus-circle'></i>
                        <span class="text">Add Media</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- User Management --}}
        <li class="{{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
            {{-- PERBAIKAN DI SINI --}}
            <a href="{{ route('admin.user.index') }}">
                <i class='bx bxs-group'></i>
                <span class="text">User Management</span>
            </a>
        </li>
    </ul>

    {{-- Logout Menu Item --}}
    <ul class="side-menu">
        <li>
            <form method="POST" action="{{ route('logout') }}" style="width: 100%;">
                @csrf
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); if(confirm('Are you sure you want to log out?')){this.closest('form').submit();}"
                   class="logout">
                    <i class='bx bxs-log-out-circle' ></i>
                    <span class="text">Logout</span>
                </a>
            </form>
        </li>
    </ul>
</section>