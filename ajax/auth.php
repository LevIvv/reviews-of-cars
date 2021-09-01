<?php

  $login = trim (filter_var($_POST['login'], FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

  $error = '';

  if($login == ""){
    $error = 'Введите логин';
  }
  else if($pass==""){
  $error = 'Введите пароль';
  }

  if($error != ''){
    echo $error;
    exit();
  }

  $hash = "jbngkebghg5ii3nJIE";
  $pass = md5($pass. $hash);

   require_once '../mysql_connect.php';

   $sql = 'SELECT `id` FROM `users` WHERE `login` = :login && `pass` = :pass';
   $query = $pdo->prepare($sql);
   $query->execute(['login' => $login, 'pass' => $pass]);

   $user = $query->fetch(PDO::FETCH_OBJ);
   if($user->id == 0)
     echo 'Неверный логин или пароль';
   else {
    setcookie('login', $login, time()+3600, "/");
    echo 'Готово';
   }


?>
