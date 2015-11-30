<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Product
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
						<h3 class="box-title">List Product</h3>
						<h3>Category <?php echo strtoupper($category)?></h3>
						<p><select id="select-cat" name='category_id'>
							<option value="">All</option>
							<?php foreach($categories as $cat) {?>
							<option value='<?php echo site_url().'admin/product/list/'.$cat->slug?>' <?php echo $category == $cat->slug ? 'selected' : ''?>><?php echo $cat->category_name?></option>
							<?php } ?>
						</select></p>
						<!-- tools box -->
						<div class="pull-right box-tools">
							<a href="<?php echo site_url()?>admin/product/insert" class="btn btn-info btn-sm" ><i class="fa fa-plus"></i></a>
						</div>
						<!-- /. tools -->
					</div>
					<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
                <thead>
                            <tr>
                                <th> No </th>
                                <th> Name </th>
                                <th> Category </th>
                                <th> Price </th>
                                <th> Img </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if ($getAll) {
                                foreach($getAll as $product) { ?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $product->name ?></td>
                                <td><?php echo $product->category_name ?></td>
                                <td><?php echo $product->price ?></td>
                                <td><?php echo !empty($product->path) ? '<img src="'.prod_thumb_url().$product->image_id.$product->ext.'" />' : "No Image" ?></td>
								<td>
                                <?php //if($this->session->userdata('level_id') ==1) {?>
                                  <a href="<?php echo base_url()?>admin/product/update/<?=$product->product_id?>" class="btn btn-info "> <i class="fa fa-edit"> </i></a>
                                  <a href="<?php echo base_url()?>admin/product/delete/<?=$product->product_id?>" class="btn btn-danger " onclick="return confirm('Apakah Anda yakin ingin menghapus?')"> <i class="fa fa-trash-o" > </i></a>
                                </td>
                                <?php //} else { ?>
                                  <!-- <td></td> -->
                                <?php //} ?>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                     </table>
					</div>
                    <div class="row">
                        <?php echo $pagination; ?>
                    </div>
					<div class="box-footer clearfix">
						<button class="pull-right btn btn-default" id="submit-product">
							Update <i class="fa fa-arrow-circle-right"></i>
						</button>
					</div>
				</div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
