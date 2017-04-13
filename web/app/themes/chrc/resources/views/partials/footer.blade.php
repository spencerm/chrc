<footer class="container px-0">
  <div class="content-info">
    <div class="running-runner"></div>
    <div class="third">
      <nav role="navigation" class="">
        @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav flex-sm-row ', 'depth' => 1]) !!}
      @endif
      @include('partials/social-links')
      </nav>
    </div>
    <div class="third">
      <p class="email"><a href="mailto:runningroyalty01@gmail.com">runningroyalty01@gmail.com</a></p>
    </div>
    <div class="third"><p>made by <a href="https://spnzr.com">spencer mccormick</a></p></div>
  </div>
</footer>
