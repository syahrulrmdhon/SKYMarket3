<?php
  include_once('layout/wrapper.php');
 ?>
 <?php /*
 // Proteksi halaman
 $this->simple_login->cek_role();*/
 ?>
  <section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
              <?php foreach ($this->c->getslider() as $key) {
              ?>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>SKY</span>-MARKET</h1>
									<h2><?php
                  $id = $key->id_barang;
                  foreach ($this->c->getbarang($id) as $ky) {
									  echo $ky->nama_barang;
									}?></h2>
									<p><?php echo $key->judul_slider;?></p>

									<button type="button" class="btn btn-default get"><a href="<?php echo base_url()?>DetailProduct/getbarang/<?php echo $key->id_barang;?>">Get it now</a></button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url()?>assets/images/home/<?php $id = $key->id_barang;
                  foreach ($this->c->getbarang($id) as $ky) {
									  echo $ky->gambar;
									} ?>" width="300px" class="girl img-responsive" alt="" />
								</div>
							</div>
              <?php }?>
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>SKY</span>-MARKET</h1>
									<h3>Belanja Mudah disini</h3>
									<p>PT. SAID KRAMA YUDHA is a General Supply company
                    that......</p>
                     <button type="button" class="btn btn-default get"><a href="http://www.saidky.com/">See more</a></button>
								</div>
								<div class="col-sm-6">
                  <img src="<?php echo base_url()?>assets/images/home/Home.jpg"  width="350px" class="girl img-responsive" alt="" />
								</div>
							</div>

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->
  <?php
    include_once('layout/sidebar.php');
   ?>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Barang Baru</h2>
             <?php echo $this->session->flashdata('message');?>
            <?php
            foreach ($this->c->Tampilkan1() as $key) {
              ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo base_url()?>assets/images/home/<?php echo ($key->gambar)?>"
                       width="208px" height="183px" alt="" />
											<h2>Rp. <?php echo number_format($key->harga);?></h2>
											<p><a href="<?php echo base_url()?>DetailProduct/getbarang/<?php echo ($key->id_barang)?>" ><?php echo ($key->nama_barang);?></a></p>
                      <p>&nbsp;&nbsp;&nbsp;<?php $isidikit=$key->deskripsi_produk;
                          $isidikit=character_limiter($isidikit,50);
                          echo $isidikit;?></p>

										</div>
										<a href="<?php echo base_url()?>DetailProduct/getbarang/<?php echo ($key->id_barang)?>"><div class="product-overlay">
											<div class="overlay-content">
												<h2>Rp. <?php echo number_format($key->harga);?></h2>
												<p><?php echo ($key->nama_barang);?></p>
											</div>
										</div></a>
                    <img src="<?php echo base_url()?>assets/images/home/new.png" class="new" alt="" />
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
                      $this->session->set_flashdata('sukses','Anda belum login');
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
                      <input type="submit" value="Tambah wishlist" class="btn btn-default" ></input>
                    </form><br>
                    <?php if ($key->stok != 0) {
                      # code...
                    ?>
                    <form id="carti" action="<?php if ($this->session->userdata('id_user')==''){
                      $this->session->set_flashdata('gagal','Anda belum login');
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
                      <input id="id_user" type="hidden" name="id_user"
                      value="<?php echo ucfirst($this->session->userdata('id_user'));?>"
                      placeholder="<?php echo ucfirst($this->session->userdata('id_user'));?>"/>
                      <input id="id_barang" type="hidden" name="id_barang"
                      value="<?php echo ($key->id_barang);?>" placeholder="<?php echo ($key->id_barang);?>"/>
                      <input id="sub_total" type="hidden" name="sub_total"
                      value="<?php echo ($key->harga);?>" placeholder="<?php echo ($key->harga);?>"/>
                      <input id="berat_total" type="hidden" name="berat_total" value="<?php echo($key->berat);?>">
                       <input id="jumlah" type="hidden" name="jumlah" value="1" placeholder="1">
                      <input type="submit" id="btn-cart" value="Masuk Keranjang" class="btn btn-default" ></input>
                    </form>
                    <?php }else {
                      ?>
                      <form>
                      <button type="submit" id="dis" class="btn btn-default" >      Masuk Keranjang        </button><br><br><br>
                    </form>
                  <?php  }?>
									</ul>
								</div>
							</div>
						</div>
            <?php } ?>
					</div><!--features_items-->
          <div class="features_items"><!--features_items-->
						<h2 class="title text-center">Hot Items</h2>
             <?php echo $this->session->flashdata('message');?>
            <?php
            foreach ($this->c->hotlist() as $key) {
              ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo base_url()?>assets/images/home/<?php echo ($key->gambar)?>"
                       width="208px" height="183px" alt="" />
											<h2>Rp. <?php echo number_format($key->harga);?></h2>
											<p><a href="<?php echo base_url()?>DetailProduct/getbarang/<?php echo ($key->id_barang)?>" ><?php echo ($key->nama_barang);?></a></p>
                      <p>&nbsp;&nbsp;&nbsp;<?php $isidikit=$key->deskripsi_produk;
                          $isidikit=character_limiter($isidikit,50);
                          echo $isidikit;?></p>
										</div>
                    <a href="<?php echo base_url()?>DetailProduct/getbarang/<?php echo ($key->id_barang)?>"><div class="product-overlay">
											<div class="overlay-content">
												<h2>Rp. <?php echo number_format($key->harga);?></h2>
												<p><?php echo ($key->nama_barang);?></p>
											</div>
										</div></a>
                    <img src="<?php echo base_url()?>assets/images/home/hot.png" width="42px" class="new" alt="" />
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
                      $this->session->set_flashdata('sukses','Please login');
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
                      <input type="submit" value="Tambah wishlist" class="btn btn-default" ></input>
                    </form><br>
                    <?php if ($key->stok != 0) {
                      # code...
                    ?>
                    <form action="<?php if ($this->session->userdata('id_user')==''){
                      $this->session->set_flashdata('gagal','Please login');
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
                      <input type="submit" value="Masuk Keranjang" class="btn btn-default" ></input>
                    </form>
                    <?php }else {
                      ?>
                      <form>

                      <button type="submit" id="dis" class="btn btn-default" > Masuk Keranjang</button><br><br><br>
                    </form>
                  <?php  }?>
									</ul>
								</div>
							</div>
						</div>
            <?php } ?>
					</div><!--features_items-->

			</div>
		</div>
	</section>
  <footer>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <p class="pull-left">Copyright © 2017 SKYMarket Inc. All rights reserved.</p>
      </div>
    </div>
  </div>

  </footer><!--/Footer-->

  </body>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jQuery.min.js"></script>

  <script>
  $(document).ready(function() {
      $('#dis').attr('disabled',true);
  });
  </script>
  <script>
  $(document).ready(function() {
    var jww=$('#jw').val();
    for (var i = 0; i < jww; i++) {
        var id_wishlist=$('#id_wishlist'+i).val();
        var $row = $(this).parent().parent();
    $(document).on("click","#hapus-wishlist"+i,function() {
  swal({
    title:"Delete Wishlist",
    text:"Are you sure?",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Delete",
    closeOnConfirm: true,
  },
    function(){
     $.ajax({
      url:"<?php echo base_url('Wishlist/delete')?>",
      type: "POST",
      data:{id_wishlist:id_wishlist},
      success: function(data){// if true (1)
        $("body").html(data);

      }
     });
  });

    })
      }
  })
  </script>
  <script src="<?php echo base_url()?>assets/js/bootsrap.js"></script>
  <script src="<?php echo base_url()?>assets/js/star-rating.js"></script>
  <!--<script type="text/javascript" src="<?php echo base_url()?>assets/jquery.js"></script>-->
  <script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/star-rating.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.scrollUp.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/price-range.js"></script>
  <script src="<?php echo base_url()?>assets/js/jquery.prettyPhoto.js"></script>
  <script src="<?php echo base_url()?>assets/js/main.js"></script>
  <script type="text/javascript" src="//rajaongkir.com/script/widget.js"></script>



  </html>
