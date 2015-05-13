<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$r=mysql_query ("select * from pol");
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
            <h1>Регистрация</h1>
            <fieldset>
                <p class="login-msg"></p>
                <form action="registracia.php" method="post">
                    <input name="form[LastName]" type="text" placeholder="Введите Фамилию клиента." required />
                    <input name="form[Name]" type="text" placeholder="Введите Имя клиента" required />
                    <input name="form[FastName]" type="text" placeholder="Введите Отчество клиента" required />
                    <input name="form[DataHappy]" type="text" placeholder="Дата рождения в формате ГГ-ММ-ДД" required />
                    <?php echo " <input name='form[Data]' type='data' value='".date("Y-m-d")."'/>";?>
                    <input name="form[Contact]" type="text" placeholder="Контактный телефон" required />
                    <select name="form[Pol]" >
                        <option value="">Выберите пол</option>
                        <?php while ($row=mysql_fetch_array($r)){
                            echo
                                '<option value="'.$row["ID"].'">'.$row["Nazvanie"].'</option>';
                        };?></select>
                    <input type="submit" value="Зарегистрировать" />
                </form>
            </fieldset>
        </div>
    </div>
</div>
</body>
</html>
