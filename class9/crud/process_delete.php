<?php

include("db_connect.php");
$mysqli = connectToDb();

//get the parameter from the query string of the URL
$id = addslashes($_GET['id']);

//echo $mysqli->host_info . "\n";

//do a query on the database
$mysqli->real_query("DELETE FROM abloomberg_students2 WHERE id={$id} ");

//see how many rows were deleted
//echo $mysqli->affected_rows;

header("Location: delete.php");

?>