<?php

/*
	Run the bonuscode2_button function when WP initialization
*/

/*
	This actually adds the html for the dialog, all html and JS needed to control the behavior should go here
*/
add_action('in_admin_footer', 'bcb_add_editor2');
function bcb_add_editor2()
{
	
	
?>
<style>
  .flytonic_sc_editor { padding: 10px !important; margin:0 auto; color:#444; font-size:12px;  }
 .flytonic_sc_editor .fly_textinput {font-size:11px; border:1px solid #ddd; border-radius:4px; -moz-border-radius:4px; color:#444; padding:3px !important; margin:0 0 10px 0; height:27px;  }
 .flytonic_sc_editor label {margin-right:5px;}
.flytonic_sc_editor p {margin:0 0 10px 0; padding:0; font-size:12px; font-style:italic; color:#666;}	
</style>
	<div id="bcb_editor2" class="flytonic_sc_editor" title="<?php _e('Featured Sportsbook Columns', 'thesportsbook'); ?>"  style="display:none">
        	
       <?php $casinos = getAllPostsByType('casino'); ?>
	
	<div>
    	<label><?php _e('Casino 1', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="casino1b" id="casino1b">
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 2 Optional', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="casino2b" id="casino2b">
    	     <option value="">[<?php _e('Optional', 'thesportsbook'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 3 Optional', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="casino3b" id="casino3b">
    	     <option value="">[<?php _e('Optional', 'thesportsbook'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 4 Optional', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="casino4b" id="casino4b">
    	     <option value="">[<?php _e('Optional', 'thesportsbook'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 5 Optional', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="casino5b" id="casino5b">
    	     <option value="">[<?php _e('Optional', 'thesportsbook'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 6 Optional', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="casino6b" id="casino6b">
    	     <option value="">[<?php _e('Optional', 'thesportsbook'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 7 Optional', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="casino7b" id="casino7b">
    	     <option value="">[<?php _e('Optional', 'thesportsbook'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>

	<div>
    	<label><?php _e('Casino 8 Optional', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="casino8b" id="casino8b">
    	     <option value="">[<?php _e('Optional', 'thesportsbook'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>
	
		<div>
    	<label><?php _e('Casino 9 Optional', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="casino9b" id="casino9b">
    	     <option value="">[<?php _e('Optional', 'thesportsbook'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>
	
		<div>
    	<label><?php _e('Casino 10 Optional', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="casino10b" id="casino10b">
    	     <option value="">[<?php _e('Optional', 'thesportsbook'); ?>]</option>
		<?php foreach ($casinos as $h) { ?>
        	<option value="<?php echo $h->ID?>"><?php echo $h->post_title?></option>
        	<?php } ?>
	</select>
	</div>
	
	<div>
    	<label><?php _e('Choose extra field to show (default is bonus)', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="bcb_ratefield2b" id="bcb_ratefield2b">
    	     <option value="">[<?php _e('Default', 'thesportsbook'); ?>]</option>
			<option value="rating"><?php _e('Rating', 'thesportsbook'); ?></option>
    	</select>
	</div>
	
	<div>
    	<label><?php _e('Show Review Link or Button?', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="bcb_revtable2b" id="bcb_revtable2b">
    	     <option value=""><?php _e('Yes', 'thesportsbook'); ?></option>
			<option value="no"><?php _e('No', 'thesportsbook'); ?></option>
    	</select>
	</div>
     
</div>

   
    <script>
	jQuery(document).ready( function() {
		jQuery('#bcb_editor2').dialog({
			buttons: {
				Ok: function() {
					var str = '[featured-sportsbooks ';

									
if (jQuery('#casino1b :selected').val()!='') str += 'site1=\'' + jQuery('#casino1b :selected').val() + '\' '; //a select box
if (jQuery('#casino2b :selected').val()!='') str += 'site2=\'' + jQuery('#casino2b :selected').val() + '\' '; //a select box
if (jQuery('#casino3b :selected').val()!='') str += 'site3=\'' + jQuery('#casino3b :selected').val() + '\' '; //a select box
if (jQuery('#casino4b :selected').val()!='') str += 'site4=\'' + jQuery('#casino4b :selected').val() + '\' '; //a select box
if (jQuery('#casino5b :selected').val()!='') str += 'site5=\'' + jQuery('#casino5b :selected').val() + '\' '; //a select box
if (jQuery('#casino6b :selected').val()!='') str += 'site6=\'' + jQuery('#casino6b :selected').val() + '\' '; //a select box
if (jQuery('#casino7b :selected').val()!='') str += 'site7=\'' + jQuery('#casino7b :selected').val() + '\' '; //a select box
if (jQuery('#casino8b :selected').val()!='') str += 'site8=\'' + jQuery('#casino8b :selected').val() + '\' '; //a select box
if (jQuery('#casino9b :selected').val()!='') str += 'site9=\'' + jQuery('#casino9b :selected').val() + '\' '; //a select box
if (jQuery('#casino10b :selected').val()!='') str += 'site10=\'' + jQuery('#casino10b :selected').val() + '\' '; //a select box
	if (jQuery('#bcb_ratefield2b :selected').val()!='') str += 'field=\'' + jQuery('#bcb_ratefield2b :selected').val() + '\' '; //a select box
if (jQuery('#bcb_revtable2b :selected').val()!='') str += 'showreview=\'' + jQuery('#bcb_revtable2b :selected').val() + '\' '; //a select box
					str += ']';
					
					tinyMCE.activeEditor.selection.getContent();

					tinyMCE.activeEditor.selection.setContent(str);

					
					jQuery( this ).dialog( "close" );
				},
				Cancel: function() {
					jQuery( this ).dialog( "close" );
				}
			},
			autoOpen:false,
			draggable: false,
			modal: true,
			resizable: false
		});
	});
	</script>
<?php
}

?>