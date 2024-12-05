<?php

// Excerpts Shortcode
function fly_excerptlist_func($atts) {
	extract(shortcode_atts(array(
		'display' => '',
		'cat' => '',
		'num' => 5,
		'readmorelink'=>'',
		'readmoretext'=>'',
	), $atts));
	
	$args = array('posts_per_page' => $num);
	$id = get_cat_id($cat);
	$args['cat'] = $id;
	
	$loop = new WP_Query( $args ); 
        $posts = array();
        foreach($loop->posts as $p) { $posts[] = $p; }
	global $post;
	$opost = $post;
	ob_start(); 



ob_start();
$ret = apply_filters('excerptlist', $posts);
if (is_array($ret) || $ret =="" || $ret == " ") {
	$ret = ob_get_contents();
}
ob_end_clean();

if (!is_array($ret) && $ret !="") {
} else {

if ($display=='Horizontal') {
	$ret = '<div class="newslist horizontal">';
} else {
	$ret = '<div class="newslist">';
}

    foreach ($posts as $post):
		setup_postdata($post);

      $ret .='<article class="news">
	              <figure> ';

       if ( has_post_thumbnail() ) { 
       $ret .=' <a href="' . get_permalink($post->ID) .'">'. get_the_post_thumbnail($post->ID,'articlelist') .'</a>';

       } else if (get_theme_option('art-thumb')) { 
       $ret .='<a href="' . get_permalink($post->ID) . '"><img src="'. get_theme_option('art-thumb') .'" alt="'. get_the_title($post->ID) .'" width="300" height="300" /></a>';
        } 

    $ret .='
	
	        </figure>
	
	<h4><a href="' . get_permalink($post->ID) . '">'. get_the_title($post->ID) .'</a></h4>';

 	if (!get_theme_option('bylines-hide-all')) {  

		$ret .= '<div class="bylines"> ';
		
				if (!get_theme_option('bylines-hide-date') ) { 
	 $ret .='<time class="entry-date date updated" datetime=" '. get_the_time('o-m-d').'  ">
				'. get_the_time('F j, Y').' </time> ';
 } 
		$ret .='
		</div>';
	}

 	$stringtext = get_the_excerpt();
	if ($display!='Horizontal') {$stringtext = fly_limit_text($stringtext,100);}

              $ret .= '<p>'. $stringtext .'</p>
            </article><!-- /news  -->';

endforeach;
$post = $opost;

 $ret .= '</div><!-- /news list  -->';
 
 if ($readmorelink!='') {
	 $ret .='<a href="'.$readmorelink.'" class="fcrp-button reviewb medium">';
 if ($readmoretext!='') {	 
		  $ret.=''.$readmoretext.'';
 } else {
	   $ret .=__('Read More', 'thesportsbook');
 }
	$ret .='</a>';
 }

   }

return $ret;
}

add_shortcode('excerptlist', 'fly_excerptlist_func');

?>