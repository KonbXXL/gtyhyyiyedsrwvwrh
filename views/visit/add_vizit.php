<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$a=$_POST['form'];
mysql_query("INSERT INTO magazinevisit (DataV,Servises,Card,Sotrudnik)
VALUES ('$a[DataV]','$a[Servises]','$a[CardID]','$a[Sotrudnik]')");
mysql_query("UPDATE vizit SET
Nomer='$a[Nomer]',Odin='$a[A]',Dva='$a[B]',Tri='$a[C]',Che='$a[D]',Pyt='$a[F]',Shest='$a[I]',Sem='$a[G]',Vosem='$a[H]',Devatb='$a[J]',Desatb='$a[K]',Odinazatb='$a[L]',Dvenadzatb='$a[Q]',
Trinadzat='$a[W]',Chetirnadzatb='$a[E]',Pytnad='$a[R]',Shestnad='$a[T]',Semnad='$a[Y]',Vosemnad='$a[U]',Devetnad='$a[O]',Dvazat='$a[P]',Dvazato='$a[Z]',Dvazatt='$a[V]',Dvazattt='$a[X]',Dvazatch='$a[N]' WHERE Nomer='$a[Nomer]'");
header("Refresh:1;URL=http://localhost/sportclub2.0/views/card/cardid.php?id=$a[CardID]")
?>