<html>
	<head>
		<title>Fake URL Example</title>
	</head>
	<body>
		<h1>This URL is not real</h1>
		<p>The URL that you see in the browser address bar is not really the filename of this page.</p>
		
		<p>The fake URL is <?php echo $_SERVER['SCRIPT_URI']; ?></p>
		<p>The real filename is <?php echo $_SERVER['PHP_SELF']; ?></p>

		<pre>
<?php print_r($_SERVER); ?>			
		</pre>
	</body>
</html>