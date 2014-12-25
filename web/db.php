<?php

	require_once 'config.php' ;

	class Db {

		public $mysql;

		function __construct($host = NULL, $user = NULL, $pass = NULL, $name = NULL) {
			$this->mysql = new mysqli($host, $user, $pass, $name)
					or die("Unable to create MySQLi object");
		}
		
		function delete_by_id($id) {
			$query = "DELETE FROM todolist WHERE id = $id";
			$result = $this->mysql->query($query)
				or die("Failed to delete from id");
		}

		function update_by_id($id, $description) {
			$query = "UPDATE todolist SET description = ? WHERE id = ? LIMIT 1";

			if ($stmt = $this->mysql->prepare($query)) {
				$stmt->bind_param('si', $description, $id);
				$stmt->execute();
			}
		}
	}

?>