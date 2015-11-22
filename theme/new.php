<?php /*
Шаблон создания новой статьи
============================
$title - заголовок
$content - содержание
$error - ошибка юзера
*/?>

	<h2>Новая статья</h2>
	<?php if ($error): ?>
		<b style="color:red">Заполните все поля!</b>
	<?php endif; ?>
	<form method="post">
		Название<sup style="color:red">*</sup>: <br>
		<input type="text" name="title_art" value="<?php echo $title_art ?>">
		<br><br>
		Содержание: <br>
		<textarea name="content_art"><?php echo $content_art?></textarea>
		<br>
		<input type="date" name="date_art"><br>
		<input type="submit" name="submit" value="Добавить">
	</form>
	<hr>
	<small><a href="http://geekbrains.ru">Школа программирования &copy;</a></small>
