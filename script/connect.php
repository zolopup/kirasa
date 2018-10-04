<?php /* Соединяемся с базой данных */
$hostname = "185.84.108.18"; // название/путь сервера, с MySQL
$username = "u118797"; // имя пользователя 
$password = "ghjafy88"; // пароль пользователя
$dbName = "b118797_test"; // название базы данных
 /* Таблица MySQL, в которой будут храниться данные */
$table = "page";
$users_on_page="1";
 /* Создаем соединение */
mysql_connect($hostname, $username, $password) or die ("Сайт временно не доступен, попробуйте загрузить через минуту");
 /* Выбираем базу данных. Если произойдет ошибка - вывести ее */
mysql_select_db($dbName) or die (mysql_error());
mysql_query("set character_set_client='utf8'");
mysql_query("set character_set_results='utf8'");
mysql_query("set collation_connection='utf8_general_ci'");
?>