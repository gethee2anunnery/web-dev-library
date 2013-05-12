<?php

//open file
$myFile = "data.txt";
$handle = fopen($myFile, 'r');

//create arrays to hold both the "regular" numeric indexed array, and the new associatively-indexed array
$numericArray = array();
$associativeArray = array();

//loop through each line of the file
while (!feof($handle)) {
	$buffer = fgets($handle, 4096);	
	//break this line up into an array, using the comma as a delimiter
	$thisProduct = explode(",", $buffer);
	//store this array for later
	$numericArray[] = $thisProduct;
}

//getting the headings from the first row and store for later
$headingsArray = $numericArray[0];

//loop through every row
for ($i=1; $i<sizeof($numericArray); $i++) {
	//make a new blank element in the associative array for each element in the "regular" array
	$associativeArray[$i] = array();
	//now loop through each sub-element within this element of the regular numeric array
	for ($j=0; $j<sizeof($numericArray[$i]); $j++) {
		//for each sub-element, make a new associative element in the associative array
		$associativeArray[$i][$headingsArray[$j]] = $numericArray[$i][$j];
	}	
}

//debugging
print_r($associativeArray);


?>