<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$a=$_POST['form'];
mysql_query("INSERT INTO card (Nomer,Client_ID,Servises,Data,DataEnd,Sotrudnik,Vrach,VrachData,Pn,Vt,Sr,Ch,Pt,Su,Vs)
VALUES ('$a[Nomer]','$a[Client_ID]','$a[Servises]','$a[Data]','$a[DataEnd]','$a[Sotrudnik]','$a[Vrach]','$a[VrachData]','$a[Pn]','$a[Vt]','$a[Sr]','$a[Ch]','$a[Pt]','$a[Su]','$a[Vs]')");
mysql_query("INSERT INTO vizit (Nomer,Odin,Dva,Tri,Che,Pyt,Shest,Sem,Vosem,Devatb,Desatb,Odinazatb,Dvenadzatb,Trinadzat,Chetirnadzatb,Pytnad,Shestnad,Semnad,Vosemnad,Devetnad,Dvazat,Dvazato,Dvazatt,Dvazattt,Dvazatch)
VALUES ('$a[Nomer]','$a[A]','$a[B]','$a[C]','$a[D]','$a[F]','$a[I]','$a[G]','$a[H]','$a[J]','$a[K]','$a[L]','$a[Q]','$a[W]','$a[E]','$a[R]','$a[T]','$a[Y]','$a[U]','$a[O]','$a[P]','$a[Z]','$a[V]','$a[X]','$a[N]')");
header("Refresh:2;url=http://localhost/SportClub2.0/?ctrl=card")
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>АИС СПОРТИВНЫЙ КЛУБ</title>
    <link rel="stylesheet" href="../css/style_2.css" media="screen" type="text/css" />
</head>
<body>
<div class="vladmaxi-top">
    <a href="http://localhost/SportClub2.0/" target="_blank">АИС СпортивныйКлуб</a>
        <span class="right">
        <a href="index.php">
            <strong>Вернуться к списку</strong>
        </a>
        </span>
    <div class="clr"></div>
</div>
<div id="login">
    <h1>Абонемент успешно создан</h1>
</div>
</body>
</html>