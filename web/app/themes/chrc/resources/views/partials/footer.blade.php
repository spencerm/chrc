<footer class="container px-0">
  <div class="content-info">
    <div class="running-runner"></div>
    <div class="half">
      <nav role="navigation" class="my-2">
        @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav flex-row ', 'depth' => 1]) !!}
      @endif
      @include('partials/social-links')
      </nav>
    </div>
    <div class="quarter">
      <p class="email text-right"><a href="mailto:runningroyalty01@gmail.com">runningroyalty01@gmail.com</a></p>
    </div>
    <div class="quarter text-right"><p>made by <a href="https://spnzr.com">spencer</a></p></div>
  </div>
</footer>
