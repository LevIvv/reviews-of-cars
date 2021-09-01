<?php
  $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
  $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  $login = trim (filter_var($_POST['login'], FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

  $error = '';

  if($username == ""){
    $error = 'Введите имя';
  }
  else if($email==""){
  $error = 'Введите email';
  }
  else if($login==""){
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

   $sql = 'INSERT INTO users(name, email, login, pass) VALUES(?,?,?,?)';
   $query = $pdo->prepare($sql);
   $query->execute([$username, $email, $login,$pass]);
echo 'Good';

?>
