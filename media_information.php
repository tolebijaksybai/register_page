<?php
session_start();
require_once "functions.php";

$id  = $_POST['id'];

$image = $_FILES['img_src'];
$imageName =  $image['name'];
$imageTmpName = $image['tmp_name'];

$img_src = "img/demo/avatars/" . time() . $imageName;
move_uploaded_file($imageTmpName,  $img_src);
upload_image($id, $img_src);

set_flash_message("success", "Профиль успешно обновлен");
redirect_to("users.php");
exit();
