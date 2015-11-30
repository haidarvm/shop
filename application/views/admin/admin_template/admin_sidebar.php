<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo base_url();?>assets/img/user2-160x160.jpg"
					class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>haidarvm</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control"
					placeholder="Search..."> <span class="input-group-btn">
					<button type="submit" name="search" id="search-btn"
						class="btn btn-flat">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			<li class="active treeview"><a href="<?php echo site_url()?>admin/"> <i class="fa fa-dashboard"></i>
					<span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li class="active"><a href="<?php echo site_url()?>admin/"><i class="fa fa-circle-o"></i>
							Dashboard v1</a></li>
					<li><a href="<?php echo site_url()?>admin/dashboard/other"><i
							class="fa fa-circle-o"></i> Dashboard v2</a></li>
				</ul></li>
			<li><a href="<?php echo site_url()?>admin/product/list"><i class="fa fa-cubes"></i><span> List Product</span></a></li>
			<li><a href="<?php echo site_url()?>admin/user/list"><i class="fa fa-cubes"></i><span> List User</span></a></li>
			<li><a href="<?php echo site_url()?>admin/product/insert"><i class="fa fa-edit"></i><span> New Product</span></a></li>
			<li><a href="<?php echo site_url()?>admin/order/get_all_draft"><i class="fa fa-files-o"></i><span> Draft Order</span></a></li>
			<li><a href="<?php echo site_url()?>admin/order"><i class="fa fa-files-o"></i><span> New Order</span></a></li>
			<li><a href="<?php echo site_url()?>admin/order/get_all_done"><i class="fa fa-files-o"></i><span> History Transaction</span></a></li>
			<li><a href="<?php echo site_url()?>admin/category"><i class="fa fa-files-o"></i><span> Category</span></a></li>
			<!-- <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li> -->
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>