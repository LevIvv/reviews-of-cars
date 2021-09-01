<?php
  $text = trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));
  $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));

  $error = '';

  if($text == ""){
    $error = 'Напишите отзыв';
  }
  else if($title == ''){
    $error = 'Напишите заголовок';
  }

  if($error != ''){
    echo $error;
    exit();
  }


   require_once '../mysql_connect.php';

   $sql = 'INSERT INTO reww(title, text, data, autor) VALUES(?, ?, ?, ?)';
   $query = $pdo->prepare($sql);
   $query->execute([$title, $text, time(), $_COOKIE['login']]);
   echo 'Good';

?>
