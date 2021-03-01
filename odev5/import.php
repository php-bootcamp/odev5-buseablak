<?php include 'database.php';  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>İçe Aktar</title>
</head>
<body>
	<form method="post"  enctype="multipart/form-data">
		<input type="file" name="file">
		<button type="submit" name="import">İçe Aktar</button>


	</form>

	<?php
	if (isset($_FILES['file'])) {
		$tmpName = $_FILES['file']['tmp_name'];
		$jsonString=file_get_contents($tmpName);
		$import=json_decode($jsonString);
		var_dump($import);
		foreach ($import as $product) {

			$save=$db->prepare("INSERT into product set

				product_name=:product_name,
				product_price=:product_price,
				product_description=:product_description,
				product_content=:product_content,
				product_category=:product_category");
			$insert=$save->execute(array(
				'product_name' => $product['product_name'],
				'product_price' => $product['product_price'],
				'product_description' => $product['product_description'],
				'product_content' => $product['product_content'],
				'product_category' => $product['product_category']
			));

		}
	}


	?>
</body>
</html>
