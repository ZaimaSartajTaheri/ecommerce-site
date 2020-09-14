<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 
<style>
.search-bar{
  width:30vw !important;
  border-top-right-radius:0!important;
  border-bottom-right-radius:0!important;
}
.search-bar:focus {
    outline: none !important;
    box-shadow: 0 0 0 #e60000;
}
.search-bar,.navbar-toggler{
  border:2px solid #cc0000!important;
}
.search-button{
  border-top-left-radius:0!important;
  border-bottom-left-radius:0!important;
  background-color:#cc0000!important;
  color:white!important;
}
.search-button:hover{
  background-color:#e60000;
  color:white;
}
.navbar-brand,.nav-link{
  color:#cc0000!important;
}
.nav-link:hover{
  color:#e60000!important;
  transform:scale(1.1);
}
.nav-link{
  font-size:15px;
}
.navbar-toggler-icon {
  background-image: url( "data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(204, 0, 0, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E")!important; 
}
.logo{
  
}

</style>
  

</head>
<body>


<div class="container">
<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand mr-3" href="index.php"><img class="logo" src="../logo.jpg" alt=""/></a>
  <button class="navbar-toggle navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 mr-auto my-lg-0">
      <input class="form-control search-bar" type="search" placeholder="Search" aria-label="Search">
      <button class="btn my-2 my-sm-0 search-button" type="submit"><i class="fas fa-search"></i></button>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
      </li>
      

      
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-heart"></i>  Wishlist</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-store"></i>  Sell</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-truck"></i>  Track Order</i></a>
      </li>
      <?php if(strlen($_SESSION['login']))
    {   ?>
    <li><a class="nav-link" href="my-account.php"><i class="icon fa fa-user"></i> <?php echo htmlentities($_SESSION['username']);?></a></li>
				<?php } ?>

      <?php if(strlen($_SESSION['login'])==0)
    {   ?>
<li class="nav-item">
        <a class="nav-link" href="SignupLogin.php"><i class="fas fa-user"></i>
        
        Account</a>
      </li>
<?php }
else{ ?>
	
				<li><a class="nav-link" href="logout.php"><i class="icon fa fa-sign-out"></i>Logout</a></li>
				<?php } ?>	
				</ul>
			</div>
    </ul>
  </div>
</nav>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/6ad32c1b9a.js" crossorigin="anonymous"></script>

  
</body>
</html>
