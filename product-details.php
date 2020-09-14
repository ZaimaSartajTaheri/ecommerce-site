<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			header('location:my-cart.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}
$pid=intval($_GET['pid']);
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','$pid')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

}
}
if(isset($_POST['submit']))
{
	$qty=$_POST['quality'];
	$price=$_POST['price'];
	$value=$_POST['value'];
	$name=$_POST['name'];
	$summary=$_POST['summary'];
	$review=$_POST['review'];
	mysqli_query($con,"insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Portal Home Page</title>
<!-- Bootstrap Core CSS -->


<!-- Customizable CSS -->
<style>
ul {
  margin: 0;
  padding: 0;
}
a {
  outline: none!important;
}
a:hover,
a:active,
a:focus {
  text-decoration: none;
}
.single-product .gallery-holder #owl-single-product .single-product-gallery-item img {
  width: 80%;
}
.single-product .gallery-holder .gallery-thumbs {
  margin: 15px 0 0;
  position: relative;
  text-align: left;
}
.single-product .gallery-holder .gallery-thumbs .owl-item .item {
  margin-right: 10px;
  border: 1px solid #e5e5e5;
}
.single-product .product-info .name {
  font-size: 20px;
  line-height: 18px;
  font-family: 'FjallaOneRegular';
  color: #555;
  margin-top: 5px;
}
.single-product .product-info .rating-reviews .reviews .lnk {
  color: #aaaaaa;
}
.single-product .product-info .stock-container .stock-box .label {
  font-size: 16px;
  font-family: 'FjallaOneRegular';
  line-height: 18px;
  text-transform: uppercase;
  color: #666666;
  padding: 0px;
  font-weight: normal;
}
.single-product .product-info .stock-container .stock-box .value {
  font-size: 14px;
  color: #ff7878;
}
.single-product .product-info .description-container {
  line-height: 20px;
  color: #666666;
}
.single-product .product-info .price-container {
  border-bottom: 1px solid #F2F2F2;
  border-top: 1px solid #F2F2F2;
  margin-bottom: 0;
  padding: 20px 0;
}
.single-product .product-info .price-container .price-box .price {
  font-size: 36px;
  font-weight: 700;
  line-height: 50px;
}
.single-product .product-info .price-container .price-box .price-strike {
  color: #aaa;
  font-size: 16px;
  font-weight: 300;
  line-height: 50px;
  text-decoration: line-through;
}
.single-product .product-info .quantity-container {
  border-bottom: 1px solid #F2F2F2;
  margin-bottom: 0;
  padding: 20px 0;
}
.single-product .product-info .quantity-container .label {
  font-size: 16px;
  font-family: 'FjallaOneRegular';
  line-height: 40px;
  text-transform: uppercase;
  color: #666666;
  padding: 0px;
  font-weight: normal;
}
.single-product .product-info .quantity-container .cart-quantity .quant-input {
  display: inline-block;
  height: 35px;
  position: relative;
  width: 70px;
}
.single-product .product-info .quantity-container .cart-quantity .quant-input .arrows {
  position: absolute;
  right: 0;
  top: 0;
  z-index: 2;
  height: 100%;
}
.single-product .product-info .quantity-container .cart-quantity .quant-input .arrows .arrow {
  box-sizing: border-box;
  display: block;
  text-align: center;
  width: 40px;
  cursor: pointer;
}
.single-product .product-info .quantity-container .cart-quantity .quant-input .arrows .arrow .ir .icon {
  position: relative;
}
.single-product .product-info .quantity-container .cart-quantity .quant-input .arrows .arrow .ir .icon.fa-sort-asc {
  top: 5px;
}
.single-product .product-info .quantity-container .cart-quantity .quant-input .arrows .arrow .ir .icon.fa-sort-desc {
  top: -7px;
}
.single-product .product-info .quantity-container .cart-quantity .quant-input input {
  background: none repeat scroll 0 0 #fff;
  border: 1px solid #f2f2f2;
  box-sizing: border-box;
  font-size: 15px;
  height: 35px;
  left: 0;
  padding: 0 20px 0 18px;
  position: absolute;
  top: 0;
  width: 70px;
  z-index: 1;
}
.single-product .product-info .product-social-link .social-label {
  font-size: 15px;
  font-family: 'FjallaOneRegular';
  line-height: 20px;
  text-transform: uppercase;
}
.single-product .product-info .product-social-link .social-icons {
  display: inline-block;
}
.single-product .product-info .product-social-link .social-icons ul li a {
  color: #888888;
  font-size: 16px;
  -webkit-transition: all 0.2s linear 0s;
  -moz-transition: all 0.2s linear 0s;
  -o-transition: all 0.2s linear 0s;
  transition: all 0.2s linear 0s;
  padding: 5px 6px;
}
.single-product .product-info .product-social-link .social-icons ul li a:hover,
.single-product .product-info .product-social-link .social-icons ul li a:focus {
  -webkit-border-radius: 50px;
  -moz-border-radius: 50px;
  border-radius: 50px;
  color: #fff;
}
.single-product .product-tabs {
  margin-top: 60px;
}
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell > li {
  float: none !important;
  border-bottom: 1px solid #f2f2f2;
}
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell > li > a {
  border: none;
  color: #555;
  display: block;
  padding: 12px 28px;
  font-size: 18px;
  font-family: 'FjallaOneRegular';
  line-height: 28px;
  text-transform: uppercase;
  position: relative;
}
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell > li > a:hover,
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell > li > a:focus {
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
  color: #fff;
}
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell > li > a:hover:before,
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell > li > a:focus:before {
  border-color: rgba(0, 0, 0, 0) #e0e0e0 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0);
  right: -10px;
}
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell > li > a:hover:after,
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell > li > a:focus:after {
  border-style: solid;
  border-width: 7.5px 1px 7.5px 10px;
  content: "";
  height: 0;
  position: absolute;
  top: 20px;
  width: 0;
  right: -8px;
}
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell > li.active > a {
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
  color: #fff;
}
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell > li.active > a:before {
  border-color: rgba(0, 0, 0, 0) #e0e0e0 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0);
  right: -10px;
}
.single-product .product-tabs .nav.nav-tabs.nav-tab-cell > li.active > a:after {
  border-style: solid;
  border-width: 7.5px 1px 7.5px 10px;
  content: "";
  height: 0;
  position: absolute;
  top: 20px;
  width: 0;
  right: -8px;
}
.single-product .product-tabs .tab-content {
  border: 1px solid #f2f2f2;
}
.single-product .product-tabs .tab-content .tab-pane {
  padding: 24px;
}
.single-product .product-tabs .tab-content .tab-pane .text {
  line-height: 20px;
}
.single-product .upsell-product .product .product-info .name {
  margin-top: 20px;
  font-size: 16px;
}
.single-product #owl-single-product-thumbnails .owl-controls {
  position: absolute;
  text-align: center;
  top: auto;
  width: 100%;
  margin-top: 10px;
}
.single-product #owl-single-product-thumbnails .owl-controls .owl-pagination .owl-page {
  display: inline-block;
}
.single-product #owl-single-product-thumbnails .owl-controls .owl-pagination .owl-page span {
  background: none repeat scroll 0 0 #ddd;
  border: medium none;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  display: block;
  height: 12px;
  margin: 0 5px;
  -webkit-transition: all 200ms ease-out 0s;
  -moz-transition: all 200ms ease-out 0s;
  -o-transition: all 200ms ease-out 0s;
  transition: all 200ms ease-out 0s;
  width: 12px;
  cursor: pointer;
}
.single-product{
  margin-top: 0px;
}
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder {
  background-color: #FFFFFF;
  height: 100%;
  position: absolute;
  top: 0;
  width: 30px;
  z-index: 50;
}
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder.left {
  left: 0px;
}
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder.right {
  right: 0;
}
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder .prev-btn {
  left: 0;
}
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder .prev-btn:after {
  content: "\f104";
}
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder .next-btn {
  right: 0px;
}
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder .next-btn:after {
  content: "\f105";
}
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder .prev-btn,
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder .next-btn {
  background-color: #fff;
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
  display: inline-block;
  height: 100%;
  position: absolute;
  vertical-align: top;
  width: 90%;
  z-index: 100;
  border: 1px solid #e5e5e5;
  color: #dadada;
}
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder .prev-btn:after,
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder .next-btn:after {
  bottom: 0;
  font-family: fontawesome;
  font-size: 30px;
  height: 30px;
  left: 0;
  line-height: 30px;
  margin: auto;
  position: absolute;
  right: 0;
  text-align: center;
  top: 0;
}
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder .prev-btn:hover,
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder .next-btn:hover,
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder .prev-btn:focus,
.cnt-homepage .single-product .single-product-gallery .gallery-thumbs .nav-holder .next-btn:focus {
  background: #dadada;
  color: #fff;
}
.cnt-homepage .single-product .single-product-gallery .owl-item .single-product-gallery-item > a > img {
  display: block;
  width: 100%;
}
.cnt-homepage .single-product .single-product-gallery .owl-item .single-product-gallery-thumbs.gallery-thumbs .owl-item {
  margin-left: 10px;
}
.cnt-homepage .single-product .product-info-block label,
.cnt-homepage .single-product .product-info-block .label {
  font-size: 13px;
  font-weight: normal;
  line-height: 30px;
  color: #434343 !important;
}
.cnt-homepage .single-product .product-info-block .label {
  padding: 0px;
}
.cnt-homepage .single-product .product-info-block .cart {
  width: auto;
  left: 0;
  margin-top: -8px;
  padding: 0px;
}
.cnt-homepage .single-product .product-info-block .cart .action .left {
  padding: 2px 8px;
  margin-left: 5px;
}
.cnt-homepage .single-product .product-info-block .form-control .selectpicker {
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
  -moz-box-shadow: none;
  -webkit-box-shadow: none;
  box-shadow: none;
  border: 1px solid #f1f1f1;
  background: #fff;
  color: #b0b0b0;
}
.cnt-homepage .single-product .product-info-block .form-control .dropdown-menu {
  -moz-box-shadow: none;
  -webkit-box-shadow: none;
  box-shadow: none;
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
  border: 1px solid #f1f1f1;
}
.cnt-homepage .single-product .product-info-block .form-control .dropdown-menu ul li a:hover,
.cnt-homepage .single-product .product-info-block .form-control .dropdown-menu ul li a:focus {
  background: rgba(0, 0, 0, 0);
}
.cnt-homepage .single-product .product-info-block .txt.txt-qty {
  font-size: 15px;
  line-height: 18px;
  border: 1px solid #f1f1f1;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  height: 30px;
  padding: 5px 10px;
  text-align: center;
  width: 60px;
}
.cnt-homepage .single-product .product-info-block .stock-container .stock-box .label {
  color: #434343;
  font-family: 'Roboto';
  font-size: 13px;
  font-weight: normal;
  line-height: 20px;
  padding: 0;
  text-transform: none;
}
.cnt-homepage .single-product .product-info-block .stock-container .stock-box .value {
  font-size: 13px;
}
.cnt-homepage .single-product .product-tabs .nav-tab-cell-detail li {
  margin-right: 10px;
  padding: 0;
}
.cnt-homepage .single-product .product-tabs .nav-tab-cell-detail li a {
  border: 2px solid #e1e1e1;
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
  color: #666666;
  font-family: 'FjallaOneRegular';
  font-size: 20px;
  line-height: 30px;
  padding-bottom: 4px;
  padding-top: 4px;
  text-transform: uppercase;
}
.cnt-homepage .single-product .product-tabs .nav-tab-cell-detail li a:hover,
.cnt-homepage .single-product .product-tabs .nav-tab-cell-detail li a:focus {
  color: #fff;
}
.cnt-homepage .single-product .product-tabs .nav-tab-cell-detail li.active a {
  color: #fff;
}
.cnt-homepage .single-product .product-tabs .tab-content {
  border: none;
}
.cnt-homepage .single-product .product-tabs .tab-content .tab-pane {
  padding: 0px;
}
.cnt-homepage .single-product .product-tabs .tab-content .tab-pane .product-tab .text {
  font-size: 13px;
  line-height: 22px;
}
.single-product .second-gallery-thumb.gallery-thumbs {
  padding: 0 40px;
}
.single-product .second-gallery-thumb.gallery-thumbs #owl-single-product2-thumbnails .owl-wrapper-outer {
  margin-left: 5px;
}
.product-tabs .tab-content .tab-pane .product-reviews .title {
  color: #666666;
  font-size: 16px;
  font-weight: 500;
  line-height: 20px;
  margin: 0 0 10px;
  text-transform: uppercase;
  font-family: 'FjallaOneRegular';
}
.product-tabs .tab-content .tab-pane .product-reviews .reviews .review {
  margin-bottom: 20px;
  font-family: 'Roboto', sans-serif;
  text-transform: none;
}
.product-tabs .tab-content .tab-pane .product-reviews .reviews .review .review-title {
  margin-bottom: 5px;
}
.product-tabs .tab-content .tab-pane .product-reviews .reviews .review .review-title .summary {
  color: #666666;
  font-size: 14px;
  font-weight: 300;
  line-height: 45px;
  margin-right: 10px;
  text-transform: uppercase;
}
.product-tabs .tab-content .tab-pane .product-reviews .reviews .review .review-title .date {
  font-size: 12px;
}
.product-tabs .tab-content .tab-pane .product-reviews .reviews .review .review-title .date span {
  margin-left: 5px;
}
.product-tabs .tab-content .tab-pane .product-reviews .reviews .review .text {
  line-height: 18px;
}
.product-tabs .tab-content .tab-pane .product-reviews .reviews .review .author span {
  margin-left: 5px;
}
.product-tabs .tab-content .tab-pane .product-add-review .title {
  color: #666666;
  font-size: 16px;
  font-weight: 500;
  line-height: 20px;
  margin: 0 0 20px;
  text-transform: uppercase;
  font-family: 'FjallaOneRegular';
}
.product-tabs .tab-content .tab-pane .product-add-review .review-table .table thead th {
  font-weight: normal;
  border-bottom-width: 1px;
  text-align: center;
  vertical-align: middle;
}
.product-tabs .tab-content .tab-pane .product-add-review .review-table .table tbody tr td {
  text-align: center;
  vertical-align: middle;
}
.product-tabs .tab-content .tab-pane .product-add-review .review-table .table tbody tr td input {
  float: none;
  margin: auto;
}
.product-tabs .tab-content .tab-pane .product-add-review .review-form label {
  font-weight: normal;
  font-size: 13px;
}
.product-tabs .tab-content .tab-pane .product-add-review .review-form label .astk {
  color: #FF0000;
  font-size: 12px;
}
.product-tabs .tab-content .tab-pane .product-add-review .review-form .txt {
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
  -moz-box-shadow: none;
  -webkit-box-shadow: none;
  box-shadow: none;
}


