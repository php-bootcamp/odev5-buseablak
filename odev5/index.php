<?php require_once 'database.php'; ?>

<!DOCTYPE html>
<html>
<head>
	
    <meta charset="utf-8">	
    <title></title>
</head>
<body>
    <div>
        <a href="insert.php">Ürün Ekle<br></a>
        <a href="categoryinsert.php">Kategori Ekle</a>
        <a href="import.php">İçe Aktar</a>
        <form method="post" action="transfer.php"><button name="export" type="submit">Dışa Aktar</button>
        </form>

    </div>	
    <br><hr>

    <h2>Ürünler</h2>
    <br>
    
    <table style="width: 60%" border="2">
    	<tr>
    		<th>ID</th>
            <th>ÜRÜN ADI</th>
            <th>FİYAT</th>
            <th>AÇIKLAMA</th>
            <th>İÇERİK</th>
            <th>KATEGORİ</th>
            <th>İŞLEMLER</th>
            <th>İŞLEMLER</th>

        </tr>

        <?php
        $sorgu = $db->prepare("SELECT COUNT(*) FROM product");
        $sorgu->execute();
        $say = $sorgu->fetchColumn();

        if ($say=="0") {
           echo "Kayıtlı Ürün Bulunmamaktadır!";
       }
       $product=$db->prepare("SELECT * from product");
       $product->execute();
       
       while ($productlist=$product->fetch(PDO::FETCH_ASSOC)) { ?>
           
           

        <tr>
        	<td><?php echo $productlist['product_id']; ?></td>
        	<td><?php echo $productlist['product_name']; ?></td>
        	<td><?php echo $productlist['product_price']; ?></td>
        	<td><?php echo $productlist['product_description']; ?></td>
        	<td><?php echo $productlist['product_content']; ?></td>
        	<td><?php echo $productlist['product_category']; ?></td>
            <td><a href="transaction.php?product_id=<?php echo $productlist['product_id'];?>&productdelete=ok"><button type="submit" name="delete">SİL</button></a></td>
            <td><a href="edit.php?product_id=<?php echo $productlist['product_id'];?>"><button type="submit" name="edit">DÜZENLE</button></a></td>
            
        </tr>
    <?php } ?>

</table>
</body>
</html>

