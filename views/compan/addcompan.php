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
                <form action="add_compan.php" method="post">
                    <input name="form[Name]" type="text" placeholder="Полное фирменное наименование" required />
                    <input name="form[DolgFace]" type="text" placeholder="ФИО уполномоченного представителя" required />
                    <input name="form[Address]" type="text" placeholder="Юридический адрес" required />
                    <input name="form[INN]" type="text" placeholder="ИНН" required />
                    <input name="form[Telefon]" type="text" placeholder="Контактный телефон"  />
                    <input name="form[Email]" type="text" placeholder="Электроный адрес"  />
                    <input type="submit" value="Зарегистрировать" />
                </form>
            </fieldset>
        </div>
    </div>
</div>
</body>
</html>