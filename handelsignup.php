<?php
include 'connection.php';

$emailerror = "";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password= $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $existSql = "select * from `users` where email='$email'";
    $res = mysqli_query($con,$existSql);
    $numrow= mysqli_num_rows($res);
    if($numrow>0){
        $emailerror = "Email already exist";
    }else{
        if($password==$cpassword){
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `email`, `password`) VALUES ('$email', '$hash')";
            $result = mysqli_query($con,$sql);
            if($result){
                header("Location:/CwhPhpIdiscussProject/index.php?signupsuccess=true");
                exit();
            }
        }else{
            $emailerror = "two password not match.";
        }

    }
    header("Location: /CwhPhpIdiscussProject/index.php?signupsuccess=false&error=$emailerror");

    
}


?>