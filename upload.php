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

// Указываем, где нужно сохранить файл
$upfile = 'uploads/' . $_FILES['userfile']['name'];

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
echo 'Имя файла: ' . $_files['userfile']['name'] . '<br />';

$file_content = file_get_contents($upfile);

// Вывод содержимого загруженного файла

echo 'Содержимое загруженного файла: <br /><hr />';

echo nl2br($file_content);

?>

<form action="/upload.php" method="POST">

    <p>
        <button type="submit" name="do_upload" > Загрузить в бд</button>
    </p>

</form>

<form action="/upload.php" method="POST">

    <p>
        <button type="submit" name="do_read" > Загрузить из бд текст</button>
    </p>

</form>

<a href="upload.html">Загрузить другой файл</a>





