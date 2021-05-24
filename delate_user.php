<?php
session_start();
require_once "functions.php";

$email = $_SESSION['email'];
$password = $_SESSION['password'];

$delate_id = (int)$_GET["delate_id"];

if (!autorization($email, $password)) {
	redirect_to('page_login.php');
	exit();
}

$logger_user_id = (int)get_id_by_email($email);

if (!is_admin($email)) {
	if (!is_author($logger_user_id, $delate_id)) {
		set_flash_message("danger", "Можно редактировать только свой профиль");
		redirect_to("users.php");
		exit();
	}
}

// Получаю путь картинку 
$img_src = get_user_by_id($delate_id)['img_src'];

if ($delate_id !== $logger_user_id) {
	// Удаляет ползователя и картинку
	delate($delate_id, $img_src);
	set_flash_message("success", "Пользователь удален");
	redirect_to("users.php");
	exit();
}

// Удаляет себе и картинку
delate($delate_id, $img_src);

session_destroy();
redirect_to("page_login.php");
exit();