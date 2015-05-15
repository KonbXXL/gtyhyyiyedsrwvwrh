<?php
require_once __DIR__ .'/../../classes/DB.php';
$db=new DB;
$id=$_GET['id'];
$result = mysql_query("SELECT * FROM card WHERE CardID='$id'");
$myrow =  mysql_fetch_array($result);
$r=mysql_query ("select * from sotrudniki");
$r2=mysql_query("select * from magazinevisit")
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>АИС СПОРТИВНЫЙ КЛУБ</title>
    <link rel="stylesheet" href="../css/visit.css" media="screen" type="text/css" />
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
            <h1>Отметка о посещение</h1>
            <fieldset>
                <p class="login-msg"></p>
                <form action="add_usluga.php" method="post">
                    <p><input type="hidden" name="form[CardID]" value="<?php echo $myrow['CardID']?>"/></p>
                    <?php  echo "Абонемент №&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name='form[Nomer]' type='abonement' value='".$myrow["Nomer"]."' />";?>
                    <?php echo "<br/> Дата покупки&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name='form[DataP]' type='data' value='".date("Y-m-d")."' />";?>
                    <?php $result_2 = mysql_query("SELECT * FROM servises WHERE ServisesID=$myrow[Servises]");
                    $myrow_2 =  mysql_fetch_array($result_2); echo "<br/> Услуга&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='text'  value='".$myrow_2["Nazvanies"]."'/>";?>
                    <br/>
                    <p><input type="hidden" name="form[Servises]" value="<?php echo $myrow['Servises']?>"/></p>
                    Обслуживший сотрудник <select name="form[Sotrudnik]" >
                        <option value="">Выбирете сотрудника</option>
                        <?php while ($row=mysql_fetch_array($r)){
                            echo
                                '<option value="'.$row["SotrudnikID"].'">'.$row["LastName"].' '.$row["Name"].' '.$row["FastName"].'</option>';
                        };?></select>
                    <input type="text" name="form[Result]" placeholder="Введите сумму"/>
                    <input type="submit" value="Отметить" />
                </form>
            </fieldset>
        </div>
    </div>
</div>
</body>
</html>
