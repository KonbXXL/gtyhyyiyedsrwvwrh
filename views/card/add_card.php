<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$a=$_POST['form'];
mysql_query("INSERT INTO card (Nomer,Client_ID,Servises,Data,DataEnd,Sotrudnik,Vrach,VrachData,Pn,Vt,Sr,Ch,Pt,Su,Vs)
VALUES ('$a[Nomer]','$a[Client_ID]','$a[Servises]','$a[Data]','$a[DataEnd]','$a[Sotrudnik]','$a[Vrach]','$a[VrachData]','$a[Pn]','$a[Vt]','$a[Sr]','$a[Ch]','$a[Pt]','$a[Su]','$a[Vs]')");
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