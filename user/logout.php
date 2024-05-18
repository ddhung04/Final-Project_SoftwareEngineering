<?php
session_start();
ob_start();

session_unset();
session_destroy(); // destroy session
header("location:../index.php");
?>
