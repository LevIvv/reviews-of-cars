<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 border-bottom bg-white shadow-sm mb-3  ">
  <h5 class="my-0 mr-md-auto font-weight-normal">Отзывы об авто</h5>
    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
      <a class="me-3 py-2 text-dark text-decoration-none" href="/reviews.php">Написать отзыв</a>
      <a class="me-3 py-2 text-dark text-decoration-none" href="/">На главную</a>

      </nav>
      <?php
        if($_COOKIE['login']==''):
      ?>
      <a class="btn  btn-outline-primary me-2" href="/auth.php">Войти</a>
      <a class="btn  btn-outline-primary me-2" href="/reg.php">Регистрация</a>

      <?php
        else:
      ?>

  <a class="btn  btn-outline-primary me-2" href="/auth.php">Личный кабинет</a>
  <?php
  endif;
  ?>

  </div>
