<?php

session_start();

include "../Database/db_conn.php";
if (isset($_POST['row'])) {
    $sql = "DELETE FROM ride_list where ride_id=".$_GET['ride_id'];
    $mysqli->query($sql);
    echo 'Deleted successfully.';
}


?>