
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet" href="../public/stylesheets/bootstrap.min.css" />
    <link rel="stylesheet" href="../public/stylesheets/output.css" />
    <title>To Do List</title>

</head> 
  
<body> 

<div class="background-image"></div>

<div class="content">
<div class="row">

<div class="col-md-6 col-md-offset-3">
   
<div id="container"> 
      
<h1>To Do List</h1> 
  
<ul id="tabs"> 
    <li id="todo_tab" class="selected"><a href="#">To Do</a></li>        
</ul> 
  
	<div id="main"> 
	      
		<div id="todo"> 
		<?php
			
			require_once 'db.php';
			$db = new Db($db_host, $db_user, $db_pass, $db_name);

			$query = "SELECT * FROM todolist";
			$results = $db->mysql->query($query);

			if ($results->num_rows) {
				while ($row = $results->fetch_object()) {
					$title = $row->title;
					$description = $row->description;
					$id = $row->id;

		echo '<div class="item">';

		?>
		<h4>
			<?php echo $title; ?>
			<div class="options"> 
			    <a class="deleteEntryAnchor sideButts" href="delete.php?id=<?php echo $id; ?>">D</a> 
			    <a class="editEntry sideButts" href="#">E</a> 
			</div> 
		</h4> 
		<p id="desc"><?php echo $description; ?></p> 
		  
		<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" /> 
		  

		<?php

		echo $data;
		echo '</div>'; 
				}
			}
			else {
				echo "<p>The To-do list is empty. Add some now!</p>";
			}
		?>
		</div><!--end todo wrap--> 
	  
	<div id="addNewEntry"> 
	 	<h2>Add New Entry</h2>
	 	<form action="addItem.php" method="post">
	 		<p>
	 			<label for="title" class="labels">Title </label> <br/>
	 			<input type="text" name="title" id="title" class="input"/>
	 		</p>

	 		<p>
	 			<label for="title" class="labels">Description  </label> <br/>
	 			<textarea name="description" id="description" rows="10" cols="35"></textarea>
	 		</p>

	 		<p>
	 			<input type="submit" name="addEntry" id="addEntry" value="Add New Entry" />
	 		</p>
	 	</form>
	</div><!-- end add new entry --> 
	  
	</div><!-- end main--> 
</div><!--end container--> 
</div>
</div><!--end row -->
</div><!--end content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="../public/scripts/bootstrap.min.js"></script> 
<script src="../public/scripts/scripts.js"></script>

</body> 
</html>