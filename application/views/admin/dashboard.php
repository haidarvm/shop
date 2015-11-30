<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard <small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>150</h3>
						<p>New Orders</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i
						class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<h3>
							53<sup style="font-size: 20px">%</sup>
						</h3>
						<p>Bounce Rate</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i
						class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3>44</h3>
						<p>User Registrations</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i
						class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3>65</h3>
						<p>Unique Visitors</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i
						class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
		</div>
		<!-- /.row -->
		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-lg-7 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->
				<div class="nav-tabs-custom">
					<!-- Tabs within a box -->
					<ul class="nav nav-tabs pull-right">
						<li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
						<li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
						<li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
					</ul>
					<div class="tab-content no-padding">
						<!-- Morris chart - Sales -->
						<div class="chart tab-pane active" id="revenue-chart"
							style="position: relative; height: 300px;"></div>
						<div class="chart tab-pane" id="sales-chart"
							style="position: relative; height: 300px;"></div>
					</div>
				</div>
				<!-- /.nav-tabs-custom -->

				<!-- Quick New Product -->
				<div class="box box-info" id="quick-product-box">
					<div class="box-header">
						<i class="fa fa-envelope"></i>
						<h3 class="box-title">Quick New Product</h3>
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
										<option value="<?php echo $cat->category_id;?>"><?php echo $cat->category_name;?></option>
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
						<button class="pull-right btn btn-default" id="submit-product">
							Submit <i class="fa fa-arrow-circle-right"></i>
						</button>
					</div>
				</div>

			</section>
			<!-- /.Left col -->
			<!-- right col (We are only adding the ID to make the widgets sortable)-->
			<section class="col-lg-5 connectedSortable">

				<!-- Map box -->
				<div class="box box-solid bg-light-blue-gradient">
					<div class="box-header">
						<!-- tools box -->
						<div class="pull-right box-tools">
							<button class="btn btn-primary btn-sm daterange pull-right"
								data-toggle="tooltip" title="Date range">
								<i class="fa fa-calendar"></i>
							</button>
							<button class="btn btn-primary btn-sm pull-right"
								data-widget="collapse" data-toggle="tooltip" title="Collapse"
								style="margin-right: 5px;">
								<i class="fa fa-minus"></i>
							</button>
						</div>
						<!-- /. tools -->

						<i class="fa fa-map-marker"></i>
						<h3 class="box-title">Visitors</h3>
					</div>
					<div class="box-body">
						<div id="world-map" style="height: 250px; width: 100%;"></div>
					</div>
					<!-- /.box-body-->
					<div class="box-footer no-border">
						<div class="row">
							<div class="col-xs-4 text-center"
								style="border-right: 1px solid #f4f4f4">
								<div id="sparkline-1"></div>
								<div class="knob-label">Visitors</div>
							</div>
							<!-- ./col -->
							<div class="col-xs-4 text-center"
								style="border-right: 1px solid #f4f4f4">
								<div id="sparkline-2"></div>
								<div class="knob-label">Online</div>
							</div>
							<!-- ./col -->
							<div class="col-xs-4 text-center">
								<div id="sparkline-3"></div>
								<div class="knob-label">Exists</div>
							</div>
							<!-- ./col -->
						</div>
						<!-- /.row -->
					</div>
				</div>
				<!-- /.box -->

				<!-- solid sales graph -->
				<div class="box box-solid bg-teal-gradient">
					<div class="box-header">
						<i class="fa fa-th"></i>
						<h3 class="box-title">Sales Graph</h3>
						<div class="box-tools pull-right">
							<button class="btn bg-teal btn-sm" data-widget="collapse">
								<i class="fa fa-minus"></i>
							</button>
							<button class="btn bg-teal btn-sm" data-widget="remove">
								<i class="fa fa-times"></i>
							</button>
						</div>
					</div>
					<div class="box-body border-radius-none">
						<div class="chart" id="line-chart" style="height: 250px;"></div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer no-border">
						<div class="row">
							<div class="col-xs-4 text-center"
								style="border-right: 1px solid #f4f4f4">
								<input type="text" class="knob" data-readonly="true" value="20"
									data-width="60" data-height="60" data-fgColor="#39CCCC">
								<div class="knob-label">Mail-Orders</div>
							</div>
							<!-- ./col -->
							<div class="col-xs-4 text-center"
								style="border-right: 1px solid #f4f4f4">
								<input type="text" class="knob" data-readonly="true" value="50"
									data-width="60" data-height="60" data-fgColor="#39CCCC">
								<div class="knob-label">Online</div>
							</div>
							<!-- ./col -->
							<div class="col-xs-4 text-center">
								<input type="text" class="knob" data-readonly="true" value="30"
									data-width="60" data-height="60" data-fgColor="#39CCCC">
								<div class="knob-label">In-Store</div>
							</div>
							<!-- ./col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.box-footer -->
				</div>
				<!-- /.box -->

				<!-- Calendar -->
				<div class="box box-solid bg-green-gradient">
					<div class="box-header">
						<i class="fa fa-calendar"></i>
						<h3 class="box-title">Calendar</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
							<!-- button with a dropdown -->
							<div class="btn-group">
								<button class="btn btn-success btn-sm dropdown-toggle"
									data-toggle="dropdown">
									<i class="fa fa-bars"></i>
								</button>
								<ul class="dropdown-menu pull-right" role="menu">
									<li><a href="#">Add new event</a></li>
									<li><a href="#">Clear events</a></li>
									<li class="divider"></li>
									<li><a href="#">View calendar</a></li>
								</ul>
							</div>
							<button class="btn btn-success btn-sm" data-widget="collapse">
								<i class="fa fa-minus"></i>
							</button>
							<button class="btn btn-success btn-sm" data-widget="remove">
								<i class="fa fa-times"></i>
							</button>
						</div>
						<!-- /. tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body no-padding">
						<!--The calendar -->
						<div id="calendar" style="width: 100%"></div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer text-black">
						<div class="row">
							<div class="col-sm-6">
								<!-- Progress bars -->
								<div class="clearfix">
									<span class="pull-left">Task #1</span> <small
										class="pull-right">90%</small>
								</div>
								<div class="progress xs">
									<div class="progress-bar progress-bar-green"
										style="width: 90%;"></div>
								</div>

								<div class="clearfix">
									<span class="pull-left">Task #2</span> <small
										class="pull-right">70%</small>
								</div>
								<div class="progress xs">
									<div class="progress-bar progress-bar-green"
										style="width: 70%;"></div>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
								<div class="clearfix">
									<span class="pull-left">Task #3</span> <small
										class="pull-right">60%</small>
								</div>
								<div class="progress xs">
									<div class="progress-bar progress-bar-green"
										style="width: 60%;"></div>
								</div>

								<div class="clearfix">
									<span class="pull-left">Task #4</span> <small
										class="pull-right">40%</small>
								</div>
								<div class="progress xs">
									<div class="progress-bar progress-bar-green"
										style="width: 40%;"></div>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
				</div>
				<!-- /.box -->

			</section>
			<!-- right col -->
		</div>
		<!-- /.row (main row) -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
