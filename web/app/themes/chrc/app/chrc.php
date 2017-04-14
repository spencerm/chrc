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
 *  CMB2 People 
 *
 */
add_action( 'cmb2_admin_init', function() {

    $prefix = 'people_';

    $cmb_group = new_cmb2_box( array(
        'id'            => 'people_metabox',
        'title'         => 'People',
        'object_types'  => array( 'page' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'cmb_styles'    => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $group_field_id = $cmb_group->add_field( array(
      'id'          => $prefix . 'person',
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
      'id'   => 'image_caption',
      'type' => 'text',
    ) );
});