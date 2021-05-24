<?php
session_start();
require_once "functions.php";

$fullname  = $_POST['fullname'];
$work = $_POST['work'];
$phone = $_POST['phone'];
$address  = $_POST['address'];

$add_email =  $_POST['add_email'];
$add_password  = $_POST['add_password'];
$status = $_POST['status'];

$image = $_FILES['img_src'];

$telegram  = $_POST['link_vkontakte'];
$instagram = $_POST['link_telegram'];
$vk = $_POST['link_instagram'];

if (!empty(get_user($add_email))) {
	set_flash_message("danger", "Этот эл. адрес уже занят другим пользователем.");
	redirect_to("create_user.php");
	exit();
}

$id = add_user($add_email, $add_password);
edit_information($id, $work, (int)$phone, $address);
set_status($id, $status);

// Загружаю картинку в папку avatars и сохраняю путь к Базу Данных
upload_image($id, $image);

add_social_links($telegram, $instagram, $vk, $id);

set_flash_message("success", "Ползователь успешна добавлен.");
redirect_to("users.php");
exit();
