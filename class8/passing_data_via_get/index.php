<?php

$firstName = strtolower($_GET['first_name']);

?>			
<html>
	<head>
		<title>PHP Example</title>
	</head>
	<body>
			<h1>PHP Example</h1>
			<p>Welcome, <?php echo $firstName; ?></p>

<?php if ($firstName == "bob") : ?>
			<p>Enjoy the site, Bob!!!</p>
<?php else : ?>
			<p>Oh, you again!</p>
<?php endif; ?>

			<pre>

<?php print_r($_GET); ?>

			</pre>
	</body>
</html>