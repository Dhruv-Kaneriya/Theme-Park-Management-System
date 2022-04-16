<?php
include "../Database/db_conn.php";

if (isset($_POST['ride_name']) && isset($_POST['ride_description']) && isset($_POST['ride_id'])) {


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

    $ride_name = validate($_POST['ride_name']);

    $ride_description = validate($_POST['ride_description']);

    $ride_id = validate($_POST['ride_id']);

    $sql = "UPDATE ride_list SET ride_name='$ride_name', ride_description='$ride_description' WHERE ride_id = $ride_id";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        header("Location: ../rideslist.php?status=Record updated successfully");
    } else {
        header("Location: ../rideslist.php?error=" . $conn->error);
    }
} else {
    header("Location: ../rideslist.php?error=unexpected error");
}
