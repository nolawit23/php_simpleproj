<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$user = $_SESSION['username'];
$sid = session_id();
$time = time();
$actual = date('d M Y @ H:i:s', $time);
session_start();
session_destroy();
include("connection.php");	 

header('location:index.php');
mysql_close();
?>