<?php

include "../Database/db_conn.php";
if (isset($_POST['user_id'])) {
    $sql = "SELECT * FROM users WHERE id='$_POST[user_id]'";
    $data = mysqli_query($conn, $sql);
    $ride_list = [];
    if ($data->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($data)) {
            $ride_list = [
                "first_name" => $row['firstname'],
                "email" => $row['email'],
                "role" => $row['type']
            ];
        }
    }
    echo json_encode($ride_list);
} else {
    echo "Error";
}
