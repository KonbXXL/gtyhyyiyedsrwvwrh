<?php
require_once __DIR__ .'/../../classes/DB.php';
require_once __DIR__ .'/../../models/card.php';
require_once __DIR__ .'/../../models/client.php';
require_once __DIR__ .'/../../models/usluga.php';
$db=new DB;
$id=$_GET['id'];
$result = mysql_query("SELECT * FROM card WHERE CardID='$id'");
$myrow =  mysql_fetch_array($result);//Извлекаем все данные    пользователя с данным id
$r=mysql_query ("select * from servises");
$r2=mysql_query("select * from client");
$r3=mysql_query("select * from sotrudniki");
?>
<html class="" lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/edit_abonement.css" />
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
                    <li ><a href="http://localhost/sportclub2.0/views/client/edit_client.php?id=<?php  echo $myrow['ClientID']?>">Редактировать абонемент</a></li>
                    <li><a href="http://localhost/sportclub2.0/views/client/delet.php?id=<?php  echo $myrow['ClientID']?>">Удалить абонемент</a></li>
                </ul>
            </section>
        </aside>

        <div id="content" role="main" class="content-right" itemscope="" itemtype="http://data-vocabulary.org/Person">
            <div id="login">
                <form action="update.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <p class="login-msg"></p>
                    <div class="hd">
                        <div id="photo">
                            <?php
                            $result_2 = mysql_query("SELECT * FROM Client WHERE ClientID=$myrow[Client_ID]");
                            $myrow_2 =  mysql_fetch_array($result_2);?>
                            <img src="http://localhost/sportclub2.0/avatars/<?php echo $myrow_2['Avatar']?>" class="profile-photo" id="foto-img">
                        </div>
                        <h2>Бассейн "ТЕМП"</h2><br/><br/>
                        <p class="p2" >АБОНЕМЕНТ №<input  name="form[Nomer]" type="abonement" value="<?php echo $myrow['Nomer']?>" /></p><br/>
                        <p class="p4">(без права передачи)<input name="form[CardID]" type="hidden" value="<?php echo $myrow['CardID']?>"/></p>
                        <div id="login">
                            <form name="upload" action="http://localhost/sportclub2.0/avatars/download.php?id=<?php echo $myrow_2['ClientID']?>" method="POST" ENCTYPE="multipart/form-data">
                                Выберите файл для загрузки:
                                <input class="fileInput" type="file" size="1" onchange="document.getElementById('psevdoFileValue').value = this.value" name="file"/>
                                <input type="submit" name="upload" value="Загрузить">
                            </form></div><br/><br/><br/><br/>
                        <p>Ф.И.О&nbsp;&nbsp; <?php
                            echo $myrow_2["LastName"].' ' .$myrow_2["Name"].' ' .$myrow_2["FastName"];?>
                        <p>Услуга&nbsp;&nbsp;
                            <select name="form[Servises]" >
                                <option value="">Выбирете услугу</option>
                                <?php while ($row=mysql_fetch_array($r)){
                                    echo
                                        '<option value="'.$row["ServisesID"].'">'.$row["Nazvanies"].'</option>';
                                };?></select>
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
                                    <td><input name="form[Pn]" type="time" value="<?php echo $myrow['Pn']?>"/></td>
                                    <td><input name="form[Vt]" type="time" value="<?php echo $myrow['Vt']?>"/></td>
                                    <td><input name="form[Sr]" type="time" value="<?php echo $myrow['Sr']?>"/></td>
                                    <td><input name="form[Ch]" type="time" value="<?php echo $myrow['Ch']?>"/></td>
                                    <td><input name="form[Pt]" type="time" value="<?php echo $myrow['Pt']?>"/></td>
                                    <td><input name="form[Su]" type="time" value="<?php echo $myrow['Su']?>"/></td>
                                    <td><input name="form[Vs]" type="time" value="<?php echo $myrow['Vs']?>"/></td>
                                </tr>
                                </tbody>
                            </table><br/><br/>
                        </div>
                        <div class="c3">
                            <br/>
                            <p>ФИО тренера
                                <select name="form[Sotrudnik]" >
                                    <option value="">.........</option>
                                    <?php while ($row=mysql_fetch_array($r3)){
                                        echo
                                            '<option value="'.$row["SotrudnikID"].'">'.$row["LastName"].' '.$row["Name"].' '.$row["FastName"].'</option>';
                                    };?></select></p>
                            <br/><br/>
                            <p>Виза врача <input name="form[Vrach]" type="vrach" value="<?php echo $myrow['Vrach']?>"  /><input name="form[VrachData]" type="data" value="<?php echo $myrow['VrachData']?>"  /></p>
                            <br/><br/>
                            <p>Действителен с &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $myrow['Data'];?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; по &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="form[DataEnd]" type="data" value="<?php echo $myrow['DataEnd']?>"  />
                            </p></div>
                       <div id="login_2"><input  type="submit" value="Сохранить изминения" /></div></form>
                        <div class="c4">
                            <label>Отметка о посещение занятий</label>
                            <table border="1" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>14</td>
                                    <td>15</td>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>18</td>
                                    <td>19</td>
                                    <td>20</td>
                                    <td>21</td>
                                    <td>22</td>
                                    <td>23</td>
                                    <td>24</td>
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