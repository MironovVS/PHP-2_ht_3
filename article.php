<?php

include_once('model/model.php');

$id=(int)$_GET['id'];
if (!$id) {
die("Не верный id");
}

$article = articles_get($id);

// Заголовок страницы
$title="Простотр статьи";

// Внутренний шаблон.
$content = template('theme/template/v_article.php', array('article'=>$article));

// Внешний шаблон.
$page = template('theme/v_main.php', array('title' => $title, 'content' => $content));

// Вывод HTML
echo $page;