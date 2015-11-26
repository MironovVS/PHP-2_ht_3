<?php

require_once('SQL/startup.php');
require_once('model/model.php');

$title_art = "";
$content_art = "";
$error = false;

// Обработка отправки формы
if (isset($_POST['submit'])) {
	if ($_POST['title_art'] != "" && $_POST['content_art'] != "") {
		articles_new($_POST['title_art'], $_POST['date_art'], $_POST['content_art']);
		die(header('Location: index.php'));
		}
		$title_art = $_POST['title_art'];
		$content_art = $_POST['content_art'];
		$error = true;
	}

// Заголовок страницы
$title="Добавить статью";

// Внутренний шаблон.
$content = template('theme/template/v_new.php');

// Внешний шаблон.
$page = template('theme/v_main.php', array('title' => $title, 'content' => $content));

// Вывод HTML
echo $page;