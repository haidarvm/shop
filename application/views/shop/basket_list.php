<div class="content">
  <div class="container">
    <h4>My Account</h4>
    <div class="row">
        <div class="three columns">
            <h6 class="borderbottom kiri" style="border-top:1px solid grey;border:none;background:#E3E3E0;font-style: italic;padding:10px;">Account Home</h6>
	    	<p class="value-description kiri">
	    		<ul>
	    			<li class="kiri">
	    				<a href="#">Change Password</a>
	    			</li>
	    			<li class="kiri">
	    				<a href="#">My Address Book</a>
	    			</li>
	    			<li class="kiri">
	    				<a href="#">My Newsletter</a>
	    			</li>
	    			<li class="kiri">
	    				<a href="#">My Wishlist</a>
	    			</li>
	    			<li class="kiri">
	    				<a href="#">My Basket</a>
	    			</li>
	    			<li class="kiri">
	    				<a href="#">My Orders</a>
	    			</li>
	    		</ul>
	    		</ul>
	    		</ul>
	    	</p>
        </div>
        <div class="nine columns">
        <?php $i = 1; 
if($cart) { ?>
<form action="<?php echo site_url();?>cart/update_all" id="update-all" method="post">
            <h6 class="borderbottom kiri"  style="border-top:1px solid grey;border-bottom:1px solid grey;background:#E3E3E0;font-style: italic;padding:10px;">My Wishlist</h6>
            
					<?php foreach ($cart as $items): 
		$img = $mproduct->getOneProductImg($items['id']);
		//print_r($img);
		//print_r($items);
?>
        <?php echo form_hidden('rowid[]', $items['rowid']); ?>
            <div class="row list-belanja">
				<p>Your Items</p>
				<table class="table">
					<thead>
						<tr  style="border-bottom: 1px solid grey;">
							<td>Product</td>
							<td>Name</td>
							<td style="width: 70px">Item Price</td>
							<td>Quantity</td>
							<td>Size</td>
						</tr>
					<thead>
					<tbody>
						<tr>
							<td><img src="<?php echo prod_thumb_url().$img->image_id.$img->ext?>" /></td>
							<td><?php echo $items['name']; ?></td>
							<td><?php echo $this->cart->format_number($items['price']); ?></td>
							<td><input type="text" name="qty[]" size="4" id="qty-<?php echo $items['id']?>" data-id="<?= $items['id'] ?>"  value="<?php echo $items['qty']?>" /></td>
							<td><select name="size[]">
					<?php foreach($getAllSize as $size) { ?>
					<option value="<?php echo $size->size_code;?>" <?php echo $size->size_code == $items['size'] ? 'selected': ''?>><?php echo $size->size_name;?></option>
					<?php } ?>
					</select></td>
						</tr>
						
				
					</tbody>
				</table>
			</div>
			<?php $i++; ?>

<?php endforeach; 
?>
				<button class="button button-primary" style="margin-top:10px; float:right;">ADD TO BASKET</button>
        </div>
        <p><button class="btn-update">Update</button>&nbsp;</p>
<button class="btn-checkout">Checkout</button>
</form>
        <?php } ?>
        
    </div>
  </div>
</div>