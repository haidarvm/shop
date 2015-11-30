<?php $i = 1; 
if($cart) { ?>
<form action="<?php echo site_url();?>cart/update_all" id="update-all" method="post">
<table cellpadding="6" cellspacing="1" id="list-cart" style="width:100%" border="0">
<tr>
        <th>QTY</th>
        <th>Size</th>
        <th>Image</th>
        <th style="text-align:right">Item Price</th>
        <th style="text-align:right">Sub-Total</th>
</tr>


<?php foreach ($cart as $items): 
		$img = $mproduct->getOneProductImg($items['id']);
		//print_r($img);
		//print_r($items);
?>
        <?php echo form_hidden('rowid[]', $items['rowid']); ?>

        <tr>
                <td><input type="text" name="qty[]" id="qty-<?php echo $items['id']?>" data-id="<?= $items['id'] ?>"  value="<?php echo $items['qty']?>" /></span></td>
                <!--<td><input type="text" name="size[]" id="size-<?php echo $items['id']?>" data-id="<?= $items['id'] ?>" value="<?php echo $items['size']?>" /></td>
                -->
                <td><select name="size[]">
					<?php foreach($getAllSize as $size) { ?>
					<option value="<?php echo $size->size_code;?>" <?php echo $size->size_code == $items['size'] ? 'selected': ''?>><?php echo $size->size_name;?></option>
					<?php } ?>
					</select>
					</td>
                <td> 
                        <?php echo $items['name']; ?>
						<p><img src="<?php echo prod_thumb_url().$img->image_id.$img->ext?>" /></p>

                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>
<?php $i++; ?>

<?php endforeach; 
?>

<tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Total</strong></td>
        <td class="right"><?php echo $this->cart->format_number($this->cart->total()); ?></td>
        <td></td>
</tr>

</table>
<p><button class="btn-update">Update</button>&nbsp;</p>
</form>
<button class="btn-checkout">Checkout</button>
<?php
} else {
	echo 'Empty No Cart List';
}
?>
