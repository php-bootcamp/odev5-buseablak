<?php 
include 'database.php';

//Product Export
if (isset($_POST['export'])) {
	$product=$db->query("SELECT *FROM product",PDO::FETCH_ASSOC);

while($export=$product->fetchAll(PDO::FETCH_ASSOC)){

    file_put_contents("product.json",json_encode($export));
    echo json_encode($export);
 }

 

header("Content-Type: application/json;charset=utf-8");
header("Content-Disposition: attachment; filename=product.json");

}





 ?>
	