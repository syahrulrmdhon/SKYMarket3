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
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah</td>
							<td class="total">Sub Total</td>
							<td>Aksi</td>
						</tr>
					</thead>

					<tbody>
            <?php
            $id_user = $this->session->userdata('id_user');
            $u = 0;
            $jc = count($data);
            foreach($data as $key) {
              ?>
						<tr <?php $id=$key->id_barang;
             foreach($this->h->tampilcart2($id) as $ky){

             ?>
             id='data<?php echo $ky->id_cart;?>'
             <?php }?>>
							<td class="cart_product">
								<a href=""><img
                  <?php $id=$key->id_barang;
                   foreach($this->h->tampilcart2($id) as $ky){

                   ?>
                   data-id='<?php echo $ky->id_cart;?>'
                   <?php }?>
                  src="<?php echo base_url()?>assets/images/home/<?php echo ($key->gambar)?>"
                  width="180px" alt=""></a>
							</td>
							<td >
								<h4
                <?php $id=$key->id_barang;
                 foreach($this->h->tampilcart2($id) as $ky){

                 ?>
                 data-id='<?php echo $ky->id_cart;?>'
               <?php }?>><a href="<?php echo base_url('DetailProduct/getbarang/').$ky->id_barang?>"><?php echo ($key->nama_barang)?></a></h4>
							</td>
							<td class="cart_price">
								<p>Rp. <?php echo  number_format($key->harga);?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<!--<input class="cart_quantity_input" type="text" id="quantity" name="quantity"
                  <?php $id=$key->id_barang;
                   foreach($this->h->tampilcart2($id) as $ky){
                   ?>value="<?php echo $ky->jumlah;?>" <?php }?> autocomplete="off" size="2">-->
                   <select name="quantity" id="quantity<?php echo $u; ?>">
                     <?php $jum = $key->stok;
                     $id=$key->id_barang;
                     foreach($this->h->tampilcart2($id) as $ky){
                       $j= $ky->jumlah;}
                       echo "<option value='".$j."' selected>".$j."</option>";
                     for ($i=1; $i <= $jum ; $i++ ) {
                       echo "<option value='".$i."'>".$i."</option>";
                     }

                     ?>
                   </select>
								</div>
							</td>
							<td class="cart_total">
								<input readonly="readonly" class="cart"
                 value="Rp.  <?php echo number_format($ky->sub_total);?>" id="sub_total" size="9"></input>
                 <input type="hidden" id="brt<?php echo $u;?>" value="<?php $a= $key->berat;
                 $b = $key->jumlah;
                 $au = $key->berat_total;
                 $au[$u];
                 $ber[$u] = $a * $b;
                 echo $ber[$u];?>"></input>
							</td>

							<td class="cart_delete">

                <form action="<?php echo base_url()?>Cart/updatej" method="post">
                   <input type="hidden" name="id_cart"  value="<?php echo $key->id_cart;?>"></input>
                   <input type="hidden" name="harga" value="<?php echo $key->harga;?>"></input>
                   <input type="hidden" name="berat_total" value="<?php echo $key->berat;?>"></input>
                  <input type="hidden" name="jumlah" id='jumlah<?php echo $u; ?>' value="1"></input>
                  <input type="hidden" name="jc" id='jc' value="<?php echo $jc;?>"></input>
                   <button type="submit" class='btn btn-xs btn-success'><i class='glyphicon glyphicon-edit'></i> edit</button>
                 </form><br>


                    <input type="hidden" name="id_cart" id="id_cart<?php echo $u;?>" value="<?php echo $key->id_cart;?>"></input>
                <button type="submit" class='btn btn-xs btn-danger' id="hapus-cart<?php echo $u;?>"><i class='glyphicon glyphicon-remove'></i> &nbsp;hapus&nbsp;</button>
							</td>
						</tr>

            <?php
            $u++; }?>


					</tbody>
				</table>
        <br><br>
        <table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
              <td></td>
							<td>Alamat</td>
              <td>Detail</td>
							<td >Nama Penerima</td>
							<td >Provinsi</td>
							<td >Kota</td>
							<td>Kode Pos</td>
							<td>Phone</td>
              <td></td>
              <td></td>
              <td>Action</td>

						</tr>
					</thead>
          <tbody>
            <?php $id_user = $this->session->userdata('id_user');
            $e = 0;
              $ja = count($this->h->tampilalamat($id_user));
            foreach ($this->h->tampilalamat($id_user) as $key) {
              # code...

            ?>
            <tr>
            <td><input type="radio" name="alamat" id="alamate<?php echo $e;?>" value="<?php echo $key->id_alamat;?>"></td>
            <td><?php echo $key->nama_alamat;?></td>
            <td><?php echo $key->alamat;?></td>
            <td><?php echo $key->nama_penerima;?></td>
            <td><?php echo $key->provinsi;?></td>
            <td><?php echo $key->kota;?></td>
            <td><?php echo $key->kode_pos;?></td>
            <td><?php echo $key->telp_penerima;?></td>
            <td><input type="hidden" id="acity<?php echo $e;?>" value="<?php echo $key->id_city;?>"></td>
            <td><input type="hidden" id="ja" value="<?php echo $ja;?>"></td>
            <td>
               <input type="hidden" name="id_alamat" id="id_alamat<?php echo $e;?>" value="<?php echo $key->id_alamat;?>"></input>
           <button type="submit" id="hapus-alamat<?php echo $e;?>" class='btn btn-xs btn-danger'><i class='glyphicon glyphicon-remove'></i> &nbsp;hapus&nbsp;</button></form>

          </tr>

            <?php $e++; } ?>
          </tbody>
        </table><br>

			</div>

		</div>

	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Add another address and Personal Information</h3>
			</div>
			<div class="row">
				<div class="col-sm-6">
          <?php
          $id = count($data);
          if ($id == 0) {
            echo "";
          } else {?>
					<div class="chose_area">
          <?php $id_user = $this->session->userdata('id_user');
          $a = count($this->h->tampilalamat($id_user));
          if ( $a >= 3 ){

          ?>
          <ul class="user_info">
            <li>
              <p>Anda sudah mencapai batas limit penambahan alamat, Sillahkan hapus salah satu alamat anda</p>
            </li>
          </ul>
          <?php }else {

          ?>
          <ul class="user_info">
            <form action="<?php echo base_url()?>Cart/tambahalamat" method="post" >
              <input type="hidden" name="id_alamat" value="<?php
              $kode = uniqid();
              $kode2="AL".str_pad($kode,3,"0",STR_PAD_LEFT);
              echo $kode2;?>" placeholder="<?php echo $kode2?>"/>
              <input type="hidden" name="id_user"
              value="<?php echo ucfirst($this->session->userdata('id_user'));?>"
              placeholder="<?php echo ucfirst($this->session->userdata('id_user'));?>"/>
            <li>
              <label>Name Alamat:</label>
              <input type="text" name="nama_alamat" id="nama_alamat" class="form-control" placeholder="Alamat"></input>
            <li>
              <li>
                <label>Nama Penerima:</label>
                <input type="text" name="nama_penerima" id="nama_penerima" class="form-control" placeholder="Nama Lengkap"></input>
              <li>
            <li>
              <label>Detail Alamat:</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="4" placeholder="Alamat Lengkap anda"></textarea>
            </li>
							<li class="single_field">
								<label>Provinsi:</label>
                <select class="form-control" name="province" id="province">
						            <option value="" selected="" disabled="">Provinsi</option>
						                  <?php $this->load->view('rajaongkir/getProvince'); ?>
					       </select>
                 <input type="hidden" id="nama_province" name="nama_province" class="nama_province" value="Jawa Barat" >
                 <input type="hidden" id="id_province" name="id_province" class="id_province" value="2" >
							</li>


              <li class="single_field">
								<label>Kota/Kabupaten:</label>
                <select class="form-control" name="city" id="city">
						            <option value="" selected="" disabled="">Kota</option>
                        <?php $this->load->view('rajaongkir/getCityAsli')?>
					       </select>
                 <input type="hidden" id="nama_city" name="nama_city" class="nama_city" value="Aceh Barat" >
                 <input type="hidden" id="id_city" name="id_city" class="id_city" value="1" >
							</li>

							<li>
								<label>Kode Pos:</label>
								<input type="text" name="kodepos" placeholder="Kode Pos"></input>
							</li>
              <li>
								<label>Phone Number:</label>
								<input type="text" name="telp_penerima" placeholder="Phone Number"></input>
							</li>
						</ul>

						&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;<input type="submit" id="tampil-data" value="Add Address" class="btn btn-default" ></input>
            </form>
            <?php }?>
					</div>

          <?php }?>
				</div>

				<div class="col-sm-6">
          <div class="total_area">
        <!--  <form action="<?php echo base_url()?>Cart/getCost">-->
            <input type="hidden" name="origin" id="origin" value="154"></input>
            <input type="hidden" name="destination" id="destination" value=""></input>
            <?php
            $i = 0;
            foreach($data as  $k){
              $bir[$i] = $k->berat_total;
              $i++;
            }
            $id = count($data);
            if ($id == 0) {
              echo "";
            } else {
              echo "<input type='hidden' name='berat' id='berat' value=".array_sum($bir)."></input>";
            }?>

            <?php
            $id = count($data);
            if ($id == 0) {
              echo "";
            } else {?>
            <li class="single_field pull-right">
            <select  name="courier" id="courier">
              <option value="" selected>Pilih Kurir</option>
              <option value="jne">JNE</option>
              <option value="tiki">TIKI</option>
              <option value="pos">POS</option>
            </select>
          </li><br>
          <button type="button" onclick="tampil_data('data')"  id="sub" class='btn btn-sm btn-info pull-right'><i class='glyphicon glyphicon-info-sign'></i> Cek Ongkos Kirim</button>
        <!--</form>--><?php }?>
        <br><br><br>
        <div id="hasil">
        </div>

      </div>
					<div class="total_area">
            <?php
            $id = count($data);
            $id_user = $this->session->userdata('id_user');
            $u = count($this->h->tampilpay($id_user));
            if ($id == 0) {
              echo "";
            } elseif( $u == 0) {?>
            <form id="checkout" action="<?php echo base_url()?>Cart/bayar" method="post" class="form-horizontal">
              <input type="hidden" name="id_payment" value="<?php
              $kode = uniqid();
              $kode2="PY".str_pad($kode,3,"0",STR_PAD_LEFT);
              echo $kode2;?>" placeholder="<?php echo $kode2?>"/>
              <input type="hidden" name="user_id"
              value="<?php echo ucfirst($this->session->userdata('id_user'));?>"
              placeholder="<?php echo ucfirst($this->session->userdata('id_user'));?>"/>
              <input type="hidden" name="email" value="<?php echo $this->session->userdata('email');?>">
              <input type="hidden" name="order_id" value="<?php
              $kode = uniqid();
              $kode2="ODR".str_pad($kode,3,"0",STR_PAD_LEFT);
              echo $kode2;?>" placeholder="<?php echo $kode2?>"/>

              <input type="hidden" name="alam" id="alam" value=""></input>
              <input type="hidden" name="kurir" id="kurir" value=""></input>
              <input type="hidden" name="status" id="status" value="Belum"></input>
              <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d H:i:s');?>" placeholder="<?php echo date('Y-m-d H:i:s');?>"/>
						<ul>
							<li>
                <div class="form-group">
                  <label class="col-xs-3 control-label pull-left">Total Item</label>

                  <div class="col-xs-5">
                    <input type="text" class="form-control pull-right" name="total" id="total" value="<?php
                  $tot=0; foreach ($data as $key) {
    							  $tot += $key->sub_total;
    							}
                  echo ($tot);?>" readonly="readonly" />
                  </div>
                </div>
                </li>
              <li>
              <div class="form-group">
                <label class="col-xs-3 control-label pull-left">Ongkos Kirim</label>
                <div class="col-xs-5">
                  <input type="text" class="form-control pull-right" name="ongkir" id="ongkir" value="" readonly="readonly" />
                </div>
              </div>
            </li>
            <li>
            <div class="form-group">
              <label class="col-xs-3 control-label pull-left">Total</label>
              <div class="col-xs-5">
                <input type="text" class="form-control pull-right" name="total_tagihan" id="total_tagihan" value="" readonly="readonly" />
              </div>
            </div>
          </li>
          <li>
          <div class="form-group">
            <label class="col-xs-3 control-label pull-left">Pilih Bank</label>
            <div class="col-xs-5">
              <select  name="bank" id="bank">
                <option value="" selected>pilih bank</option>
                <option value="Bank Mandiri">Bank Mandiri</option>
                <option value="Bank BCA">Bank BCA</option>
                <option value="Bank BTN">Bank BTN</option>
              </select>
            </div>
          </div>
        </li>
						</ul>
              <?php
              $i = 0;
              $id_user = $this->session->userdata('id_user');
              foreach ($data as $k) {
          			?>
                <input type="hidden" name="nb<?php echo $i;?>" value="<?php echo $k->nama_barang;?>" placeholder="<?php echo $k->nama_barang;?>"></input>
                <input type="hidden" name="jm<?php echo $i;?>" value="<?php echo $k->jumlah;?>"></input>
                <input type="hidden" name="su<?php echo $i;?>" value="<?php echo $k->sub_total;?>"></input>
                <?php
          		$i++;}
              $jcart = count($data);
              ?>

              <input type="hidden" name="jcart" value="<?php echo $jcart;?>"></input>
							<button type="submit" id="okee" class="btn btn-sm btn-info pull-right" >Check Out</button>
            </form><?php
          } else {


                ?>
                <form class="form-horizontal">
                <ul>
    							<li>
                    <div class="form-group">
                      <label class="col-xs-3 control-label pull-left">Total Item</label>

                      <div class="col-xs-5">
                        <input type="text" class="form-control pull-right" name="total" id="total" value="<?php
                      $tot=0; foreach ($data as $key) {
        							  $tot += $key->sub_total;
        							}
                      echo ($tot);?>" readonly="readonly" />
                      </div>
                    </div>
                    </li>
                  <li>
                  <div class="form-group">
                    <label class="col-xs-3 control-label pull-left">Ongkos Kirim</label>
                    <div class="col-xs-5">
                      <input type="text" class="form-control pull-right" name="ongkir" id="ongkir" value="" readonly="readonly" />
                    </div>
                  </div>
                </li>
                <li>
                <div class="form-group">
                  <label class="col-xs-3 control-label pull-left">Total</label>
                  <div class="col-xs-5">
                    <input type="text" class="form-control pull-right" name="total_tagihan" id="total_tagihan" value="" readonly="readonly" />
                  </div>
                </div>
              </li>
              <li>
              <div class="form-group">
                <label class="col-xs-3 control-label pull-left">Pilih Bank</label>
                <div class="col-xs-5">
                  <select  name="banki" id="banki">
                    <option value="" selected>pilih bank</option>
                    <option value="Bank Mandiri">Bank Mandiri</option>
                    <option value="Bank BCA">Bank BCA</option>
                    <option value="Bank BTN">Bank BTN</option>
                  </select>
                </div>
              </div>
            </li>
    						</ul>
                <button type="submit" id="ndak" class="btn btn-sm btn-info pull-right" >Check Out</button>
              </form>
                <?php
              }?>
					</div>
				</div>


			</div>
		</div>
	</section><!--/#do_action-->

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
$(document).ready(function () {
  $(document).on("click","#okee",function (e) {
      var u = $('#bank').val();
      e.preventDefault();
            if (  u == "" )  {
                 swal(
                'Oops...',
                'Pilih Bank untuk Transfer',
                'error'
              )
          }
          else {
            $('#checkout').submit();
          }
  })

})
</script>
<script>
$(document).ready(function () {

$('#ndak').on('click',function(e){
  e.preventDefault();
     swal(
    'Oops...',
    'Anda masih mempunyai aktivitas yang belum selesai di Checkout',
    'error'
  )
})
});
</script>
<script>
					function tampil_data(act){
					      var w = $('#origin').val();
					      var x = $('#destination').val();
					      var y = $('#berat').val();
					      var z = $('#courier').val();

					      $.ajax({
					          url: "<?php echo base_url()?>Cart/getCost",
					          type: "GET",
					          data : {origin: w, destination: x, berat: y, courier: z},
					          success: function (ajaxData){
					              $("#hasil").html(ajaxData);
                          $(document).on("change","#idongkir0",function () {
                              var k = $("#kurire0").text();
                              var o = $("#ongkire0").text();
                              $("#kurir").val(k);
                              $("#ongkir").val(o);
                              var a = parseInt($('input[name=ongkir]').val());
                              var b = parseInt($('input[name=total]').val());
                              var total = a+b;
                              $('#total_tagihan').val(a+b);
                          })
                          $(document).on("change","#idongkir1",function () {
                              var k = $("#kurire1").text();
                              var o = $("#ongkire1").text();
                              $("#kurir").val(k);
                              $("#ongkir").val(o);
                              var a = parseInt($('input[name=ongkir]').val());
                              var b = parseInt($('input[name=total]').val());
                              var total = a+b;
                              $('#total_tagihan').val(a+b);
                          })
                          $(document).on("change","#idongkir2",function () {
                              var k = $("#kurire2").text();
                              var o = $("#ongkire2").text();
                              $("#kurir").val(k);
                              $("#ongkir").val(o);
                              var a = parseInt($('input[name=ongkir]').val());
                              var b = parseInt($('input[name=total]').val());
                              var total = a+b;
                              $('#total_tagihan').val(a+b);
                          })
                          $(document).on("change","#idongkir3",function () {
                              var k = $("#kurire3").text();
                              var o = $("#ongkire3").text();
                              $("#kurir").val(k);
                              $("#ongkir").val(o);
                              var a = parseInt($('input[name=ongkir]').val());
                              var b = parseInt($('input[name=total]').val());
                              var total = a+b;
                              $('#total_tagihan').val(a+b);
                          })
                          $(document).on("change","#idongkir4",function () {
                              var k = $("#kurire4").text();
                              var o = $("#ongkire4").text();
                              $("#kurir").val(k);
                              $("#ongkir").val(o);
                              var a = parseInt($('input[name=ongkir]').val());
                              var b = parseInt($('input[name=total]').val());
                              var total = a+b;
                              $('#total_tagihan').val(a+b);
                          })
                          $(document).on("change","#idongkir4",function () {
                              var k = $("#kurire4").text();
                              var o = $("#ongkire4").text();
                              $("#kurir").val(k);
                              $("#ongkir").val(o);
                              var a = parseInt($('input[name=ongkir]').val());
                              var b = parseInt($('input[name=total]').val());
                              var total = a+b;
                              $('#total_tagihan').val(a+b);
                          })
                          $(document).on("change","#idongkir5",function () {
                              var k = $("#kurire5").text();
                              var o = $("#ongkire5").text();
                              $("#kurir").val(k);
                              $("#ongkir").val(o);
                              var a = parseInt($('input[name=ongkir]').val());
                              var b = parseInt($('input[name=total]').val());
                              var total = a+b;
                              $('#total_tagihan').val(a+b);
                          })
                          $(document).on("change","#idongkir6",function () {
                              var k = $("#kurire6").text();
                              var o = $("#ongkire6").text();
                              $("#kurir").val(k);
                              $("#ongkir").val(o);
                              var a = parseInt($('input[name=ongkir]').val());
                              var b = parseInt($('input[name=total]').val());
                              var total = a+b;
                              $('#total_tagihan').val(a+b);
                          })
                          $(document).on("change","#idongkir7",function () {
                              var k = $("#kurire7").text();
                              var o = $("#ongkire7").text();
                              $("#kurir").val(k);
                              $("#ongkir").val(o);
                              var a = parseInt($('input[name=ongkir]').val());
                              var b = parseInt($('input[name=total]').val());
                              var total = a+b;
                              $('#total_tagihan').val(a+b);
                          })
                        }
					      });
					  };
				</script>

