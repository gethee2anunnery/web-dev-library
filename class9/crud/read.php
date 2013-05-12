<?php

include("db_connect.php");
$mysqli = connectToDb();

//echo $mysqli->host_info . "\n";

//do a query on the database
$mysqli->real_query("SELECT * FROM abloomberg_students2");
$res = $mysqli->use_result();

?>
<html>
	<head>
		<title>SQL Read Example</title>
	</head>
	<body>
		<h1>SQL Read Example</h1>
		<a href="create.php">Click here to add a new student</a>
		<p>This page shows how to do a MySQL Read in PHP.</p>

		<ul>

<?php while ($row = $res->fetch_assoc() ) : ?>

			<li>
				<?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?><br />
			</li>

<?php endwhile; ?>

		</ul>

	</body>
</html>