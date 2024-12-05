<?php
// SETTINGS CONFIGURATION

$fonts=array("Arial, Helvetica, sans-serif"=>"Arial", "'Arial Black',Gadget, sans-serif"=>"Arial Black", "'Arial Narrow', sans-serif"=>"Arial Narrow", "Century Gothic,
sans-serif"=>"Century Gothic", "Copperplate Gothic Light, sans-serif"=>"Copperplate Gothic Light", "'Courier New', Courier, Monaco, monospace"=>"Courier New", "Georgia, Serif"=>"Georgia", "Gill Sans MT, sans-serif"=>"Gill Sans", "Impact, Charcoal, sans-serif"=>"Impact", 
"'Lucida Console', Monaco, monospace"=>"Lucida Console", "'Lucida Sans Unicode', 'Lucida Grande', sans-serif"=>"Lucida Sans Unicode", "'Palatino Linotype', 'Book Antiqua', Palatino, serif"=>"Palatino Linotype", "Tahoma, Geneva, sans-serif"=>"Tahoma", "'Times New Roman', Times, serif"=>"Times New Roman", "'Trebuchet MS', Helvetica, sans-serif"=>"Trebuchet MS", "Verdana, Geneva, sans-serif"=>"Verdana");

$fontsizes=array("8px"=>"8px", "10px"=>"10px", "11px"=>"11px", "12px"=>"12px", "14px"=>"14px", "16px"=>"16px", "18px"=>"18px", "20px"=>"20px","24px"=>"24px","28px"=>"28px","30px"=>"30px","36px"=>"36px", "40px"=>"40px");



$settings = array();

$settings[] = make_advanced_group("Basic Color Settings", array(

	make_setting(__('Body Content Link Color', 'thesportsbook'), "gen-linkcolor","color", "", ""),

	make_setting(__('Body Link Hover Color', 'thesportsbook'), "gen-linkhovercolor","color", "", ""),

	make_setting(__('Bonus Text Color', 'thesportsbook'), "bonus-color", "color", __('Change the color of the bonus text, which is a red color', 'thesportsbook'), ".custom span.hilite { color: "),

	make_setting(__('Orange Tab and Borders Color', 'thesportsbook'), "orange-color1", "color", __('Change the color of navigation and footer border as well as teh hover and active page tab color', 'thesportsbook'),""),


));

$settings[] = make_advanced_group("Button Settings", array(

	make_setting(__('Main Visit Button Color', 'thesportsbook'), "blue-button-bgcolor","color", "", ""),

	make_setting(__('Main Visit Button Text Color', 'thesportsbook'), "blue-button-txcolor", "color", "", ""),
	
));


$settings[] = make_advanced_group("Header Settings", array(

	make_setting(__('Header Background Color', 'thesportsbook'), "headbg-color", "color", __('Change the color of the white background of the header.', 'thesportsbook'), ".custom header.main-header { background: "),
	make_setting(__('Header/Navigation Combination Background Color', 'thesportsbook'), "nav-bgcolor","color", __('Combination of header footer background color style, all in one change.', 'thesportsbook'), ""),
		
));

$settings[] = make_advanced_group("Footer Settings", array(
	
	make_setting(__('Top Footer Background Color', 'thesportsbook'), "footer-topbgcolor","color", __('Change the color of the top footer area', 'thesportsbook'), "footer.main-footer  { background: "),

	make_setting(__('Bottom Footer Background Color', 'thesportsbook'), "footer-bottombgcolor","color", __('Change the color of the bottom footer area', 'thesportsbook'), "footer.bottom-footer { background: "),

	make_setting(__('Footer Heading Bottom Border Color', 'thesportsbook'), "footer-bordercolor","color", __('Change the color of the top footer heading border', 'thesportsbook'), ".footerwidget h3 { border-bottom-color: "),

		
));



