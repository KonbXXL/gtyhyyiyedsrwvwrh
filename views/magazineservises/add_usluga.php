<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$a=$_POST['form'];
mysql_query("INSERT INTO magazinesales (Card,DataP,Servises,Sotrudnik,Resultat)
VALUES ('$a[CardID]','$a[DataP]','$a[Servises]','$a[Sotrudnik]','$a[Result]')");
mysql_error();
header("Refresh:1;URL=http://localhost/sportclub2.0/views/card/cardid.php?id=$a[CardID]");
?>