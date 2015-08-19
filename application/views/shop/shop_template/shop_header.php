<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title><?php echo (isset($title)) ? $title : ''; ?> | Online Shop Ecommerce</title>
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Free Style Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:100,300,400,500,700,800,900,100italic,300italic,400italic,500italic,700italic,800italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/easing.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".scroll").click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
	});
});
$(window).bind('scroll', function () {
	if ($(window).scrollTop() > 50) {
		$('.header-bottom').addClass('fixed');
	} else {
		$('.header-bottom').removeClass('fixed');
	}
});
</script>	
<!-- start menu -->
<script src="<?php echo base_url();?>assets/js/simpleCart.min.js"> </script>
<link href="<?php echo base_url();?>assets/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script type="text/javascript">
var site_url = '<?php echo site_url()?>';
</script>				
</head>
<body> 
	<!--top-header-->
	<div class="top-header">
	<div class="container">
		<div class="top-header-main">
			<div class="col-md-4 top-header-left">
				<div class="search-bar">
					<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value="">
				</div>
			</div>
			<div class="col-md-4 top-header-middle">
				<a href="#"><img src="<?php echo base_url();?>assets/img/logo.png" alt="" /></a>
			</div>
			<div class="col-md-4 top-header-right">
				<div class="cart box_1">
						<a href="checkout.html">
						<h3> <div class="total">
							<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
							<img src="<?php echo base_url();?>assets/img/cart-1.png" alt="" />
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
						<div class="clearfix"> </div>
					</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--top-header-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="top-nav">
				<ul class="memenu skyblue">
					<li class="active"><a href="#">Home</a></li>
					<li class="grid"><a href="#">Collection</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<h4>Shop</h4>
									<ul>
										<li><a href="#">New Arrivals</a></li>
										<li><a href="#">Men</a></li>
										<li><a href="#">Women</a></li>
										<li><a href="#">Accessories</a></li>
										<li><a href="#">Kids</a></li>
										<li><a href="#">login</a></li>
										<li><a href="#">Brands</a></li>
										<li><a href="#">My Shopping Bag</a></li>
									</ul>
								</div>
								<div class="col1 me-one">
									<h4>Style Zone</h4>
									<ul>
										<li><a href="#">Men</a></li>
										<li><a href="#">Women</a></li>
										<li><a href="#">Brands</a></li>
										<li><a href="#">Kids</a></li>
										<li><a href="#">Accessories</a></li>
										<li><a href="#">Style Videos</a></li>
									</ul>	
								</div>
								<div class="col1 me-one">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="#">Levis</a></li>
										<li><a href="#">Persol</a></li>
										<li><a href="#">Nike</a></li>
										<li><a href="#">Edwin</a></li>
										<li><a href="#">New Balance</a></li>
										<li><a href="#">Jack & Jones</a></li>
										<li><a href="#">Paul Smith</a></li>
										<li><a href="#">Ray-Ban</a></li>
										<li><a href="#">Wood Wood</a></li>
									</ul>	
								</div>
							</div>
						</div>
					</li>
					<li class="grid"><a href="#">Campaign</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<h4>Shop</h4>
									<ul>
										<li><a href="#">New Arrivals</a></li>
										<li><a href="#">Men</a></li>
										<li><a href="#">Women</a></li>
										<li><a href="#">Accessories</a></li>
										<li><a href="#">Kids</a></li>
										<li><a href="#">login</a></li>
										<li><a href="#">Brands</a></li>
										<li><a href="#">My Shopping Bag</a></li>
									</ul>
								</div>
								<div class="col1 me-one">
									<h4>Style Zone</h4>
									<ul>
										<li><a href="#">Men</a></li>
										<li><a href="#">Women</a></li>
										<li><a href="#">Brands</a></li>
										<li><a href="#">Kids</a></li>
										<li><a href="#">Accessories</a></li>
										<li><a href="#">Style Videos</a></li>
									</ul>	
								</div>
								<div class="col1 me-one">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="#">Levis</a></li>
										<li><a href="#">Persol</a></li>
										<li><a href="#">Nike</a></li>
										<li><a href="#">Edwin</a></li>
										<li><a href="#">New Balance</a></li>
										<li><a href="#">Jack & Jones</a></li>
										<li><a href="#">Paul Smith</a></li>
										<li><a href="#">Ray-Ban</a></li>
										<li><a href="#">Wood Wood</a></li>
									</ul>	
								</div>
							</div>
						</div>
					</li>
					<li class="grid"><a href="#">CRHONICAL</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<h4>Shop</h4>
									<ul>
										<li><a href="#">New Arrivals</a></li>
										<li><a href="#">Men</a></li>
										<li><a href="#">Women</a></li>
										<li><a href="#">Accessories</a></li>
										<li><a href="#">Kids</a></li>
										<li><a href="#">login</a></li>
										<li><a href="#">Brands</a></li>
										<li><a href="#">My Shopping Bag</a></li>
									</ul>
								</div>
								<div class="col1 me-one">
									<h4>Style Zone</h4>
									<ul>
										<li><a href="#">Men</a></li>
										<li><a href="#">Women</a></li>
										<li><a href="#">Brands</a></li>
										<li><a href="#">Kids</a></li>
										<li><a href="#">Accessories</a></li>
										<li><a href="#">Style Videos</a></li>
									</ul>	
								</div>
								<div class="col1 me-one">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="#">Levis</a></li>
										<li><a href="#">Persol</a></li>
										<li><a href="#">Nike</a></li>
										<li><a href="#">Edwin</a></li>
										<li><a href="#">New Balance</a></li>
										<li><a href="#">Jack & Jones</a></li>
										<li><a href="#">Paul Smith</a></li>
										<li><a href="#">Ray-Ban</a></li>
										<li><a href="#">Wood Wood</a></li>
									</ul>	
								</div>
							</div>
						</div>
					</li>
					<li class="grid"><a href="#">Jackston</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<h4>Shop</h4>
									<ul>
										<li><a href="#">New Arrivals</a></li>
										<li><a href="#">Men</a></li>
										<li><a href="#">Women</a></li>
										<li><a href="#">Accessories</a></li>
										<li><a href="#">Kids</a></li>
										<li><a href="#">login</a></li>
										<li><a href="#">Brands</a></li>
										<li><a href="#">My Shopping Bag</a></li>
									</ul>
								</div>
								<div class="col1 me-one">
									<h4>Style Zone</h4>
									<ul>
										<li><a href="#">Men</a></li>
										<li><a href="#">Women</a></li>
										<li><a href="#">Brands</a></li>
										<li><a href="#">Kids</a></li>
										<li><a href="#">Accessories</a></li>
										<li><a href="#">Style Videos</a></li>
									</ul>	
								</div>
								<div class="col1 me-one">
									<h4>Popular Brands</h4>
									<ul>
										<li><a href="#">Levis</a></li>
										<li><a href="#">Persol</a></li>
										<li><a href="#">Nike</a></li>
										<li><a href="#">Edwin</a></li>
										<li><a href="#">New Balance</a></li>
										<li><a href="#">Jack & Jones</a></li>
										<li><a href="#">Paul Smith</a></li>
										<li><a href="#">Ray-Ban</a></li>
										<li><a href="#">Wood Wood</a></li>
									</ul>	
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--bottom-header-->