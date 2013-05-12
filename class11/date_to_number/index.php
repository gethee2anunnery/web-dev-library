<?php

include("db_connect.php");
$mysqli = connectToDb();

//do a query on the database
$res = $mysqli->query("SELECT * FROM gpilpani_cars WHERE 1");
//get the number of rows from the result
$numUsers = $res->num_rows;

echo "<br />There are " . $numUsers . " users.";

$currentDay = date("N"); //get the day of the week as an integer from 1-7
echo "<br />The current day is " . $currentDay;

//fit that number into the range of numbers representing users in teh database
$userNumber = intval($currentDay * ($numUsers / 7));
echo "<br />The user number of the day is : " . $userNumber;

//convert that user number to a user name
$res->data_seek($userNumber - 1);
$row = $res->fetch_array();
echo "<br />The user of the day is " . $row['car_model'];

?>