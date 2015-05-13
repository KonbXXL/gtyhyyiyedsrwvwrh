<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$a=$_POST['form'];
mysql_query("UPDATE card SET
Nomer='$a[Nomer]',Servises='$a[Servises]',Pn='$a[Pn]',Vt='$a[Vt]',Sr='$a[Sr]',Ch='$a[Ch]',Pt='$a[Pt]',Su='$a[Su]',Vs='$a[Vs]',DataEnd='$a[DataEnd]',
Sotrudnik='$a[Sotrudnik]',Vrach='$a[Vrach]',VrachData='$a[VrachData]' WHERE CardID='$a[CardID]'");
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
    <a href="index.php" target="_blank">АИС СпортивныйКлуб</a>
        <span class="right">
        <a href="index.php">
            <strong>Вернуться к списку</strong>
        </a>
        </span>
    <div class="clr"></div>
</div>
<div id="login">
    <h1>Редактирование успешно завершено</h1>
</div>
</body>
</html>