<?php

session_start();

include "../Database/db_conn.php";

if (isset($_POST['first_name']) && isset($_POST['email_id']) && isset($_POST['last_name']) && isset($_POST['password']) && isset($_POST['user_role'])) {


    function validate($data)
    {

        if (!($data)) {
            return 0;
        }

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    $first_name = validate($_POST['first_name']);

    $email_id = validate($_POST['email_id']);

    $last_name = validate($_POST['last_name']);

    $password = password_hash(validate($_POST['password']), PASSWORD_DEFAULT);

    $user_role = validate($_POST['user_role']);


    $sql = "INSERT INTO `users` (`firstname` , `lastname` , `email` , `password` ,`type`) VALUES('$first_name','$last_name','$email_id','$password',$user_role)";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../addstaff.php?status=Record inserted successfully");
    } else {
        header("Location: ../addstaff.php?error=" . $conn->error);
    }
} else {
    header("Location: ../addstaff.php?error=unexpected error");
}
?>