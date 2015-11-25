<?php

require_once('SQL/startup.php');
require_once('model/model.php');

// Обработка отправки формы
if (isset($_POST['submit'])) {
	if ($_POST['title_art'] != "" && $_POST['content_art'] != "") {
		articles_new($_POST['title_art'], $_POST['date_art'], $_POST['content_art']);
		die(header('Location: index.php'));
	} else {
		echo "Введите название статьи";
	}
}

// Заголовок страницы
$title="Добавить статью";

// Заготовка страницы
$content='theme/new.php';

// вывод в HTML
include('Pattern/pattern-main.php');