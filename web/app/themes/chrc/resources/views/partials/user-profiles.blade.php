<?php  
/**
 * User profiles for template user 
 * 
 * using cmb2 
 *  
 */ 
?>

<div class="user-profiles">
  <h2>Run Leaders</h2>
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




