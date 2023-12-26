<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Php Project</title>
    <style>
     .jumbotron{
      background-color: aqua;
     }

    </style>
  </head>
  <body>
    

    <?php include 'component/nav.php' ?>
    <?php include 'connection.php' ?>


    

       <?php
       if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from `category`  WHERE `category`.`id` = $id";
        $res = mysqli_query($con,$sql);
       
        while($row = mysqli_fetch_assoc($res)) { ?>

    <div class="container my-4" >
        <div class="jumbotron">
            <h1 class="display-4">Welcome To <?php echo $row['category_name'] ?>  Forum</h1>
            
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, mollitia! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae magni iusto obcaecati debitis quaerat necessitatibus labore sint, deserunt exercitationem dolores dignissimos, autem dolore blanditiis voluptatem. Molestias similique adipisci harum aliquid!</p>
            <hr class="my-4">
            <h4>Description</h4>
            <p> <?php echo $row['category_description'] ?></p>
            <a href="" class="btn btn-primary btn-lg" role="button">More...</a>
        </div>
    </div>


     <?php
     } ?>
       <div class="container">
        <h1 class="py-4">Browse Questions.</h1>
        
     <?php
     $sql2 = "select * from `threads`  WHERE `threads`.`thread_cat_id` = $id";
     $res2 = mysqli_query($con,$sql2);
     $formu = false;
     while($row2 = mysqli_fetch_assoc($res2)) { 
        $formu = true; 
        $uid = $row2['thread_user_id'];
        ?>
     
     <div class="media my-3">
          <h5>Question </h5>
          <h6> <a href="phpthread.php?id=<?php echo $row2['thread_id'] ?>"> <?php echo $row2['thread_title'] ?> </a> </h6>
            <div class="media-body">
            <p class="mt-0">    <?php echo $row2['thread_desc'] ?>           </p>
              <?php 
              $sqlll = "select  `email` from `users` WHERE `users`.`id` = $uid";
             $re= mysqli_query($con,$sqlll); 
              while($ro = mysqli_fetch_assoc($re)){?>
                <p class="mt-0">    Asked By :  <?php echo $ro['email'] ?> </p>
             <?php }
              ?>
            
            </div>
        </div>

    <?php } ?>
  
  <?php  if(!$formu){ ?>
        <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">No Question yet</h1>
            <hr class="my-4">
            <p> </p>
        </div>
    </div>
   <?php }
 }?>

<h5 class="text-center">Ask Your Questions ?</h5>

<div class="container">
    
<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
  <div class="mb-3">
    <label for="question" class="form-label">Question Title</label>
    <input type="text" class="form-control" id="question" aria-describedby="emailHelp" name="title">
  </div>
  <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="desc"></textarea>
  <label for="floatingTextarea2">Question</label>
</div>
  <button type="submit" class="btn btn-primary">Ask Question ?</button>
</form>
       
</div>



    </div>

    <?php 
     if($_SERVER['REQUEST_METHOD']=='POST'){
      $th_title = $_POST['title'];
      $th_desc = $_POST['desc'];
      session_start();
      $uid = $_SESSION['id'];
      echo $_SESSION['id'];
      $sql3 = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ( '$th_title', '$th_desc', '$id', '$uid');";
      $result = mysqli_query($con,$sql3);
        if($result){
          echo "Question Posted.";
          echo $uid;
        }
     }
    ?>



    <?php include 'component/footer.php'?>







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










   



