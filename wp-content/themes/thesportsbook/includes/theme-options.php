<?php
// SETTINGS CONFIGURATION
$theme_options = array();


$theme_options[] = make_advanced_group(__('Branding Preferences', 'thesportsbook'), array(
	make_setting(__('Logo', 'thesportsbook'), "header-logo", "image", __('The logo for your site.  Recommended size is less than 300px wide and 100px in height.', 'thesportsbook')),
	make_setting(__('Favicon URL', 'thesportsbook'), "branding-favicon", "text",__('Enter the full url for your custom favicon.', 'thesportsbook')),
	make_setting(__('Login Logo', 'thesportsbook'), "login-logo", "image", __('The logo that is shown on the login page.  Recommended size less than 200px x 60px', 'thesportsbook')),
	make_setting(__('Login Logo URL', 'thesportsbook'), "login-logourl", "text", __('The link url for the logo image.  Where the user goes when they click on the login logo.', 'thesportsbook')),
	make_setting(__('Login Logo Title', 'thesportsbook'), "login-logoalt", "text", __('The alternative text for the logo on login page.', 'thesportsbook'))
	
));

$theme_options[] = make_advanced_group(__('Header Preferences', 'thesportsbook'), array(
	make_setting(__('Header script', 'thesportsbook'), "header-script", "textarea", __('Additional information to insert in the page header file like Google Analytics code', 'thesportsbook')),
make_setting(__('Disable search', 'thesportsbook'), "header-search-disable", "checkbox", __('Check to disable search icon in header', 'thesportsbook')),
     
));

$themecolors=array("Dark"=>"Dark","Blue"=>"Blue");


$theme_options[] = make_advanced_group(__('General Options', 'thesportsbook'), array(
	
	make_setting(__('Theme Color', 'thesportsbook'), "theme-color", $themecolors, __('Choose a preset theme design style other than default.', 'thesportsbook')),
       make_setting(__('Review Page Slug', 'thesportsbook'), "affiliate-slug","text", __('The sportsbook review site slug, default is review.  Example - http://www.yoursite.com/slug/casinoname/.  You will need to reset your permalinks by resaving them if you change this, otherwise you will see a 404 page.', 'thesportsbook')),

));

$theme_options[] = make_advanced_group(__('Bylines', 'thesportsbook'), array(
	make_setting(__('Hide Entire Bylines', 'thesportsbook'), "bylines-hide-all", "checkbox",__('Check to hide all bylines including post date, category, author and comments from all areas.', 'thesportsbook')),
	make_setting(__('Hide Author', 'thesportsbook'), "bylines-hide-author", "checkbox"),
	make_setting(__('Hide Date', 'thesportsbook'), "bylines-hide-date", "checkbox"),
	make_setting(__('Hide Category', 'thesportsbook'), "bylines-hide-category", "checkbox"),
	make_setting(__('Hide Comments Link', 'thesportsbook'), "bylines-hide-comment", "checkbox", __('Check to hide comments link and comments number in bylines.', 'thesportsbook'))
));

$theme_options[] = make_advanced_group(__('Footer Options', 'thesportsbook'), array(
 	make_setting(__('Footer script', 'thesportsbook'), "footer-script", "textarea"),
        make_setting(__('Hide Footer Widget Area (Where Applicable)', 'thesportsbook'), "footer-toparea", "checkbox"),
	make_setting(__('Hide Footer Menu Area (Where Applicable)', 'thesportsbook'), "footer-menuarea", "checkbox"),
 	make_setting(__('Hide Bottom Footer Area', 'thesportsbook'), "footer-bottomhide", "checkbox"),
	make_setting(__('Hide theme credit', 'thesportsbook'), "footer-credit", "checkbox"),
        make_setting(__('Bottom Footer Text', 'thesportsbook'), "footer-text", "textarea", __('Enter text to replace the copyright, theme credit, and site link in the footer.', 'thesportsbook'))
));

