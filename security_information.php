<?php
session_start();
require_once "functions.php";

$id  = $_POST['id'];
$email  = $_POST['email'];
$password = $_POST['password'];

$email_my = $_SESSION['email'];

if ($email === $email_my) {
	edit_credentials($id, $email, $password);
} else {
	if (!empty(get_user($email))) {
		set_flash_message("danger", "Этот эл. адрес уже занят другим пользователем.");
		redirect_to("security.php");
		exit();
	}
	edit_credentials($id, $email, $password);
}

set_flash_message("success", "Профиль успешно обновлен");
redirect_to("users.php");
exit();
