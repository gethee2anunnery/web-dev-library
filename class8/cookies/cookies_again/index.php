<?php

$firstName = $_COOKIE['first_name'];

?>
<html>
	<head>
		<title>Read A Cookie from the User's Computer</title>
	</head>
	<body>
		<h1>Read A Cookie from the User's Computer</h1>

<?php if (!empty($firstName)) : ?>
		<p>Welcome, <?php echo $firstName; ?>
<?php else : ?>
		<label>Please enter your name</label>
		<form action="write_cookie.php">
			<input type="text" name="first_name" />
			<input type="submit" value="Go!" />
		</form>
<?php endif; ?>

	</body>
</html>









