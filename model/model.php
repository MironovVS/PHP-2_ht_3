<?php

//подключаемся к базе
include_once 'SQL/startup.php';

// список всех статей
function articles_all()
{
	// запрос
	$sql = 'SELECT `id`,`date`, `name`, SUBSTRING(`content`, 1, 500) AS `content` FROM `lesson2` ORDER BY `date` DESC';

	//Выполняем запрос в БД
	$result = mysqli_query(getDbConnect(), $sql);

	//Проверяем есть ли записи в БД
	if (!$result) {
		die(mysqli_error(getDbConnect()));
	}

	// если есть, то извлекаем из БД данные
	$rows = mysqli_num_rows($result);
	$articles = array();
	if (!$rows) {
		return $articles;
	}

	//Формируем массив из полученных данных
	while ($row = mysqli_fetch_assoc($result)) {
		$articles[] = $row;
	}
	return array($articles);
}

// получить конкретную статью
function articles_get($id_article)
{
		// Подготовка
		$id_article=(int)$id_article;

		//Запрос
		$sql="SELECT * FROM `Lesson2` WHERE `id`='$id_article'";

		//Выполняем запрос в БД
		$request=mysqli_query(getDbConnect(),$sql);

		//Формируем массив из полученных данных
		$article=array();
		While ($row=mysqli_fetch_assoc($request)) {
			$article[]=$row;
		}
		return array($article);
}

// добавить статью
function articles_new($name, $date, $content)
{
	// Подготовка
	$name = trim($name);
	$content = trim($content);

	//Безопасность данных от иньекций
	$name = sql_escape($name);
	$content = sql_escape($content);

	// Проверка
	if ($name == '') {
		return false;
	}

	// Запрос
	$sql = "INSERT INTO `lesson2` (`date`, `name`,`content`) VALUES ('$date','%s', '%s')";

	//выполняем запрос
	$query = sprintf($sql, sql_escape($name), sql_escape($content));
	$result = mysqli_query(getDbConnect(), $query);

	if (!$result) {
		die(mysqli_error(getDbConnect()));
	}
	return true;
}

// изменить статью
function articles_edit($id_article, $name, $content)
{
	//Безопасность данных от иньекций
	$id_article=(int)($id_article);
	$name = sql_escape($name);
	$content = sql_escape($content);


	//Запрос в бд
	$request="UPDATE `lesson2` SET `name`='$name', `content`='$content' WHERE `id`='$id_article'";

	//Выполняем запрос
	mysqli_query(getDbConnect(),$request);
}

// удаление статьи
function articles_delete($id_article)
{
	//Безопасность данных от иньекций
	$id_article=(int)($id_article);

	//Запрос
	$sql="DELETE FROM `lesson2` WHERE `id` = $id_article";

	//Выполняем запрос
	mysqli_query(getDbConnect(),$sql);

}

// короткое описание статьи
function articles_intro($article)
{
	// TODO
	// $article - это ассоциативный массив, представляющий статью
}

// Подключение шаблона.
function template($fileName, $vars = array())
{
	// Устанавливаем переменные из массива в шаблон
	extract($vars);

	// Генерация HTML в строку.
	ob_start();
	include $fileName;
	return ob_get_clean();
}
