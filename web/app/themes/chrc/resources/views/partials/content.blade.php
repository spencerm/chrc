<article @php(post_class())>
  <header>
    @if (has_post_thumbnail())
      @php( the_post_thumbnail('medium',array('class'=>'alignright') ) )
    @endif
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    @include('partials/entry-meta')
  </header>
  <div class="entry-summary">
    @php(the_excerpt())
    <p><a class="btn btn-dark excerpt-more" href="<?= get_permalink(); ?>">Read more!</a></p>
    @include('partials/social-links-share')
  </div>
</article>
