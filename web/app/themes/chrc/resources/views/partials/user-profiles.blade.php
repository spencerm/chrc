<?php  
/**
 * User profiles for template user 
 * 
 * using ACF 
 *  
 */ 
?>



  <div class="">
    <h2><? the_field('field_5aac310e39ab9'); ?></h2>
    
    <? if( have_rows('people_repeater') ): ?>
      <? while( have_rows('people_repeater') ): the_row(); ?>
        <div class="user-profiles">
          <div class="user-profiles-heading">
          @if (get_sub_field('group_name'))
            <h3>{{ get_sub_field('group_name') }}</h3>
          @endif
          @if (get_sub_field('group_description'))
            {!! get_sub_field('group_description') !!}
          @endif
          </div>
        <?
          while( have_rows('people_repeated') ): the_row();
            // print_r(get_sub_field_object('people_repeated'));
            foreach ( (array) get_sub_field_object('people_repeated') as $person):
              set_query_var( 'person', $person );
              get_template_part('partials/user.blade');
            endforeach;
          endwhile;
        ?>
        </div>

        <? endwhile; ?>
    <? endif; ?>
  </div>