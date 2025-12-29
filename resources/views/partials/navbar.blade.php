<header class="topbar">
  <div class="container topbar-inner">
    <a href="{{ route('posts') }}" class="brand">
      <span class="brand-dot"></span>
      Nagham Blog
    </a>

    <nav class="nav">
      <a class="nav-link {{ request()->routeIs('posts') ? 'active' : '' }}" href="{{ route('posts') }}">
        All Posts
      </a>

      <a class="nav-link" href="#about">
        About
      </a>

      <a class="nav-link {{ request()->routeIs('me') ? 'active' : '' }}" href="{{ route('me') }}">
        Me
      </a>

      <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button class="nav-link nav-btn" type="submit">Logout</button>
      </form>
    </nav>
  </div>
</header>
