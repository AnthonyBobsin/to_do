<?php 

	require_once('db.php');
	$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

	$response = $db->update_by_id($_POST['id'], $_POST['description']);

?>
