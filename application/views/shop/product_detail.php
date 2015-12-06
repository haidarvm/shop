<script>
  	jQuery(document).ready(function($){
  		$('.close-carbon-adv').on('click', function(){
  			$('#carbonads-container').hide();
  		});
  	});
</script>
<script src="<?php echo base_url()?>assets/js/main.js"></script>
<!-- Resource jQuery -->
<div class="back">
	<h2>Product Details</h2>
</div>
<!---->
<div class="product">
	<div class="container">
		<div class="col-md-3 product-price">

			<div class=" rsidebar span_1_of_left">
				<div class="of-left">
					<h3 class="cate">CATEGORIES</h3>
				</div>
				<ul class="menu">
					<li class="item1"><a href="#">Men </a>
						<ul class="cute">
							<li class="subitem1"><a href="#">Cute Kittens </a></li>
							<li class="subitem2"><a href="#">Strange Stuff </a></li>
							<li class="subitem3"><a href="#">Automatic Fails </a></li>
						</ul></li>
					<li class="item2"><a href="#">Women </a>
						<ul class="cute">
							<li class="subitem1"><a href="#">Cute Kittens </a></li>
							<li class="subitem2"><a href="#">Strange Stuff </a></li>
							<li class="subitem3"><a href="#">Automatic Fails </a></li>
						</ul></li>
					<li class="item3"><a href="#">Kids</a>
						<ul class="cute">
							<li class="subitem1"><a href="#">Cute Kittens </a></li>
							<li class="subitem2"><a href="#">Strange Stuff </a></li>
							<li class="subitem3"><a href="#">Automatic Fails </a></li>
						</ul></li>
					<li class="item4"><a href="#">Accesories</a>
						<ul class="cute">
							<li class="subitem1"><a href="#">Cute Kittens </a></li>
							<li class="subitem2"><a href="#">Strange Stuff </a></li>
							<li class="subitem3"><a href="#">Automatic Fails </a></li>
						</ul></li>

					<li class="item4"><a href="#">Shoes</a>
						<ul class="cute">
							<li class="subitem1"><a href="#">Cute Kittens </a></li>
							<li class="subitem2"><a href="#">Strange Stuff </a></li>
							<li class="subitem3"><a href="#">Automatic Fails </a></li>
						</ul></li>
				</ul>
			</div>
			<!--initiate accordion-->
			<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
			<!---->
			<div class="product-middle">

				<div class="fit-top">
					<h6 class="shop-top">LOREM IPSUM</h6>
					<a href="#" class="shop-now">SHOP NOW</a>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="sellers">
				<div class="of-left-in">
					<h3 class="tag">TAGS</h3>
				</div>
				<div class="tags">
					<ul>
						<li><a href="#">design</a></li>
						<li><a href="#">fashion</a></li>
						<li><a href="#">lorem</a></li>
						<li><a href="#">dress</a></li>
						<li><a href="#">fashion</a></li>
						<li><a href="#">dress</a></li>
						<li><a href="#">design</a></li>
						<li><a href="#">dress</a></li>
						<li><a href="#">design</a></li>
						<li><a href="#">fashion</a></li>
						<li><a href="#">lorem</a></li>
						<li><a href="#">dress</a></li>
						<div class="clearfix"></div>
					</ul>

				</div>

			</div>
			<!---->
			<div class="product-bottom">
				<div class="of-left-in">
					<h3 class="best">BEST SELLERS</h3>
				</div>
				<div class="product-go">
					<div class=" fashion-grid">
						<a href="#"><img class="img-responsive "
							src="<?php echo img_url();?>f1.jpg" alt=""></a>

					</div>
					<div class=" fashion-grid1">
						<h6 class="best2">
							<a href="#">Lorem ipsum dolor sit amet consectetuer </a>
						</h6>

						<span class=" price-in1"> $40.00</span>
					</div>

					<div class="clearfix"></div>
				</div>
				<div class="product-go">
					<div class=" fashion-grid">
						<a href="#"><img class="img-responsive "
							src="<?php echo img_url();?>f2.jpg" alt=""></a>
					</div>
					<div class="fashion-grid1">
						<h6 class="best2">
							<a href="#">Lorem ipsum dolor sit amet consectetuer </a>
						</h6>

						<span class=" price-in1"> $40.00</span>
					</div>

					<div class="clearfix"></div>
				</div>
				<div class="product-go">
					<div class=" fashion-grid">
						<a href="#"><img class="img-responsive "
							src="<?php echo img_url();?>f3.jpg" alt=""></a>

					</div>
					<div class=" fashion-grid1">
						<h6 class="best2">
							<a href="#">Lorem ipsum dolor sit amet consectetuer </a>
						</h6>
						<ul class="star-footer">
							<li><a href="#"><i> </i></a></li>
							<li><a href="#"><i> </i></a></li>
							<li><a href="#"><i> </i></a></li>
							<li><a href="#"><i> </i></a></li>
							<li><a href="#"><i> </i></a></li>
						</ul>
						<span class=" price-in1"><small>$70.00</small> $40.00</span>
					</div>

					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!---->
		<div class="col-md-9 product-price1">
			<div class="col-md-5 single-top">
				<div class="flexslider">
					<ul class="slides">
						<?php foreach ($images as $img) {?>
						<li data-thumb="<?php echo prod_thumb_url().$img->image_id.$img->ext;?>"><img src="<?php echo prod_small_url().$img->image_id.$img->ext;?>" /></li>
						<?php } ?>
					</ul>
				</div>
				<!-- FlexSlider -->
				<script defer src="<?php echo base_url()?>assets/js/jquery.flexslider.js"></script>
				<link rel="stylesheet" href="<?php echo base_url()?>assets/css/flexslider.css" type="text/css" media="screen" />
				<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
			</div>
			<div class="col-md-7 single-top-in simpleCart_shelfItem">
				<div class="single-para ">
					<h4><?php echo $product->name?></h4>
					<div class="star-on">
						<ul class="star-footer">
							<li><a href="#"><i> </i></a></li>
							<li><a href="#"><i> </i></a></li>
							<li><a href="#"><i> </i></a></li>
							<li><a href="#"><i> </i></a></li>
							<li><a href="#"><i> </i></a></li>
						</ul>
						<div class="review">
							<a href="#"> 1 customer review </a>

						</div>
						<div class="clearfix"></div>
					</div>

					<h5 class="item_price"><?php echo number_format($product->price);?></h5>
					<ul class="tag-men">
						<li><span>TAG</span> <span class="women1">: Women,</span></li>
						<li><span>SKU</span> <span class="women1">: CK09</span></li>
					</ul>
					<a href="#" class="add-cart item_add">ADD TO CART</a>

				</div>
			</div>
			<div class="clearfix"></div>
			<!---->
			<div class="cd-tabs">
				<nav>
					<ul class="cd-tabs-navigation">
						<li><a data-content="desc" href="#0" class="selected ">Description </a></li>
						<li><a data-content="cinema" href="#0">Addtional Informatioan</a></li>
						<li><a data-content="television" href="#0" >Reviews (1)</a></li>

					</ul>
				</nav>
				<ul class="cd-tabs-content">
					<li data-content="desc"  class="selected">
						<div class="facts">
							<p><?php echo $product->description?></p>
							<ul>
								<li>Research</li>
								<li>Design and Development</li>
								<li>Porting and Optimization</li>
								<li>System integration</li>
								<li>Verification, Validation and Testing</li>
								<li>Maintenance and Support</li>
							</ul>
						</div>

					</li>
					<li data-content="cinema">
						<div class="facts1">

							<div class="color">
								<p>Color</p>
								<span>Blue, Black, Red</span>
								<div class="clearfix"></div>
							</div>
							<div class="color">
								<p>Size</p>
								<span>S, M, L, XL</span>
								<div class="clearfix"></div>
							</div>

						</div>

					</li>
					<li data-content="television">
						<div class="comments-top-top">
							<div class="top-comment-left">
								<img class="img-responsive" src="<?php echo img_url();?>co.png"
									alt="">
							</div>
							<div class="top-comment-right">
								<h6>
									<a href="#">Hendri</a> - September 3, 2014
								</h6>
								<ul class="star-footer">
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
								</ul>
								<p>Wow nice!</p>
							</div>
							<div class="clearfix"></div>
							<a class="add-re" href="#">ADD REVIEW</a>
						</div>

					</li>
					<div class="clearfix"></div>
				</ul>
			</div>
			<!---->

			<div class="top-product">
				<h3 class="real">Related Products</h3>
				<div class="col-md-4 chain-grid  simpleCart_shelfItem">
					<div class="grid-span-1">
						<a href="single.html"><img class="img-responsive "
							src="<?php echo img_url();?>pi10.jpg" alt=" "> </a>
					</div>
					<div class="grid-chain-bottom ">
						<h6>
							<a href="single.html">Sun Glasses #1</a>
						</h6>
						<div class="star-price">
							<div class="price-at">
								<ul class="star-footer">
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
								</ul>
							</div>
							<div class="price-at-bottom ">
								<span class="item_price">$ 75.00</span>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="cart-add">
							<a class="add1 item_add" href="#">ADD TO CART <i> </i></a> <a
								class="add2" href="#"><i> </i></a>
							<div class="clearfix"></div>
						</div>
					</div>

				</div>
				<div class="col-md-4 chain-grid simpleCart_shelfItem">
					<div class="grid-span-1">
						<a href="single.html"><img class="img-responsive "
							src="<?php echo img_url();?>pi6.jpg" alt=" "> </a>
					</div>
					<div class="grid-chain-bottom ">
						<h6>
							<a href="single.html">Stylish Glasses #1</a>
						</h6>
						<div class="star-price">
							<div class="price-at">
								<ul class="star-footer">
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
								</ul>
							</div>
							<div class="price-at-bottom ">
								<span class="item_price">$ 65.00</span>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="cart-add">
							<a class="add1 item_add" href="#">ADD TO CART <i> </i></a> <a
								class="add2" href="#"><i> </i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-md-4 chain-grid simpleCart_shelfItem">
					<div class="grid-span-1">
						<a href="single.html"><img class="img-responsive "
							src="<?php echo img_url();?>pi5.jpg" alt=" "> </a>
					</div>
					<div class="grid-chain-bottom ">
						<h6>
							<a href="single.html">Specs Glasses #1</a>
						</h6>
						<div class="star-price">
							<div class="price-at">
								<ul class="star-footer">
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
									<li><a href="#"><i> </i></a></li>
								</ul>
							</div>
							<div class="price-at-bottom ">
								<span class="item_price">$ 85.00</span>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="cart-add">
							<a class="add1 item_add" href="#">ADD TO CART <i> </i></a> <a
								class="add2" href="#"><i> </i></a>
							<div class="clearfix"></div>
						</div>
					</div>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!---->
