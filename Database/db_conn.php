<?php

require_once realpath($_SERVER['DOCUMENT_ROOT'] . "/Theme-Park-Management-System/vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'] . "/Theme-Park-Management-System");
$dotenv->load();

$sname = $_ENV['db_server_name'];

$unmae = $_ENV['db_username'];

$password = $_ENV['db_password'];

$db_name = $_ENV['db_name'];

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";
}
