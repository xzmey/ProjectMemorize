<?php
require "db.php";
header("Content-Type: text/html; charset=utf-8");

if($_FILES['userfile']['error']>0)
{
    echo '<p>Ошибка:</p>';

    switch ($_FILES['userfile']['error'])
    {
        case 1:
            echo 'Размер файла больше допустимого (upload_max_filesize в php.ini)';
            break;

        case 2:
            echo 'Размер файла больше допустимого (upload_file_size в форме)';
            break;

        case 3:
            echo 'Загружена только часть файла';
            break;

        case 4:
            echo 'Файл не был загружен)';
            break;

        case 6:
            echo 'Загрузка не возможна: не задан временный каталог)';
            break;

        case 7:
            echo 'Загрузка не выполнена: невозможна запись на диск)';
            break;
    }
    exit();

}

if ($_FILES['userfile']['type'] != 'text/plain')
{
    echo 'Данный файл не является текстовым!';
    exit();
}

// Указываем, где нужно сохранить файл, название будет разное каждый раз
$upfile = 'uploads/'.mktime().'.'.pathinfo($_FILES['userfile']['name'])['extension'];

// Проверяем, действительно ли файл был загружен по HTTP методом POST
if (is_uploaded_file($_FILES['userfile']['tmp_name']))
{
    if (! move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile))
    {
         echo'Невозможно переместить файл в каталог назначения';
         exit();
    }
}
else
{
      echo 'Возможно атака через загрузку файла';
      exit();
}

echo '<p>Файл успешно загружен.</p>';
echo 'Имя файла: ' . $_FILES['userfile']['name'] . '<br />';

$file_content = file_get_contents($upfile);

// Вывод содержимого загруженного файла

echo 'Содержимое загруженного файла: <br /><hr />';

echo nl2br($file_content);

$file = R::dispense('files');
$file->user_id = $_SESSION['logged_user']->id;
$file->name = mktime().'.'.pathinfo($_FILES['userfile']['name'])['extension'];
$file->filename = $_FILES['userfile']['name'];

R::store($file);

echo'<div style="color: green;">Вы успешно загрузили текст!</div><hr>';


?>

<a href="upload.html">Загрузить другой файл</a>

