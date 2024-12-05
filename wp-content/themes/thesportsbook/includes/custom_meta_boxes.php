<?php 

add_action('admin_init', 'fly_create_metaboxes');

add_action('save_post','save_blogmetaboxes');
add_action('save_post','save_casinometaboxes');
add_action('save_post','fmt_saveslider_meta');
add_action('save_post','save_pagelanding_meta');

function fly_create_metaboxes(){  
  add_meta_box("room-meta",__('Sportsbook Properties', 'thesportsbook'), "fly_casino_metabox", "casino", "normal", "low");
  add_meta_box("blog-meta", __('Blog Page Options', 'thesportsbook'), "blog_type_metabox", "page", "advanced", "low");
  add_meta_box("slider-meta", __('Slider Properties', 'thesportsbook'), "ftm_slider_addmeta", "slider", "normal", "low");
  add_meta_box("landingpage-meta", __('Landing Page Properties', 'thesportsbook'), "landingpage_addmeta", "page", "normal", "low");
   }  

function get_distinct_values($key, $excludeArray)
{
	global $wpdb;
	$x = $wpdb->get_col("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key='$key'");
	$types = array();
	foreach($x as $y)
	{
		if (!in_array($y, $excludeArray)) {
			$types[] = $y;
		}
	}
	return $types;
}

