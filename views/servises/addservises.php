<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$r=mysql_query ("select * from room");
$r2=mysql_query("select * from gp")
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>АИС СПОРТИВНЫЙ КЛУБ</title>
    <link rel="stylesheet" href="../css/style_2.css" media="screen" type="text/css" />
</head>

<body>
<div class="vladmaxi-top">
    <a href="http://localhost/SportClub2.0/">АИС СпортивныйКлуб</a>
        <span class="right">
        <a href="http://localhost/SportClub2.0/">
            <strong>Вернуться к списку</strong>
        </a>
        </span>
    <div class="clr"></div>
</div>
<div id="login">
    <div class="flip">
        <div class="form-signup">
            <h1>Новая услуга</h1>
            <fieldset>
                <p class="login-msg"></p>
                <form action="add_servises.php" method="post">
                    <input name="form[Nazvanies]" type="text" placeholder="Введите название услуги" required />
                    <select name="form[Paty]" >
                        <option value="">Групповые занятия</option>
                        <?php while ($row=mysql_fetch_array($r2)){
                            echo
                                '<option value="'.$row["ID"].'">'.$row["Volume"].'</option>';
                        };?></select>
                    <select name="form[Mesto]" >
                        <option value="">Место провидения</option>
                        <?php while ($row=mysql_fetch_array($r)){
                            echo
                                '<option value="'.$row["RoomID"].'">'.$row["Nazvanie"].'</option>';
                        };?></select>
                    <input name="form[Price1]" type="text" placeholder="Цена за 1 посещение услуги"  />
                    <input name="form[Price_month]"type="text" placeholder="Цена за месяц"  />
                    <input name="form[Opisanie]" type="text" placeholder="Описание"  />
                    <input type="submit" value="Добавить" />
                </form>
            </fieldset>
        </div>
    </div>
</div>
</body>
</html>
