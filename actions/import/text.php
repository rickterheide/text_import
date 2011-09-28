<?php

	if(isset($_FILES['text_import_file']))
	{
		$tmp_name = $_FILES['text_import_file']['tmp_name'];
		$name = $_FILES['text_import_file']['name'];
		
		$type = $_FILES['text_import_file']['type'];
		
		$text = '';

		if($type == 'text/plain')
		{
			// plain text
			$text = file_get_contents($tmp_name);
		}
		elseif($type == 'application/pdf')
		{
			// pdf
			$text = pdf2text($tmp_name);
		}
		elseif($type == 'application/octet-stream')
		{
			// docx
			$extension_explode = explode('.', $name);
			$extension = end($extension_explode);
			
			if($extension == 'docx')
			{
				$text = docx2text($tmp_name);
			}		
		}
		elseif($type == 'application/vnd.oasis.opendocument.text')
		{
			// openoffice doc
			$text = odt2text($tmp_name);
		}
	}
	
	header('Content-type: text/html; charset=UTF-8');
	echo strip_tags($text);

	exit;