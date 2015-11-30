<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List New Order
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Order</a></li>
            <li class="active">List</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Quick New Product -->
				<div class="box box-info" id="quick-product-box">
					<div class="box-header">
						<i class="fa fa-envelope"></i>
						<h3 class="box-title">New Order</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
							<button class="btn btn-info btn-sm" data-toggle="tooltip" title="Add More">
								<i class="fa fa-plus"></i>
							</button>
						</div>
						<!-- /. tools -->
					</div>
					<div class="box-body">
					<div>
					<p>Full Name : <?php echo $user->full_name;?></p>
					<p>Email : <?php echo $user->email;?></p>
					<p>Phone : <?php echo $user->phone;?></p>
					<p>Address : <?php echo $user->address;?></p>
					<p>Total Price : <?php echo $user->address;?></p>
					<p>Total Qty : <?php echo $user->address;?></p>
					</div>
							<table id="example1" class="table table-bordered table-striped">
                <thead>
                        <tr>
                                <th> No </th>
                                <th> Order Id </th>
                                <th> Product </th>
                                <th> Qty </th>
                                <th> Size </th>
                                <th> Price </th>
                                <th> Date </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach($allOrder as $order) {?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $order->order_id ?></td>
                                <td><?php echo $order->name ?>(<?php echo $order->category_name ?>)</td>
                                <td><?php echo $order->qty ?></td>
                                <td><?php echo $order->size ?></td>
                                <td><?php echo number_format($order->price) ?></td>
                                <td><?php echo $order->create_date ?></td>
                                <td>
                    <?php //if($this->session->userdata('level_id') ==1) {?>
                                  <a href="<?php echo base_url()?>admin/order/edit/<?=$order->order_id?>" class="btn btn-info "> <i class="fa fa-edit"> </i></a>
                                  <a href="<?php echo base_url()?>admin/order/delete/<?=$order->order_id?>" class="btn btn-danger " onclick="return confirm('Apakah Anda yakin ingin menghapus?')"> <i class="fa fa-trash-o" > </i></a>
                                </td>
                    <?php //} else { ?>
                      <!-- <td></td> -->
                    <?php //} ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                     </table>
					</div>
					<div class="box-footer clearfix">
						<button class="pull-right btn btn-default" id="submit-product">
							New Order <i class="fa fa-arrow-circle-right"></i>
						</button>
					</div>
				</div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
