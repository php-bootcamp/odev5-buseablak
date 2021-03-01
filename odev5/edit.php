<?php
require_once 'database.php';


?>
<!DOCTYPE html>
<html>
<head>
	<title>Düzenle</title>
</head>
<body>
  
 
  <?php
  if (isset($_GET['durum'])) {
   if ($_GET['durum']=="1") {
     header("Location:index.php");
   }
   elseif ($_GET['durum']=="0") {
     echo "başarısız";
   }
 }

 $product=$db->prepare("SELECT * from product where product_id=:id");
 $product->execute(array(
  "id"=> $_GET['product_id']
));
 $productlist=$product->fetch(PDO::FETCH_ASSOC);
 
 ?>
 
 <form method="post" action="transaction.php">
  Name:<input type="text" name="product_name" value="<?php echo $productlist['product_name']?>"><hr>
  Price:<input type="text" name="product_price" value="<?php echo $productlist['product_price']?>"><hr>
  Description:<input type="text" name="product_description" value="<?php echo $productlist['product_description']?>"><hr>
  Content: <input type="text" name="product_content" value="<?php echo $productlist['product_content']?>"><hr>
  <input type="hidden" value="<?php echo $productlist['product_id'] ?>" name="product_id">
  Category:<select required="" name="product_category" >
   <?php 

   while($productcek=$productsor->fetch(PDO::FETCH_ASSOC)) {
     ?>
     <option  value="<?php echo $productcek['category_name']; ?>"><?php echo $productcek['category_name']; ?></option>
   <?php } ?>
 </select><hr>
 
 <button type="submit" name="edit">EDİT</button>
</form>

</body>
</html>