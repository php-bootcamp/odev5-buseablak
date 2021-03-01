<?php 
require_once 'database.php';

if(isset($_POST['insert']))
{

  $save=$db->prepare("INSERT into product set

    product_name=:product_name,
    product_price=:product_price,
    product_description=:product_description,
    product_content=:product_content,
    product_category=:product_category");

  $insert=$save->execute(array(
   'product_name' => $_POST['product_name'],
   'product_price' => $_POST['product_price'],
   'product_description' => $_POST['product_description'],
   'product_content' => $_POST['product_content'],
   'product_category' => $_POST['product_category']
   
 ));
  if ($insert) {
   header("location:insert.php?durum=1");
   exit;
 }
 else{
  header("location:insert.php?durum=0");
  exit;
}
}

if (isset($_POST['c_insert'])) {
  $save=$db->prepare("INSERT into category set
    category_name=:category_name");
  $insert=$save->execute(array(
    'category_name'=> $_POST['category_name']));
  if ($insert) {
   header("location:categoryinsert.php?durum=1");
   exit;
 }
 else{
  header("location:categoryinsert.php?durum=0");
  exit;
}
}
if(isset($_POST['edit'])){
  $product_id=$_POST['product_id'];
  $save=$db->prepare("UPDATE product set

    product_name=:product_name,
    product_price=:product_price,
    product_description=:product_description,
    product_content=:product_content,
    product_category=:product_category
    where product_id={$_POST['product_id']}" 

  );
  $insert=$save->execute(array(
   'product_name' => $_POST['product_name'],
   'product_price' => $_POST['product_price'],
   'product_description' => $_POST['product_description'],
   'product_content' => $_POST['product_content'],
   'product_category' => $_POST['product_category']
 ));
  if ($insert) {
   header("location:edit.php?durum=1&product_id=$product_id");
   exit;
 }
 else{
   header("location:edit.php?durum=0&product_id=$product_id");
   exit;
 }
}
if(isset($_GET['productdelete']) && $_GET['productdelete']=="ok"){
 $delete=$db->prepare("DELETE from product where product_id=:id");
 $kontrol=$delete->execute(array(
   'id'=>$_GET['product_id']

 ));
 if ($kontrol) {
   header("location:index.php?durum=1");
   exit;
 }
 else{
   header("location:index.php?durum=0");
   exit;
 }

}
if(isset($_GET['categorydelete']) && $_GET['categorydelete']=="ok"){
 $delete=$db->prepare("DELETE from category where category_id=:id");
 $kontrol=$delete->execute(array(
   'id'=>$_GET['category_id']

 ));
 if ($kontrol) {
   header("location:categoryinsert.php?durum=1");
   exit;
 }
 else{
   header("location:categoryinsert.php?durum=0");
   exit;
 }

}

?>