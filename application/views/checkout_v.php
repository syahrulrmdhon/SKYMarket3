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
                      <li><a href="<?php echo base_url('Home')?>">Home</a></li>
                      <li class="active">Check out</li>
              <li><?php $id_user = $this->session->userdata('id_user');
                foreach ($this->d->tampilpay($id_user) as $key) {
                    $order_id = $key->order_id;
                    echo $order_id;
                }?></li>
                    </ol>
                </div><!--/breadcrums-->
<?php


$c = count($data);
if ($c == 0) {
    ?>
<h1 align="center">Tidak ada pesanan</h1>
<br>
<div class="col-sm-3">
  <div class="left-sidebar">
    <h2>Periksa Ongkir</h2>
    <div data-theme="light" id="rajaongkir-widget"></div>
</div>
</div>
<div class="col-sm-9 padding-right">
  <div class="register-req">
    <h3>Order History</h3>
<table align="center"class="table table-striped">
 <tr>
   <th></th>
   <th>Item<th>
   <th>Jumlah</th>
   <th>Berat</th>
   <th>Harga</th>
   <th>Tujuan</th>
 </tr>
    <?php
    $id_user = $this->session->userdata('id_user');
    foreach ($this->d->orderhistory($id_user) as $y) {
      # code...
        ?>
   <tr align="">
     <td><div style=""> <?php $id_barang = $y->id_barang;
        foreach ($this->c->getbarang($id_barang) as $key) {
            ?><img src="<?php echo base_url()?>assets/images/home/<?php echo $key->gambar;?>" width="160" height="90" alt=""></img><br>
        <?php }?></div></td>
      <td><div style=""> <?php $id_barang = $y->id_barang;
        foreach ($this->c->getbarang($id_barang) as $key) {
            ?>
         <a href="<?php echo base_url()?>DetailProduct/getbarang/<?php echo ($key->id_barang)?>"><?php echo $key->nama_barang;?></a>
        <?php }?></div></td>
      <td>
     <td>
       <div style=""><?php echo $y->jumlah;?></div>
     </td>
     <td><div style=""><?php echo $y->berat_total;?> gram</div></td>
     <td><div style=""><?php echo $y->sub_total;?></div></td>
     <td>
       <p><?php echo $y->nama_penerima;?></p>
       <p><?php echo $y->alamat;?></p>
       <p><?php echo $y->provinsi;?></p>
       <p><?php echo $y->kota;?></p>
       <p><?php echo $y->kode_pos;?></p>
       <p><?php echo $y->telp_penerima;?></p>
     </td>
   </tr>

        <?php
    } ?>
 </table>
 </div>
</div>
<br><br><br><br>
<br><br><br><br><br>
<?php } else {
    ?>
<div align="center">
<h1 align="center" id="demo"></h1>
<h5 align="center">Transfer di No Rekening bank dibawah ini sebelum waktu Count Down EXPIRED</h5>
    <?php $id_user = $this->session->userdata('id_user');
    foreach ($this->d->tampilpay($id_user) as $k) {
        $i = $k->id_bank;
        if ($i == "Bank Mandiri") {
            ?>
  <img align="center" width="300px" src="<?php echo base_url()?>bank/Bank_Mandiri.png"></img>
  <h5>PT Said Krama Yudha 1560009861578</h5>
        <?php } elseif ($i == "Bank BNI") {
            ?>
    <img align="center" width="300px" src="<?php echo base_url()?>bank/Bank_BNI.png"></img>
    <h5>PT Said Krama Yudha 0178305704</h5>
            <?php
        } else {
    ?>
  <img align="center" width="300px" src="<?php echo base_url()?>bank/Bank_BCA.png"></img>
  <h5>PT Said Krama Yudha 5220304312</h5>
    <?php
}
    } ?>
</div>
<!---->

                <div class="register-req">
            <h3>Summary Order</h3>
            <table class="table table-striped">
             <tr>
               <th>Product Name</th>
               <th>Quantity</th>
               <th>Total</th>
             </tr>


            <?php
            foreach ($data as $key) {
                ?>
                     <tr>
                         <td>
                             <div style=""><?php echo $key->nama_barang;?></div>
                         </td>
                         <td align="center"><?php echo $key->jumlah;?></td>
                         <td align="center">Rp. <?php echo number_format($key->sub_total);?></td>
                     </tr>
                     <?php
            }
            ?>
                 </table>
             <p>Ongkir : Rp. <?php
                $id_user = $this->session->userdata('id_user');
                foreach ($this->d->tampilpay($id_user) as $key) {
                    echo number_format($key->ongkir);
                }?> </p>
             <h3>Total : Rp. <?php
                $id_user = $this->session->userdata('id_user');
                foreach ($this->d->tampilpay($id_user) as $key) {
                    echo number_format($key->total_tagihan);
                }?></h3>
             <form id="cancelorder" action="<?php echo base_url('Checkout/cancelorder')?>" method="post" class="form-horizontal">
              <input type="hidden" name="payment" value="<?php $id_user = $this->session->userdata('id_user');
                foreach ($this->d->tampilpay($id_user) as $key) {
                    echo $key->id_payment;
                }?>"></input>
              <input type="hidden" name="order" value="<?php foreach ($data as $key) {
                    echo $key->order_id;
                                                       }?>">
             <button type="submit"  id="btn-submit"class='btn btn-xs btn-danger pull-right'><i class='glyphicon glyphicon-remove'></i> &nbsp;Cancel Order&nbsp;</button>
           </form>
                </div><!--/register-req-->

          <form role="form" enctype="multipart/form-data" action="<?php echo site_url('Checkout/updatebank')?>"  method="post" class="form-horizontal">
            <?php
            $j = 0;
            foreach ($data as $key) {
              # code...
                ?>
            <input type="hidden" name="barang_id<?php echo $j;?>" value="<?php echo $key->id_barang;?>"></input>
            <input type="hidden" name="order_id" value="<?php echo $key->order_id;?>"></input>
            <input type="hidden" name="jadi<?php echo $j;?>" value="<?php $i = $key->stok;
              $a = $key->jumlah;
              $c = $i - $a;
              echo $c;
            ?>"></input>
            <input type="hidden" name="jual<?php echo $j;?>" value="<?php $i = $key->jumlah_penjualan;
              $a = $key->jumlah;
              $c = $i + $a;
              echo $c;
            ?>"></input>

                <?php $j++;
            }
            ?>

          <div class="form-group">
            <label class="col-xs-3 control-label">Nama Rekening</label>
            <div class="col-xs-5">
              <input type="text" class="form-control" name="nama_rek" id="nama_rek" value="" />
            </div>
          </div>
      <div class="form-group">
                <label class="col-xs-3 control-label">Bukti Pembayaran</label>
                <div class="col-xs-5">
                  <input type="file" class="form-control" rows="1" name="bukti_bayar" value=""></input>
                </div>
    </div>
    <div class="form-group">
        <label class="col-xs-3 control-label">Nomor Rekening</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="no_rek" id="no_rek" value="" />
        </div>
    </div>


    <div class="form-group">
        <div class="col-xs-9 col-xs-offset-3">
            <input type="hidden" name="id_payment" value="<?php $id_user = $this->session->userdata('id_user');
            foreach ($this->d->tampilpay($id_user) as $ky) {
                echo $ky->id_payment;
            }?>"></input>
            <input type="hidden" id="tanggal" value="<?php $id_user = $this->session->userdata('id_user');
            foreach ($this->d->tampilpay($id_user) as $kay) {
                echo $kay->tanggal;
            }?>"></input>
            <button type="submit" id="beli" class="btn btn-primary">Beli</button>
        </div>
    </div>
