<?php

	var_dump($_FILES);
	
	$input_name = get_input('input_name');
	
	$result = array();
	
	$result['field'] = $input_name;
	$result['content'] = 'JAHE';
	
	echo json_encode($result);
	
	exit;