<html>
	<head>
		<title>Send an Email</title>
	</head>
	<body>
		<h1>Send an Email</h1>

<?php if ($_GET['sent'] == "true") : ?>
		<p>Thanks... your email has been sent.</p>
<?php endif; ?>

		<p>Please enter your email info</p>

		<form action="send_email.php">
			<label>Your Name</label>
			<input required name="from_name" type="text" />
			<br />
			<label>Your Email</label>
			<input required name="from_email" type="email" />
			<br />
			<label>To Email</label>
			<input required name="to_email" type="email" />
			<br />
			<label>Subject</label>
			<input required name="subject" type="text" />
			<br />
			<label>Body</label>
			<textarea required name="body"></textarea>
			<br />
			<input type="submit" value="Send it!" />
		</form>


	</body>
</html>









