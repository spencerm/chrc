<?php 

namespace Spnzr;



// include_once("blocks/person.php");

/**
 * google-calendar-events plugin
 */
function change_gce_prev( $prev ) {
  return "&laquo; Previous Events";
}
add_filter( 'gce_prev_text', __NAMESPACE__ . '\\change_gce_prev' );

function change_gce_next( $next ) {
  return 'Upcoming Events &raquo;';
}
add_filter( 'gce_next_text', __NAMESPACE__ . '\\change_gce_next' );

/**
 * move wpgform js to bottom of footer
 */
add_action( 'init', function() {
  remove_action('wp_footer', 'wpgform_footer', 10 );
  add_action('wp_footer', 'wpgform_footer', 2000) ;
});

/**
 * media
 */
add_image_size('card' , 400 , 220 , true );

/**
 *  CHRC shop
 *
 */

/* turn off sku site wide */
add_filter( 'wc_product_sku_enabled', '__return_false' );



/**
 *  Add images to RSS feed
 *
 */
function featuredtoRSS($content) {
  global $post;
  if ( has_post_thumbnail( $post->ID ) ){
    $content = '<div>' . get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'style' => 'display: block; margin-bottom: 5px; clear:both;max-width: 100%;' ) ) . '</div>' . $content;
  }
  return $content;
}
   
add_filter('the_excerpt_rss', __NAMESPACE__ . '\\featuredtoRSS');
add_filter('the_content_feed', __NAMESPACE__ . '\\featuredtoRSS');


/**
 *  CMB2 Page
 *
 */


if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_people',
    'title' => 'Add people profiles',
    'fields' => array(
      array(
        'key' => 'field_5aac310e39ab9',
        'label' => 'Heading',
        'name' => 'heading',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_5aac2a7485068',
        'label' => 'People Repeater',
        'name' => 'people_repeater',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => 'field_5aac2bc8cd8cf',
        'min' => 0,
        'max' => 0,
        'layout' => 'row',
        'button_label' => '',
        'sub_fields' => array(
          array(
            'key' => 'field_5aac2bc8cd8cf',
            'label' => 'Group Name',
            'name' => 'group_name',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5aac2bd7cd8d0',
            'label' => 'Group Description',
            'name' => 'group_description',
            'type' => 'wysiwyg',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'tabs' => 'all',
            'toolbar' => 'basic',
            'media_upload' => 0,
            'delay' => 0,
          ),
          array(
            'key' => 'field_5aac2b56cd8ce',
            'label' => 'People',
            'name' => 'people',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'collapsed' => '',
            'min' => 0,
            'max' => 0,
            'layout' => 'table',
            'button_label' => '',
            'sub_fields' => array(
              array(
                'key' => 'field_5aac2a9f8506a',
                'label' => 'Name',
                'name' => 'name',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
              ),
              array(
                'key' => 'field_5aac2a8085069',
                'label' => 'Profile Image',
                'name' => 'profile_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'return_format' => 'id',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
              ),
              array(
                'key' => 'field_5aac2aae8506b',
                'label' => 'serious title',
                'name' => 'official_title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
              ),
              array(
                'key' => 'field_5aac2aee8506c',
                'label' => 'caption',
                'name' => 'caption',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
              ),
              array(
                'key' => 'field_5aac2af28506d',
                'label' => 'contact email',
                'name' => 'contact_email',
                'type' => 'email',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
              ),
              array(
                'key' => 'field_5aac2de127799',
                'label' => 'bio',
                'name' => 'bio',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
              ),
            ),
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
  ));
  
  endif;