$settings[] = make_advanced_group("Background Settings", array(

make_setting(__('Background Color', 'thesportsbook'), "body-background-color", "color", __('Change the color of the gray background.', 'thesportsbook'), " body { background-color: "),
	
make_setting(__('Background Image', 'thesportsbook'), "body-background-image", "image", __('The background image of the body', 'thesportsbook'), " body { background-image: url('", "'); }"),

make_setting(__('Background Image Repeat', 'thesportsbook'), "body-image-repeat", array("no-repeat"=>"None", "repeat"=>"Repeat","repeat-x"=>"Repeat X", "repeat-y"=>"Repeat Y"), __('Should the background image repeat', 'thesportsbook'), " body { background-repeat: "),
	
));


$settings[] = make_advanced_group("Typography Settings", array(
	make_setting(__('General Font Family', 'thesportsbook'), "body-font-family",$fonts, __('The overall font style', 'thesportsbook'), ".custom { font-family: "),

	make_setting(__('Content Area Font Size', 'thesportsbook'), "body-font-size", $fontsizes, __('The size of the body text', 'thesportsbook'), ".custom .main-content { font-size:"),

	make_setting(__('Sidebar Area Font Size', 'thesportsbook'), "sidebar-font-size", $fontsizes, __('The size of the sidebar text', 'thesportsbook'), ".custom .sidebar { font-size:"),

	make_setting(__('Footer Area Font Size', 'thesportsbook'), "footer-font-size", $fontsizes, __('The size of the footer text', 'thesportsbook'), ".custom footer.main-footer,  .custom footer.bottom-footer{ font-size:"),

	make_setting(__('Heading H1 Font Family', 'thesportsbook'), "bodyh1-font-family", $fonts, __('The font type for the H1 headings', 'thesportsbook'), ".custom h1 { font-family:"),

	make_setting(__('Heading H1 Font Size', 'thesportsbook'), "bodyh1-font-size", $fontsizes, __('The size of the H1 heading text', 'thesportsbook'), ""),

	make_setting(__('Heading H2 Font Family', 'thesportsbook'), "bodyh2-font-family", $fonts, __('The font type for the H1 headings', 'thesportsbook'), ".custom h2 { font-family:"),

	make_setting(__('Heading H2 Font Size', 'thesportsbook'), "bodyh2-font-size", $fontsizes, __('The size of the H1 heading text', 'thesportsbook'), ".custom h2 { font-size:"),

	make_setting(__('Heading H3 Font Family', 'thesportsbook'), "bodyh3-font-family", $fonts, __('The font type for the H3 headings', 'thesportsbook'), ".custom h3 { font-family:"),

	make_setting(__('Heading H3 Font Size', 'thesportsbook'), "bodyh3-font-size", $fontsizes, __('The size of the H3 heading text', 'thesportsbook'), ".custom h3 { font-size:"),

		make_setting(__('Sidebar Widget Heading Font Family', 'thesportsbook'), "sideh3-font-family", $fonts, __('The font type for the sidebar widget headings', 'thesportsbook'), ".custom .widget h3 { font-family:"),

	make_setting(__('Sidebar Widget Heading Font Size', 'thesportsbook'), "sideh3-font-size", $fontsizes, __('The size of the sidebar widget heading text', 'thesportsbook'), ".custom .widget h3{ font-size:"),

	make_setting(__('Blog Title Font Family', 'thesportsbook'), "blog-title-fonttype", $fonts, __('The font type for the blog title', 'thesportsbook'), ".custom .header-logo h1 { font-family: "),	

	make_setting(__('Blog Title Font Size', 'thesportsbook'), "blog-title-fontsize", $fontsizes, __('The font size for the blog title', 'thesportsbook'), ".custom .header-logo h1 { font-size: "),

));



$settings[] = make_advanced_group("Custom", array(
	make_setting("Custom CSS", "custom", "textarea", "Custom CSS to be inserted into the site.  Proceed styles by .custom", "", "")
));


