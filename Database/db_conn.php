<?php

$sname = "bbbd0qmejtgmtiatmsds-mysql.services.clever-cloud.com";

$unmae = "unr9tbwqvpvohnns";

echo $_ENV['env_database_password'];

$password = $_ENV['env_database_password'];

$db_name = "bbbd0qmejtgmtiatmsds";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";
}
