<?php
session_start();
require_once "functions.php";

$id  = $_POST['id'];
$image = $_FILES['img_src'];

upload_image($id, $image);

set_flash_message("success", "Профиль успешно обновлен");
redirect_to("users.php");
exit();
