<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $website_title = 'Регистрация';
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
            <h4>Форма регистрации</h4>
            <form action="" method="post">
                <label for="username">Ваше имя</label>
                <input type="name" name="username" id="username" class="form-control">

                <label for="email">e-mail</label>
                <input type="email" name="email" id="email" class="form-control">

                <label for="login">Логин</label>
                <input type="text" name="login" id="login" class="form-control">

                <label for="pass">Пароль</label>
                <input type="password" name="pass" id="pass" class="form-control">

                <div class="alert alert-danger mt-3" id="errorBlock"></div>

                <button type="button" id="reg_user" class="btn btn-success mt-3">Зарегистрироваться</button>
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
    $('#reg_user').click(function () {
        var name = $('#username').val();
        var email = $('#email').val();
        var login = $('#login').val();
        var pass = $('#pass').val();

        $.ajax({
            url: 'ajax/reg.php',
            type: 'POST',
            cache: false,
            data: {'username': name, 'email': email, 'login': login, 'pass': pass},
            dataType: 'html',
            success: function (data) {
                if (data == 'Good') {
                    $('#reg_user').text('Все готово');
                    $('#errorBlock').hide();
                    $('#reg_user').attr('disabled', true);
                } else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);
                    console.error("Error: " + data);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#errorBlock').show();
                $('#errorBlock').text('Ошибка запроса: ' + textStatus);
                console.error("Request failed: " + textStatus);
                console.error("Error thrown: " + errorThrown);
                console.error("Response: " + jqXHR.responseText);
            }
        });
    });
</script>

</body>
</html>
