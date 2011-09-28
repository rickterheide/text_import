<?php 
global $fancybox_js_loaded;

if(empty($fancybox_js_loaded))
{
	$fancybox_js_loaded = true;
?>
<link rel="stylesheet" href="<?php echo $vars["url"];?>mod/text_import/vendors/fancybox/jquery.fancybox-1.3.4.css" type="text/css" />
<script type="text/javascript" src="<?php echo $vars["url"];?>mod/text_import/vendors/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<?php 
}
?>
<script type="text/javascript">
$(function()
{
	$('#text_import_form').live('submit', function()
	{
		filename_split = $('input[name=text_import_file]').val().split('.');
		extension = filename_split[filename_split.length-1];
	
		var ex_list = [ 'txt', 'docx', 'odt', 'pdf' ];
		if($.inArray(extension, ex_list) > -1)
		{
			$('#text_import_get_content, #text_import_upload_frame').show();
		}
		else
		{
			$('#text_import_get_content, #text_import_upload_frame').hide();
			alert('<?php echo elgg_echo('text_import:error:file_format_not_supported');?>');
		}		
	});
});

function text_import_update_text(field)
{
	var file_content = $('#text_import_upload_frame').contents().find('html body').html();

	editor = tinyMCE.get(field);

	if(typeof editor != "undefined")
	{
		current_val = editor.getContent();
		editor.execCommand('mceSetContent', false, current_val + ' ' + file_content);
	}
	else
	{
		$textarea = $("textarea[name='"+field+"']");		
		current_val = $textarea.val();
		
		$textarea.val(current_val + ' ' + file_content);
	
		$textarea.scrollTop($textarea[0].scrollHeight);
	}
	$.fancybox.close();
}
</script>
