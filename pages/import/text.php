<?php 

	gatekeeper();
	
	$input_name = get_input('internalname');
	
	if(!empty($input_name))
	{
		$form = elgg_view('text_import/forms/import', array('input_name' => $input_name));
		
		$form_body = elgg_view('page_elements/contentwrapper', array('body' => $form));
		
		$title = elgg_view_title($title_text);
		
		echo $form_body;
	}