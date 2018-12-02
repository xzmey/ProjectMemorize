 <?php
   require "db.php";

   $data = $_POST;
   // Если была нажата кнопка регистрации
   if( isset( $data['do_signup']) )
   {

       //здесь регистрируем

       $errors = array();
       if (trim($data['login'])=='')
       {
          $errors[]='Введите логин!';
       }

       if (trim($data['email'])=='')
       {
           $errors[]='Введите email!';
       }

       if ($data['password']=='')
       {
           $errors[]='Введите пароль!';
       }

       if ($data['password_2']!=$data['password'])
       {
           $errors[]='Повторный пароль введен не верно!';
       }
       // Если найдена хоть одна запись юзера у которого такой же логин
       if (R::count('users',"login = ?" , array ($data['login']))>0)
       {
           $errors[]='Пользователь с таким логином уже существует!';
       }
       // Если найдена хоть одна запись юзера у которого такой же email
       if (R::count('users',"email = ?" , array ($data['email']))>0)
       {
           $errors[]='Пользователь с таким Email уже существует!';
       }

       if(empty($errors))
       {
           // все хорошо, регистрируем
           $user = R::dispense('users');
           $user->login = $data['login'];
           $user->email = $data['email'];
           $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
           R::store($user);
           echo'<div style="color: green;">Вы успешно зарегистрированы!</div><hr>';
       }else
       {
           echo'<div style="color: red;">'.array_shift($errors).'</div><hr>';
       }
   }
 ?>

 <form action="/signup.php" method="POST">

   <p>
    <p><strong>Ваш логин</strong>:</p>
       <input type="text" name="login" value="<?php echo @$data['login']; ?>">
   </p>

    <p>
    <p><strong>Ваш Email</strong>:</p>
    <input type="email" name="email" value="<?php echo @$data['email']; ?>">
    </p>


    <p>
    <p><strong>Ваш пароль</strong>:</p>
    <input type="password" name="password" value="<?php echo @$data['password']; ?>">
    </p>

    <p>
    <p><strong>Введите ваш пароль еще раз</strong>:</p>
    <input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>">
    </p>

    <p>
        <button type="submit" name="do_signup" >Зарегистрироваться</button>
    </p>

 </form>

