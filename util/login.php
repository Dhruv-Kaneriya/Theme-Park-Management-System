<?php 

session_start(); 

include "../Database/db_conn.php";

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

if (isset($_POST['uname']) && isset($_POST['password'])) {
    
    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

        $sql = "SELECT * FROM users WHERE email='$uname' AND password='$pass'";
        // $sql = "SELECT * FROM users WHERE email='$uname'";
        debug_to_console($sql);

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];

                $_SESSION['firstname']=$row['firstname'];

                $_SESSION['id'] = $row['id'];

                header("Location: ../dashboard.php");

                exit();

            }else{

                header("Location: ../index.php?error=Incorrect User name or password other one");

                exit();

            }

        }else{

            header("Location: ../index.php?error=Incorrect User name or password");

            exit();

        }

    

}else{

    header("Location: ../index.php");

    exit();

}
?>