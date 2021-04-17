<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

require_once "functions.php";

if (!get_email($email)) {
	set_flash_message("danger", "Такого ползователя не найдено");
	redirect_to("page_login.php");
	exit();
} else if (!get_password_check(get_email($email), $password)) {
	set_flash_message("danger", "Пароль не верный");
	redirect_to('page_login.php');
	exit();
} else {
	set_flash_message("success", "Профиль успешно обновлен.");
	redirect_to("users.php");
	exit();
}
