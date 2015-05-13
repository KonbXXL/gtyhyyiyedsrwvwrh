<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$a=$_POST['form'];
mysql_query("UPDATE Client SET
LastNAme='$a[LastName]',Name='$a[Name]',FastName='$a[FastName]',DataHappy='$a[DataHappy]',Contact='$a[Contact]',Pol='$a[Pol]' WHERE ClientID='$a[ClientID]'");
header("Refresh:2;url=http://localhost/SportClub2.0/")
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