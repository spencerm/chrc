<header class="container banner" id="pageHeader">
  <nav class="navbar navbar-toggleable-sm navbar-dark">
    <a class="navbar-brand" href="{{ home_url('/') }}"><span class="sr-only">{{ get_bloginfo('name', 'display') }}</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryNav" aria-controls="primaryNav" aria-expanded="false" aria-label="Toggle navigation">
      Menu <span class="navbar-toggler-icon fa fa-caret-down"></span>
    </button>
    <div class="collapse navbar-collapse" id="primaryNav">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu([
          'theme_location'  => 'primary_navigation', 
          'container_class' => 'collapse navbar-collapse',
          'menu_id'         => false,
          'menu_class'      => 'navbar-nav mr-auto',
          'fallback_cb'     => 'bs4navwalker::fallback',
          'walker'          => new bs4navwalker()
        ]) !!}
      @endif
        @include('partials.social-links');
    </div>
  </nav>
</header>
