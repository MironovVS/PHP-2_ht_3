<!DOCTYPE html>
<html>
<head>
  <link href="css/css-main.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8" />
  <title><?php echo $title ?></title>
</head>
<body>
<header>
  <h1><?php echo $title ?></h1>
  <br>
  <a href="index.php">Главная</a> | <a href="editor.php">Консоль редактора</a>
  <hr>
</header>
<section>
  <?php include $content ?>
</section>
</body>
<footer>
  <small><a href="http://geekbrains.ru">Школа программирования &copy;</a></small>
</footer>

</html>