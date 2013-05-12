<?php

function connectToDb() {

	//connect to the database
	$mysqli = new mysqli(	"mysql.onepotcooking.com", 	//db server
							"scps", 					//username
							"h?H#kjGj", 				//password
							"classdb");					//database

	//check for any errors
	if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	
	return $mysqli;	
}

?>