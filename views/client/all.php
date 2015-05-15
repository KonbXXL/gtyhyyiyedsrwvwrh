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
			<li class="active"><a href="http://localhost/sportclub2.0/">КЛИЕНТЫ</a></li>
			<li ><a href="http://localhost/sportclub2.0/?ctrl=card">АБОНЕМЕНТЫ</a></li>
			<li ><a href="http://localhost/sportclub2.0/?ctrl=servises">УСЛУГИ</a></li>
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
					<form action="http://ezcheats.ru" method="get" id="topics_filter">
                        <table class="table">
					<div style="width:40%; float:left; margin-right:30%; font-size:14px;margin-bottom:7px;font-weight:700" >
					<label>Скрыть\показать активных клиентов</label>
					<label><input type="checkbox" name="actuality_only" id="actuality_only" value="1" checked/> Активные клиенты </label>
					</div>
	</form>
<br /><br /><br /><br /><br /><br />

	<thead>
		<tr>
			<th>ID</th>
			<th >Фамилия</th>
			<th >Имя</th>
			<th >Отчество</th>
			<th >Полных лет</th>
			<th >Дата регистрации</th>
			<th >Контактный телефон</th>
		</tr>
	</thead>	
	<tbody>							<br/>
                                    <?php
                                    function calculate_age($birthday) {$birthday_timestamp = strtotime($birthday);
                                    $age = date('Y') - date('Y', $birthday_timestamp);
                                     if (date('md', $birthday_timestamp) > date('md')) {
                                     $age--;}return $age;}?>
                                    <?php foreach ($items as $item):?>
								<tr>
								<td><?php echo $item->ClientID;?></td>
								<td><a class="hoverlink" href="http://localhost/sportclub2.0/views/client/clientid.php?id=<?php  echo $item->ClientID?>"><?php echo $item->LastName;?></a></td>
								<td><?php echo $item->Name;?></td>
								<td><?php echo $item->FastName;?></td>
								<td id="target"><?php echo calculate_age($item->DataHappy);?></td>
								<td><?php echo $item->DataReg;?></td>
								<td><?php echo $item->Contact;?></td>
								</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
							</div>
							<aside id="sidebar" >
                                <div style="width:30%;margin-bottom:20px; ">
                                    <a class="button blue" href="http://localhost/sportclub2.0/views/client/form.php">Новый клиент</a></li>
                                </div>
							<section class="block block-type-stream">
                                <div class="block SS_Peoplesearch">
                                    <header class="block-header sep">
                                        <h3>Поиск по клиентам</h3>
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
                                            <h3>Юридические лица</h3>
                                        </header>
                                        <div class="block-content">
                                            <?php
                                            $r_2=mysql_query ("select * from compani");
                                            echo
                                            '<table class="table">
                                        <thead>
                                         <tr>
                                         <th>ID</th>
                                        <th>Наименование</th>
                                        <th>ИНН</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                            while ($row=mysql_fetch_array($r_2)) {

                                                echo
                                                    '<tr>
                            <td>'.$row ["CompaniID"].'</td>
                            <td><a class="hoverlink" href="http://localhost/sportclub2.0/views/compan/companid.php?id='.$row["CompaniID"].'">'.$row ["Name"].'</a></td>
                            <td>'.$row["INN"].' </td>
                        </tr>';} ?>
                                            </tbody>
                                            </table>
                                            <form action="http://localhost/sportclub2.0/views/compan/addcompan.php">
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
