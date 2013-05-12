<?php
//connect to the database
include("db_connect.php");
$mysqli = connectToDb();

//get the data that the browser sent to the server
$animalName = $_GET['animal_name'];

//do a query on the database
if (!empty($animalName)) {
	$mysqli->real_query("INSERT INTO abloomberg_favorite_animals (animal_name) 
						VALUES ('{$animalName}') ");	
}

//do a query on the database
$mysqli->real_query("SELECT * FROM abloomberg_favorite_animals ORDER BY created DESC");
$res = $mysqli->use_result();

?>

<ul>
<?php while ($row = $res->fetch_assoc() ) : ?>

			<li>
				<?php echo $row['animal_name']; ?><br />
			</li>

<?php endwhile; ?>
</ul>







