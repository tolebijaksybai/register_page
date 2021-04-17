<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

require_once "functions.php";

if (!empty(get_email($email))) {
	set_flash_message("danger", "Этот эл. адрес уже занят другим пользователем.");
	redirect_to("page_register.php");
	exit();
}

if (add_user($email, $password)) {
	set_flash_message("success", "Регистрация успешна.");
	redirect_to("page_login.php");
	exit();
}
