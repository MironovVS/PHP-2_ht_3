<?php

include_once('model/model.php');

$id=(int)$_GET['id'];
if (!$id) {
  die("Не верный id");
}

$article_edit = articles_get($id);

if (isset($_POST['submit'])) {
  articles_edit($_POST['id'], $_POST['name'], $_POST['content']);
  die(header('Location: v_index.php'));
}

// Заголовок страницы
$title="Редактирование статьиа";

// Заготовка страницы
$content='theme/edit.php';

// Вывод HTML
include('Pattern/v_main.php');