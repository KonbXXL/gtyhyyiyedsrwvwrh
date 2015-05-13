<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name=viewport content="width=device-width, initial-scale=1">
        <script type="text/javascript">
        $(document).ready(function() {
        $('table.table').liveFilter('fade');
    });
        </script>

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
		<body class=" ls-user-role-guest ls-user-role-not-admin width-fluid">
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
                        <a href="http://localhost/sportclub2.0/"><img src="views/picters/logo.png" alt="АИС Спортивный Клуб"/></a></div>
                </hgroup>

            </header>
	<div class="clear"></div>
					<div id="wrapper" class="">
					<div id="content" role="main" class="">
					<div></div>

<br /><br /><br />
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th >Номер</th>
			<th >Клиент</th>
            <th >Действителен с </th>
            <th >Дата окончания</th>

		</tr>
	</thead>
	<tbody>							<br/>
<?php
require_once __DIR__ .'/../../classes/DB.php';
require_once __DIR__ .'/../../models/client.php';
$db=new DB;
$r_2=mysql_query ("select * from sotrudniki");
$r_3=mysql_query ("select * from dolgnostb");
foreach ($items as $item):?>
    <tr>
        <td><?php echo $item->CardID;?></td>
        <td><a class="hoverlink" href="http://localhost/sportclub2.0/views/card/cardid.php?id=<?php  echo $item->CardID?>"><?php echo $item->Nomer;?></a></td>
        <td><a class="hoverlink" href="http://localhost/sportclub2.0/views/client/clientid.php?id=<?php  echo $item->Client_ID?>">
                <?php
                $result = mysql_query("SELECT * FROM Client WHERE ClientID=$item->Client_ID");
                $myrow =  mysql_fetch_array($result);
                    echo $myrow["LastName"].' ' .$myrow["Name"].' ' .$myrow["FastName"];?>
            </a>
        </td>
        <td><?php echo $item->Data;?></td>
        <td><?php echo $item->DataEnd;?></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<aside id="sidebar" >
    <div style="width:25%;margin-bottom:20px; ">
        <a class="button blue" href="http://localhost/sportclub2.0/views/card/addcard.php">Создать абонемент</a></li>
    </div>
    <section class="block block-type-stream">
        <div class="block SS_Peoplesearch">
            <header class="block-header sep">
                <h3>Поиск по услугам</h3>
            </header>
            <div class="block-content">
                <input  placeholder="Поиск" class="filter" name="livefilter" type="text" value="" " />
                <small>
                    <br />
                    Введите нужно значения поля.
                </small>
            </div>
        </div>
    </section>
    <section class="block block-type-stream">
        <div class="block SS_Peoplesearch">
            <header class="block-header sep">
                <h3>Должность</h3>
            </header>
            <div class="block-content">
                <?php
                echo
                '<table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Наименование</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>';
                while ($row=mysql_fetch_array($r_3)) {
                    echo
                        '<tr>
                            <td>'.$row ["DolgID"].'</td>
                            <td> '.$row ["Name"].'</td>
                            <td><a href="http://localhost/sportclub2.0/views/zvanie/delet_zvanie.php?id='.$row['DolgID'].'">удалить</a></td>
                        </tr>';} ?>
                </tbody>
                </table>
                <form action="http://localhost/sportclub2.0/views/zvanie/addzvanie.php">
                    <button type="submit" class="button button-primary" >Добавить</button></form>
            </div>
        </div>
    </section>
    <section class="block block-type-stream">
        <div class="block SS_Peoplesearch">
            <header class="block-header sep">
                <h3>Список сотрудников</h3>
            </header>
            <div class="block-content">
                <?php
                echo
                '<table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Должность</th>
                    </tr>
                    </thead>
                    <tbody>';
                while ($row=mysql_fetch_array($r_2)) {

                    echo
                        '<tr>
                            <td>'.$row ["SotrudnikID"].'</td>
                            <td>'.$row ["LastName"].' '.$row ["Name"].' '.$row ["FastName"].'</td>
                            <td>'.$row["Doljnostb"].' </td>
                            <td><a href="http://localhost/sportclub2.0/views/sotrudniki/delet_sotrudnik.php?id='.$row['SotrudnikID'].'">удалить</a></td>
                        </tr>';} ?>
                </tbody>
                </table>
                <form action="http://localhost/sportclub2.0/views/sotrudniki/addsotrudnik.php">
                    <button type="submit" class="button button-primary" >Добавить</button></form>
            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="copyright" >
            <h2>©2014-2015 Халдеев Максим</h2>
        </div>
        </div>
        </div>
        </body>
        </html>
