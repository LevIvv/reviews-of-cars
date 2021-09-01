<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $website_title = 'Отзывы об авто';
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
              <?php
                require_once 'mysql_connect.php';

                $sql = 'SELECT * FROM `reww` ORDER BY `data` DESC';
                $query = $pdo->query($sql);
                while($row = $query->fetch(PDO::FETCH_OBJ)){
                  echo "<h2>$row->title</h2>
                  <p>Автор: $row->autor</p>
                  <a href='rews.php?id=$row->id' title= '$row->title'>
                  <button class='btn btn-warning mb'>Читать</button>
                  </a>";
                }
              ?>
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
