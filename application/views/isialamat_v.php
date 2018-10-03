<?php
  include_once('layout/wrapper.php');
?>
    <?php
    include_once('layout/sidebar.php');
    ?>
<div class="col-sm-4">
  <div class="signup-form"><!--sign up form-->
    <br><div class="alert alert-warning">
      <strong>Perhatikan!</strong> Anda Belum melengkapi data alamat, Lengkapi <a href="<?php echo base_url('alamat')?>">Disini</a>.
    </div>
    <form action="<?php echo base_url('isialamat')?>" method="post">
      <input type="hidden" name="id_alamat" value="<?php
        $kode = uniqid();
        $kode2="U".str_pad($kode, 3, "0", STR_PAD_LEFT);
        echo $kode2;?>" placeholder="<?php echo $kode?>"/>
      <input type="hidden" name="id_user" value="<?php echo ucfirst($this->session->userdata('id_user'));?>">
      <input type="text" name="alamat" value="<?php echo set_value('alamat'); ?>" placeholder="Alamat"/>
      <input type="text" name="kodepos" value="<?php echo set_value('kodepos'); ?>" placeholder="Kode Pos"/>
      <input type="text" name="kecamatan" value="<?php echo set_value('kecamatan'); ?>" placeholder="Kecamatan"/>
      <input type="text" name="kota" value="<?php echo set_value('kota'); ?>" placeholder="Kota"/>
      <input type="text" name="provinsi" value="<?php echo set_value('provinsi'); ?>" placeholder="Provinsi"/>
      <input type="submit" id="submit" value="Selesai" class="btn btn-default"></input>
    </form>
  </div><!--/sign up form-->
</div>

</section>

    <?php
    include_once('layout/footer.php');
    ?>
