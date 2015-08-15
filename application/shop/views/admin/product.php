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
						<form action="#" class="form-horizontal" id="quick-product" method="post">
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Product</label>
								<div class="col-sm-10">
									<input id="name" name="name" class="form-control" type="text" placeholder="Name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Category</label>
								<div class="col-sm-10">
									<select name="category_id" class="form-control">
									<?php foreach($categories as $cat) {?>
										<option value="<?php echo $cat->category_id;?>"><?php echo $cat->name;?></option>
									<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Price</label>
								<div class="col-sm-10">
									<input id="name" name="price" class="form-control numbers" type="text" placeholder="Rp">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Description</label>
								<div class="col-sm-10">
									<textarea name="description" class="textarea" placeholder="Description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Stock</label>
								<div class="col-sm-10">
									<input id="name" name="stock" class="form-control number" type="text" placeholder="Qty">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="image">Image</label>
								<div class="col-sm-10">
    								<span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Add files...</span>
                                        <!-- The file input field used as target for the file upload widget -->
                                        <input id="fileupload" type="file" name="userfile" multiple>
                                        <input type="hidden" name="product_id" id="product_id" value="<?php echo !empty($productDraft) ? $productDraft->product_id : "";?>">
                                        <input type="hidden" name="image_id" id="image_id" value="<?php echo !empty($productImgDraft) ? $productImgDraft->image_id : "";?>">
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
						</form>
					</div>
					<div class="box-footer clearfix">
						<button class="pull-right btn btn-default" id="submit">
							Submit <i class="fa fa-arrow-circle-right"></i>
						</button>
					</div>
				</div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->