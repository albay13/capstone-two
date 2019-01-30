<?php
session_start();
date_default_timezone_set('Asia/Singapore');
include 'classes/main.class.php';
include 'classes/login.class.php';
include 'database/db.php';

global $con;
$main = new main($con);
$login = new login($con);
DEFINE("base_url","http://localhost/it_help_desk/");
?>