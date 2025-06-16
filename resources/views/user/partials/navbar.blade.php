<header class="topbar">
  <div class="left">
    <div class="menu-icon menu-open">☰</div>
    <div class="logo">Google <span>Arts & Culture</span></div>
  </div>
  <nav class="nav-menu">
    <a href="#">Home</a>
    <a href="#">Explore</a>
    <a href="#">Play</a>
    <a href="#">Nearby</a>
    <a href="{{ route('profile.custom') }}" id="favoritesNavLink">Favorites</a>
  </nav>
  <div class="right">
    <div class="search-icon">
      <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 24 24" fill="black">
        <path
          d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 5 1.49-1.49-5-5zM9.5 14C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
      </svg>
    </div>
    @guest
    <a href="{{ route('login') }}" class="sign-in-button">Sign In</a>
    @endguest
  </div>
</header>