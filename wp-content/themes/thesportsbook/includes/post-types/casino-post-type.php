<?php 

add_action('init', 'fly_casino_posts');

function fly_casino_posts() {

// Check it Slug has been set
if (get_theme_option('affiliate-slug')){
	$slug=get_theme_option('affiliate-slug');
   } else { $slug= 'review'; 

}

$args = array(
  'labels' => array(   
         'name' => __( 'Sportsbooks','thesportsbook' ),
         'singular_name' => __( 'Sportsbook','thesportsbook'  ),
        'add_new' => __( 'Add New Sportsbook' ,'thesportsbook' ),
	'add_new_item' => __( 'Add New Sportsbook','thesportsbook'  ),
	'edit' => __( 'Edit Sportsbook','thesportsbook'  ),
	'edit_item' => __( 'Edit Sportsbook' ,'thesportsbook' ),
	'new_item' => __( 'New Sportsbook','thesportsbook'  ),
	'view' => __( 'View Sportsbook','thesportsbook'  ),
	'view_item' => __( 'View Sportsbook','thesportsbook'  ),
	'search_items' => __( 'Search Sportsbooks','thesportsbook'  ),
	'not_found' => __( 'No Sportsbooks found' ,'thesportsbook' ),
	'not_found_in_trash' => __( 'No Sportsbooks found in Trash' ,'thesportsbook' ),
	'parent' => __( 'Parent Sportsbook','thesportsbook'  ),

                ),

  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'hierarchical' => false,
  'menu_icon' =>'dashicons-index-card',
  'rewrite' => array( 'slug' => $slug, 'with_front' => false ),
  'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes','comments','author')
);

register_post_type('casino',$args);

  $labels = array(
  
    'name' => __( 'Affiliate Tags','thesportsbook' ),
    'singular_name' => __( 'Affiliate tag','thesportsbook'  ),
    'search_items' =>  __( 'Search Affiliate Tags' ,'thesportsbook' ),
    'all_items' => __( 'All Affiliate Tags','thesportsbook'  ),
    'parent_item' => __( 'Parent Affiliate Tag' ,'thesportsbook' ),
    'parent_item_colon' => __( 'Parent Affiliate Tag:','thesportsbook'  ),
    'edit_item' => __( 'Edit Affiliate Tag' ,'thesportsbook' ), 
    'update_item' => __( 'Update Affiliate Tag' ,'thesportsbook' ),
    'add_new_item' => __( 'Add New Affiliate Tag','thesportsbook'  ),
    'new_item_name' => __( 'New Affiliate Tag' ,'thesportsbook' ),
    'menu_name' => __( 'Affiliate Tags' ,'thesportsbook' ),
  
  ); 	

register_taxonomy('affiliate-tags',array('casino'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag-affiliates' ),
  ));

}
?>