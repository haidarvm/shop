
<!--   Content top
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="content">
	<div class="container">
		<div class="row">
			<div class="twelve columns">
				<!-- Top info -->
				<div class="infotop">
					<p>Deftly tailored from very fine woven egyptian cotton, these
						shirts are smooth to the touch, though still maintain their
						elegant shape. Essential pieces that easily cross from the week
						into the weekend.</p>
				</div>
			</div>
			<!-- End Top info -->
		</div>
	</div>
</div>

<!--   Content produk
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="content">
	<div class="container">
		<div class="row">
		<?php 
		$i = 1;
		foreach($product as $row) {
		$i++; ?>
			<div class="three columns" style="margin-left: 0;">
				<a class="tab_link" title="#p1a"
					href="<?php echo site_url().'product/detail/'.$row->image_id;?>">
					<div class="produk">
						<div class="barang">
							<img src="<?php echo base_url();?>assets/img/produk/bnew.png" />
						</div>
						<div class="gmbproduk">
							<img class="gmbproduk"
								src="<?php echo prod_small_url().$row->image_id.'.'.$row->ext?>" />
						</div>
						<div class="hoverproduk">
							<div class="hpnam">
								<img
									src="<?php echo prod_small_url().$row->image_id.'.'.$row->ext?>" />
							</div>
						</div>
					</div>
				</a>
			</div>
			<?php } ?>
			<div class="row">
                    <?php echo $pagination; ?>
                </div>
			</div>
		</div>

	</div>
	<!-- End container -->
</div>
<!-- End home info -->

<script>
	$(document).ready(function(){
		$('.tab_link').tab();
		$('#slider1').slide();
		$('.item').accordion();
	});
</script>