<?php
include 'connection.php';

$emailerror = "";
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $email = $_POST['email'];
    $password= $_POST['password'];
    
    $existSql = "select * from `users` where `email`='$email'";
    $res = mysqli_query($con,$existSql);
    
    $numrow= mysqli_num_rows($res);
    if($numrow>0){
       $row = mysqli_fetch_assoc($res);
       session_start();
       $_SESSION['login'] = true;
       $_SESSION['email'] = $row['email'];
       $_SESSION['id'] = $row['id'];
      
      
    }
    header("Location: /CwhPhpIdiscussProject/index.php");
    
   
}



?>