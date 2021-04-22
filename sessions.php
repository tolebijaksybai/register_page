<?php
session_start();
session_destroy();

require_once "functions.php";

redirect_to('page_login.php');
