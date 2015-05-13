<?php
require_once __DIR__ .'/../../classes/DB.php';
require_once __DIR__ .'/../../models/client.php';
$db=new DB;
$id=$_GET['id'];
$result = mysql_query("SELECT * FROM Client WHERE ClientID='$id'");
$myrow =  mysql_fetch_array($result);//Извлекаем все данные    пользователя с данным id
$r=mysql_query ("select * from pol");
?>
<html class="" lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/style_3.css" />
    <title>АИС СПОРТИВНЫЙ КЛУБ</title>
    <script type="text/javascript">
        var tinyMCE = false;
        ls.lang.load([]);
        ls.registry.set('comment_max_tree',7);
        ls.registry.set('block_stream_show_tip',true);
    </script>
    <style>
        #container {
            min-width: 300px;
            max-width: 1400px;
        }
    </style>
</head>
<body class="ls-user-role-user ls-user-role-not-admin width-fluid webkit webkit537">
<div id="container" class="">
    <header id="header" role="banner">
        <nav id="nav">
            <ul class="nav nav-main">
                <li class="active"><a href="http://localhost/sportclub2.0/">КЛИЕНТЫ</a></li>
                <li><a href=#>АБОНЕМЕНТЫ</a></li>
                <li><a href=#>УСЛУГИ</a></li>
                <li><a href=#>ФОРМИРОВАНИЕ СТАТИСТИКИ</a></li>

            </ul>

        </nav>
        <hgroup class="site-info"><div class="site-name">
                <a href="http://localhost/sportclub2.0/"><img src="../picters/logo.png" alt="АИС Спортивный Клуб"/></a></div>
        </hgroup>
    </header>
    <div class="clear"></div>
    <div id="wrapper" class="">
        <aside id="sidebar" class="sidebar-left">
            <section class="block block-type-profile">
                <div class="profile-photo-wrapper">
                    <a href="http://localhost/sportclub2.0/client/clientid.php?id=<?php echo $myrow['ClientID']?>"><img src="http://localhost/sportclub2.0/avatars/<?php echo $myrow['Avatar']?>" alt="photo" class="profile-photo" id="foto-img"></a>
                    <div id="login">
                    <form name="upload" action="http://localhost/sportclub2.0/avatars/download.php?id=<?php echo $myrow['ClientID']?>" method="POST" ENCTYPE="multipart/form-data">
                        Выберите файл для загрузки:
                        <input class="fileInput" type="file" size="1" onchange="document.getElementById('psevdoFileValue').value = this.value" name="file"/>
                        <input type="submit" name="upload" value="Загрузить">
                    </form></div>
                </div>
            </section>
        </aside>

        <div id="content" role="main" class="content-right" itemscope="" itemtype="http://data-vocabulary.org/Person">
                <h2 class="page-header user-login word-wrap no-user-name">Редактирование данных</h2>
            <div id="login">
            <form action="update.php" method="post" enctype="multipart/form-data">
            <table class="table table-profile-info">
                <tbody>
                <tr>
                    <td class="cell-label">Фамилия</td>
                    <td><input name="form[LastName]" type="text" value="<?php echo $myrow['LastName']?>"  /></td>
                    <td><input name="form[ClientID]" type="hidden" value="<?php echo $myrow['ClientID']?>"/></td>
                </tr>
                <tr>
                    <td class="cell-label">Имя</td>
                    <td><input name="form[Name]" type="text" value="<?php echo $myrow['Name']?>"  /></td>
                </tr>
                <tr>
                    <td class="cell-label">Отчество</td>
                    <td><input name="form[FastName]" type="text" value="<?php echo $myrow['FastName']?>"  /></td>
                </tr>
                <tr>
                    <td class="cell-label">Дата рождения</td>
                    <td><input name="form[DataHappy]" type="text" value="<?php echo $myrow['DataHappy']?>"  /></td>
                </tr>
                <tr>
                    <td class="cell-label">Контактный телефон</td>
                    <td><input name="form[Contact]" type="text" value="<?php echo $myrow['Contact']?>"  /></td>
                </tr>
                <tr>
                    <td class="cell-label">Пол</td>
                    <td>
                            <select name="form[Pol]" >
                            <option value="">Выберите пол</option>
                            <?php while ($row=mysql_fetch_array($r)){
                                echo '<option value="'.$row["ID"].'">'.$row["Nazvanie"].'</option>';
                            };?></select></td>
                </tr>
                <tr>
                    <td class="cell-label">Посещаемые услуги:</td>
                    <td>
                        <a href=#>Плавание</a>,
                        <a href=#>Тренажерный зал</a>,
                        <a href=#>Массаж</a>,
                        <a href=>Солярий</a>
                    </td>
                </tr>
                <tr>
                    <td class="cell-label">Статус клиента</td>
                    <td></td>
                </tr>
                <tr>
                    <td >АКТИВНОСТЬ</td>
                </tr>
                <tr>
                    <td class="cell-label">Зарегистрирован:</td>
                    <td><?php echo $myrow['DataReg']?></td>
                </tr>
                <tr>
                    <td class="cell-label">Последние посещение:</td>
                    <td></td>
                </tr>
                </tbody></table>
                <input  type="submit" value="Сохранить" /></div>
                </form>

        </div> <!-- /content -->
    </div> <!-- /wrapper -->

    <footer id="footer">
        <div class="copyright">
            © Халдеев Максим АИС&nbsp;&nbsp;
    </footer>

</div> <!-- /container -->
</body>
</html>
