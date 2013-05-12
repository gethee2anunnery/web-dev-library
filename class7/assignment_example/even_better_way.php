<?php
	$data = array();
	$data[0] = array(
		'title' => 'Red Velvet Cupcake',
		'description' => 'This is a tasty artificially dyed cupcake',
		'price' => '$9.99',
		'image_url' => 'images/redvelvet.png'
	);
	$data[1] = array(
		'title' => 'Devil\'s Cupcake',
		'description' => 'This is a dark chocolate cupcake',
		'price' => '$19.99',
		'image_url' => 'images/devilscupcake.png'
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
			<img src="<?php echo $item['image_url']; ?>" />
			<div>
				<h2><?php echo $item['title']; ?></h2>
				<p><?php echo $item['description']; ?></p>
				<p><?php echo $item['price']; ?></p>
			</div>
		</div>

<?php endforeach; ?>

	</body>
</html>



