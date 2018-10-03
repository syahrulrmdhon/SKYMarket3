<?php
  include_once('layout/wrapper.php');
?>
<div id="contact-page" class="container">
        <div class="bg">

            <div class="row">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Get In Touch</h2>
            <?php echo $this->session->flashdata('ppp');?>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" action="<?php echo base_url('Contact');?>" method="post">
                <input type="hidden" name="id_feedback" value="<?php
                $kode = uniqid();
                $kode2="FB".str_pad($kode, 3, "0", STR_PAD_LEFT);
                echo $kode2;?>" placeholder="<?php echo $kode?>"/>
                    <div class="form-group col-md-6">
                                <input type="text" name="nama_lengkap" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="isi_feedback" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>

                    <input type="hidden" name="tanggal_feedback" value="<?php echo date('Y-m-d H:i:s');?>" placeholder="<?php echo date('Y-m-d H:i:s');?>"/>
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">Contact Info</h2>
                        <address>
                <p>Gedung Graha Krama Yudha Lantai 4,</p>
 <p>Jl.Warung Jati Barat No. 43 Kalibata – Pancoran,</p>
 <p>South Jakarta – 12760 </p>
 <p>Indonesia </p>
                        </address>
                        
                    </div>
                </div>
            </div>
        </div>
    </div><!--/#contact-page-->
  </section>
    <?php
      include_once('layout/footer.php');
    ?>