<script>
$(document).ready(function() {
  var jcc=$('#jc').val();
  for (var i = 0; i < jcc; i++) {
      var id_cart=$('#id_cart'+i).val();
      var $row = $(this).parent().parent();
  $(document).on("click","#hapus-cart"+i,function() {
swal({
  title:"Hapus Keranjang",
  text:"Anda Yakin?",
  type: "warning",
  showCancelButton: true,
  confirmButtonText: "Hapus",
  closeOnConfirm: true,
},
  function(){
   $.ajax({
    url:"<?php echo base_url('Cart/deletea')?>",
    type: "POST",
    data:{id_cart:id_cart},
    success: function(data){// if true (1)
      $("body").html(data);

    }
   });
});

  })
    }
})
</script>
<script>
$(document).ready(function() {
  var jaa=$('#ja').val();
  for (var i = 0; i < jaa; i++) {
      var id_alamat=$('#id_alamat'+i).val();
      var $row = $(this).parent().parent();
  $(document).on("click","#hapus-alamat"+i,function() {
swal({
  title:"Hapus Alamat",
  text:"Anda Yakin?",
  type: "warning",
  showCancelButton: true,
  confirmButtonText: "Delete",
  closeOnConfirm: true,
},
  function(){
   $.ajax({
    url:"<?php echo base_url('Cart/deleteal')?>",
    type: "POST",
    data:{id_alamat:id_alamat},
    success: function(data){// if true (1)
      $("body").html(data);

    }
   });
});

  })
    }
})
</script>


