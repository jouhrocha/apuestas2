<?php

/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'fly_load_topsites' );

/* Function that registers our widget. */
function fly_load_topsites() {
	register_widget( 'Top_Site_Widget' );
}

class Top_Site_Widget extends WP_Widget {
	
function __construct() {
		parent::__construct(
			'topsites-widget', // Base ID
			__( 'Recommended Sportsbooks Widget', 'thesportsbook' ), // Name
			array( 'description' => __( 'Display top sportsbooks.', 'thesportsbook' ), ) // Args
		);
	}		
	

public function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		@$title = apply_filters('widget_title', $instance['title'] );
		$version = @$instance['version'];
		$reviewlink=@$instance['reviewlink'];
		$widgetcontent=@$instance['widgetcontent'];
		$playtext=@$instance['playtext'];
		
		$site1=@$instance['ts_casinoname1'];
		$site2=@$instance['ts_casinoname2'];
		$site3=@$instance['ts_casinoname3'];
		$site4=@$instance['ts_casinoname4'];
		$site5=@$instance['ts_casinoname5'];
		$site6=@$instance['ts_casinoname6'];
		$site7=@$instance['ts_casinoname7'];
        $site8=@$instance['ts_casinoname8'];
		$site9=@$instance['ts_casinoname9'];
		$site10=@$instance['ts_casinoname10'];
		
		$site11=@$instance['ts_casinoname11'];
		$site12=@$instance['ts_casinoname12'];
		$site13=@$instance['ts_casinoname13'];
		$site14=@$instance['ts_casinoname14'];
		$site15=@$instance['ts_casinoname15'];
		$site16=@$instance['ts_casinoname16'];
		$site17=@$instance['ts_casinoname17'];
		$site18=@$instance['ts_casinoname18'];
		$site19=@$instance['ts_casinoname19'];
		$site20=@$instance['ts_casinoname20'];
		
		$sites = array ($site1,$site2,$site3,$site4,$site5,$site6,$site7,$site8,$site9,$site10,$site11,$site12,$site13,$site14,$site15,$site16,$site17,$site18,$site19,$site20);	  

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;


?>

<?php

$slugkey=fly_redirect_slug(); 

 if ($version=='Version 2') { ?>

<?php

global $post;
$opost = $post;
foreach ($sites as $site) :

if ($site !='') {

	// Get Terms and Conditions

	$_tc_enable = (get_post_meta($site,"_tc_enable",true)) ?: '';
	$tc_textbox 	= (get_post_meta($site,"_tc_textbox",true)) ?: '';

	?> 
	
	<div class="topsiteswidget-row">

		<figure>
		<?php if ($reviewlink) { ?>
			<a href="<?php echo get_the_permalink($site); ?>" >
	<?php } else { ?>
			<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $slugkey; ?>/<?php echo get_post_meta($site,"_as_redirectkey",true);?>/">

	<?php	} ?>
		<?php echo get_the_post_thumbnail($site,'casino-logo',array('class' => 'ts_logo')); ?> 
		</a></figure>
		<div class="topsiteswidget-content">

			<h5>
			
			<?php if ($reviewlink) { ?>
			<a href="<?php echo get_the_permalink($site); ?>" >
	<?php } else { ?>
			
			<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $slugkey; ?>/<?php echo get_post_meta($site,"_as_redirectkey",true);?>/">
	<?php } ?>
			
			<?php echo get_the_title($site) ?></a> </h5>
			
			<?php if ($widgetcontent=='bonus') { ?>
			<span class="bonusamount hilite"><?php echo get_post_meta($site,"_as_bonustext",true);?></span>
			
			<?php } else { ?>
			<span class="rate"> <span class="ratetotal" style="width: <?php if(!empty(get_post_meta($site,"_as_rating",true))){ echo get_post_meta($site,"_as_rating",true)*20; } ?>%"></span></span>

			<?php } ?>
		
		

	</div>
	
<?php if ($_tc_enable == 'enabled' AND $widgetcontent=='bonus') { ?>
	<div class="termsrow">* <?php echo $tc_textbox; ?></div>
<?php } ?>

</div>


<?php

} // End of if exists loop

endforeach;
?>
		

 <?php }  else {
 

global $post;
$opost = $post;
foreach ($sites as $site) :

if ($site !='') {
	if(!empty(get_post_meta($site,"_as_rating",true))){
$rateper=get_post_meta($site,"_as_rating",true)*20;}
// Get Terms and Conditions

	$_tc_enable = (get_post_meta($site,"_tc_enable",true)) ?: '';
	$tc_textbox 	= (get_post_meta($site,"_tc_textbox",true)) ?: '';

?> 

<div class="topsiteswidget-row">
		<div class="topsiteswidget-name">
			<h5>
			
			<?php if ($reviewlink) { ?>
			<a href="<?php echo get_the_permalink($site); ?>" >
	<?php } else { ?>
			
			<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $slugkey; ?>/<?php echo get_post_meta($site,"_as_redirectkey",true);?>/">
	<?php } ?>
			<?php echo get_the_title($site);?></a> </h5>
			
			
				<?php if ($widgetcontent=='bonus') { ?>
			<span class="bonusamount hilite"><?php echo get_post_meta($site,"_as_bonustext",true);?></span>
			
				<?php } else { ?>
			<span class="rate"> <span class="ratetotal" style="width: <?php if(!empty(get_post_meta($site,"_as_rating",true))){ echo get_post_meta($site,"_as_rating",true)*20; } ?>%"></span></span>
			<?php } ?>
			
			
		</div>
		<div class="topsiteswidget-bet">
		
			<?php if ($reviewlink) { ?>
			<a href="<?php echo get_the_permalink($site); ?>" class="visbutton sm" ><?php  _e('Review', 'thesportsbook'); ?></a>
	<?php } else { ?>
	
		<a <?php if (get_theme_option('redirect-new-window')) { echo "target=\"_blank\""; }?> href="<?php bloginfo('url'); ?>/<?php echo $slugkey; ?>/<?php echo get_post_meta($site,"_as_redirectkey",true);?>/"  class="visbutton sm">
	
		<?php if ($playtext !='') {
			echo $playtext;
		} else {
			 _e('Bet Now', 'thesportsbook'); 
		 } ?>
		</a>
		<?php } ?>
		</div>
		
		<?php if ($_tc_enable == 'enabled' AND $widgetcontent=='bonus') { ?>
	<div class="termsrow">* <?php echo $tc_textbox; ?></div>
<?php } ?>
		
</div>
<?php 
} // End of if exists loop

endforeach;
?>
		 
 
 <?php } ?>

