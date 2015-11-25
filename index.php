<?php
/**
 * Created by PhpStorm.
 * User: ЛарисаСлава
 * Date: 18.11.2015
 * Time: 20:40
 */

// точка входа (контроллер) главная страница

include_once('model/model.php');

// Подготовка данных
$articles_all = articles_all();

// Заголовок страницы
$title = 'Список статей';

// Заготовка страницы
$content='theme/index.php';

// Вывод HTML
include ('Pattern/pattern-main.php');