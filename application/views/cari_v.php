<?php
  include_once('layout/wrapper.php');
 ?>


	<section>
    <?php
      include_once('layout/sidebar.php');
     ?>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
            <?php
            if($data == ''){
                ?>
              <h2 class="center">I'am Sorry, There is nothing here yet :(</h1>
            <?php
            }
            else {
            foreach ($data as $key) {

              ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
                    <img src="<?php echo base_url()?>assets/images/home/<?php echo $key->gambar?>"
                     width="208px" height="183px" alt="" />
                    <h2>Rp. <?php echo ($key->harga);?></h2>
                    <p><a href="<?php echo base_url()?>" ><?php echo $key->nama_barang?></a></p></div>
                    <a href="<?php echo base_url()?>/DetailProduct/getbarang/<?php echo ($key->id_barang)?>"><div class="product-overlay">
                      <div class="overlay-content">
                        <h2>Rp. <?php echo number_format($key->harga);?></h2>
                        <p><?php echo ($key->nama_barang);?></p>
                      </div>
                    </div></a>
                    <?php if ($key->stok == 0) {
                      # code...
                    ?><img src="<?php echo base_url()?>assets/images/product-details/outstock.png" width="260px" class="newarrival" alt="" /><?php } else {

                    }?>
								</div>
                <br>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
                    <?php
                    $id_barang = $key->id_barang;
                    foreach ($this->c->getrating($id_barang) as $y) {
                      $rata = $y->avg_r;
                      if($rata == 5 && $rata > 4.5){
                        echo "<p align='center'><img src='http://localhost/SKYMarket3/assets/images/product-details/5.png' width='100'></img></p>";
                      }
                      elseif($rata == 4.5 && $rata > 4){
                        echo "<p align='center'><img src='http://localhost/SKYMarket3/assets/images/product-details/4setengahbintang.png' width='100'></img></p>";
                      }
                      elseif($rata == 4 && $rata > 3.5){
                        echo "<p align='center'><img src='http://localhost/SKYMarket3/assets/images/product-details/4bintang.png' width='100'></img></p>";
                      }
                      elseif($rata == 3.5 && $rata > 4){
                        echo "<p align='center'><img src='http://localhost/SKYMarket3/assets/images/product-details/3setengahbintang.png' width='100'></img></p>";
                      }
                      elseif($rata == 3 && $rata > 2.5){
                        echo "<p align='center'><img src='http://localhost/SKYMarket3/assets/images/product-details/3bintang.png' width='100'></img></p>";
                      }
                      elseif($rata == 2.5 && $rata > 2){
                        echo "<p align='center'><img src='http://localhost/SKYMarket3/assets/images/product-details/2setengahbintang.png' width='100'></img></p>";
                      }
                      elseif($rata == 2 && $rata > 1.5){
                        echo "<p align='center'><img src='http://localhost/SKYMarket3/assets/images/product-details/2bintang.png' width='100'></img></p>";
                      }
                      elseif($rata == 1.5 && $rata > 1){
                        echo "<p align='center'><img src='http://localhost/SKYMarket3/assets/images/product-details/1setengahbintang.png' width='100'></img></p>";
                      }
                      elseif($rata == 1 && $rata > 0){
                        echo "<p align='center'><img src='http://localhost/SKYMarket3/assets/images/product-details/1bintang.png' width='100'></img></p>";
                      }
                      else {
                        echo "<h5 align='center'>Belum ada rating</h5>";
                      }

                    }?>
                    <form action="<?php if ($this->session->userdata('id_user')==''){
                      $this->session->set_flashdata('gagal','Please login');
                      echo base_url('login');
                    }
                    else{
                      echo base_url('Home/addwishlist');
                    }
                    ?>" method="post">
                      <input type="hidden" name="id_wishlist" value="<?php
                      $kode = uniqid();
                      $kode2="WL".str_pad($kode,3,"0",STR_PAD_LEFT);
                      echo $kode2;?>" placeholder="<?php echo $kode?>"/>
                      <input type="hidden" name="id_user"
                      value="<?php echo ucfirst($this->session->userdata('id_user'));?>"
                      placeholder="<?php echo ucfirst($this->session->userdata('id_user'));?>"/>
                      <input type="hidden" name="id_barang"
                      value="<?php echo ($key->id_barang);?>" placeholder="<?php echo ($key->id_barang);?>"/>
                      <input type="submit" value="+ add to wishlist" class="btn btn-default" ></input>
                    </form><br>
                    <?php if ($key->stok != 0) {
                      # code...
                    ?>
                    <form action="<?php if ($this->session->userdata('id_user')==''){
                      $this->session->set_flashdata('gagal','Please Login');
                      echo base_url('login');
                    }
                    else{
                      echo base_url('Home/cart');
                    }
                    ?>" method="post">
                      <input type="hidden" name="id_cart" value="<?php
                      $kode = uniqid();
                      $kode2="CR".str_pad($kode,3,"0",STR_PAD_LEFT);
                      echo $kode2;?>" placeholder="<?php echo $kode?>"/>
                      <input type="hidden" name="id_user"
                      value="<?php echo ucfirst($this->session->userdata('id_user'));?>"
                      placeholder="<?php echo ucfirst($this->session->userdata('id_user'));?>"/>
                      <input type="hidden" name="id_barang"
                      value="<?php echo ($key->id_barang);?>" placeholder="<?php echo ($key->id_barang);?>"/>
                      <input type="hidden" name="sub_total"
                      value="<?php echo ($key->harga);?>" placeholder="<?php echo ($key->harga);?>"/>
                      <input type="hidden" name="berat_total" value="<?php echo($key->berat);?>">
                       <input type="hidden" name="jumlah" value="1" placeholder="1">
                      <input type="submit" value="      &nbsp;&nbsp;&nbsp;+ add to cart&nbsp;&nbsp;&nbsp;        " class="btn btn-default" ></input>
                    </form>
                    <?php }else {
                      ?>
                      <form>
                      <button type="submit" id="dis" class="btn btn-default" >      &nbsp;&nbsp;&nbsp;+ add to cart&nbsp;&nbsp;&nbsp;        </button><br><br><br>
                    </form>
                  <?php  }?>
                  </ul>
								</div>
							</div>
						</div>

            <?php } }?>

					<!--	<ul class="pagination">
							<li class><a href=""></a></li>
              <?php foreach ($links as $link) {
echo "<li>". $link."</li>";
} ?>

						</ul>-->
					</div><!--features_items-->


				</div>
			</div>
		</div>
	</section>
  <?php
    include_once('layout/footer.php');
   ?>
   <script>
   $(document).ready(function() {
       $('#dis').attr('disabled',true);
   });
   </script>
