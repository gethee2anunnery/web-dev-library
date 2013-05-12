<?php

include("db_connect.php");
$mysqli = connectToDb();

//echo $mysqli->host_info . "\n";

//get the data from the POST request
$firstName = addslashes($_POST['first_name']);
$lastName = addslashes($_POST['last_name']);

//do a query on the database
$mysqli->real_query("INSERT INTO abloomberg_students2 (first_name, last_name) 
						VALUES ('{$firstName}', '{$lastName}') ");

echo "INSERT INTO abloomberg_students2 (first_name, last_name) 
						VALUES ('{$firstName}', '{$lastName}') ";

//see what the id was of the newly created row
//echo $mysqli->insert_id;

header("Location: read.php");

?>








