<?php 

namespace Spnzr;

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
 * media
 */
add_image_size('card' , 400 , 220 , true );

/**
 *  CHRC shop
 *
 */

/**
 * turn off sku site wide
 */
add_filter( 'wc_product_sku_enabled', '__return_false' );


/**
 *  CMB2 Page
 *
 */
add_action( 'cmb2_admin_init', function() {

  $prefix = '_page_';

  $cmb = new_cmb2_box( array(
      'id'            => 'post_metabox',
      'title'         => __( 'Add posts to page', 'cmb2' ),
      'object_types'  => array( 'page' ), // Post type
      'context'       => 'normal',
      'priority'      => 'low',
      'show_names'    => true, // Show field names on the left
      // 'cmb_styles'    => false, // false to disable the CMB stylesheet
      // 'closed'     => true, // Keep the metabox closed by default
  ) );

  $cmb->add_field( array(
      'name'           => 'Show category',
      'desc'           => 'If a category is selected, posts of that category will be additionally rendered',
      'id'            => $prefix . 'more_posts',
      'type'          => 'select',
      // Use a callback to avoid performance hits on pages where this field is not displayed (including the front-end).
      'default'       => 'None',
      'show_option_none' => true,
      'options_cb'    => '\Spnzr\cmb2_get_term_options',
      // Same arguments you would pass to `get_terms`.
      'get_terms_args' => array(
        'taxonomy'    => 'category',
        'hide_empty'  => false,
      ),
  ) );
});

/**
 *  CMB2 People 
 *
 */
add_action( 'cmb2_admin_init', function() {

  $runnerbox = new_cmb2_box( array(
    'id'            => 'runner_metabox',
    'title'         => 'Run Leaders',
    'object_types'  => array( 'page' ), // Post type
    'show_on'       => array( 'key' => 'page-template', 'value' => 'template-user.blade.php' ),
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
    'cmb_styles'    => false, // false to disable the CMB stylesheet
  ) );
  $runnerbox_id = $runnerbox->add_field( array(
    'id'          => 'run_leader_group',
    'type'        => 'group',
    'options'     => array(
      'group_title'   => esc_html__( 'Runner {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => esc_html__( 'Add Another', 'cmb2' ),
      'remove_button' => esc_html__( 'Remove', 'cmb2' ),
      'sortable'      => true,
    ),
  ) );
  $runnerbox->add_group_field( $runnerbox_id, array(
    'name'       => esc_html__( 'Name', 'cmb2' ),
    'id'         => 'name',
    'type'       => 'text',
  ) );
  $runnerbox->add_group_field( $runnerbox_id, array(
    'name'       => esc_html__( 'Title', 'cmb2' ),
    'id'         => 'title',
    'type'       => 'text',
  ) );
  $runnerbox->add_group_field( $runnerbox_id, array(
    'name'       => esc_html__( 'Contact', 'cmb2' ),
    'id'         => 'contact',
    'type'       => 'text',
  ) );
  $runnerbox->add_group_field( $runnerbox_id, array(
    'name'        => esc_html__( 'Description', 'cmb2' ),
    'description' => esc_html__( 'Write a short description for this entry', 'cmb2' ),
    'id'          => 'description',
    'type'        => 'textarea_small',
  ) );
  $runnerbox->add_group_field( $runnerbox_id, array(
    'name' => esc_html__( 'Image', 'cmb2' ),
    'id'   => 'image',
    'type' => 'file',
  ) );
  $runnerbox->add_group_field( $runnerbox_id, array(
    'name' => esc_html__( 'Image Caption', 'cmb2' ),
    'id'   => 'imagecaption',
    'type' => 'text',
  ) );

    $cmb_group = new_cmb2_box( array(
        'id'            => 'people_metabox',
        'title'         => 'Royal Council',
        'object_types'  => array( 'page' ), // Post type
        'show_on'       => array( 'key' => 'page-template', 'value' => 'template-user.blade.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'cmb_styles'    => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $group_field_id = $cmb_group->add_field( array(
      'id'          => 'people_group',
      'type'        => 'group',
      'options'     => array(
        'group_title'   => esc_html__( 'Person {#}', 'cmb2' ), // {#} gets replaced by row number
        'add_button'    => esc_html__( 'Add Another', 'cmb2' ),
        'remove_button' => esc_html__( 'Remove', 'cmb2' ),
        'sortable'      => true,
      ),
    ) );
    $cmb_group->add_group_field( $group_field_id, array(
      'name'       => esc_html__( 'Name', 'cmb2' ),
      'id'         => 'name',
      'type'       => 'text',
    ) );
    $cmb_group->add_group_field( $group_field_id, array(
      'name'       => esc_html__( 'Title', 'cmb2' ),
      'id'         => 'title',
      'type'       => 'text',
    ) );
    $cmb_group->add_group_field( $group_field_id, array(
      'name'       => esc_html__( 'Contact', 'cmb2' ),
      'id'         => 'contact',
      'type'       => 'text',
    ) );
    $cmb_group->add_group_field( $group_field_id, array(
      'name'        => esc_html__( 'Description', 'cmb2' ),
      'description' => esc_html__( 'Write a short description for this entry', 'cmb2' ),
      'id'          => 'description',
      'type'        => 'textarea_small',
    ) );
    $cmb_group->add_group_field( $group_field_id, array(
      'name' => esc_html__( 'Image', 'cmb2' ),
      'id'   => 'image',
      'type' => 'file',
    ) );
    $cmb_group->add_group_field( $group_field_id, array(
      'name' => esc_html__( 'Image Caption', 'cmb2' ),
      'id'   => 'imagecaption',
      'type' => 'text',
    ) );
    
});