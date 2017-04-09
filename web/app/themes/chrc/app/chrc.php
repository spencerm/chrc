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
