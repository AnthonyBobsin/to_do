<?php

	//Heroku
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$db_host = url["$_SERVER['HTTP_HOST']"];
	$db_user = url["anthony"];
	$db_pass = url["submarine"];
	$db_name = substr($url["db"], 1);;

	//Localhost
	/*$db_host = $_SERVER['HTTP_HOST'];
	$db_user = 'anthony';
	$db_pass = 'submarine';
	$db_name = 'db';*/

?>