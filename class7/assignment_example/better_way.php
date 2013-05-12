<?php
	$data = array();
	$data[0] = array(
		'Red Velvet Cupcake',
		'This is a tasty artificially dyed cupcake',
		'$9.99',
		'images/redvelvet.png'
	);
	$data[1] = array(
		'Devil\'s Cupcake',
		'This is a dark chocolate cupcake',
		'$19.99',
		'images/devilscupcake.png'
	);
?>
<html>
	<head>
		<title>Example for Assignment</title>
		<style type="text/css">
.foo {
	padding: 10px;
	width: 225px;
	height: 350px;
	background-color: yellow;
	border: 1px solid red;
	margin: 10px;
}		
		</style>
	</head>
	<body>
		<h1>Example of array for assignment</h1>
		<p>The following is output by reading a PHP array</p>
<?php foreach ($data as $item) : ?>
		<div class="foo">
			<img src="<?php echo $item[3]; ?>" />
			<div>
				<h2><?php echo $item[0]; ?></h2>
				<p><?php echo $item[1]; ?></p>
				<p><?php echo $item[2]; ?></p>
			</div>
		</div>

<?php endforeach; ?>

		<div class="clear"></div>
	</body>
</html>



