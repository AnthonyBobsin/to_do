<?php

	require_once 'db.php';
	$db = new Db($db_host, $db_user, $db_pass, $db_name);

	if (isset($_POST['addEntry'])) {
		$query = "INSERT INTO todolist VALUES(NULL, ?, ?)";

		if ($stmt = $db->mysql->prepare($query)) {
			$stmt->bind_param('ss', $_POST['title'], $_POST['description']);
			$stmt->execute();
			header('location: index.php');
		}
		else {
			die($db->mysql->error);
		}
	}
?>