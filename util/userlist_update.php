<?php
include "../Database/db_conn.php";

if (isset($_POST['first_name']) && isset($_POST['email']) && isset($_POST['user_id']) && isset($_POST['password']) && isset($_POST['user_role'])) {


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

    $email = validate($_POST['email']);

    $user_id = validate($_POST['user_id']);

    $password = password_hash(validate($_POST['password']), PASSWORD_DEFAULT);

    $user_role = validate($_POST['user_role']);

    $sql = "UPDATE users SET firstname='$first_name', email='$email',password='$password', type='$user_role' WHERE id = $user_id";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        header("Location: ../stafflist.php?status=Record updated successfully");
    } else {
        header("Location: ../stafflist.php?error=" . $conn->error);
    }
} else {
    header("Location: ../stafflist.php?error=unexpected error");
}
