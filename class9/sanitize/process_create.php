<?php
//include the file that does the sanitizing of user data
include("Sanitize.class.php");

include("db_connect.php");
$mysqli = connectToDb();

//echo $mysqli->host_info . "\n";

//get the data from the POST request and clean it
$flags = Sanitize::HTML + Sanitize::SQL; //this example removes any HTML or SQL commands from the string
$firstName = Sanitize::sanitize($_POST['first_name'], $flags); //call the static method "sanitize of the Sanitize class
$lastName = Sanitize::sanitize($_POST['last_name'], $flags); //call the static method "sanitize of the Sanitize class



//do a query on the database
$mysqli->real_query("INSERT INTO abloomberg_students2 (first_name, last_name) 
						VALUES ('{$firstName}', '{$lastName}') ");

echo "INSERT INTO abloomberg_students2 (first_name, last_name) 
						VALUES ('{$firstName}', '{$lastName}') ";

echo $mysqli->insert_id;

?>








