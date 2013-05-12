<?php

//include the file that does the hard part of image uploading
include("Uploader.class.php");

//get the form fields from the POST data
$animalName = addslashes($_POST['animal_name']);

//create an Uploader object
$uploader = new Uploader("animal_image", "images", "10M");

//try to do the upload
if ($uploader->upload()) {
	//if success, store the image path in a variable
	$path = $uploader->getPermanentPath();
}

else {
	//if failure, store the error in a variable
	$error = $uploader->getError();
}
?>
<html>
	<head>
		<title>Image Upload Example</title>
	</head>
	<body>
		<h1>Image Upload Example</h1>

<?php if (!empty($path)) : ?>
		<p>Thanks for uploading an image!!!</p>
		<img src="<?php echo $path; ?>" />
<?php endif; ?>

<?php if (!empty($error)) : ?>
		<p>Oops, your image didn't upload correctly<br />
			<a href="./">Try again!</a>
<?php endif; ?>
	</body>
</html>


