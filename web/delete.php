<?php

	require_once('db.php');
	$db = new Db($db_host, $db_user, $db_pass, $db_name);

	$response = $db->delete_by_id($_GET['id']);
	header('location: index.php');
?>