<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$a=$_POST['form'];
mysql_query("INSERT INTO compani (Name,DolgFace,Address,INN,Telefon,Email) VALUES ('$a[Name]','$a[DolgFace]','$a[Address]','$a[INN]','$a[Telefon]','$a[Email]')");
header("refresh:0;url=http://localhost/SportClub2.0/");