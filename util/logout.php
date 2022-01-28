<?php 

session_start();
session_unset();
session_destroy();

if (isset($_COOKIE['uname'])) {
    unset($_COOKIE['uname']);
    setcookie('uname', '', time() - 3600, '/'); // empty value and old timestamp
}
if (isset($_COOKIE['upass'])) {
    unset($_COOKIE['upass']);
    setcookie('upass', '', time() - 3600, '/'); // empty value and old timestamp
}

header("Location: ../index.php");
exit();


?>