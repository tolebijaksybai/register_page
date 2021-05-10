<?php
session_start();

$email = $_SESSION['email'] = $_POST['email'];
$password = $_SESSION['password'] = $_POST['password'];

require_once "functions.php";

if (!autorization($email, $password)) {
	autorization($email, $password);
}
redirect_to("users.php");
exit();
