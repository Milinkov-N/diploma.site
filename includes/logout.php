<?php 

session_start();

unset($_SESSION["login"]);
unset($_SESSION["password"]);
unset($_SESSION["admin_login"]);
unset($_SESSION["admin_password"]);
unset($_SESSION["vk_user_id"]);
unset($_SESSION["name"]);
unset($_SESSION["surname"]);
unset($_SESSION["access_token"]);
unset($_SESSION["uid"]);
unset($_SESSION["email"]);
unset($_SESSION["group"]);

// unset($_SESSION);

header("Location: /index.php");