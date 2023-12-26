<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Php Project</title>
  </head>
  <body>
    

    <?php
    if(isset($_GET['signupsuccess'])){ 
      if(($_GET['signupsuccess'])==true){ ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Sign Up successfull......</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
   <?php }} 

if(isset($_GET['login'])){ 
  if(($_GET['login'])==true){ ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Login successfull......</strong> 
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php }} 
    
    include 'component/nav.php' ?>
    <?php include 'connection.php' ?>


    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/random?hdimages" height="300px" class="d-block w-100" alt="..." >
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/random?buildings" height="300px" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/user/wsanter" height="300px" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <div class="container">
    <h1 class="text-center">Category</h1>
    <div class="row">
        
    <?php 
      $sql = "SELECT * FROM `category`" ;
   $result = mysqli_query($con,$sql); 
   while($row = mysqli_fetch_assoc($result)) { 
      $id = $row['id']; 
      $category_name = $row['category_name'];
      $category_description = $row['category_description'];
      
      ?>
    <div class="col-md-4 my-3">
            <div class="card" style="width: 18rem;">
                <img src="https://source.unsplash.com/random?<?php echo $row['category_name'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['category_name'] ?></h5>
                    <p class="card-text"><?php echo $row['category_description'] ?></p>
                    <a href="threads.php?id=<?php echo $id ?>" class="btn btn-primary">View Threads</a>
                </div>
            </div>
        </div>

<?php  } ?>
       

       
    </div>
    </div>

    



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