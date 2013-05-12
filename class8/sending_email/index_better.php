<html>
	<head>
		<title>Send an Email</title>
		<style type="text/css">
p.feedback {
	border: 1px solid gray;
}		
p#error_msg {
	display: none;
	background-color: red;
}
p#success_msg {
	background-color: green;
}
		</style>
		<script type="text/javascript">
function validateEmail() {
	var subjectElement = document.getElementById('subject');
	var bodyElement = document.getElementById('body');
	var subjLength = subjectElement.value.length;
	var bodyLength = bodyElement.value.length;

	if (bodyLength < 5 || subjLength < 5) {
		//show the error message
		var errMsgEl = document.getElementById('error_msg');
		errMsgEl.style.display = "block";

		//don't submit the form
		return false;
	}
	else {
		//submit the form
		return true;
	}
}
		</script>
	</head>
	<body>
		<h1>Send an Email</h1>

		<p class="feedback" id="error_msg">Please enter a valid subject and body</p>

<?php if ($_GET['sent'] == "true") : ?>
		<p class="feedback" id="success_msg">Thanks... your email has been sent.</p>
<?php endif; ?>

		<p>Please enter your email info</p>

		<form onsubmit="return validateEmail();" action="send_email.php">

			<input type="hidden" name="redirect_to" value="index_better.php" />

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
			<input required id="subject" name="subject" type="text" />
			<br />
			<label>Body</label>
			<textarea required id="body" name="body"></textarea>
			<br />
			<input type="submit" value="Send it!" />
		</form>


	</body>
</html>









