<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$a=$_POST['form'];
mysql_query("INSERT INTO Client (LastName,Name,FastName,DataHappy,DataReg,Contact,Pol)
VALUES ('$a[LastName]','$a[Name]','$a[FastName]','$a[DataHappy]','$a[DataReg]','$a[Contact]','$a[Pol]')");
header("Refresh:2;url=http://localhost/SportClub2.0/index.php")
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
    <h1>Регистрация прошла успешно</h1>
</div>
</body>
</html>