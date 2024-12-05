<?php

/*
	Excerpt Shorcode Window
*/

/*
	This actually adds the html for the dialog, all html and JS needed to control the behavior should go here
*/
add_action('admin_footer', 'excerpt_button_add_editor');

// Add Excerpt Shortcode Dialog Window
function excerpt_button_add_editor()
{
	$terms = get_terms('category');
?>
<style>  
	.flytonic_sc_editor { padding: 10px !important; margin:0 auto; color:#444; font-size:12px;  }
 .flytonic_sc_editor .fly_textinput {font-size:11px; border:1px solid #ddd; border-radius:4px; -moz-border-radius:4px; color:#444; padding:3px !important; margin:0 0 10px 0; height:27px;  }
 .flytonic_sc_editor label {margin-right:5px;}
.flytonic_sc_editor p {margin:0 0 10px 0; padding:0; font-size:12px; font-style:italic; color:#666;}	
.dialog-fly {z-index:9999;}
</style>


 <div id="excerpt_editor" class="flytonic_sc_editor" title="Recent Posts Shortcode"  style="display:none">
    	
	<div>
    	<label><?php _e('Number of Posts (5=Default)', 'thesportsbook'); ?></label>
    	<input class="fly_textinput" type="text" name="excerpt_num" id="excerpt_num" size="10">
   	</div>	  
	
	<div>
    	<label><?php _e('Filter by Category', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="excerpt_cat" id="excerpt_cat">
    	     	<option value=""><?php _e('[None]', 'thesportsbook'); ?></option>
                <?php foreach ($terms as $tag) { ?>
                <option value="<?php echo $tag->name;?>"><?php echo $tag->name;?></option>
                <?php } ?>
    	</select>
	<p><?php _e('You can choose to show posts within a certain category.', 'thesportsbook'); ?></p>
	</div>
	
	<div>
    	<label><?php _e('Article Excerpts Display', 'thesportsbook'); ?></label>
    	<select class="fly_textinput" name="excerpt_display" id="excerpt_display">
    	     	<option value="Vertical"><?php _e('Vertical', 'thesportsbook'); ?></option>
                <option value="Horizontal"><?php _e('Horizontal', 'thesportsbook'); ?></option>
    	</select>
	<p><?php _e('Display articles vertical in columns or horizontal rows.', 'thesportsbook'); ?></p>
	</div>
	
	<div>
    	<label><?php _e('Optional Read More Link', 'thesportsbook'); ?></label>
    	<input class="fly_textinput" type="text" name="excerpt_readlink" id="excerpt_readlink">
		<p><?php _e('Enter a link here to show a button after the articles that will link to more articles', 'thesportsbook'); ?></p>
   	</div>	  
	
		<div>
    	<label><?php _e('Read More Text', 'thesportsbook'); ?></label>
    	<input class="fly_textinput" type="text" name="excerpt_readtext" id="excerpt_readtext">
		<p><?php _e('Enter the text for the read more button', 'thesportsbook'); ?></p>
   	</div>	  

    </div>



    <script>
	jQuery(document).ready( function() {
		jQuery('#excerpt_editor').dialog({
			autoOpen:false,
			draggable: false,
			modal: true,
			resizable: false,
			buttons: {
				Ok: function() {
					var str = '[excerptlist ';
					
					if (jQuery('#excerpt_num').val()!='') str += 'num=' + jQuery('#excerpt_num').val() + ' '; //a normal input
					if (jQuery('#excerpt_cat :selected').val()!='') str += 'cat=\'' + jQuery('#excerpt_cat :selected').val() + '\' '; //a select box
					if (jQuery('#excerpt_display :selected').val()!='') str += 'display=\'' + jQuery('#excerpt_display :selected').val() + '\' '; //a select box
					if (jQuery('#excerpt_readlink').val()!='') str += 'readmorelink=\'' + jQuery('#excerpt_readlink').val() + '\' '; //a normal input
					if (jQuery('#excerpt_readtext').val()!='') str += 'readmoretext=\'' + jQuery('#excerpt_readtext').val() + '\' '; //a normal input
										
					str += ']';
					
					var Editor = tinyMCE.get('content');
					if (Editor == null) {
						jQuery('#excerpt_editor').data('Editor').insertContent(str);
					} else {
						Editor.focus();
						Editor.selection.setContent(str);
					}
					
					jQuery( this ).dialog( "close" );
				},
				Cancel: function() {
					jQuery( this ).dialog( "close" );
				}
			}
		});
	});
	</script>
<?php
}

?>