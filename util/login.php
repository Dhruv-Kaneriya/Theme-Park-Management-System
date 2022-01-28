<?php 

session_start(); 

include "../Database/db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
    
    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $upass = validate($_POST['password']);


        $sql = "SELECT * FROM users WHERE email='$uname' AND password='$upass'";
      


        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_array($result);

            if ($row['email'] === $uname && $row['password'] === $upass) {

                echo "Logged in!";

                

                $_SESSION['firstname']=$row['firstname'];

                $_SESSION['id'] = $row['id'];

                $remember=$_POST['remember'];
                if($remember==1)
                {
                    setcookie('uname',$uname,time()+60*60*24,"/");
                    setcookie('upass',$upass,time()+60*60*24,"/");
                    header("Location: ../dashboard.php");
                }
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