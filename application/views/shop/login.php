<div class="content">
  <div class="container">
  	<h5>LOGIN CREATE AN ACCOUNT</h5>
  	<div class="row">
  		<div class="six columns">
  			<h6>NEW TO THE PACK</h6>
  			<p>We recommend that you create an account with us before buying – you’ll be able to track your order to see what’s happening, and it will be much quicker and easier next time you buy from our website. Plus you can take advantage of sales and special offers in future by signing up to our newsletter.</p>
  			<button id="btn-login" class="button button-primary" style="margin-top:10px;"> Create Account</button>
  			<hr />
  			<p>If you do not wish to Create an Account with us, & still want to show or compare items with friends. Its no biggie, even though you might be missing out on new arrivals, collaboration, sales, executive offers, re-stocked items, random events, sale events, other unimportant news & junk. You may do so by clicking the button below & sending your firend or friends what you found online.</p>
  			<hr />
  			<div id="lets" style="text-decoration: underline;font-weight: bold;cursor: pointer;">Let Friends Know ...</div>
  		</div>
  		<div class="six columns">
  			<form action="<?php echo site_url()?>user/do_login" method="post">
  			<h6>REGISTERED INLISTED</h6>
  			<p>If you have an account with us, please log in.</p>
  			<p><b>E-mail ***</b></p>
  			<input class="u-full-width" name="email" placeholder="example: info@jackston.com" id="exampleEmailInput" type="email">
  			<p><b>Password ***</b><span style="float: right;"><i>Forgot Your Password ??</i></span></p>
  			<input class="u-full-width" name="password" placeholder="" id="exampleEmailInput" type="password">
  			<p><i>*** Required Fields</i></p>
  			<input class="button-primary" value="LOGIN" type="submit" style="margin-top:10px;">
  			</form>
  		</div>
  	</div>
  	<div id="toFriend" class="row" style="display:none;">
  		<div class="twelve columns" style="border-top: 1px solid grey;">
  			<h5>E-MAIL TO FRIEND</h5>
  			<p>SENDER :</p>
  			<div class="row">
	  			<div class="six columns">
	  				<p>Name :</p>
	  				<input class="u-full-width" placeholder="Your name here" id="exampleEmailInput" type="text">
	  			</div>
	  			<div class="six columns">
	  				<p>E-mail :</p>
	  				<p>info@jackston.com</p>
	  			</div>
  			</div>
  			<p>Message :</p>
  			<textarea class="u-full-width" placeholder="Your message here" id="exampleMessage"></textarea>
  			<div id="rec" style="display: none;">
	  			<p>RECIPIENT :</p>
	  			<div class="row">
		  			<div class="six columns">
		  				<p>Name :</p>
		  				<input class="u-full-width" placeholder="Your name here" id="exampleEmailInput" type="text">
		  			</div>
		  			<div class="six columns">
		  				<p>E-mail :</p>
		  				<input class="u-full-width" placeholder="Your email here" id="exampleEmailInput" type="email">
		  			</div>
	  			</div>
	  		</div>
  			<input id="addRec" class="button-primary" value="ADD RECIPIENT" type="button">
  			<input class="button-primary" value="SEND E-MAIL" type="submit">
  		</div>
  		<div class="twelve columns">
  			<p style="margin-top: 10px;border-top: 1px solid grey;border-bottom: 1px solid grey;">Compare Products</p>
  			<p>You have no items to compare in your Basket or Wishlist</p>
  		</div>
  		<div class="twelve columns">
  			<p  style="margin-top: 10px;border-top: 1px solid grey;border-bottom: 1px solid grey;">Recently Viewed Items</p>
  			<ol>
  				<li>Afon D Shirt ( SHIRTS )</li>
  				<li>Kosai Miria Cream ( PANTS )</li>
  			</ol>
  		</div>
  	</div>
  </div>
</div>
<script>
	/* $(document).ready(function(){
	  $("#lets").click(function(){
	    $('#toFriend').slideDown('slow');
	    });
	});
	$(document).ready(function(){
	  $("#addRec").click(function(){
	    $('#rec').slideDown('slow');
	    });
	}); */
</script>