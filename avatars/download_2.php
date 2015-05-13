<?php
require_once __DIR__ .'/../classes/DB.php';
require_once __DIR__ .'/../models/usluga.php';
$db=new DB;
$id=$_GET['id'];
if ($_POST) {
    $f_err     = 0; //вспомогательная переменная
    $types     = array(
        '.jpg',
        '.JPG',
        '.jpeg',
        '.gif',
        '.bmp',
        '.png'
    ); //поддерживаемые форматы загружаемых файлов
    $max_size  = 5020500; //максимальный размер загружаемого файла (5000-МБ)
    $path      = 'full/'; //директория для загрузки
    $path_mini = 'photo/'; //директория для загрузки миниатюры
    $fname     = $_FILES['file']['name'];
    $ext       = substr($fname, strpos($fname, '.'), strlen($fname) - 1); //определяем тип загружаемого файла

    //проверка на соответствие формата
    if (!in_array($ext, $types)) {
        $f_err++;
        $mess = '<p style="color:red;">Загружаемый файл не является картинкой</p>';
    }

    //проверка размера файла
    if (filesize($_FILES['file']['tmp_name']) > $max_size) {
        $f_err++;
        $mess = '<p style="color:red;">Размер загружаемой картинки превышает 5 Mb</p>';
    }

    //если файл успешно прошел проверку
    //перемещаем его в заданную директорию из временной
    if ($f_err == 0) {
        move_uploaded_file($_FILES['file']['tmp_name'], $path_mini . $fname);

        //путь к загруженному файлу
        $source_src = $path_mini . $fname;

        //создаем путь
        $new_name     = $fname;
        $resource_src = $path_mini . $new_name;

        //получаем параметры загруженного файла
        $params = getimagesize($source_src);
        switch ($params[2]) {
            case 1:
                $source = imagecreatefromgif($source_src);
                break;
            case 2:
                $source = imagecreatefromjpeg($source_src);
                break;
        }
        if ($params[1] > $params[0]) {
            $newheight = 300;
            $newwidth  = floor($newheight * $params[0] / $params[1]);
        }
        //если ширина больше высоты
        //вычисляем новую высоту
        if ($params[1] < $params[0]) {
            $newwidth  = 300;
            $newheight = floor($newwidth * $params[1] / $params[0]);
        }
        $resource = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($resource, $source, 0, 0, 0, 0, $newwidth, $newheight, $params[0], $params[1]);
        imagejpeg($resource, $resource_src, 80); //80 качество изображения

    }
}

$file = str_replace($_SERVER['DOCUMENT_ROOT'], '/', $path_mini . $new_name); // получить путь вида '/img/avatars/15.jpg'
mysql_query("UPDATE servises SET Photo='$file' WHERE ServisesID='$id';"); //Добавление в БД.
header("Refresh:0.5;url=http://localhost/SportClub2.0/views/servises/servisesid.php?id=$id")
?>