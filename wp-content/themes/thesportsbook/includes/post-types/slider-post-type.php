<?php 

// Add Promotion Custom Post Type
add_action('init', 'fly_slider_promostype');

function fly_slider_promostype() {

// Check it Slug has been set


$args = array(
  'labels' => array(   
         'name' => __( 'Slides' ,'thesportsbook'),
         'singular_name' => __( 'Slide' ,'thesportsbook'),
        'add_new' => __( 'Add New' ,'thesportsbook'),
	'add_new_item' => __( 'Add New Slide' ,'thesportsbook'),
	'edit' => __( 'Edit' ,'thesportsbook'),
	'edit_item' => __( 'Edit Slide' ,'thesportsbook'),
	'new_item' => __( 'New Slide' ,'thesportsbook'),
	'view' => __( 'View Slide' ,'thesportsbook'),
	'view_item' => __( 'View Slide' ,'thesportsbook'),
	'search_items' => __( 'Search Slide' ,'thesportsbook'),
	'not_found' => __( 'No Slides found' ,'thesportsbook'),
	'not_found_in_trash' => __( 'No Slides found in Trash','thesportsbook' ),
	'parent' => __( 'Parent Slide' ,'thesportsbook'),

                ),

  'public' => false,
  'show_ui' => true,
  'capability_type' => 'post',
   'menu_icon' =>'dashicons-chart-bar',
  'hierarchical' => false,
  //'rewrite' => array( 'slug' => $slug, 'with_front' => false ),
  'supports' => array('title', 'thumbnail','editor')
);

register_post_type('slider',$args);
}
?>