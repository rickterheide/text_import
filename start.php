<?php

	global $CONFIG;
	
	define("TEXT_IMPORT_BASEURL", 	$CONFIG->wwwroot."pg/text_import");

	function text_import_init()
	{
		global $CONFIG;
		
		include_once(dirname(__FILE__)."/lib/functions.php");
		include_once(dirname(__FILE__)."/lib/hooks.php");
		
		elgg_extend_view("css", 				"text_import/css");
		elgg_extend_view("css", 				"fancybox/css");
		elgg_extend_view("js/initialise_elgg", 	"text_import/js");
		elgg_extend_view("metatags", 			"text_import/metatags");
		elgg_extend_view('input/longtext',		'import/text', 1);
		
		register_page_handler("text_import", 	"text_import_page_handler");
	}
	
	function text_import_page_handler($page)
	{		
		global $CONFIG;
		
		if($page[0] == 'proc')
		{
			if(file_exists(dirname(__FILE__)."/procedures/".$page[1]."/".$page[2].".php"))
			{
				include(dirname(__FILE__)."/procedures/".$page[1]."/".$page[2].".php");
			}
		}
		else
		{
			if(file_exists(dirname(__FILE__)."/pages/".$page[0]."/".$page[1].".php"))
			{
				include(dirname(__FILE__)."/pages/".$page[0]."/".$page[1].".php");
			}
		}
	}

	register_elgg_event_handler("init", "system", "text_import_init");
	
	register_action("text_import/import/text", false, dirname(__FILE__)."/actions/import/text.php");