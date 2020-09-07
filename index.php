<?php 
session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Portal Home Page</title>
<!-- Bootstrap Core CSS -->


<!-- Customizable CSS -->



<!-- Demo Purpose Only. Should be removed in production -->

<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<style>
.carousel-item img{
    height:300px;
}
</style>




</head>
<body>
    <header>
     <?php include('includes/header.php');?>
    </header>
    <div class="body-content">
	    <div class="container">
          <div class="furniture-container homepage-container">  
		    <div class="row">
		
			    <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
			
	                <?php include('includes/side-menu.php');?>

			    </div>
			
			    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
				
			
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./assets/images/sliders/slider1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/images/sliders/slider2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/images/sliders/slider3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                </div>
            </div>
         </div> 
        </div>
    </div>


    
    
 

</body>
     <footer>
     <?php include('includes/footer.php');?>
    </footer>

</html>