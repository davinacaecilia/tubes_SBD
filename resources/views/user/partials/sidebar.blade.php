{{-- sidebar.blade.php --}}
<div id="sidebar" class="sidebar">
  <div class="menu-icon menu-close">☰</div>
  <div class="sidebar-scrollable">
    <hr class="full-divider" />
    <ul>
      <li><i class='bx bx-home-alt sidebar-icon'></i> Home</li>
      <li><i class='bx bx-compass sidebar-icon'></i> Explore</li>
      <li><i class='bx bx-map sidebar-icon'></i> Nearby</li>
      <li class="profil-link" id="profileSidebarLink">
        <a href="{{ route('profile.custom') }}" id="profileLink" style="text-decoration: none; color: inherit;">
          <i class='bx bx-user sidebar-icon'></i> Profile
        </a>
      </li>
      <li><i class='bx bx-trophy sidebar-icon'></i> Achievements</li>
      <li id="collectionsSidebarLink">
        <a href="{{ route('user.collections.all') }}" style="text-decoration: none; color: inherit;">
          <i class='bx bx-collection sidebar-icon'></i> Collections
        </a>
      </li>
      <li><i class='bx bx-collection sidebar-icon'></i> Themes</li>
      <li><i class='bx bx-test-tube sidebar-icon'></i> Experiments</li>
      <hr class="short-divider" />
      <li><i class='bx bx-user sidebar-icon'></i> Artists</li>
      <li class="media-link">
        <a href="{{ route('user.mediums.all') }}" style="text-decoration: none; color: inherit;">
          <i class='bx bx-image sidebar-icon'></i> Mediums
        </a>
      </li>
      <li><i class='bx bx-palette sidebar-icon'></i> Art movements</li>
      <li><i class='bx bx-time sidebar-icon'></i> Historical events</li>
      <li><i class='bx bx-user sidebar-icon'></i> Historical figures</li>
      <li><i class='bx bx-map sidebar-icon'></i> Places</li>
      <hr class="short-divider" />
      <li><i class='bx bx-error-circle sidebar-icon'></i> About</li>
      <li><i class='bx bx-cog sidebar-icon'></i> Settings</li>
      <li><i class='bx bx-home-alt sidebar-icon'></i> View activity</li>
      <li><i class='bx bx-message-square-dots sidebar-icon'></i> Send feedback</li>
      @auth
      <li>
      <form method="POST" action="{{ route('logout') }}" style="width: 100%;">
          @csrf
          <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); 
            if (confirm('Apakah kamu yakin ingin logout?')) {
                this.closest('form').submit();
            }"
            style="text-decoration: none; color: inherit; display: flex; align-items: center; width: 100%;">
            
            <i class='bx bxs-log-out-circle sidebar-icon'></i>
            <span class="text">Logout</span>
          </a>
      </form>

      </li>
    @endauth
    </ul>
  </div>

  <hr class="full-divider" />
  <div class="sidebar-footer">
    <p>Privacy & Terms • Generative AI Terms</p>
  </div>
</div>