function fly_casino_metabox($post) {

$custom = get_post_custom($post->ID);  

$roomname = isset($custom["_as_roomname"][0]) ? $custom["_as_roomname"][0] : '';
$roomurl = isset($custom["_as_roomurl"][0]) ? $custom["_as_roomurl"][0] : '';
$redirectkey = isset($custom["_as_redirectkey"][0]) ? $custom["_as_redirectkey"][0] : '';

$rating = isset($custom["_as_rating"][0]) ? $custom["_as_rating"][0] : '';
$bonustext = isset($custom["_as_bonustext"][0]) ? $custom["_as_bonustext"][0] : '';


$mindeposit = isset($custom["_as_mindeposit"][0]) ? $custom["_as_mindeposit"][0] : '';
$thumb1 = isset($custom["_as_thumb1"][0]) ? $custom["_as_thumb1"][0] : '';
$screen1 = isset($custom["_as_screen1"][0]) ? $custom["_as_screen1"][0] : '';

$payout = isset($custom["_as_payout"][0]) ? $custom["_as_payout"][0] : '';

$features = isset($custom["_as_features"][0]) ? $custom["_as_features"][0] : '';    
$quickheadline = isset($custom["_as_quickheadline"][0]) ? $custom["_as_quickheadline"][0] : '';    

//Terms and Conditions
$_tc_enable = isset($custom["_tc_enable"][0]) ? $custom["_tc_enable"][0] : '';

$_tc_textbox = isset($custom["_tc_textbox"][0]) ? $custom["_tc_textbox"][0] : '';
	
?>

<style>
    
    .fly_box {border-bottom:1px solid #e5e5e5;padding:0px 0px 15px 0; }


	 .fly_box p.label label {color: #333; font-size: 13px;line-height: 1.5em;font-weight: bold;padding:0;margin: 0;  display: block;
    vertical-align: text-bottom;  }

	.fly_box p.label { font-size: 12px;line-height: 1.5em; color: #666; text-shadow: 0px 1px 0px #FFF;}


	.fly_box input[type="text"], .fly_box  input[type="number"], .fly_box input[type="password"], .fly_box input[type="email"], .fly_box  textarea,.fly_box  select {
	width: 100%;
    padding: 5px;
    resize: none;
    margin: 0px;
font-size:11px;
color:#666;
}
	
</style>


<input type="hidden" name="casino_type_noncename" id="casino_type_noncename" value="<?php echo wp_create_nonce( 'casino_type'.$post->ID );?>" />


<div class="fly_box">
	<p class="label">
	<label><?php _e('Site Name', 'thesportsbook'); ?>:</label>
	<?php _e('Name of sportsbook to be displayed', 'thesportsbook'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_roomname" value="<?php echo $roomname; ?>" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Site Affiliate URL', 'thesportsbook'); ?>:</label>
	<?php _e('The referral url from the affiliate program', 'thesportsbook'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_roomurl" value="<?php echo $roomurl; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Redirect Key', 'thesportsbook'); ?>:</label>
	<?php _e('This is just a word to hide the full affiliate url that you create.  So the new url would be to visit the site would', 'thesportsbook'); ?>: <?php bloginfo('url'); ?>/visit/yourkey/
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_redirectkey" value="<?php echo $redirectkey; ?>" />
	</div>
</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Screenshot', 'thesportsbook'); ?>:</label>
	<?php _e('The screenshot of the website to be shown on the review page', 'thesportsbook'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" id="upload_image__as_thumb1" name="_as_thumb1" value="<?php echo $thumb1; ?>" />
	<input class="upload_image_button button-primary" id="upload_image_button" type="button" value="Choose Image" />
	 <input class="clear_field_button button-secondary" type="button" value="Clear Field" />
   <img style="max-width: 300px; display: block;" src="<?php echo $thumb1; ?>" class="preview-upload" />
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Payout percent', 'thesportsbook'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_payout" value="<?php echo $payout; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Minimum Deposit (with currency)', 'thesportsbook'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_mindeposit" value="<?php echo $mindeposit; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Bonus Headline', 'thesportsbook'); ?>:</label>
	<?php _e('This is the bonus information displayed in the widgets and shortcode table.  Include text and numbers..etc', 'thesportsbook'); ?>
	</p>

	<div class="inputwrap">
	<input type="text" name="_as_bonustext" value="<?php echo $bonustext; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Site Editor Rating', 'thesportsbook'); ?>:</label>
	<?php _e('Select the rating to be show to visitors', 'thesportsbook'); ?>
	</p>

	<div class="inputwrap">
	<select name="_as_rating" class="smallmetatwo">
        <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
    	<option <?php if ($rating == "1") echo 'SELECTED'; ?>>1</option>


<?php $x=0; while ($x<=5){ ?>

<option <?php if ($rating == "$x") echo 'SELECTED'; ?>><?php echo $x; ?></option>
<?php $x=$x+0.1; } ?>
       </select>
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Features, separate each by |', 'thesportsbook'); ?>:</label>
	</p>
	<div class="inputwrap">
	<input type="text" name="_as_features" value="<?php echo $features; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Review Page Sub Headline', 'thesportsbook'); ?>:</label>
	</p>
	<div class="inputwrap">
	<input type="text" name="_as_quickheadline" value="<?php echo $quickheadline; ?>" />
	</div>

</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Terms and Conditions', 'thesportsbook'); ?>:</label>
	</p>
	<div class="inputwrap">
		<input type="checkbox" name="_tc_enable" id="_tc_enable" value="enabled" <?php echo ($_tc_enable == 'enabled') ? 'checked' : '';  ?>/>
		<label for="_tc_enable"><?php _e('Display Terms and Conditions', 'thesportsbook'); ?></label>
	</div>
	
	<div class="inputwrap">
		<label for="_tc_textbox"><?php _e('Terms and conditions text', 'thesportsbook'); ?></label>
		<textarea type="text" rows="4" name="_tc_textbox" id="_tc_textbox" /><?php echo $_tc_textbox; ?></textarea>
	</div>

</div>

</table>


<script>
	jQuery(document).ready(function($){
    var custom_uploader;
    $('.upload_image_button').click(function(e) {
	formfield = jQuery(this).prev().attr('name');
	 destObj = jQuery(this).prev();
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
			 jQuery(destObj).val(attachment.url);
		
			 jQuery(destObj).parent().find('img').attr('src', attachment.url);

        });
        //Open the uploader dialog
        custom_uploader.open();
   });
   
        jQuery('.clear_field_button').click( function() {
		jQuery(this).prev().prev().val('');
	});
	
	
});
</script>

<?php
      }
	  
	  function ftm_slider_addmeta($post) {
		$custom = get_post_custom($post->ID);  
	
		$buttonText = isset($custom["_button_text"][0]) ? $custom["_button_text"][0] : '';
		$sliderUrl = isset($custom["_slider_url"][0]) ? $custom["_slider_url"][0] : '';
?>

<style>

.fly_box {padding:0px 0px 15px 0; }


	 .fly_box p.label label {color: #333; font-size: 13px;line-height: 1.5em;font-weight: bold;padding:0;margin: 0;  display: block;
    vertical-align: text-bottom;  }

	.fly_box p.label { font-size: 12px;line-height: 1.5em; color: #666; text-shadow: 0px 1px 0px #FFF;}


	.fly_box input[type="text"], .fly_box  input[type="number"], .fly_box input[type="password"], .fly_box input[type="email"], .fly_box  textarea, .fly_box  select {
	width: 100%;
    padding: 5px;
    resize: none;
    margin: 0px;
font-size:11px;
color:#666;
}
	
</style>


<input type="hidden" name="slider_noncename" id="slider_noncename" value="<?php echo wp_create_nonce( 'slider'.$post->ID );?>" />

<div class="fly_box">
	<p class="label">
	<label><?php _e('Button Text', 'thesportsbook'); ?></label>
	</p>
	<div class="inputwrap">
	<input type="text" name="_button_text"  value="<?php echo $buttonText; ?>" />
   </div>
</div>
<div class="fly_box">
	<p class="label">
	<label><?php _e('Slider Url', 'thesportsbook'); ?></label>
	<?php _e('Enter The absolute url including http:// or https://', 'thesportsbook'); ?>
	</p>
	<div class="inputwrap">
	<input type="text" name="_slider_url"  value="<?php echo $sliderUrl; ?>" />
   </div>
</div>
<?php }

  function landingpage_addmeta($post) {
		$custom = get_post_custom($post->ID);  
		$pagebutton_text = isset($custom["_pagebutton_text"][0]) ? $custom["_pagebutton_text"][0] : '';
		$pagebutton_url = isset($custom["_pagebutton_url"][0]) ? $custom["_pagebutton_url"][0] : '';
		$landing_title = isset($custom["_landing_title"][0]) ? $custom["_landing_title"][0] : '';
		$landing_subtitle = isset($custom["_landing_subtitle"][0]) ? $custom["_landing_subtitle"][0] : '';
?>

<style>

.fly_box {padding:0px 0px 15px 0; }


	 .fly_box p.label label {color: #333; font-size: 13px;line-height: 1.5em;font-weight: bold;padding:0;margin: 0;  display: block;
    vertical-align: text-bottom;  }

	.fly_box p.label { font-size: 12px;line-height: 1.5em; color: #666; text-shadow: 0px 1px 0px #FFF;}


	.fly_box input[type="text"], .fly_box  input[type="number"], .fly_box input[type="password"], .fly_box input[type="email"], .fly_box  textarea, .fly_box  select {
	width: 100%;
    padding: 5px;
    resize: none;
    margin: 0px;
font-size:11px;
color:#666;
}
	
</style>


<input type="hidden" name="pagelanding_noncename" id="pagelanding_noncename" value="<?php echo wp_create_nonce( 'pagelanding'.$post->ID );?>" />

<div class="fly_box">
	<p class="label">
	<label><?php _e('Landing Page Top Title', 'thesportsbook'); ?></label>
	</p>
	<div class="inputwrap">
	<input type="text" name="_landing_title"  value="<?php echo $landing_title; ?>" />
   </div>
</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Landing Page Sub Title', 'thesportsbook'); ?></label>
	</p>
	<div class="inputwrap">
	<input type="text" name="_landing_subtitle"  value="<?php echo $landing_subtitle; ?>" />
   </div>
</div>

<div class="fly_box">
	<p class="label">
	<label><?php _e('Button Text', 'thesportsbook'); ?></label>
	</p>
	<div class="inputwrap">
	<input type="text" name="_pagebutton_text"  value="<?php echo $pagebutton_text; ?>" />
   </div>
</div>
<div class="fly_box">
	<p class="label">
	<label><?php _e('Button Url', 'thesportsbook'); ?></label>
	<?php _e('Enter The absolute url including http:// or https://', 'thesportsbook'); ?>
	</p>
	<div class="inputwrap">
	<input type="text" name="_pagebutton_url"  value="<?php echo $pagebutton_url; ?>" />
   </div>
</div>
<?php }


function blog_type_metabox() {
         global $post;  
         $custom = get_post_custom($post->ID); 


$numblogs = isset($custom["_numblogs"][0]) ? $custom["_numblogs"][0] : '';
$blogexcerpts = isset($custom["_blogexcerpts"][0]) ? $custom["_blogexcerpts"][0] : '';
$blogcat = isset($custom["_blogcat"][0]) ? $custom["_blogcat"][0] : '';
         
 
      
?>


<style>

.fly_box {border-bottom:1px solid #e5e5e5;padding:0px 0px 15px 0; }


	 .fly_box p.label label {color: #333; font-size: 13px;line-height: 1.5em;font-weight: bold;padding:0;margin: 0;  display: block;
    vertical-align: text-bottom;  }

	.fly_box p.label { font-size: 12px;line-height: 1.5em; color: #666; text-shadow: 0px 1px 0px #FFF;}


	.fly_box input[type="text"], .fly_box  input[type="number"], .fly_box input[type="password"], .fly_box input[type="email"], .fly_box  textarea,.fly_box  select {
	width: 100%;
    padding: 5px;
    resize: none;
    margin: 0px;
font-size:11px;
color:#666;
}
	
</style>

<input type="hidden" name="blog_type_noncename" id="blog_type_noncename" value="<?php echo wp_create_nonce( 'blog_type'.$post->ID );?>" />


<div class="fly_box">
	<p class="label">
	<label><?php _e('Show Excerpts Instead of Full Posts', 'thesportsbook'); ?>:</label>
	
	</p>

	<div class="inputwrap">
	<select name="_blogexcerpts" >
        <option value=""><?php _e('Select', 'thesportsbook'); ?></option>
    	<option <?php if ($blogexcerpts == "Yes") echo 'SELECTED'; ?>><?php _e('Yes', 'thesportsbook'); ?></option>
        <option <?php if ($blogexcerpts == "No") echo 'SELECTED'; ?>><?php _e('No', 'thesportsbook'); ?></option>
       </select> 
	</div>

</div>


<?php $terms = get_terms('category');?>
<div class="fly_box">
	<p class="label">
	<label><?php _e('Show Posts From This Cat Only', 'thesportsbook'); ?>:</label>
	<?php _e('Choose to only show posts from this category', 'thesportsbook'); ?>
	</p>

	<div class="inputwrap">
	<select id="_blogcat" name="_blogcat">
			<option value="">[<?php _e('All', 'thesportsbook'); ?>]</option>
                            <?php foreach ($terms as $tag) { ?>
                                <option <?php if ($blogcat == $tag->term_id) echo 'SELECTED'; ?> value="<?php echo $tag->term_id;?>"><?php echo $tag->name;?></option>
                            <?php } ?>
	</select>
	</div>

</div>


<div class="fly_box">
	<p class="label">
	<label><?php _e('Number of Posts To Show', 'thesportsbook'); ?>:</label>
	<?php _e('Enter a number here', 'thesportsbook'); ?>
	</p>

	<div class="inputwrap">
	<input  type="text" name="_numblogs" value="<?php echo $numblogs; ?>" />
	</div>

</div>


<?php  } 

function save_blogmetaboxes($post_id) {	
	if (isset($_POST['blog_type_noncename']) AND !wp_verify_nonce( $_POST['blog_type_noncename'], 'blog_type'.$post_id )) {
		return $post_id;
	}

$fields = array('_numblogs', '_blogexcerpts', '_blogcat');
	foreach ($fields as $field) {
		if (isset($_POST[$field])) { update_post_meta($post_id, $field, $_POST[$field]); }
	}

}

function fmt_saveslider_meta($post_id) {
	global $post;

	if (isset($_POST['slider_noncename']) AND !wp_verify_nonce( $_POST['slider_noncename'], 'slider'.$post_id )) {
		return $post_id;
	}
	
	$fields = array('_slider_url','_button_text');
	foreach($fields as $field):
	if (isset($_POST[$field])) { update_post_meta($post_id, $field, $_POST[$field]); }
	endforeach;
}	

function save_pagelanding_meta($post_id) {
	global $post;

	if (isset($_POST['pagelanding_noncename']) AND !wp_verify_nonce( $_POST['pagelanding_noncename'], 'pagelanding'.$post_id )) {
		return $post_id;
	}
	
	$fields = array('_pagebutton_url','_pagebutton_text','_landing_title','_landing_subtitle');
	foreach($fields as $field):
	if (isset($_POST[$field])) { update_post_meta($post_id, $field, $_POST[$field]); }
	endforeach;
}	

function save_casinometaboxes($post_id) {
	global $post;

	if ( isset($_POST['casino_type_noncename']) AND !wp_verify_nonce( $_POST['casino_type_noncename'], 'casino_type'.$post_id )) {
		return $post_id;
	}
	
	$fields = array('_as_roomname', '_as_roomurl','_as_redirectkey' ,'_as_bonusamount','_as_rating','_as_bonustext','_as_mindeposit','_as_subonus','_as_bonusper','_as_thumb1','_as_payout','_tc_enable','_tc_textbox','_as_features','_as_quickheadline');
	foreach ($fields as $field) {
		if (isset($_POST[$field])) { update_post_meta($post_id, $field, $_POST[$field]); }

		// If Terms and Conditions is not checked store disabled as meta value
		if (!isset($_POST['_tc_enable'])) { update_post_meta( $post_id, '_tc_enable', 'disabled' ); }
	}

}	

?>