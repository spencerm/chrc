@php
if (post_password_required()) {
  return;
}
@endphp

<section id="comments" class="comments card" style="max-width:700px">
<div class="card-block">
  <h3 class="card-title">Comments</h3>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=703067233106476";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <div class="fb-comments card-text" data-href="{{ get_the_permalink() }}" data-numposts="12"></div>
</div>
</section>
