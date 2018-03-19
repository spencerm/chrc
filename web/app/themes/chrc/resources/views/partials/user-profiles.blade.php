<?php  
/**
 * User profiles for template user 
 * 
 * using ACF 
 *  
 */ 
?>

<? /* if( have_rows('group_people') ): ?>

<? while( have_rows('group_people') ): the_row(); ?>

<div class="user-profiles">
  <h3><? the_sub_field('heading'); ?></h3>
  <?php
    $entries = get_post_meta( get_the_ID(), 'run_leader_group', true );
    foreach ( (array) $entries as $person):
      set_query_var( 'person', $person );      
      get_template_part('partials/user.blade');
    endforeach; 
  ?>
</div>



<div class="user-profiles">
  <h2>CHRC Council</h2>
  <?php
    $entries = get_post_meta( get_the_ID(), 'people_group', true );
    foreach ( (array) $entries as $person):
      set_query_var( 'person', $person );            
      get_template_part('partials/user.blade');
    endforeach; 
  ?>
</div>


 */ 
?>

