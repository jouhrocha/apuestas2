<?php 

// Adds Bonus Table Shortcode
function fly_bonustable2_func($atts) {
	extract(shortcode_atts(array(
		'site1' => '',
		'site2' => '',
		'site3' => '',
		'site4' => '',
		'site5' => '',
		'site6' => '',
		'site7' => '',
		'site8' => '',
		'site9' => '',
		'site10' => '',
		'field'=>'',
		'showreview'=>'',
		'casinolist'=>'',
	), $atts));

		$sites = array ($site1,$site2,$site3,$site4,$site5,$site6,$site7,$site8,$site9,$site10);

$redirectslug=fly_redirect_slug();

$x=0;
$ret = '';
global $post;

$ret='
<ul class="top-sportsbook-cards">';

foreach ($sites as $casino) {

if ($casino !='') {

$x=$x+1;

// Get Terms and Conditions

$_tc_enable = (get_post_meta($casino,"_tc_enable",true)) ?: '';
$tc_textbox= (get_post_meta($casino,"_tc_textbox",true)) ?: ''; 

$ret .= '<li>
	<span class="rank">'.$x.'</span>
	<a '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectslug  .'/'. get_post_meta($casino,"_as_redirectkey",true)  .'">
		  '. get_the_post_thumbnail($casino,'casino-logo',array('class' => 'logocomp')).'
			</a>';
			if ($field=='rating') {
	$ret .= '<span class="rate cen mbottom"> <span class="ratetotal" style="width: ';	if(!empty(get_post_meta($casino,"_as_rating",true))){ $ret .= get_post_meta($casino,"_as_rating",true)*20; }	$ret .='%"></span></span>';
} else {
	$ret .= '<span class="bonus-text">'. get_post_meta($casino,"_as_bonustext",true)  .'</span>';
	
}	

		$features=get_post_meta($casino, '_as_features', true);
		if ($features != '') {
		$ret.='<ul class="greenbullet">';
       
		$feat = explode("|", $features);
					for($i = 0; $i < count($feat); $i++){
					$ret .= '<li>'. $feat[$i] .'</li>';
					}
$ret .= '</ul>';
		}
		
	$ret .= '<a '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectslug  .'/'. get_post_meta($casino,"_as_redirectkey",true)  .'" class="visbutton">
	' . (get_theme_option("betnow-text")!="" ? get_theme_option("betnow-text") : __('Bet Now', 'thesportsbook')  ) .'
	
	</a>';
	if ($showreview!='no') {			 
			$ret .= '<a href="' . get_the_permalink($casino) . '" class="revlink">'.__('Review', 'thesportsbook').'</a>';
		 }
		 
if ($_tc_enable == 'enabled' AND $field!='rating') {
        	$ret .= '<div class="termsrow">* '.$tc_textbox.'</div>';
        }		 
		 
$ret .= '</li>';

} // End of if exists loop

} // End of for loop

 $ret .=' </ul> ';
 
 return $ret;
}

add_shortcode('featured-sportsbooks', 'fly_bonustable2_func');

?>