<html>
	<head>
		<title>SQL Create Example with Sanitization</title>
	</head>
	<body>
		<h1>SQL Create Example with Sanitization</h1>
		<p>This page shows how to do a MySQL Create in PHP.</p>
		<p><strong>This example sanitizes user input so it's harder to hack your site.</strong></p>

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










