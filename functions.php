<?php

function get_password_check($result,  $password)
{
	$password_hash = password_verify($password, $result['password']);

	return $password_hash;
}


function get_user($email)
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
	$stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password,:role)");
	$stmt->execute([
		':username' => $email,
		':password' => password_hash($password, PASSWORD_DEFAULT),
		':role' => "user"
	]);

	return $stmt;
}

function display_flash_message($name)
{
	if (isset($_SESSION[$name])) {
		$message = "<div class='alert alert-{$name} text-dark' role='alert'>
					<strong>Уведомление! </strong> {$_SESSION[$name]}
				</div>";

		unset($_SESSION[$name]);
		return $message;
	}
}


function is_not_logged()
{
	if (!isset($_SESSION['user'])) {
		redirect_to('page_login.php');
		exit();
	}
}

function is_admin($email)
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');

	$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
	$stmt->execute([':username' => $email]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($result['role'] == 'admin') {
		return $result;
	}

	return false;
}

function delate_session($session)
{
	unset($_SESSION[$session]);
}


function get_users()
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');

	$stmt = $pdo->prepare("SELECT * FROM users");
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}
