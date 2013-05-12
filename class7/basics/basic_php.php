<html>
	<head>
		<title>Hello WOrld</title>
	</head>
	<body>
<?php
include("_header.php");
?>

<h2>The PHP echo command</h2>
<?php

$foo = "<h1>This is a PHP string</h1>";

echo $foo;
?>

<h2>The PHP for loop </h2>
<?php
//loop 10 times
for ($i=0; $i<10; $i=$i+1) {
	echo "<p>{$i}</p>\n";
}
?>

<h2>The PHP while loop</h2>
<?php
//loop 10 times again
$i = 0;
while ($i<10) {
	echo $i;
	$i++;
}

?>

<h2>PHP access basic array element</h2>
<?php
$arrList = array(44245245.586, 'b', 'c');
echo $arrList[0];
?>

<h2>loop through contents of array</h2>
<?php
// do it the easy way
foreach ($arrList as $item) {
	echo $item;
}
echo "<br />";

//do it the hard way
for ($i=0; $i < sizeof($arrList); $i++) {
	echo $arrList[$i];
}
echo "<br />";

//do it the even harder way
$i=0;
while ( $i < sizeof($arrList) ) {
	echo $arrList[$i];
	$i++;
}
echo "<br />";

?>

<br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br />

<?php include("_footer.php"); ?>

	</body>

</html>







