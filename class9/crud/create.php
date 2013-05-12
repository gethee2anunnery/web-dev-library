<html>
	<head>
		<title>SQL Create Example</title>
	</head>
	<body>
		<h1>SQL Create Example</h1>
		<a href="read.php">Click here to see a list of students</a>
		<p>This page shows how to do a MySQL Create in PHP.</p>

		<form action="process_create.php" method="POST">
			<label for="first_name">First Name</label>
			<input id="first_name" name='first_name' type="text" />
			<br />
			<label for="last_name">Last Name</label>
			<input id="last_name" name='last_name' type="text" />
			<br />
			<input type="submit" value="Add student" />
		</form>

	</body>
</html>
