<?php

$firstName = $_GET['first_name'];

//create the cookie
setcookie("first_name", $firstName);

//redirect back to the home page
header("Location: index.php");

?>