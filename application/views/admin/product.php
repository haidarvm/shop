<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Create Product
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Create</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Quick New Product -->
				<div class="box box-info" id="quick-product-box">
					<div class="box-header">
						<i class="fa fa-envelope"></i>
						<h3 class="box-title">New Product</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
							<button class="btn btn-info btn-sm" data-toggle="tooltip" title="Add More">
								<i class="fa fa-plus"></i>
							</button>
						</div>
						<!-- /. tools -->
					</div>
					<div class="box-body">
                         <?php if($action=='add') {?>
						<form action="#" class="form-horizontal" id="quick-product" method="post">
						<?php } else {?>
						<form action="<?php echo site_url();?>admin/product/update/<?php echo !empty($product) ? $product->product_id : "";?>" class="form-horizontal"  method="post">
						<?php  } ?>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Product</label>
								<div class="col-sm-10">
									<input id="name" name="name" class="form-control" value="<?php echo isset($product) ? $product->name : '';?>" type="text" placeholder="Name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Category</label>
								<div class="col-sm-10">
									<select name="category_id" class="form-control">
									<?php foreach($categories as $cat) {?>
										<option value="<?php echo $cat->category_id;?>"><?php echo $cat->category_name;?></option>
									<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Indo Price</label>
								<div class="col-sm-10">
									<input id="name" name="price" class="form-control numbers" value="<?php echo isset($product) ? $product->price : '';?>" type="text" placeholder="Rp">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">English Price</label>
								<div class="col-sm-10">
									<input id="name" name="price_en" class="form-control numbers" value="<?php echo isset($product) ? $product->price_en : '';?>" type="text" placeholder="USD">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Unit</label>
								<div class="col-sm-10">
									<select name="unit_id" class="form-control">
									<?php foreach($units as $unit) {?>
										<option value="<?php echo $unit->unit_id;?>"><?php echo $unit->name;?></option>
									<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Indo Description</label>
								<div class="col-sm-10">
									<textarea name="description" class="textarea" placeholder="Indo Description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo isset($product) ? $product->description : '';?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">English Description</label>
								<div class="col-sm-10">
									<textarea name="description_en" class="textarea" placeholder="English Description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo isset($product) ? $product->description_en : '';?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Stock</label>
								<div class="col-sm-10">
									<input id="stock" name="stock" class="form-control number" type="text" value="10" placeholder="Qty">
								</div>
							</div>
							
							<?php 
							if(!empty($getAllProductImg) && $action=='update') {
							foreach($getAllProductImg as $proudctImg) {?>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Image</label>
								<div class="col-sm-10">
								<?php echo !empty($proudctImg->path) ?  '<img src="'.prod_thumb_url().$proudctImg->image_id.$proudctImg->ext.'" />' : "No Image" ?>
								
								</div>
							</div>
							<?php }
							}?>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="image">Image</label>
								<div class="col-sm-10">
    								<span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Add files...</span>
                                        <!-- The file input field used as target for the file upload widget -->
                                        <input id="fileupload" type="file" name="userfile" >
                                        <?php if($action=='insert') {?>
                                        <input type="hidden" name="product_id" id="product_id" value="<?php echo !empty($productDraft) ? $productDraft->product_id : "";?>">
                                        <input type="hidden" name="image_id" id="image_id" value="<?php echo !empty($productImgDraft) ? $productImgDraft->image_id : "";?>">
                                    	<?php } else {?>
										<input type="hidden" name="product_id" id="product_id" value="<?php echo !empty($product) ? $product->product_id : "";?>">
                                        <input type="hidden" name="image_id" id="image_id" value="<?php echo !empty($productImg) ? $productImg->image_id : "";?>">
                                    	
                                    	<?php } ?>
                                    </span>
                                </div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="image">Progress</label>
								<div class="col-sm-10">
    								<!-- The global progress bar -->
                                    <div id="progress" class="progress">
                                        <div class="progress-bar progress-bar-success"></div>
                                    </div>
                                    <!-- The container for the uploaded files -->
                                    <div id="files" class="files"></div>
                                </div>
							</div>
					</div>
					<div class="box-footer clearfix">
						<?php if($action=='insert') { ?>
						<button class="pull-right btn btn-default" id="<?php echo $action;?>-product">
							Submit <i class="fa fa-arrow-circle-right"></i>
						<?php } else { ?>
							<input class="pull-right btn btn-default"  value="Submit" type="submit">
						<?php } ?>
						</button>
						</form>
					</div>
				</div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
