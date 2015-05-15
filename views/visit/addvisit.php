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
                <form action="add_vizit.php" method="post">
                    <p><input type="hidden" name="form[CardID]" value="<?php echo $myrow['CardID']?>"/></p>
                    <?php  echo "Абонемент №&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name='form[Nomer]' type='abonement' value='".$myrow["Nomer"]."' />";?>
                    <?php echo "<br/> Дата посещения&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name='form[DataV]' type='data' value='".date("Y-m-d H:i:s")."' />";?>
                    <?php $result_2 = mysql_query("SELECT * FROM servises WHERE ServisesID=$myrow[Servises]");
                    $myrow_2 =  mysql_fetch_array($result_2); echo "<br/> Услуга&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='text'  value='".$myrow_2["Nazvanies"]."'/>";?>
                    <br/>
                    <p><input type="hidden" name="form[Servises]" value="<?php echo $myrow['Servises']?>"/></p>
                    Обслуживший сотрудник <select name="form[Sotrudnik]" >
                        <option value="">Выбирете сотрудника</option>
                        <?php while ($row=mysql_fetch_array($r)){
                            echo
                                '<option value="'.$row["SotrudnikID"].'">'.$row["LastName"].' '.$row["Name"].' '.$row["FastName"].'</option>';
                        };?></select>
                    <br/>
                    <label>Отметка о посещение занятий</label>
                    <?php
                    $result_4 = mysql_query("SELECT * FROM vizit WHERE Nomer=$myrow[Nomer]");
                    $row_4 =  mysql_fetch_array($result_4);?>

                    <table border="1" cellspacing="0" style="width: 100%;height: 90px; ">
                        <tbody>
                        <tr>
                            <td ><?php  echo " <input name='form[A]' type='otmetka' value='".$row_4["Odin"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[B]' type='otmetka' value='".$row_4["Dva"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[C]' type='otmetka' value='".$row_4["Tri"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[D]' type='otmetka' value='".$row_4["Che"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[F]' type='otmetka' value='".$row_4["Pyt"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[I]' type='otmetka' value='".$row_4["Shest"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[G]' type='otmetka' value='".$row_4["Sem"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[H]' type='otmetka' value='".$row_4["Vosem"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[J]' type='otmetka' value='".$row_4["Devatb"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[K]' type='otmetka' value='".$row_4["Desatb"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[L]' type='otmetka' value='".$row_4["Odinazatb"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[Q]' type='otmetka' value='".$row_4["Dvenadzatb"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                        </tr>
                        <tr>
                            <td><?php  echo " <input name='form[W]' type='otmetka' value='".$row_4["Trinadzat"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[E]' type='otmetka' value='".$row_4["Chetirnadzatb"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[R]' type='otmetka' value='".$row_4["Pytnad"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[T]' type='otmetka' value='".$row_4["Shestnad"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[Y]' type='otmetka' value='".$row_4["Semnad"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[U]' type='otmetka' value='".$row_4["Vosemnad"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[O]' type='otmetka' value='".$row_4["Devetnad"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[P]' type='otmetka' value='".$row_4["Dvazat"]."'style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[Z]' type='otmetka' value='".$row_4["Dvazato"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[V]' type='otmetka' value='".$row_4["Dvazatt"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[X]' type='otmetka' value='".$row_4["Dvazattt"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                            <td><?php  echo " <input name='form[N]' type='otmetka' value='".$row_4["Dvazatch"]."' style='width:50%;height: 100%;margin-left:3px;'/>";?></td>
                        </tr>
                        </tbody>
                    </table>

                    <input type="submit" value="Отметить" />
                </form>
            </fieldset>
        </div>
    </div>
</div>
</body>
</html>