add_filter('flytonic_save_custom_css', 'ft_image_bordering', 0 , 2);
function ft_image_bordering($val, $field)
{
	if ($field['slug']=='header-bgcolor') {
	$middlecolor = $val;
	$darkcolor = ft_colorBrightness($val, -0.81);
	$topcolor = ft_colorBrightness($val, 0.98);
	$light = ft_colorBrightness($val, 0.90);
	
	return 'header.main-header { background:' . $val . '; border-bottom:1px solid ' . $darkcolor . ';}';
			
	}

else if ($field['slug']=='nav-bgcolor') {
	$headcolor = $val;
	$navcolorbottom = ft_colorBrightness($val, 0.96);
	$navcolortop = ft_colorBrightness($val, 0.88);
	$bordertop = ft_colorBrightness($val, 0.8);
	$borderbottom = ft_colorBrightness($val, -0.8);

	
	return 'header.main-header {background:' . $val . ';} nav.navbar { background: ' . $navcolorbottom . '; background-image: -moz-linear-gradient(top, ' . $navcolortop . ' 0%, ' . $navcolorbottom . ' 100%);background-image: -webkit-linear-gradient(top, ' . $navcolortop . ' 0%, ' . $navcolorbottom . ' 100%);border-bottom:1px solid '.$borderbottom.'; border-top:1px solid '.$bordertop.';} .nav li a:hover, .nav li a:active,.nav li:active,.nav li:hover {background:' . $bordertop . ';}.nav li ul { background:' . $bordertop . ' ;}	.nav li.current-menu-item a, .nav li.current-menu-parent a  {background:' . $bordertop . '; } .nav li li.current-menu-item li a, .nav li li.current-menu-parent li a  {background:' . $bordertop . ';}.nav li li { border-bottom:1px solid '.$navcolortop.';}.topreview .topright span {color:' . $bordertop . ';} .nav li li a, .nav li li a:visited { color: #fff;}.nav li li a:hover { color:  ' . $navcolorbottom . ' }';
		

	} elseif($field['slug']=='blue-button-bgcolor') {
		$topcolor = ft_colorBrightness($val, 0.9);
	$border = ft_colorBrightness($val, -.9);

		return 'a.visbutton { background: ' . $val . '; background-image: -moz-linear-gradient(top, ' . $topcolor . ' 0%, ' . $val . ' 100%);background-image: -webkit-linear-gradient(top, ' . $topcolor . ' 0%, ' . $val . ' 100%);border-color:' . $border . ';} ';
		
} elseif($field['slug']=='orange-color1') {

	return '.nav li.current-menu-item, .nav li.current-menu-parent { background: ' . $val . '; }.nav li a:hover, .nav li a:active { background: ' . $val . ';} nav.navbar { border-bottom: 3px solid ' . $val . ';} footer.main-footer {border-top: 4px solid ' . $val . ';}';
	
} elseif($field['slug']=='blue-color2') {
	$colortop = ft_colorBrightness($val, 0.88);
	$colorbottom = ft_colorBrightness($val, -0.88);


	return '.midsites {border-bottom:4px solid '.$colorbottom.';}.midsites th {background:'.$val.';}.featureditem {	border:1px solid #ddd;}.featureditem .bottom {background:'.$val.';}.brow1,.brow2,.brow3,.brow4 {border-bottom:1px solid '.$colorbottom.';border-top:1px solid '.$colortop.';}.brow1 {border-top:0;	}.contentmenu .item {border:1px solid #ddd;}.item .bottom {background-color:'.$val.';}.rbblock span.rank1{background:'.$val.';}';


	} elseif($field['slug']=='blue-button-txcolor') {

	return 'a.visbutton { color: ' . $val . '!important;} .newsletterform .submitbutton { color: ' . $val . '!important;}  .custom .searchsubmit{ color: ' . $val . '!important;}';


	
	} elseif($field['slug']=='gen-linkcolor') {

	return '.custom .main-content a, .custom .main-content a:visited { color: ' . $val . '} .custom .pagination span, .custom .pagination a { color:' . $val . '; background: #fff; } .custom .pagination a:hover {color:#fff;background: #' . $val . ';}.custom .pagination .current {background: ' . $val . '; color: #fff;}.custom .pagination a.last { background:#999; color:#FFF;}.custom .pagination a.last:hover { background:#333; color:#FFF;} .custom div.reply a.comment-reply-link, .custom div.reply a.comment-reply-link:visited { background:' . $val . '; }.custom div.reply a.comment-reply-link:hover {background:#999; }.item .bottom a,  .item .bottom a:visited{color:#fff;}#commentform #submit{background:' . $val . ';}#commentform #submit:hover{background:#999;}';

	} elseif($field['slug']=='gen-linkhovercolor') {

	return '.custom .main-content a:hover { color: ' . $val . '}';

	}


	//return $val;
}




