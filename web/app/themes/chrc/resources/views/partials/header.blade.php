<header class="container banner">
  <div class="navbar">
    <a class="navbar-brand" href="{{ home_url('/') }}"><span class="sr-only">{{ get_bloginfo('name', 'display') }}</span></a>
    <nav class="nav-primary navbar">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav']) !!}
      @endif
    </nav>
  </div>
</header>
