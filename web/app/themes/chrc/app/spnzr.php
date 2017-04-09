<?php namespace Spnzr;

function the_first_term( $post_id = false , $taxonomy = 'category' ){
	foreach( get_the_terms( $post_id , $taxonomy ) as $term ) {
	    if ($term->parent  != 0) {
	    	echo '<a href="' . esc_url( get_term_link( $term->term_id ) ). '" class="link-category" title="' . esc_attr( $term->name ) . '" ' . '>' . esc_attr( $term->name ) .'</a> ';
	    }
	}
}

function get_first_term( $post_id = false , $taxonomy = 'category' ){
	$terms = get_the_terms( $post_id , $taxonomy );
	return esc_attr( $terms[0]->name );
}








function get_nav_name($theme_location){
	$theme_locations = get_nav_menu_locations();
	$menu_obj = get_term( $theme_locations[ $theme_location ], 'nav_menu' );
	if( is_string ($menu_obj->name) ){
		return $menu_obj->name;
	} else{
		return false;
	}
}