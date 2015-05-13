<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$a=$_POST['form'];
mysql_query("INSERT INTO dolgnostb (Name) VALUES ('$a[Name]')");
header("refresh:0;url=http://localhost/SportClub2.0/index.php?ctrl=card")
?>
