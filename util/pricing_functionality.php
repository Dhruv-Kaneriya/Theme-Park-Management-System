<?php

session_start();

include "../Database/db_conn.php";

if (isset($_POST['select_ride']) && isset($_POST['adult_price']) && isset($_POST['child_price'])) {


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

    $select_ride = validate($_POST['select_ride']);

    $adult_price = validate($_POST['adult_price']);

    $child_price = validate($_POST['child_price']);




    $sql = "UPDATE ride_list
    SET adult_price = $adult_price, child_price= $child_price
    WHERE ride_id = $select_ride;";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../pricing.php?status=Record updated successfully");
    } else {
        header("Location: ../pricing.php?error=" . $conn->error);
    }
} else {
    header("Location: ../pricing.php?error=unexpected error");
}