$theme_options[] = make_advanced_group(__('Word Replacement', 'thesportsbook'), array(
	make_setting(__('Replace Bet Now button text', 'thesportsbook'), "betnow-text", "text", __('Enter the word to replace Bet Now button text in shortcodes and review page.', 'thesportsbook')),
	make_setting(__('Replace Sportsbook table text', 'thesportsbook'), "sportsbook-text", "text", __('Enter the word to replace Sportsbook text in shortcode comparison table.', 'thesportsbook')),
	make_setting(__('Replace Features table text', 'thesportsbook'), "features-text", "text", __('Enter the word to replace features text in shortcode comparison table.', 'thesportsbook')),
	make_setting(__('Replace Bonus table text', 'thesportsbook'), "bonus-text", "text", __('Enter the word to replace Bonus text in shortcode comparison table.', 'thesportsbook')),
	make_setting(__('Replace Payout table text', 'thesportsbook'), "payout-text", "text", __('Enter the word to replace Payout text in shortcode comparison table.', 'thesportsbook')),
	make_setting(__('Replace Rating table text', 'thesportsbook'), "rating-text", "text", __('Enter the word to replace Rating text in shortcode comparison table.', 'thesportsbook')),
  
));

$theme_options[] = make_advanced_group(__('Redirect Options', 'thesportsbook'), array(
	make_setting(__('Link Redirect Options', 'thesportsbook'), "redirect-new-window", "checkbox", __('Check to have affiliate redirect links open in new windows when clicked', 'thesportsbook')),
 make_setting(__('Outbound Redirect Slug', 'thesportsbook'), "redirect-slug","text", __('Enter the outbound affiliate slug to replace visit, use one word', 'thesportsbook')),
 make_setting(__('Outbound Ad Redirect Slug', 'thesportsbook'), "redirect-slug","text", __('Enter the outbound affiliate slug to replace outgoing, use one word', 'thesportsbook'))

));

$theme_options[] = make_advanced_group(__('Excerpts', 'thesportsbook'), array(
	make_setting(__('Excerpt length', 'thesportsbook'), "excerpt-length", "text")
));


// END SETTINGS CONFIGURATION

//ADMINISTRATION SCREEN
add_action('admin_menu', 'theme_options_add_menu', 100);
function theme_options_add_menu()
{
	add_submenu_page('design-options', __('Theme Options', 'thesportsbook'), __('Theme Options', 'thesportsbook'), 'update_themes', 'theme-options', 'theme_options_show_ui');
}

function get_theme_options()
{
	$opc = get_option('theme-options-settings');
	if ($opc != "") return unserialize($opc);
	
	return array();
}

function get_theme_option($key)
{
	$options = get_theme_options();
	if (is_array ($options) ){
		if (array_key_exists($key, $options)) {
			return $options[$key];
		}
	}
	
	return false;
}

