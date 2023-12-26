

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  
  


  <?php include 'component/nav.php' ?>
    <?php include 'connection.php' ?>

<?php 


$thid = $_GET['id'];
$sql2 = "select * from `threads`  WHERE `threads`.`thread_id` = $thid";
$res2 = mysqli_query($con,$sql2);
while($row = mysqli_fetch_assoc($res2)) { ?>

<div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"> <?php echo $row['thread_title'] ?> </h1>
            <h4>About The Problem</h4>
            <p> <?php echo $row['thread_desc'] ?></p>
            
            <hr class="my-4">
            <a href="" class="btn btn-primary btn-lg" role="button">More...</a>
        </div>
    </div>

<?php } ?>

<h4 class="text-center">Users Answers :</h4>
<?php 
$sqll = "select * from `comments`  WHERE `thread_id` = $thid";
$result = mysqli_query($con,$sqll);
 while($row = mysqli_fetch_assoc($result)){ ?>
<div class="container my-4">
        <div class="jumbotron">
        <?php 
        $uid = $row['comment_by'];
      $sql = "select email from `users`  WHERE `id` = $uid";
      $resu= mysqli_query($con,$sql);
       $ro= mysqli_fetch_assoc($resu);
       ?>
         <h6> Comment By : <h6> <?php echo  $ro['email']; ?>
          
            <h6 class="display-4"> <?php echo $row['comment_content'] ?> </h6>
            <hr class="my-4">
            
        </div>
    </div>
<?php
}
?>



 <?php 
  if(isset($_SESSION['login']) && $_SESSION['login']==true){ ?>


<div class="container">
    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
     
      <div class="form-floating">
      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="comments"></textarea>
      <label for="floatingTextarea2">Comment</label>
      
    </div>
      <button type="submit" class="btn btn-primary">Post a comment</button>
    </form>
           
    </div>

 <?php }else{ ?>
 <h1 class="text-center">You Need to Login to Start Discussion.</h1>
 <?php }
 ?>



 
  
    <?php 
     if($_SERVER['REQUEST_METHOD']=='POST'){
      $comments = $_POST['comments'];
     
     $uid= $_SESSION['id'];
      $sql4 = "INSERT INTO `comments` ( `comment_content`, `comment_by`, `thread_id`) VALUES ( '$comments', '$uid', '$thid');";
      $resultcomment = mysqli_query($con,$sql4);
        if($resultcomment){
          // echo "comment Posted.";
        }
     }
    ?>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>










