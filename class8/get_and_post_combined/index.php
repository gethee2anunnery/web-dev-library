<html>
	<head>
		<title>Send a GET or POST Request</title>
	</head>
	<body>
		<h1>Send a GET or POST Request</h1>

		<a href="process_form.php?first_name=Amos">Click to send a GET request</a>

		<p>Fill in the form to send a POST request</p>
		<form method="POST" action="process_form.php?first_name=Bob">
			<label>Enter your name</label>
			<input type="text" name="first_name" />
			<input type='submit' value="Go!" />
		</form>

	</body>
</html>









