<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$a=$_POST['form'];
mysql_query("INSERT INTO room (Nazvanie) VALUES ('$a[Nazvanie]')");
header("refresh:0;url=http://localhost/SportClub2.0/index.php?ctrl=servises")
?>
