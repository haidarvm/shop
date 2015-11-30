<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Create Category
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">Create</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Quick New Category -->
				<div class="box box-info" id="quick-user-box">
					<div class="box-header">
						<i class="fa fa-envelope"></i>
						<h3 class="box-title">New User</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
							<button class="btn btn-info btn-sm" data-toggle="tooltip" title="Add More">
								<i class="fa fa-plus"></i>
							</button>
						</div>
						<!-- /. tools -->
					</div>
					<div class="box-body">
                         <?php if($action=='insert') {?>
						<form action="#" class="form-horizontal" id="quick-user" method="post">
						<?php } else {?>
						<form action="<?php echo site_url();?>admin/user/update/<?php echo !empty($user) ? $user->user_id : "";?>" class="form-horizontal"  method="post">
						<?php  } ?>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Full Name</label>
								<div class="col-sm-10">
									<input id="full_name" name="full_name" class="form-control" value="<?php echo isset($user) ? $user->full_name : '';?>" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">First Name</label>
								<div class="col-sm-10">
									<input id="first_name" name="first_name" class="form-control" value="<?php echo isset($user) ? $user->first_name : '';?>" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Last Name</label>
								<div class="col-sm-10">
									<input id="last_name" name="last_name" class="form-control" value="<?php echo isset($user) ? $user->last_name : '';?>" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Password</label>
								<div class="col-sm-10">
									<input id="password" name="password" class="form-control" value="<?php //echo isset($user) ? $user->last_name : '';?>" type="password">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Renter Password</label>
								<div class="col-sm-10">
									<input id="re_password" name="re_password" class="form-control" value="<?php //echo isset($user) ? $user->last_name : '';?>" type="password">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Email</label>
								<div class="col-sm-10">
									<input id="email" name="email" class="form-control" value="<?php echo isset($user) ? $user->email : '';?>" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Phone</label>
								<div class="col-sm-10">
									<input id="phone" name="phone" class="form-control" value="<?php echo isset($user) ? $user->phone : '';?>" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="name">Address</label>
								<div class="col-sm-10">
									<textarea name="address" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo isset($user) ? $user->address : '';?></textarea>
								</div>
							</div>
					</div>
					<div class="box-footer clearfix">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo !empty($user) ? $user->user_id : "";?>">
						<?php if($action=='insert') { ?>
						<button class="pull-right btn btn-default" id="<?php echo $action;?>-user">
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