 <?php  
	  
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['version'] = strip_tags( $new_instance['version'] );
		@$instance['reviewlink'] = strip_tags( $new_instance['reviewlink'] );
		$instance['widgetcontent'] = strip_tags( $new_instance['widgetcontent'] );
		$instance['playtext'] = strip_tags( $new_instance['playtext'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['ts_casinoname1'] = strip_tags( $new_instance['ts_casinoname1'] );
		$instance['ts_casinoname2'] = strip_tags( $new_instance['ts_casinoname2'] );
		$instance['ts_casinoname3'] = strip_tags( $new_instance['ts_casinoname3'] );
		$instance['ts_casinoname4'] = strip_tags( $new_instance['ts_casinoname4'] );
		$instance['ts_casinoname5'] = strip_tags( $new_instance['ts_casinoname5'] );
		$instance['ts_casinoname6'] = strip_tags( $new_instance['ts_casinoname6'] );
		$instance['ts_casinoname7'] = strip_tags( $new_instance['ts_casinoname7'] );
		$instance['ts_casinoname8'] = strip_tags( $new_instance['ts_casinoname8'] );
		$instance['ts_casinoname9'] = strip_tags( $new_instance['ts_casinoname9'] );
		$instance['ts_casinoname10'] = strip_tags( $new_instance['ts_casinoname10'] );
		
		$instance['ts_casinoname11'] = strip_tags( $new_instance['ts_casinoname11'] );
		$instance['ts_casinoname12'] = strip_tags( $new_instance['ts_casinoname12'] );
		$instance['ts_casinoname13'] = strip_tags( $new_instance['ts_casinoname13'] );
		$instance['ts_casinoname14'] = strip_tags( $new_instance['ts_casinoname14'] );
		$instance['ts_casinoname15'] = strip_tags( $new_instance['ts_casinoname15'] );
		$instance['ts_casinoname16'] = strip_tags( $new_instance['ts_casinoname16'] );
		$instance['ts_casinoname17'] = strip_tags( $new_instance['ts_casinoname17'] );
		$instance['ts_casinoname18'] = strip_tags( $new_instance['ts_casinoname18'] );
		$instance['ts_casinoname19'] = strip_tags( $new_instance['ts_casinoname19'] );
		$instance['ts_casinoname20'] = strip_tags( $new_instance['ts_casinoname20'] );
               
		return $instance;
	}

public function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Top Sites');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'thesportsbook'); ?>:</label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" style="width:100%;" />
</p>

 <?php $casinos = getAllPostsByType('casino'); ?>
<p>
<label for="<?php echo $this->get_field_id('ts_casinoname1'); ?>"><?php _e('Select Casino 1', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname1'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname1'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname2'); ?>"><?php _e('Select Casino 2', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname2'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo @$h->ID?>" <?php if (@$instance['ts_casinoname2'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>


<p>
<label for="<?php echo $this->get_field_id('ts_casinoname3'); ?>"><?php _e('Select Casino 3', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname3'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname3'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>


<p>
<label for="<?php echo $this->get_field_id('ts_casinoname4'); ?>"><?php _e('Select Casino 4', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname4'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname4'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname5'); ?>"><?php _e('Select Casino 5', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname5'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname5'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname6'); ?>"><?php _e('Select Casino 6', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname6'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname6'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname7'); ?>"><?php _e('Select Casino 7', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname7'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname7'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname8'); ?>"><?php _e('Select Casino 8', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname8'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname8'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname9'); ?>"><?php _e('Select Casino 9', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname9'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname9'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname10'); ?>"><?php _e('Select Casino 10', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname10'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname10'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname11'); ?>"><?php _e('Select Casino 11', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname11'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname11'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname12'); ?>"><?php _e('Select Casino 12', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname12'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname12'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname13'); ?>"><?php _e('Select Casino 13', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname13'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname13'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname14'); ?>"><?php _e('Select Casino 14', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname14'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname14'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname15'); ?>"><?php _e('Select Casino 15', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname15'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname15'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname16'); ?>"><?php _e('Select Casino 16', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname16'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname16'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname17'); ?>"><?php _e('Select Casino 17', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname17'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname17'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname18'); ?>"><?php _e('Select Casino 18', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname18'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname18'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname19'); ?>"><?php _e('Select Casino 19', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname19'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname19'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>

<p>
<label for="<?php echo $this->get_field_id('ts_casinoname20'); ?>"><?php _e('Select Casino 20', 'thesportsbook'); ?>:</label>
<select style="width:60%;" class="widefat" name="<?php echo $this->get_field_name('ts_casinoname20'); ?> ">
 <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>" <?php if (@$instance['ts_casinoname20'] == $h->ID) echo 'SELECTED'; ?>><?php echo $h->post_title?></option>
<?php } ?>

</select>
</p>


<p>
<label for="<?php echo $this->get_field_id('version'); ?>"><?php _e('Widget Output Display Variation', 'thesportsbook'); ?>:</label>
<select name="<?php echo $this->get_field_name('version'); ?>">
 <option value="Version 1" <?php if (@$instance['version'] == "Version 1") echo 'SELECTED'; ?> ><?php _e('Version 1', 'thesportsbook'); ?></option>
 <option value="Version 2" <?php if (@$instance['version'] == "Version 2") echo 'SELECTED'; ?> ><?php _e('Version 2', 'thesportsbook'); ?></option>
</select>
</p>

<p>	
<label><?php _e('Link to Review Page Instead of Casino Directly', 'thesportsbook'); ?>:</label>	
<input style="width:20px;" class="widefat" type="checkbox" <?php if (@$instance['reviewlink']) echo 'CHECKED'; ?> name="<?php echo $this->get_field_name('reviewlink'); ?>" /><?php _e('Check to link widget to review page instead of outbound casino.', 'thesportsbook'); ?>
</p>

<p>
<label for="<?php echo $this->get_field_id('widgetcontent'); ?>"><?php _e('Choose Which Field to Display', 'thesportsbook'); ?>:</label>
<select name="<?php echo $this->get_field_name('widgetcontent'); ?>">
<option value=""><?php _e('Default', 'thesportsbook'); ?></option>
 <option value="bonus" <?php if (@$instance['widgetcontent'] == "bonus") echo 'SELECTED'; ?> ><?php _e('Bonus Text', 'thesportsbook'); ?></option>
 <option value="rating" <?php if (@$instance['widgetcontent'] == "rating") echo 'SELECTED'; ?> ><?php _e('Editor Rating', 'thesportsbook'); ?></option>
</select>
</p>

<p>
<label for="<?php echo @$this->get_field_id('playtext'); ?>"><?php _e('Optional Button Text to Replace Bet Now', 'thesportsbook'); ?>:</label>
<input class="widefat" id="<?php echo @$this->get_field_id('playtext'); ?>" name="<?php echo @$this->get_field_name( 'playtext' ); ?>" value="<?php echo @$instance['playtext']; ?>" type="text" style="width:100%;" />
</p>


  <?php
    }
 }

?>