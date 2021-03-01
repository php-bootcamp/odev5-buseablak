<?php
require_once 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kategori Ekle</title>
</head>
<body>
	<?php
  if (isset($_GET['durum'])) {
   if ($_GET['durum']=="1") {
     echo "başarılı";
   }
   else
    echo "başarısız";
}


?>
<form method="post" action="transaction.php">
  Kategori Adı:<input type="text" name="category_name">
  <button type="submit" name="c_insert">Ekle</button>
</form>
<a href="index.php"><button>Geri</button></a>
<br><hr>
<table border="2" style="width: 60%">

 <tr>
  <th>KATEGORİ ADI</th>
  <th>İŞLEMLER</th>

</tr>

<?php
$sorgu = $db->prepare("SELECT COUNT(*) FROM category");
$sorgu->execute();
$say = $sorgu->fetchColumn();

if ($say=="0") {
 echo "Kayıtlı Kategori Bulunmamaktadır!";
}
$category=$db->prepare("SELECT * from category");
$category->execute();

while ($categorylist=$category->fetch(PDO::FETCH_ASSOC)) { ?>


  <tr>
   <td><?php echo $categorylist['category_name'];  ?></td>
   <td><a href="transaction.php?category_id=<?php echo $categorylist['category_id'];?>&categorydelete=ok"><button type="submit" name="c_delete">Sil</button></a></td>

 </tr>


<?php } ?>



</table>
</body>
</html>