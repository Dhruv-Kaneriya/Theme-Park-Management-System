<?php

session_start();

include "../Database/db_conn.php";

$id=$_GET['id'];
 
    $query= "DELETE FROM users WHERE id='$id' ";
    $data=mysqli_query($conn,$query);
    if($data) 
    {
        echo "<script>alert('Record deleted successfully')</script>";
        ?>

        <meta http-equiv="refresh" content="0;url=http://localhost/tpms/rideslist.php"/>
       
       <?php

    }
    else{
        echo "<script>alert('Failed to Delete')</script>";
    }
?>