<script charset="utf-8">
$(document).ready(function() {

  $(document).on("change", "#province", function() {
    var valuelain=$(this).find('option:selected').attr('valuea');
    var valuelagi=$(this).find('option:selected').attr('valueb');
    var buat=$(this).find('option:selected').attr('value');
    $('#nama_province').val(valuelagi);
    $('#id_province').val(valuelain);

  })//.val( $('#id_province').val() ).change(); // for pre-selection trigger

});
</script>
<script charset="utf-8">
$(document).ready(function() {

  $(document).on("change", "#city", function() {
    var valuelainnya=$(this).find('option:selected').attr('valuelain');
    var valuelagilagi=$(this).find('option:selected').attr('valuelagi');
    $('#id_city').val(valuelainnya);
    $('#nama_city').val(valuelagilagi);

  })

  //.val( $('#id_city').val() ).change(); // for pre-selection trigger

});
</script>


<script charset="utf-8">
$(document).ready(function() {
  var jaa=$('#ja').val();
      $(document).on("change", "#alamate0", function() {
        var ja=$('#ja').val();
        var alm=$('#alamate0').val();
        var dest=$('#acity0').val();
          $('#destination').val(dest);
          $('#alam').val(alm);
    });
      $(document).on("change", "#alamate1", function() {
        var ja=$('#ja').val();
        var alm=$('#alamate1').val();
        var dest=$('#acity1').val();
          $('#destination').val(dest);
          $('#alam').val(alm);
      });
      $(document).on("change", "#alamate2", function() {
        var ja=$('#ja').val();
        var alm=$('#alamate2').val();
        var dest=$('#acity2').val();
          $('#destination').val(dest);
          $('#alam').val(alm);
      });


});
</script>
<script>
$(document).ready(function() {
  $('#sub').attr('disabled',true);
  var jaa=$('#ja').val();
  for (var o = 0; o < jaa; o++) {
  $(document).on("change", "#alamate"+o, function() {
    if($('#courier').val().lenght !=""){
            $('#sub').attr('disabled', false);
        }
        else
        {
            $('#sub').attr('disabled', true);
        }
  })
}
});
</script>


<script charset="utf-8">
$(document).ready(function() {
  var jcc=$('#jc').val();
for (var o = 0; o < jcc; o++) {
  $(document).on("change", "#quantity"+o, function() {
    var jc=$('#jc').val();
    var quan = [];
    for (var j = 0; j < jc; j++) {
      var quans = $('#quantity'+j).val();
      quan.push(quans);
    }
    var i;
    for (i = 0; i < jc; ++i) {
      $('#jumlah'+i).val(quan[i]);
    }

  })
}

  //.val( $('#id_city').val() ).change(); // for pre-selection trigger

});
</script>

<!--<script src="<?php echo base_url()?>assets/js/jquery.js"></script>-->
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
