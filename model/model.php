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

		logs($id_article, "article");

		//Запрос
		$sql="SELECT * FROM `Lesson2` WHERE `id`=$id_article";

		//Выполняем запрос в БД
		$request=mysqli_query(getDbConnect(),$sql);

		//Формируем массив из полученных данных
		$search=array();
		While ($row=mysqli_fetch_assoc($request)) {
			$search[]=$row;
		}
		return array($search);
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

	logs($name, "new");

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

	logs($id_article, "edit");

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

	logs($id_article, "del");

	//Выполняем запрос
	mysqli_query(getDbConnect(),$sql);

}

// короткое описание статьи
function articles_intro($article)
{
	// TODO
	// $article - это ассоциативный массив, представляющий статью
}

//Делаем логи
function logs($log, $value) {
	switch($value) {
		case "article":
			$f = fopen('log/log-article.txt', 'a+');
			$time = date('H:i:s');
			fputs($f, "Пользователь просмотрел статью c id: ".$log." в $time \n");
			fclose($f);
			break;
		case "new":
			$f = fopen('log/log-new.txt', 'a+');
			$time = date('H:i:s');
			fputs($f, "Пользователь создал статью с именем ".$log." в $time \n");
			fclose($f);
			break;
		case "edit":
			$f = fopen('log/log-edit.txt', 'a+');
			$time = date('H:i:s');
			fputs($f, "Пользователь редактировал статью с id ".$log." в $time \n");
			fclose($f);
			break;
		case "del":
			$f = fopen('log/log-del.txt', 'a+');
			$time = date('H:i:s');
			fputs($f, "Пользователь удалил статью с id ".$log." в $time \n");
			fclose($f);
			break;
	}
}