<?php

include("db_connect.php");
$mysqli = connectToDb();

//echo $mysqli->host_info . "\n";

//get the data from the POST form
$firstName = addslashes($_POST['first_name']);
$lastName = addslashes($_POST['last_name']);
$id = addslashes($_POST['id']);

//do a query on the database
$mysqli->real_query("UPDATE abloomberg_students2 
						SET first_name='{$firstName}', last_name='{$lastName}' 
						WHERE id={$id} 
					");

header("Location: delete.php");

?>










