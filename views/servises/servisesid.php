<?php
require_once __DIR__ .'/../../classes/DB.php';
require_once __DIR__ .'/../../models/usluga.php';
$db=new DB;
$id=$_GET['id'];
$result = mysql_query("SELECT * FROM servises WHERE ServisesID='$id'");
$myrow =  mysql_fetch_array($result);//Извлекаем все данные    пользователя с данным id
$r=mysql_query ("select * from room");
$row=mysql_fetch_array($r);
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
                <li ><a href="http://localhost/sportclub2.0/">КЛИЕНТЫ</a></li>
                <li><a href=#>АБОНЕМЕНТЫ</a></li>
                <li class="active"><a href="http://localhost/sportclub2.0/?ctrl=servises">УСЛУГИ</a></li>
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
                    <a href="http://localhost/sportclub2.0/views/servises/servisesid.php?id=<?php echo $myrow['ServisesID']?>"><img src="http://localhost/sportclub2.0/avatars/<?php echo $myrow['Photo']?>" alt="photo" class="profile-photo" id="foto-img"></a>
                </div>
            </section>
            <section class="block block-type-profile-note">

                <div id="usernote-note" class="profile-note" style="display: none;">
                    <p id="usernote-note-text">
                    </p>

                    <ul class="actions">
                        <li><a href="#" onclick="return ls.usernote.showForm();" class="link-dotted">Редактировать</a></li>
                        <li><a href="#" onclick="return ls.usernote.remove(1);" class="link-dotted">Удалить</a></li>
                    </ul>
                </div>

                <div id="usernote-form" style="display: none;">
                    <p><textarea rows="4" cols="20" id="usernote-form-text" class="input-text input-width-full"></textarea></p>
                    <button type="submit" onclick="return ls.usernote.save(1);" class="button button-primary">Сохранить</button>
                    <button type="submit" onclick="return ls.usernote.hideForm();" class="button">Отмена</button>
                </div>

                <a href="#" onclick="return ls.usernote.showForm();" id="usernote-button-add" class="link-dotted">Написать заметку</a>
            </section>


            <section class="block block-type-profile-nav">
                <ul class="nav nav-pills nav-profile">
                    <li ><a href="http://localhost/sportclub2.0/views/servises/edit_servises.php?id=<?php  echo $myrow['ServisesID']?>">Редактировать данные об услуге</a></li>
                    <li><a href="http://localhost/sportclub2.0/views/servises/delet.php?id=<?php  echo $myrow['ServisesID']?>">Удалить услугу</a></li>
                </ul>
            </section>
        </aside>

        <div id="content" role="main" class="content-right" itemscope="" itemtype="http://data-vocabulary.org/Person">
                <h2 class="page-header user-login word-wrap no-user-name" itemprop="nickname"><?php echo $myrow['Nazvanies']?></h2>
            <table class="table table-profile-info">
                <tbody>
                <tr>
                    <td class="cell-label">Групповые занятия:</td>
                    <td><?php if($myrow['Paty']==1){
                            echo 'Имееться'  ;
                        }
                        else{echo'Отсутствует';}?></td>
                </tr>
                <tr>
                    <td class="cell-label">Место провидения:</td>
                    <td><?php  if($myrow['Mesto']==$row['RoomID']){
                            echo $row['Nazvanie'];
                        };?>
                    </td>
                </tr>
                <tr>
                    <td class="cell-label">Цена за 1 посещение:</td>
                    <td><?php echo $myrow['Price1']?></td>
                </tr>
                <tr>
                    <td class="cell-label">Цена за месяц:</td>
                    <td><?php echo $myrow['Price_month']?></td>
                </tr>
                <tr>
                    <td >ИНФОРМАЦИЯ</td>
                </tr>
                <tr>
                    <td class="cell-label">Описание:</td>
                    <td><?php echo $myrow['Opisanie']?></td>
                </tr>
                </tbody></table>

        </div> <!-- /content -->
    </div> <!-- /wrapper -->

    <footer id="footer">
        <div class="copyright">
            © Халдеев Максим АИС&nbsp;&nbsp;
    </footer>

</div> <!-- /container -->
</body>
</html>