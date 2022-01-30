<?php

if(isset($_SESSION['role_name']))
{
    $role = $_SESSION['role_name'];
    if($role != 'ADMIN'){
        header("Location: dashboard.php");
        exit();
    }
}

?>