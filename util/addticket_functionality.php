<?php

session_start();

include "../Database/db_conn.php";

if (isset($_POST['customer_name']) && isset($_POST['select_ride']) && isset($_POST['no_child']) && isset($_POST['no_adult'])) {


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

    $customer_name = validate($_POST['customer_name']);

    $no_child = validate($_POST['no_child']);

    $no_adult = validate($_POST['no_adult']);

    $select_ride = $_POST['select_ride'];


    $sql = "INSERT INTO `tickets_list` (`customer_name` , `no_adult` , `no_child` , `ride_id`) VALUES('$customer_name',$no_adult,$no_child,'$select_ride')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../addticket.php?status=Record inserted successfully");
    } else {
        header("Location: ../addticket.php?error=" . $conn->error);
    }
} else {
    header("Location: ../addticket.php?error=unexpected error");
}
?>