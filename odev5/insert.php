
<?php
include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Insert</title>
	<h3>ÜRÜN EKLE</h3>
</head>
<body>
	

  <div>
    <?php
    if (isset($_GET['durum']) && $_GET['durum']=="1") {

     echo "Kayıt Başarılı";
   } 
   elseif (isset($_GET['durum']) && $_GET['durum']=="0") {
     echo "Kayıt Başarısız";
   }

   
   ?>
   <form method="post" action="transaction.php">
    Name:<input type="text" name="product_name"><hr>
    Price:<input type="text" name="product_price"><hr>
    Description:<input type="text" name="product_description"><hr>
    Content: <input type="text" name="product_content"><hr>
    Category: <select required="" name="product_category" >
     <?php 

     while($productcek=$productsor->fetch(PDO::FETCH_ASSOC)) {
       ?>
       <option  value="<?php echo $productcek['category_name']; ?>"><?php echo $productcek['category_name']; ?></option>
     <?php } ?>
   </select><hr>
   <button type="submit" name="insert">Ekle</button>

   
 </form>
 <a href="index.php"><button type="submit">Geri</button></a>
</div>
</body>
</html>