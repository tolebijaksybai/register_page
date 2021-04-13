<?php

function get_email_check($email)
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');

	$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
	$stmt->execute([':username' => $email]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	return $result;
}

function redirect_to($url)
{
	header("Location: {$url}");
}

function set_flash_message($name, $message)
{
	$_SESSION[$name] = $message;
}

function add_user($email, $password)
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');
	$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
	$stmt->execute([
		':username' => $email,
		':password' => password_hash($password, PASSWORD_DEFAULT)
	]);

	return $stmt;
}
function display_flash_message($name)
{
	if (isset($name) || $name !== "") {
		$message = "<div class='alert alert-{$name} text-dark' role='alert'>
					<strong>Уведомление! </strong> {$_SESSION[$name]}
				</div>";

		unset($_SESSION[$name]);
		return $message;
	}
}
