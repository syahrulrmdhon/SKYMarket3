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

    				</ol>
    			</div><!--/breadcrums-->
          <h1 align="center">Terimakasih telah memesan</h1>
          <h5 align="center">cek email untuk menerima resi pengiriman</h5>
          <h5  align="center"><a href="<?php echo base_url('Checkout')?>">cek resi disini</a></h5>
          <br><br><br><br>
          <br><br><br><br><br>
          <br><br><br><br><br>
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
        $(document).ready(function() {

          $(document).on("change", "#bank", function() {
            var va=$('#bank').val();
            $('#id_bank').val(va);

          })
        });
        </script>
