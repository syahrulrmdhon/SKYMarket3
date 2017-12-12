<?php
  include_once('layout/wrapper.php');
 ?>
 <?php
// Proteksi halaman
    $this->simple_login->cek_login();
  ?>
 <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">wishlist</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="total">Aksi</td>
							<td></td>
						</tr>
					</thead>
          <?php
          $id_user = $this->session->userdata('id_user');
          $u = 0;
          $jw = count($this->d->Tampilkan2($id_user));
          foreach($this->d->Tampilkan2($id_user) as $key) {
            ?>
          <tbody>

						<tr>
							<td class="cart_product">
								<a href="<?php echo base_url()?>DetailProduct/getbarang/<?php echo ($key->id_barang)?>"><img src="<?php echo base_url()?>assets/images/home/<?php echo ($key->gambar)?>"
                  width="180px" alt=""></a>
							</td>
							<td >
								<h4><a href="<?php echo base_url()?>DetailProduct/getbarang/<?php echo ($key->id_barang)?>"><?php echo ($key->nama_barang)?></a></h4>
							</td>
							<td class="cart_price">
								<p>Rp. <?php echo  number_format($key->harga);?></p>
							</td>
							<td class="cart_delete">
                <input type="hidden" id="jw" value="<?php echo $jw;?>">
                   <input type="hidden" name="id_wishlist" id="id_wishlist" value="<?php echo $key->id_wishlist;?>"></input>
               <button type="submit" id="hapus-wishlist" class='btn btn-xs btn-danger'><i class='glyphicon glyphicon-remove'></i> &nbsp;delete&nbsp;</button>
							</td>
						</tr>

					</tbody>
          <?php $u++;} ?>
				</table>
			</div>
		</div>

	</section> <!--/#cart_items-->


		</div>
	</section><!--/#do_action-->

  <footer>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <p class="pull-left">Copyright © 2017 SKYMarket Inc. All rights reserved.</p>
        <p class="pull-right">Designed by SyahrulR</p>
      </div>
    </div>
  </div>

  </footer><!--/Footer-->

  </body>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/jQuery.min.js"></script>
  <script>
  $(document).ready(function() {
    var jww=$('#jw').val();
        var $row = $(this).parent().parent();
    $(document).on("click","#hapus-wishlist",function() {
      var id_wishlist=$('#id_wishlist').val();
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



  </html>
