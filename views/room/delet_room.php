<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$id=$_GET['id'];
mysql_query("DELETE FROM room WHERE RoomID='$id'");
header("Refresh:0.5;url=http://localhost/SportClub2.0/?ctrl=card")
?>