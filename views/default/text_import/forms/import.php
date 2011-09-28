<?php 

	$input_name = $vars['input_name'];
	
	echo '<form target="text_import_upload_frame" method="post" id="text_import_form" action="'.elgg_add_action_tokens_to_url ($vars['url'].'action/text_import/import/text').'" enctype="multipart/form-data">';
	
		echo '<h3 class="settings">'.elgg_echo('text_import:importfromfile').'</h3>';
		
		echo elgg_view('input/file', array('internalname' => 'text_import_file')).'<br />';
		echo '<span class="import_text_subtext">'.elgg_echo('text_import:form:file_description').'</span><br />';
		
		echo elgg_view('input/submit', array('internalname' => 'submit', 'internalid' => 'text_import_submit', 'value' => elgg_echo('text_import:gettext')));
	
	echo '</form>';
	
	echo '<iframe name="text_import_upload_frame" id="text_import_upload_frame"></iframe>';
	
	echo '<button onclick="text_import_update_text(\''.$input_name.'\');" id="text_import_get_content" class="submit_button">'.elgg_echo('text_import:importintextarea').'</button>';