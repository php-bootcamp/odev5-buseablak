<?php

try {
	$db= new PDO("mysql:host=localhost;dbname=odev;charset=utf8",'root','');
	


}catch(PDOException $e){
	echo $e->getMessage();
}

// PRODUCT SELECT

$productsor=$db->prepare("SELECT * from category");
$productsor->execute();

?>
