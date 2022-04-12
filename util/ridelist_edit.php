<?php

include "../Database/db_conn.php";
if (isset($_POST['ride_id'])) {
    $sql = "SELECT * FROM ride_list WHERE ride_id='$_POST[ride_id]'";
    $data = mysqli_query($conn, $sql);
    $ride_list = [];
    if ($data->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($data)) {
            $ride_list = [
                "ride_name" => $row['ride_name'],
                "ride_description" => $row['ride_description']
            ];
        }
    }
    echo json_encode($ride_list);
} else {
    echo "Error";
}
