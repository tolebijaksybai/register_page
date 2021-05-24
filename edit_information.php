<?php
session_start();
require_once "functions.php";

$id  = $_POST['id'];
$fullname  = $_POST['fullname'];
$work = $_POST['work'];
$phone = (int)$_POST['phone'];
$address  = $_POST['address'];

edit_info($id, $fullname, $work, $phone, $address);

set_flash_message("success", "Профиль успешно обновлен");
redirect_to("users.php");
exit();
