<?php

session_start();

include "../Database/db_conn.php";

if (isset($_POST['ride_name']) && isset($_POST['ride_description']) && isset($_POST['adult_price']) && isset($_POST['child_price'])) {

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

    $adult_price = validate($_POST['adult_price']);

    $child_price = validate($_POST['child_price']);


    $sql = "INSERT INTO `ride_list` (`ride_name` , `ride_description` , `adult_price` , `child_price`) VALUES('$ride_name','$ride_description',$adult_price,$child_price)";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../addrides.php?status=Record inserted successfully");
    } else {
        header("Location: ../addrides.php?error=" . $conn->error);
    }
} else {
    header("Location: ../addticket.php?error=unexpected error");
}
?>