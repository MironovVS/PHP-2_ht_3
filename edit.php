<?php

include_once('model/model.php');

$id=(int)$_GET['id'];
if (!$id) {
  die("Не верный id");
}

$article_edit = articles_get($id);

if (isset($_POST['submit'])) {
  articles_edit($_POST['id'], $_POST['name'], $_POST['content']);
  die(header('Location: index.php'));
}

// Заголовок страницы
$title="Редактирование статьи";

// Внутренний шаблон.
$content = template('theme/template/v_edit.php', array('article_edit'=>$article_edit));

// Внешний шаблон.
$page = template('theme/v_main.php', array('title' => $title, 'content' => $content));

// Вывод HTML
echo $page;