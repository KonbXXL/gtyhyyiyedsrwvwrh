<?php
require_once __DIR__ .'/../../classes/DB.php';
require_once __DIR__ .'/../../models/card.php';
require_once __DIR__ .'/../../models/client.php';
require_once __DIR__ .'/../../models/usluga.php';
$db=new DB;
$id=$_GET['id'];
$result = mysql_query("SELECT * FROM card WHERE CardID='$id'");
$myrow =  mysql_fetch_array($result);//Извлекаем все данные    пользователя с данным id
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
                <li class="active"><a href="http://localhost/sportclub2.0/?ctrl=card">АБОНЕМЕНТЫ</a></li>
                <li ><a href="http://localhost/sportclub2.0/?ctrl=servises">УСЛУГИ</a></li>
                <li ><a href=#>ФОРМИРОВАНИЕ СТАТИСТИКИ</a></li>
            </ul>
        </nav>
        <hgroup class="site-info"><div class="site-name">
                <a href="http://localhost/sportclub2.0/"><img src="../picters/logo.png" alt="АИС Спортивный Клуб"/></a></div>
        </hgroup>
    </header>
    <div class="clear"></div>
    <div id="wrapper" class="">
        <aside id="sidebar" class="sidebar-left">
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
                    <li ><a href="http://localhost/sportclub2.0/views/visit/addvisit.php?id=<?php  echo $myrow['CardID']?>">Отметить посещение</a></li>
                    <li ><a href="http://localhost/sportclub2.0/views/magazineservises/addusluga.php?id=<?php  echo $myrow['CardID']?>">Отметить приобритение услуги</a></li>
                    <li ><a href="http://localhost/sportclub2.0/views/card/edit_card.php?id=<?php  echo $myrow['CardID']?>">Редактировать абонемент</a></li>
                    <li><a href="http://localhost/sportclub2.0/views/card/delete.php?id=<?php  echo $myrow['CardID']?>">Удалить абонемент</a></li>
                </ul>
            </section>
        </aside>

        <div id="content" role="main" class="content-right" itemscope="" itemtype="http://data-vocabulary.org/Person">
            <div id="login">
            <fieldset>
                    <div class="hd">
                        <div id="photo">
                            <?php
                            $result_2 = mysql_query("SELECT * FROM Client WHERE ClientID=$myrow[Client_ID]");
                            $myrow_2 =  mysql_fetch_array($result_2);?>
                            <img src="http://localhost/sportclub2.0/avatars/<?php echo $myrow_2['Avatar']?>" class="profile-photo" id="foto-img">
                        </div>
                        <h2>Бассейн "ТЕМП"</h2><br/><br/>
                        <p class="p2" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;АБОНЕМЕНТ №<?php echo $myrow['Nomer']?></p><br/>
                            <p class="p4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(без права передачи)</p><br/><br/><br/>
                        <p>Ф.И.О &nbsp;&nbsp;</p> <p class="p3"><?php
                            echo $myrow_2["LastName"].' ' .$myrow_2["Name"].'<br/> ' .$myrow_2["FastName"];?></p><br/><br/><br/><br/>
                        <p>Услуга&nbsp;&nbsp;
                        <p class="p3"><?php
                            $result_3 = mysql_query("SELECT * FROM servises WHERE ServisesID=$myrow[Servises]");
                            $myrow_3 =  mysql_fetch_array($result_3);
                            echo $myrow_3['Nazvanies'];
                            ?></p>
                    </div>
                    <div class="content">
                        <div class="c2">
                            <label>Дни и часы занятий</label>
                            <table border="1" cellspacing="0" >
                                <thead>
                                <tr>
                                    <th>Пн.</th>
                                    <th>Вт.</th>
                                    <th>Ср.</th>
                                    <th>Чт.</th>
                                    <th>Пт.</th>
                                    <th>Сб.</th>
                                    <th>Вс.</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php echo $myrow['Pn']?></td>
                                    <td><?php echo $myrow['Vt']?></td>
                                    <td><?php echo $myrow['Sr']?></td>
                                    <td><?php echo $myrow['Ch']?></td>
                                    <td><?php echo $myrow['Pt']?></td>
                                    <td><?php echo $myrow['Su']?></td>
                                    <td><?php echo $myrow['Vs']?></td>
                                </tr>
                                </tbody>
                            </table><br/><br/>
                        </div>
                        <div class="c3">
                            <br/>
                            <p>ФИО тренера&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <p class="p3"><?php
                                $result_4 = mysql_query("SELECT * FROM sotrudniki WHERE SotrudnikID=$myrow[Sotrudnik]");
                                $myrow_4 =  mysql_fetch_array($result_4);
                                echo $myrow_4['LastName'].' '.$myrow_4['Name'].' '.$myrow_4['FastName'];
                                ?></p> </p>
                            <br/><br/>
                            <p>Виза врача&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $myrow['Vrach']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; от&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $myrow['VrachData']?></p>
                            <br/><br/>
                            <p>Действителен с &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $myrow['Data'];?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; по &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $myrow['DataEnd'];?>
                            </p></div>
                        <div class="c4">
                            <label>Отметка о посещение занятий</label>
                            <?php
                            $result_4 = mysql_query("SELECT * FROM vizit WHERE Nomer=$myrow[Nomer]");
                            $myrow_4 =  mysql_fetch_array($result_4);?>
                            <table border="1" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td><?php echo $myrow_4['Odin']?></td>
                                    <td><?php echo $myrow_4['Dva']?></td>
                                    <td><?php echo $myrow_4['Tri']?></td>
                                    <td><?php echo $myrow_4['Che']?></td>
                                    <td><?php echo $myrow_4['Pyt']?></td>
                                    <td><?php echo $myrow_4['Shest']?></td>
                                    <td><?php echo $myrow_4['Sem']?></td>
                                    <td><?php echo $myrow_4['Vosem']?></td>
                                    <td><?php echo $myrow_4['Devatb']?></td>
                                    <td><?php echo $myrow_4['Desatb']?></td>
                                    <td><?php echo $myrow_4['Odinazatb']?></td>
                                    <td><?php echo $myrow_4['Dvenadzatb']?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $myrow_4['Trinadzat']?></td>
                                    <td><?php echo $myrow_4['Chetirnadzatb']?></td>
                                    <td><?php echo $myrow_4['Pytnad']?></td>
                                    <td><?php echo $myrow_4['Shestnad']?></td>
                                    <td><?php echo $myrow_4['Semnad']?></td>
                                    <td><?php echo $myrow_4['Vosemnad']?></td>
                                    <td><?php echo $myrow_4['Devetnad']?></td>
                                    <td><?php echo $myrow_4['Dvazat']?></td>
                                    <td><?php echo $myrow_4['Dvazato']?></td>
                                    <td><?php echo $myrow_4['Dvazatt']?></td>
                                    <td><?php echo $myrow_4['Dvazattt']?></td>
                                    <td><?php echo $myrow_4['Dvazatch']?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
            </fieldset>
            </div>
        </div> <!-- /content -->
    </div> <!-- /wrapper -->

    <footer id="footer">
        <div class="copyright">
            © Халдеев Максим АИС&nbsp;&nbsp;
    </footer>

</div> <!-- /container -->
</body>
</html>