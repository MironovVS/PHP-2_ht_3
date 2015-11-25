<?php

include_once('model/model.php');

$id=(int)$_GET['id'];
if (!$id) {
die("Не верный id");
}

$article = articles_get($id);

// Заголовок страницы
$title="Простотр статьи";

// Заготовка страницы
$content='theme/article.php';

// Вывод HTML
include ('Pattern/pattern-main.php');