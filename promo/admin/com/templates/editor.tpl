
<script src="includes/js/jquery/plugins/jquery.plugin.js"></script>
<script src="includes/js/imodal/imodal.js"></script>
<!-- <script src="includes/js/jquery/plugins/jquery.iModal.js"></script> -->
<script src="includes/js/jquery/plugins/jquery.tableSelector.js"></script>
<script src="includes/js/jquery/plugins/jquery.window.js"></script>
<script src="includes/js/jquery/plugins/jquery.window-extensions.js"></script>
<link rel="stylesheet" href="includes/js/imodal/imodal.css" type="text/css" media="screen" />


<script>

tinyMCE.init({
	// General options
	mode : "exact",
	inline_styles : false,
	editor_selector : "InterspireEditor",
	elements : "{$editor.ElementId}",
	convert_fonts_to_spans : false,
	force_hex_style_colors : false,
	fix_table_elements : true,
	fix_list_elements : true,
	fix_nesting : false,
	forced_root_block : false,
	theme : "advanced",
	skin : "o2k7",
	skin_variant : "silver",
	// Theme options
	theme_advanced_buttons1 : "undo,redo,|,bold,italic,underline,formatselect,fontselect,fontsizeselect,justifyleft,justifycenter,justifyright,justifyfull{$dynamicContentButton}",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,cleanup,|,bullist,numlist,|,table,|,outdent,indent,|,interspiresurvey,link,unlink,anchor,image,media,|,forecolor,backcolor,|,|,code,syntaxhl,preview,|,cfbutton",
	theme_advanced_buttons3 : "",
	theme_advanced_buttons4 : "",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	relative_urls: false,
	document_base_url : "{$editor.AppUrl}",
	content_css : "{$editor.FullUrl}themes/advanced/skins/o2k7/content.css",
	plugins : "{$plugins}",
	template_external_list_url : "{$editor.FullUrl}lists/template_list.js",
	external_image_list_url : "{$editor.AppUrl}/admin/index.php?Page=ImageManager&Action=getimageslist&Type={$editor.ImageDirType}&TypeId={$editor.ImageDirTypeId}",
	external_link_list_url  : "{$editor.AppUrl}/admin/index.php?Action=GetPredefinedLinkList",
	media_external_list_url : "{$editor.FullUrl}lists/media_list.js",
	convert_urls : false,
	remove_script_host : false,
	cleanup : true,
	cleanup_on_startup : true,
	cleanup_callback : "Application.Modules.TinyMCE.customCleanup",
	verify_html : false,
	width : "{$editor.Width}",
	height : "{$editor.Height}",
	force_p_newlines : false,
	force_br_newlines : true,
	imgPathType : '{$editor.ImageDirType}',
	imgPathTypeId : '{$editor.ImageDirTypeId}',
	template_replace_values : {
	},
	setup : function(ed) {
		// Add a custom field button
		ed.addButton('cfbutton', {
			title : 'Custom Fields',
			image : '{$editor.AppUrl}/admin/images/mce_customfields.gif',
			onclick : function() {
				javascript: ShowCustomFields('html', 'myDevEditControl', '%%PAGE%%'); return false;
			}
		});
		{$dynamicContentPopup}
	}
});
</script>

<textarea rows="10" id="{$editor.ElementId}" name="{$editor.ElementId}" class="InterspireEditor">
{$editor.HtmlContent}
</textarea>