function theme_options_show_ui()
{
	
	if (isset($_REQUEST["action"]) AND $_REQUEST["action"] == "Reset to Default") {
		//delete the option
		delete_option('theme-options-settings');
	}
	
	if (isset($_REQUEST["action"]) AND $_REQUEST["action"] == "save-settings") {
		$tos = $_REQUEST["theme_options"];
		delete_option('theme-options-settings');
		add_option('theme-options-settings', serialize($tos));
	}	
	
	$existing_values = @unserialize(get_option('theme-options-settings'));	
	
	if (!is_array($existing_values)) $existing_values = array();
	
	global $theme_options;
	$theme_options = apply_filters('theme_options', $theme_options);

?>
<style>
    /*My css start*/
    .js .postbox .handlediv:focus {
		box-shadow: none;
		outline: 0;
	}
	
	.postbox .handlediv {    
	display: block;    
	float: right;    
	width: 36px;    
	height: 36px;    
	margin: 0;    
	padding: 0;    
	border: 0;    
	background: 0 0;    
	cursor: pointer;
	}
	
	.js .postbox .handlediv:focus .toggle-indicator::before {
		box-shadow: 0 0 0 1px #5b9dd9,0 0 2px 1px rgba(30,140,190,.8);
	}

	.postbox .hndle, .stuffbox .hndle {
		border-bottom: 1px solid #ccd0d4;
	}
	
	/*My css end*/
	.inside-left, .inside-right {
		width: 48%; float: left;
		margin: 0 5px 0 5px; }
	
	.halfpostbox { margin: 5px 0 5px 0; }
	
	.upload_image_button, .clear_field_button {
		width: auto !important; }
		
	input.farbtastic_color { width: 200px !important; }
	.farbtastic_container { display: none; }
	
	.postbox .inside { display: none; }
</style>
<script>
jQuery(document).ready( function() {
	jQuery('.handlediv').click(function(){
		jQuery(this).siblings('.inside').toggle(500);
	});
});
</script>
	<div class="wrap meta-box-sortables">
    	<div class="icon32" id="icon-themes"><br></div>
        <h2><?php _e('Theme Options', 'thesportsbook'); ?></h2>
        
        <div id="poststuff">
        
<p><?php _e('Update the different options of the themes here.', 'thesportsbook'); ?></p>
<form class="form-wrap" method="post" action="?page=theme-options">  
<input type="hidden" name="action" value="save-settings" />    

<div class="inside-left">
<?php 
$toS = ceil(count($theme_options)/2);
if ($toS<1)$toS=1;

for($j=0;$j<$toS;$j++) : 
	$s = $theme_options[$j];
	$fields = $s["fields"]; ?>

         <div class="postbox halfpostbox" id="">
            <button type="button" class="handlediv button-link" aria-expanded="false"><span class="screen-reader-text">Toggle panel: <?php echo $s["title"];?></span><span class="toggle-indicator" aria-hidden="true"></span></button>
<h2 class="hndle ui-sortable-handle"><span><?php echo $s["title"];?></span></h2>
            <div class="inside">
                    <?php
                        for ($i=0;$i<count($fields);$i++) {
                            $f = $fields[$i];
                        ?>
                            <div class="form-field form-required">

<?php if (isset($existing_values[$f["slug"]]))  { $myslug = $existing_values[$f["slug"]]; } else { $myslug = '';}  ?>
           
                                <?php design_do_field($f, $myslug, "theme_options"); ?>


                            </div>
                        <?php
                        }
                    ?>
            </div>                
        </div>
<?php endfor; ?>
</div>
<div class="inside-right">
<?php
for($j=$toS;$j<count($theme_options);$j++) : 
	$s = $theme_options[$j];
	$fields = $s["fields"]; ?>

         <div class="postbox halfpostbox" id="quick-settings">
              <button type="button" class="handlediv button-link" aria-expanded="false"><span class="screen-reader-text">Toggle panel: <?php echo $s["title"];?></span><span class="toggle-indicator" aria-hidden="true"></span></button>
<h2 class="hndle ui-sortable-handle"><span><?php echo $s["title"];?></span></h2>
            <div class="inside">
                    <?php
                        for ($i=0;$i<count($fields);$i++) {
                            $f = $fields[$i];
                        ?>
                            <div class="form-field form-required">
                                
<?php if (isset($existing_values[$f["slug"]]))  { $myslug = $existing_values[$f["slug"]]; } else { $myslug = '';}  ?>
           
                                <?php design_do_field($f, $myslug, "theme_options"); ?>
                            </div>
                        <?php
                        }
                    ?>
            </div>                
        </div>
<?php endfor; ?>
</div>
<div class="clear"></div>
<input type="submit" value="<?php _e('Save Changes', 'thesportsbook'); ?>" accesskey="p" tabindex="5" id="publish" class="button-primary" name="publish">
<input type="submit" name="action" value="<?php _e('Reset to Default', 'thesportsbook'); ?>" class="button-secondary">
</form>
		</div><!--poststuff-->
        
    </div><!--wrap-->

<?php
}

function theme_options_admin_scripts() {
	wp_enqueue_media();
	wp_enqueue_script('thickbox');
	wp_register_script('design-upload', get_bloginfo('template_url').'/includes/design-options.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('design-upload');
}

if (isset($_GET['page']) && $_GET['page'] == 'theme-options') {
	add_action('admin_print_scripts', 'design_admin_scripts');
	add_action('admin_print_styles', 'design_admin_styles');
}
	
?>