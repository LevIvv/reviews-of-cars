<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  require_once 'mysql_connect.php';

  $sql = 'SELECT * FROM `reww` WHERE `id` = :id';
  $query = $pdo->prepare($sql);
  $query->execute(['id' => $_GET['id']]);

  $reww = $query->fetch(PDO::FETCH_OBJ);

  $website_title = $reww->title;


  require 'blocks/head.php';

   ?>

</head>
<body>
<?php
require 'blocks/header.php';
?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
              <div class="jumbotron">
                <h1><?=$reww->title?></h1>
                  <p>Автор: <mark><?=$reww->autor?></mark> </p>

                  <?php
                    $date = date('d ', $reww->data);
                    $array = ["Января", "Февраля","Марта","Апреля","Мая","Июня","Июля","Августа","Сентября","Октября","Ноября","Декабря"];
                    $date .= $array[date('n', $reww->data) - 1];
                    $data .= date(' H:i', $reww->date);
                  ?>

                  <p>Дата публикации: <u><?=$date?></u> </p>  

                <p>
                  <?=$reww->text?>
                </p>
              </div>

            </div>

            <?php
              require 'blocks/aside.php';
             ?>
        </div>
    </main>

    <?php
      require 'blocks/footer.php';
     ?>



</body>
</html>
