<?php

include("db_connect.php");
$mysqli = connectToDb();

//do a query on the database
$mysqli->real_query("SELECT * FROM abloomberg_students2");
$res = $mysqli->use_result();

?>
<html>
	<head>
		<title>SQL Delete Example</title>
	</head>
	<body>
		<h1>SQL Delete Example</h1>
		<p>
			This page allows you to delete students from the database.
		</p>
		<em>This page is <strong>for site administrators only</strong>.</em>
		<a href="read.php">Click here to see the public-facing list of students</a>

		<ul>

<?php while ($row = $res->fetch_assoc() ) : ?>

			<li>
				<?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?>
				<a href="update.php?id=<?php echo $row['id']; ?>">edit</a>
				<a href="process_delete.php?id=<?php echo $row['id']; ?>">delete</a>
				<br />
			</li>

<?php endwhile; ?>

		</ul>

	</body>
</html>