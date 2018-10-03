<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SKY Market</title>
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/responsive.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/star-rating.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/star-rating.min.css" rel="stylesheet">

  <link href="<?php echo base_url()?>assets/css/style3.css" rel="stylesheet">
  <!--    <script src="<?php echo base_url()?>assets/js/html5shiv.js"></script> -->
  <!--  <script src="<?php echo base_url()?>assets/js/respond.min.js"></script> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/sweetalert/sweetalert.css">

<script type="text/javascript" src="<?php echo base_url()?>assets/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/sweetalert/sweetalert.min.js"></script>
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
    href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
    href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
    href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
    href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->






      <br><br><br><br>
        <div class="login-form">
     <img width="150px" src="<?php echo base_url()?>assets/images/home/logo2.png" alt="" />
        <?php
   // Cetak session
        if ($this->session->flashdata('sukses')) {
            echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
        }
  // Cetak error
        else {
            echo validation_errors('<p class="warning" style="margin: 10px 20px;">', '</p>');
        }

        ?>
     <form action="<?php echo base_url('Login') ?>" method="post">
     <br><br><br><br>
     <div class="form-group ">
       <input type="text" name="email" class="form-control" placeholder="Email " id="email">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" placeholder="Password" id="password" name="password">
       <i class="fa fa-lock"></i>
     </div>
      <span class="alert">Invalid Credentials</span>
      <a class="link" href="<?php echo base_url('Register')?>">Belum punya akun? Daftar</a>
      <input type="submit" value="Masuk" class="btn btn-default" ></input>
     </form>


   </div>
    </section>

    </section><!--/form-->

</section>





<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.scrollUp.min.js"></script>
<script src="<?php echo base_url()?>assets/js/price-range.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url()?>assets/js/main.js"></script>
</body>
</html>
