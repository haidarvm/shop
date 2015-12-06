<!--   Content top
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="content">
  <div class="container">
    <div class="row">
        <div class="twelve columns"><!-- Top info -->
            <div class="infotop">
                <p>Deftly tailored from very fine woven egyptian cotton, these shirts are smooth to the touch, though still maintain their elegant shape. Essential pieces that easily cross from the week into the weekend.</p>
            </div>
        </div><!-- End Top info -->
    </div>
  </div>
</div>

<!--   Content produk
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="content">
    <div class="container">
    <?php 
    $i = -1;
    $prod_details = array();
    $slider_id = array();
    foreach($product as $key => $row) {
        
        $slider_id[] = '#slider'.$row->product_id; 
        // set an array for product detail
        $prod_details[$key] = array(
            'id' => $row->product_id,
            'image' => prod_small_url() . $row->image_id . $row->ext,
            'full_name' => $row->full_name,
            'name' => $row->name,
            'description' => ($row->description) ? $row->description : $row->shortdesc,
            'shortdesc' => $row->shortdesc,
            'price' => $row->price,
            'pImages' => $mproduct->getAllProductImg($row->product_id),
        );

        $i++;
        $key++;
        if($i % 4 ===0 && $i !=0) {
            echo "</div>\n";
        }
        if($i % 4 ===0 || $i ==0 ) {
            echo "<div class='row'>\n";
        }
    ?>
        <div class="three columns">
            <a class="tab_link" title="#p<?php echo $row->product_id;?>" href="#p<?php echo $row->product_id; ?>">
                <div class="produk">
                    <div class="barang"><img src="<?php echo img_url();?>bnew.png"/></div>
                    <div class="gmbproduk"><img class="gmbproduk" src="<?php echo prod_small_url().$row->image_id.$row->ext?>"/></div>
                    <div class="hoverproduk">
                        <div class="hpnam"><img src="<?php echo img_url();?>hp4.png" /></div>
                    </div>
                </div>
            </a>
        </div>
    <?php 
    
    if ($key !== 0 && $key % 4 === 0 && $prod_details ) { ?>
        <div class="twelve columns">
        <?php 
        foreach ($prod_details as $detail) {
			 ?>
            <div class="tab_text" id="p<?php echo $detail['id']; ?>">
                <div class="slider" id="slider<?php echo $detail['id']; ?>">
                    <a class="control_next"><img src="<?php echo img_url() . 'arr/right.png'; ?>"/></a>
                    <a class="control_prev"><img src="<?php echo img_url() . 'arr/left.png'; ?>"/></a>
                    <ul>
                        <li>
                            <div class="acc<?php echo $detail['id']; ?>">
                            <?php foreach ($detail['pImages'] as $idx => $pImage) :
                                $leftClass = ($idx !== 0 && $idx % 2 == 0) ? 'prod-next-row' : '';
                            ?>
                                <img class="one-half column gmbproduk <?= $leftClass ?>" src="<?php echo prod_small_url() . $pImage->image_id .$pImage->ext; ?>"/>
                            <?php endforeach; ?>
                            </div>
                        </li>
                        <li>
                            <div class="acc<?php echo ($detail['id'] + 1); ?>">
                                <img class="one-half column gmbprodukc" src="<?php echo $detail['image']; ?>"/>
                                <div class="one-half column">
                                    <h6 class="kiri"><?php echo $detail['name']; ?></h6>
                                    <div class="row" style="margin-bottom:1px !important;">
                                        <div class="one-half column kiri">(<?php echo $detail['shortdesc']; ?>)</div>
                                        <div class="one-half column kanan"><?php echo 'Rp ' . number_format($detail['price'], 0, ',', '.'); ?></div>
                                    </div>
                                    <div class='item' style='background-image: url("<?php echo img_url() . 'arr/bottom.png'; ?>");'>DESCRIPTION</div>
                                    <div class='item-data active' style="display: block;">
                                        <div><?php echo $detail['description']; ?></div>
                                    </div>
                                    <div class='item'>COLOURS</div>
                                    <div class='item-data'>
                                        <div class="row">
                                            <div class="two columns">
                                                <img width="100%" src="<?php echo img_url() . 'color/1.jpg'; ?>"/>
                                            </div>
                                            <div class="two columns">
                                                <img width="100%" src="<?php echo img_url() . 'color/2.jpg'; ?>"/>
                                            </div>
                                            <div class="two columns">
                                                <img width="100%" src="<?php echo img_url() . 'color/3.jpg'; ?>"/>
                                            </div>
                                            <div class="two columns">
                                                <img width="100%" src="<?php echo img_url() . 'color/4.jpg'; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='item'>SIZING</div>
                                    <div class='item-data' >
                                        <table class="u-full-width">
                                            <thead>
                                                <tr>
                                                    <th>SIZE</th>
                                                    <th>S</th>
                                                    <th>M</th>
                                                    <th>L</th>
                                                    <th>XL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>CHEST</td>
                                                    <td>18.1" 46cm</td>
                                                    <td>19.3" 49cm</td>
                                                    <td>20.1" 51cm</td>
                                                    <td>20,8" 53cm</td>
                                                </tr>
                                                <tr>
                                                    <td>LENGHT</td>
                                                    <td>26,7" 68cm</td>
                                                    <td>27,9" 71cm</td>
                                                    <td>28,7" 73cm</td>
                                                    <td>29,5" 75cm</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div></div>
                                    <div class='item'>FABRIC</div>
                                    <div class='item-data' >
                                        <div>
                                            100% Egyptian cotton, Classic fit, True to size - if between sizes opt for the smaller, Model wears a size Medium, Model measures - height: 6’2”/188cm, chest: 40”/101.5cm, waist: 32''/81cm, Machine wash at 40 degrees, Made in Indonesia.
                                        </div>
                                    </div>
                                    <div class='item'>SHIPPING & RETURNS</div>
                                    <div class='item-data' >
                                        <div>
                                            FREE SHIPPING purchase over $200, Standard Post: 10-12 working days.
                                            <p>For full delivery and returns information, <u>click here</u>.</p>
                                            Due to the high volume of orders during promotions or sales, we regret we cannot make any amendments to purchases once ordered and the processing of returns will take longer than normal.
                                        </div>
                                    </div>
                                    <div class="twelve columns">
                                        <div class="one-half column">
                                            <select class="u-full-width" id="size-<?= $detail['id'] ?>">
                                                <option value="">SELECT SIZE</option>
                                                <?php foreach($sizes as $val => $size) : ?>
                                                    <option value="<?= $val ?>"><?= $size ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input value="ADD TO WISHLIST" type="submit" class="button button-primary u-full-width">
                                            <div class="sosmed">
                                                <img width="15%" src="<?php echo img_url(); ?>twitter.png">
                                                <img width="15%" src="<?php echo img_url(); ?>instagram.png">
                                                <img width="15%" src="<?php echo img_url(); ?>facebook.png">
                                                <img width="15%" src="<?php echo img_url(); ?>tumblr.png">
                                                <img width="15%" src="<?php echo img_url(); ?>pinterest.png">
                                                <img width="15%" src="<?php echo img_url(); ?>youtube.png">
                                            </div>
                                        </div>
                                        <div class="one-half column">
                                            <span>
                                                QUANTITY
                                                <input value="-" type="button" data-id="<?= $detail['id'] ?>" class="butq btn-min" style="padding: 0px 15px;margin-left:5px;">
                                                <input value="1" type="text" class="butq" id="qty-<?= $detail['id'] ?>">
                                                <input value="+" type="button" data-id="<?= $detail['id'] ?>" class="butq btn-plus" style="padding: 0px 15px;">
                                            </span>
                                            <input value="ADD TO BASKET" data-id="<?= $detail['id'] ?>" type="button" class="btn-add button button-primary u-full-width" style="margin-top:10px;">
                                            <a href="D006.html"><u><i><b>Email a Friend</b></i></u></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="kiri" style="float: left;margin-top: 10px;">|#| <?php echo $detail['full_name']; ?></div>
                <div>
                    <a href="#" class="tutup closetab">
                        <img src="<?php echo img_url(); ?>close-icon.png">
                    </a>
                </div>
            </div>
        <?php } ?>
        </div>
    <?php
            $prod_details = array();
        }
    }
    ?>
    </div><!-- End container -->
    <div class="row">
        <?php echo $pagination; ?>
    </div>
</div><!-- End home info -->

