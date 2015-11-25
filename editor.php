<?php

require_once('SQL/startup.php');
require_once('model/model.php');

// Подготовка данных
$articles_all = articles_all();

// Заголовок страницы
$title="Консоль редактора";

// Заготовка страницы
$content='theme/editor.php';

// Вывод HTML
include('Pattern/pattern-main.php');