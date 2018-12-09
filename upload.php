<?php
  require "db.php";

 //Читаем полученный файл
 $res = file_get_contents($_FILES['filename']['name']);
 //Разбиваем на массив использую
 //как разделитель символы переноса строки
 $lines = explode("\r\n", $res);
 //В цикле выводим и нумеруем
 //строки нашего документа(для проверки)
 //выводит пока только на англ
echo "Для проверки: <br/>";
 foreach ($lines as $key=>$val)
 {
    echo "Строка $key:". $val . "<br/>";
 }
$data = $_POST;
 // если была нажата кнопка загрузить
if ( isset($data['do_upload']) )
{
//здесь загружаем в бд
    $errors = array();
   // проверка на формат txt(дописать)
    if($_FILES["filename"]["size"] > 1024*1024)
    {
        $errors[]='Размер файла превышает 1 мегабайт"';
    }
//если ошибок нет, загружаем в бд
    if(empty($errors))
    {
        $lines = R::dispense('texts');
        //сохранять текст должен по логину юзера
        $lines->login = $data['login'];
        $lines->name = $data['name'];
        R::store($lines);
        echo'<div style="color: green;">Вы успешно загрузили файл!</div><hr>';
    }else
    {
        echo'<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }
}

?>
<form action="upload.php" method="POST">
<p>
<p><strong>Название текста</strong>:</p>
<input type="text" name="name" value="<?php echo @$data['name']; ?>">
</p>
</form>

<form method="post" action="upload.php" enctype="multipart/form-data">
    <label for="filename">ФАЙЛ:</label>
    <input id="filename" type="file" name="filename">
    <input class="btn btn-default" type="submit" name="do_upload" value="Загрузить" />
</form>

