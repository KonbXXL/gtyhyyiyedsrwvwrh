<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$r=mysql_query ("select * from dolgnostb");
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
            <h1>Новый сотрудник</h1>
            <fieldset>
                <p class="login-msg"></p>
                <form action="add_sotrudnik.php" method="post">
                    <input name="form[LName]" type="text" placeholder="Введите Фамилию сотрудника" required />
                    <input name="form[Name]" type="text" placeholder="Введите Имя сотрудника" required />
                    <input name="form[FName]" type="text" placeholder="Введите Отчество сотрудника" required />
                    <input name="form[DHappy]" type="text" placeholder="Дата рождения в формате Год-Месец-День" required />
                    <select name="form[Doljnostb]" >
                        <option value="">Должность сотрудника</option>
                        <?php while ($row=mysql_fetch_array($r)){
                            echo
                                '<option value="'.$row["DolgID"].'">'.$row["Name"].'</option>';
                        };?></select>
                    <input type="submit" value="Добавить" />
                </form>
            </fieldset>
        </div>
    </div>
</div>
</body>
</html>