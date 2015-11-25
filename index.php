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

// Внутренний шаблон.
$content = template('theme/template/v_index.php', array('articles_all'=>$articles_all));

// Внешний шаблон.
$page = template('theme/v_main.php', array('title' => $title, 'content' => $content));

// Вывод HTML
echo $page;
