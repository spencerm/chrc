<?php
/**
 * Template part to create cards if post meta has category
 * @param post_meta _post_more_posts
 */


$more_posts      = get_post_meta( get_the_ID(), '_page_more_posts', true );
if($more_posts):

?>
    

<?php 
  $NewQuery = new WP_Query( array( 
    'cat' => $more_posts , 
    'posts_per_page' => 5 ,
    'post_type' => 'post' , 
    'no_found_rows' => true ,  // turn off pagination information 
    'update_post_meta_cache' => false ,  // don't do anything with post meta cache
    'orderby' => 'post_date',
    'order' => 'DESC'

    ) );
  if($NewQuery):
    while ( $NewQuery->have_posts() ) : $NewQuery->the_post();
?>
  <section class="card">
    <figure class="card-img-top">
      <?php the_post_thumbnail('card'); ?>
    </figure>
    <div class="card-block">
      <h3 class="card-title">
        <a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a>
      </h3>
      <p><?= get_the_excerpt(); ?></p>
      <p><a class="btn btn-success excerpt-more" href="<?= get_permalink(); ?>">Click for more!</a></p>
    </div>
  </section>
<?php
  endwhile;
    if($NewQuery->found_posts > 3):
      echo '<a class="btn btn-primary" href="<?= esc_url( get_category_link( $more_posts ) ); ?>">See more <?= get_the_category_by_ID( $more_posts ) ?></a>';
    endif;
  endif;
?>


<?php wp_reset_postdata(); ?>
<? endif; ?>
