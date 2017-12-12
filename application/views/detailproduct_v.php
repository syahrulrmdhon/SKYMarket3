<?php
  include_once('layout/wrapper.php');
 ?>                                                                                                                                                                                                                                                         
 <?php
   include_once('layout/sidebar.php');
  ?>
<div class="col-sm-9 padding-right">
  <?php foreach ($data as $key) {
    if ($key->stok > 0) {
  ?>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo base_url()?>assets/images/home/<?php echo $key->gambar?>" alt="" />
							</div>


						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo $key->nama_barang;?></h2>
								<p>Web ID: <?php echo $key->id_barang;?></p>
								<span>
									<span>RP <?php echo number_format($key->harga);?></span>
									<label>Jumlah:</label>
                  <form action="<?php if ($this->session->userdata('id_user')==''){
                    $this->session->set_flashdata('sukses','Please login');
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
                  <input type="hidden" name="berat_total" value="<?php echo($key->berat);?>">
                  <input type="hidden" name="sub_total"
                  value="<?php echo ($key->harga);?>" placeholder="<?php echo ($key->harga);?>"/>
                  <div class="cart_quantity_button">
                  <select name="quantity" id="quantity">
                    <?php $jum = $key->stok;
                    for ($i=1; $i <= $jum ; $i++ ) {
                      echo "<option value='".$i."'>".$i."</option>";
                    }

                    ?>
                  </select>
                  <input type="hidden" name="jumlah" id="jumlah" value="1"/>
                </div>
                <br><br>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Tambah Keranjang
									</button>
                </form>
								</span>
								<p><b>Ketersediaan:</b> Tersedia</p>
								<p><b>Stock:</b> <?php echo $key->stok?> </p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
          <?php } else {

          ?>
          <div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo base_url()?>assets/images/home/<?php echo $key->gambar?>" alt="" />
							</div>


						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="<?php echo base_url()?>assets/images/product-details/outstock.png" class="newarrival" alt="" />
								<h2><?php echo $key->nama_barang;?></h2>
								<p>Web ID: <?php echo $key->id_barang;?></p>
								<span>
									<span>RP <?php echo number_format($key->harga);?></span>
								</span>
								<p><b>Ketersediaan:</b> Stok habis</p>
								<p><b>Stock:</b> <?php echo $key->stok?> </p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
          <?php }
        }?>

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
                <div class="col-sm-12">
                  <?php foreach ($data as $key) {?>
                  <h4><?php echo $key->nama_barang?></h4>
									<p><?php
									  echo $key->deskripsi_produk;
									}?></p>
                </div>
								</div>



							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
                  <div class="register-req">
                  <?php
                    $id_barang = $key->id_barang;
                  foreach ($this->d->getkomenrating($id_barang) as $ey) {
                    $i=0;
                    $id = $ey->id_user;
                  ?>
									<ul>
										<li><i class="fa fa-user"></i> <?php
                    foreach ($this->d->getuser($id) as $key) {
                      echo $key->nama_lengkap;}?></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
										<li><a href=""><i class="fa fa-calendar-o"></i><?php echo $ey->tanggal_rating;?></a></li>
									</ul>
									<h5><?php echo $ey->komentar?></h5><hr>
                  <?php $rat = $ey->rating;?>
                  <img src="<?php echo base_url()?>assets/images/product-details/<?php
                  if($rat == 5){
                    echo "5.png";
                  }
                  elseif($rat == 4){
                    echo "4bintang.png";
                  }
                  elseif($rat == 3){
                    echo "3bintang.png";
                  }
                  elseif($rat == 2){
                    echo "2bintang.png";
                  }
                  elseif($rat == 1){
                    echo "1bintang.png";
                  }
                  ?>" width="100"></img>
                  <?php if ($id == $this->session->userdata('id_user')) {
                    ?>
                    <a href="<?php echo base_url('DetailProduct/hapuskomen/'.$ey->id_rating)?>/<?php echo $id_barang?>" onclick="return dialog();">Hapus</a>
                    <?php
                  }?>
                  <br><br>
                  <?php $i++; }?>
                </div>
                  <p><b>Tulis Review Anda</b></p>

									<form action="<?php
                  foreach ($data as $a){
                    $id_barang = $a->id_barang;
                  }
                  if($this->session->userdata('id_user') == ''){
                    $this->session->set_flashdata('sukses','Anda belum login');
                    echo base_url('login');
                  }else{
                    echo base_url('DetailProduct/postrate/'.$id_barang);?>
                  <?php }?>" method="post">
										<textarea name="komentar" ></textarea>
                    <input type="hidden" name="id_user" value="<?php echo ucfirst($this->session->userdata('id_user'));?>"/>
                    <input type="hidden" name="id_rating" value="<?php
                    $kode = uniqid();
                    $kode2="RT".str_pad($kode,3,"0",STR_PAD_LEFT);
                    echo $kode2;?>"/>
                    <input type="hidden" name="tanggal_rating" value="<?php echo date('Y-m-d H:i:s');?>"/>
                    <input type="hidden" name="id_barang" value="<?php foreach ($data as $k){
                      echo $k->id_barang;
                    }?>"/>
                    <label for="rating" class="control-label">Rate</label>
                    <input id="rating" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="1"></input>
										<input type="submit" class="btn btn-default pull-right" placeholder="Kirim"></input>
									</form>
								</div>
							</div>
              </div>

						</div>
					</div><!--/category-tab-->


				</div>
			</div>
		</div>
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
      $(document).on("change","#quantity",function () {
        var value=$('#quantity').val();
        $('#jumlah').val(value);
      })
    });
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
    <script>
    function dialog(){
      return confirm("Anda yakin ingin menghapus komentar ini?");
}
    </script>

    </html>
