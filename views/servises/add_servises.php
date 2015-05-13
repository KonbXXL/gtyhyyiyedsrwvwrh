<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$a=$_POST['form'];
mysql_query("INSERT INTO servises (Nazvanies,Paty,Mesto,Price1,Price_month,Opisanie)
VALUES ('$a[Nazvanies]','$a[Paty]','$a[Mesto]','$a[Price1]','$a[Price_month]','$a[Opisanie]')");
header("Refresh:2;url=http://localhost/SportClub2.0/?ctrl=servises")
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
    <h1>Услуга успешно добавлена</h1>
</div>
</body>
</html>