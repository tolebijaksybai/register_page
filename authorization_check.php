<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

require_once "functions.php";


function autorization($email, $password)
{
	if (!get_user($email)) {
		set_flash_message("danger", "Такого ползователя не найдено");
		redirect_to("page_login.php");
		exit();
	} else if (!get_password_check(get_user($email), $password)) {
		set_flash_message("danger", "Пароль не верный");
		redirect_to('page_login.php');
		exit();
	} else {
		$_SESSION["user"] = $email;
		redirect_to("users.php");
		exit();
	}
}

autorization($email, $password);
