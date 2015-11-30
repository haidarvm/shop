<!DOCTYPE html>
<html>
<head>

<!-- Basic Page Needs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Jackston Official</title>
  <meta name="description" content="Web Service Indonesia">
  <meta name="author" content="haidarvm, Maulana D. Syah">

<!-- Mobile Specific Metas
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- FONT
–––––––––––––––––––––––––––––––––––––––––––––––––– 
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>-->

<!-- CSS
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/skeleton.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/menu.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/tab.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/slide.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/accordion.css">

<!-- Favicon
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="<?php echo img_url()?>favicon.png" />

  

</head>
<script type="text/javascript">
var site_url = '<?php echo base_url()?>';
</script>
<body>

<!--   Primary Page Layout
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!--   Header
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="header">
  	<div class="container">
	    <img alt="Jackston" src="<?php echo base_url()?>assets/img/logo.png"/>
	</div><!-- End container -->
</div><!-- End header -->

<!--   Search
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="search">
	<div class="container">
		<div class="cSearch">
			<p><a href="#"><b>HELP</b></a></p>
			<span><b><a href="<?php echo site_url()?>user/profile">Your Account </a>|<a href="<?php echo site_url()?>cart/list"> Your Basket </a>|<a href="<?php echo site_url()?>cart/checkout"> Checkout</a></b></span>
		</div>
		<div class="clear"></div>
		<div class="cari">
			<img src="<?php echo base_url()?>assets/img/search.png"/>
		</div>
	</div>
</div>

<!--   Menu
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div id="menu" class="normal">
  <div class="container">
	<nav class="clearfix">
	   <ul class="clearfix">
	        <li><a href="<?php echo site_url()?>">HOME</a></li>  
	        <li id="m2c"><a href="<?php echo site_url()?>product">COLLECTION</a></li>  
	        <li><a href="<?php echo page_url()?>contact">CAMPAIGN</a></li>  
	        <li><a href="<?php echo page_url()?>contact">CRHONICAL</a></li>  
	        <li id="m1c"><a href="<?php echo site_url()?>">JACKSTON</a></li>    
	    </ul>  
	    <a href="#" id="pull">Menu</a>  
	</nav>
	<div class="row" id="sub1">
		<div class="six columns"><img src="<?php echo img_url()?>nob.png" /></div>
		<div class="five columns" style="background: #FFFFFF;padding:10px;">
			<div class="submen clear">
				<div class="one-half column"><img src="<?php echo img_url()?>menu/m1.jpg"/></div>
				<div class="one-half column"><b>Neal x Jackston</b><br/>blends the best of many unique stuff and ideas</div>
			</div>
			<div class="submen clear">
				<div class="one-half column"><img src="<?php echo img_url()?>menu/m2.jpg"/></div>
				<div class="one-half column"><b>WEED</b><br/>blends the best of many unique stuff and ideas into an</div>
			</div>
			<div class="submen clear">
				<div class="one-half column"><img src="<?php echo img_url()?>menu/m3.jpg"/></div>
				<div class="one-half column"><b>No Bull</b><br/>blends the best of many fakes</div>
			</div>
		</div>
		<div class="one column"><img src="<?php echo img_url()?>nob.png" /></div>
	</div>
	<div class="row" id="sub2">
		<div class="three columns noba"><img src="<?php echo img_url()?>nob.png" /></div>
		<div class="nine columns">
			<div class="submen">
				<ul>
					<li><a href="<?php echo site_url()?>product/tees">Tees</a></li>
					<li><a href="<?php echo site_url()?>product/shirt">Shirts</a></li>
					<li><a href="<?php echo site_url()?>product/tees">Polos</a></li>
					<li><a href="<?php echo site_url()?>product/shirt">Cardigan</a></li>
					<li><a href="<?php echo site_url()?>product/shirt">Sweats</a></li>
				</ul>
				<ul>
					<li><a href="<?php echo site_url()?>product/jackets">Bomber Jacket</a></li>
					<li><a href="<?php echo site_url()?>product/jackets">Canvas Jacket</a></li>
					<li><a href="<?php echo site_url()?>product/jackets">Varsity Jacket</a></li>
					<li><a href="<?php echo site_url()?>product/jackets">Denim Jacket</a></li>
					<li><a href="<?php echo site_url()?>product/jackets">Coat Jacket</a></li>
				</ul>
				<ul>
					<li><a href="<?php echo site_url()?>product/trousers">Trousers</a></li>
					<li><a href="<?php echo site_url()?>product/longsleave">Longs Leave</a></li>
					<li><a href="<?php echo site_url()?>product/jeans">Jeans</a></li>
<!-- 					<li><a href="#">Short</a></li> -->
<!-- 					<li><a href="#">Bags</a></li> -->
					<li><a href="<?php echo site_url()?>product/accessories">Asserories</a></li>
					<li><img class="noba" src="<?php echo img_url()?>nob.png" width="100%" height="1px"/></li>
				</ul>
			</div>
		</div>
	</div>
  </div><!-- End container -->
</div><!-- End menu -->
