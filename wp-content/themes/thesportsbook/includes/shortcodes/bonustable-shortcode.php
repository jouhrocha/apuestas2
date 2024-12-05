<?php 

// Adds Bonus Table Shortcode
function fly_bonustable_func($atts) {
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

$ret=''.$casinolist.'  <div class="top-sites-wrap">
		<div class="top-sites-row top-sites-heading">';
          $ret .= '<div class="casinocol ">	' . (get_theme_option("sportsbook-text")!="" ? get_theme_option("sportsbook-text") : __('Sportsbook', 'thesportsbook')  ) .'</div>';
		 $ret .= '<div class="featcol">' . (get_theme_option("features-text")!="" ? get_theme_option("features-text") : __('Features', 'thesportsbook')  ) .'</div>';
			 
			 if ($field=='payout') {			 
				$ret .= '<div  class="depcol">' . (get_theme_option("payout-text")!="" ? get_theme_option("payout-text") : __('Payout %', 'thesportsbook')  ) .'</div>';
			 } else if ($field=='mindep') {		
				$ret .= '<div  class="depcol">'.__('Min. Deposit', 'thesportsbook').'</div>';
			 }
			 else {
				$ret .= '<div  class="depcol">' . (get_theme_option("bonus-text")!="" ? get_theme_option("bonus-text") : __('Bonus', 'thesportsbook')  ) .'</div>';
			 }
				$ret .= '<div  class="ratecol">' . (get_theme_option("rating-text")!="" ? get_theme_option("rating-text") : __('Rating', 'thesportsbook')  ) .'</div>';
				$ret .= '<div class="visitcol ">' . (get_theme_option("betnow-text")!="" ? get_theme_option("betnow-text") : __('Bet Now', 'thesportsbook')  ) .'</div>
       </div>
';

foreach ($sites as $casino) {

if ($casino !='') {

$x=$x+1;

// Get Terms and Conditions

$_tc_enable = (get_post_meta($casino,"_tc_enable",true)) ?: '';
$_tc_textbox 	= (get_post_meta($casino,"_tc_textbox",true)) ?: ''; 

$ret .= '
<div class="top-sites-row top-sites-body row-'.$x.' ">
         <div  class="casinocol"><span class="rankcir">'.$x.'</span>
		 <a '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectslug  .'/'. get_post_meta($casino,"_as_redirectkey",true)  .'">
		  '. get_the_post_thumbnail($casino,'casino-logo',array('class' => 'logocomp')).'
			</a>
		</div><div class="featcol">';
			$features=get_post_meta($casino, '_as_features', true);
			if ($features != '') {
			$ret.='<ul>';
      
			$feat = explode("|", $features);
					for($i = 0; $i < count($feat); $i++){
					$ret .= '<li>'. $feat[$i] .'</li>';
					}
			$ret .= '</ul>';
			}
		
$ret .= '	</div><div class="depcol">';

		 if ($field=='payout') {			 
				$ret .= '  '. get_post_meta($casino,"_as_payout",true) .'';
			 }  else if ($field=='mindep') {		
				$ret .= ' '. get_post_meta($casino,"_as_mindeposit",true) .'';
			 } else {
				$ret .= '<span class="hilite">'. get_post_meta($casino,"_as_bonustext",true)  .'</span>';
				  
			 }  

        $ret .= '</div><div  class="ratecol">';
		$ret .= '<span class="rate cen"> <span class="ratetotal" style="width: ';		if(!empty(get_post_meta($casino,"_as_rating",true))){		 $ret .= get_post_meta($casino,"_as_rating",true)*20;		}		$ret .='%"></span></span>';
		if ($showreview!='no') {			 
			$ret .= '<a href="' . get_the_permalink($casino) . '" class="revlink">'.__('Review', 'thesportsbook').'</a>';
		 }
		$ret .= ' </div><div class="visitcol"><a '. (get_theme_option('redirect-new-window')!="" ? "target=\"_blank\"" : "") .' href="'. get_bloginfo('url') .'/'. $redirectslug  .'/'. get_post_meta($casino,"_as_redirectkey",true)  .'" class="visbutton">' . (get_theme_option("betnow-text")!="" ? get_theme_option("betnow-text") : __('Bet Now', 'thesportsbook')  ) .'</a>';
        

		
 $ret .= '</div>
 </div>
';
if ($field!='payout' || $field!='mindep') {
if ($_tc_enable == 'enabled') {
	$ret .= '<div class="termsrow">* '.$_tc_textbox.'</div>';
}
}

} // End of if exists loop

} // End of for loop
 $ret .= '</div>';
 return $ret;
}

add_shortcode('bonustable', 'fly_bonustable_func');

?>