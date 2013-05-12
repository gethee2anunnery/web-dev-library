<?php
//connect to the database
include("db_connect.php");
$mysqli = connectToDb();

//get the data that the browser sent to the server
$animalName = $_GET['animal_name'];
$orderPreference = $_GET['order_preference'];

//do a query on the database
if (!empty($animalName)) {
	$mysqli->real_query("INSERT INTO abloomberg_favorite_animals (animal_name) 
						VALUES ('{$animalName}') ");	
}

//do a query on the database
if ($orderPreference == "recency") {
	$orderPhrase = "ORDER BY created DESC";	
}
elseif ($orderPreference == "name") {
	$orderPhrase = "ORDER BY animal_name ASC";		
}

$mysqli->real_query("SELECT * FROM abloomberg_favorite_animals {$orderPhrase}");
$res = $mysqli->use_result();

?>


<ul>
<?php while ($row = $res->fetch_assoc() ) : ?>

			<li>
				<?php echo $row['animal_name']; ?><br />
			</li>

<?php endwhile; ?>
</ul>







