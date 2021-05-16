<?php
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
		return true;
	}
}

function get_password_check($result,  $password)
{
	$password_hash = password_verify($password, $result['password']);
	return $password_hash;
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

	$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
	$stmt->execute([':username' => $email]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	return $result["id"];
}

function edit_information($id, $work, $phone, $address)
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');
	$stmt = $pdo->prepare("UPDATE `users` SET `work`=:work,`phone`=:phone,`address`=:address WHERE id=:id");
	$stmt->execute([
		":work" => $work,
		':phone' => $phone,
		':address' => $address,
		':id' => $id
	]);

	return true;
}

function edit_info($id, $fullname, $work, $phone, $address)
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');
	$stmt = $pdo->prepare("UPDATE `users` SET `fullname`=:fullname,`work`=:work,`phone`=:phone,`address`=:address WHERE id=:id");
	$stmt->execute([
		":fullname" => $fullname,
		":work" => $work,
		':phone' => $phone,
		':address' => $address,
		':id' => $id
	]);

	return true;
}

function set_status($id, $status)
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');
	$stmt = $pdo->prepare("UPDATE users SET status =:status WHERE id = :id");
	$stmt->execute([
		':status' => $status,
		':id' => $id
	]);

	return true;
}

function upload_image($id, $img_src)
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');
	$stmt = $pdo->prepare("UPDATE users SET img_src =:img_src WHERE id = :id");
	$stmt->execute([
		':img_src' => $img_src,
		':id' => $id
	]);

	return true;
}

function add_social_links($telegram, $instagram, $vk, $id)
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');
	$stmt = $pdo->prepare("UPDATE users SET telegram =:telegram, instagram=:instagram, vk=:vk WHERE id = :id");
	$stmt->execute([
		':telegram' => $telegram,
		':instagram' => $instagram,
		':vk' => $vk,
		':id' => $id
	]);

	return true;
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
	unset($_SESSION["$session"]);
}

function get_users()
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');

	$stmt = $pdo->prepare("SELECT * FROM users");
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}

function get_user($email)
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');

	$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
	$stmt->execute([':username' => $email]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	return $result;
}

function get_user_by_id($id)
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');

	$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
	$stmt->execute([':id' => $id]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	return $result;
}
function get_id_by_email($email)
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');

	$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
	$stmt->execute([':username' => $email]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	return $result["id"];
}
function is_author($logger_user_id, $edit_user_id)
{
	$pdo = new PDO('mysql:host=localhost;dbname=homework-2', 'root', 'root');

	$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
	$stmt->execute([':id' => $logger_user_id]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	if ((int)$result["id"] === $edit_user_id) {
		return true;
	}
}
