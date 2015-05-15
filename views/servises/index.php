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
			<li ><a href="http://localhost/sportclub2.0/?ctrl=card">АБОНЕМЕНТЫ</a></li>
			<li class="active"><a href="http://localhost/sportclub2.0/?ctrl=servises">УСЛУГИ</a></li>
			<li ><a href="http://localhost/sportclub2.0/?ctrl=statistic">ФОРМИРОВАНИЕ СТАТИСТИКИ</a></li>
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
			<div>
					<form action="" method="get" id="topics_filter">
					<div style="width:40%; float:left">
					<ul id="user-prefix-filter" class="search-abc">
					<li class="active">Услуги имеющие групповые занятия</li>
					</ul>
					<select name="blog_id" id="servises" style="width:240px">
                        <option value="" >...........</option>
                        <option value="" >Имеется</option>
					<option value="" >Отсутствует</option>
					</select>
					</div>
	</form>
	<script>
$('#topics_filter').find('#blog_id, #actuality_only').change(function() {
    $('#topics_filter').submit();
});
		$('.table-topics thead a').click(function(){
            var th = $(this).parent('th');
            $('#order').val(th.data('order'));
            $('#order_way').val(th.data('order-way'));
            $('#topics_filter').submit();
            return false;
        });
	</script>
</div>


<br /><br /><br /><br /><br /><br />
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th >Название</th>
			<th >Групповое занятие</th>
			<th >Место провидения</th>
			<th >Цена за одно посещение</th>
			<th >Цена за 1 месяц</th>
		</tr>
	</thead>
	<tbody>							<br/>
<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$r=mysql_query ("select * from room");
$r_2=mysql_query ("select * from room");
$row=mysql_fetch_array($r);
foreach ($items as $item):?>
    <tr>
        <td><?php echo $item->ServisesID;?></td>
        <td><a class="hoverlink" href="http://localhost/sportclub2.0/views/servises/servisesid.php?id=<?php  echo $item->ServisesID?>"><?php echo $item->Nazvanies;?></a></td>
        <td><?php if($item->Paty==1){
             echo 'Имееться'  ;
            }
            else{echo'Отсутствует';}?></td>
        <td><?php
            $result = mysql_query("SELECT * FROM room WHERE RoomID=$item->Mesto");
            $myrow =  mysql_fetch_array($result);
            echo $myrow['Nazvanie'];?>
        </td>
        <td><?php echo $item->Price1;?></td>
        <td><?php echo $item->Price_month;?></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<aside id="sidebar" >
    <div style="width:25%;margin-bottom:20px; ">
        <a class="button blue" href="http://localhost/sportclub2.0/views/servises/addservises.php">Добавление услуги</a></li>
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
                <h3>Список помещений</h3>
            </header>
            <div class="block-content">
               <?php
               echo
                '<table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>';
                    while ($row=mysql_fetch_array($r_2)) {
                        echo
                            '<tr>
                            <td>'.$row ["RoomID"].'</td>
                            <td>'.$row ["Nazvanie"].'</td>
                            <td><a href="http://localhost/sportclub2.0/views/room/delet_room.php?id='.$row['RoomID'].'">удалить</a></td>
                        </tr>';} ?>
                    </tbody>
                </table>
                <form action="http://localhost/sportclub2.0/views/room/addroom.html">
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
