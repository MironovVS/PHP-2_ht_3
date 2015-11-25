<?php

// подключаем библиотеки
require_once('model/model.php');

$id=(int)$_GET['id'];
if (!$id) {
  die("Не верный id");
}

//Удаляем статью по id
articles_delete($id);
header('Location: editor.php');
