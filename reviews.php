<?php
if($_COOKIE['login']==''){
  header('Location: /reg.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $website_title = 'Отзывы';
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
                <h4>Отзывы</h4>
                <form action="" method="post">
                  <label for="title">Заголовок (какое авто)</label>
                  <input type="text" name="title" id="title" class="form-control">

                <label for="text">Отзыв</label>
                <textarea name="text" id="text" class="form-control mt-3"></textarea>


                  <div class="alert alert-danger mt-3" id="errorBlock"></div>


                  <button type="button" id="rew_send" class="btn btn-success mt-3  ">Добавить</button>
                </form>
            </div>

            <?php
              require 'blocks/aside.php';
             ?>
        </div>
    </main>

    <?php
      require 'blocks/footer.php';
     ?>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

     <script>
      $('#rew_send').click(function (){
        var title = $('#title').val();
        var text = $('#text').val();


        $.ajax({
        url: 'ajax/add_rew.php',
        type: 'POST',
        cache: false,
        data: {'title' : title, 'text' : text},
        dataType: 'html',
        success: function(data){
          if(data == 'Good'){
          $('#rew_send').text('Все готово');
          $('#errorBlock').hide();
          $('#rew_send').attr('disabled', true);
        }
          else{
            $('#errorBlock').show();
            $('#errorBlock').text(data);
          }
        }
        });
      });
     </script>


</body>
</html>
