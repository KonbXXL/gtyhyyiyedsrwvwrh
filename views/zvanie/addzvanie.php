<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>АИС СПОРТИВНЫЙ КЛУБ</title>
    <link rel="stylesheet" href="../css/style_2.css" media="screen" type="text/css" />
</head>

<body>
<div class="vladmaxi-top">
    <a href="http://localhost/SportClub2.0/?ctrl=servises">АИС СпортивныйКлуб</a>
        <span class="right">
        <a href="http://localhost/SportClub2.0/?ctrl=servises">
            <strong>Вернуться к списку</strong>
        </a>
        </span>
    <div class="clr"></div>
</div>
<div id="login">
    <div class="flip">
        <div class="form-signup">
            <h1>Добавление</h1>
            <fieldset>
                <p class="login-msg"></p>
                <form action="add_zvanie.php" method="post">
                    <input name="form[Name]" type="text" placeholder="Введите название должности" required />
                    <input type="submit" value="Добавить" />
                </form>
            </fieldset>
        </div>
    </div>
</div>
</body>
</html>