// END SETTINGS CONFIGURATION

//ADMINISTRATION SCREEN
add_action('admin_menu', 'theme_styles_add_menu');
function theme_styles_add_menu()
{

	
	add_menu_page('Flytonic Framework', 'Flytonic', 'update_themes', 'design-options', 'theme_styles_show_ui');
	add_submenu_page('design-options', __('Design Options', 'thesportsbook'), __('Design Options', 'sportsbook'), 'update_themes', 'design-options', 'theme_styles_show_ui');
	
}

function theme_styles_show_ui()
{
	
	if ( isset($_REQUEST["action"]) AND $_REQUEST["action"] == "Reset to Default") {
	
		delete_option('design-options-settings');
		design_generate_css();
	}
	
	
	
	if (isset($_REQUEST["action"]) AND $_REQUEST["action"] == "save-settings") {
		$css = $_REQUEST["css"];
		delete_option('design-options-settings');
		add_option('design-options-settings', serialize($css));
		design_generate_css();
	}	
	
	$existing_values = @unserialize(get_option('design-options-settings'));	

	

	if (!is_array($existing_values)) $existing_values = array();
	
	global $settings;

$fonts=array("Arial, Helvetica, sans-serif"=>"Arial", "'Arial Black',Gadget, sans-serif"=>"Arial Black", "'Arial Narrow', sans-serif"=>"Arial Narrow", "Century Gothic,
sans-serif"=>"Century Gothic", "Copperplate Gothic Light, sans-serif"=>"Copperplate Gothic Light", "'Courier New', Courier, Monaco, monospace"=>"Courier New", "Georgia, Serif"=>"Georgia", "Gill Sans MT, sans-serif"=>"Gill Sans", "Impact, Charcoal, sans-serif"=>"Impact", 
"'Lucida Console', Monaco, monospace"=>"Lucida Console", "'Lucida Sans Unicode', 'Lucida Grande', sans-serif"=>"Lucida Sans Unicode", "'Palatino Linotype', 'Book Antiqua', Palatino, serif"=>"Palatino Linotype", "Tahoma, Geneva, sans-serif"=>"Tahoma", "'Times New Roman', Times, serif"=>"Times New Roman", "'Trebuchet MS', Helvetica, sans-serif"=>"Trebuchet MS", "Verdana, Geneva, sans-serif"=>"Verdana");

$fontsizes=array("8px"=>"8px", "10px"=>"10px", "11px"=>"11px", "12px"=>"12px", "14px"=>"14px", "16px"=>"16px", "18px"=>"18px", "20px"=>"20px","24px"=>"24px","28px"=>"28px","30px"=>"30px","36px"=>"36px", "40px"=>"40px");


	
	$settings = apply_filters('design_settings', $settings,$fonts,$fontsizes);
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
    
        
        <div id="poststuff">
        
           
<h2><?php _e('Edit Theme Style', 'sportsbook'); ?></h2>
<p><?php _e('Choose to alter the design and look of your theme.  All css will be saved to your custom.css file in the includes folder.', 'sportsbook'); ?></p>
<form class="form-wrap" method="post" action="?page=design-options">  
<input type="hidden" name="action" value="save-settings" />    

<div class="inside-left">
<?php 
$toS = ceil(count($settings)/2);
if ($toS<1)$toS=1;

for($j=0;$j<$toS;$j++) : 
	$s = $settings[$j];
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
           
                                <?php design_do_field($f, $myslug); ?>


      
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
for($j=$toS;$j<count($settings);$j++) : 
	$s = $settings[$j];
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
           
                                <?php design_do_field($f, $myslug); ?>
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


function design_admin_scripts() {
	wp_enqueue_media();
	wp_enqueue_script('thickbox');
	wp_register_script('design-upload', get_bloginfo('template_url').'/includes/design-options.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('design-upload');


}

function design_admin_styles() {
	wp_enqueue_style('thickbox');
	
}

if (isset($_GET['page']) && $_GET['page'] == 'design-options') {
	add_action('admin_print_scripts', 'design_admin_scripts');
	add_action('admin_print_styles', 'design_admin_styles');
}



//END ADMINISTRATION SCREEN



//CSS GENERATION
function design_generate_css()
{
	global $settings;



	$settings = apply_filters('design_settings', $settings);
	$existing_values = @unserialize(get_option('design-options-settings'));		
	if (!is_array($existing_values)) $existing_values = array();
	
	$template = "";
	
	foreach ($settings as $group) {
		$template .= "/* ".$group["title"]." */\n";
		foreach ($group["fields"] as $field) {
			if ($field['type']=='option_select') {
				$value = $existing_values[$field["slug"]];
				$c='';
				
				if ($value!='') {	
					$c= apply_filters('flytonic_save_custom_css', $field['options'][$value], $field);
					//$c= $field['options'][$value];
				}

				if ($c=='') {
						
					$c = $field['options'][$value];	
					}
				
				$template.=$c;
			} else {



				

  if (isset($existing_values[$field["slug"]]))  { $value = $existing_values[$field["slug"]]; } else { $value = '';} 
				
				$c='';
				if(trim($value)!="") {
					$c = apply_filters('flytonic_save_custom_css',stripslashes($value), $field);	
					if ($c=='') {
						//$c = apply_filters('flytonic_save_custom_css',$field["pre"].stripslashes($value).$field["post"]."\n", $field);	

$c = $field["pre"].stripslashes($value).$field["post"]."\n";	
					}
					//$c = $field["pre"].stripslashes($value).$field["post"]."\n";
				}
				$template.=$c;
			}
		}
		$template .= "\n";
	}
	
	if (function_exists('lo_append_to_custom_css')) {
		$template = lo_append_to_custom_css($template);
	}
	

	file_put_contents(dirname(__FILE__)."/custom.css", $template);

	return $template;
}
//END CSS GENERATION

function ft_colorBrightness($hex, $percent) {
	// Work out if hash given
	$hash = '';
	if (stristr($hex,'#')) {
		$hex = str_replace('#','',$hex);
		$hash = '#';
	}
	/// HEX TO RGB
	$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
	//// CALCULATE 
	for ($i=0; $i<3; $i++) {
		// See if brighter or darker
		if ($percent > 0) {
			// Lighter
			$rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
		} else {
			// Darker
			$positivePercent = $percent - ($percent*2);
			$rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
		}
		// In case rounding up causes us to go to 256
		if ($rgb[$i] > 255) {
			$rgb[$i] = 255;
		}
	}
	//// RBG to Hex
	$hex = '';
	for($i=0; $i < 3; $i++) {
		// Convert the decimal digit to hex
		$hexDigit = dechex($rgb[$i]);
		// Add a leading zero if necessary
		if(strlen($hexDigit) == 1) {
		$hexDigit = "0" . $hexDigit;
		}
		// Append to the hex string
		$hex .= $hexDigit;
	}
	return $hash.$hex;
}


?>