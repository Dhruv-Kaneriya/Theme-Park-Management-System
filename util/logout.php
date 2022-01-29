<?php 

session_start();
session_unset();
session_destroy();

if (isset($_COOKIE['__SECUREx_cookie'])) {
    unset($_COOKIE['__SECUREx_cookie']);
    setcookie('__SECUREx_cookie', '', time() - 3600, '/'); // empty value and old timestamp
}


header("Location: ../index.php");
exit();


?>