</form>
<?php }?>
        </section> <!--/#cart_items-->
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
      <script src="<?php echo base_url()?>assets/js/formValidation.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/framework/bootstrap.min.js"></script>
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
      <script>
     $('#btn-submit').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('#cancelorder');
        swal({
        title: "Are you sure to cancel order?",
        text: "You will not be able to recover this order!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
      }, function(isConfirm){
        if (isConfirm) form.submit();
      });
    });
      </script>
      <script>
      $('#bukti_bayar').change(function () {
      var ext = this.value.match(/\.(.+)$/)[1];
      switch (ext) {
          case 'jpg':
          case 'jpeg':
              $('#beli').attr('disabled', false);
              break;
          default:
              sweetAlert("Oops...", "This is not allowed type file", "error");
              this.value = '';
      }
  });
      </script>

      <script>
      $(document).ready(function () {
        $('#beli').attr('disabled',true);
        if ($('#bank').val() == ""  && $('#nama_rek').val() == "" && $('#bukti_bayar').val() == "" && $('#no_rek').val() == "") {
          $('#beli').attr('disabled',true);
        }
        else {
          $('#beli').attr('disabled',false);
        }

      })

      </script>



     <script>
// Set the date we're counting down to
var date = $('#tanggal').val();
var DownDate = new Date(date);
var countDownDate = new Date(new Date(date).getTime() + 24 * 60 * 60 * 1000);


// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
    $('#cancelorder').submit();
  }
}, 1000);
</script>
      </html>