</style>



<!-- Demo Purpose Only. Should be removed in production -->

<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>





</head>
<body>
    <header>
     <?php include('includes/header.php');?>
    </header>

    
	
	
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product outer-bottom-sm '>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">


                    <?php include('includes/side-menu.php');?>
				</div>
	
            </div>


            <?php 
            $ret=mysqli_query($con,"select * from products where id='$pid'");
            while($row=mysqli_fetch_array($ret))
            {

            ?>


			<div class='col-md-9'>
				<div class="row  wow fadeInUp">
					<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">

                            <div id="owl-single-product">

                                <div class="single-product-gallery-item" id="slide1">
                                    <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['productName']);?>" href="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>">
                                    <img class="img-responsive" alt=""  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" width="370" height="350"/>
                                    </a>
                                </div>
							</div>
						</div>
                    </div>     			
                    <div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name"><?php echo htmlentities($row['productName']);?></h1>
                            <?php $rt=mysqli_query($con,"select * from productreviews where productId='$pid'");
                            $num=mysqli_num_rows($rt);
                            {
                            ?>		
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">(<?php echo htmlentities($num);?> Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->
                            <?php } ?>
							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-7">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-5">
										<div class="stock-box">
											<span class="value"><?php echo htmlentities($row['productAvailability']);?></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div>
                            <div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-7">
										<div class="stock-box">
											<span class="label">Product Brand :</span>
										</div>	
									</div>
									<div class="col-sm-5">
										<div class="stock-box">
											<span class="value"><?php echo htmlentities($row['productCompany']);?></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div>
                            <div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-7">
										<div class="stock-box">
											<span class="label">Shipping Charge :</span>
										</div>	
									</div>
									<div class="col-sm-5">
										<div class="stock-box">
											<span class="value"><?php if($row['shippingCharge']==0)
											{
												echo "Free";
											}
											else
											{
												echo htmlentities($row['shippingCharge']);
											}

											?></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div>

							<div class="price-container info-container m-t-20">
								<div class="row">
									<div class="col-sm-6">
										<div class="price-box">
											<span class="price">Rs. <?php echo htmlentities($row['productPrice']);?></span>
											<span class="price-strike">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="product-details.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist"><i class="fa fa-heart"></i></a>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->
                            <div class="quantity-container info-container">
								<div class="row">
								    <div class="col-sm-2">
									    <span class="label">Qty :</span>
									</div>
								    <div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" value="1">
							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
										<a href="product-details.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
									</div>

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

							<div class="product-social-link m-t-20 text-right">
								<span class="social-label">Share :</span>
								<div class="social-icons">
						            <ul class="list-inline d-flex ">
						                <li><a class="fa fa-facebook" href="http://facebook.com/transvelo"></a></li>
						                <li><a class="fa fa-twitter" href="#"></a></li>
						                <li><a class="fa fa-linkedin" href="#"></a></li>
						                <li><a class="fa fa-rss" href="#"></a></li>
						                <li><a class="fa fa-pinterest" href="#"></a></li>
						            </ul><!-- /.social-icons -->
						        </div>
							</div>

							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->

				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text"><?php echo $row['productDescription'];?></p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>
                                            <?php $qry=mysqli_query($con,"select * from productreviews where productId='$pid'");
                                            while($rvw=mysqli_fetch_array($qry))
                                            {
                                            ?>

											<div class="reviews" style="border: solid 1px #000; padding-left: 2% ">
												<div class="review">
													<div class="review-title"><span class="summary"><?php echo htmlentities($rvw['summary']);?></span><span class="date"><i class="fa fa-calendar"></i><span><?php echo htmlentities($rvw['reviewDate']);?></span></span></div>

													<div class="text">"<?php echo htmlentities($rvw['review']);?>"</div>
													<div class="text"><b>Quality :</b>  <?php echo htmlentities($rvw['quality']);?> Star</div>
													<div class="text"><b>Price :</b>  <?php echo htmlentities($rvw['price']);?> Star</div>
													<div class="text"><b>value :</b>  <?php echo htmlentities($rvw['value']);?> Star</div>
                                                <div class="author m-t-15"><i class="fa fa-pencil-square-o"></i> <span class="name"><?php echo htmlentities($rvw['name']);?></span></div>													</div>
											
											</div>
											<?php } ?><!-- /.reviews -->
										</div><!-- /.product-reviews -->
										<form role="form" class="cnt-form" name="review" method="post">

										
										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											<div class="review-table">
												<div class="table-responsive">
													<table class="table table-bordered">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 star</th>
																<th>2 stars</th>
																<th>3 stars</th>
																<th>4 stars</th>
																<th>5 stars</th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">Quality</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Price</td>
																<td><input type="radio" name="price" class="radio" value="1"></td>
																<td><input type="radio" name="price" class="radio" value="2"></td>
																<td><input type="radio" name="price" class="radio" value="3"></td>
																<td><input type="radio" name="price" class="radio" value="4"></td>
																<td><input type="radio" name="price" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Value</td>
																<td><input type="radio" name="value" class="radio" value="1"></td>
																<td><input type="radio" name="value" class="radio" value="2"></td>
																<td><input type="radio" name="value" class="radio" value="3"></td>
																<td><input type="radio" name="value" class="radio" value="4"></td>
																<td><input type="radio" name="value" class="radio" value="5"></td>
															</tr>
														</tbody>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->
											
											<div class="review-form">
												<div class="form-container">
													
														
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																    <input type="text" class="form-control txt" id="exampleInputName" placeholder="" name="name" required="required">
																</div><!-- /.form-group -->
																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="" name="summary" required="required">
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>

                                                                    <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="" name="review" required="required"></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button name="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->										
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

				

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->




			</div><!-- /.col -->
			
		</div>
		<?php } ?>
	</div>
</div>

    </body>
     <footer>
     <?php include('includes/footer.php');?>
    </footer>

</html>