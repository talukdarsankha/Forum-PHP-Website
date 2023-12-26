

<?php 
session_start(); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/CwhPhpIdiscussProject">Home</a>
        </li>
       <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="contact.php">Contact US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="category.php">Category</a>
        </li>
        
       
      </ul>
      <div class="col-md-6">
   <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>

<?php 
   if(isset($_SESSION['login']) && $_SESSION['login']==true){ ?>
      <div class="col-md-2">
<a href="/CwhPhpIdiscussProject/logout.php" class="btn btn-sm btn-info"  >Logout</a>
<a href="" class="btn btn-sm btn-success" >Welcome <?php echo $_SESSION['email'] ?></a>
</div>
  <?php }else{ ?>
<div class="col-md-2 my-4">
<a href="" class="btn btn-sm btn-info"  data-bs-toggle="modal"  data-bs-target="#exampleModallogin">Login</a>
<a href="" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalsignup">Sign Up</a>
</div>
 <?php }
?>
      
      
      
    </div>
  </div>
</nav>

 <?php include 'loginmodal.php'; ?>
 <?php include 'singupmodal.php'; ?>