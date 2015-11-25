<?php

require_once('SQL/startup.php');
require_once('model/model.php');

// Подготовка данных
$articles_all = articles_all();

// Заголовок страницы
$title="Консоль редактора";

// Внутренний шаблон.
$content = template('theme/template/v_editor.php', array('articles_all'=>$articles_all));

// Внешний шаблон.
$page = template('theme/v_main.php', array('title' => $title, 'content' => $content));

// Вывод HTML
echo $page;