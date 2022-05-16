<?php 

session_start();

unset($_SESSION["admin_login"]);
unset($_SESSION["admin_password"]);

header("Location: /content.php");