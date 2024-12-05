( function() {
	
	tinymce.create('tinymce.plugins.flytonic_shortcodes', {

        init : function(editor, url) {
			var my_shortcodes = [ 
				{text:'Sportsbook Comparison Table', value:'Sportsbook Comparison Table'},
				{text:'Featured Sportsbooks Columns', value:'Featured Sportsbooks Columns'},
				{text:'Recent Posts', value:'Recent Posts'},
				{text:'Buttons', value:'Buttons'},
				{text:'Alert Boxes', value:'Alert Boxes'},
				{text:'Columns', value:'Columns'},
				
			];

            editor.addButton('flytonic_shortcodes', {
                type: 'listbox',
				text: 'Flytonic ',
				icon: false,
				fixedWidth: true,
				style:'color:#990000;',
				onselect: function(e) {
					//editor.insertContent(this.value());
					var v = this.value();
					
					if(v == 'Buttons'){
						jQuery("#cdf_shortcode_dialog").data("Editor", editor);
						jQuery('#cdf_shortcode_dialog').dialog({'dialogClass'   : 'wp-dialog', 'width': '400px'}).dialog('open');
					}
					
					if(v == 'Alert Boxes'){
						jQuery("#fly_boxes").data("Editor", editor);
						jQuery('#fly_boxes').dialog({'dialogClass'   : 'wp-dialog', 'width': '400px'}).dialog('open');
					}
					
					if(v == 'Sportsbook Comparison Table'){
						jQuery("#bcb_editor").data("Editor", editor);
						jQuery('#bcb_editor').dialog({'dialogClass'   : 'wp-dialog', 'width': '400px'}).dialog('open');
									}
									
					if(v == 'Featured Sportsbooks Columns'){
						jQuery("#bcb_editor2").data("Editor", editor);
						jQuery('#bcb_editor2').dialog({'dialogClass'   : 'wp-dialog', 'width': '400px'}).dialog('open');
									}

					if(v == 'Recent Posts'){
						jQuery("#excerpt_editor").data("Editor", editor);
						jQuery('#excerpt_editor').dialog({'dialogClass'   : 'wp-dialog', 'width': '400px'}).dialog('open');
					}
					
					if(v == 'Columns'){
							jQuery("#fly_columns").data("Editor", editor);
					jQuery('#fly_columns').dialog({'dialogClass'   : 'wp-dialog', 'width': '400px'}).dialog('open');
					}

				},
				values: my_shortcodes,
				onPostRender: function() {
					// Select the second item by default
					//this.value('Some text 2');
				}
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });    
	
	tinymce.PluginManager.add('flytonic_shortcodes', tinymce.plugins.flytonic_shortcodes);
} )();

