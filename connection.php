


<?php 
$servername="localhost";
$username="root";
$password="";
$database="CwhPhpIdiscussProject";

$con=mysqli_connect($servername,$username,$password,$database);
if($con){
    // echo "conection successfull";
}else{
    die("not connected".mysqli_connect_error());
}
?>