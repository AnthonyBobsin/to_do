<?php

	//Heroku
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$db_host = url["us-cdbr-iron-east-01.cleardb.net"];
	$db_user = url["b347ec276fb80c"];
	$db_pass = url["ac01ccff"];
	$db_name = substr($url["heroku_1ef8938ff6dee0a"], 1);;

	//Localhost
	/*$db_host = $_SERVER['HTTP_HOST'];
	$db_user = 'anthony';
	$db_pass = 'submarine';
	$db_name = 'db';*/

?>